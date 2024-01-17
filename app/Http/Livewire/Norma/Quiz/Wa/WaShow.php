<?php

namespace App\Http\Livewire\Norma\Quiz\Wa;

use Livewire\Component;
use App\Models\QuizWa;
use App\Models\Norma;

class WaShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getQuizWaById'];

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


    public function getQuizWaById($QuizId)
    {   
        $this->waquiz = QuizWa::find($QuizId);
        $this->quiz_id = optional($this->waquiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->waquiz)->no ?? null;        
        $this->a = optional($this->waquiz)->a ?? null;
        $this->b = optional($this->waquiz)->b ?? null;
        $this->c = optional($this->waquiz)->c ?? null;
        $this->d = optional($this->waquiz)->d ?? null;
        $this->e = optional($this->waquiz)->e ?? null;
        $this->k = optional($this->waquiz)->k ?? null;
        
    }

    public function simpanQuizWa(){        
        $waquiz = QuizWa::updateOrCreate(
            ['id' => $this->quiz_id, 'test_id' => $this->test_id],
            [
                'test_id'   => $this->test_id,
                'no'        => $this->no,                
                'a'         => $this->a,
                'b'         => $this->b,
                'c'         => $this->c,
                'd'         => $this->d,
                'e'         => $this->e,
                'k'         => $this->k
            ]
        );

        session()->flash($waquiz ? 'success' : 'error', $waquiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 2)->first();
        $this->test_id = optional($this->test)->id;       
        $listNo = [];
        for ($i=21; $i < 41; $i++) { 
            if(! QuizWa::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.wa.wa-show',['listNo'=>$listNo]);
    }
}
