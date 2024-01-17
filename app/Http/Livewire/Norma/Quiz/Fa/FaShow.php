<?php

namespace App\Http\Livewire\Norma\Quiz\Fa;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\QuizFa;
use App\Models\Norma;

class FaShow extends Component
{
    use WithFileUploads;
    protected $debug = true;    


    public $prompt;

    protected $listeners = ['getQuizFaById'];

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


    public function getQuizFaById($QuizId)
    {   
        $this->faquiz = QuizFa::find($QuizId);
        $this->quiz_id = optional($this->faquiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->faquiz)->no ?? null;
        $this->quiz = optional($this->faquiz)->quiz ?? null;
        $this->a = optional($this->faquiz)->a ?? null;
        $this->b = optional($this->faquiz)->b ?? null;
        $this->c = optional($this->faquiz)->c ?? null;
        $this->d = optional($this->faquiz)->d ?? null;
        $this->e = optional($this->faquiz)->e ?? null;
        $this->k = optional($this->faquiz)->k ?? null;
        
    }

    public function simpanQuizFa(){
        //$imageQuiz = null;        
        $filenameQuiz = null;        
        if (!empty($this->quiz)) {
            if (is_object($this->quiz) && method_exists($this->quiz, 'storeAs')) {               
                $filenameQuiz = uniqid('quiz_fa__') . $this->no . '.' . $this->quiz->extension();
                $this->quiz->storeAs('public/photos', $filenameQuiz);
            } else {                
                $filenameQuiz = $this->quiz;
            }
            //$imageQuiz = url('storage/photos/' . $filenameQuiz);
        }
        
        $filenameA = null;        
        if (!empty($this->a)) {
            if (is_object($this->a) && method_exists($this->a, 'storeAs')) {               
                $filenameA = uniqid('quiz_fa__') . $this->no . '.' . $this->a->extension();
                $this->a->storeAs('public/photos', $filenameA);
            } else {                
                $filenameA = $this->a;
            }
        }
        $filenameB = null;        
        if (!empty($this->b)) {
            if (is_object($this->b) && method_exists($this->b, 'storeAs')) {               
                $filenameB = uniqid('quiz_fa__') . $this->no . '.' . $this->b->extension();
                $this->b->storeAs('public/photos', $filenameB);
            } else {                
                $filenameB = $this->b;
            }
        }
        $filenameC = null;        
        if (!empty($this->c)) {
            if (is_object($this->c) && method_exists($this->c, 'storeAs')) {               
                $filenameC = uniqid('quiz_fa__') . $this->no . '.' . $this->c->extension();
                $this->c->storeAs('public/photos', $filenameC);
            } else {                
                $filenameC = $this->c;
            }
        }

        $filenameD = null;        
        if (!empty($this->d)) {
            if (is_object($this->d) && method_exists($this->d, 'storeAs')) {               
                $filenameD = uniqid('quiz_fa__') . $this->no . '.' . $this->d->extension();
                $this->d->storeAs('public/photos', $filenameD);
            } else {                
                $filenameD = $this->d;
            }
        }

        $filenameE = null;        
        if (!empty($this->e)) {
            if (is_object($this->e) && method_exists($this->e, 'storeAs')) {               
                $filenameE = uniqid('quiz_fa__') . $this->no . '.' . $this->e->extension();
                $this->e->storeAs('public/photos', $filenameE);
            } else {                
                $filenameE = $this->e;
            }
        }

        

        $faquiz = QuizFa::updateOrCreate(
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

        session()->flash($faquiz ? 'success' : 'error', $faquiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 7)->first();
        $this->test_id = optional($this->test)->id;       
        $listNo = [];
        for ($i=117; $i < 137; $i++) { 
            if(! QuizFa::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.fa.fa-show',['listNo'=>$listNo]);
    }
}
