<?php

namespace App\Http\Controllers\Offline;

use App\Models\User;
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

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'minat' => $request->minat,
                'alamat' => $request->alamat,
                'hp' => $request->hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'level' => "user",               
            ]);


        // 2. insert ke table transaction 

        $transaction = Transaction::create([ 
			'user_id' => $user->id,
			// 'package_id' => $this-> package_id,
            'code' => \uniqid(),
			// 'payment_method_id' => 1,
			'nominal' => 100000,
			'status' => "Pending",
            "lokasi_test" => "Offline",
            "qty" => 1,
        ]);

        return $transaction;


        // 3. redirect ke halaman pembayaran
    }
}
