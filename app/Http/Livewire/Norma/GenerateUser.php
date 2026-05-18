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

    public string $generate_by = 'qty';

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

        if($this->generate_by === 'list') {
            $this->generateListName();
        } else {
            $this->generateByQty();
        }
    }

    public function generateByQty(){

        $this->validate([           
            'qty' => 'required|numeric|min:1'           
        ]);

        $hasil = "";

        for ($i=0; $i < $this->qty; $i++) { 
            
            $username  = $this->randomAlphanumeric(7);

            $email =  $username . "@gemapersona.com";

            $cek = User::where('email' , $email)->orWhere('username', $username)->first();

            if($cek){
                $username = $this->randomAlphanumeric(7);
                $email =  $username . "@gemapersona.com";
            }

            $rand_password = $this->randomNumeric(6);

            User::create([ 
                'name' => 'Anonim',
                'email' => $email,
                'level' => 'user',
                'username' => $username,
                // 'hp' => $this->hp,
                // 'kota' => $this->kota,
                'password' => Hash::make( $rand_password ),
                'string_password' => $rand_password
            ]);

            $hasil .= "Username: " . $username . "</br> Email: " .  $email . '</br>Password: ' . $rand_password . '</br> </br>';

        }

        $this->hasil = $hasil;

        session()->flash('message', 'Generate user berhasil');

        $this->resetValue();
    }

    public function generateListName(){

        $this->validate([           
            'list_nama' => 'required'           
        ]);

        $array_nama = preg_split ("/\n/", $this->list_nama);

       $hasil = "";

       foreach ($array_nama as $nama) {

                $nama_email = strtolower( str_replace(' ','',$nama) );    
                
                // dd($nama_email);

                $cek = User::where('email' , $nama_email . "@gemapersona.com")->first();

                // dd($cek);

                if($cek){
                    $rand = rand(10,1000);
                    $email =  $nama_email . $rand .'@gemapersona.com';
                }else{
                    $email =  $nama_email . '@gemapersona.com';
                }

                $rand_password = rand(50000, 400000);

                User::create([ 
                    'name' => 'Anonim',
                    'email' => $email,
                    'level' => 'user',
                    'username' => $nama_email,
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


    // 1. Kombinasi angka dan huruf (alphanumeric)
    function randomAlphanumeric(int $length = 8): string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
    }

    // 2. Angka saja
    function randomNumeric(int $length = 8): string
    {
        $min = (int) str_pad('1', $length, '0');         // 10000000
        $max = (int) str_pad('9', $length, '9');         // 99999999
        return (string) random_int($min, $max);
    }


}
