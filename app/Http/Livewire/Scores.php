<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Score;

class Scores extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $exam_id, $benar, $salah, $kosong, $score, $keterangan;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.scores.view', [
            'scores' => Score::latest()
						->orWhere('user_id', 'LIKE', $keyWord)
						->orWhere('exam_id', 'LIKE', $keyWord)
						->orWhere('benar', 'LIKE', $keyWord)
						->orWhere('salah', 'LIKE', $keyWord)
						->orWhere('kosong', 'LIKE', $keyWord)
						->orWhere('score', 'LIKE', $keyWord)
						->orWhere('keterangan', 'LIKE', $keyWord)
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
		$this->user_id = null;
		$this->exam_id = null;
		$this->benar = null;
		$this->salah = null;
		$this->kosong = null;
		$this->score = null;
		$this->keterangan = null;
    }

    public function store()
    {
        $this->validate([
		'user_id' => 'required',
		'exam_id' => 'required',
		'benar' => 'required',
		'salah' => 'required',
		'kosong' => 'required',
		'score' => 'required',
		'keterangan' => 'required',
        ]);

        Score::create([ 
			'user_id' => $this-> user_id,
			'exam_id' => $this-> exam_id,
			'benar' => $this-> benar,
			'salah' => $this-> salah,
			'kosong' => $this-> kosong,
			'score' => $this-> score,
			'keterangan' => $this-> keterangan
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Score Successfully created.');
    }

    public function edit($id)
    {
        $record = Score::findOrFail($id);

        $this->selected_id = $id; 
		$this->user_id = $record-> user_id;
		$this->exam_id = $record-> exam_id;
		$this->benar = $record-> benar;
		$this->salah = $record-> salah;
		$this->kosong = $record-> kosong;
		$this->score = $record-> score;
		$this->keterangan = $record-> keterangan;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'user_id' => 'required',
		'exam_id' => 'required',
		'benar' => 'required',
		'salah' => 'required',
		'kosong' => 'required',
		'score' => 'required',
		'keterangan' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Score::find($this->selected_id);
            $record->update([ 
			'user_id' => $this-> user_id,
			'exam_id' => $this-> exam_id,
			'benar' => $this-> benar,
			'salah' => $this-> salah,
			'kosong' => $this-> kosong,
			'score' => $this-> score,
			'keterangan' => $this-> keterangan
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Score Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Score::where('id', $id);
            $record->delete();
        }
    }
}
