<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component; 
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizZr;
use DB;

class Keenam extends Component
{
    protected $debug = true;    
    protected $listeners = ['zrMulai'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizZr;
    public $NormaZr;
    public $user_id;


    

    public function zrMulai($testId){        
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

    public function zrSelesai($testId){ 
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
        
        $norma = Norma::where('tipe','=',7)->first();
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
        $QuizZr =QuizZr::where('id','=',$quizId)->first();
        $NormaZr =Norma::where('tipe','=',6)->first();
        $answer = array_map('intval',$this->{'answer' . $questionNumber});     
       
        NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k' => ($QuizZr->k)?? null,
                'j' => json_encode($answer),
                'nilai' => (json_decode($QuizZr->k,TRUE) == array_values($answer))? $NormaZr->nilai_min :null  
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
            ->where('norma.tipe', '=', 6)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){
            $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->zrSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; 
            
        }

        for ($i = 97; $i < 117; $i++) { 
            $this->{'answer' . $i} = [];
            $this->{'quiz' . $i} = null;
        }  

        $QuizZr = DB::table('quiz_zr')
                    ->join('norma', 'norma.id', '=', 'quiz_zr.test_id')           
                    ->where('norma.tipe', '=', 6)
                    ->select('quiz_zr.*', 'norma.tipe', 'norma.waktu')
                    ->get(); 

        $this->QuizZr = json_decode(json_encode($QuizZr), true); 

        $TestZr = DB::table('norma_test')
                    ->join('quiz_zr', 'quiz_zr.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->select('norma_test.*', 'quiz_zr.no')
                    ->get();        
        
        if($TestZr){
            foreach ($TestZr as $TS => $t) {                
                 $this->{'answer' . $t->no} = json_decode($t->j);     
            }
        }  
        $NormaZr  = Norma::where('tipe','=',6)->first();
        $this->NormaZr = json_decode(json_encode($NormaZr), true); 
        
    }    
    
    public function render()
    {
        
        return view('livewire.norma.test.keenam');
        
    }
}
