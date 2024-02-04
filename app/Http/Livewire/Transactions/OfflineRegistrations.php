<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPesertaOffline;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class OfflineRegistrations extends Component
{
    use LivewireAlert;
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $package_id, $payment_method_id, $nominal, $status;
    public $updateMode = false;

    public $warna_status = [
        'Pending' => 'warning',
        'completed' => 'success',
        'expired' => 'secondary'
    ];

    protected $listeners = [
        'confirmed'
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

    public function download(){

        return Excel::download(new ExportPesertaOffline, 'peserta_offline_'.date('d-m-Y').'.xlsx');

    }

    public function hapus(){

        $this->alert('warning', 'Anda yakin semua data akan dihapus?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya Hapus',
            'onConfirmed' => 'confirmed',
            'showCancelButton' => true,
            'cancelButtonText' => 'Batal',
            'timer' => null,
        ]);

    }


    public function confirmed()
    {
        // Do something

        $transactions = Transaction::latest()->whereIn('lokasi_test' , ["Offline"])->delete();


        $this->alert('success', 'Data derhasil dihapus', [
            'toast' => false,
            'position' => 'center'            
        ]);
    }
}
