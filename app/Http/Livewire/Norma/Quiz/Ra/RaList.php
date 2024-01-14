<?php

namespace App\Http\Livewire\Norma\Quiz\Ra;

use Livewire\Component;
use App\Models\QuizRa;
use App\Models\Norma;
use Livewire\WithPagination;

class RaList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $prompt;

    protected $listeners = ['simpanQuizRa'];


    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test SE--------*/
    public $no;
    public $quiz;
    public $quiz_id;    
    public $k;
    public $raquiz;
    

    public function updateQuizRa($id){         
        $this->emit('getQuizRaById',$id);
    }

    public function deleteQuizRa($id){              
        $record = QuizRa::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 5)->first();
        $this->test_id = optional($this->test)->id;        
        
    }

    public function render()
    {
        
        $raRecords = QuizRa::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.ra.ra-list',['ra' => $raRecords]);        
    }
}

