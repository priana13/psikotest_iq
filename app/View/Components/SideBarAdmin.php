<?php

namespace App\View\Components;

use App\Models\Setting;
use App\Models\Category;
use App\Models\PackageExam;
use App\Models\Examcategory;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class SideBarAdmin extends Component
{
    public $akademik; 
    public $psikotes;
    public $tips_and_trick, $tips_link;    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

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

                             

        $this->akademik = Examcategory::whereIn('id', $exam_categori_user)->where('exam_type', 'Akademik')->get();   
        $this->psikotes = Examcategory::whereIn('id', $exam_categori_user)->where('exam_type', 'Psikotes')->orderBy('menu_order')->get();        
        
        $this->tips_and_trick = Setting::where('name', 'tips_and_trick')->first(); 
         
        if($this->tips_and_trick){
            $this->tips_link = Category::find($this->tips_and_trick)->first()->slug;
        }

        return view('components.side-bar-admin');
    }
}
