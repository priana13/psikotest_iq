<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class SelectAvatar extends Component
{
    public $avatar = 1; 

    public function render()
    {
        return view('livewire.forms.select-avatar');
    }

   public function pilih($avatar){

    $this->avatar = $avatar;

   }
}
