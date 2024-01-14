<?php

namespace App\Http\Livewire\Norma\Quiz\Fa;

use Livewire\Component;
use App\Models\QuizFa;
use App\Models\Norma;
use Livewire\WithPagination;

class FaList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $prompt;

    protected $listeners = ['simpanQuizFa'];


    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test FA--------*/
    public $no;
    public $quiz;
    public $quiz_id;
    public $a;
    public $b;
    public $c;
    public $d;
    public $e;
    public $k;
    public $faquiz;
    

    public function updateQuizFa($id){         
        $this->emit('getQuizFaById',$id);
    }

    public function deleteQuizFa($id){              
        $record = QuizFa::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 7)->first();
        $this->test_id = optional($this->test)->id;  
        $this->waktu_test = optional($this->test)->waktu_test;  
       
    }

    public function render()
    {
        
        $faRecords = QuizFa::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.fa.fa-list',['fa' => $faRecords]);        
    }
}
