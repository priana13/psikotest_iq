<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizWa;
use DB;

class Kedua extends Component
{
    protected $debug = true;    
    protected $listeners = ['waMulai'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizWa;
    public $NormaWa;
    public $user_id;


    

    public function waMulai($testId){        
        $this->user_id = auth()->user()->id;
        $this->test_id = $testId;

        $userNorma = DataUserNorma::where('user_id','=',$this->user_id)->first();
        $norma = Norma::where('id','=',$this->test_id)->first();
        if($norma && $userNorma){
            NormaTestLog::updateOrCreate(
                ['user_id' => $this->user_id,'test_id'=>$this->test_id],
                [
                    'nomor_test'    => $userNorma->nomor_test,
                    'waktu_test'    => $norma->waktu,
                    'waktu_mulai'   => Carbon::now(),                      
                    'status'        => 1
                ]
            );
        }
        $this->emit('reloadPage');        
        
    }

    public function waSelesai($testId){ 
        $this->user_id = auth()->user()->id;
        $this->test_id = $testId;     

        $userNorma = DataUserNorma::where('user_id','=',$this->user_id)->first();
        $norma = Norma::where('id','=',$this->test_id)->first();     

        if($norma){
            NormaTestLog::updateOrCreate(
                ['user_id' => $this->user_id,'test_id'=>$this->test_id],
                [                    
                    'waktu_selesai'     => Carbon::now(),                      
                    'status'            => 2
                ]
            );
        }
        
        $norma = Norma::where('tipe','=',3)->first();
        $this->test_id = ($norma)? ($norma->id):0;

        NormaTestLog::updateOrCreate(
            ['user_id' => $this->user_id,'test_id' => $this->test_id],
            [
                'nomor_test'    => $userNorma->nomor_test,                
                'status'        => 1
            ]
        );
        $this->emit('reloadPage');        
    }

    public function updateDatabase($quizId,$questionNumber)
    {       
        $QuizWa =QuizWa::where('id','=',$quizId)->first();
        $NormaWa =Norma::where('tipe','=',2)->first();
        $answer = $this->{'answer' . $questionNumber};       
        NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k' => ($QuizWa->k)?? null,
                'j' => $answer,
                'nilai' => ($QuizWa->k == $answer)? $NormaWa->nilai_min :null     
                
            ]
        );
        
    }


    public function mount()
    {
        $this->user_id = auth()->user()->id;
            

        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->where('norma_test_log.status', '=', 1)
            ->where('norma_test_log.user_id', '=', $this->user_id)
            ->where('norma.tipe', '=', 2)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        
       

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){

            $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->waSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; 
            
        }


        for ($i = 21; $i < 41; $i++) { 
            $this->{'answer' . $i} = null;
            $this->{'quiz' . $i} = null;
        }    

        $QuizWa = DB::table('quiz_wa')
                    ->join('norma', 'norma.id', '=', 'quiz_wa.test_id')           
                    ->where('norma.tipe', '=', 2)
                    ->select('quiz_wa.*', 'norma.tipe', 'norma.waktu')
                    ->get(); 

        $this->QuizWa = json_decode(json_encode($QuizWa), true); 

        $TestWa = DB::table('norma_test')
                    ->join('quiz_wa', 'quiz_wa.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->select('norma_test.*', 'quiz_wa.no')
                    ->get();        
        
        if($TestWa){
            foreach ($TestWa as $TS => $t) {
                $this->{'answer' . $t->no} = $t->j;                
            }
        }  
        $NormaWa  = Norma::where('tipe','=',2)->first();

       

        $this->NormaWa = json_decode(json_encode($NormaWa), true); 

       
    }    
    
    public function render()
    {
        
        return view('livewire.norma.test.kedua');
        
    }
}
