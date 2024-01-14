<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizSe;
use DB;

class Kesatu extends Component 
{
    protected $debug = true;    
    protected $listeners = ['seMulai'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizSe;
    public $NormaSe;
    public $user_id;


    

    public function seMulai($testId){        
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

    public function seSelesai($testId){ 
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

        
        $norma = Norma::where('tipe','=',2)->first();
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
        $QuizSe =QuizSe::where('id','=',$quizId)->first();
        $NormaSe =Norma::where('tipe','=',1)->first();
        $answer = $this->{'answer' . $questionNumber};      
        NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k'     => ($QuizSe->k)?? null,
                'j'     => $answer,
                'nilai' => ($QuizSe->k == $answer)? $NormaSe->nilai_min :null                
            ]
        );
         $this->emit('reloadPage');      
    }


    public function mount()
    {
        $this->user_id = auth()->user()->id;
            

        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->where('norma_test_log.status', '=', 1)
            ->where('norma_test_log.user_id', '=', $this->user_id)
            ->where('norma.tipe', '=', 1)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){
            $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->seSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; 
            
        }

        for ($i = 1; $i < 21; $i++) { 
            $this->{'answer' . $i} = null;
            $this->{'quiz' . $i} = null;
        }   

        $QuizSe = DB::table('quiz_se')
                    ->join('norma', 'norma.id', '=', 'quiz_se.test_id')           
                    ->where('norma.tipe', '=', 1)
                    ->select('quiz_se.*', 'norma.tipe', 'norma.waktu')
                    ->get(); 

        $this->QuizSe = json_decode(json_encode($QuizSe), true); 

        $TestSe = DB::table('norma_test')
                    ->join('quiz_se', 'quiz_se.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->select('norma_test.*', 'quiz_se.no')
                    ->get();        
        
        if($TestSe){
            foreach ($TestSe as $TS => $t) {
                $this->{'answer' . $t->no} = $t->j;                
            }
        }  

        $NormaSe  = Norma::where('tipe','=',1)->first();
        $this->NormaSe = json_decode(json_encode($NormaSe), true); 
        
    }    
    
   public function render()
    {       
        return view('livewire.norma.test.kesatu');
        
    }
}
