<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        return view('livewire.checkout.index');
    }

    public function thanks($id){   
        
        $transaksi = Transaction::find($id);
       
        return view('livewire.checkout.thanks.index' , compact('transaksi'));
    }

    public function konfirmasi(){      

        return view('livewire.checkout.konfirmasi.index_konfirmasi');
    }
}
