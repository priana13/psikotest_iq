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

    public function __construct($transaksi , $notif)
    {
        $this->transaksi = $transaksi;

        $this->notif = $notif;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $data = [
            'code' => $this->transaksi->code,
            "name" => $this->transaksi->user->name,
            'nominal' => $this->nominal, 
            'payment_type' => $this->notif->payment_type,
            'va_number' => $this->notif->va_numbers[0]
        ];

        return $this->markdown('mail.order-mail', compact('data'));
    }
}
