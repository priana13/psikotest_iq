<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>

            <div class="form-group">
                <label for="type">Type</label>
                <select wire:model="type" id="type" class="form-control">
                    <option value="">Type</option>
                    <option value="full">Full Akses</option>
                    <option value="satuan">Satuan</option>
                </select>
                
                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>



            <div class="form-group">
                <label for="name">Nama</label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="qty">Qty</label>
                <input wire:model="qty" type="number" class="form-control" id="qty" placeholder="Qty">@error('qty') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input wire:model="price" type="number" class="form-control" id="price" placeholder="Price">@error('price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea wire:model="detail" id="" class="form-control" cols="30" rows="10"></textarea>                
                @error('detail') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            @if($type == 'satuan')

            <div class="form-group">
                <label for="type">Pilih Akses Test</label>
                <select wire:model="list_test" id="list_test" class="form-control">
                    <option value="">Pilih Test</option>
                    <option value="full">Test ke 1</option>
                   
                </select>
                
                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            @endif

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
