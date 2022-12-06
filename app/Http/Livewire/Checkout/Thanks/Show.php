<?php

namespace App\Http\Livewire\Checkout\Thanks;

use Livewire\Component;

class Show extends Component
{
    public $transaksi; 
    public $snapToken;

    public function mount($transaksi){

        $this->transaksi = $transaksi;

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
        $this->snapToken = \Midtrans\Snap::getSnapToken($payload);
        // dd($this->snapToken);
        // $donation->snap_token = $snapToken;
        // $donation->save();

        // $this->response['snap_token'] = $snapToken;


        // return response()->json($this->response);
        

    }
}
