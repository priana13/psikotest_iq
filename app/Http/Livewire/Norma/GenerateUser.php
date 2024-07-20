<?php

namespace App\Http\Livewire\Norma;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Replace;
use Illuminate\Support\Facades\File;

class GenerateUser extends Component
{
   
    public string $list_nama;

    public string $password;

    public int $qty;

    public $hasil;

    public function mount(){

        $this->list_nama = '';
    }

    public function render()
    {

        // dd($this->list_nama);

        if($this->list_nama != ''){

            // dd('test');

            $array_nama = preg_split ("/\n/", $this->list_nama);

            $this->qty = count($array_nama);
        }

        return view('livewire.norma.generate-user')->extends('layouts.admin')->section('main-content');
    }

    public function generate(){

        $this->validate([           
            'list_nama' => 'required'           
        ]);

        $array_nama = preg_split ("/\n/", $this->list_nama);

       $hasil = "";

       foreach ($array_nama as $nama) {

                $nama_email = strtolower( str_replace(' ','',$nama) );    
                
                // dd($nama_email);

                $cek = User::where('email' , $nama_email . "@arstamedia.com")->first();

                // dd($cek);

                if($cek){
                    $rand = rand(10,1000);
                    $email =  $nama_email . $rand .'@arstamedia.com';
                }else{
                    $email =  $nama_email . '@arstamedia.com';
                }

                $rand_password = rand(50000, 400000);

                User::create([ 
                    'name' => $nama,
                    'email' => $email,
                    'level' => 'user',
                    // 'hp' => $this->hp,
                    // 'kota' => $this->kota,
                    'password' => Hash::make( $rand_password ),
                    'string_password' => $rand_password
                ]);

                $hasil .= "Nama: " . $nama . "</br> Email: " .  $email . '</br>Password: ' . $rand_password . '</br> </br>';              


       }

       $this->hasil = $hasil;


        // Tentukan nama file dan isi konten
        $filename = time() . '_generate_user.txt';

        // Tentukan path penyimpanan file
        $path = storage_path('app/public/' . $filename);

        // Buat file dan tulis konten ke dalamnya
        File::put($path, $this->hasil);


       $this->resetValue();

       
    }

    public function resetValue(){

        $this->list_nama = '';
        $this->password = '';
        $this->qty = 0;
    }
}
