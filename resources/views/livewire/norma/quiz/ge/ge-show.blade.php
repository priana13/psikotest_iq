<div>
    
    <div class="modal-content">
        <div class="card-header">
            <h5 class="modal-title" id="createDataModalLabel">Tambah Soal </h5>           
        </div>                
        <div class="modal-body">
            <input type="hidden" wire:model="quiz_id" name="quiz_id" id="quiz_id">     
            <div class="form-group">
                <label for="nomor">Pilih Nomor Soal</label>
                <select class="form-control" wire:model="no" id="no" name="no">
                    <option value="0"> Piih </option>
                    @if(isset($no))
                    <option value="{{$no}}" selected> {{$no}} </option>
                    @endif
                    @if(isset($listNo))
                        @foreach($listNo as $nomor)
                            <option value=" {{$nomor}} "> {{$nomor}} </option>
                        @endforeach
                    @endif                            
                </select>
            </div>
            <div class="form-group">
                <label for="quiz">Soal</label>
                <textarea class="form-control" wire:model="quiz" id="quiz" name="quiz" cols="30" rows="5"></textarea>
                @error('quiz') <span class="text-danger">{{ $message }}</span> @enderror
            </div>            
            <div class="form-group card shadow p-3">
                <label for="d">Jawaban Kunci 1</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="k1" type="text" class="form-control" id="k1" name="d">@error('d') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>                        
            </div>
            <div class="form-group card shadow p-3">
                <label for="e">Jawaban Kunci 2</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="k2" type="text" class="form-control" id="k2" name="e">@error('e') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                
            </div>
                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            <button type="button" wire:click="simpanQuizGe" class="btn btn-primary close-modal">Save</button>
        </div>
    </div>
    
</div>
