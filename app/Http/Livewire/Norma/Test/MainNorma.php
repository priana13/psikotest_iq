<?php

namespace App\Http\Livewire\Norma\Test;

use Livewire\Component;
use App\Models\NormaTestLog;
use App\Models\Norma;
use App\Models\User;
use DB;

class MainNorma extends Component
{
    protected $debug = true;  
    protected $listeners = ['mainCallBack'];  

    public $prompt;
    public $tipe = 1;
    public $clue;
    

    public function mainCallBack($tipe,$clue){
        $this->tipe = $tipe;
        $this->clue = $clue;
        $this->prompt = 'Mulai reverse';        
    }

    
    public function mount()
    {
        $userId = auth()->user()->id;

        $testLog = DB::table('norma_test_log')
            ->whereIn('status', [0,1])
            ->where('user_id', '=', $userId)
            ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')
            ->select('norma_test_log.*','norma.id' ,'norma.tipe')
            ->first();


        $this->test_id = ($testLog)? $testLog->test_id:null;

        if ($testLog) {

            $this->tipe = $testLog->tipe; // 1,2,3 sd 12

        } else {
            if((DB::table('norma_test_log')->where('status', '=', 2)->where('tipe', '=', 10)->where('user_id', '=', $userId)
                ->join('norma', 'norma.id', '=', 'norma_test_log.test_id')->select('norma_test_log.*', 'norma.tipe')->exists()))
            {
                $this->tipe = 12 ;
            }else{
                $this->tipe = 11;
                $this->clue = "Start New Norma";
                
                $this->emit('userNormaShow',$this->tipe,$this->clue);

            }
            
        }         
      
        
        $this->prompt = json_encode($testLog);
    }

    
    public function render()
    {
        
        return view('livewire.norma.test.main-norma')->extends('layouts.admin')->section('main-content');
    }
}
