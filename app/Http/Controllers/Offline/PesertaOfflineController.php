<?php

namespace App\Http\Controllers\Offline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesertaOfflineController extends Controller
{
    public function registrasi(Request $request){

        return view('offline.registrasi_offline');
    }

    public function store(Request $request){

        return $request->all();
    }
}
