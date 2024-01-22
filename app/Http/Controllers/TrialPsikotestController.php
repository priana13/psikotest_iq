<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Examevent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TrialPsikotestController extends Controller
{
    public function index($exam){

        // $response = Gate::inspect('langganan');    
  
        // abort_unless($response->allowed(), 403);
  
  
        return view('mulai_coba_test', [
            'ujian' => Exam::find($exam)
        ]);
  
      }
  
  
      public function buat_event($exam){  
  
          $exam = Exam::find($exam); 

          $user = $this->getUserCoba();
  
          $exam_event = Examevent::create([
            'name' => 'Test ' . $exam->nama_tes,
            'user_id' => $user->id,
            'sisa_waktu' => $exam->waktu * 60,
            'type' => $exam->type,
            'exam_id' => $exam->id
          ]);  
  
        //   if($exam->exam_category->type == 'Column'){
  
  
            return redirect()->route('coba.ujian-kolom',[
              'exam' => $exam,
              'examevent' => $exam_event,
              'kolom' => 1
            ]); 
  
  
        //   }else{
            
  
        //     // $type = 'pg'; // pilihan ganda
        //     return redirect()->route('coba.ujian',[
        //       'exam' => $exam,
        //       'examevent' => $exam_event
        //     ]); 
  
        //   }
  
  
      }
  
      // ujian pilihan ganda
      // public function ujian($exam,$examevent){
  
      //   $exam = Exam::find($exam);     
      //   $examevent = Examevent::find($examevent); 
  
      //     return view('member.ujian.halaman_ujian_pg',
      //     ['exam' => $exam, 
      //       'exam_event' => $examevent
      //     ]
      //   );
  
      // }
  
      // ujian kolom
      public function ujian_kolom($exam,$examevent,$kolom){
  
        $exam = Exam::find($exam);     
        $examevent = Examevent::find($examevent); 
  
          return view('halaman_coba_ujian_kolom' ,
          [
            'exam' => $exam, 
            'exam_event' => $examevent,
            'kolom' => $kolom
          ]
        );
  
      }  

      public function getUserCoba(){

        $user = User::where('email', 'coba@arstamedia.com')->first();

        if(!$user){

            $user = User::create([
                'name' => "User Coba",
                'email' => 'coba@arstamedia.com',
                'level' => "user",
                'password' => Hash::make("bismillah123456")
    
            ]);
        }

        return $user;
      }
  

}
