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
       
        $akses_packages = PackageExam::whereIn('package_id', $langganan)->pluck('exam_id')->toArray();           

        $is_full_access = DB::table('memberships')->join('packages', 'package_id', 'packages.id')
                            ->where('memberships.status', 'active')
                            ->where('user_id', auth()->user()->id)
                            ->where('packages.type', 'full')
                            ->count();       

        $exam = Exam::aktif()->whereHas('questions')->where('examcategory_id',$type);    
        
        if(\request()->jenis_pengembangan){

            $exam = $exam->where('jenis_pengembangan' , \request()->jenis_pengembangan);

        }

        $exam = $exam->paginate(10);


        $examCategory = Examcategory::find($type); 

        return view('member.soal.index' , [
            'exams' => $exam , 
            'title' => $examCategory->name,
            'allowed_exam' => $akses_packages,
            'is_full_access' => $is_full_access
        ]);

    }
}
