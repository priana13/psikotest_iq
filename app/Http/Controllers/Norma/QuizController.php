<?php

namespace App\Http\Controllers\Norma;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Norma;

class QuizController extends Controller
{    
    public function dashboard(){
        return view('norma' , [
            'test' => Norma::all()
        ]);        
    }
    // public function se(){
    //     return view ('livewire.norma.quiz.se.index');
    // }
    public function seList(){
        return view ('livewire.norma.quiz.se.se-list');
    }
    public function seShow(){
        return view ('livewire.norma.quiz.se.se-show');
    }

    public function wa(){
        return view ('livewire.norma.quiz.wa.index');
    }
    public function waList(){
        return view ('livewire.norma.quiz.wa.wa-list');
    }
    public function waShow(){
        return view ('livewire.norma.quiz.wa.wa-show');
    }

    public function an(){
        return view ('livewire.norma.quiz.an.index');
    }
    public function anList(){
        return view ('livewire.norma.quiz.an.an-list');
    }
    public function anShow(){
        return view ('livewire.norma.quiz.an.an-show');
    }

    public function ge(){
        return view ('livewire.norma.quiz.ge.index');
    }
    public function geList(){
        return view ('livewire.norma.quiz.ge.ge-list');
    }
    public function geShow(){
        return view ('livewire.norma.quiz.ge.ge-show');
    }

    public function ra(){
        return view ('livewire.norma.quiz.ra.index');
    }
    public function raList(){
        return view ('livewire.norma.quiz.ra.ra-list');
    }
    public function raShow(){
        return view ('livewire.norma.quiz.ra.ra-show');
    }

    public function zr(){
        return view ('livewire.norma.quiz.zr.index');
    }
    public function zrList(){
        return view ('livewire.norma.quiz.zr.zr-list');
    }
    public function zrShow(){
        return view ('livewire.norma.quiz.zr.zr-show');
    }

    public function fa(){
        return view ('livewire.norma.quiz.fa.index');
    }
    public function faList(){
        return view ('livewire.norma.quiz.fa.fa-list');
    }
    public function faShow(){
        return view ('livewire.norma.quiz.fa.fa-show');
    }

    public function wu(){
        return view ('livewire.norma.quiz.wu.index');
    }
    public function wuList(){
        return view ('livewire.norma.quiz.wu.wu-list');
    }
    public function wuShow(){
        return view ('livewire.norma.quiz.wu.wu-show');
    }

    public function mind(){
        return view ('livewire.norma.quiz.mind.index');
    }
    public function mindList(){
        return view ('livewire.norma.quiz.mind.mind-list');
    }
    public function mindShow(){
        return view ('livewire.norma.quiz.mind.mind-show');
    }
    

    public function me(){
        return view ('livewire.norma.quiz.me.index');
    }
    public function meList(){
        return view ('livewire.norma.quiz.me.me-list');
    }
    public function meShow(){
        return view ('livewire.norma.quiz.me.me-show');
    }
    



}
