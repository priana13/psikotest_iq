<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ExamColumn;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ColumnQuestionImport;
use App\Models\Examcategory;

class PsikotesController extends Controller
{
    public function soal($id){

        return view('livewire.questions.index', compact('id'));

    }


    public function createCermat(){    
        
        $kategori = Examcategory::column()->get();

        return view('livewire.tes-cermat.create', compact('kategori'));
    }


    public function storeCermat(Request $request){

        $request->validate([
            'namatest' => 'required',
            'peraturan' => 'required',
            'nilai_min' => 'required',
            'waktu' => 'required',   
            'examcategory_id' => 'required|integer',
            'status' => 'required'   
        ]);       


        $exam = Exam::create([
            'type' => 'cermat',
            'nama_tes' => $request->namatest,
            'peraturan' => $request->peraturan,
            'nilai_min' => $request->nilai_min,
            'waktu' => $request->waktu,
            'col_qty' => $request->col_qty,
            'examcategory_id' => $request->examcategory_id,
            'status' => $request->status

        ]);


        return redirect()->route('admin.tes-kecermatan', $exam->id);
    }

    public function soalKecermatan($id , $kolom = null){

        return view('livewire.tes-cermat.index', compact('id', 'kolom'));
    }


    public function import(Request $request){          

        $existExamColumn = ExamColumn::where('exam_id' , $request->exam_id)->where('kolom' , $request->column)->first();
        $exam = Exam::find($request->exam_id);

        $request->validate([
            'file' => 'required'
        ]);

        if($existExamColumn == null){

            $request->validate([
                'a' => 'required', 
                'b' => 'required',
                'c' => 'required',
                'd' => 'required',
                'e'=> 'required'
            ]);


            // create exam_column            
            $existExamColumn = ExamColumn::create([
                'exam_id' =>  $request->exam_id,
                'kolom' => $request->column,
                'a' => $request->a,
                'b' => $request->b,
                'c' => $request->c,
                'd' => $request->d,
                'e' => $request->e,
                'waktu' => $exam->waktu
            ]);
            
        }  

        Excel::import(new ColumnQuestionImport($request->exam_id, $existExamColumn->id), $request->file);		

        return redirect()->route('admin.tes-kecermatan', [$request->exam_id, $request->column]);      
    }
}
