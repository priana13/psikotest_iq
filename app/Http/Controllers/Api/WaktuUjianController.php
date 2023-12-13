<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Examevent;
use Illuminate\Http\Request;

class WaktuUjianController extends Controller
{
        
    /**
     * Method kurangi
     *
     * @param Request $request [explicite description]
     * @param exam event id
     *
     * @return json
     */
    public function cek_waktu(Request $request , $id){

        // $request->validate([
        //     'examevent_id' => 'required|integer'
        // ]);

        $examevent = Examevent::find($id);

        if($examevent == null){

            return response()->json(404);
        }

        return $examevent->sisa_waktu;

    }

    public function kurangi_waktu(){

        $examevents = Examevent::where('sisa_waktu' , '>=' , 1)->get();


        foreach ($examevents as $exam) {

           $exam->sisa_waktu -= 1;
           $exam->save();
           
        }

        return 'oke';
    }
}
