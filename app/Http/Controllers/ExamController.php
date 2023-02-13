<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Examcategory;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->type;
        $kategori = Examcategory::pg()->get();

        $type_name = [
            "cerdas" => "Kecerdasan",
            "cermat" => "Kecermatan",
            "kepribadian" => "Kepribadian",
            "Akademik" => "Akademik"
        ];  

        return view('livewire.exams.create2', compact('type','kategori','type_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tes' => 'string|required',
            'waktu' => 'string|required',
            'nilai_min' => 'string|required',
            'peraturan' => 'string',
            'type' => 'required|string',
            'examcategory_id' => 'required|integer'
            ]);

        (!$request->type)?
            $type = 'cerdas':
            $type = $request->type;
    
        Exam::create([ 
            'nama_tes' => $request->nama_tes,
            'waktu' => $request->waktu,
            'nilai_min' => $request->nilai_min,
            'peraturan' => $request->peraturan,
            'type' => $type,
            'examcategory_id' => $request->examcategory_id

        ]);           
         

        return redirect()->route('admin.exams')->with('message', 'Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        $kategori = Examcategory::all();

        return view('livewire.exams.edit', compact('exam', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tes' => 'required',
            'waktu' => 'required',
            'nilai_min' => 'required',
            'peraturan' => 'required',
            'examcategory_id' => 'required|integer'
         ]);
    
          
            $record = Exam::find($id);            

            $record->update([ 
            'nama_tes' => $request->nama_tes,
            'waktu' => $request->waktu,
            'nilai_min' => $request->nilai_min,
            'peraturan' => $request->peraturan,
            'col_qty' => $request->col_qty,
            'examcategory_id' => $request->examcategory_id
            ]);
           
            return redirect()->route('admin.exams')->with('message', 'Data Psikotes Berhasil Diupdate');
           

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
