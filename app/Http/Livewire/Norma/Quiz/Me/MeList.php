<?php

namespace App\Http\Livewire\Norma\Quiz\Me;

use Livewire\Component;
use App\Models\QuizMe;
use App\Models\Norma;
use Livewire\WithPagination;

class MeList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $prompt;

    protected $listeners = ['simpanQuizMe'];


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
    public $mequiz;
    

    public function updateQuizMe($id){
        $this->emit('getQuizMeById',$id);
    }

    public function deleteQuizMe($id){              
        $record = QuizMe::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 10)->first();
        $this->test_id = optional($this->test)->id;  
        $this->waktu_test = optional($this->test)->waktu_test;         
    }

    public function render()
    {        
        $meRecords = QuizMe::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.me.me-list',['me' => $meRecords]);        
    }
}

