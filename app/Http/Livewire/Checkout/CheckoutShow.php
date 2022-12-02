<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;

class CheckoutShow extends Component
{
    public $product="bulanan",
            $qty= 1, 
            $nama,
            $hp,
            $email,
            $alamat, 
            $harga, 
            $total,
            $disc=0,
            $ppn=0;
    
    public function render()
    {
        if($this->qty == ''){$this->qty = 0;}

        $this->harga = 200000;

        $this->total = $this->harga * $this->qty;

        return view('livewire.checkout.checkout-show');
    }

    public function store(){

        return redirect()->route('checkout.thanks' , 1);


    }
}
