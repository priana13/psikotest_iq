<?php

namespace App\Http\Livewire\Norma;

use Livewire\Component;
use App\Models\DataUserNorma;
use App\Models\User;
use App\Models\Norma;
use App\Models\NormaTestLog;

class UserNorma extends Component
{
    protected $debug = true;    
    protected $listeners = ['userNormaShow'];

    public $prompt;
    public $tipe;
    public $clue; 

    public $seconds = 10;


    /*----- Data Norma --------*/
    public $test_id;

    /*----- Data User Norma --------*/
    public $dataUserNorma;
    public $nomor_test;
    public $tgl_lahir;
    public $pendidikan;
    public $instansi;
    public $name;

    public function userNormaShow ($tipe,$clue){
        $this->tipe = $tipe;
        $this->prompt = "userNormaShow ";
    }
    
   
    public function simpanUserNorma(){       
        $this->userId = auth()->user()->id;
        $normaTest = DataUserNorma::updateOrCreate(
            ['user_id' => $this->userId],
            [
                'nomor_test'    => $this->nomor_test,
                'tgl_lahir'     => $this->tgl_lahir,
                'pendidikan'    => $this->pendidikan,
                'instansi'      => $this->instansi
            ]
        );

        $norma = Norma::where('tipe','=',1)->first();
        $this->test_id = ($norma)? ($norma->id):0;

        NormaTestLog::updateOrCreate(
            ['user_id' => $this->userId,'test_id' => $this->test_id],
            [
                'nomor_test'    => $this->nomor_test,                
                'status'        => 1
            ]
        );
        session()->flash($normaTest ? 'success' : 'error', $normaTest ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');
        $this->tipe = 1;
        $this->clue = "simpanUserNorma";
        $this->emit('mainCallBack',$this->tipe,$this->clue);
        
    }
    public function mount(){     
        $this->userId = auth()->user()->id;
        $user = User::find($this->userId);
        $this->name = $user->name;  
        $this->dataUserNorma = DataUserNorma::where('user_id', '=', $this->userId)->first();   
        $this->nomor_test = optional($this->dataUserNorma)->nomor_test;
        $this->tgl_lahir = optional($this->dataUserNorma)->tgl_lahir;
        $this->pendidikan = optional($this->dataUserNorma)->pendidikan;
        $this->instansi = optional($this->dataUserNorma)->instansi;    
       
    }

    public function render()
    {
        return view('livewire.norma.user-norma');
    }
}
