<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Question;
use App\Models\Exam;
use App\Models\ExamColumn;
use App\Models\ExamItem;
use App\Models\ExamEvent;
use App\Models\TempExam;
use Carbon\Carbon;

class UjianKolom extends Component
{

    public $exam , $examEvent;
    public $waktu;
    public $endtime;
    public $date;
    public $kolom = 1 , $nomor = 1 , $soal , $list_nomor , $exam_column , $pilihanJawaban , 
            $soal_terakhir, $kolom_terakhir , $nilai_akhir , $tempexam;
    public $is_finish = FALSE;

    protected $listeners = [
        'kurangiWaktu'
    ];
    
    public function mount($exam , $examEvent){

        $this->exam = $exam;    
        $this->examEvent = $examEvent;

        if($examEvent->status == "Selesai"){

            $this->is_finish = TRUE;
        }

    }

    public function render()
    {     

        // https://carbon.nesbot.com/docs/
        $this->date = Carbon::now();
        $this->endtime = $this->date->addMinutes($this->exam->waktu); 

        $this->exam_column = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->kolom)->first();
        
        if($this->exam_column != null){

            $this->soal = Question::where('exam_column_id' , $this->exam_column->id)->where('no' , $this->nomor)->first(); 
            $this->soal_terakhir = Question::where('exam_column_id' , $this->exam_column->id)->max('no');
    
        }        
        
        $this->kolom_terakhir = ExamColumn::where('exam_id' , $this->exam->id)->max('kolom');
        
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

        return view('livewire.member.ujian-kolom');
    }

    public function jawab($jawaban){

        // dd($this->nomor , $this->soal_terakhir);

        if($this->nomor < $this->soal_terakhir){

            // jawaban di sini
            $nilai_jawaban = $this->pilihanJawaban[$jawaban];
            ($this->soal->kc_jawaban == $nilai_jawaban)? $hasil = true:$hasil = false;

            $exam_item = ExamItem::create([

                'examevent_id' => $this->examEvent->id,
                'user_id' => auth()->user()->id,
                'question_id' => $this->soal->id,
                'jawaban' => $nilai_jawaban,
                'is_true' => $hasil

            ]);

            $this->tempexam->soal_terakhir = $this->soal->no + 1;
            $this->tempexam->save();

    
        }else{    
            $this->kolom ++;                
            

            if($this->kolom < $this->kolom_terakhir){

                $this->kolom ++;

                $this->tempexam->kolom_terakhir = $this->kolom;
                $this->tempexam->save();                

            }else{

                // tes berakhir, tampilkan nilai dari tes ini

               $exam_event = ExamEvent::find($this->examEvent->id);
               $exam_event->status = 'Selesai';
               $exam_event->save();

            }
        }


        $this->nomor ++;

        
    }

    public function kurangiWaktu(){

        $this->examEvent->sisa_waktu -= 1;
        $this->examEvent->save();

    }

  

}
