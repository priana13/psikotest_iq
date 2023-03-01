<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Exam;
use App\Models\Question;
use DB;

class Exams extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama_tes, $waktu, $nilai_min, $peraturan;
    public $updateMode = false;
    public $type;
    public $selected = 'all';
    public $selected_type,$col_qty = null;

    public function render()
    {        

		$keyWord = '%'.$this->keyWord .'%';      

        if($this->keyWord){

            $exams  = Exam::latest()
            ->orWhere('nama_tes', 'LIKE', $keyWord)
            ->orWhere('waktu', 'LIKE', $keyWord)
            ->orWhere('nilai_min', 'LIKE', $keyWord)
            ->orWhere('peraturan', 'LIKE', $keyWord)
            ->paginate(10);

        }else{     
            
            if($this->selected == 'all'){

                $exams = Exam::latest()->paginate(10);
 
            }else{

                $exams = Exam::latest()->where('type' , $this->selected)->paginate(10);

            }


        }
     
        $qty = [
            'all' => Exam::count(),
            'cerdas' => Exam::type('cerdas')->count(),
            'cermat' => Exam::type('cermat')->count(),
            'kepribadian' => Exam::type('kepribadian')->count(),
            'Akademik' => Exam::type('Akademik')->count(),
        ]; 

        return view('livewire.exams.view', compact('exams' , 'qty'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nama_tes = null;
		$this->waktu = null;
		$this->nilai_min = null;
		$this->peraturan = null;
    }

    public function store()
    {
        $this->validate([
		'nama_tes' => 'string|required',
		'waktu' => 'string|required',
		'nilai_min' => 'string|required',
		'peraturan' => 'string',
        ]);

        Exam::create([ 
			'nama_tes' => $this-> nama_tes,
			'waktu' => $this-> waktu,
			'nilai_min' => $this-> nilai_min,
			'peraturan' => $this-> peraturan,
            'type' => $this->type
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Exam Successfully created.');
    }

    public function edit($id)
    {
        $record = Exam::findOrFail($id);

        $this->selected_id = $id; 
		$this->nama_tes = $record-> nama_tes;
		$this->waktu = $record-> waktu;
		$this->nilai_min = $record-> nilai_min;
		$this->peraturan = $record-> peraturan;
        $this->selected_type = $record->type;
        $this->col_qty = $record->col_qty;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nama_tes' => 'required',
		'waktu' => 'required',
		'nilai_min' => 'required',
		'peraturan' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Exam::find($this->selected_id);
            $record->update([ 
			'nama_tes' => $this-> nama_tes,
			'waktu' => $this-> waktu,
			'nilai_min' => $this-> nilai_min,
			'peraturan' => $this-> peraturan,
            'col_qty' => $this->col_qty
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Exam Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            // Hapus Soal / question          

            $record = Exam::where('id', $id);
            $record->delete();
        }
    }

    public function pilihType($type){

        $this->type = $type;
    }

    public function pilihSoal($type){

       $this->selected = $type;

    }
}
