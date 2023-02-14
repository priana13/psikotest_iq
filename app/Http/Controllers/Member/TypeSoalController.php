<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class TypeSoalController extends Controller
{
    public function index($type){
       
        $exam = Exam::whereHas('questions')->type($type)->paginate(10);

        $title = [
            "cerdas" => "Kecerdasan",
            "cermat" => "Sikap Kerja",
            "kepribadian" => "Kepribadian",
            'Akademik' => "Akademik"
        ];

        return view('member.soal.index' , [
            'exams' => $exam , 
            'title' => $title[$type]
        ]);

    }
}
