<?php

namespace App\Http\Controllers\Norma;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Norma;

class ReportController extends Controller
{        
    public function rekap(){
        return view ('livewire.norma.report.index');
    }
    public function rekapList(){
        return view ('livewire.norma.report.rekap-list');
    }
}
