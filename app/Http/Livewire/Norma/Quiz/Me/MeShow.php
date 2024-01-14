<?php

namespace App\Http\Livewire\Norma\Quiz\Me;

use Livewire\Component;
use App\Models\QuizMe;
use App\Models\Norma;

class MeShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getQuizMeById'];

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test ME--------*/
    public $no;
    public $quiz;
    public $quiz_id;
    public $a;
    public $b;
    public $c;
    public $d;
    public $e;
    public $k;
    public $mequiz;


    public function getQuizMeById($QuizId)
    {   
        $this->mequiz = QuizMe::find($QuizId);
        $this->quiz_id = optional($this->mequiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->mequiz)->no ?? null;
        $this->quiz = optional($this->mequiz)->quiz ?? null;
        $this->a = optional($this->mequiz)->a ?? null;
        $this->b = optional($this->mequiz)->b ?? null;
        $this->c = optional($this->mequiz)->c ?? null;
        $this->d = optional($this->mequiz)->d ?? null;
        $this->e = optional($this->mequiz)->e ?? null;
        $this->k = optional($this->mequiz)->k ?? null;
        
    }

    public function simpanQuizMe(){
        
        $mequiz = QuizMe::updateOrCreate(
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

        session()->flash($mequiz ? 'success' : 'error', $mequiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');
        
        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 10)->first();
        $this->test_id = optional($this->test)->id;       
        $listNo = [];
        for ($i=157; $i < 177; $i++) { 
            if(! QuizMe::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.me.me-show',['listNo'=>$listNo]);
    }
}

