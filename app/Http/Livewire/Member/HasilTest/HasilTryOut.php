<?php

namespace App\Http\Livewire\Member\HasilTest;

use App\Models\Examevent;
use App\Models\TryOut;
use App\Models\TryoutExam;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages;

class HasilTryOut extends Component
{
    public $tryout;

    public $exam_event;

    public $nilai;

    public function mount(TryOut $tryout){

        $this->tryout = $tryout;

        $this->exam_event = Examevent::where('kode_tryout' , $this->tryout->kode_tryout)->get();

    }

    public function render()
    {

        $list_nilai = $this->exam_event->sum('nilai');

        $this->nilai = floor($list_nilai / 3 );

        return view('livewire.member.hasil-test.hasil-try-out')->extends('layouts.admin_full')->section('main-content');
    }
}
