<?php

namespace App\Http\Livewire\Norma\Quiz\Wa;

use Livewire\Component;
use App\Models\QuizWa;
use App\Models\Norma;
use Livewire\WithPagination;

class WaList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    protected $listeners = ['simpanQuizWa'];

    public $prompt;

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test WA--------*/
    public $no;    
    public $quiz_id;
    public $a;
    public $b;
    public $c;
    public $d;
    public $e;
    public $k;
    public $waquiz;
    

    public function updateQuizWa($id){         
        $this->emit('getQuizWaById',$id);
    }

    public function deleteQuizWa($id){              
        $record = QuizWa::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 2)->first();
        $this->test_id = optional($this->test)->id;        
        
    }

    public function render()
    {       
        $waRecords = QuizWa::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.wa.wa-list',['wa' => $waRecords]);        
    }
}
