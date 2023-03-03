<div class="">
    <div class="">
        <h5 class="" id="updateModalLabel">Edit Soal</h5>     
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('admin.questions.update', $question->id) }}">

            @method('put')
            @csrf          

            <input name="exam_id" type="hidden" class="form-control" value="{{ $question->id  }}" id="exam_id" placeholder="Exam Id">@error('exam_id') <span class="text-danger">{{ $message }}</span> @enderror
    
    <div class="form-group" wire:ignore >
        <label for="soal">Soal No <strong>{{ $question->no }}</strong> </label>      
       
        <textarea class="form-control" id="ckeditor" name="soal" placeholder="Soal">{{ $question->soal }}</textarea>
        @error('soal') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="form-group card shadow p-3">                
        <label for="a">Pilihan Jawaban A</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-a" name="a" type="text" class="form-control" cols="30" rows="10">{{ $question->a }}</textarea>
                
                @error('a') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row my-2 ">
            <label class="col-md-3" for="">Nilai</label>
            <div class="col-md-4">
                <input type="text" name="val_a" class="form-control" value="{{ $question->val_a }}">
            </div>
        </div>


        <div class="row my-2">                 

            <div class="col-md-8">                                        

                <img src="{{ asset('storage/' . $gambar_a_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">

                <div class="d-flex">

                    <input class="" type="file" name="gambar_a"> 
                    <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('a', {{ $question->id }})">Hapus</button>   

                </div>

                

            </div>                 

        </div>
    </div>
    <div class="form-group card shadow p-3">
        <label for="b">Pilihan Jawaban B</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-b" name="b" type="text" class="form-control" cols="30" rows="10">{{ $question->b }}</textarea>
                
                @error('b') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
        </div>


        <div class="row my-2 ">
            <label class="col-md-3" for="">Nilai</label>
            <div class="col-md-4">
                <input type="text" name="val_b" class="form-control" value="{{ $question->val_a }}">
            </div>
        </div>


        <div class="row mt-2">
            <div class="col">
                <img src="{{ asset('storage/' . $gambar_b_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                
                <input class="" type="file" name="gambar_b" id="gambar_b"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('b', {{ $question->id }})">Hapus</button>  

            </div>

        </div>
    </div>

    <div class="form-group card shadow p-3">
        <label for="c">Pilihan Jawaban C</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-c" name="c" type="text" class="form-control" cols="30" rows="10">{{ $question->c }}</textarea>
               
                @error('c') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
        </div>


        <div class="row my-2 ">
            <label class="col-md-3" for="">Nilai</label>
            <div class="col-md-4">
                <input type="text" name="val_c" class="form-control" value="{{ $question->val_a }}">
            </div>
        </div>


        <div class="row mt-2">
            <div class="col">
                <img src="{{ asset('storage/' . $gambar_c_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                <input class="" type="file" name="gambar_c" id="gambar_c"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('c', {{ $question->id }})">Hapus</button>  

            </div>

        </div>
    </div>
    <div class="form-group card shadow p-3">
        <label for="d">Pilihan Jawaban D</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-d" name="d" type="text" class="form-control" cols="30" rows="10">{{ $question->d }}</textarea>
               
                @error('d') <span class="text-danger">{{ $message }}</span> @enderror
                

            </div>
        </div>


        <div class="row my-2 ">
            <label class="col-md-3" for="">Nilai</label>
            <div class="col-md-4">
                <input type="text" name="val_d" class="form-control" value="{{ $question->val_a }}">
            </div>
        </div>


        <div class="row mt-2">
            <div class="col">
                <img src="{{ asset('storage/' . $gambar_d_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                <input class="" type="file" name="gambar_d" id="gambar_d"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('d', {{ $question->id }})">Hapus</button>  

            </div>
        </div>

    </div>
    <div class="form-group card shadow p-3">
        <label for="e">Pilihan Jawaban E</label>
        <div class="row">
            <div class="col">
                <textarea id="ckeditor-e" name="e" type="text" class="form-control" cols="30" rows="10">{{ $question->e }}</textarea>

                @error('e') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>


        <div class="row my-2 ">
            <label class="col-md-3" for="">Nilai</label>
            <div class="col-md-4">
                <input type="text" name="val_e" class="form-control" value="{{ $question->val_a }}">
            </div>
        </div>


        <div class="row mt-2">
            <div class="col">
                <img src="{{ asset('storage/' . $gambar_e_edit) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
                <input class="" type="file" name="gambar_e" id="gambar_e"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('e', {{ $question->id }})">Hapus</button>  

            </div>

        </div>

    </div>
    
    <div class="form-group">
        <label for="gambar">Gambar Utama</label>
        <div class="row mt-2">
            <div class="col">
                <img src="{{ asset('storage/' . $question->gambar) }}" alt="" srcset="" class="img-fluid m-2 border" width="300px">

                <div class="d-flex mt-2">
                    <label for="">Ganti:</label>
                    <input name="gambar_edit" type="file" class="" id="gambar" placeholder="Gambar">
                
                </div>

                @error('gambar') <span class="text-danger">{{ $message }}</span> @enderror                     


            </div>
        </div>

    </div>

    <div class="form-group">
        <label for="kc_jawaban">Kunci Jawaban</label>
        <input name="kc_jawaban" type="text" class="form-control" id="kc_jawaban" placeholder="Kc Jawaban">@error('kc_jawaban') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group d-none">
        <label for="status"></label>
        <select name="status" class="form-control" id="status" placeholder="Status" required>
            <option value="">Pilih Status</option>
            <option value="Aktif" {{ ($question->status == 'Aktif')? "selected":"" }}>Aktif</option>
            <option value="Tidak Aktif" {{ ($question->status == 'Tidak Aktif')? "selected":"" }}>Tidak Aktif</option>    
        </select>
        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
    </div>


    </div>
    <div class="modal-footer">
        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary" data-dismiss="modal">Update</button>
    </div>

</form>
</div>
