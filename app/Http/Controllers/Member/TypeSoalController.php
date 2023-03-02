<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Examcategory;

class TypeSoalController extends Controller
{
    public function index($type){

        // $exam = Exam::whereHas('questions')->type($type)->paginate(10);

        $exam = Exam::whereHas('questions')->where('examcategory_id',$type)->paginate(10);      

        $examCategory = Examcategory::find($type);
        
        // $title = [
        //     "cerdas" => "Kecerdasan",
        //     "cermat" => "Sikap Kerja",
        //     "kepribadian" => "Kepribadian",
        //     'Akademik' => "Akademik"
        // ];

        return view('member.soal.index' , [
            'exams' => $exam , 
            'title' => $examCategory->name
        ]);

    }
}
