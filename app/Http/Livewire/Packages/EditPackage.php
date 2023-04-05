<?php

namespace App\Http\Livewire\Packages;

use Livewire\Component;
use App\Models\Package;
use App\Models\Exam;
use App\Models\PackageExam;

class EditPackage extends Component
{
    public $exams;
    public $list_test;
    public $exam_id, $name, $qty, $price, $detail, $type;
    public $package;
    public $package_id;

    public function mount($package){

        // $this->package = Package::find($id);
        $this->name = $package->name;
        $this->qty = $package->qty;
        $this->price = $package->price;
        $this->type = $package->type;
        $this->detail = $package->detail;
        $this->package_id = $package->id;

    }

    public function render()
    {       
        $this->exams = Exam::all();

        return view('livewire.packages.edit-package');
    }

    public function tambahTest(){

        PackageExam::create([
            'user_id' => auth()->user()->id,
            'package_id' => $this->package_id,
            'exam_id' => $this->exam_id,

        ]);
    }

}
