<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MembershipIcon extends Component
{
    public $paket_aktif;
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

        $langganan = auth()->user()->memberships()->where('status' , 'active')->first();

        if($langganan){

            $this->paket_aktif = $langganan->package;
        }     

        return view('components.membership-icon');
    }
}
