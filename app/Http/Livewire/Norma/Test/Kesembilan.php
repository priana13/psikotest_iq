<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizMind;
use DB;

class Kesembilan extends Component 
{
    protected $debug = true;    
    protected $listeners = ['mindMulai'];

    public $prompt;
    public $tipe;
    public $clue;
    public $test_id;
    public $waktu_test;
    public $waktu_mulai;
    public $waktu_selesai;
    public $nama;
    public $QuizMind;
    public $NormaMind;
    public $user_id;

    public $mulai = false;

    public $status = 0;

    public function mindMulai($testId){        
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

    public function mulaiSekarang(){

        $this->mulai = true;

        NormaTestLog::where('user_id', $this->user_id)->where('test_id', $this->test_id)
                      ->update(['status' => 1 ]);
        
        $this->status = 1;

        // $this->emit('reloadPage');     
        // NormaTestLog::updateOrCreate(
        //     ['user_id' => $this->user_id,'test_id'=>$this->test_id],
        //     [                    
        //         'status' => 1
        //     ]
        // );
    }

    public function mindSelesai($testId){ 
        
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

        
        $norma = Norma::where('tipe','=',10)->first();
        $this->test_id = ($norma)? ($norma->id):0;

        NormaTestLog::updateOrCreate(
            ['user_id' => $this->user_id,'test_id' => $this->test_id],
            [
                'nomor_test'    => $userNorma->nomor_test,
                'waktu_test'    => $norma->waktu,
                'waktu_mulai'   => Carbon::now(),                      
                'status'        => 1
            ]
        );
        $this->emit('reloadPage');        
    }

    public function mount()
    { 
        $this->user_id = auth()->user()->id;

        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->whereIn('norma_test_log.status', [0,1])
            ->where('norma_test_log.user_id', '=', $this->user_id)
            ->where('norma.tipe', '=', 9)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu', 'norma.nama')
            ->first();

        $this->status = $testLog->status; 

        // dd($testLog);

        if ($testLog) { // Check if $testLog is not null
            $this->test_id = $testLog->test_id;
            $this->nama_test = $testLog->nama;

            // dd($testLog->waktu_test);

            $this->waktu_test = $testLog->waktu_test * 60;

            if ($testLog->waktu_mulai != null) {
                $waktu_test = ($testLog->waktu_test * 60);
                $waktu_mulai = Carbon::parse($testLog->waktu_mulai);
                $batas_waktu = $waktu_mulai->addSeconds($waktu_test);

                // dd($batas_waktu->isPast());

                if ($batas_waktu->isPast()) {
                    $this->mindSelesai($this->test_id);
                } else {
                    $this->waktu_test = max(0, $batas_waktu->diffInSeconds(Carbon::now()));
                }

                $this->waktu_mulai = $waktu_mulai; // Convert to Carbon
            }
        }

        $QuizMind = DB::table('quiz_mind')
            ->join('norma', 'norma.id', '=', 'quiz_mind.test_id')
            ->where('norma.tipe', '=', 9)
            ->select('quiz_mind.*', 'norma.tipe', 'norma.waktu')
            ->get();

        $this->QuizMind = json_decode(json_encode($QuizMind), true);

        $NormaMind  = Norma::where('tipe','=',9)->first();
        $this->NormaMind = json_decode(json_encode($NormaMind), true); 
    }

    
    public function render()
    {        
        return view('livewire.norma.test.kesembilan');
        
    }
}

