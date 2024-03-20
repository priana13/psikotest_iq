<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Psy\Readline\Transient;

class PesertaOfflineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksi_offline = Transaction::offline()->get();

        foreach ($transaksi_offline as $transaksi) {

           if($transaksi->user_id){

            $user = User::find($transaksi->user_id);

            $transaksi = Transaction::where('id', $transaksi->id)
                        ->update([

                            "nama" => $user->name,
                            "email" => $user->email,
                            "alamat" => $user->alamat,
                            "minat" => $user->minat,
                            "hp" => $user->hp,
                            "minat" => $user->minat,
                            "jenis_kelamin" => $user->jenis_kelamin

                        ]);              

           }
        }
    }
}
