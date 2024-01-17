<?php

namespace App\Http\Livewire\Norma\Quiz\Zr;

use Livewire\Component;
use App\Models\QuizZr;
use App\Models\Norma;
use Livewire\WithPagination;

class ZrList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $prompt;

    protected $listeners = ['simpanQuizZr'];


    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test ZR--------*/
    public $no;
    public $quiz;
    public $quiz_id;    
    public $k;
    public $zrquiz;
    

    public function updateQuizZr($id){         
        $this->emit('getQuizZrById',$id);
    }

    public function deleteQuizZr($id){              
        $record = QuizZr::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 6)->first();
        $this->test_id = optional($this->test)->id;        
        
    }

    public function render()
    {
        
        $zrRecords = QuizZr::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.zr.zr-list',['zr' => $zrRecords]);        
    }
}
