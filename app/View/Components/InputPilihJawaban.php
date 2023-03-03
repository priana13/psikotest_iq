<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputPilihJawaban extends Component
{
    public $value,
           $message,
           $text_soal,
           $question_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value = 1, $message = null,$text_soal,$question_id)
    {
        $this->value = $value;
        $this->message = $message;
        $this->text_soal = $text_soal;
        $this->question_id = $question_id;
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
