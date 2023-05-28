<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithValidation;

class QuestionsImport implements ToModel,WithHeadingRow, SkipsEmptyRows, WithValidation
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

        // lakukan pengecekan soal tersedia di sini,
        // jika nomor dari soal ini sudah ada, lakukan update / overwrite

        $question = Question::where('exam_id', $this->examId)->where('no', $row['no'])->first();    


        if(!$question){

            $getSoal = new Question();
            $getSoal->exam_id = $this->examId;
            $getSoal->no =  $row['no'];
            $getSoal->soal = $row['soal'];
            $getSoal->a = $row['a'];
            $getSoal->b = $row['b'];
            $getSoal->c = $row['c'];
            $getSoal->d = $row['d'];
            $getSoal->e = $row['e'];
            $getSoal->kc_jawaban = $row['kc'];
            $getSoal->status = 'Aktif';

            if(isset($row['val_a'])){
                $getSoal->val_a = $row['val_a'];
                $getSoal->val_b = $row['val_b'];
                $getSoal->val_c = $row['val_c'];
                $getSoal->val_d = $row['val_d'];
                $getSoal->val_e = $row['val_e'];
            }

            $getSoal->save();

        }else{

            $getSoal = Question::find($question->id);

            $getSoal->no =  $row['no'];
            $getSoal->soal = $row['soal'];
            $getSoal->a = $row['a'];
            $getSoal->b = $row['b'];
            $getSoal->c = $row['c'];
            $getSoal->d = $row['d'];
            $getSoal->e = $row['e'];
            $getSoal->kc_jawaban = $row['kc'];

            if(isset($row['val_a'])){
                $getSoal->val_a = $row['val_a'];
                $getSoal->val_b = $row['val_b'];
                $getSoal->val_c = $row['val_c'];
                $getSoal->val_d = $row['val_d'];
                $getSoal->val_e = $row['val_e'];
            }

            $getSoal->save();

        }

        



    }


    public function rules(): array
    {
        return [
            'no' => ['required'],
            'soal' => ['required']
        ];
    }


}
