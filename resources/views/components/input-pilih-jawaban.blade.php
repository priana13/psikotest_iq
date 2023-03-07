<div class="form-group card shadow-sm p-3">                
    <label for="a">Pilihan Jawaban {{ $pilihan }}</label>

    <div class="row">
        <div class="col-md-4">

            @if($gambar)

            <div class="image position-relative mb-2" id="image-{{ $pilihan }}">
                 <img src="{{ asset('storage/' . $gambar) }}" alt="" srcset="" class="img-fluid border">             

                    <button class="btn btn-sm position-absolute rounded" data-toggle="tooltip" data-placement="right" title="Hapus" style="top:-20px;right:-10px;" onclick="hapusImage({{ $questionId }},'{{ $pilihan }}')">
                        <i class="fas fa-times text-danger"></i>                
                    </button>              
                 
                
            </div>   
            
            @endif

            <input class="" type="file" name="gambar_{{ $pilihan }}"> 
            
            
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


    <script>

        function hapusImage(id,pilihan){

            event.preventDefault();

            $.ajax({
                
                method:'post',
                url: '{{ route('admin.questions.hapus_gambar') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'pilihan' : pilihan,
                    'id' : id
                },
                success:function(result){

                     $('#image-' + pilihan).addClass('d-none');
                }
            });


        }

    </script>


</div>