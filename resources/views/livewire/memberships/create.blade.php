<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Membership</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="user_id"></label>
                <select wire:model="user_id" id="" class="form-control">
                    <option value="">Select</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                
                @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="member_type"></label>
                <input wire:model="member_type" type="text" class="form-control" id="member_type" placeholder="Member Type" readonly>@error('member_type') <span class="">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="start"></label>
                <input wire:model="start" type="date" class="form-control" id="start" placeholder="Start">@error('start') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="end"></label>
                <input wire:model="end" type="date" class="form-control" id="end" placeholder="End">@error('end') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status"></label>
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
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
