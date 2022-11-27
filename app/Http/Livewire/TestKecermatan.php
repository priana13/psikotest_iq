<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exam;
use App\Models\ExamColumn;
use App\Models\Question;

class TestKecermatan extends Component
{
    public $exam,$examColumn;
    public $soalTampil = FALSE;
    public $column = 0;
    public $peraturan,$namatest,$waktu,$nilai_min,$jumlah_row = 50;
    public $a,$b,$c,$d,$e;


    public function render()
    {            
        if($this->exam){
            $existExamColumn = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->column)->first();

        }

        return view('livewire.tes-cermat.show');
    }

    public function buatsoal(){

        // cari exam dulu pastikan belum dibuat
        $existExamColumn = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->column)->first();

        if(!$existExamColumn){

            // create exam_column
            $this->examColumn = ExamColumn::create([
                'exam_id' => $this->exam->id,
                'kolom' => $this->column,
                'a' => $this->a,
                'b' => $this->b,
                'c' => $this->c,
                'd' => $this->d,
                'e' => $this->e,
                'waktu' => 1
            ]);
        }else{
            $this->examColumn = $existExamColumn;
        }

        for ($i=1; $i <= $this->jumlah_row; $i++) { 
            # buat soal anda di sini

            $question = Question::create([ 
                'exam_id' => $this->exam->id,
                'type' => 'cermat',
                'exam_column_id' => $this->examColumn->id,
                'no' => $i,
                'soal' => $this->a . $this->b . $this->c . $this->d . $this->e,
                'a' => $this->a,
                'b' => $this->b,
                'c' => $this->c,
                'd' => $this->d,
                'e' => $this->e,
                'kc_jawaban' => $this->e,                    
                'status' => 'Aktif'
            ]);

        }




        $this->soalTampil = TRUE;
    }

    public function berikutnya(){

        if($this->column == 0){

            // insert ke table Exam jika exam belum dibuat
            if(!$this->exam){

                $this->exam = Exam::create([
                    'type' => 'cermat',
                    'nama_tes' => $this->namatest,
                    'peraturan' => $this->peraturan,
                    'nilai_min' => $this->nilai_min,
                    'waktu' => $this->waktu

                ]);

            }

        }       

        $this->column++;
    }

    public function sebelumnya(){

        $this->column--;
    }

}
