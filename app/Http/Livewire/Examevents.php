<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Examevent;

class Examevents extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $salah, $nilai, $benar;
    public $updateMode = false;
    public $exam_category;

    public $selected = "cermat";

    public function render()
    {

		// $keyWord = '%'.$this->keyWord .'%';          

        $histories = auth()->user()->examevents()->selesai()->type($this->selected)->orderBy('id' , 'desc')->paginate(10);

        $count_history = auth()->user()->examevents()->selesai()->groupType()->pluck('qty','type');    

        (isset($count_history['cermat']))?$cermat = $count_history['cermat']:$cermat=0;
        (isset($count_history['cerdas']))?$kecerdasan = $count_history['cerdas']:$kecerdasan=0;
        (isset($count_history['kepribadian']))?$kepribadian = $count_history['kepribadian']:$kepribadian=0;
        (isset($count_history['Akademik']))?$akademik = $count_history['Akademik']:$akademik=0;

        
        $count_history = [
            'cermat' => $cermat,
            'kecerdasan'=> $kecerdasan,
            'kepribadian' => $kepribadian,
            'Akademik' => $akademik
        ];      

        return view('livewire.examevents.view', [
            'examevents' => $histories,
            'count_history' => $count_history,
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
		$this->salah = null;
		$this->nilai = null;
		$this->benar = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Examevent::create([ 
			'name' => $this-> name,
			'salah' => $this-> salah,
			'nilai' => $this-> nilai,
			'benar' => $this-> benar
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Examevent Successfully created.');
    }

    public function edit($id)
    {
        $record = Examevent::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->salah = $record-> salah;
		$this->nilai = $record-> nilai;
		$this->benar = $record-> benar;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Examevent::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'salah' => $this-> salah,
			'nilai' => $this-> nilai,
			'benar' => $this-> benar
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Examevent Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Examevent::where('id', $id);
            $record->delete();
        }
    }

    public function pilihHiostory($type){

       $this->selected = $type;

    }
}
