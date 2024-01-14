<?php

namespace App\Http\Livewire\Norma\Quiz\Zr;

use Livewire\Component;
use App\Models\QuizZr;
use App\Models\Norma;

class ZrShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getQuizZrById'];

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test ZR--------*/
    public $no;
    public $quiz;
    public $quiz_id;    
    public $k = [];
    public $zrquiz;


    public function getQuizZrById($QuizId)
    {   
        $this->zrquiz = QuizZr::find($QuizId);
        $this->quiz_id = optional($this->zrquiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->zrquiz)->no ?? null;
        $this->quiz = optional($this->zrquiz)->quiz ?? null; 
        $this->k = (optional($this->zrquiz)->k) ? array_values(json_decode(optional($this->zrquiz)->k)) :[];       
       
        
    }

    public function simpanQuizZr(){

        $this->k = array_map('intval', $this->k);
        $zrquiz = QuizZr::updateOrCreate(
            ['id' => $this->quiz_id, 'test_id' => $this->test_id],
            [
                'test_id'   => $this->test_id,
                'no'        => $this->no,
                'quiz'      => $this->quiz,                
                'k'         => json_encode($this->k)
            ]
        );

        session()->flash($zrquiz ? 'success' : 'error', $zrquiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');
        
        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 6)->first();
        $this->test_id = optional($this->test)->id;       
        $listNo = [];
        for ($i=97; $i <117; $i++) { 
            if(! QuizZr::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.zr.zr-show',['listNo'=>$listNo]);
    }
}


