<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class ListNomor extends Component
{
    public $exam;

    public function mount($exam){

        $this->exam = $exam;
    }

    public function render()
    {

        return view('livewire.member.list-nomor');
    }

    public function getSoal($no){     

        $this->emit('getSoal' , $no);
    }
}
