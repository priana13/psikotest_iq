<?php

namespace App\Http\Livewire\Norma\Quiz\An;

use Livewire\Component;
use App\Models\QuizAn;
use App\Models\Norma;

class AnShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getQuizAnById'];

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test AN--------*/
    public $no;
    public $quiz;
    public $quiz_id;
    public $a;
    public $b;
    public $c;
    public $d;
    public $e;
    public $k;
    public $anquiz;


    public function getQuizAnById($QuizId)
    {   
        $this->anquiz = QuizAn::find($QuizId);
        $this->quiz_id = optional($this->anquiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->anquiz)->no ?? null;
        $this->quiz = optional($this->anquiz)->quiz ?? null;
        $this->a = optional($this->anquiz)->a ?? null;
        $this->b = optional($this->anquiz)->b ?? null;
        $this->c = optional($this->anquiz)->c ?? null;
        $this->d = optional($this->anquiz)->d ?? null;
        $this->e = optional($this->anquiz)->e ?? null;
        $this->k = optional($this->anquiz)->k ?? null;
        
    }

    public function simpanQuizAn(){
        
        $anquiz = QuizAn::updateOrCreate(
            ['id' => $this->quiz_id, 'test_id' => $this->test_id],
            [
                'test_id'   => $this->test_id,
                'no'        => $this->no,
                'quiz'      => $this->quiz,
                'a'         => $this->a,
                'b'         => $this->b,
                'c'         => $this->c,
                'd'         => $this->d,
                'e'         => $this->e,
                'k'         => $this->k
            ]
        );

        session()->flash($anquiz ? 'success' : 'error', $anquiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');
        
        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 3)->first();
        $this->test_id = optional($this->test)->id;       
        $listNo = [];
        for ($i=41; $i < 61; $i++) { 
            if(! QuizAn::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.an.an-show',['listNo'=>$listNo]);
    }
}
