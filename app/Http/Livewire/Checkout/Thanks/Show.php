<?php

namespace App\Http\Livewire\Checkout\Thanks;

use Livewire\Component;

class Show extends Component
{
    public $transaksi; 

    public function mount($transaksi){

        $this->transaksi = $transaksi;

    }


    public function render()
    {      

        return view('livewire.checkout.thanks.show');
    }
}
