<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;


class OfflineRegistrations extends Component
{

    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $package_id, $payment_method_id, $nominal, $status;
    public $updateMode = false;

    public $warna_status = [
        'Pending' => 'warning',
        'completed' => 'success',
        'expired' => 'secondary'
    ];
    
    public function render()
    {

        $transactions = Transaction::latest()->whereIn('lokasi_test' , ["Offline"]);
    
	       
        return view('livewire.transactions.offline-registrations',
        [
            'transactions' => $transactions->paginate(10),
        ])
                ->extends('layouts.admin')->section('main-content');
    }
}
