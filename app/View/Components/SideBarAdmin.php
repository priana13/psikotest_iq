<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Examcategory;
use Illuminate\View\Component;

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

        $this->akademik = Examcategory::where('exam_type', 'Akademik')->get();   
        $this->psikotes = Examcategory::where('exam_type', 'Psikotes')->orderBy('menu_order')->get();        
        
        $this->tips_and_trick = Setting::where('name', 'tips_and_trick')->first(); 
        
        if($this->tips_and_trick){
            $this->tips_link = Category::find($this->tips_and_trick)->first()->slug;
        }

        return view('components.side-bar-admin');
    }
}
