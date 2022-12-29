<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Ubah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="nama_tes">Judul</label>
                <input wire:model="nama_tes" type="text" class="form-control" id="nama_tes" placeholder="Nama Tes">@error('nama_tes') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            @if($selected_type == 'cermat')

                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="waktu">Jumlah Kolom</label>
                        <input wire:model="col_qty" type="text" class="form-control" id="col_qty" placeholder="col_qty">@error('col_qty') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="waktu">Waktu</label>
                        <input wire:model="waktu" type="text" class="form-control" id="waktu" placeholder="Waktu">@error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
            @else

            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input wire:model="waktu" type="text" class="form-control" id="waktu" placeholder="Waktu">@error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            @endif


            <div class="form-group">
                <label for="nilai_min">Nilai Minimal</label>
                <input wire:model="nilai_min" type="text" class="form-control" id="nilai_min" placeholder="Nilai Min">@error('nilai_min') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="peraturan">Peraturan</label>
                <textarea wire:model="peraturan" id="peraturan" cols="30" rows="10"
                class="form-control"
                ></textarea>
                @error('peraturan') <span class="text-danger">{{ $message }}</span> @enderror
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
