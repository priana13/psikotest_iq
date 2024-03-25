<?php

namespace App\Http\Controllers\TryOut;

use App\Http\Controllers\Controller;
use App\Models\TryoutExam;
use Illuminate\Http\Request;

class TryOutController extends Controller
{
    public function start(){

        $try_out_1 = TryoutExam::where('name' , 'Kecerdasan')->first();       

        return view('tryout.start_tryout' , \compact('try_out_1'));
    }
}
