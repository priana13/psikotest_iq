<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizGe;
use DB;

class Keempat extends Component 
{
    protected $debug = true;    
    protected $listeners = ['geMulai'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizGe;
    public $NormaGe;
    public $user_id;


    public function geMulai($testId){        
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

    public function geSelesai($testId){ 
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

        
        $norma = Norma::where('tipe','=',5)->first();
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
        $QuizGe =QuizGe::where('id','=',$quizId)->first();
        $answer = strtoupper($this->{'answer' . $questionNumber});      

        /*$n1 = stripos($QuizGe->k1, trim($answer));
        $n2 = stripos($QuizGe->k2, trim($answer));
        $nilai = 0;
        if ($n1 !== false) {
            $nilai = 2;
        } elseif ($n2 !== false) {
            $nilai = 1;
        } else {
            $nilai = 0;
        } */

        $n1 = explode(", ", strtoupper($QuizGe->k1));
        $n2 = explode(", ", strtoupper($QuizGe->k2));

        $nilai = 0;
        if (in_array(trim($answer), $n1, true)) {
            $nilai = 2;
        } elseif (in_array(trim($answer), $n2, true)) {
            $nilai = 1;
        }
        NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k' => 'Kunci 1: ' . ($QuizGe->k1 ?? 'N/A') . ' - Kunci 2: ' . ($QuizGe->k2 ?? 'N/A'),
                'j' => $answer,
                'nilai' => $nilai
                
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
            ->where('norma.tipe', '=', 4)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){
            $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->geSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; 
            
        }


        for ($i = 61; $i < 77; $i++) { 
            $this->{'answer' . $i} = null;
            $this->{'quiz' . $i} = null;
        }    

        $QuizGe = DB::table('quiz_ge')
                    ->join('norma', 'norma.id', '=', 'quiz_ge.test_id')           
                    ->where('norma.tipe', '=', 4)
                    ->select('quiz_ge.*', 'norma.tipe', 'norma.waktu')
                    ->get(); 

        $this->QuizGe = json_decode(json_encode($QuizGe), true); 

        $TestGe = DB::table('norma_test')
                    ->join('quiz_ge', 'quiz_ge.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->select('norma_test.*', 'quiz_ge.no')
                    ->get();        
        
        if($TestGe){
            foreach ($TestGe as $TS => $t) {
                $this->{'answer' . $t->no} = $t->j;                
            }
        }  
        $NormaGe  = Norma::where('tipe','=',4)->first();
        $this->NormaGe = json_decode(json_encode($NormaGe), true); 
        
    }    
    
    public function render()
    {        
        return view('livewire.norma.test.keempat');
        
    }
}

