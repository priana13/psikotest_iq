@extends('layouts.offline_app')

@section('content')

    <div class="row"> 

        <div class="cols-12 col-sm-6 mx-auto bg-white p-3">

            <div>

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800 font-weight-bold mt-3 "> <span class="font-italic">Formulir</span>  <span class="text-warning font-italic">Registrasi</span>  <br> <span class="h6">Bimbingan Belajar</span> </h1>


            </div>


            <h5 class="mb-4">Silahkan lengkapi formulir berikut</h5>


            <form method="POST" action="{{ route('register') }}" class="user">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group row">
                    <label for="" class="col-sm-3">Nama</label>
                    <span class="col-sm-1">:</span>
                    <input type="text" class=" col-sm-7 form-control form-control-user" name="name" placeholder="{{ __('Nama') }}" value="{{ old('name') }}" required autofocus>
                </div>  
                
                <div class="form-group row">
                    <label for="" class="col-sm-3">Jenis Kelamin</label>
                    <span class="col-sm-1">:</span>
                    <input type="text" class=" col-sm-7 form-control form-control-user" name="name" placeholder="{{ __('Nama') }}" value="{{ old('name') }}" required autofocus>
                </div>  

                <div class="form-group row">
                    <label for="" class="col-sm-3">Nomor HP/Whatsapp</label>
                    <span class="col-sm-1">:</span>
                    <input type="text" class="col-sm-7 form-control form-control-user" name="hp" placeholder="No Hp/WA" value="{{ old('hp') }}" required>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Minat</label>
                    <span class="col-sm-1">:</span>
                    <input type="text" class="col-sm-7 form-control form-control-user" name="minat" placeholder="minat" value="{{ old('minat') }}" required>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Alamat</label>
                    <span class="col-sm-1">:</span>
                    <input type="text" class="col-sm-7 form-control form-control-user" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                </div>


              
                <div class="form-group row">
                    <label for="" class="col-sm-3">Email</label>
                    <span class="col-sm-1">:</span>
                    <input type="email" class="col-sm-7 form-control form-control-user" name="email" placeholder="{{ __('Alamat Email') }}" value="{{ old('email') }}" required>
                </div>

                <div class="dropdown-divider"></div>

                <p class="text-danger font-italic h6">
                    * Dengan mengisi formulir Anda dinyatakan telah memahami dan mengikuti ketentuan yang berlaku
                </p>
              

                @livewire('captcha')

                <p class="text-center">Silahkan klik tombol di bawah ini untuk melanjutkan</p>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-user btn-block">
                        Daftar & Bayar Sekarang
                    </button>
                </div>
            </form>


        </div>
  

    </div>




   

   
@endsection
