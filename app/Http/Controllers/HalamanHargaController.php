<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class HalamanHargaController extends Controller
{
    public function index(){

        $list_paket = Package::all();

        return view('pages.harga' , compact('list_paket'));
    }
}
