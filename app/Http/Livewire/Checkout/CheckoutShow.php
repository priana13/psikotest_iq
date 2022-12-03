<?php

namespace App\Http\Livewire\Checkout;

use App\Models\PaymentMethod;
use App\Models\Package;
use App\Models\Transaction;
use Faker\Provider\ar_EG\Payment;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $product="bulanan",
            $package,
            $qty= 1, 
            $nama,
            $hp,
            $email,
            $alamat, 
            $harga, 
            $payment_method,
            $list_payment_methods,
            $total,
            $disc=0,
            $ppn=0;

    public function mount(){

        $this->list_payment_methods = PaymentMethod::all();
        $this->package = Package::all();

    }

    protected $rules = [
        'product' => 'required',
        'payment_method' => 'required'
    ];

    
    public function render()
    {
        if($this->qty == ''){$this->qty = 0;}
        $this->harga = 200000;
        $this->total = $this->harga * $this->qty;

        $this->nama = auth()->user()->name;
        $this->email = auth()->user()->email;

        return view('livewire.checkout.checkout-show');
    }

    public function store(){

        $this->validate([
            'product' => 'required',
            'payment_method' => 'required'
        ]);

        $transaksi = Transaction::create([

            'user_id' => auth()->user()->id,
            'code' => uniqid(),
            'payment_method_id' => $this->payment_method,
            'nominal' => $this->harga,
            'notes' => 'pesan membership',            
            'package_id' => $this->product
        ]);

        return redirect()->route('checkout.thanks' , $transaksi->id);


    }
}
