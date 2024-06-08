<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use Livewire\Component;
use App\Models\Examcategory;
use App\Models\TryoutExam;
use Livewire\WithPagination;

class ExamTryOut extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama_tes, $waktu, $nilai_min, $peraturan;
    public $updateMode = false;
    public $type;
    public $selected = 'all';
    public $selected_type,$col_qty = null;
    // public $examcategory;
    
    public function render()
    {

        // $this->examcategory = Examcategory::all();

		$keyWord = '%'.$this->keyWord .'%';   
        
        $tyout_exam = TryoutExam::pluck('exam_id');

        // dd($tyout_exam);

        if($this->keyWord){

            $exams  = Exam::whereIn('id' , $tyout_exam)->latest()
            ->orWhere('nama_tes', 'LIKE', $keyWord)
            ->orWhere('waktu', 'LIKE', $keyWord)
            ->orWhere('nilai_min', 'LIKE', $keyWord)
            ->orWhere('peraturan', 'LIKE', $keyWord)
            ->paginate(10);

        }else{

            $exams = Exam::whereIn('id' , $tyout_exam)->latest()->paginate(10);

        }
     
       
        
        return view('livewire.exam-try-out' , compact('exams'))->extends('layouts.admin')->section('main-content');
    }
}
