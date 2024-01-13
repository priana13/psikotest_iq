<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Setting;
use App\Models\PackageExam;
use App\Models\Examcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $pengumuman = Setting::where('name', 'pengumuman')->first()->value;

        return view('dashboard' , [
            'exams' => Exam::paginate(5),
            'pengumuman' => $pengumuman
        ]);
    }

    public function subtes(){


        $langganan = auth()->user()->memberships()->where('status' , 'active')->pluck('package_id');
      

        $akses_packages = PackageExam::whereIn('package_id', $langganan)->get();     
        
        $exam_categori_user = [];

        if(count($akses_packages) > 0){

            foreach ($akses_packages as $row) {              

                $exam_categori_user[] = $row->exam->examcategory_id;

            }
        } 

        $is_full_access = DB::table('memberships')->join('packages', 'package_id', 'packages.id')
                            ->where('memberships.status', 'active')
                            ->where('user_id', auth()->user()->id)
                            ->where('packages.type', 'full')
                            ->count(); 
        if($is_full_access > 0){

            $categori = Examcategory::where('exam_type', \request()->type)->orderBy('id', 'desc')->get();

        }else{

            $categori = Examcategory::whereIn('id' , $exam_categori_user)->where('exam_type', \request()->type)->orderBy('id', 'desc')->get();


        }

        $pengumuman = Setting::where('name', 'pengumuman')->first()->value;


        // $exams = Exam::whereIn('examcategory_id', $categori)->get();
       
        return view('dashboard_subtes' , [
            // 'exams' => $exams,
            'pengumuman' => $pengumuman, 
            'categori' => $categori,
            'title' => request()->type
        ]);
    }

    public function page()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('page', compact('widget'));
    }
}
