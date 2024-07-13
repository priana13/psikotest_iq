<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Examcategory;
use App\Models\TryoutExam;
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
            "Akademik" => "Akademik",
            "Pengembangan" => "Pengembangan"
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
            'examcategory_id' => 'required|integer',
            'status' => 'required|string',
            'jenis_pengembangan' => 'nullable|string|max:20'
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
            'examcategory_id' => $request->examcategory_id,
            'status' => $request->status,
            'jenis_pengembangan' => $request->jenis_pengembangan

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

        $is_try_out = TryoutExam::where('exam_id' ,$id)->count();

        return view('livewire.exams.edit', compact('exam', 'kategori', 'is_try_out'));
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
            'examcategory_id' => 'required|integer',
            'status' => 'required|string',
            'jenis_pengembangan' => 'nullable|string|max:20'
         ]);
    
          
            $record = Exam::find($id);            

            $record->update([ 
            'nama_tes' => $request->nama_tes,
            'waktu' => $request->waktu,
            'nilai_min' => $request->nilai_min,
            'peraturan' => $request->peraturan,
            'col_qty' => $request->col_qty,
            'examcategory_id' => $request->examcategory_id,
            'status' => $request->status,
            'jenis_pengembangan' => $request->jenis_pengembangan
            ]);


            $is_try_out = TryoutExam::where('exam_id' ,$id)->count();

            // dd($is_try_out);

            if($is_try_out > 0){

                return redirect()->route('admin.soal-tryout')->with('message', 'Data Psikotes Berhasil Diupdate');
            }

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
