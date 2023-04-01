<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;


	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $category_id = 1, $slug, $title, $body, $status = "Publish";
    public $categories;
    public $updateMode = false;

    public function mount(){

        $this->user_id = auth()->user()->id;
        $this->categories = Category::all();
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.posts.view', [
            'posts' => Post::latest()
						->orWhere('user_id', 'LIKE', $keyWord)
						->orWhere('category_id', 'LIKE', $keyWord)
						->orWhere('slug', 'LIKE', $keyWord)
						->orWhere('title', 'LIKE', $keyWord)
						->orWhere('body', 'LIKE', $keyWord)
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
		$this->user_id = null;
		$this->category_id = null;
		$this->slug = null;
		$this->title = null;
		$this->body = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'user_id' => 'required',
		'category_id' => 'required',
		'slug' => 'required',
		'title' => 'required',
		'body' => 'required',
		'status' => 'required',
        ]);

        $path_gambar = null;

		if($this->gambar){

			$path_gambar =  $this->gambar->store('public/photos/page');
			$path_gambar = explode('public/' , $path_gambar);
			$path_gambar = $path_gambar[1];	
		}

        Post::create([ 
			'user_id' => $this-> user_id,
			'category_id' => $this-> category_id,
			'slug' => $this-> slug,
			'title' => $this-> title,
			'body' => $this-> body,
            'image' => $path_gambar,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Post Successfully created.');
    }

    public function edit($id)
    {
        $record = Post::findOrFail($id);

        $this->selected_id = $id; 
		$this->user_id = $record-> user_id;
		$this->category_id = $record-> category_id;
		$this->slug = $record-> slug;
		$this->title = $record-> title;
		$this->body = $record-> body;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'user_id' => 'required',
		'category_id' => 'required',
		'slug' => 'required',
		'title' => 'required',
		'body' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Post::find($this->selected_id);
            $record->update([ 
			'user_id' => $this-> user_id,
			'category_id' => $this-> category_id,
			'slug' => $this-> slug,
			'title' => $this-> title,
			'body' => $this-> body,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Post Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Post::where('id', $id);
            $record->delete();
        }
    }
}
