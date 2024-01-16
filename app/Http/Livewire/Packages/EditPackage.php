<?php

namespace App\Http\Livewire\Packages;

use Livewire\Component;
use App\Models\Package;
use App\Models\Exam;
use App\Models\Examcategory;
use App\Models\PackageExam;

class EditPackage extends Component
{
    public $exams;
    public $list_test;
    public $exam_id, $name, $qty, $price, $detail, $type;
    public $package;
    public $package_id;

    public $package_exams;

    public $exam_categories;
    
    public $kategori;  

    public $is_show;

    public function mount($package){

        // $this->package = Package::find($id);
        $this->name = $package->name;
        $this->qty = $package->qty;
        $this->price = $package->price;
        $this->type = $package->type;
        $this->detail = $package->detail;
        $this->package_id = $package->id;
        $this->kategori = $package->examcategory_id;

        $this->is_show = $package->is_show;

        $this->package = $package;

    }

    public function render()
    {       
        

        if($this->type == "kategori"){

            $this->exams = Exam::where('examcategory_id', $this->kategori)->get();

        }else{

            $this->exams = Exam::all();

        }

        $this->package_exams = PackageExam::where('package_id', $this->package_id)->whereHas('exam')->get();     
        

        $this->exam_categories = Examcategory::whereHas('exams')->get();

        return view('livewire.packages.edit-package');
    }

    public function tambahTest(){

        PackageExam::create([
            'user_id' => auth()->user()->id,
            'package_id' => $this->package_id,
            'exam_id' => $this->exam_id,

        ]);
    }

    public function update(){


        $package = Package::find($this->package_id);     

        $package->type = $this->type;
        $package->name = $this-> name;
        $package->qty = $this-> qty;
        $package->price = $this-> price;
        $package->detail = $this->detail;
        $package->examcategory_id = $this->kategori;
        $package->is_show = $this->is_show;

        $package->save();

        session()->flash('message', 'Package Successfully Updated.');

    }

    public function hapus($id){

        $package_exam = PackageExam::find($id);

        $package_exam->delete();

        session()->flash('message', 'Data Berhasil dihapus');
    }

}
