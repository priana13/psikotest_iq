<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Question;

class ItemSoalKolom extends Component
{
    public $list_nomor;
    public $i = 1;
    public $soal;
    public $soal_a,$soal_b,$soal_c,$soal_d,$jawaban;
    public $pesan;

    protected $listeners = ['updateSoal' => '$refresh' , 
                            'soalBerikutnya' => '$refresh'];

    public function mount($soal,$list_nomor){
        $this->soal = $soal;
        $this->list_nomor = $list_nomor;

        $this->soal_a = $soal->a;
        $this->soal_b = $soal->b;
        $this->soal_c = $soal->c;
        $this->soal_d = $soal->d;
        $this->jawaban = $soal->kc_jawaban;


    }

    public function render()
    {       

        return view('livewire.member.item-soal-kolom');
    }

    public function updateSoal(){

        $soal = Question::find($this->soal->id);
        $soal->a = $this->soal_a;
        $soal->b = $this->soal_b;
        $soal->c = $this->soal_c;
        $soal->d = $this->soal_d;
        $soal->kc_jawaban = $this->jawaban;
        $soal->save();       

        $this->emit('updateSoal');

    }
}
