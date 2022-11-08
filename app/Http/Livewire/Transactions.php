<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class Transactions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $user_id, $exam_id, $payment_method_id, $nominal, $status;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.transactions.view', [
            'transactions' => Transaction::latest()
						->orWhere('user_id', 'LIKE', $keyWord)
						->orWhere('exam_id', 'LIKE', $keyWord)
						->orWhere('payment_method_id', 'LIKE', $keyWord)
						->orWhere('nominal', 'LIKE', $keyWord)
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
		$this->exam_id = null;
		$this->payment_method_id = null;
		$this->nominal = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'user_id' => 'required',
		'exam_id' => 'required',
		'payment_method_id' => 'required',
		'nominal' => 'required',
		'status' => 'required',
        ]);

        Transaction::create([ 
			'user_id' => $this-> user_id,
			'exam_id' => $this-> exam_id,
			'payment_method_id' => $this-> payment_method_id,
			'nominal' => $this-> nominal,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Transaction Successfully created.');
    }

    public function edit($id)
    {
        $record = Transaction::findOrFail($id);

        $this->selected_id = $id; 
		$this->user_id = $record-> user_id;
		$this->exam_id = $record-> exam_id;
		$this->payment_method_id = $record-> payment_method_id;
		$this->nominal = $record-> nominal;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'user_id' => 'required',
		'exam_id' => 'required',
		'payment_method_id' => 'required',
		'nominal' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Transaction::find($this->selected_id);
            $record->update([ 
			'user_id' => $this-> user_id,
			'exam_id' => $this-> exam_id,
			'payment_method_id' => $this-> payment_method_id,
			'nominal' => $this-> nominal,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Transaction Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Transaction::where('id', $id);
            $record->delete();
        }
    }
}
