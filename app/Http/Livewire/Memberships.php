<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Membership;
use App\Models\User;

class Memberships extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $member_type = "Langganan", $start, $end, $status = 'active';
    public $updateMode = false;
    public $users;
    public $warna_status = [
        'active' => 'success',
        'pending' => 'warning',
        'expired' => 'secondary'
    ];

    public function mount(){

        $this->users = User::all();
    }

    public function render()
    {

        $level = auth()->user()->level;

        $keyWord = '%'.$this->keyWord .'%';

        if($level == 'Admin'){

            $memberships = Membership::latest()
                        ->orWhere('user_id', 'LIKE', $keyWord)
                        ->orWhere('member_type', 'LIKE', $keyWord)
                        ->orWhere('start', 'LIKE', $keyWord)
                        ->orWhere('end', 'LIKE', $keyWord)
                        ->orWhere('status', 'LIKE', $keyWord)
                        ->paginate(10);
           
        }else{

            $memberships = auth()->user()->memberships()->latest()->paginate(5);

        }
		
        return view('livewire.memberships.view', compact('memberships'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->user_id = null;
		$this->member_type = null;
		$this->start = null;
		$this->end = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'user_id' => 'required',
		'member_type' => 'required',
		'start' => 'required',
		'end' => 'required',
		'status' => 'required',
        ]);

        Membership::create([ 
			'user_id' => $this-> user_id,
			'member_type' => $this-> member_type,
			'start' => $this-> start,
			'end' => $this-> end,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Membership Successfully created.');
    }

    public function edit($id)
    {
        $record = Membership::findOrFail($id);

        $this->selected_id = $id; 
		$this->user_id = $record-> user_id;
		$this->member_type = $record-> member_type;
		$this->start = $record-> start;
		$this->end = $record-> end;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'user_id' => 'required',
		'member_type' => 'required',
		'start' => 'required',
		'end' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Membership::find($this->selected_id);
            $record->update([ 
			'user_id' => $this-> user_id,
			'member_type' => $this-> member_type,
			'start' => $this-> start,
			'end' => $this-> end,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Membership Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Membership::where('id', $id);
            $record->delete();
        }
    }
}
