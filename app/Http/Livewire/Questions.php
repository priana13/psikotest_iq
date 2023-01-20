<?php

namespace App\Http\Livewire;

use App\Imports\QuestionsImport;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Question;
use App\Models\QuestionImage;
use App\Models\Exam;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Questions extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $exam_id, $soal, $a, $b, $c, $d, $e, $kc_jawaban, $gambar, $status = "Aktif" , $no;
    public $updateMode = false;	
	public $gambar_a, $gambar_b, $gambar_c , $gambar_d, $gambar_e;
	public $gambar_a_edit,$gambar_b_edit,$gambar_c_edit,$gambar_d_edit,$gambar_e_edit , $gambar_edit;
	public $id_psikotes;
	public $psikotes;
	public $file;
	public $val_a=1,$val_b=1,$val_c=1,$val_d=1,$val_e=1;
	public $list_nomor;


	protected $listeners = [
		'refresh' => '$refresh'
	];


	public function mount($id = null){

		if($id != null){

			$this->id_psikotes = $id;
			$this->psikotes = Exam::find($id);
			$this->exam_id = $id;

		}

		$questions = Question::where('exam_id' , $id)->pluck('no');

		$list_nomor = collect();

		for ($i=1; $i <= 100; $i++) { 

			$list_nomor->push($i);
		}		
		
		$diff = $list_nomor->diff($questions);
		

		$this->list_nomor = $diff->all();


		$this->no = reset( $this->list_nomor );	

	}


    public function render()
    {	
		

		$questions = Question::where('exam_id' , $this->id_psikotes)->orderBy('no');	

		if($this->keyWord != null){

			$questions = $questions->where('no', $this->keyWord);
						
		}		

		$questions = $questions->paginate(10);
		

        return view('livewire.questions.view', [
            'questions' => $questions,

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

	public function create(){

		// $max_question = Question::where('exam_id', $this->exam_id)->max('no');

		// $this->no = $max_question + 1;
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
		'gambar' => 'max:1024'
        ]);	
		
		$path_gambar = null;

		if($this->gambar){

			$path_gambar =  $this->gambar->store('public/photos');
			$path_gambar = explode('public/' , $path_gambar);
			$path_gambar = $path_gambar[1];	
		}
 


		$existing_question = Question::where('exam_id' , $this->exam_id)->pluck('no');		

		// ($existing_question->count() > 0)?			
		// 				$this->no = $existing_question->max() + 1:
		// 				$this->no = 1;	

        $question = Question::create([ 
			'exam_id' => $this->exam_id,
			'no' => $this->no,
			'soal' => $this->soal,
			'a' => $this-> a,
			'b' => $this-> b,
			'c' => $this-> c,
			'd' => $this-> d,
			'e' => $this-> e,
			'val_a' => $this->val_a,
            'val_b' => $this->val_b,
            'val_c' => $this->val_c,
            'val_d' => $this->val_d,
            'val_e' => $this->val_e,

			'kc_jawaban' => $this-> kc_jawaban,
			'gambar' => $path_gambar,
			'status' => $this->status
        ]);

		// input gambar a
		if($this->gambar_a){

			$path_gambar_a =  $this->gambar_a->store('public/photos');
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

			$path_gambar_b =  $this->gambar_b->store('public/photos');
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

			$path_gambar_c =  $this->gambar_c->store('public/photos');
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

			$path_gambar_d =  $this->gambar_d->store('public/photos');
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

			$path_gambar_e =  $this->gambar_e->store('public/photos');
			$path_gambar_e = explode('public/' , $path_gambar_e);
			$path_gambar_e = $path_gambar_e[1];			

			QuestionImage::create([
				'question_id' => $question->id,
				'type' => 'e',
				'image' => $path_gambar_e
			]);
		}        

        $this->resetInput();
		$this->emit('refresh');
		$this->emit('closeModal');
		session()->flash('message', 'Question Successfully created.');
    }

    public function edit($id)
    {
        $record = Question::findOrFail($id);

		$questionImage = $record->questionImages;	
		
		$gambar_a = $questionImage->where('type' , 'a')->first();
		$gambar_b = $questionImage->where('type' , 'b')->first();
		$gambar_c = $questionImage->where('type' , 'c')->first();
		$gambar_d = $questionImage->where('type' , 'd')->first();
		$gambar_e = $questionImage->where('type' , 'e')->first();

		if($gambar_a){
			$this->gambar_a = $gambar_a->image;
		}else{
			$this->gambar_a = '';
		}

		if($gambar_b){
			$this->gambar_b = $gambar_b->image;
		}else{
			$this->gambar_b = '';
		}

		if($gambar_c){
			$this->gambar_c = $gambar_c->image;
		}else{
			$this->gambar_c = '';
		}

		if($gambar_d){
			$this->gambar_d = $gambar_d->image;
		}else{
			$this->gambar_d = '';
		}

		if($gambar_e){
			$this->gambar_e = $gambar_e->image;
		}else{
			$this->gambar_e = '';
		}


        $this->selected_id = $id; 
		$this->exam_id = $record-> exam_id;
		$this->soal = $record-> soal;
		$this->a = $record-> a;
		$this->b = $record-> b;
		$this->c = $record-> c;
		$this->d = $record-> d;
		$this->e = $record-> e;
		$this->val_a = $record->val_a;
		$this->val_b = $record->val_b;
		$this->val_c = $record->val_c;
		$this->val_d = $record->val_d;
		$this->val_e = $record->val_e;
		$this->kc_jawaban = $record-> kc_jawaban;
		$this->gambar = $record->gambar;
		$this->status = $record->status;
		$this->no = $record->no;
		
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

			if($this->gambar_edit){

				$path_gambar =  $this->gambar_edit->store('public/photos');
				$path_gambar = explode('public/' , $path_gambar);
				$path_gambar = $path_gambar[1];	
	
			}

			$record = Question::find($this->selected_id);
            $record->update([ 
			'exam_id' => $this-> exam_id,
			'soal' => $this-> soal,
			'a' => $this-> a,
			'b' => $this-> b,
			'c' => $this-> c,
			'd' => $this-> d,
			'e' => $this-> e,
			'val_a' => $this->val_a,
            'val_b' => $this->val_b,
            'val_c' => $this->val_c,
            'val_d' => $this->val_d,
            'val_e' => $this->val_e,

			'kc_jawaban' => $this-> kc_jawaban,			
			'status' => $this-> status
            ]);

			if($this->gambar_edit){

				$record->gambar = $path_gambar;
				$record->save();

			}

			// input gambar a
			if($this->gambar_a_edit){
				$path_gambar_a_edit =  $this->gambar_a_edit->store('public/photos');
				$path_gambar_a_edit = explode('public/' , $path_gambar_a_edit);
				$path_gambar_a_edit = $path_gambar_a_edit[1];					
				$gambar_a = QuestionImage::where('type' , 'a')->where('question_id', $this->selected_id)->first();

				if($gambar_a){

					$gambar_a->image = $path_gambar_a_edit;
					$gambar_a->save();	

				}else{

					QuestionImage::create([
						'question_id' => $record->id,
						'type' => 'a',
						'image' => $path_gambar_a_edit
					]);
				}

			}

			// input gambar b
			if($this->gambar_b_edit){

				$path_gambar_b =  $this->gambar_b_edit->store('public/photos');
				$path_gambar_b = explode('public/' , $path_gambar_b);
				$path_gambar_b = $path_gambar_b[1];	
				
				$gambar_b = QuestionImage::where('type' , 'b')->where('question_id', $this->selected_id)->first();
				
				if($gambar_b){

					$gambar_b->image = $path_gambar_b;
					$gambar_b->save();

				}else{

					QuestionImage::create([
						'question_id' => $record->id,
						'type' => 'b',
						'image' => $path_gambar_b
					]);

				}
				
			}

			// input gambar c
			if($this->gambar_c_edit){

				$path_gambar_c =  $this->gambar_c_edit->store('public/photos');
				$path_gambar_c = explode('public/' , $path_gambar_c);
				$path_gambar_c = $path_gambar_c[1];	
				
				$gambar_c = QuestionImage::where('type' , 'c')->where('question_id', $this->selected_id)->first();
				
				if($gambar_c){

						$gambar_c->image = $path_gambar_c;
						$gambar_c->save();

				}else{

					QuestionImage::create([
						'question_id' => $record->id,
						'type' => 'c',
						'image' => $path_gambar_c
					]);


				}
				
				
			}

			// input gambar d
			if($this->gambar_d_edit){

				$path_gambar_d =  $this->gambar_d_edit->store('public/photos');
				$path_gambar_d = explode('public/' , $path_gambar_d);
				$path_gambar_d = $path_gambar_d[1];	
				
				$gambar_d = QuestionImage::where('type' , 'd')->where('question_id', $this->selected_id)->first();
				
				if($gambar_d){

						$gambar_d->image = $path_gambar_d;
						$gambar_d->save();
				}else{

					QuestionImage::create([
						'question_id' => $record->id,
						'type' => 'd',
						'image' => $path_gambar_d
					]);


				}
				
			}

			// input gambar e
			if($this->gambar_e_edit){

				$path_gambar_e =  $this->gambar_e_edit->store('public/photos');
				$path_gambar_e = explode('public/' , $path_gambar_e);
				$path_gambar_e = $path_gambar_e[1];	
				
				$gambar_e = QuestionImage::where('type' , 'e')->where('question_id', $this->selected_id)->first();
				
				if($gambar_e){

					$gambar_e->image = $path_gambar_e;
					$gambar_e->save();

				}else{

					QuestionImage::create([
						'question_id' => $record->id,
						'type' => 'e',
						'image' => $path_gambar_e
					]);

				}
			}


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

		$this->emit('refresh');
    }

	public function import(){	

		Excel::import(new QuestionsImport($this->exam_id), $this->file);
		$this->emit('closeModal');		
		$this->emit('refresh');

	}
}
