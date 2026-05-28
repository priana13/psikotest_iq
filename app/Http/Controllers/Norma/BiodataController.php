<?php

namespace App\Http\Controllers\Norma;

use App\Http\Controllers\Controller;
use App\Models\DataUserNorma;
use App\Models\Norma;
use App\Models\NormaTestLog;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {       
       
        return view('test-iq.biodata');
    }

    public function store(Request $request)
    {  
        $request->validate([
                'nomor' => 'required',  
                'nama' => 'required|string',          
                'tgl_lahir' => 'date|required',               
                'instansi' => 'required|string',
                'pangkat' => 'nullable|string',
                'angkatan_tahun' => 'nullable|integer',
        ]);

        $user = auth()->user();

        if($user->name == 'Anonim'){

            $user->update([
                'name' => $request->nama
            ]);
        }

        $user_id = $user->id;

        $normaTest = DataUserNorma::updateOrCreate(
            ['user_id' => $user_id],
            [
                'nama' => $request->nama,
                'nomor_test'    => $request->nomor,
                'tgl_lahir'     => $request->tgl_lahir,
                'pendidikan'    => $request->instansi,
                'instansi'      => $request->instansi,
                'pangkat'      => $request->pangkat,
                'angkatan_tahun' => $request->angkatan_tahun,
                'usia' => $request->usia
            ]
        );

        
        $norma = Norma::where('tipe','=',1)->first();
        $test_id = ($norma)? ($norma->id):0;

        NormaTestLog::updateOrCreate(
            ['user_id' => $user_id,'test_id' => $test_id],
            [
                'nomor_test'    => $request->nomor,
                'status'        => 1
            ]
        );        

        return redirect(route('norma.test.petunjuk'))->with('success', 'Data berhasil disimpan');
    }
}
