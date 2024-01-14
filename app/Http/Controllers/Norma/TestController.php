<?php

namespace App\Http\Controllers\Norma;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view ('livewire.norma.test.index');
    }
    public function petunjuk(){
        return view ('livewire.norma.petunjuk');
    }
    public function main(){
        return view ('livewire.norma.test.main-norma');
    }
    public function kesatu(){
        return view ('livewire.norma.test.kesatu');
    }
    public function kedua(){
        return view ('livewire.norma.test.kedua');
    }
    public function ketiga(){
        return view ('livewire.norma.test.ketiga');
    }
    public function keempat(){
        return view ('livewire.norma.test.keempat');
    }
    public function kelima(){
        return view ('livewire.norma.test.kelima');
    }
    public function keenam(){
        return view ('livewire.norma.test.keenam');
    }
    public function ketujuh(){
        return view ('livewire.norma.test.ketujuh');
    }
    public function kedelapan(){
        return view ('livewire.norma.test.kedelapan');
    }
    public function mind(){
        return view ('livewire.norma.test.mind');
    }
    public function kesembilan(){
        return view ('livewire.norma.test.kesembilan');
    }
}
