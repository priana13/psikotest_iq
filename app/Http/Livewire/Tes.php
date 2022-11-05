<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Te;

class Tes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama_tes, $waktu, $nilai_min, $peraturan;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tes.view', [
            'tes' => Te::latest()
						->orWhere('nama_tes', 'LIKE', $keyWord)
						->orWhere('waktu', 'LIKE', $keyWord)
						->orWhere('nilai_min', 'LIKE', $keyWord)
						->orWhere('peraturan', 'LIKE', $keyWord)
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
		$this->nama_tes = null;
		$this->waktu = null;
		$this->nilai_min = null;
		$this->peraturan = null;
    }

    public function store()
    {
        $this->validate([
		'nama_tes' => 'required',
		'waktu' => 'required',
		'nilai_min' => 'required',
		'peraturan' => 'required',
        ]);

        Te::create([ 
			'nama_tes' => $this-> nama_tes,
			'waktu' => $this-> waktu,
			'nilai_min' => $this-> nilai_min,
			'peraturan' => $this-> peraturan
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Te Successfully created.');
    }

    public function edit($id)
    {
        $record = Te::findOrFail($id);

        $this->selected_id = $id; 
		$this->nama_tes = $record-> nama_tes;
		$this->waktu = $record-> waktu;
		$this->nilai_min = $record-> nilai_min;
		$this->peraturan = $record-> peraturan;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nama_tes' => 'required',
		'waktu' => 'required',
		'nilai_min' => 'required',
		'peraturan' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Te::find($this->selected_id);
            $record->update([ 
			'nama_tes' => $this-> nama_tes,
			'waktu' => $this-> waktu,
			'nilai_min' => $this-> nilai_min,
			'peraturan' => $this-> peraturan
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Te Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Te::where('id', $id);
            $record->delete();
        }
    }
}
