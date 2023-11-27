<?php

namespace App\Http\Livewire\Packages;

use App\Models\Exam;
use App\Models\Package;
use Livewire\Component;
use App\Models\PackageExam;
use App\Models\Examcategory;
use Illuminate\Support\Facades\Redirect;

class CreatePackage extends Component
{ 
    public $exams;
    public $list_test;
    public $exam_id, $name, $qty, $price, $detail, $type;

    public $exam_categories;
    
    public $kategori; 


    public function render()
    {
        $this->exams = Exam::all();

        $this->exam_categories = Examcategory::whereHas('exams')->get();

        return view('livewire.packages.create-package');
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'type' => 'required',
            ]);
    
            $package = Package::create([ 
                'type' => $this->type,
                'name' => $this-> name,
                'qty' => $this-> qty,
                'price' => $this-> price,
                'detail' => $this-> detail,
                'examcategory_id' => $this->kategori
            ]); 

            Redirect::route('admin.packages.edit', $package->id )->with('message', 'Package Successfully created.');
    }

}
