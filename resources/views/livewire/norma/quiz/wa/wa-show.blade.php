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
            <div class="form-group card shadow p-3">
                <label for="a">Pilihan Jawaban A</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="a" type="text" class="form-control" id="a" name="a">@error('a') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>                        
            </div>
            <div class="form-group card shadow p-3">
                <label for="b">Pilihan Jawaban B</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="b" type="text" class="form-control" id="b" name="b">@error('b') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                
            </div>
            <div class="form-group card shadow p-3">
                <label for="c">Pilihan Jawaban C</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="c" type="text" class="form-control" id="c" name="c">@error('c') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                
            </div>
            <div class="form-group card shadow p-3">
                <label for="d">Pilihan Jawaban D</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="d" type="text" class="form-control" id="d" name="d">@error('d') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>                        
            </div>
            <div class="form-group card shadow p-3">
                <label for="e">Pilihan Jawaban E</label>
                <div class="row mb-2">
                    <div class="col">
                        <input wire:model="e" type="text" class="form-control" id="e" name="e">@error('e') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <label for="k">Kunci Jawaban </label>
                <select wire:model="k" class="form-control" id="k" name="k">
                    <option value="">Pilih</option>                            
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                    <option value="e">E</option>                           
                </select>
                @error('exam_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>                    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            <button type="button" wire:click="simpanQuizWa" class="btn btn-primary close-modal">Save</button>
        </div>
    </div>
    
</div>
