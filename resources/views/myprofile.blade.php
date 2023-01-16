@extends('layouts.admin')


@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">
      


        <div class="card">
            <div class="card-header">
                <h2>My Profile</h2>
            </div>

            <div class="card-body row">

                <div class="col-md-4 mb-4">
                    <img src="/img/logo.jpg" class="img img-fluid shadow-lg img-thumbnail" alt="">
                </div>

                <div class="col-md-8">
                    <form action="{{ route('myprofile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('put')

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
                            <input type="email" name="email" class="form-control" required="" value="{{ auth()->user()->email }}">
                            <span class="form-bar"></span>    
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror                                       
                        </div>

                        <div class="form-group">
                            <label class="float-label">New Password</label>
                            <input type="password" name="password" class="form-control" value="lama" >
                            <span class="form-bar"></span>                            
                        </div>

                        <div class="form-group mb-3">
                            <label class="float-label">Photo Profile</label>
                            <input type="file" name="photo" class="form-control">
                            <span class="form-bar"></span>                            
                        </div>

                        <br>

                        <div class="form-group text-right">
                            <button type="sumit" name="sumit" class="btn btn-primary">Update</button>                                                     
                        </div>

                    </form>
                </div>
                
            </div>
        </div>



    </div>     
</div>   

@endsection