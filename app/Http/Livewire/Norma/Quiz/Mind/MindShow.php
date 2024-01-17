<?php

namespace App\Http\Livewire\Norma\Quiz\Mind;

use Livewire\Component;
use App\Models\QuizMind;
use App\Models\Norma;

class MindShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getQuizMindById'];

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test Mind--------*/   
    
    public $quiz_id;
    public $quiz;
    public $uraian;
   
    public $mindquiz;


    public function getQuizMindById($QuizId)
    {   
        $this->mindquiz = QuizMind::find($QuizId);
        $this->quiz_id = optional($this->mindquiz)->id ?? $this->quiz_id ;            
        $this->quiz = optional($this->mindquiz)->quiz ?? null;
        $this->uraian = optional($this->mindquiz)->uraian ?? null;
    }

    public function simpanQuizMind(){        
        $mindquiz = QuizMind::updateOrCreate(
            ['id' => $this->quiz_id, 'test_id' => $this->test_id],
            [
                'test_id'   => $this->test_id,
                'quiz'      => $this->quiz,                
                'uraian'    => $this->uraian                
            ]
        );

        session()->flash($mindquiz ? 'success' : 'error', $mindquiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');        
        
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 9)->first();
        $this->test_id = optional($this->test)->id;       
    }

    public function render()
    {       
        
        return view('livewire.norma.quiz.mind.mind-show');
    }
}
