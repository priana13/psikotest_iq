<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $transaksi; 
    public $notif;
    public $va_number;

    public function __construct($transaksi , $notif , $va_number)
    {      
        $this->transaksi = $transaksi;

        $this->notif = $notif;
        $this->va_number = $va_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {      
        $transaksi = [
            'code' => $this->transaksi->code,
            "name" => ($this->transaksi->user_id) ? $this->transaksi->user->name : $this->transaksi->nama,
            'nominal' => $this->transaksi->nominal, 
            'payment_type' => $this->notif->payment_type           
        ];

        $va = $this->va_number;

        if($this->notif->payment_type == 'echannel'){

            $bank = "Bank Mandiri";

        }elseif($this->notif->payment_type == 'qris'){

            $bank = "E-Wallet";
            
        }else{

            $bank = strtoupper($this->notif->va_numbers[0]->bank);

        }
        

        return $this->markdown('mail.order-mail', compact('transaksi', 'va' , 'bank'));
    }
}
