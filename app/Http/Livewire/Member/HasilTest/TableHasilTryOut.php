<?php

namespace App\Http\Livewire\Member\HasilTest;

use App\Models\TryOut;
use Livewire\Component;
use Livewire\WithPagination;

class TableHasilTryOut extends Component
{
    use WithPagination;    

    protected $paginationTheme = 'bootstrap';

    public function mount(){

        if(auth()->user()->level !== 'Admin'){

            abort(403);

        }
    }

    public function render()
    {
        $hasil_tryout = TryOut::orderBy('id' , 'desc')->paginate(10);

        return view('livewire.member.hasil-test.table-hasil-try-out' , compact('hasil_tryout'))->extends('layouts.admin')->section('main-content');;
    }
}
