<?php

namespace App\Http\Livewire\Member;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\User;
use Livewire\Component;
use App\Models\ExamItem;
use App\Models\Question;
use App\Models\TempExam;
use App\Models\ExamEvent;
use App\Models\ExamColumn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UjianKolomBaru extends Component
{

    public $exam , $examEvent;
    public $waktu;
    public $endtime;
    public $date;
    public $kolom;
    
    public $nomor = 1 ;
    public $soal;
    public $list_nomor;
    public $exam_column;
    public $pilihanJawaban;
    public $soal_terakhir;
    public $kolom_terakhir;
    public $nilai_akhir = 0;
    public $tempexam;
    public $jumlahSoal;

    public $is_finish = FALSE;
    public $sisa_waktu;

    public $popup_langganan = false;

    public $list_soal_baru;

    protected $listeners = [
        'kurangiWaktu' , 'waktuHabis'
    ];
    
    public function mount($exam = null,$examEvent = null,$kolom = null){
    

        $this->exam = Exam::find($exam);    
        $this->examEvent = ExamEvent::find($examEvent);
      

        $this->jumlahSoal = $this->exam->questions->count();
      
        if($this->examEvent->status == "Selesai"){

            $this->is_finish = TRUE;
            
        }else{
            $this->is_finish = FALSE;
        }

        /**
         * Ambil soal terkhir
         */
        $temp_exam = TempExam::where('examevent_id', $this->examEvent->id)->first();

        if($temp_exam != null){
            $this->nomor = $temp_exam->soal_terakhir;
        }        
        
        $this->sisa_waktu = $this->examEvent->sisa_waktu;

        // dd($this->sisa_waktu);


        $this->kolom = $kolom;

        // https://carbon.nesbot.com/docs/
        $this->date = Carbon::now();
        $this->endtime = $this->date->addSeconds($this->sisa_waktu);  
        
        $this->kolom_terakhir = ExamColumn::where('exam_id' , $this->exam->id)->pluck('kolom')->max();  
        
        if($this->kolom > $this->kolom_terakhir){

            Redirect::route('home');

        }

        $this->exam_column = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->kolom)->first();     

        $this->list_soal_baru = Question::select(['id', 'soal' , 'no' , 'a', 'b', 'c' , 'd', 'e'])->where('exam_column_id' , $this->exam_column->id)->get()->toArray();       


    }

    public function render()
    {        

        $this->exam_column = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->kolom)->first();
        
        if($this->exam_column != null){

            $this->soal = Question::where('exam_column_id' , $this->exam_column->id)->where('no' , $this->nomor)->first(); 
            $this->soal_terakhir = Question::where('exam_column_id' , $this->exam_column->id)->max('no');
    
        } 
        
        $temp_waktu = TempExam::where('examevent_id' , $this->examEvent->id)->count(); 

        if($temp_waktu == 0){        

            $this->tempexam = TempExam::create([
                'examevent_id' => $this->examEvent->id,
                'waktu_terakhir' => $this->exam->waktu * 60,
                'kolom_terakhir' => $this->kolom,
                'soal_terakhir' => $this->nomor
            ]);        

        }
        
        $this->tempexam = TempExam::where('examevent_id' , $this->examEvent->id)->first();
       

        if($this->kolom <= $this->kolom_terakhir){

            $this->pilihanJawaban = [
                "A" => $this->exam_column->a,
                "B" => $this->exam_column->b,
                "C" => $this->exam_column->c,
                "D" => $this->exam_column->d,
                "E" => $this->exam_column->e
            ];
    
        }else{

            $this->is_finish = TRUE;
        }
       
        if($this->soal == null){
            // soal untuk kolom ini belum ada

        }else{

            $this->list_nomor = $this->soal->a . ' '. $this->soal->b .' '.  $this->soal->c . ' '. $this->soal->d;

        }   
        
        // Nilai Akhir
        $nilai_akhir = ExamItem::where('examevent_id' , $this->examEvent->id)->get();

        if($nilai_akhir->count() > 0){

            $jawaban_benar =  $nilai_akhir->where('is_true',1)->count();           


            $this->nilai_akhir = ($jawaban_benar / $this->jumlahSoal ) * 100;
        }else{
            $this->nilai_akhir = 0;
        }


        return view('livewire.member.ujian-kolom-baru')->extends('layouts.admin_full')->section('main-content');
    }

    public function jawab($jawaban){

        // Jika soal masih tersedia di kolom current
        if($this->nomor < $this->soal_terakhir){

            // jawaban di sini
            $nilai_jawaban = $this->pilihanJawaban[$jawaban];         

            ($this->soal->kc_jawaban == $nilai_jawaban)? $hasil = true:$hasil = false;


            if(Auth::check()){

                $user =  auth()->user();
                
            }else{

                $user = $this->getUserCoba();
            }


            $exam_item = ExamItem::create([

                'examevent_id' => $this->examEvent->id,
                'user_id' => $user->id,
                'question_id' => $this->soal->id,
                'jawaban' => $nilai_jawaban,
                'is_true' => $hasil

            ]);

            $this->tempexam->soal_terakhir = $this->soal->no + 1;
            $this->tempexam->save();

            $this->nomor ++;

        // jika nomor soal di kolom sudah habis, maka pindah ke soal di kolom berikutnya
        }else{                    
            
            // rest nomor ke 1 lagi jika sudah pindah kolom baru
            $this->nomor = 1;  
            $this->tempexam->soal_terakhir = $this->nomor;
            $this->tempexam->save();

            $this->examEvent->sisa_waktu = $this->exam->waktu * 60;
            $this->examEvent->save();

            // jika kolom kolom masih tersedia
            if($this->kolom < $this->kolom_terakhir){

                // $this->kolom ++;

                $this->tempexam->kolom_terakhir = $this->kolom;
                $this->tempexam->save();  

                // clear interval waktu di javascript
                $this->emit('clearInterval');

                if(Auth::check()){

                    // redirect ke kolom berikutnya
                    return redirect( route('member.ujian-kolom-baru',[
                        'exam' => $this->exam->id,
                        'examEvent' => $this->examEvent->id,
                        'kolom' => $this->kolom + 1
                    ]) . '?is_tryout=' . \request()->is_tryout . '&step=3' ); 
                    
                }else{

                    // redirect ke kolom berikutnya
                    return redirect( route('coba.ujian-kolom',[
                        'exam' => $this->exam->id,
                        'examevent' => $this->examEvent->id,
                        'kolom' => $this->kolom + 1
                    ]) . '?is_tryout=' . \request()->is_tryout ); 


                }
                

                
                // reset waktu
                
                

            // Jika kolom sudah habis / terakhir
            }else{

                // tes berakhir, tampilkan nilai dari tes ini
                $exam_event = ExamEvent::find($this->examEvent->id);
                $exam_event->status = 'Selesai';
                $exam_event->nilai = $this->nilai_akhir;
                $exam_event->salah = ExamItem::where('examevent_id' , $this->examEvent->id)->salah()->count();
                $exam_event->benar = ExamItem::where('examevent_id' , $this->examEvent->id)->benar()->count();
                $exam_event->save();

                $this->is_finish = TRUE;

                $this->emit('ujianSelesai',1);

            }
            



        } // akhir

        
    }

    public function kurangiWaktu(){

        $this->examEvent->sisa_waktu -= 1;
        $this->examEvent->save();

    }

    public function waktuHabis(){       

        // clear interval waktu di javascript
        $this->emit('clearInterval');

        //jika kolom masih tersedia
        if($this->kolom < $this->kolom_terakhir) {

            // rest nomor ke 1 lagi jika sudah pindah kolom baru
            $this->nomor = 1;  
            $this->tempexam->soal_terakhir = $this->nomor;
            $this->tempexam->save();

            $this->examEvent->sisa_waktu = $this->exam->waktu * 60;
            $this->examEvent->save();

            $this->tempexam->kolom_terakhir = $this->kolom;
            $this->tempexam->save(); 
            
            $is_tryout = ($this->examEvent->kode_tryout) ? 1 : 0;
            

            if(Auth::check()){          

            // redirect ke kolom berikutnya
            return redirect( route('member.ujian-kolom-baru',[
                'exam' => $this->exam->id,
                'examEvent' => $this->examEvent->id,
                'kolom' => $this->kolom + 1
             ]) . '?is_tryout=' . $is_tryout . '&step=3' ); 

            }else{

                // untuk soal testing
                if($this->kolom == 2){

                   $this->popup_langganan = true;
                   $this->emit('popup_langganan');

                }else{

                    // redirect ke kolom berikutnya
                    return redirect()->route('coba.ujian-kolom',[
                        'exam' => $this->exam->id,
                        'examevent' => $this->examEvent->id,
                        'kolom' => $this->kolom + 1
                    ]); 

                }




            }

        //jika sedang berada di kolom yang terakhir
        }else{

            // tes berakhir, tampilkan nilai dari tes ini
            $exam_event = ExamEvent::find($this->examEvent->id);
            $exam_event->status = 'Selesai';
            $exam_event->nilai = $this->nilai_akhir;
            $exam_event->salah = ExamItem::where('examevent_id' , $this->examEvent->id)->salah()->count();
            $exam_event->benar = ExamItem::where('examevent_id' , $this->examEvent->id)->benar()->count();
            $exam_event->save();

            $this->is_finish = TRUE;

            $this->emit('ujianSelesai',1);
  
        }

        // //jika sedang berada di kolom yang terakhir
        // if($this->kolom == $this->kolom_terakhir){ 

        //      // tes berakhir, tampilkan nilai dari tes ini
        //      $exam_event = ExamEvent::find($this->examEvent->id);
        //      $exam_event->status = 'Selesai';
        //      $exam_event->nilai = $this->nilai_akhir;
        //      $exam_event->salah = ExamItem::where('examevent_id' , $this->examEvent->id)->salah()->count();
        //      $exam_event->benar = ExamItem::where('examevent_id' , $this->examEvent->id)->benar()->count();
        //      $exam_event->save();

        //      $this->is_finish = TRUE;

        //      $this->emit('ujianSelesai',1);


        // }else{          

        //     $this->examEvent->sisa_waktu = $this->exam->waktu * 60;
        //     $this->examEvent->save();


        //     $this->tempexam->kolom_terakhir = $this->kolom;
        //     $this->tempexam->save();  
            
        //     // redirect ke kolom berikutnya
        //     return redirect()->route('member.ujian-kolom',[
        //         'exam' => $this->exam->id,
        //         'examevent' => $this->examEvent->id,
        //         'kolom' => $this->kolom + 1
        //      ]); 
    

        // }

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


    public function kirimJawaban($jawaban){

       $list_jawaban = json_decode( $jawaban  , true );

    //    dd($list_jawaban);

       foreach ($list_jawaban as $key => $value) {         
          
         

            // insert jawaban ke database d sini 
            // jawaban di sini   
            
            // $soal = Question::where('exam_column_id' , $this->exam_column->id)->where('no' , $value['nomor'])->first();
            $soal = Question::find($value['id']); 

            // dd($soal);
            if($soal){

                $nilai_jawaban = $this->pilihanJawaban[$value['jawaban']];
                
                ($soal->kc_jawaban == $nilai_jawaban)? $hasil = true : $hasil = false;              

                $user =  auth()->user();           

                $exam_item = ExamItem::create([

                    'examevent_id' => $this->examEvent->id,
                    'user_id' => $user->id,
                    'question_id' => $soal->id,
                    'jawaban' => $nilai_jawaban,
                    'is_true' => $hasil

                ]);             


            }

       
       } // akhir foreach

       $is_tryout = ($this->examEvent->kode_tryout) ? 1 : 0;


        // redirect ke kolom berikutnya
        return redirect( route('member.ujian-kolom-baru',[
            'exam' => $this->exam->id,
            'examEvent' => $this->examEvent->id,
            'kolom' => $this->kolom + 1
            ]) . '?is_tryout=' . $is_tryout . '&step=3' ); 
    
    }

  

}
