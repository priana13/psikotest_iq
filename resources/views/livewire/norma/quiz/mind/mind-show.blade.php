<div>
    
    <div class="modal-content">
        <div class="card-header">
            <h5 class="modal-title" id="createDataModalLabel">Tambah Soal </h5>           
        </div>                
        <div class="modal-body">
            <input type="hidden" wire:model="quiz_id" name="quiz_id" id="quiz_id">     
            
            <div class="form-group card shadow p-3">
                <label for="quiz">Jenis</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="quiz" type="text" class="form-control">@error('a') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>                        
            </div>
            <div class="form-group card shadow p-3">
                <label for="uraian">Keterangan</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="uraian" type="text" class="form-control" >@error('b') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>                
            </div>
                             
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            <button type="button" wire:click="simpanQuizMind" class="btn btn-primary close-modal">Save</button>
        </div>
    </div>
    
</div>
