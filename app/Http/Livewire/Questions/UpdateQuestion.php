<?php

namespace App\Http\Livewire\Questions;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Facades\Redirect;
use App\Models\QuestionImage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UpdateQuestion extends Component
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
	public $edit_id;
    public $record;
	public $soalnya;

    public function mount($id){

        $record = Question::findOrFail($id);
		$this->edit_id = $record->id;
        $this->record = $record;

		$questionImage = $record->questionImages;	
		
		$gambar_a_edit = $questionImage->where('type' , 'a')->first();
		$gambar_b_edit = $questionImage->where('type' , 'b')->first();
		$gambar_c_edit = $questionImage->where('type' , 'c')->first();
		$gambar_d_edit = $questionImage->where('type' , 'd')->first();
		$gambar_e_edit = $questionImage->where('type' , 'e')->first();

		if($gambar_a_edit){
			$this->gambar_a_edit = $gambar_a_edit->image;
		}else{
			$this->gambar_a_edit = '';
		}

		if($gambar_b_edit){
			$this->gambar_b_edit = $gambar_b_edit->image;
		}else{
			$this->gambar_b_edit = '';
		}

		if($gambar_c_edit){
			$this->gambar_c_edit = $gambar_c_edit->image;
		}else{
			$this->gambar_c_edit = '';
		}

		if($gambar_d_edit){
			$this->gambar_d_edit = $gambar_d_edit->image;
		}else{
			$this->gambar_d_edit = '';
		}

		if($gambar_e_edit){
			$this->gambar_e_edit = $gambar_e_edit->image;
		}else{
			$this->gambar_e_edit = '';
		}


        $this->selected_id = $id; 
		$this->exam_id = $record-> exam_id;
		$this->soal = $record->soal;
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


    public function render()
    {

     

        return view('livewire.questions.update-question');
    }

    public function update()
    {
        $this->validate([
		'exam_id' => 'required',
		'soal' => 'required',		
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
			'exam_id' => $this->exam_id,
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
			'status' => $this-> status
            ]);

			if($this->gambar_edit){

				$record->gambar = $path_gambar;
				$record->save();

			}			

			// input gambar a
			if($this->gambar_a){
				$path_gambar_a =  $this->gambar_a->store('public/photos');
				$path_gambar_a = explode('public/' , $path_gambar_a);
				$path_gambar_a = $path_gambar_a[1];					
				$gambar_a = QuestionImage::where('type' , 'a')->where('question_id', $this->selected_id)->first();

				if($gambar_a){

					$gambar_a->image = $path_gambar_a;
					$gambar_a->save();	

				}else{

					QuestionImage::create([
						'question_id' => $record->id,
						'type' => 'a',
						'image' => $path_gambar_a
					]);
				}

			}

			// input gambar b
			if($this->gambar_b){

				$path_gambar_b =  $this->gambar_b->store('public/photos');
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
			if($this->gambar_c){

				$path_gambar_c =  $this->gambar_c->store('public/photos');
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
			if($this->gambar_d){

				$path_gambar_d =  $this->gambar_d->store('public/photos');
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
			if($this->gambar_e){

				$path_gambar_e =  $this->gambar_e->store('public/photos');
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
            
			session()->flash('message', 'Question Successfully updated.');

            Redirect::route('admin.exam_soal', $this->record->exam_id);
        }
    }

    public function hapus_gambar($soal, $id){

		$record = Question::findOrFail($id);

		$questionImage = $record->questionImages;	
		
		QuestionImage::where('question_id', $id)->where('type', $soal)->delete();	

		return redirect('exams/soal/'. $this->exam_id);

	}
}
