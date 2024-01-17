<?php

namespace App\Http\Livewire\Norma\Quiz\Se;

use Livewire\Component;
use App\Models\QuizSe;
use App\Models\Norma;
use Livewire\WithPagination;

class SeList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $prompt;

    protected $listeners = ['simpanQuizSe'];


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
    

    public function updateQuizSe($id){
        $this->emit('getQuizSeById',$id);
    }

    public function deleteQuizSe($id){              
        $record = QuizSe::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 1)->first();
        $this->test_id = optional($this->test)->id;  
        $this->waktu_test = optional($this->test)->waktu_test;  
       
    }

    public function render()
    {
        
        $seRecords = QuizSe::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.se.se-list',['se' => $seRecords]);        
    }
}
