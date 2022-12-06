<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaymentMethod;

class PaymentMethods extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $bank, $code, $type = 'Direct', $status = 'Aktif', $no_rek , $gambar;
    public $updateMode = false;


    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.payment-methods.view', [
            'paymentMethods' => PaymentMethod::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('bank', 'LIKE', $keyWord)
						->orWhere('code', 'LIKE', $keyWord)
						->orWhere('type', 'LIKE', $keyWord)
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
		$this->name = null;
		$this->bank = null;
		$this->code = null;
		$this->type = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'bank' => 'required',
		'code' => 'required',
		'type' => 'required',
		'status' => 'required',
        ]);

        PaymentMethod::create([ 
			'name' => $this-> name,
            'no_rek' => $this->no_rek,
			'bank' => $this-> bank,
			'code' => $this-> code,
			'type' => $this-> type,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'PaymentMethod Successfully created.');
    }

    public function edit($id)
    {
        $record = PaymentMethod::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
        $this->no_rek = $record->no_rek;
		$this->bank = $record-> bank;
		$this->code = $record-> code;
		$this->type = $record-> type;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'bank' => 'required',
		'code' => 'required',
		'type' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = PaymentMethod::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
            'no_rek' => $this->no_rek,
			'bank' => $this-> bank,
			'code' => $this-> code,
			'type' => $this-> type,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'PaymentMethod Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = PaymentMethod::where('id', $id);
            $record->delete();
        }
    }
}
