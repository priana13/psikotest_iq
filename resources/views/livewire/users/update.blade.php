<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="email"></label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="hp"></label>
                        <input wire:model="hp" type="text" class="form-control" id="hp" placeholder="hp">@error('hp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="hp">Password</label>
                        <input wire:model="password" type="text" class="form-control" id="password" placeholder="password">@error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="level"></label>
                        <input wire:model="level" type="text" class="form-control" readonly id="level" placeholder="Level">@error('level') <span class="error text-danger">{{ $message }}</span> @enderror
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
