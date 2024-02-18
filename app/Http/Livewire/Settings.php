<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Setting;

class Settings extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord;
    public $updateMode = false;

    public function render()
    {
  
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.settings.view', [
            'settings' => Setting::latest()
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
    }

    public function store()
    {
        $this->validate([
        ]);

        Setting::create([ 
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Setting Successfully created.');
    }

    public function edit($id)
    {
        $record = Setting::findOrFail($id);

        $this->selected_id = $id; 
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
        ]);

        if ($this->selected_id) {
			$record = Setting::find($this->selected_id);
            $record->update([ 
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Setting Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Setting::where('id', $id);
            $record->delete();
        }
    }
}
