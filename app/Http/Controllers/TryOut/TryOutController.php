<?php

namespace App\Http\Controllers\TryOut;

use App\Models\TryOut;
use App\Models\TryoutExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TryOutController extends Controller
{
    public function start(){

        $try_out_1 = TryoutExam::where('name' , 'Kecerdasan')->first();       

        return view('tryout.start_tryout' , \compact('try_out_1'));
    }


    public function create(){

        $tryout = TryOut::create([
            'kode_tryout' => \uniqid(),
            'user_id' => auth()->user()->id
          ]);
        

          $try_out_1 = TryoutExam::where('name' , 'Kecerdasan')->first();       


         return \redirect( route('mulai-ujian' , $try_out_1->exam_id) . '?is_tryout=1&kode_tryout=' . $tryout->kode_tryout );

    }
}
