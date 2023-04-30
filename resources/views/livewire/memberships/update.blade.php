<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Membership</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            
          

            <div class="form-group">
                <label for="member_type">Type</label>
                <input wire:model="member_type" type="text" class="form-control" id="member_type" placeholder="Member Type" readonly>@error('member_type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="start">Start</label>
                <input wire:model="start" type="date" class="form-control" id="start" placeholder="Start" readonly>@error('start') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="end">End</label>
                <input wire:model="end" type="date" class="form-control" id="end" placeholder="End">@error('end') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="status">Pilih Paket</label>
                <select wire:model="package_id" id="" class="form-control">
                    <option value="">Pilih</option>
                    @foreach($package as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
               @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="status">Status</label> 
                <select wire:model="status" id="" class="form-control">
                    <option value="active">Aktif</option>
                    <option value="pending">Pending</option>
                    <option value="expired">Expired</option>
                </select>

                @error('status') <span class="text-danger">{{ $message }}</span> @enderror


            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Update</button>
            </div>
       </div>
    </div>
</div>
