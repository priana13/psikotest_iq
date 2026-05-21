<?php

namespace App\Http\Controllers\Norma;

use App\Http\Controllers\Controller;
use App\Models\UserNorma;
use Illuminate\Http\Request;

class RekapDataController extends Controller
{
    public function rekapBiodata(Request $request){

        $user_norma = UserNorma::paginate(10);

        return view('livewire.norma.report.rekap-biodata' , [
            'user_norma' => $user_norma
        ]);

    }

   
}
