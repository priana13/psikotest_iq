<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class TypeSoalController extends Controller
{
    public function index($type){
       
        $exam = Exam::whereHas('questions')->type($type)->paginate(10);

        return view('member.soal.index' , [
            'exams' => $exam
        ]);

    }
}
