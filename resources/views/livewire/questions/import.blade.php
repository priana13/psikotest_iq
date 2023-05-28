<!-- Modal -->
<div wire:ignore.self class="modal fade" id="importDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="importDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importDataModalLabel">Import Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">         


            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="text-danger">{{$error}}</div>
            @endforeach
                @endif



			<form>

                <div class="form-group">
                    <label for="file">Pilih File Import:</label>
                    <input wire:model="file" type="file" class="form-control" id="file" placeholder="file">@error('file') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <p>
                    Contoh file import : <a href="{{ asset('format-import.xlsx') }}">example.xlsx</a> 
                </p>

            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Batal</button>
                <button type="button" wire:click.prevent="import()" class="btn btn-primary close-modal">Import</button>
            </div>
        </div>
    </div>
</div>
