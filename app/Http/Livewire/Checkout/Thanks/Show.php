<?php

namespace App\Http\Livewire\Checkout\Thanks;

use App\Models\TransactionMidtran;
use Livewire\Component;

class Show extends Component
{
    public $transaksi; 
    public $snapToken;
    public $status_transaksi;

    public function mount($transaksi){

        $this->transaksi = $transaksi;
        $this->status_transaksi = $this->transaksi->status;

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds =config('services.midtrans.is3ds');




    }


    public function render()
    {      

        $this->payMidtrans();



        return view('livewire.checkout.thanks.show');
    }


    public function payMidtrans(){
     

        $payload = [
            'transaction_details' => [
                'order_id'      => uniqid(),
                'gross_amount'  => $this->transaksi->nominal,
            ],
            'customer_details' => [
                'first_name'    => $this->transaksi->user->nama,
                'email'         => $this->transaksi->user->email,
                // 'phone'         => '08888888888',
                // 'address'       => '',
            ],
            'item_details' => [
                [
                    'id'       => $this->transaksi->package->id,
                    'price'    => $this->transaksi->package->price,
                    'quantity' => 2,
                    'name'     => $this->transaksi->package->name,
                ]
            ],
            // pilihan bank channel
            // 'enabled_payments'=> [$donation->channel]

        ];
      

        if($this->transaksi->midtrans->count() > 0){           
          
            $this->snapToken = $this->transaksi->midtrans->first()->snap_token;

        }else{

            $this->snapToken = \Midtrans\Snap::getSnapToken($payload);
        
            $this->transaksi->payment_type = 'midtrans';
            $this->transaksi->save();

        }


        $cek_transaksi_midtrans = TransactionMidtran::where('transaction_id' , $this->transaksi->id)->get();

        if($cek_transaksi_midtrans->count() < 1){

            // insert ke table transactio midtrans
            TransactionMidtran::create([
                'transaction_id' => $this->transaksi->id,            
                'snap_token' => $this->snapToken,
                'status' => 'Pending' 
            ]);

        }


     

    }
}
