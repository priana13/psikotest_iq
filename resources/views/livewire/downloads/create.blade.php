<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Upload file</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="judul"></label>
                <input wire:model="judul" type="text" class="form-control" id="judul" placeholder="Judul">@error('judul') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="form-group">
                <label for="ukuran_file"></label>
                <input wire:model="ukuran_file" type="text" class="form-control" id="ukuran_file" placeholder="Ukuran File">@error('ukuran_file') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}
            <div class="form-group">
                <label for="file"></label>
                <input wire:model="file" type="file" class="form-control" id="file" placeholder="File">@error('file') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="form-group">
                <label for="jumlah_download"></label>
                <input wire:model="jumlah_download" type="text" class="form-control" id="jumlah_download" placeholder="Jumlah Download">@error('jumlah_download') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}
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
