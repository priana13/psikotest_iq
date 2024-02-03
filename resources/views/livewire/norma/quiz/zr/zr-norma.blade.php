<div>    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary text-center"><strong>{{$nama??'NORMA TEST ZR - 06'}}</strong></h5>
                </div>
                <div class="card-body row">
                    <input type="hidden" wire:model="test_id" name="test_id" id="test_id">
                    <div class="form-group col-md-9">
                        <label for="nama">Nama Test</label>
                        <input type="text" wire:model="nama" name="nama" class="form-control" id="nama">
                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="waktu">Waktu Test</label>
                        <input wire:model="waktu" name="waktu" type="number" class="form-control" id="waktu">
                        @error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                     <div class="form-group col-md-6">
                        <label for="petunjuk_kesatu">PETUNJUK DASHBOARD</label>
                        <textarea wire:model="petunjuk_kesatu" class="form-control" ></textarea>
                        @error('petunjuk_kesatu') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="petunjuk_kedua">PETUNJUK WAKTU</label>
                        <textarea wire:model="petunjuk_kedua" class="form-control" ></textarea>
                        @error('petunjuk_kedua') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="file_petunjuk">GAMBAR PETUNJUK TEST</label><br>
                        <img src="{{ url('storage/photos/'.$file_petunjuk)}}" alt="no image" style="width: 250px; height: 250px;">
                        <div class="form-control" >
                            <input wire:model="file_petunjuk" type="file" />
                            <input type="button" wire:click="hapusImgTestZr" value="Hapus Gambar" />
                        </div>
                        @error('file_petunjuk') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>                  
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" wire:click="simpanTestZr"><i class="fas fa-save"></i>Simpan</button>
                </div>
            </div>
        </div>        
    </div> 
</div>