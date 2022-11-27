<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Edit Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            
                    <input wire:model="exam_id" type="hidden" class="form-control" id="exam_id" placeholder="Exam Id">@error('exam_id') <span class="error text-danger">{{ $message }}</span> @enderror
            
            <div class="form-group">
                <label for="soal">Soal</label>
                <input wire:model="soal" type="text" class="form-control" id="soal" placeholder="Soal">@error('soal') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group card shadow p-3">                
                <label for="a">Pilihan Jawaban A</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="a" type="text" class="form-control" id="a" placeholder="A">@error('a') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row mt-2">

                    <div class="col">
                        <img class="img img-fluid mr-3" src="storage/{{ $gambar_a }}" alt="" width="100px">
                        <input class="" type="file" wire:model="gambar_a" id="gambar_a"> 

                    </div>

                </div>
            </div>
            <div class="form-group card shadow p-3">
                <label for="b">Pilihan Jawaban B</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="b" type="text" class="form-control" id="b" placeholder="B">@error('b') <span class="error text-danger">{{ $message }}</span> @enderror

                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <img class="img img-fluid mr-3" src="storage/{{ $gambar_b }}" alt="" width="100px">
                        <input class="" type="file" wire:model="gambar_b" id="gambar_b"> 

                    </div>

                </div>
            </div>

            <div class="form-group card shadow p-3">
                <label for="c">Pilihan Jawaban C</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="c" type="text" class="form-control" id="c" placeholder="C">@error('c') <span class="error text-danger">{{ $message }}</span> @enderror

                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <img class="img img-fluid mr-3" src="storage/{{ $gambar_c }}" alt="" width="100px">
                        <input class="" type="file" wire:model="gambar_c" id="gambar_c"> 

                    </div>

                </div>
            </div>
            <div class="form-group card shadow p-3">
                <label for="d">Pilihan Jawaban D</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="d" type="text" class="form-control" id="d" placeholder="D">@error('d') <span class="error text-danger">{{ $message }}</span> @enderror
                        

                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <img class="img img-fluid mr-3" src="storage/{{ $gambar_d }}" alt="" width="100px">
                        <input class="" type="file" wire:model="gambar_d" id="gambar_d"> 

                    </div>
                </div>

            </div>
            <div class="form-group card shadow p-3">
                <label for="e">Pilihan Jawaban E</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="e" type="text" class="form-control" id="e" placeholder="E">@error('e') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <img class="img img-fluid mr-3" src="storage/{{ $gambar_e }}" alt="" width="100px">
                        <input class="" type="file" wire:model="gambar_e" id="gambar_e"> 

                    </div>

                </div>

            </div>
            
            <div class="form-group">
                <label for="gambar">Gambar Utama</label>
                <div class="row mt-2">
                    <div class="col">
                        <img src="storage/{{ $gambar }}" alt="" srcset="" class="img-fluid" width="200px">

                        <input wire:model="gambar" type="file" class="" id="gambar" placeholder="Gambar">@error('gambar') <span class="error text-danger">{{ $message }}</span> @enderror
        

                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="kc_jawaban">Kunci Jawaban</label>
                <input wire:model="kc_jawaban" type="text" class="form-control" id="kc_jawaban" placeholder="Kc Jawaban">@error('kc_jawaban') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>


            <div class="form-group">
                <label for="status">Status</label>
                <input wire:model="status" type="text" class="form-control" id="status" placeholder="Status">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
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
