<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class Categories extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $slug, $category;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.categories.view', [
            'categories' => Category::latest()
						->orWhere('slug', 'LIKE', $keyWord)
						->orWhere('category', 'LIKE', $keyWord)
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
		$this->slug = null;
		$this->category = null;
    }

    public function store()
    {
        $this->validate([
		'slug' => 'required',
		'category' => 'required',
        ]);

        Category::create([ 
			'slug' => $this-> slug,
			'category' => $this-> category
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Category Successfully created.');
    }

    public function edit($id)
    {
        $record = Category::findOrFail($id);

        $this->selected_id = $id; 
		$this->slug = $record-> slug;
		$this->category = $record-> category;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'slug' => 'required',
		'category' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Category::find($this->selected_id);
            $record->update([ 
			'slug' => $this-> slug,
			'category' => $this-> category
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Category Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Category::where('id', $id);
            $record->delete();
        }
    }
}
