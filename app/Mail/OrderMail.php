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
            "name" => $this->transaksi->user->name,
            'nominal' => $this->transaksi->nominal, 
            'payment_type' => $this->notif->payment_type           
        ];

        $va = $this->va_number;
        $bank = strtoupper($this->notif->va_numbers[0]->bank);

        return $this->markdown('mail.order-mail', compact('transaksi', 'va' , 'bank'));
    }
}
