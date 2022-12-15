<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Buat Page Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>

            <div class="form-group">
                <label for="title">Judul</label>
                <input wire:model="title" type="text" class="form-control" id="title" placeholder="Title">@error('title') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug/Url</label>
                <input wire:model="slug" type="text" class="form-control" id="slug" placeholder="Slug">@error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>            
    
            <div class="form-group">
                <label for="category_id">Kategori</label>                

                <select class="form-control" id="" wire:model="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $row)
                    <option value="{{ $row->id }}">{{ $row->category }}</option>
                    @endforeach

                </select>
                
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror


            </div>


            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control"  wire:model="body" id="" cols="30" rows="10"></textarea>
               
                @error('body') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="" wire:model="status">
                    <option value="Publish">Publish</option>
                    <option value="Draft">Draft</option>
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
