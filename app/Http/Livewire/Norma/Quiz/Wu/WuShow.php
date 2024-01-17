<?php

namespace App\Http\Livewire\Norma\Quiz\Wu;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\QuizWu;
use App\Models\Norma;

class WuShow extends Component
{
    use WithFileUploads;
    protected $debug = true;    


    public $prompt;

    protected $listeners = ['getQuizWuById'];

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


    public function getQuizWuById($QuizId)
    {   
        $this->wuquiz = QuizWu::find($QuizId);
        $this->quiz_id = optional($this->wuquiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->wuquiz)->no ?? null;
        $this->quiz = optional($this->wuquiz)->quiz ?? null;
        $this->a = optional($this->wuquiz)->a ?? null;
        $this->b = optional($this->wuquiz)->b ?? null;
        $this->c = optional($this->wuquiz)->c ?? null;
        $this->d = optional($this->wuquiz)->d ?? null;
        $this->e = optional($this->wuquiz)->e ?? null;
        $this->k = optional($this->wuquiz)->k ?? null;
        
    }

    public function simpanQuizWu(){       
        $filenameQuiz = null;        
        if (!empty($this->quiz)) {
            if (is_object($this->quiz) && method_exists($this->quiz, 'storeAs')) {               
                $filenameQuiz = uniqid('quiz_wu_') . $this->no . '.' . $this->quiz->extension();
                $this->quiz->storeAs('public/photos', $filenameQuiz);
            } else {                
                $filenameQuiz = $this->quiz;
            }
        }
        
        $filenameA = null;        
        if (!empty($this->a)) {
            if (is_object($this->a) && method_exists($this->a, 'storeAs')) {               
                $filenameA = uniqid('quiz_wu_') . $this->no . '.' . $this->a->extension();
                $this->a->storeAs('public/photos', $filenameA);
            } else {                
                $filenameA = $this->a;
            }
        }
        $filenameB = null;        
        if (!empty($this->b)) {
            if (is_object($this->b) && method_exists($this->b, 'storeAs')) {               
                $filenameB = uniqid('quiz_wu_') . $this->no . '.' . $this->b->extension();
                $this->b->storeAs('public/photos', $filenameB);
            } else {                
                $filenameB = $this->b;
            }
        }
        $filenameC = null;        
        if (!empty($this->c)) {
            if (is_object($this->c) && method_exists($this->c, 'storeAs')) {               
                $filenameC = uniqid('quiz_wu_') . $this->no . '.' . $this->c->extension();
                $this->c->storeAs('public/photos', $filenameC);
            } else {                
                $filenameC = $this->c;
            }
        }

        $filenameD = null;        
        if (!empty($this->d)) {
            if (is_object($this->d) && method_exists($this->d, 'storeAs')) {               
                $filenameD = uniqid('quiz_wu_') . $this->no . '.' . $this->d->extension();
                $this->d->storeAs('public/photos', $filenameD);
            } else {                
                $filenameD = $this->d;
            }
        }

        $filenameE = null;        
        if (!empty($this->e)) {
            if (is_object($this->e) && method_exists($this->e, 'storeAs')) {               
                $filenameE = uniqid('quiz_wu_') . $this->no . '.' . $this->e->extension();
                $this->e->storeAs('public/photos', $filenameE);
            } else {                
                $filenameE = $this->e;
            }
        }

        

        $wuquiz = QuizWu::updateOrCreate(
            ['id' => $this->quiz_id, 'test_id' => $this->test_id],
            [
                'test_id'   => $this->test_id,
                'no'        => $this->no,
                'quiz'      => $filenameQuiz !== null ? $filenameQuiz : $this->quiz,
                'a'         => $filenameA !== null ? $filenameA : $this->a,
                'b'         => $filenameB !== null ? $filenameB :$this->b,
                'c'         => $filenameC !== null ? $filenameC :$this->c, 
                'd'         => $filenameD !== null ? $filenameD :$this->d,
                'e'         => $filenameE !== null ? $filenameE :$this->e,
                'k'         => $this->k
            ]
        );

        session()->flash($wuquiz ? 'success' : 'error', $wuquiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 8)->first();
        $this->test_id = optional($this->test)->id;       
        $listNo = [];
        for ($i=137; $i < 157; $i++) { 
            if(! QuizWu::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.wu.wu-show',['listNo'=>$listNo]);
    }
}
