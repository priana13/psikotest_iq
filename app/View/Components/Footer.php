<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\StaticPage;

class Footer extends Component
{

    public $kontak;
    public $tentang;
    public $syarat_ketentuan;   
    public $kebijakan;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $this->kontak = StaticPage::name("kontak")->first()->page;
        $this->tentang = StaticPage::name("tentang")->first()->page;
        $this->syarat_ketentuan = StaticPage::name("syarat_ketentuan")->first()->page;
        $this->kebijakan = StaticPage::name("kebijakan")->first()->page;

        return view('components.footer');
    }
}
