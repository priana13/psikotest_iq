<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MidtransController extends Controller
{

    public function __construct(){

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds =config('services.midtrans.is3ds');


}

    
    public function notif(Request $request)
    {

        $notif = new \Midtrans\Notification();        

        // \DB::transaction(function() use($notif) {

            //midtrans notif 
            $order_id = $notif->order_id;

            // query ke table transaksi di sini            

            $va_number    = $notif->va_numbers[0]; 

            $echannel = [
              'biller_code' =>  $notif->biller_code,
              'bill_key' =>  $notif->bill_key
            ];
            

            $payment_type = $notif->payment_type;

            // inisialisasi woo wa
            // $whatsapp_notif = new Woowa();
          
            $transaction = $notif->transaction_status;         

            $type = $notif->payment_type;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;

            /** Ambil data konfirmasi */
                     
         
          if ($transaction == 'capture') {
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                $donation->setStatusPending();
              } else {
                $donation->setStatusSuccess();
              }

            }
          } elseif ($transaction == 'settlement') {

            $donation->setStatusSuccess();

            // $donatur = Prospek::findorFail($data_konfirmasi->prospek_id);
            // $donatur->status_donor= "donatur";
            // $donatur->last_donation = $data_konfirmasi->tanggal;
            // $donatur->save();
            
            /**Kirim notifikasi ke whatsap */
                

            	/**
               * kirim notifikasi ke email
               */
    
          } elseif($transaction == 'pending'){
             
            //   $donation->setStatusPending();
            
              // input nomor va ke table konfirmasi
              
            //   if($payment_type == 'echannel'){
            //      $donation->va_number = $notif->bill_key;
            //      $donation->com_code = $notif->biller_code;
            //   }else{
            //      $donation->va_number = $notif->va_numbers[0]->va_number;
            //   }
              
            
            // kiri pesan whatsapp pending                     

            
              	/**
                 * kirim notifikasi ke email
                 */

                // Mail::to($donation->email)->send(new NotifPending($donation));
                
                // $donation->save();

          } elseif ($transaction == 'deny') {

              $donation->setStatusFailed();

          } elseif ($transaction == 'expire') {

              $donation->setStatusExpired();

          } elseif ($transaction == 'cancel') {

              $donation->setStatusFailed();

          }

        // penutup db transaction
        // });
    }


}
