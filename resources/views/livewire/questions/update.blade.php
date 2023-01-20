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
            
                    <input wire:model="exam_id" type="hidden" class="form-control" id="exam_id" placeholder="Exam Id">@error('exam_id') <span class="text-danger">{{ $message }}</span> @enderror
            
            <div class="form-group">
                <label for="soal">Soal No <strong>{{ $no }}</strong> </label>
                <textarea class="form-control" wire:model="soal" id="soal" cols="30" rows="5" placeholder="Soal"></textarea>
                @error('soal') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group card shadow p-3">                
                <label for="a">Pilihan Jawaban A</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="a" type="text" class="form-control" id="a" placeholder="A">@error('a') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row my-2 ">
                    <label class="col-md-3" for="">Nilai</label>
                    <div class="col-md-4">
                        <input type="text" wire:model="val_a" class="form-control">
                    </div>
                </div>


                <div class="row my-2">                 

                    <div class="col-md-8">                       

                        <img src="{{ asset('storage/' . $gambar_a) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">

                        <input class="" type="file" wire:model="gambar_a_edit"> 

                    </div>                 

                </div>
            </div>
            <div class="form-group card shadow p-3">
                <label for="b">Pilihan Jawaban B</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="b" type="text" class="form-control" id="b" placeholder="B">@error('b') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                </div>


                <div class="row my-2 ">
                    <label class="col-md-3" for="">Nilai</label>
                    <div class="col-md-4">
                        <input type="text" wire:model="val_b" class="form-control">
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col">
                        <img src="{{ asset('storage/' . $gambar_b) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                        
                        <input class="" type="file" wire:model="gambar_b_edit" id="gambar_b"> 

                    </div>

                </div>
            </div>

            <div class="form-group card shadow p-3">
                <label for="c">Pilihan Jawaban C</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="c" type="text" class="form-control" id="c" placeholder="C">@error('c') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                </div>


                <div class="row my-2 ">
                    <label class="col-md-3" for="">Nilai</label>
                    <div class="col-md-4">
                        <input type="text" wire:model="val_c" class="form-control">
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col">
                        <img src="{{ asset('storage/' . $gambar_c) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                        <input class="" type="file" wire:model="gambar_c_edit" id="gambar_c"> 

                    </div>

                </div>
            </div>
            <div class="form-group card shadow p-3">
                <label for="d">Pilihan Jawaban D</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="d" type="text" class="form-control" id="d" placeholder="D">@error('d') <span class="text-danger">{{ $message }}</span> @enderror
                        

                    </div>
                </div>


                <div class="row my-2 ">
                    <label class="col-md-3" for="">Nilai</label>
                    <div class="col-md-4">
                        <input type="text" wire:model="val_d" class="form-control">
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col">
                        <img src="{{ asset('storage/' . $gambar_d) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                        <input class="" type="file" wire:model="gambar_d_edit" id="gambar_d"> 

                    </div>
                </div>

            </div>
            <div class="form-group card shadow p-3">
                <label for="e">Pilihan Jawaban E</label>
                <div class="row">
                    <div class="col">
                        <input wire:model="e" type="text" class="form-control" id="e" placeholder="E">@error('e') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>


                <div class="row my-2 ">
                    <label class="col-md-3" for="">Nilai</label>
                    <div class="col-md-4">
                        <input type="text" wire:model="val_e" class="form-control">
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col">
                        <img src="{{ asset('storage/' . $gambar_e) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                        <input class="" type="file" wire:model="gambar_e_edit" id="gambar_e"> 

                    </div>

                </div>

            </div>
            
            <div class="form-group">
                <label for="gambar">Gambar Utama</label>
                <div class="row mt-2">
                    <div class="col">
                        <img src="{{ asset('storage/' . $gambar) }}" alt="" srcset="" class="img-fluid m-2 border" width="300px">

                        <div class="d-flex mt-2">
                            <label for="">Ganti:</label>
                            <input wire:model="gambar_edit" type="file" class="" id="gambar" placeholder="Gambar">
                        
                        </div>

                        @error('gambar') <span class="text-danger">{{ $message }}</span> @enderror                     
        

                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="kc_jawaban">Kunci Jawaban</label>
                <input wire:model="kc_jawaban" type="text" class="form-control" id="kc_jawaban" placeholder="Kc Jawaban">@error('kc_jawaban') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group d-none">
                <label for="status"></label>
                <select wire:model="status" class="form-control" id="status" placeholder="Status">
                    <option value="">Pilih Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>    
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
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
