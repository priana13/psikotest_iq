<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Download;
use Livewire\WithFileUploads;

class Downloads extends Component
{
    use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $judul, $ukuran_file, $file, $jumlah_download, $keterangan;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.downloads.view', [
            'downloads' => Download::latest()
						->orWhere('judul', 'LIKE', $keyWord)
						->orWhere('ukuran_file', 'LIKE', $keyWord)
						->orWhere('file', 'LIKE', $keyWord)
						->orWhere('jumlah_download', 'LIKE', $keyWord)
						->orWhere('keterangan', 'LIKE', $keyWord)
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
		$this->judul = null;
		$this->ukuran_file = null;
		$this->file = null;
		$this->jumlah_download = null;
		$this->keterangan = null;
    }

    public function store()
    {
        $this->validate([
		'judul' => 'required',
		'file' => 'required',		
        ]);

        $real_size = $this->file->getSize();

        // $size = $real_size / 1024 / 1000;
       

        if($this->file){

            $file = $this->file->store('public/download');
            $explode_file = explode('public/' , $file);
            $file_path = $explode_file[1];

        }     
        
        $ukuran_file = $real_size / 1024;

        Download::create([ 
			'judul' => $this->judul,
			'ukuran_file' => $ukuran_file,
			'file' => $file_path,		
			'keterangan' => $this->keterangan
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Download Successfully created.');
    }

    public function edit($id)
    {
        $record = Download::findOrFail($id);

        $this->selected_id = $id; 
		$this->judul = $record-> judul;
		$this->ukuran_file = $record-> ukuran_file;
		$this->file = $record-> file;
		$this->jumlah_download = $record-> jumlah_download;
		$this->keterangan = $record-> keterangan;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'judul' => 'required',
		'file' => 'required',
		'jumlah_download' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Download::find($this->selected_id);
            $record->update([ 
			'judul' => $this-> judul,
			'ukuran_file' => $this-> ukuran_file,
			'file' => $this-> file,
			'jumlah_download' => $this-> jumlah_download,
			'keterangan' => $this-> keterangan
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Download Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Download::where('id', $id);
            $record->delete();
        }
    }
}
