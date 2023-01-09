<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Examevent;

class Examevents extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $salah, $nilai, $benar;
    public $updateMode = false;

    public function render()
    {

		// $keyWord = '%'.$this->keyWord .'%';          

        $histories = auth()->user()->examevents()->selesai()->orderBy('id' , 'desc')->paginate(10);

        return view('livewire.examevents.view', [
            'examevents' => $histories
        ]); 

    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->salah = null;
		$this->nilai = null;
		$this->benar = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Examevent::create([ 
			'name' => $this-> name,
			'salah' => $this-> salah,
			'nilai' => $this-> nilai,
			'benar' => $this-> benar
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Examevent Successfully created.');
    }

    public function edit($id)
    {
        $record = Examevent::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->salah = $record-> salah;
		$this->nilai = $record-> nilai;
		$this->benar = $record-> benar;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Examevent::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'salah' => $this-> salah,
			'nilai' => $this-> nilai,
			'benar' => $this-> benar
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Examevent Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Examevent::where('id', $id);
            $record->delete();
        }
    }
}
