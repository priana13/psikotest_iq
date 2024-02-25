<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Examcategory;
use App\Models\PackageExam;
use DB;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        

        $type = $request->type;
        $exam = Exam::aktif()->whereHas('questions');

        if($type){

            if($type == 'Psikotes'){

                $exam = $exam->typeIn(['cerdas', 'cermat', 'kepribadian']);

            }else if($type == 'Akademik'){

                $category = Examcategory::where('exam_type', 'Akademik')->pluck('id');               

                $exam = $exam->whereIn('examcategory_id', $category);

            }


        }        

        $exam = $exam->paginate(10);


        $title = "List Soal";

        $langganan = auth()->user()->memberships()->pluck('package_id');
        $akses_packages = PackageExam::whereIn('package_id', $langganan)->pluck('exam_id')->toArray();           

        $is_full_access = DB::table('memberships')->join('packages', 'package_id', 'packages.id')
                            ->where('memberships.status', 'active')
                            ->where('user_id', auth()->user()->id)
                            ->where('packages.type', 'full')
                            ->count();  


        return view('member.soal.index' , [
            'exams' => $exam,
            'title' => $type,
            'allowed_exam' => $akses_packages,
            'is_full_access' => $is_full_access
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
