<?php

namespace App\Http\Livewire\Norma\Quiz\Ge;

use Livewire\Component;
use App\Models\QuizGe;
use App\Models\Norma;
use Livewire\WithPagination;

class GeList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    protected $listeners = ['simpanQuizGe'];

    public $prompt;

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test GE--------*/
    public $no;    
    public $quiz_id;
    public $quiz;   
    public $k1;   
    public $k2;
    public $gequiz;
    

    public function updateQuizGe($id){         
        $this->emit('getQuizGeById',$id);
    }

    public function deleteQuizGe($id){              
        $record = QuizGe::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 4)->first();
        $this->test_id = optional($this->test)->id;        
        
    }

    public function render()
    {       
        $geRecords = QuizGe::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.ge.ge-list',['ge' => $geRecords]);        
    }
}

