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
    public $waktu;
    public $endtime;
    public $date;
    
    public function mount($examid , $examEvent){

        $this->exam = Exam::find($examid);       
        $this->examEvent = $examEvent;

    }

    public function render()
    {

        // https://carbon.nesbot.com/docs/
        $this->date = Carbon::now();
        $this->endtime = $this->date->addMinutes($this->exam->waktu);
        

        return view('livewire.member.ujian-kolom');
    }


  

}
