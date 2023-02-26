<div class="">
    <div class="">
        <h5 class="" id="updateModalLabel">Edit Soal</h5>     
    </div>
    <div class="modal-body">
        <form>
            <input type="hidden" wire:model="selected_id">
    
            <input wire:model="exam_id" type="hidden" class="form-control" id="exam_id" placeholder="Exam Id">@error('exam_id') <span class="text-danger">{{ $message }}</span> @enderror
    
    <div class="form-group" wire:ignore >
        <label for="soal">Soal No <strong>{{ $no }}</strong> </label>      

        {{ $soalnya }}
       
        <textarea class="form-control" id="ckeditor" wire:model="soalnya" placeholder="Soal"></textarea>
        @error('soal') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="form-group card shadow p-3">                
        <label for="a">Pilihan Jawaban A</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-a" wire:model="a" type="text" class="form-control" cols="30" rows="10"></textarea>
                
                @error('a') <span class="text-danger">{{ $message }}</span> @enderror
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

                <img src="{{ asset('storage/' . $gambar_a_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">

                <div class="d-flex">

                    <input class="" type="file" wire:model="gambar_a"> 
                    <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('a', {{ $edit_id }})">Hapus</button>   

                </div>

                

            </div>                 

        </div>
    </div>
    <div class="form-group card shadow p-3">
        <label for="b">Pilihan Jawaban B</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-b" wire:model="b" type="text" class="form-control" cols="30" rows="10"></textarea>
                
                @error('b') <span class="text-danger">{{ $message }}</span> @enderror

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
                <img src="{{ asset('storage/' . $gambar_b_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                
                <input class="" type="file" wire:model="gambar_b" id="gambar_b"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('b', {{ $edit_id }})">Hapus</button>  

            </div>

        </div>
    </div>

    <div class="form-group card shadow p-3">
        <label for="c">Pilihan Jawaban C</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-c" wire:model="c" type="text" class="form-control" cols="30" rows="10"></textarea>
               
                @error('c') <span class="text-danger">{{ $message }}</span> @enderror

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
                <img src="{{ asset('storage/' . $gambar_c_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                <input class="" type="file" wire:model="gambar_c" id="gambar_c"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('c', {{ $edit_id }})">Hapus</button>  

            </div>

        </div>
    </div>
    <div class="form-group card shadow p-3">
        <label for="d">Pilihan Jawaban D</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-d" wire:model="d" type="text" class="form-control" cols="30" rows="10"></textarea>
               
                @error('d') <span class="text-danger">{{ $message }}</span> @enderror
                

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
                <img src="{{ asset('storage/' . $gambar_d_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                <input class="" type="file" wire:model="gambar_d" id="gambar_d"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('d', {{ $edit_id }})">Hapus</button>  

            </div>
        </div>

    </div>
    <div class="form-group card shadow p-3">
        <label for="e">Pilihan Jawaban E</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-e" wire:model="e" type="text" class="form-control" cols="30" rows="10"></textarea>

                @error('e') <span class="text-danger">{{ $message }}</span> @enderror
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
                <img src="{{ asset('storage/' . $gambar_e_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                <input class="" type="file" wire:model="gambar_e" id="gambar_e"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('e', {{ $edit_id }})">Hapus</button>  

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
        <button type="button" wire:click.prevent="update" class="btn btn-primary" data-dismiss="modal">Save</button>
    </div>
</div>
