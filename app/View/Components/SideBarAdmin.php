<?php

namespace App\View\Components;

use App\Models\Examcategory;
use Illuminate\View\Component;

class SideBarAdmin extends Component
{
    public $akademik; 
    public $psikotes;

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

        return view('components.side-bar-admin');
    }
}
