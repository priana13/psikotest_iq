<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestKecermatan extends Component
{
    public $exam;
    public function render()
    {
        $this->exam = 'test';

        return view('livewire.tes-cermat.show');
    }
}
