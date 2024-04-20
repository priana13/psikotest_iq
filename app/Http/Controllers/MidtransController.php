<?php

namespace App\Http\Controllers;

use App\Jobs\CompletedEmailJob;
use App\Mail\CompletedOrderMail;
use App\Mail\OrderMail;
use Mail;
use App\Models\Membership;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;



class MidtransController extends Controller
{

   public $transaksi;

   public $notif;

   public $va_number = null;

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

            $transaksi = Transaction::where('code', $order_id)->first();

            $this->transaksi = $transaksi;

            $this->notif = $notif;                

            $payment_type = $notif->payment_type;

            if($payment_type == 'echannel'){

              $echannel = [
                'biller_code' =>  $notif->biller_code,
                'bill_key' =>  $notif->bill_key
              ];

              $this->va_number = "Bill Code: " . $notif->biller_code . ", Bill Key: " . $notif->bill_key;

            }elseif( in_array($payment_type , ['gopay', 'qris']) ){ 

              $this->va_number = '-';

            }else{

              $va_number    = $notif->va_numbers[0]; 
              $this->va_number = $notif->va_numbers[0]->va_number;  

              
            }

            // dd($this->va_number);
          

            // inisialisasi woo wa
            // $whatsapp_notif = new Woowa();
          
            $transaction = $notif->transaction_status;         

            $type = $notif->payment_type;           
            $fraud = $notif->fraud_status;

            /** Ambil data konfirmasi */
                     
         
          if ($transaction == 'capture') {
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {

                // $donation->setStatusPending();

              } else {

                // $donation->setStatusSuccess();

              }

            }
          } elseif ($transaction == 'settlement') {

            $transaksi->status = 'completed';  
            
            if($transaksi->lokasi_test == 'Online'){

                // tambahkan langganan sesuai paket yang dipesan
                $hari_ini = Carbon::now(); 
                $bulan_depan = $hari_ini->addMonth($transaksi->qty);

                Membership::create([ 
                  'user_id' => $transaksi->user_id,
                  'member_type' => "Langganan",
                  'start' =>  Carbon::now(),
                  'end' => $bulan_depan,
                  'status' => "active",
                  'package_id' => $transaksi->package_id
                ]);

            }
            
            /**Kirim notifikasi ke whatsap */
                

            	/**
               * kirim notifikasi ke email
               */

               $this->send_completed_mail();
    
          } elseif($transaction == 'pending'){ 
              
            
            // kiri pesan whatsapp pending                     

            
              	/**
                 * kirim notifikasi ke email
                 */

                $this->sendPendingMail();
                
                // $donation->save();

          } elseif ($transaction == 'deny') {

            $transaksi->status = 'deny';

          } elseif ($transaction == 'expire') {

            $transaksi->status = 'expired';

          } elseif ($transaction == 'cancel') {

            $transaksi->status = 'cancel';

          }


          $transaksi->save();

        // penutup db transaction
        // });
    }


    public function callback(){

        /**
         * notifikasi pending 
            {
                "va_numbers": [
                  {
                    "va_number": "39916370765",
                    "bank": "bca"
                  }
                ],
                "transaction_time": "2022-12-14 21:37:33",
                "transaction_status": "pending",
                "transaction_id": "90b6e343-3c4f-405b-bb30-dd2ad1653da8",
                "status_message": "midtrans payment notification",
                "status_code": "201",
                "signature_key": "5e1728073f7dcb7a2c9c17b6c32feef415244140c426b8937c8872970cca3e55bb8ca6b812c4e661bd66dce936dbafb759eba448b3d8cc0621311feb9b1454a5",
                "payment_type": "bank_transfer",
                "payment_amounts": [],
                "order_id": "6399dfa708f1a",
                "merchant_id": "G094939916",
                "gross_amount": "195000.00",
                "fraud_status": "accept",
                "currency": "IDR"
              } 
        * 
        * Notif Pending khusus mandiri 

        {
          "transaction_time": "2023-01-18 13:38:06",
          "transaction_status": "settlement",
          "transaction_id": "437050cf-0628-4857-8bc8-c59c93f682c9",
          "status_message": "midtrans payment notification",
          "status_code": "200",
          "signature_key": "166f800895588135b84d7774879cdf8a29465084a8d65b19255898356383f9d8a432a0e8a58b65965c80cb2f7363cae657c23d7b8b18da8256fc9e20356fea6c",
          "settlement_time": "2023-01-18 13:41:00",
          "payment_type": "echannel",
          "order_id": "63c793caef1a2",
          "merchant_id": "G239288898",
          "gross_amount": "10000.00",
          "fraud_status": "accept",
          "expiry_time": "2023-01-19 13:38:06",
          "currency": "IDR",
          "biller_code": "70012",
          "bill_key": "290682496819"
        }

        * 
        * notifikasi sukses
        * {
          "va_numbers": [
            {
              "va_number": "39916370765",
              "bank": "bca"
            }
          ],
          "transaction_time": "2022-12-14 21:37:33",
          "transaction_status": "settlement",
          "transaction_id": "90b6e343-3c4f-405b-bb30-dd2ad1653da8",
          "status_message": "midtrans payment notification",
          "status_code": "200",
          "signature_key": "6aff67d1176d6158c8dc63ed796e6e2502c07474ce7f5a5d334c7c0905e159f1e55555673d42b346e9074231cc805c658890367599b8d0abdeca65862c2d5444",
          "settlement_time": "2022-12-14 21:39:54",
          "payment_type": "bank_transfer",
          "payment_amounts": [],
          "order_id": "6399dfa708f1a",
          "merchant_id": "G094939916",
          "gross_amount": "195000.00",
          "fraud_status": "accept",
          "currency": "IDR"
        }

        *
        *
        Gopay

          {
            "transaction_type": "off-us",
            "transaction_time": "2023-01-17 08:52:33",
            "transaction_status": "expire",
            "transaction_id": "37b462eb-eb09-4283-b15c-018a2f85389b",
            "status_message": "midtrans payment notification",
            "status_code": "202",
            "signature_key": "74f2537af3bbf78a6722a9096ef193e0f2cb307928c5819b25571fa0e19f5e5287c07daf7a5d310bb17f3988ebc698a1a1a420d8a8caa61a583f5fe7a312cb7e",
            "reference_id": "01202301170152335hzcV84OGyID",
            "payment_type": "qris",
            "order_id": "63c5ff5c2bf8e",
            "merchant_id": "G239288898",
            "gross_amount": "10000.00",
            "fraud_status": "accept",
            "expire_time": "2023-01-17 09:07:33",
            "currency": "IDR",
            "acquirer": "gopay"
          }


        * 
        */


      
    }
    
    /**
     * Method sendPendingMail
     *
     * @return void
     */
    public function sendPendingMail(){       

      Mail::to($this->getEmail($this->transaksi))->send(new OrderMail($this->transaksi , $this->notif , $this->va_number));

    }

    
    /**
     * Method send_completed_mail
     *
     * @return void
     */
    public function send_completed_mail(){
   
      // Mail::to( $this->getEmail($this->transaksi) )->send(new CompletedOrderMail($this->transaksi));

      CompletedEmailJob::dispatch($this->transaksi);
      
    }
    
    /**
     * Method getEmail
     *
     * @param $transaksi $transaksi [explicite description]
     *
     * @return string
     */
    public function getEmail($transaksi): string
    {

      $email = ($transaksi->lokasi_test == 'Online')? 
                $transaksi->user->email: 
                $transaksi->email;  

      return $email;
    }


}
