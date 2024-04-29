<?php

namespace App\Http\Controllers\Offline;

use App\Models\User;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PesertaOfflineController extends Controller
{
    public function registrasi(Request $request){

        $form_status = Setting::where('name', 'form_status')->first();  
        
        // dd($form_status);

        if($form_status->value !== "1"){

            abort(403 , "Mohon maaf untuk sementara pendaftaran sudah melebihi kapasitas / ditutup");

        }


        return view('offline.registrasi_offline');
    }

    public function store(Request $request){

        // return $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',            
        ]);


        // 1. insert ke table user 

        // $pendaftar = User::where('email', $request->email)->first();

        // if(!$pendaftar){
        //     $pendaftar = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'minat' => $request->minat,
        //         'alamat' => $request->alamat,
        //         'hp' => $request->hp,
        //         'jenis_kelamin' => $request->jenis_kelamin,
        //         'level' => "user",  
        //         'lokasi_test' => "Offline"            
        //     ]);
        // }           


        // 2. insert ke table transaction 

        $biaya_offline = Setting::where('name','biaya_offline')->first();

        // $email = (Auth::check()) ? auth()->user()->email : 'peserta@arstamedia.com'; 
        
        $email = $request->email;     

        $transaction = Transaction::create([ 			
			// 'package_id' => $this-> package_id,
            'code' => \uniqid(),
			// 'payment_method_id' => 1,
			'nominal' => $biaya_offline->value,
            'total' => $biaya_offline->value,
			'status' => "Pending",
            "lokasi_test" => "Offline",
            "qty" => 1,
            "nama" => $request->name,
            "email" => $email,
            "alamat" => $request->alamat,
            "minat" => $request->minat,
            "hp" => $request->hp,
            "minat" => $request->minat,
            "jenis_kelamin" => $request->jenis_kelamin
        ]);

       return \redirect()->route('offline.pembayaran', $transaction->id);

        // 3. redirect ke halaman pembayaran
    }


    public function pembayaran(Transaction $transaction){
       
        return view('offline.pembayaran' , \compact('transaction'));
    }
}
