<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizMe;
use DB;

class Kesepuluh extends Component 
{
    protected $debug = true;    
   

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizMe;
    public $user_id;


    public function meSelesai($testId){ 
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

      
        $this->emit('reloadPage');        
    }

    public function updateDatabase($quizId,$questionNumber)
    {       
        $QuizMe =QuizMe::where('id','=',$quizId)->first();
        $NormaMe =Norma::where('tipe','=',10)->first();
        $answer = $this->{'answer' . $questionNumber};      
        NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k'     => ($QuizMe->k)?? null,
                'j'     => $answer,
                'nilai' => ($QuizMe->k == $answer)? $NormaMe->nilai_min :null                
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
            ->where('norma.tipe', '=', 10)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){
            $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->meSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; 
            
        }

        for ($i = 157; $i < 177; $i++) { 
            $this->{'answer' . $i} = null;
            $this->{'quiz' . $i} = null;
        }   

        $QuizMe = DB::table('quiz_me')
                    ->join('norma', 'norma.id', '=', 'quiz_me.test_id')           
                    ->where('norma.tipe', '=', 10)
                    ->select('quiz_me.*', 'norma.tipe', 'norma.waktu')
                    ->get(); 

        $this->QuizMe = json_decode(json_encode($QuizMe), true); 

        $TestSe = DB::table('norma_test')
                    ->join('quiz_me', 'quiz_me.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->select('norma_test.*', 'quiz_me.no')
                    ->get();        
        
        if($TestSe){
            foreach ($TestSe as $TS => $t) {
                $this->{'answer' . $t->no} = $t->j;                
            }
        }  

        $NormaMind  = Norma::where('tipe','=',9)->first();
        $this->NormaMind = json_decode(json_encode($NormaMind), true); 
    }    
    
   public function render()
    {       
        return view('livewire.norma.test.kesepuluh');
        
    }
}
