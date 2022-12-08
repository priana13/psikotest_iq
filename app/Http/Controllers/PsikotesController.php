<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PsikotesController extends Controller
{
    public function soal($id){

        return view('livewire.questions.index', compact('id'));

    }
}
