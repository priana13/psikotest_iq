<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizWu;
use DB;

class Kedelapan extends Component 
{
    protected $debug = true;    
    protected $listeners = ['wuMulai','wuSebelumnya','wuSelanjutnya'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizWu;
    public $NormaWu;
    public $user_id;
    public $answer;


    

    public function wuMulai($testId){        
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
    public function wuSebelumnya($testId, $questionNumber)
    {
        $this->user_id = auth()->user()->id;    
        $no = $questionNumber; 
        $listSoal = QuizWu::select('no')->orderBy('no', 'desc')->get();
        $beforeNumber = null;
        foreach ($listSoal as $key => $value) {
            if ($value->no < $no) {
                $beforeNumber = $value->no;
                break;
            }
        }        
        $before = ($beforeNumber !== null)?$beforeNumber: $questionNumber;    
        $QuizWu = QuizWu::where('test_id', $testId)->where('no', $before)->first();
        if($QuizWu)  {
            $this->QuizWu = json_decode(json_encode($QuizWu), true);
            $NormaTestWu = NormaTest::where('test_id', $testId)
                        ->where('user_id',$this->user_id)
                        ->where('quiz_id',$QuizWu->id)
                        ->first();
            $this->answer = ($NormaTestWu)? $NormaTestWu->j: null;            
        }

        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->where('norma_test_log.status', '=', 1)
            ->where('norma_test_log.user_id', '=', $this->user_id)
            ->where('norma.tipe', '=', 8)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;
        $this->nama_test = ($testLog) ? $testLog->nama : null;                      
       
        if($testLog->waktu_test != null){
             $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = ($testLog) ? Carbon::parse($testLog->waktu_mulai) : null;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->wuSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));
                $this->emit('timerUpdated', $this->waktu_test);
            }

            $this->waktu_mulai = ($testLog) ? Carbon::parse($testLog->waktu_mulai) : null; // Convert to Carbon
            
        }else{
            $this->emit('reloadPage');    
        }

      
       
    }

    public function wuSelanjutnya($testId, $questionNumber)
    {
        $this->user_id = auth()->user()->id;   

        $no = $questionNumber; 
        $listSoal = QuizWu::select('no')->orderBy('no', 'asc')->get();
        $nextNumber = null;
        foreach ($listSoal as $key => $value) {
            if ($value->no > $no) {
                $nextNumber = $value->no;
                break;
            }
        }

        $next = ($nextNumber !== null)? $nextNumber:$questionNumber;    
        $QuizWu = QuizWu::where('test_id', $testId)->where('no', $next)->first();
        if($QuizWu) {
            $this->QuizWu = json_decode(json_encode($QuizWu), true);
            $NormaTestWu = NormaTest::where('test_id', $testId)
                        ->where('user_id',$this->user_id)
                        ->where('quiz_id',$QuizWu->id)
                        ->first();
            $this->answer =($NormaTestWu)?$NormaTestWu->j:null;
        }              

        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->where('norma_test_log.status', '=', 1)
            ->where('norma_test_log.user_id', '=', $this->user_id)
            ->where('norma.tipe', '=', 8)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;                      
       
        if($testLog->waktu_test != null){
             $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = ($testLog) ? Carbon::parse($testLog->waktu_mulai) : null;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->wuSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));
                $this->emit('timerUpdated', $this->waktu_test);
            }

            $this->waktu_mulai = ($testLog) ? Carbon::parse($testLog->waktu_mulai) : null; // Convert to Carbon
            
        }else{
            $this->emit('reloadPage');    
        }

       
    }


    public function wuSelesai($testId){ 
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

        
        $norma = Norma::where('tipe','=',9)->first();
        $this->test_id = ($norma)? ($norma->id):0;

        NormaTestLog::updateOrCreate(
            ['user_id' => $this->user_id,'test_id' => $this->test_id],
            [
                'waktu_test' => $norma->waktu,
                'nomor_test'    => $userNorma->nomor_test,                
                'status'        => 0,
                'waktu_mulai'   => Carbon::now(),
            ]
        );
        $this->emit('reloadPage');        
    }

    public function updateDatabase($quizId,$questionNumber)
    {       
        $QuizWu =QuizWu::where('id','=',$quizId)->first();
        $NormaWu =Norma::where('tipe','=',8)->first();
       
        $UpdateData = NormaTest::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'test_id' => $this->test_id,
                'quiz_id' => $quizId,
            ],
            [
                'k' => ($QuizWu->k)?? null,
                'j' => $this->answer,
                'nilai' => ($QuizWu->k == $this->answer)? $NormaWu->nilai_min :null  
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
            ->where('norma.tipe', '=', 8)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();

        $this->test_id = ($testLog) ? $testLog->test_id : null;        
        $this->nama_test = ($testLog) ? $testLog->nama : null;       

        if($testLog->waktu_mulai != null){
            $waktu_test = intval($testLog->waktu_test) * 60;
            $waktu_mulai = Carbon::parse($testLog->waktu_mulai) ;
            $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

            if ($batas_waktu->isPast()) {
                $this->wuSelesai($this->test_id);
            } else {
                $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));                
            }

            $this->waktu_mulai =$waktu_mulai; // Convert to Carbon
            
        }
        
        
        $QuizWu = DB::table('quiz_wu')
            ->join('norma', 'norma.id', '=', 'quiz_wu.test_id')
            ->where('norma.tipe', '=', 8)
            ->where('quiz_wu.no', '=', 137)
            ->select('quiz_wu.*', 'norma.tipe', 'norma.waktu')
            ->first();

        $this->QuizWu = ($QuizWu) ? json_decode(json_encode($QuizWu), true) : null;

        $TestWu = DB::table('norma_test')
                    ->join('quiz_wu', 'quiz_wu.id', '=', 'norma_test.quiz_id')           
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->where('quiz_wu.id', '=', $QuizWu->id)
                    ->select('norma_test.*', 'quiz_wu.no')
                    ->first();       


        $this->answer = ($TestWu) ? $TestWu->j : null;     
        
        $NormaWu  = Norma::where('tipe','=',8)->first();
        $this->NormaWu = json_decode(json_encode($NormaWu), true); 
        
    }           
    
    public function render()
    {        
        return view('livewire.norma.test.kedelapan');
    }

}
