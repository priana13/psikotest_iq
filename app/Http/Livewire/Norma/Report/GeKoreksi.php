<?php

namespace App\Http\Livewire\Norma\Report;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\NormaTest;
use App\Models\NormaTestLog;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\QuizGe;
use DB;

class GeKoreksi extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getKoreksiGe'];

    /*----- Norma Test --------*/    
    public $test;
    public $test_id;

    /*----- Quiz Test WA--------*/
    public $no;    
    public $quiz_id;
    public $quiz;      
    public $gequiz;
    public $user_id;


    public function getKoreksiGe($userId)
    {   
        $this->user_id = $userId;
        $testLog = DB::table('norma_test_log')
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->where('norma_test_log.status', '=', 2)
            ->where('norma_test_log.user_id', '=', $userId)
            ->where('norma.tipe', '=', 4)
            ->select('norma_test_log.*', 'norma.id', 'norma.tipe', 'norma.waktu','norma.nama')
            ->first();
        $this->test_id = ($testLog) ? $testLog->test_id : null;      
       
        for ($i = 61; $i < 77; $i++) { 
            $this->{'nilai' . $i} = null;    

        }    

        $TestGe = DB::table('norma_test')
                    ->join('quiz_ge', 'quiz_ge.id', '=', 'norma_test.quiz_id')   
                    ->where('quiz_ge.id', '!=', null)
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $userId)
                    ->where(function ($query) {
                        $query->where('norma_test.nilai', '=', null)
                            ->orWhere('norma_test.nilai', '=', "");
                    })
                    ->select('norma_test.*', 'quiz_ge.no','quiz_ge.quiz')
                    ->get();  

        
        if($TestGe){
            foreach ($TestGe as $TS => $t) {
                $this->{'nilai' . $t->no} = $t->nilai;                
            }
        }  
        
    }

   

    public function updateDatabase($id,$questionNumber)
    {       
        
        $nilai = $this->{'nilai' . $questionNumber};       
        NormaTest::updateOrCreate(
            [               
                'id' => $id,
            ],
            [                
                'nilai' => $nilai,
                
            ]
        );
    }
   
    public function render()
    {
        $TestGe = DB::table('norma_test')
                    ->join('quiz_ge', 'quiz_ge.id', '=', 'norma_test.quiz_id')   
                    ->where('quiz_ge.id', '!=', null)
                    ->where('norma_test.test_id', '=', $this->test_id)
                    ->where('norma_test.user_id', '=', $this->user_id)
                    ->where(function ($query) {
                        $query->where('norma_test.nilai', '=', null)
                            ->orWhere('norma_test.nilai', '=', "");
                    })
                    ->select('norma_test.*', 'quiz_ge.no','quiz_ge.quiz')
                    ->paginate(10);  
        return view('livewire.norma.report.ge-koreksi',['TestGe'=>$TestGe]);
    }
}
