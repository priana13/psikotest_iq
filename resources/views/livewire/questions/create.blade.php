<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="exam_id"></label>
                <select wire:model="exam_id" class="form-control" id="exam_id" placeholder="Exam Id">
                    <option value="">Pilih Test</option>
                    @foreach ($exams as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->nama_tes }}</option>
                    @endforeach
                    
                </select>               
                @error('exam_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soal"></label>
                <input wire:model="soal" type="text" class="form-control" id="soal" placeholder="Soal">@error('soal') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="a">Pilihan Jawaban A</label>
                <input wire:model="a" type="text" class="form-control" id="a" placeholder="A">@error('a') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="b">Pilihan Jawaban B</label>
                <input wire:model="b" type="text" class="form-control" id="b" placeholder="B">@error('b') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="c">Pilihan Jawaban C</label>
                <input wire:model="c" type="text" class="form-control" id="c" placeholder="C">@error('c') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="d">Pilihan Jawaban D</label>
                <input wire:model="d" type="text" class="form-control" id="d" placeholder="D">@error('d') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="e">Pilihan Jawaban E</label>
                <input wire:model="e" type="text" class="form-control" id="e" placeholder="E">@error('e') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="kc_jawaban"></label>
                <input wire:model="kc_jawaban" type="text" class="form-control" id="kc_jawaban" placeholder="Kc Jawaban">@error('kc_jawaban') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="gambar"></label>
                <input wire:model="gambar" type="text" class="form-control" id="gambar" placeholder="Gambar">@error('gambar') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status"></label>
                <select wire:model="status" class="form-control" id="status" placeholder="Status">
                    <option value="">Pilih Status</option>
                    <option value="on">Aktif</option>
                    <option value="off">Tidak Aktif</option>    
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
