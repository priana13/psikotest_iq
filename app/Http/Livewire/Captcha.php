<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Captcha extends Component
{
    public $captcha;

    public function mount(){
        
        $this->captcha = captcha_img();

    }

    public function render()
    {
        return view('livewire.captcha');
    }

    public function refresh(){

        $this->captcha = captcha_img();

    }
}
