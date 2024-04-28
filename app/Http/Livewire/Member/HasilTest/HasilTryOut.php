<?php

namespace App\Http\Livewire\Member\HasilTest;

use App\Models\Examevent;
use App\Models\ExamItem;
use App\Models\TryOut;
use App\Models\TryoutExam;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages;

class HasilTryOut extends Component
{
    public $tryout;

    public $exam_event;

    public $nilai;

    public $kecerdasan;

    public $kepribadian;

    public $sikap_kerja;

    public function mount(TryOut $tryout){

        $this->tryout = $tryout;

        $this->exam_event = Examevent::where('kode_tryout' , $this->tryout->kode_tryout)->get();

        $this->kecerdasan = Examevent::where('type', 'cerdas')->where('kode_tryout' , $this->tryout->kode_tryout)->first();
        
        $this->kepribadian = Examevent::where('type', 'kepribadian')->where('kode_tryout' , $this->tryout->kode_tryout)->first();

        $this->sikap_kerja = Examevent::where('type', 'cermat')->where('kode_tryout' , $this->tryout->kode_tryout)->first();
       
        // dd($this->sikap_kerja);
       
    }

    public function render()
    {

        /**
         * roles 
         * Kecerdasan: 35%
         * Kepribadian: 35%
         * Sikap Kerja: 30%
         * 
         * http://127.0.0.1:8000/tryout/hasil/6628393171385
         * 
         */

         $kecerdasan = $this->kecerdasan->benar * 35/100;

        //  $kepribadian = $this->kepribadian->benar * 35/100;
        $kepribadian = $this->getNilaiKepribadian() * 35/100;
       
        // $sikap_kerja = $this->sikap_kerja->benar * 30/100;
        $sikap_kerja = $this->getNilaiSikapKerja() * 30/100;

        $list_nilai = $kecerdasan + $kepribadian + $sikap_kerja;

        $this->nilai = round( $list_nilai );      

        // update table tryout
        $this->tryout->nilai = $this->nilai;
        $this->tryout->status = "Selesai";
        $this->tryout->save();
       
        // $tryout = TryOut::where('kode_tryout' , );

        return view('livewire.member.hasil-test.hasil-try-out')->extends('layouts.admin_full')->section('main-content');
    }

    public function getNilaiKepribadian(){

        $list_nilai = ExamItem::where('examevent_id' , $this->kepribadian->id)->sum("nilai");

        return $list_nilai;
    }

    public function getNilaiSikapKerja(){

        $list_nilai = ExamItem::where('examevent_id' , $this->sikap_kerja->id)->sum("is_true");

        return $list_nilai;

    }
}
