<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Question;
use App\Models\QuestionImage;
use App\Models\Exam;
use Livewire\WithFileUploads;

class Questions extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $exam_id, $soal, $a, $b, $c, $d, $e, $kc_jawaban, $gambar, $status = "on" , $no = 1;
    public $updateMode = false;	
	public $gambar_a, $gambar_b, $gambar_c , $gambar_d, $gambar_e;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.questions.view', [
            'questions' => Question::latest()
						->orWhere('exam_id', 'LIKE', $keyWord)
						->orWhere('soal', 'LIKE', $keyWord)
						->orWhere('a', 'LIKE', $keyWord)
						->orWhere('b', 'LIKE', $keyWord)
						->orWhere('c', 'LIKE', $keyWord)
						->orWhere('d', 'LIKE', $keyWord)
						->orWhere('e', 'LIKE', $keyWord)
						->orWhere('kc_jawaban', 'LIKE', $keyWord)
						->orWhere('gambar', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->paginate(10),

			'exams' => Exam::all(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->exam_id = null;
		$this->soal = null;
		$this->a = null;
		$this->b = null;
		$this->c = null;
		$this->d = null;
		$this->e = null;
		$this->kc_jawaban = null;
		$this->gambar = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'exam_id' => 'required',
		'soal' => 'required',
		'a' => 'required',
		'b' => 'required',
		'c' => 'required',
		'd' => 'required',
		'e' => 'required',
		'status' => 'required',
		'gambar' => 'image|max:1024'
        ]);		
 
        $path_gambar =  $this->gambar->store('public/photos');
		$path_gambar = explode('public/' , $path_gambar);
		$path_gambar = $path_gambar[1];	

		$existing_question = Question::where('exam_id' , $this->exam_id)->pluck('no');		

		($existing_question->count() > 0)?			
						$this->no = $existing_question->max() + 1:
						$this->no = 1;	

        $question = Question::create([ 
			'exam_id' => $this->exam_id,
			'no' => $this->no,
			'soal' => $this->soal,
			'a' => $this-> a,
			'b' => $this-> b,
			'c' => $this-> c,
			'd' => $this-> d,
			'e' => $this-> e,
			'kc_jawaban' => $this-> kc_jawaban,
			'gambar' => $path_gambar,
			'status' => $this->status
        ]);

		// input gambar a
		if($this->gambar_a){

			$path_gambar_a =  $this->gambar->store('public/photos');
			$path_gambar_a = explode('public/' , $path_gambar_a);
			$path_gambar_a = $path_gambar_a[1];			

			QuestionImage::create([
				'question_id' => $question->id,
				'type' => 'a',
				'image' => $path_gambar_a
			]);
		}

		// input gambar b
		if($this->gambar_b){

			$path_gambar_b =  $this->gambar->store('public/photos');
			$path_gambar_b = explode('public/' , $path_gambar_b);
			$path_gambar_b = $path_gambar_b[1];			

			QuestionImage::create([
				'question_id' => $question->id,
				'type' => 'b',
				'image' => $path_gambar_b
			]);
		}

		// input gambar c
		if($this->gambar_c){

			$path_gambar_c =  $this->gambar->store('public/photos');
			$path_gambar_c = explode('public/' , $path_gambar_c);
			$path_gambar_c = $path_gambar_c[1];			

			QuestionImage::create([
				'question_id' => $question->id,
				'type' => 'c',
				'image' => $path_gambar_c
			]);
		}

		// input gambar d
		if($this->gambar_d){

			$path_gambar_d =  $this->gambar->store('public/photos');
			$path_gambar_d = explode('public/' , $path_gambar_d);
			$path_gambar_d = $path_gambar_d[1];			

			QuestionImage::create([
				'question_id' => $question->id,
				'type' => 'd',
				'image' => $path_gambar_d
			]);
		}

		// input gambar e
		if($this->gambar_e){

			$path_gambar_e =  $this->gambar->store('public/photos');
			$path_gambar_e = explode('public/' , $path_gambar_e);
			$path_gambar_e = $path_gambar_e[1];			

			QuestionImage::create([
				'question_id' => $question->id,
				'type' => 'e',
				'image' => $path_gambar_e
			]);
		}        
		
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Question Successfully created.');
    }

    public function edit($id)
    {
        $record = Question::findOrFail($id);

        $this->selected_id = $id; 
		$this->exam_id = $record-> exam_id;
		$this->soal = $record-> soal;
		$this->a = $record-> a;
		$this->b = $record-> b;
		$this->c = $record-> c;
		$this->d = $record-> d;
		$this->e = $record-> e;
		$this->kc_jawaban = $record-> kc_jawaban;
		$this->gambar = $record-> gambar;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'exam_id' => 'required',
		'soal' => 'required',
		'a' => 'required',
		'b' => 'required',
		'c' => 'required',
		'd' => 'required',
		'e' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Question::find($this->selected_id);
            $record->update([ 
			'exam_id' => $this-> exam_id,
			'soal' => $this-> soal,
			'a' => $this-> a,
			'b' => $this-> b,
			'c' => $this-> c,
			'd' => $this-> d,
			'e' => $this-> e,
			'kc_jawaban' => $this-> kc_jawaban,
			'gambar' => $this-> gambar,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Question Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Question::where('id', $id);
            $record->delete();
        }
    }
}
