<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component; 
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizRa;
use DB;

class Kelima extends Component
{
    protected $debug = true;    
    protected $listeners = ['raMulai'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizRa;
    public $NormaRa;
    public $user_id;    

    public function raMulai($testId){        
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

    public function raSelesai($testId){ 
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
        
        $norma = Norma::where('tipe','=',6)->first();
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

        // dd($quizId , $questionNumber);

        $QuizRa =QuizRa::where('id','=',$quizId)->first();
        $NormaRa =Norma::where('tipe','=',5)->first();
        // $answer = array_map('intval',$this->{'answer' . $questionNumber});
       
        $jawaban  = intval(  $this->{'jawaban' . $questionNumber} );

        // $nilai1 = (json_decode($QuizRa->k,TRUE) == array_values($answer))? $NormaRa->nilai_min :null ;
        $nilai2 =( $QuizRa->k2 == $jawaban) ? 1 : 0 ;
      
        NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k' => ($QuizRa->k2)?? null,
                // 'j' => json_encode($answer),
                'j' => $jawaban,
                'nilai' => $nilai2 
                
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
            ->where('norma.tipe', '=', 5)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){
            $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->raSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; 
            
        }

        for ($i = 77; $i < 97; $i++) { 
            $this->{'answer' . $i} = [];

            $this->{'jawaban' . $i} = 0;

            $this->{'quiz' . $i} = null;
        }    

        $QuizRa = DB::table('quiz_ra')
                    ->join('norma', 'norma.id', '=', 'quiz_ra.test_id')           
                    ->where('norma.tipe', '=', 5)
                    ->select('quiz_ra.*', 'norma.tipe', 'norma.waktu')
                    ->get(); 

        $this->QuizRa = json_decode(json_encode($QuizRa), true); 

        $TestRa = DB::table('norma_test')
                    ->join('quiz_ra', 'quiz_ra.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->select('norma_test.*', 'quiz_ra.no')
                    ->get();        

                    // dd($TestRa);
        
        if($TestRa){
            foreach ($TestRa as $TS => $t) {                
                // $this->{'answer' . $t->no} = json_decode($t->j); 
                $this->{'jawaban' . $t->no} = json_decode($t->j);  

            }
        }  
        $NormaRa  = Norma::where('tipe','=',5)->first();
        $this->NormaRa = json_decode(json_encode($NormaRa), true); 
        
    }    
    
    public function render()
    {
        return view('livewire.norma.test.kelima');
        
    }
}
