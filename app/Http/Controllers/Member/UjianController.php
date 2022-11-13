<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function soal($exam){

        return view('member.ujian.halaman_ujian' , ['id' => $exam]);
    }
}
