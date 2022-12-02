<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        return view('livewire.checkout.index');
    }

    public function thanks(){

        return view('livewire.checkout.thanks.index');
    }

    public function konfirmasi(){      

        return view('livewire.checkout.konfirmasi.index_konfirmasi');
    }
}
