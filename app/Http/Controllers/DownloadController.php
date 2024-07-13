<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{

    public function __construct(){

        $setting = Setting::where('name' , 'halaman_download')->first();

        if($setting->value == "0"){
            abort(403, "Mohon maaf halaman download belum tersedia");
        }
    }


    public function index(){

        $data_download = Download::get();

        return view('halaman-download' , compact('data_download'));
    }


    public function download(Download $download){

        // $download = Download::where('download', $download)->first();

      $download->jumlah_download += 1;
      $download->save();

       return redirect( asset( 'storage/' . $download->file) );

    }
}
