<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CronJobController extends Controller
{
    public function expired(){

        $hari_ini = Carbon::now();

        $membership = Membership::where('end', '<=', $hari_ini)->update([
            'status' => 'expired'
        ]);

        return 'success';
     
    }
}
