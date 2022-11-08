<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Question;

class Questions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $exam_id, $soal, $a, $b, $c, $d, $e, $kc_jawaban, $gambar, $status;
    public $updateMode = false;

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
        ]);

        Question::create([ 
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
