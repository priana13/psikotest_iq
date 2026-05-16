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
        if ($testLog && $testLog->tipe == 1) {
            $this->tipe = 1;             
        } elseif ($testLog && $testLog->tipe == 2) {
            $this->tipe = 2;
        } elseif ($testLog && $testLog->tipe == 3) {
            $this->tipe = 3;
        } elseif ($testLog && $testLog->tipe == 4) {
            $this->tipe = 4;
        } elseif ($testLog && $testLog->tipe == 5) {
            $this->tipe = 5;
        } elseif ($testLog && $testLog->tipe == 6) {
            $this->tipe = 6;
        } elseif ($testLog && $testLog->tipe == 7) {
            $this->tipe = 7;
        } elseif ($testLog && $testLog->tipe == 8) {
            $this->tipe = 8;
        } elseif ($testLog && $testLog->tipe == 9) {
            $this->tipe = 9;
        } elseif ($testLog && $testLog->tipe == 10) {
            $this->tipe = 10;
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
        
        return view('livewire.norma.test.main-norma')->extends('layouts.admin-new')->section('main-content');
    }
}
