<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\CompletedOrderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CompletedEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $transaksi; 

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        Mail::to( $this->getEmail($this->transaksi) )->send(new CompletedOrderMail($this->transaksi));

    }
}
