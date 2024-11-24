@extends('layouts.offline_app')

@section('content')

    <div class="row pt-4"> 

        <div class="mx-auto bg-white p-3 shadow-sm">

            <div class="px-3">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800 font-weight-bold mt-3 "> <span class="font-italic">Formulir</span>  <span class="text-warning font-italic">Registrasi</span>  <br> <span class="h6">Bimbingan Belajar</span> </h1>


            </div>


            <h5 class="mb-4 px-3">Silahkan lengkapi formulir berikut</h5>


            <form method="POST" action="{{ route('offline.registrasi.store') }}" class="user px-3">

                @csrf

                <div class="form-group row">
                    <label for="" class="col-3">Nama</label>
                    <span class="col-1">:</span>
                    <input type="text" class=" col-7 form-control form-control-user" required name="name" placeholder="{{ __('Nama') }}" value="{{ old('name') }}" autofocus>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>  
                
                <div class="form-group row">
                    <label for="" class="col-3">Jenis Kelamin</label>
                    <span class="col-1">:</span>
                    <select name="jenis_kelamin" id="" class="col-7 form-control form-control-user">
                        <option value="">Pilih</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin') <span class="text-danger">{{ $message }}</span> @enderror
                </div>  

                <div class="form-group row">
                    <label for="" class="col-3">Nomor HP/Whatsapp</label>
                    <span class="col-1">:</span>
                    <input type="text" class="col-7 form-control form-control-user" name="hp" placeholder="No Hp/WA" value="{{ old('hp') }}" required>
                </div>

                <div class="form-group row">
                    <label for="" class="col-3">Minat</label>
                    <span class="col-1">:</span>
                    <input type="text" class="col-7 form-control form-control-user" name="minat" placeholder="minat" value="{{ old('minat') }}" required>
                    @error('minat') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group row">
                    <label for="" class="col-3">Alamat</label>
                    <span class="col-1">:</span>
                    <input type="text" class="col-7 form-control form-control-user" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                    @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                </div>


              
                <div class="form-group row">
                    <label for="" class="col-3">Email</label>
                    <span class="col-1">:</span>
                    <input type="email"pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" class="col-7 form-control form-control-user" name="email" placeholder="{{ __('Alamat Email') }}" value="{{ old('email') }}" >
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
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
