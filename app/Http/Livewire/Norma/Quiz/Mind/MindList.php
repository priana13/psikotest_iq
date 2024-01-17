<?php

namespace App\Http\Livewire\Norma\Quiz\Mind;

use Livewire\Component;
use App\Models\QuizMind;
use App\Models\Norma;
use Livewire\WithPagination;

class MindList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    protected $listeners = ['simpanQuizMind'];

    public $prompt;

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test Mind--------*/
    public $test_id;
    public $quiz_id;
    public $quiz;
    public $uraian;    
    public $mindquiz;
    

    public function updateQuizMind($id){         
        $this->emit('getQuizMindById',$id);
    }

    public function deleteQuizMind($id){              
        $record = QuizMind::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 9)->first();
        $this->nama = optional($this->test)->nama ?? 'INTELLIGENCE STRUCTURE TEST ME - HAPALAN';
        $this->test_id = optional($this->test)->id;     
      
        
    }

    public function render()
    {       
        $mindRecords = QuizMind::where('test_id', '=', $this->test_id)->paginate(10);        
        return view('livewire.norma.quiz.mind.mind-list',['mind' => $mindRecords]);        
    }
}
