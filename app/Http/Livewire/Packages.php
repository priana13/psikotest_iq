<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Package;

class Packages extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $qty, $price, $detail, $type , $list_test;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.packages.view', [
            'packages' => Package::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('qty', 'LIKE', $keyWord)
						->orWhere('price', 'LIKE', $keyWord)
						->orWhere('detail', 'LIKE', $keyWord)
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
		$this->qty = null;
		$this->price = null;
		$this->detail = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'qty' => 'required',
		'price' => 'required',
        'type' => 'required',
        ]);

        Package::create([ 
            'type' => $this->type,
			'name' => $this-> name,
			'qty' => $this-> qty,
			'price' => $this-> price,
			'detail' => $this-> detail
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Package Successfully created.');
    }

    public function edit($id)
    {
        $record = Package::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->qty = $record-> qty;
		$this->price = $record-> price;
		$this->detail = $record-> detail;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'qty' => 'required',
		'price' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Package::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'qty' => $this-> qty,
			'price' => $this-> price,
			'detail' => $this-> detail
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Package Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Package::where('id', $id);
            $record->delete();
        }
    }
}
