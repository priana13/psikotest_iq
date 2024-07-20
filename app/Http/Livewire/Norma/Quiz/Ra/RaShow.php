<?php

namespace App\Http\Livewire\Norma\Quiz\Ra;

use Livewire\Component;
use App\Models\QuizRa;
use App\Models\Norma;

class RaShow extends Component
{
    protected $debug = true;    
    public $prompt;

    protected $listeners = ['getQuizRaById'];

    /*----- Norma Test --------*/    
    public $test;

    /*----- Quiz Test AN--------*/
    public $no;
    public $quiz;
    public $quiz_id;    
    public $k = [];
    public $k2;
    public $raquiz;  

    public function getQuizRaById($QuizId)
    {   
        $this->raquiz = QuizRa::find($QuizId);
        $this->quiz_id = optional($this->raquiz)->id ?? $this->quiz_id ;
        $this->no = optional($this->raquiz)->no ?? null;
        $this->quiz = optional($this->raquiz)->quiz ?? null; 
        $this->k = (optional($this->raquiz)->k) ? array_values(json_decode(optional($this->raquiz)->k)) :[];       
        //$this->k = optional($this->raquiz)->k ?? [];
        $this->k2 = $this->raquiz->k2;
        
    }

    public function simpanQuizRa(){       

        $this->k = array_map('intval', $this->k);

        if($this->quiz_id){

            $raquiz = QuizRa::find($this->quiz_id);
            $raquiz->k2 = $this->k2;
            $raquiz->quiz = $this->quiz;
            $raquiz->save();

        }else{

            // dd($this->k2);

            $raquiz = QuizRa::create([
                'test_id'   => $this->test_id,
                'no'        => $this->no,
                'quiz'      => $this->quiz,                
                'k'         => json_encode($this->k),
                'k2' => $this->k2
            ]);

        }



        // dd($raquiz);

        // dd($this->quiz_id);
        // $raquiz = QuizRa::updateOrCreate(
        //     ['id' => $this->quiz_id, 'test_id' => $this->test_id],
        //     [
        //         'test_id'   => $this->test_id,
        //         'no'        => $this->no,
        //         'quiz'      => $this->quiz,                
        //         'k'         => json_encode($this->k),
        //         'k2' => $this->k2
        //     ]
        // );

        session()->flash($raquiz ? 'success' : 'error', $raquiz ? 'Berhasil !' : 'Gagal !');
        $this->emit('reloadPage');
        
        
    }
   
    public function render()
    {
        $this->test = Norma::where('tipe', '=', 5)->first();
        $this->test_id = optional($this->test)->id;  
          
        $listNo = [];
        for ($i=77; $i < 97; $i++) { 
            if(! QuizRa::where('no','=',$i)->where('test_id','=',$this->test_id)->exists()){
                $listNo[] = $i;
            }            
        }       
        
        return view('livewire.norma.quiz.ra.ra-show',['listNo'=>$listNo]);
    }
}

