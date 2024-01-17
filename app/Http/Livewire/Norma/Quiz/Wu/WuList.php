<?php

namespace App\Http\Livewire\Norma\Quiz\Wu;

use Livewire\Component;
use App\Models\QuizWu;
use App\Models\Norma;
use Livewire\WithPagination;

class WuList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $prompt;

    protected $listeners = ['simpanQuizWu'];


    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test WU--------*/
    public $no;
    public $quiz;
    public $quiz_id;
    public $a;
    public $b;
    public $c;
    public $d;
    public $e;
    public $k;
    public $wuquiz;
    

    public function updateQuizWu($id){         
        $this->emit('getQuizWuById',$id);
    }

    public function deleteQuizWu($id){              
        $record = QuizWu::where('id', $id);
        $record->delete();
        $this->emit('reloadPage');
    }

    public function mount(){
        $this->test = Norma::where('tipe', '=', 8)->first();
        $this->test_id = optional($this->test)->id;  
        $this->waktu_test = optional($this->test)->waktu_test;  
       
    }

    public function render()
    {        
        $wuRecords = QuizWu::where('test_id', '=', $this->test_id)->orderBy('no', 'asc') ->paginate(10);        
        return view('livewire.norma.quiz.wu.wu-list',['wu' => $wuRecords]);        
    }
}
