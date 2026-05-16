<?php

namespace App\Http\Controllers\Norma;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        return view('test-iq.biodata');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data biodata

        return redirect(route('norma.test.petunjuk'));
    }
}
