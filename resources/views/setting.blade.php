@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card">
            <div class="card-title px-4 pt-4">

                <h5 class="modal-title" id="createDataModalLabel"> <i class="fas fa-save"></i> Setting</h5>

            </div>          

            <div class="card-body">
      
                <form method="post" action="{{ route('setting.update') }}" enctype="multipart/form-data">
                    @csrf   

                        <h5 class="mb-2"> <em>Global</em>  </h5>  

                        <div class="form-group row">
                            <label class="col-md-2">Nama Aplikasi</label>
                            <input type="text" class="form-control form-control-sm col-md-8" name="app_name" value="{{ $setting["app_name"]->value }}">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">App Bio</label>
                            <textarea type="text" class="form-control form-control-sm col-md-8" name="app_bio">{{ $setting["app_bio"]->value }}</textarea>
                        </div>

                        <div class="title mb-3 mt-5">
                            <h5 class=""> <em>Dahboard</em>  </h5>                          
                            <small id="" class="form-text text-muted">
                               Pengumumana akan muncul di halaman dashboard
                            </small>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2">Pengumuman</label>
                            <textarea type="text" id="ckeditor" class="form-control" name="pengumuman">{{ $setting["pengumuman"]->value }}</textarea>
                        </div>
                      

                    
                        <div class="title mb-3 mt-5">
                            <h5 class=""> <em>Halaman Statis</em>  </h5>                          
                            <small id="" class="form-text text-muted">
                                Jika Halaman belum tersedia, Anda Harus <a href="{{ route("admin.posts") }}" target="_blank">Membuat Page</a>  terlebih dahulu.
                            </small>
                        </div>
                      
        
                        <div class="form-group row">
                            <label class="col-md-2" for="kontak">Contact</label>
                            <select class="form-control form-control-sm col-md-8" id="" name="kontak">
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
                            <select class="form-control form-control-sm col-md-8" id="" name="tentang">
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
                            <select class="form-control form-control-sm col-md-8" id="" name="syarat_ketentuan">
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
                            <select class="form-control form-control-sm col-md-8" id="" name="kebijakan">
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


                        <div class="form-group row">
                            <label class="col-md-2" for="kebijakan">Tips & Trick</label>
                            <select class="form-control form-control-sm col-md-8" id="" name="tips_and_trick">
                                <option value="0">Select Category</option>
                                @foreach ($list_category as $category)
                                <option value="{{ $category->id }}"
                                    @if($setting["tips_and_trick"])
                                        {{ ($setting["tips_and_trick"]->id == $category->id)?"selected":"" }}
                                    @endif
                                    >{{ $category->category }}</option> 
                                 @endforeach       
                            </select>                            
                            @error('tips_and_trick') <span class="text-danger">{{ $message }}</span> @enderror
        
                        </div>   



                        <div class="title mb-3 mt-5">
                            <h5 class=""> <em>Setting Pendaftaran Offline</em>  </h5>                          
                            {{-- <small id="" class="form-text text-muted">
                                Jika Halaman belum tersedia, Anda Harus <a href="{{ route("admin.posts") }}" target="_blank">Membuat Page</a>  terlebih dahulu.
                            </small> --}}
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2">Harga Test Offline</label>
                            <input type="text" class="form-control form-control-sm col-md-8" name="biaya_offline" value="{{ $setting["biaya_offline"]->value }}">
                        </div>


                        <div class="title mb-3 mt-5">
                            <h5 class=""> <em>Tryout Setting</em>  </h5>                          
                            <small id="" class="form-text text-muted">
                                Configurasi Test Tryout
                            </small>
                        </div>                       

                        <div class="form-group row">

                            <div class="col-md-8">

                            <label class="col" for="tryout_1">Tryout 1 (Kecerdasan)</label>
                            <select class="form-control form-control-sm" id="" name="tryout_1">
                                <option value="">Select</option>
                                @foreach ($exams_kecerdasan as $exam)                                  


                                <option value="{{ $exam->id }}"
                                    {{ ($tryout_1->exam_id == $exam->id) ? "selected" : "" }}
                                    >{{ $exam->nama_tes }}</option> 
                                 @endforeach       
                            </select>                            
                            @error('tryout_1') <span class="text-danger">{{ $message }}</span> @enderror


                            </div>
                            

                            <div class="col-md-2 ms-2">
                                <label class="col" for="tryout_1">Waktu Petunjuk</label>                              

                                <input type="text" class="form-control form-control-sm " name="petunjuk_timmer_1" value="{{ $tryout_1->petunjuk_timmer }}">

                                
                            </div>                                  


                        </div> 
                        {{-- {{dd('test')}} --}}

                        <div class="form-group row">
                            <div class="col-md-8">

                                <label class="col" for="tryout_2">Tryout 2 (Kepribadian)</label>
                                <select class="form-control form-control-sm col" id="" name="tryout_2">
                                    <option value="">Select</option>

                                  
                                    @foreach ($exams_kepribadian as $row)

                                    

                                    <option value="{{ $exam->id }}"
                                        {{ ($tryout_2->exam_id == $exam->id) ? "selected" : "" }}
                                        >{{ $exam->nama_tes }}</option> 
                                     @endforeach       
                                </select>                            
                                @error('tryout_2') <span class="text-danger">{{ $message }}</span> @enderror


                            </div>

                            <div class="col-md-2 ms-2">
                                <label class="col" for="tryout_1">Waktu Petunjuk</label>                              

                                <input type="text" class="form-control form-control-sm " name="petunjuk_timmer_2" value="{{ $tryout_2->petunjuk_timmer }}">

                                
                            </div>  
                          
        
                        </div> 


                        <div class="form-group row">
                            <div class="col-md-8">

                                <label class="col" for="tryout_3">Tryout 3 (Sikap Kerja)</label>
                                <select class="form-control form-control-sm col" id="" name="tryout_3">
                                    <option value="">Select</option>
                                    @foreach ($exams_sikap_kerja as $exam)
                                    <option value="{{ $exam->id }}"
                                        {{ ($tryout_3->exam_id == $exam->id) ? "selected" : "" }}
                                        >{{ $exam->nama_tes }}</option> 
                                     @endforeach       
                                </select>                            
                                @error('tryout_3') <span class="text-danger">{{ $message }}</span> @enderror


                            </div>

                            <div class="col-md-2 ms-2">
                                <label class="col" for="tryout_1">Waktu Petunjuk</label>                              

                                <input type="text" class="form-control form-control-sm " name="petunjuk_timmer_3" value="{{ $tryout_3->petunjuk_timmer }}">

                                
                            </div>  
                           
        
                        </div> 
                        
                        
                        
                      
                        <button type="submit" class="btn btn-primary close-modal">
                            <i class="fas fa-save"></i>
                            Simpan</button>
            
            
                </form>

            </div>
            
        </div>

      



    </div>     
</div>   

<script>



</script>




@endsection

