<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\ExamItem;

class ListNomor extends Component
{
    public $exam;
    public $examEvent;
    public $sudah_dijawab;
    public $jawaban;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($exam,$examEvent){

        $this->exam = $exam;
        $this->examEvent = $examEvent;
    }

    public function render()
    {
        // $this->sudah_dijawab = [];

        $this->sudah_dijawab = ExamItem::where('examevent_id' , $this->examEvent->id )->pluck('question_id')->toArray();   

        $this->jawaban = ExamItem::where('examevent_id' , $this->examEvent->id )->pluck('jawaban','question_id')->toArray(); 
        
        // dd($this->sudah_dijawab);

        return view('livewire.member.list-nomor');
    }

    public function getSoal($no){ 

        $this->emit('getSoal' , $no);
    }
}
