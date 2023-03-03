<div class="form-group card shadow p-3">                
    <label for="a">Pilihan Jawaban {{ $pilihan }}</label>
    <div class="row">
        <div class="col">
            <textarea id="ckeditor-{{ $pilihan }}" name="{{ $pilihan }}" type="text" class="form-control" cols="30" rows="5">{!! $textSoal !!}</textarea>
            
            @error($pilihan) <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row my-2 ">
        <label class="col-md-3" for="">Nilai</label>
        <div class="col-md-4">
            <input type="text" name="val_{{ $pilihan }}" class="form-control" value="{{ $value }}">
        </div>
    </div>


    <div class="row my-2">                 

        <div class="col-md-8">                                        

            <img src="{{ asset('storage/' . $gambar) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">

            <div class="d-flex">

                <input class="" type="file" name="gambar_{{ $pilihan }}"> 
                <button class="btn btn-sm btn-warning" wire:click.prevent="hapus_gambar('a', {{ $questionId }})">Hapus</button>   

            </div>

            

        </div>                 

    </div>
</div>