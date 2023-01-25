<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Question;
use App\Models\Exam;
use App\Models\ExamItem;
use App\Models\ExamEvent;
use Carbon\Carbon;
use App\Models\TempExam;

class Ujian extends Component
{
    public $step = 1;
    public $examid;
    public $exam;
    public $soal;
    public $total;
    public $jawaban;
    public $examEvent;
    public $waktu;
    public $endtime;
    public $date;
    public $finish_status = FALSE;
    public $salah = 0, $benar = 0, $nilai;
    public $tempexam;
    public $sisa_waktu;
    public $nilai_soal;


    protected $listeners = [
            'waktuHabis' => 'waktuHabis',
            'getSoal' => 'getSoal',
            'refresh' => '$refresh',
            'kurangiWaktu' => 'kurangiWaktu',
            'selesaikanUjian' => 'ujianTelahSelesai'
            ];


    public function mount($examid , $examEvent){

        if($examEvent->status == 'Selesai'){

            $this->finish_status = TRUE;           

        }

        $this->exam = Exam::find($examid);       
        $this->examEvent = $examEvent;

                /**
         * Ambil soal terkhir
         */
        $temp_exam = TempExam::where('examevent_id', $this->examEvent->id)->first();        

        if($temp_exam != null){
            $this->step = $temp_exam->soal_terakhir;           
        }

        $this->sisa_waktu = $this->examEvent->sisa_waktu;

    }


    public function render()
    {      
        
        $temp_waktu = TempExam::where('examevent_id' , $this->examEvent->id)->count(); 

        if($temp_waktu == 0){        

            $this->tempexam = TempExam::create([
                'examevent_id' => $this->examEvent->id,
                'waktu_terakhir' => $this->exam->waktu * 60,                
                'soal_terakhir' => $this->step
            ]);        

        }
        
        $this->tempexam = TempExam::where('examevent_id' , $this->examEvent->id)->first();


       if(!$this->finish_status){

        $this->soal = $this->exam->questions()->step($this->step)->first(); 

       }else{

        $this->emit('ujianSelesai');


       }
       
       $this->total = $this->exam->questions->count();     
       
        // https://carbon.nesbot.com/docs/
        $this->date = Carbon::now();
        $this->endtime = $this->date->addSeconds($this->sisa_waktu);
       
        return view('livewire.member.ujian');
    }

    public function berikutnya(){
        
        $this->validate([
            'jawaban' => 'required'
        ]);


        if(!$this->finish_status){

            ($this->soal->kc_jawaban == $this->jawaban)? $hasil = true:$hasil = false;

            if($this->soal->kc_jawaban == $this->jawaban){
                $hasil = true;
                $this->benar += 1;

            }else{
                $hasil = false;
                $this->salah += 1;
            }

            // hitung nilai
            if($this->exam->type == 'kepribadian'){

               $this->hitungNilai();

               $nilai = $this->nilai_soal;

            }else{
                $nilai = 1;
            }
          

            // cek apakah soal ini sudah dijawab atau belum sebelumnya
            $cek_soal = ExamItem::where('examevent_id', $this->examEvent->id)->where('question_id', $this->soal->id)->first();

            if($cek_soal == null){


                // input ke table ujian di sini
                ExamItem::create([
                    'examevent_id' => $this->examEvent->id,
                    'user_id' => auth()->user()->id,
                    'question_id' => $this->soal->id,
                    'jawaban' => $this->jawaban,
                    'is_true' => $hasil, 
                    'nilai' => $nilai
                ]);

            }else{

                ExamItem::where('id', $cek_soal->id)->update([
                    'jawaban' => $this->jawaban,
                    'is_true' => $hasil,
                    'nilai' => $nilai
                ]);
            }




            // jika ini adalah soal yang terakhir
            // harus nya di cek apakah masih ada soal yang belum dijawab atau sudah semua
            if($this->step == $this->total){              


                // cek apakah masih ada soalyang belum dijawab

                $jumlah_terjawab = ExamItem::where('examevent_id', $this->examEvent->id)->count();

               if($jumlah_terjawab < $this->total ){
               

                    $this->emit('soalMasihAda');

               }else{

                // $this->ujianTelahSelesai();

               }
    
               
            }else{

            $this->tempexam->soal_terakhir = $this->soal->no + 1;
            $this->tempexam->save();

            $this->step += 1;
            $this->jawaban = '';


            }






        }

        $this->emit('refresh');

    }

    public function jawab_nanti(){

        $this->step += 1;
        $this->jawaban = '';

    }

    public function waktuHabis(){

        $this->finish_status = TRUE;

        $this->benar = ExamItem::where('examevent_id', $this->examEvent->id)->benar()->count();
        $this->salah = ExamItem::where('examevent_id', $this->examEvent->id)->salah()->count();


        $this->examEvent->salah = $this->salah;
        $this->examEvent->benar = $this->benar;            

        $this->nilai = $this->benar / $this->total * 100;           

        $this->examEvent->nilai = $this->nilai;
        $this->examEvent->save();


    }

    public function kurangiWaktu(){

        $this->examEvent->sisa_waktu -= 1;
        $this->examEvent->save();

    }


    public function getSoal($no){

        $this->step = $no;

        $this->soal = $this->exam->questions()->step($this->step)->first(); 

        $exam_item = ExamItem::where('examevent_id' , $this->examEvent->id)->where('question_id',$this->soal->id)->first();      
              

        if($exam_item){

            $this->jawaban = $exam_item->jawaban;

        }else{

            $this->jawaban = '';
        }

        $this->emit('refresh');


    }


    public function ujianTelahSelesai(){

        $this->finish_status = TRUE;

        $this->benar = ExamItem::where('examevent_id', $this->examEvent->id)->benar()->count();
        $this->salah = ExamItem::where('examevent_id', $this->examEvent->id)->salah()->count();

        if($this->exam->type == 'kepribadian'){

            $nilai = ExamItem::where('examevent_id' , $this->examEvent->id)->sum('nilai');

        }else{

            $this->examEvent->salah = $this->salah;
            $this->examEvent->benar = $this->benar;            
    
            $nilai = $this->benar / $this->total * 100;  

        }


        $this->nilai = number_format($nilai);         

        $this->examEvent->nilai = $this->nilai;
        $this->examEvent->status = "Selesai";
        $this->examEvent->save();

        $this->emit('ujianSelesai');

         // kita bisa redirect page di sini ke halaman nilai

    }

    public function hitungNilai(){

        $jawaban = $this->jawaban;
        $key = 'val_' . $jawaban;       
        $soal = $this->soal->toArray();     

        // cari val berdasarkan jawaban
        $this->nilai_soal = $soal[$key];
        
    }


    public function pilih($soal){

       $this->jawaban = $soal;
    }


}
