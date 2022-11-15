<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Question;
use App\Models\Exam;
use App\Models\ExamItem;

class Ujian extends Component
{
    public $step = 1;
    public $examid;
    public $exam;
    public $soal;
    public $total;
    public $jawaban;

    public function mount($examid){

        $this->exam = Exam::find($examid);       

    }


    public function render()
    {
       $this->soal = $this->exam->questions()->step($this->step)->first();   
       $this->total = $this->exam->questions->count();   
       
        return view('livewire.member.ujian');
    }

    public function berikutnya(){
        
        $this->validate([
            'jawaban' => 'required'
        ]);

        ($this->soal->kc_jawaban == $this->jawaban)? $hasil = true:$hasil = false;      

        // input ke table ujian di sini
        ExamItem::create([
            'user_id' => auth()->user()->id,
            'question_id' => $this->soal->id,
            'jawaban' => $this->jawaban,
            'is_true' => $hasil
        ]);

        $this->step += 1;
        $this->jawaban = '';
    }


}
