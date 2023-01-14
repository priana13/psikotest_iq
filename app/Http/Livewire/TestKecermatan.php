<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Exam;
use App\Models\ExamColumn;
use App\Models\Question;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ColumnQuestionImport;

class TestKecermatan extends Component
{
    use WithFileUploads;

    public $exam,$examColumn;
    public $soalTampil = FALSE;
    public $column = 1;
    public $peraturan,$namatest,$waktu,$nilai_min,$jumlah_row = 50;
    public $a,$b,$c,$d,$e;
    public $list_nomor = [];
    public $list_soal = [];
    public $file;
    public $isColumnExis;

    protected $listeners = ['updateSoal' => "updateSoal" , "hapusSoal"];

    public function mount($id, $kolom = null){

        $this->exam = Exam::find($id);

        if($kolom){
            $this->column = $kolom;
        }
        
    }

    public function render()
    {            
        if($this->exam){
            $existExamColumn = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->column)->first();

            if($existExamColumn != null){

            $this->isColumnExis = TRUE;

            $this->a = $existExamColumn->a;
            $this->b = $existExamColumn->b;
            $this->c = $existExamColumn->c;
            $this->d = $existExamColumn->d;
            $this->e = $existExamColumn->e; 
                        
            $this->list_soal = Question::where('exam_id' , $this->exam->id)->where('exam_column_id' , $existExamColumn->id)->get();     
    
            }else{

                $this->isColumnExis = FALSE;
              
            }

            $this->list_nomor = [$this->a,$this->b,$this->c,$this->d,$this->e];

            if($existExamColumn == null){

                $this->soalTampil = FALSE;

            }else{
                
                 $this->soalTampil = TRUE;   

                 $this->examColumn = $existExamColumn;
            }
               
               

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

        $this->emit('soalBerikutnya');

        $existExamColumn = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->column)->first();
        // jika kolom belum dibuat sembunyikan soal
        if($existExamColumn == null){

            $this->soalTampil = FALSE;
            $this->isColumnExis = FALSE;

                $this->a = '';
                $this->b = '';
                $this->c = '';
                $this->d = '';
                $this->e = '';
        }else{

            $this->soalTampil = TRUE; 
        }
                  

    }

    public function sebelumnya(){

        $this->column--;

        $existExamColumn = ExamColumn::where('exam_id' , $this->exam->id)->where('kolom' , $this->column)->first();
        // jika kolom belum dibuat sembunyikan soal
        ($existExamColumn == null)?
            $this->soalTampil = FALSE:
            $this->soalTampil = TRUE; 


    }

    public function updateSoal(){

        session()->flash('message', 'Soal Telah Diupdate');        

    }

    public function hapusSoal(){              

    }

    public function import(){	


        if($this->isColumnExis == FALSE){

            $this->validate([
                'a' => 'required', 
                'b' => 'required',
                'c' => 'required',
                'd' => 'required',
                'e'=> 'required'
            ]);


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
            
        }      

		Excel::import(new ColumnQuestionImport($this->exam->id, $this->examColumn->id), $this->file);
		$this->emit('closeModal');		
		$this->emit('refresh');

	}


    public function hapusSoalColumn(){

        $list_soal = Question::where('exam_id' , $this->exam->id)->where('exam_column_id' , $this->examColumn->id)->delete(); 

        session()->flash('message', 'Soal Telah Dihapus');  

        $this->emit('closeModal');	

    }


}
