<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="transaction_id"></label>
                <input wire:model="transaction_id" type="text" class="form-control" id="transaction_id" placeholder="Transaction Id">@error('transaction_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="atas_nama"></label>
                <input wire:model="atas_nama" type="text" class="form-control" id="atas_nama" placeholder="Atas Nama">@error('atas_nama') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="rek_tujuan"></label>
                <input wire:model="rek_tujuan" type="text" class="form-control" id="rek_tujuan" placeholder="Rek Tujuan">@error('rek_tujuan') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_tf"></label>
                <input wire:model="tanggal_tf" type="text" class="form-control" id="tanggal_tf" placeholder="Tanggal Tf">@error('tanggal_tf') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="jumlah"></label>
                <input wire:model="jumlah" type="text" class="form-control" id="jumlah" placeholder="Jumlah">@error('jumlah') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="bukti_transfer"></label>
                <input wire:model="bukti_transfer" type="text" class="form-control" id="bukti_transfer" placeholder="Bukti Transfer">@error('bukti_transfer') <span class="error text-danger">{{ $message }}</span> @enderror
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
