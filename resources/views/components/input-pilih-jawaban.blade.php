<div class="form-group card shadow-sm p-3">                
    <label for="a">Pilihan Jawaban {{ $pilihan }}</label>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $gambar) }}" alt="" srcset="" class="img-fluid m-2 border" width="200px">
            <input class="" type="file" name="gambar_{{ $pilihan }}"> 
            <button class="btn btn-sm btn-warning d-none" wire:click.prevent="hapus_gambar('a', {{ $questionId }})">Hapus</button>

            
        </div>
        <div class="col-md-8">
            <textarea id="ckeditor-{{ $pilihan }}" name="{{ $pilihan }}" type="text" class="form-control" cols="30" rows="5">{!! $textSoal !!}</textarea>
            
            @error($pilihan) <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="my-2">        
        <div class="">
            Nilai: <input type="text" name="val_{{ $pilihan }}" class="form-control col-2" value="{{ $value }}">
        </div>
    </div>


</div>