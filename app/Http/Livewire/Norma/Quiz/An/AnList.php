<?php

namespace App\Http\Livewire\Norma\Quiz\An;

use Livewire\Component;
use App\Models\QuizAn;
use App\Models\Norma;
use Livewire\WithPagination;

class AnList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $prompt;

    protected $listeners = ['simpanQuizAn'];


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
    public $anquiz;
    

    public function updateQuizAn($id){         
        $this->emit('getQuizAnById',$id);
    }

    public function deleteQuizAn($id){              
        $record = QuizAn::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 3)->first();
        $this->test_id = optional($this->test)->id;        
        
    }

    public function render()
    {
        
        $anRecords = QuizAn::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.an.an-list',['an' => $anRecords]);        
    }
}
