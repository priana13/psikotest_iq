<?php

namespace App\Http\Controllers;

use App\Models\Confirmation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index(){

        return view('livewire.checkout.index');
    }

    public function thanks($id){   
        
        $transaksi = Transaction::find($id);
       
        return view('livewire.checkout.thanks.index' , compact('transaksi'));
    }

    public function konfirmasi($code){  

        $transaksi = Transaction::where('code', $code)->first();

        return view('livewire.checkout.konfirmasi.index_konfirmasi', compact('transaksi'));
    }

    public function storeKonfirmasi(Request $request){

        $validator = Validator::make($request->all(), [
            'atas_nama' => 'string|required',
            'rek_tujuan' => 'string|required',
            'tanggal_tf' => 'date|required',
            'bukti_transfer' => 'required',
            'jumlah' => 'required'
           
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $bukti_transfer =  $request->bukti_transfer->store('public/bukti_transfer');
		$bukti_transfer = explode('public/' , $bukti_transfer);
		$bukti_transfer = $bukti_transfer[1];	

        $cek = Confirmation::where('transaction_id' , $request->id_transaksi)->first();

        if($cek == null){

            Confirmation::create([
                'transaction_id' => $request->id_transaksi,
                'atas_nama' => $request->atas_nama,
                'rek_tujuan' => $request->rek_tujuan,
                'tanggal_tf' => $request->tanggal_tf,
                'bukti_transfer' => $bukti_transfer,
                'jumlah' => $request->jumlah
            ]);
    

        }


        return view('livewire.checkout.konfirmasi.konfirmasi_finish');


    }
}
