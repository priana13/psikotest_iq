@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card">
            <div class="card-title px-4 pt-4">

                <h5 class="modal-title" id="createDataModalLabel">Setting</h5>

            </div>          

            <div class="card-body">
      
                <form method="post" action="{{ route('setting.update') }}" enctype="multipart/form-data">
                    @csrf   
                    
                        <h5 class="mb-2"> <em>Halaman Statis</em>  </h5>  
        
                        <div class="form-group row">
                            <label class="col-md-2" for="kontak">Contact</label>
                            <select class="form-control col-md-8" id="" name="kontak">
                                <option value="0">Select</option>
                                @foreach ($list_post as $row)
                                <option value="{{ $row->id }}" 
                                    @if($setting["kontak"])
                                        {{ ($setting["kontak"]->id == $row->id)?"selected":"" }}
                                    @endif
                                    >{{ $row->title }}</option> 
                                @endforeach
                            </select>                            
                            @error('kontak') <span class="text-danger">{{ $message }}</span> @enderror
        
                        </div>   

                        <div class="form-group row">
                            <label class="col-md-2" for="tentang">Tentang Kami</label>
                            <select class="form-control col-md-8" id="" name="tentang">
                                <option value="0">Select</option>
                                @foreach ($list_post as $post)
                                <option value="{{ $post->id }}"
                                    @if($setting["tentang"])
                                        {{ ($setting["tentang"]->id == $post->id)?"selected":"" }}
                                    @endif
                                    >{{ $post->title }}</option> 
                                    @endforeach        
                            </select>                            
                            @error('tentang') <span class="text-danger">{{ $message }}</span> @enderror
        
                        </div>   


                        <div class="form-group row">
                            <label class="col-md-2" for="syarat_ketentuan">Syarat & Ketentuan</label>
                            <select class="form-control col-md-8" id="" name="syarat_ketentuan">
                                <option value="0">Select</option>
                                @foreach ($list_post as $post)
                                <option value="{{ $post->id }}"
                                    @if($setting["syarat_ketentuan"])
                                        {{ ($setting["syarat_ketentuan"]->id == $post->id)?"selected":"" }}
                                    @endif
                                    >{{ $post->title }}</option> 
                                 @endforeach
                            </select>                            
                            @error('syarat_ketentuan') <span class="text-danger">{{ $message }}</span> @enderror
        
                        </div>   


                        <div class="form-group row">
                            <label class="col-md-2" for="kebijakan">Kebijakan Privasi</label>
                            <select class="form-control col-md-8" id="" name="kebijakan">
                                <option value="0">Select</option>
                                @foreach ($list_post as $post)
                                <option value="{{ $post->id }}"
                                    @if($setting["kebijakan"])
                                        {{ ($setting["kebijakan"]->id == $post->id)?"selected":"" }}
                                    @endif
                                    >{{ $post->title }}</option> 
                                 @endforeach       
                            </select>                            
                            @error('kebijakan') <span class="text-danger">{{ $message }}</span> @enderror
        
                        </div>   
                        
                        
                      
                        <button type="submit" class="btn btn-primary close-modal">Simpan</button>
            
            
                </form>

            </div>
            
        </div>

      



    </div>     
</div>   

<script>



</script>




@endsection

