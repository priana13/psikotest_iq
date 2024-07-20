<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $email, $level, $hp, $kota;
    public $updateMode = false;
    public $total;

    public $password;

    public function mount(){

        $this->total = User::online()->count();
    }

    public function render()
    {

        $users = User::online()->latest();        

        $keyWord = '%'.$this->keyWord .'%';

        if($this->keyWord){

            $users = $users->where('name', 'LIKE' , $keyWord);

        }  
     
        $users = $users->paginate(10);
        
        return view('livewire.users.view', [
            'users' => $users,
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
		$this->email = null;
		$this->level = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
		'level' => 'required',
        ]);

        $default_password = "123456";

        User::create([ 
			'name' => $this-> name,
			'email' => $this-> email,
			'level' => $this-> level,
            'hp' => $this->hp,
            'kota' => $this->kota,
            'password' => Hash::make($default_password),
            'string_password' => $default_password
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'User Successfully created.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->email = $record-> email;
        $this->hp = $record->hp;
        $this->kota = $record->kota;
		$this->level = $record-> level;

        $this->password = $record->string_password;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
		'level' => 'required',
        ]);

        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'email' => $this-> email,
            'hp' => $this->hp,
            'kota' => $this->kota,
			'level' => $this-> level
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'User Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }
}
