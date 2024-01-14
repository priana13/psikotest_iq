<?php

namespace App\Http\Livewire\Norma\Quiz\Zr;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Norma;

class ZrNorma extends Component
{
    use WithFileUploads;
    protected $debug = true;    
    public $prompt;    


    /*----- Norma Test --------*/
    public $nama;
    public $nilai_min;
    public $waktu;
    public $petunjuk_kesatu;
    public $petunjuk_kedua;
    public $file_petunjuk;
    public $test_id;
    

    public function simpanTestZr(){      
        $img_petunjuk = null;        
        if (!empty($this->file_petunjuk)) {
            if (is_object($this->file_petunjuk) && method_exists($this->file_petunjuk, 'storeAs')) {               
                $img_petunjuk = uniqid('petunjuk_an__') . now() . '.' . $this->file_petunjuk->extension();
                $this->file_petunjuk->storeAs('public/photos', $img_petunjuk);
            } else {                
                $img_petunjuk = $this->file_petunjuk;
            }
        }  
        $normaTest = Norma::updateOrCreate(
            ['id' => $this->test_id, 'tipe' => 6],
            [
                'nama'              => $this->nama,
                'nilai_min'         => 1,
                'waktu'             => $this->waktu,
                'petunjuk_kesatu'    => $this->petunjuk_kesatu,
                'petunjuk_kedua'     => $this->petunjuk_kedua,
                'file_petunjuk'     => $img_petunjuk !== null ? $img_petunjuk : $this->file_petunjuk
            ]
        );

        session()->flash($normaTest ? 'success' : 'error', $normaTest ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');
    }

    public function mount(){     
        $this->test = Norma::where('tipe', '=', 6)->first();
        $this->test_id = optional($this->test)->id;
        $this->nama = optional($this->test)->nama ?? 'INTELLIGENCE STRUCTURE TEST ZR - 06';
        $this->waktu = optional($this->test)->waktu ?? 0;
        $this->nilai_min = optional($this->test)->nilai_min ?? 0;   
        $this->nilai_min = optional($this->test)->nilai_min ?? 0;   
        $this->petunjuk_kesatu = optional($this->test)->petunjuk_kesatu ?? '';
        $this->petunjuk_kedua = optional($this->test)->petunjuk_kedua ?? '';
        $this->file_petunjuk = optional($this->test)->file_petunjuk ?? '';   
        $this->prompt = $this->test_id;              
    }

    public function render()
    {        
        return view('livewire.norma.quiz.zr.zr-norma');
    }
}

