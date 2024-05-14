<?php

namespace App\Exports;

use Carbon\Traits\Date;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPesertaOffline implements FromCollection , WithMapping , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transactions = Transaction::offline()->get();

        return $transactions;       
    }

        /**
    * @var Transaction $invoice
    */
    public function map($transaksi): array
    {
        
        return [
            $transaksi->id,
            $transaksi->nama, 
            $transaksi->jenis_kelamin,
            $transaksi->hp,
            $transaksi->minat,
            $transaksi->alamat,
            $transaksi->email,
            $transaksi->status,
            $transaksi->created_at->format('d-m-Y')

        ];
    }


    public function headings(): array
    {
        return [
          "id",
          "Nama",
          "Jenis Kelamin",
          "No Hp",
          "Minat",
          "Alamat",
          "Email",
          "Status Pembayaran",
          "Tgl Transaksi"
        ];
    }

    
}
