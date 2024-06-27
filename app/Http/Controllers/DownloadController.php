<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(){

        $data_download = Download::get();

        return view('halaman-download' , compact('data_download'));
    }
}
