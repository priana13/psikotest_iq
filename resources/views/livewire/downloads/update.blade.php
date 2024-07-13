<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Download</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="judul"></label>
                <input wire:model="judul" type="text" class="form-control" id="judul" placeholder="Judul">@error('judul') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ukuran_file"></label>
                <input wire:model="ukuran_file" type="text" class="form-control" id="ukuran_file" placeholder="Ukuran File">@error('ukuran_file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="file"></label>
                <input wire:model="file" type="text" class="form-control" id="file" placeholder="File">@error('file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="jumlah_download"></label>
                <input wire:model="jumlah_download" type="text" class="form-control" id="jumlah_download" placeholder="Jumlah Download">@error('jumlah_download') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="keterangan"></label>
                <input wire:model="keterangan" type="text" class="form-control" id="keterangan" placeholder="Keterangan">@error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
