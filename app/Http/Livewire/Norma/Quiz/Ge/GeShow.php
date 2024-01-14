<?php

namespace App\Http\Livewire\Norma\Quiz\Ge;

use Livewire\Component;
use App\Models\QuizGe;
use App\Models\Norma;

class GeShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getQuizGeById'];

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test WA--------*/
    public $no;    
    public $quiz_id;
    public $quiz;  
    public $k1;    
    public $k2;
    public $gequiz;


    public function getQuizGeById($QuizId)
    {   
        $this->gequiz = QuizGe::find($QuizId);
        $this->quiz_id = optional($this->gequiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->gequiz)->no ?? null;        
        $this->quiz = optional($this->gequiz)->quiz ?? null;        
        $this->k1 = optional($this->gequiz)->k1 ?? null;        
        $this->k2 = optional($this->gequiz)->k2 ?? null;
        
    }

    public function simpanQuizGe(){        
        $gequiz = QuizGe::updateOrCreate(
            ['id' => $this->quiz_id, 'test_id' => $this->test_id],
            [
                'test_id'   => $this->test_id,
                'no'        => $this->no,              
                'quiz'      => $this->quiz,   
                'k1'        => $this->k1,                
                'k2'        => $this->k2
            ]
        );

        session()->flash($gequiz ? 'success' : 'error', $gequiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 4)->first();
        $this->test_id = optional($this->test)->id;       
        $listNo = [];
        for ($i=61; $i < 77; $i++) { 
            if(! QuizGe::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.ge.ge-show',['listNo'=>$listNo]);
    }
}
