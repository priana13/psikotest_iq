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