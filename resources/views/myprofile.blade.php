@extends('layouts.admin')


@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">
      


        <div class="card">

            <form action="{{ route('myprofile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('put')


                <div class="card-header">
                    <h2>My Profile</h2>
                </div>

                <div class="card-body row">

                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" id="my_avatar" class="img img-fluid shadow img-thumbnail" alt="">

                        <div class="form-group my-2">

                            <input type="hidden" name="avatar" id="avatar">

                            <ul class="navbar-nav mx-auto">                                
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle text-dark" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Pilih Avatar
                                  </a>
                                  <div class="dropdown-menu">

                                     {{-- karakter cowok --}}
                                    @for ($i=1; $i <= 10 ; $i++)

                                        <a class="dropdown-item item-avatar"  data-no="{{ $i }}">
                                            <img src="{{ asset('storage/avatar/' . $i . '.png') }}" alt="" class="img-profile rounded-circle avatar">
                                            Man {{ $i }}
                                        </a>    

                                    @endfor    

                                    {{-- karakter cewek --}}
                                    @for ($i=11; $i <= 20 ; $i++)

                                        <a class="dropdown-item item-avatar"  data-no="{{ $i }}">
                                            <img src="{{ asset('storage/avatar/' . $i . '.png') }}" alt="" class="img-profile rounded-circle avatar">
                                            Man {{ $i }}
                                        </a>    

                                    @endfor                                     

                                  
                                  </div>
                                </li>
                               
                            </ul>                            
                                
                        </div>

                        <div class="form-group my-2">
                            <label class="float-label">Custom Profile</label>
                            <input type="file" name="custom_avatar" class="form-control">
                            <span class="form-bar"></span>                            
                        </div>

                    </div>

                    <div class="col-md-8">                   

                            <div class="form-group">
                                <label class="float-label">Name</label>
                                <input type="text" name="name" class="form-control" required="" value="{{ auth()->user()->name }}">
                                <span class="form-bar"></span>   
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror                         
                            </div>

                            <div class="form-group">
                                <label class="float-label">HP</label>
                                <input type="text" name="hp" class="form-control" required="" value="{{ auth()->user()->hp }}">
                                <span class="form-bar"></span>  
                                @error('hp') <span class="text-danger">{{ $message }}</span> @enderror                                         
                            </div>

                            <div class="form-group">
                                <label class="float-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control"  value="{{ auth()->user()->alamat }}">
                                <span class="form-bar"></span>  
                                @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror                                         
                            </div>


                            <div class="form-group">
                                <label class="float-label">Email</label>
                                <input type="email" name="email" class="form-control" readonly required="" value="{{ auth()->user()->email }}">
                                <span class="form-bar"></span>    
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror                                       
                            </div>

                            <div class="form-group">
                                <label class="float-label">New Password</label>
                                <input type="password" name="password" class="form-control" value="lama" >
                                <span class="form-bar"></span>                            
                            </div>
                        

                            <br>

                            <div class="form-group text-right">
                                <button type="sumit" name="sumit" class="btn btn-primary">Update</button>                                                     
                            </div>

                       
                    </div>
                    
                </div>

            </form>

        </div>
        {{-- akhir card --}}


        @push('scripts')


            <script>
 

                $('.item-avatar').click(function(){

                   var no = $(this).data('no');

                    // console.log('/storage/avatar/' + 1 + '.png');

                 $('#my_avatar').attr('src', '/storage/avatar/' + no  + '.png');
                 $('#avatar').val(no);

                })


            </script>


        @endpush



    </div>     
</div>   

@endsection