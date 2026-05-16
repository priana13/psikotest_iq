<?php

namespace App\Http\Controllers\Norma;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetunjukController extends Controller
{
    public function index()
    {
        $petunjuk = "Test Petunjuk";

        $user = auth()->user();

        return view('test-iq.petunjuk', compact('petunjuk', 'user'));
    }
}
