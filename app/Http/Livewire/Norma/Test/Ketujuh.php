<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizFa;
use DB;

class Ketujuh extends Component 
{
    protected $debug = true;    
    protected $listeners = ['faMulai','faSebelumnya','faSelanjutnya'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizFa;
    public $NormaFa;
    public $user_id;
    public $answer;
    public $listSoal;


    

    public function faMulai($testId){        
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
    public function faSebelumnya($testId, $questionNumber)
    {
        $this->user_id = auth()->user()->id;    
        $no = $questionNumber; 
        $listSoal = QuizFa::select('no')->orderBy('no', 'asc')->get();
        $beforeNumber = null;
        foreach ($listSoal as $key => $value) {
            if ($value->no < $no) {
                $beforeNumber = $value->no;
                break;
            }
        }        
        $before = ($beforeNumber !== null)?$beforeNumber: $questionNumber;    
        $QuizFa = QuizFa::where('test_id', $testId)->where('no', $before)->first();
        if($QuizFa)  {
            $this->QuizFa = json_decode(json_encode($QuizFa), true);
            $NormaTestFa = NormaTest::where('test_id', $testId)
                        ->where('user_id',$this->user_id)
                        ->where('quiz_id',$QuizFa->id)
                        ->first();
            $this->answer = ($NormaTestFa)? $NormaTestFa->j: null;            
        }

        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->where('norma_test_log.status', '=', 1)
            ->where('norma_test_log.user_id', '=', $this->user_id)
            ->where('norma.tipe', '=', 7)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;
        $this->nama_test = ($testLog) ? $testLog->nama : null;                      
       
        if($testLog->waktu_test != null){
            $waktu_test =($testLog->waktu_test * 60);
            $waktu_mulai = ($testLog) ? Carbon::parse($testLog->waktu_mulai) : null;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->faSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));
                $this->emit('timerUpdated', $this->waktu_test);
            }

            $this->waktu_mulai = ($testLog) ? Carbon::parse($testLog->waktu_mulai) : null; // Convert to Carbon
            
        }

      
       
    }

    public function faSelanjutnya($testId, $questionNumber)
    {
        $this->user_id = auth()->user()->id;   

        $no = $questionNumber; 
        $listSoal = QuizFa::select('no')->orderBy('no', 'asc')->get();
        $nextNumber = null;
        foreach ($listSoal as $key => $value) {
            if ($value->no > $no) {
                $nextNumber = $value->no;
                break;
            }
        }

        $next = ($nextNumber !== null)? $nextNumber:$questionNumber;    
        $QuizFa = QuizFa::where('test_id', $testId)->where('no', $next)->first();
        if($QuizFa) {
            $this->QuizFa = json_decode(json_encode($QuizFa), true);
            $NormaTestFa = NormaTest::where('test_id', $testId)
                        ->where('user_id',$this->user_id)
                        ->where('quiz_id',$QuizFa->id)
                        ->first();
            $this->answer =($NormaTestFa)?$NormaTestFa->j:null;
        }              

        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->where('norma_test_log.status', '=', 1)
            ->where('norma_test_log.user_id', '=', $this->user_id)
            ->where('norma.tipe', '=', 7)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;                      
       
        if($testLog->waktu_test != null){
            $waktu_test = ($testLog->waktu_test * 60);
            $waktu_mulai = ($testLog) ? Carbon::parse($testLog->waktu_mulai) : null;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->faSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));
                $this->emit('timerUpdated', $this->waktu_test);
            }

            $this->waktu_mulai = ($testLog) ? Carbon::parse($testLog->waktu_mulai) : null; // Convert to Carbon
            
        }

       
    }


    public function faSelesai($testId){ 
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

        
        $norma = Norma::where('tipe','=',8)->first();
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
        $QuizFa =QuizFa::where('id','=',$quizId)->first();
        $NormaFa =Norma::where('tipe','=',6)->first();
       
        NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k' => ($QuizFa->k)?? null,
                'j' => $this->answer,
                'nilai' => ($QuizFa->k == $this->answer)? $NormaFa->nilai_min :null  
                
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
            ->where('norma.tipe', '=', 7)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;
        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){
            $waktu_test = ($testLog->waktu_test * 60);
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->faSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; // Convert to Carbon
            
        }
        
        
        $QuizFa = DB::table('quiz_fa')
            ->join('norma', 'norma.id', '=', 'quiz_fa.test_id')
            ->where('norma.tipe', '=', 7)
            ->where('quiz_fa.no', '=', 117)
            ->select('quiz_fa.*', 'norma.tipe', 'norma.waktu')
            ->first();

        $this->QuizFa = ($QuizFa) ? json_decode(json_encode($QuizFa), true) : null;

        $TestFa = DB::table('norma_test')
                    ->join('quiz_fa', 'quiz_fa.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->where('quiz_fa.id', '=', $QuizFa->id)
                    ->select('norma_test.*', 'quiz_fa.no')
                    ->first();       


        $this->answer = ($TestFa) ? $TestFa->j : null;

        $NormaFa  = Norma::where('tipe','=',7)->first();
        $this->NormaFa = json_decode(json_encode($NormaFa), true); 

        
    }           
    
    public function render()
    {        
        return view('livewire.norma.test.ketujuh');
    }

}
