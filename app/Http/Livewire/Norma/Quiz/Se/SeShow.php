<?php

namespace App\Http\Livewire\Norma\Quiz\Se;

use Livewire\Component;
use App\Models\QuizSe;
use App\Models\Norma;

class SeShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getQuizSeById'];

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test SE--------*/
    public $no;
    public $quiz;
    public $quiz_id;
    public $a;
    public $b;
    public $c;
    public $d;
    public $e;
    public $k;
    public $sequiz;


    public function getQuizSeById($QuizId)
    {   
        $this->sequiz = QuizSe::find($QuizId);
        $this->quiz_id = optional($this->sequiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->sequiz)->no ?? null;
        $this->quiz = optional($this->sequiz)->quiz ?? null;
        $this->a = optional($this->sequiz)->a ?? null;
        $this->b = optional($this->sequiz)->b ?? null;
        $this->c = optional($this->sequiz)->c ?? null;
        $this->d = optional($this->sequiz)->d ?? null;
        $this->e = optional($this->sequiz)->e ?? null;
        $this->k = optional($this->sequiz)->k ?? null;
        
    }

    public function simpanQuizSe(){
        
        $seQuiz = QuizSe::updateOrCreate(
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

        session()->flash($seQuiz ? 'success' : 'error', $seQuiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');
        
        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 1)->first();
        $this->test_id = optional($this->test)->id;       
        $listNo = [];
        for ($i=1; $i < 21; $i++) { 
            if(! QuizSe::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.se.se-show',['listNo'=>$listNo]);
    }
}
