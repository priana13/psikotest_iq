<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Examevent;
use App\Models\TempExam;

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


        if($exam->type == 'cermat'){

            // // cek dulu dulu ke temp exam apakah sudah ada history atau belum
            // $cek_temp_exam = TempExam::where('examevent_id' , $exam_event->id)->count(); 

            // if($cek_temp_exam == 0){        

            //     $tempexam = TempExam::create([
            //         'examevent_id' => $exam_event->id,
            //         'waktu_terakhir' => $exam->waktu * 60,
            //         'kolom_terakhir' => 1,
            //         'soal_terakhir' => 1
            //     ]);     
                
            //     $kolom = 1;

            // }else{

            //   $kolom = $cek_temp_exam->kolom_terakhir;

            // }   

            // dd($kolom);


          return redirect()->route('member.ujian-kolom',[
            'exam' => $exam,
            'examevent' => $exam_event,
            'kolom' => 1
          ]); 


        }else{

          // $type = 'pg'; // pilihan ganda
          return redirect()->route('member.ujian',[
            'exam' => $exam,
            'examevent' => $exam_event
          ]); 

        }


    }

    // ujian pilihan ganda
    public function ujian($exam,$examevent){

      $exam = Exam::find($exam);     
      $examevent = Examevent::find($examevent); 

        return view('member.ujian.halaman_ujian_pg',
        ['exam' => $exam, 
          'exam_event' => $examevent
        ]
      );

    }

    // ujian kolom
    public function ujian_kolom($exam,$examevent,$kolom){

      $exam = Exam::find($exam);     
      $examevent = Examevent::find($examevent); 

        return view('member.ujian.halaman_ujian_kolom' ,
        [
          'exam' => $exam, 
          'exam_event' => $examevent,
          'kolom' => $kolom
        ]
      );

    }



}
