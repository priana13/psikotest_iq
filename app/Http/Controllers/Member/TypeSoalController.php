<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Examcategory;
use App\Models\Membership;
use App\Models\PackageExam;
use Illuminate\Support\Facades\DB;

class TypeSoalController extends Controller
{
    public function index($type){

        $langganan = auth()->user()->memberships()->pluck('package_id');
        $akses_packages = PackageExam::whereIn('package_id', $langganan)->pluck('exam_id');    

        $is_full_access = DB::table('memberships')->join('packages', 'package_id', 'packages.id')
                            ->where('memberships.status', 'active')
                            ->where('user_id', auth()->user()->id)
                            ->where('packages.type', 'full')
                            ->count();       

        $exam = Exam::whereHas('questions')->where('examcategory_id',$type)->paginate(10);      

        $examCategory = Examcategory::find($type);
        
        // $title = [
        //     "cerdas" => "Kecerdasan",
        //     "cermat" => "Sikap Kerja",
        //     "kepribadian" => "Kepribadian",
        //     'Akademik' => "Akademik"
        // ];

        return view('member.soal.index' , [
            'exams' => $exam , 
            'title' => $examCategory->name,
            'allowed_exam' => $akses_packages,
            'is_full_access' => $is_full_access
        ]);

    }
}
