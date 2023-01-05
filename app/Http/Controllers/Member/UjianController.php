<?php

namespace App\Http\Controllers\Member;

use App\Charts\GrafikKetahanan;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Examevent;
use App\Models\TempExam;
use Illuminate\Support\Facades\DB;

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
          'user_id' => auth()->user()->id,
          'sisa_waktu' => $exam->waktu * 60
        ]);     


        if($exam->type == 'cermat'){


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


    public function hasil_ujian(Examevent $examevent){      

      $nilai_kolom = DB::table('exam_items')
                    ->select(['kolom','is_true',DB::raw('count(*) as qty')])
                    ->join('users', 'user_id', 'users.id')
                    ->join('questions', 'question_id', 'questions.id')
                    ->join('exam_columns', 'exam_column_id', 'exam_columns.id')
                    ->where('examevent_id', $examevent->id)
                    ->groupBy('kolom')
                    ->groupBy('is_true')
                    ->get();

        $semua_ujian = DB::table('exam_items')
                    ->select(['kolom',DB::raw('count(*) as qty')])
                    ->join('users', 'user_id', 'users.id')
                    ->join('questions', 'question_id', 'questions.id')
                    ->join('exam_columns', 'exam_column_id', 'exam_columns.id')
                    ->where('examevent_id', $examevent->id)
                    ->groupBy('kolom')                   
                    ->get();
       

        $kolom = [
          "kolom-benar" => $nilai_kolom->where('is_true',1),
          "kolom-salah" => $nilai_kolom->where('is_true',0),
        ];

      // {
      // kolom: "1",
      // qty: 49
      // }

      // foreach ($nilai_kolom as $row) {

      //   $kolom[] = $row->kolom;
      //   $kolom_nilai[] = $row->qty;

      // }

      return view('livewire.member.hasil-ujian', compact(
        'examevent',
        'nilai_kolom',
        'kolom',    
        'semua_ujian'  
        ) );
    }



}
