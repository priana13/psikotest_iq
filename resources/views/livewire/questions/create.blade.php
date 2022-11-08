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
                <input wire:model="exam_id" type="text" class="form-control" id="exam_id" placeholder="Exam Id">@error('exam_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="soal"></label>
                <input wire:model="soal" type="text" class="form-control" id="soal" placeholder="Soal">@error('soal') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="a"></label>
                <input wire:model="a" type="text" class="form-control" id="a" placeholder="A">@error('a') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="b"></label>
                <input wire:model="b" type="text" class="form-control" id="b" placeholder="B">@error('b') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="c"></label>
                <input wire:model="c" type="text" class="form-control" id="c" placeholder="C">@error('c') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="d"></label>
                <input wire:model="d" type="text" class="form-control" id="d" placeholder="D">@error('d') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="e"></label>
                <input wire:model="e" type="text" class="form-control" id="e" placeholder="E">@error('e') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="kc_jawaban"></label>
                <input wire:model="kc_jawaban" type="text" class="form-control" id="kc_jawaban" placeholder="Kc Jawaban">@error('kc_jawaban') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="gambar"></label>
                <input wire:model="gambar" type="text" class="form-control" id="gambar" placeholder="Gambar">@error('gambar') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status"></label>
                <input wire:model="status" type="text" class="form-control" id="status" placeholder="Status">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
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
