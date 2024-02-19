<?php

namespace App\Http\Controllers\Offline;

use App\Models\User;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesertaOfflineController extends Controller
{
    public function registrasi(Request $request){

        return view('offline.registrasi_offline');
    }

    public function store(Request $request){

        // return $request->all();


        // 1. insert ke table user 

        $pendaftar = User::where('email', $request->email)->first();

        if(!$pendaftar){
            $pendaftar = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'minat' => $request->minat,
                'alamat' => $request->alamat,
                'hp' => $request->hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'level' => "user",  
                'lokasi_test' => "Offline"            
            ]);
        }           


        // 2. insert ke table transaction 

        $biaya_offline = Setting::where('name','biaya_offline')->first();

        $transaction = Transaction::create([ 
			'user_id' => $pendaftar->id,
			// 'package_id' => $this-> package_id,
            'code' => \uniqid(),
			// 'payment_method_id' => 1,
			'nominal' => $biaya_offline->value,
			'status' => "Pending",
            "lokasi_test" => "Offline",
            "qty" => 1,
        ]);

       return \redirect()->route('offline.pembayaran', $transaction->id);

        // 3. redirect ke halaman pembayaran
    }


    public function pembayaran(Transaction $transaction){
       
        return view('offline.pembayaran' , \compact('transaction'));
    }
}
