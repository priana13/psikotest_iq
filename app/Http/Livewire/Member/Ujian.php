<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Question;
use App\Models\Exam;

class Ujian extends Component
{
    public $step = 1;
    public $examid;
    public $exam;
    public $soal;

    public function mount($examid){

        $this->exam = Exam::find($examid);

    }


    public function render()
    {
       $this->soal = $this->exam->questions->first();      
       
        return view('livewire.member.ujian');
    }

    public function berikutnya(){

        $this->step += 1;
    }
}
