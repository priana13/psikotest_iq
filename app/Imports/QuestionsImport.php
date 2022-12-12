<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel,WithHeadingRow
{
    public $examId;

    public function __construct($id){

        $this->examId = $id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {     

        return new Question([            
           	'exam_id' => $this->examId,
			'no' => $row['no'],
			'soal' =>$row['soal'],
			'a' => $row['a'],
			'b' => $row['b'],
			'c' => $row['c'],
			'd' => $row['d'],
			'e' => $row['e'],
			'kc_jawaban' => $row['kc'],			
			'status' => 'Aktif'
        ]);
    }
}
