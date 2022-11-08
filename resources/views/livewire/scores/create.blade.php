<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Score</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="user_id"></label>
                <input wire:model="user_id" type="text" class="form-control" id="user_id" placeholder="User Id">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="exam_id"></label>
                <input wire:model="exam_id" type="text" class="form-control" id="exam_id" placeholder="Exam Id">@error('exam_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="benar"></label>
                <input wire:model="benar" type="text" class="form-control" id="benar" placeholder="Benar">@error('benar') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="salah"></label>
                <input wire:model="salah" type="text" class="form-control" id="salah" placeholder="Salah">@error('salah') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="kosong"></label>
                <input wire:model="kosong" type="text" class="form-control" id="kosong" placeholder="Kosong">@error('kosong') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="score"></label>
                <input wire:model="score" type="text" class="form-control" id="score" placeholder="Score">@error('score') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="keterangan"></label>
                <input wire:model="keterangan" type="text" class="form-control" id="keterangan" placeholder="Keterangan">@error('keterangan') <span class="error text-danger">{{ $message }}</span> @enderror
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
