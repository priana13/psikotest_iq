<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Confirmation;

class Confirmations extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $transaction_id, $atas_nama, $rek_tujuan, $tanggal_tf, $jumlah, $bukti_transfer;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.confirmations.view', [
            'confirmations' => Confirmation::latest()
						->orWhere('transaction_id', 'LIKE', $keyWord)
						->orWhere('atas_nama', 'LIKE', $keyWord)
						->orWhere('rek_tujuan', 'LIKE', $keyWord)
						->orWhere('tanggal_tf', 'LIKE', $keyWord)
						->orWhere('jumlah', 'LIKE', $keyWord)
						->orWhere('bukti_transfer', 'LIKE', $keyWord)
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
		$this->transaction_id = null;
		$this->atas_nama = null;
		$this->rek_tujuan = null;
		$this->tanggal_tf = null;
		$this->jumlah = null;
		$this->bukti_transfer = null;
    }

    public function store()
    {
        $this->validate([
		'transaction_id' => 'required',
		'atas_nama' => 'required',
		'rek_tujuan' => 'required',
		'tanggal_tf' => 'required',
		'jumlah' => 'required',
		'bukti_transfer' => 'required',
        ]);

        Confirmation::create([ 
			'transaction_id' => $this-> transaction_id,
			'atas_nama' => $this-> atas_nama,
			'rek_tujuan' => $this-> rek_tujuan,
			'tanggal_tf' => $this-> tanggal_tf,
			'jumlah' => $this-> jumlah,
			'bukti_transfer' => $this-> bukti_transfer
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Confirmation Successfully created.');
    }

    public function edit($id)
    {
        $record = Confirmation::findOrFail($id);

        $this->selected_id = $id; 
		$this->transaction_id = $record-> transaction_id;
		$this->atas_nama = $record-> atas_nama;
		$this->rek_tujuan = $record-> rek_tujuan;
		$this->tanggal_tf = $record-> tanggal_tf;
		$this->jumlah = $record-> jumlah;
		$this->bukti_transfer = $record-> bukti_transfer;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'transaction_id' => 'required',
		'atas_nama' => 'required',
		'rek_tujuan' => 'required',
		'tanggal_tf' => 'required',
		'jumlah' => 'required',
		'bukti_transfer' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Confirmation::find($this->selected_id);
            $record->update([ 
			'transaction_id' => $this-> transaction_id,
			'atas_nama' => $this-> atas_nama,
			'rek_tujuan' => $this-> rek_tujuan,
			'tanggal_tf' => $this-> tanggal_tf,
			'jumlah' => $this-> jumlah,
			'bukti_transfer' => $this-> bukti_transfer
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Confirmation Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Confirmation::where('id', $id);
            $record->delete();
        }
    }
}
