<div>   
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">                   
                    <h5 class="m-0 font-weight-bold text-primary text-center"><strong>DATA PESERTA</strong></h5>
                    
                </div>
                <div class="card-body row">                    
                    <div class="form-group col-md-8">
                        <label for="nomor_test">Nomor Test</label>
                        <input wire:model="nomor_test" name="nomor_test" type="number" class="form-control" id="nomor_test">
                        @error('nomor_test') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-8">
                        <label for="name">Nama </label>
                        <input type="text" wire:model="name" name="name" class="form-control" id="name" disabled>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-8">
                        <label for="tgl_lahir">Tgl Lahir</label>
                        <input wire:model="tgl_lahir" name="tgl_lahir" type="date" class="form-control" id="tgl_lahir">
                        @error('tgl_lahir') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-8">
                        <label for="pendidikan">Pendidikan</label>
                        <input wire:model="pendidikan" name="pendidikan" type="text" class="form-control" id="pendidikan">
                        @error('pendidikan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-8">
                        <label for="instansi">Instansi / Sekolah</label>
                        <input wire:model="instansi" name="instansi" type="text" class="form-control" id="instansi">
                        @error('instansi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" wire:click="simpanUserNorma">Next</button>                   
                </div>
            </div>
        </div>        
    </div> 
</div>

<script>
    
</script>
