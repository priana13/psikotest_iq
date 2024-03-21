<?php

namespace App\Http\Controllers\TryOut;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TryOutController extends Controller
{
    public function start(){

        return view('tryout.start_tryout');
    }
}
