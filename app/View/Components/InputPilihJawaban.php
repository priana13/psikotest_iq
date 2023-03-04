<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputPilihJawaban extends Component
{
    public $pilihan,
           $value,          
           $textSoal,
           $questionId,
           $gambar;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pilihan, $value = 1,$textSoal,$questionId, $gambar)
    {       
        $this->pilihan = $pilihan;
        $this->value = $value;       
        $this->textSoal = $textSoal;
        $this->questionId = $questionId;
        $this->gambar = $gambar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-pilih-jawaban');
    }
}
