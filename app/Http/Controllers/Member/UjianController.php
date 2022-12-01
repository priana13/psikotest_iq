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


    public function buat_event($exam){  

        $exam = Exam::find($exam); 

        $exam_event = Examevent::create([
          'name' => 'Test ' . $exam->nama_tes,
          'user_id' => auth()->user()->id
        ]);

        return redirect()->route('member.ujian',[
          'exam' => $exam,
          'examevent' => $exam_event
        ]); 

    }

    public function ujian($exam,$examevent){

      $exam = Exam::find($exam);     
      $examevent = Examevent::find($examevent);

      if($exam->type == 'cermat'){
        $type = 'kolom';
      }else{
        $type = 'pg'; // pilihan ganda
      }
     

      return view('member.ujian.halaman_ujian_'. $type , 
      ['exam' => $exam, 
        'exam_event' => $examevent
      ]
    );



    }



}
