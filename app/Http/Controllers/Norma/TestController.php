<?php

namespace App\Http\Controllers\Norma;

use App\Models\PackageExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class TestController extends Controller
{

    public function __construct(){

     

    //    $this->cekAksesTestIQ();
    }


    public function index(){


        if( !$this->cekAksesTestIQ() ){

           return redirect( route('checkout') . '/?paket=' . '4' );
        }

        return view ('livewire.norma.test.index');
    }
    public function petunjuk(){
        return view ('livewire.norma.petunjuk');
    }
    public function main(){
        return view ('livewire.norma.test.main-norma');
    }
    public function kesatu(){
        return view ('livewire.norma.test.kesatu');
    }
    public function kedua(){
        return view ('livewire.norma.test.kedua');
    }
    public function ketiga(){
        return view ('livewire.norma.test.ketiga');
    }
    public function keempat(){
        return view ('livewire.norma.test.keempat');
    }
    public function kelima(){
        return view ('livewire.norma.test.kelima');
    }
    public function keenam(){
        return view ('livewire.norma.test.keenam');
    }
    public function ketujuh(){
        return view ('livewire.norma.test.ketujuh');
    }
    public function kedelapan(){
        return view ('livewire.norma.test.kedelapan');
    }
    public function mind(){
        return view ('livewire.norma.test.mind');
    }
    public function kesembilan(){
        return view ('livewire.norma.test.kesembilan');
    }

    public function cekAksesTestIQ()
    {        

        $langganan = auth()->user()->memberships()->where('status' , 'active')->pluck('package_id');     
        
        

        $akses_packages = PackageExam::whereIn('package_id', $langganan)->get(); 

        $akses = false;
    
        $exam_categori_user = [];

        if(count($akses_packages) > 0){

            foreach ($akses_packages as $row) { 

                $exam_categori_user[] = $row->exam->examcategory_id;

                if($row->package->type == 'iq') {

                    $akses = true;
                }

            }
        } 
     
        return $akses;
    }
}
