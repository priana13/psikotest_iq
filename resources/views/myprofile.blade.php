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
                    <form action="">


                        <div class="form-group">
                            <label class="float-label">Username</label>
                            <input type="text" name="username" class="form-control" required="" value="{{ auth()->user()->name }}">
                            <span class="form-bar"></span>                            
                        </div>

                        <div class="form-group">
                            <label class="float-label">Email</label>
                            <input type="email" name="email" class="form-control" required="" value="{{ auth()->user()->email }}">
                            <span class="form-bar"></span>                            
                        </div>

                        <div class="form-group">
                            <label class="float-label">Password</label>
                            <input type="password" name="password" class="form-control" required="">
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