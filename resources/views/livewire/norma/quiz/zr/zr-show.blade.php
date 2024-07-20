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
             <label for="a">Kunci Jawaban</label>
            <div class="form-group card shadow p-3">

                <input wire:model="k2" type="number" class="form-control col-sm-2">
              
                <div class="form-group row d-none">
                    <label class="col-1 text-center"></label>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">1</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="1" />                                
                        </div>
                    </div>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">2</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="2" />                                
                        </div>
                    </div>     
                    <div class="col-1 form-group">
                        <label class="form-control text-center">3</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="3" />                                
                        </div>
                    </div>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">4</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="4" />                                
                        </div>
                    </div>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">5</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="5" />                                
                        </div>
                    </div>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">6</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="6" />                                
                        </div>
                    </div>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">7</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="7" />                                
                        </div>
                    </div>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">8</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="8" />                                
                        </div>
                    </div>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">9</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="9" />                                
                        </div>
                    </div>
                    <div class="col-1 form-group">
                        <label class="form-control text-center">0</label>
                        <div class="icheck-primary icheck-inline text-center">
                            <input type="checkbox" wire:model="k" value="0" />                                
                        </div>
                    </div>                   
                </div>                       
            </div>
                                   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            <button type="button" wire:click="simpanQuizZr" class="btn btn-primary close-modal">Save</button>
        </div>
    </div>
    
</div>
