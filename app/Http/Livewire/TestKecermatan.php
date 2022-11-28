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
    public $list_nomor = [];
    public $list_soal = [];

    protected $listeners = ['updateSoal' => "updateSoal"];


    public function render()
    {            
        if($this->exam){
            $existExamColumn = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->column)->first();

        }

        if( count($this->list_soal)  > 0){
                        
            $this->list_soal = Question::where('exam_id' , $this->exam->id)->where('exam_column_id' , $this->examColumn->id)->get();        


        }

        return view('livewire.tes-cermat.show');
    }

    public function buatsoal(){

        $this->validate([
            'a' => 'required', 
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e'=> 'required'
        ]);

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
                'waktu' => $this->waktu
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

        $this->list_nomor = [$this->a,$this->b,$this->c,$this->d,$this->e];

        $this->list_soal = Question::where('exam_id' , $this->exam->id)->where('exam_column_id' , $this->examColumn->id)->get();        



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

        $this->list_nomor = [$this->a,$this->b,$this->c,$this->d,$this->e];

        $this->column++;

        $existExamColumn = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->column)->first();
        // jika kolom belum dibuat sembunyikan soal
        ($existExamColumn == null)?
            $this->soalTampil = FALSE:
            $this->soalTampil = TRUE;        

    }

    public function sebelumnya(){

        $this->column--;
    }

    public function updateSoal(){

        session()->flash('message', 'Soal Telah Diupdate');        

    }


}
