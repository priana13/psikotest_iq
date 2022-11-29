<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Question;
use App\Models\Exam;
use App\Models\ExamColumn;
use App\Models\ExamItem;
use App\Models\ExamEvent;
use Carbon\Carbon;

class UjianKolom extends Component
{

    public $exam , $examEvent;
    public $waktu;
    public $endtime;
    public $date;
    public $kolom = 1 , $nomor = 1 , $soal , $list_nomor , $exam_column , $pilihanJawaban;
    
    public function mount($exam , $examEvent){

        $this->exam = $exam;    
        $this->examEvent = $examEvent;

    }

    public function render()
    {

        // https://carbon.nesbot.com/docs/
        $this->date = Carbon::now();
        $this->endtime = $this->date->addMinutes($this->exam->waktu);

        $this->exam_column = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->kolom)->first();
        $this->pilihanJawaban = [
            "A" => $this->exam_column->a,
            "B" => $this->exam_column->b,
            "C" => $this->exam_column->c,
            "D" => $this->exam_column->d,
            "E" => $this->exam_column->e
        ];

        $this->soal = Question::where('exam_column_id' , $this->exam_column->id)->where('no' , $this->nomor)->first(); 
        
        $this->list_nomor = $this->soal->a . ' '. $this->soal->b .' '.  $this->soal->c . ' '. $this->soal->d;

        return view('livewire.member.ujian-kolom');
    }

    public function jawab($jawaban){

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

        $this->nomor ++;
    }

  

}
