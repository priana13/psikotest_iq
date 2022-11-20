<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Question;
use App\Models\Exam;
use App\Models\ExamItem;
use App\Models\ExamEvent;
use Carbon\Carbon;

class UjianKolom extends Component
{

    public $exam , $examEvent;
    
    public function mount($examid , $examEvent){

        $this->exam = Exam::find($examid);       
        $this->examEvent = $examEvent;

    }

    public function render()
    {
        return view('livewire.member.ujian-kolom');
    }


  

}
