<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Examevent;

class UjianController extends Controller
{


    public function index($exam){

      return view('member.ujian.mulai', [
          'ujian' => Exam::find($exam)
      ]);

    }


    public function soal($exam){  

        $exam = Exam::find($exam);

        return view('member.ujian.halaman_ujian' , 
        ['id' => $exam->id , 
          'exam_event' => Examevent::create([
            'name' => 'Test ' . $exam->nama_tes,
            'user_id' => auth()->user()->id
          ])
        ]
    );
    }
}
