<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ColumnQuestionImport implements ToModel,WithHeadingRow , SkipsEmptyRows
{

    public $examId;
    public $column_id;

    public function __construct($exam_id, $column_id){

        $this->examId = $exam_id;
        $this->column_id = $column_id;
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {      

        // lakukan pengecekan soal tersedia di sini,
        // jika nomor dari soal ini sudah ada, lakukan update / overwrite     

        $question = Question::where('exam_id', $this->examId)->where('no', $row['no'])->where('exam_column_id' , $this->column_id)->first();
      
        if(!$question){

            return new Question([

                'exam_id' => $this->examId,
                'type' => 'cermat',
                'exam_column_id' => $this->column_id,
                'no' => $row['no'],
                'soal' => $row['soal'],
                'a' => $row['a'],
                'b' => $row['b'],
                'c' => $row['c'],
                'd' => $row['d'],
                'e' => $row['e'],
                'kc_jawaban' => $row['kc'],                    
                'status' => 'Aktif'
    
            ]);


        }else{

            Question::where('id' , $question->id)->update([

                'no' => $row['no'],
                'soal' => $row['soal'],
                'a' => $row['a'],
                'b' => $row['b'],
                'c' => $row['c'],
                'd' => $row['d'],
                'e' => $row['e'],
                'kc_jawaban' => $row['kc'], 

            ]);
        }


    }
}
