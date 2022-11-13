<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class Ujian extends Component
{
    public $step = 1;
    public function render()
    {
        return view('livewire.member.ujian');
    }

    public function berikutnya(){

        $this->step += 1;
    }
}
