<?php

namespace App\View\Components;

use App\Models\Setting;
use App\Models\Category;
use App\Models\PackageExam;
use App\Models\Package;
use App\Models\Examcategory;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class SideBarAdmin extends Component
{
    public $akademik; 
    public $psikotes;
    public $tips_and_trick, $tips_link;  
    
    public $test_iq_access = false;

    public $is_full_access;

    public $pengembangan;

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
        
        
        $packages = Package::whereIn('id', $langganan)->pluck('type')->toArray();

        ( in_array('iq', $packages) ) ? $this->test_iq_access = true : $this->test_iq_access = false;
             
        
        $this->is_full_access = DB::table('memberships')->join('packages', 'package_id', 'packages.id')
                            ->where('memberships.status', 'active')
                            ->where('user_id', auth()->user()->id)
                            ->where('packages.type', 'full')
                            ->count(); 



        if($this->is_full_access > 0){

            $this->psikotes = Examcategory::where('exam_type', 'Psikotes')->orderBy('menu_order')->get();  

            $this->akademik = Examcategory::where('exam_type', 'Akademik')->get(); 

            $this->pengembangan = Examcategory::where('exam_type', 'Pengembangan')->get(); 


        }else{

            $this->psikotes = Examcategory::whereIn('id', $exam_categori_user)->where('exam_type', 'Psikotes')->orderBy('menu_order')->get();

            $this->akademik = Examcategory::whereIn('id', $exam_categori_user)->where('exam_type', 'Akademik')->get(); 

            $this->pengembangan = Examcategory::whereIn('id', $exam_categori_user)->where('exam_type', 'Pengembangan')->get(); 


        }        
        
        
        $this->tips_and_trick = Setting::where('name', 'tips_and_trick')->first(); 
         
        if($this->tips_and_trick){
            $this->tips_link = Category::find($this->tips_and_trick)->first()->slug;
        }

        return view('components.side-bar-admin');
    }
}
