<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizAn;
use DB;

class Ketiga extends Component 
{
    protected $debug = true;    
    protected $listeners = ['anMulai'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizAn;
    public $NormaAn;
    public $user_id;


    

    public function anMulai($testId){        
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

    public function anSelesai($testId){ 
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

        
        $norma = Norma::where('tipe','=',4)->first();
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
        $QuizAn =QuizAn::where('id','=',$quizId)->first();
        $NormaAn =Norma::where('tipe','=',3)->first();
        $answer = $this->{'answer' . $questionNumber};       
        NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k' => ($QuizAn->k)?? null,
                'j' => $answer,
                'nilai' => ($QuizAn->k == $answer)? $NormaAn->nilai_min :null     
                
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
            ->where('norma.tipe', '=', 3)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){
            $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->anSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; 
            
        }

        for ($i = 41; $i < 61; $i++) { 
            $this->{'answer' . $i} = null;
            $this->{'quiz' . $i} = null;
        }    

        $QuizAn = DB::table('quiz_an')
                    ->join('norma', 'norma.id', '=', 'quiz_an.test_id')           
                    ->where('norma.tipe', '=', 3)
                    ->select('quiz_an.*', 'norma.tipe', 'norma.waktu')
                    ->get(); 

        $this->QuizAn = json_decode(json_encode($QuizAn), true); 

        $TestAn = DB::table('norma_test')
                    ->join('quiz_an', 'quiz_an.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->select('norma_test.*', 'quiz_an.no')
                    ->get();        
        
        if($TestAn){
            foreach ($TestAn as $TS => $t) {
                $this->{'answer' . $t->no} = $t->j;                
            }
        }  
        $NormaAn  = Norma::where('tipe','=',3)->first();
        $this->NormaAn = json_decode(json_encode($NormaAn), true); 
        
        
    }    
    
    public function render()
    {
        
        return view('livewire.norma.test.ketiga');
        
    }
}

