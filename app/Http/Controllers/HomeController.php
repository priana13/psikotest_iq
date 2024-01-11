<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\Setting;

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

        $pengumuman = Setting::where('name', 'pengumuman')->first()->value;

        return view('dashboard_subtes' , [
            'exams' => Exam::paginate(5),
            'pengumuman' => $pengumuman
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
