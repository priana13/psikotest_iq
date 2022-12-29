<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class PsikotesController extends Controller
{
    public function soal($id){

        return view('livewire.questions.index', compact('id'));

    }


    public function createCermat(){       

        return view('livewire.tes-cermat.create');
    }


    public function storeCermat(Request $request){

        $request->validate([
            'namatest' => 'required',
            'peraturan' => 'required',
            'nilai_min' => 'required',
            'waktu' => 'required',           
        ]);       


        $exam = Exam::create([
            'type' => 'cermat',
            'nama_tes' => $request->namatest,
            'peraturan' => $request->peraturan,
            'nilai_min' => $request->nilai_min,
            'waktu' => $request->waktu,
            'col_qty' => $request->col_qty,

        ]);


        return redirect()->route('admin.tes-kecermatan', $exam->id);
    }

    public function soalKecermatan($id){

        return view('livewire.tes-cermat.index', compact('id'));
    }
}
