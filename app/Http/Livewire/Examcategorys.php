<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Examcategory;

class Examcategorys extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $type;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.examcategories.view', [
            'examcategories' => Examcategory::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('type', 'LIKE', $keyWord)
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
		$this->name = null;
		$this->type = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'type' => 'required',
        ]);

        Examcategory::create([ 
			'name' => $this-> name,
			'type' => $this-> type
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Examcategory Successfully created.');
    }

    public function edit($id)
    {
        $record = Examcategory::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->type = $record-> type;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'type' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Examcategory::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'type' => $this-> type
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Examcategory Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Examcategory::where('id', $id);
            $record->delete();
        }
    }
}
