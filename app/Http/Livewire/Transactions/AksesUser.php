<?php

namespace App\Http\Livewire\Transactions;

use App\Models\Transaction;
use Livewire\Component;

class AksesUser extends Component
{
    public $transaction; 

    public function mount(Transaction $transaction){

        $this->transaction = $transaction;

    }

    public function render()
    {
        return view('livewire.transactions.akses-user')->extends('layouts.admin')->section('main-content');
    }
}
