@extends('layouts.admin_full')

@section('main-content')

<div class="row">

    <div class="col">


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="py-3 d-flex flex-row align-items-center justify-content-center">
                <h2 class="m-0 font-weight-bold text-primary">Selamat Datang <strong>
                    @auth {{ auth()->user()->name }} @endauth
                </strong></h2>
                
            </div>
            <div class="card-body text-center">     
                

                <h3 class="mb-5">Anda berada pada halaman uji coba Tes Sikap Kerja</h3>  
                
                
                <br>
                <br>              


                <h3 class="mt-5">Silahkan klik tombol di bawah ini untuk mulai !</h3>             
            
                
                <div class="d-flex justify-content-center mt-5">
                    {{-- <a href="{{ route('home') }}" class="btn btn-default btn-sm mr-3">
                        Batal
                    </a>                    --}}

                    <a href="{{ route('coba.buat_event' , $ujian->id) }}" class="btn btn-warning btn-lg text-dark" type="submit">
                        Mulai Sekarang
                    </a>                  

                </div>                

            </div>
        </div>

    </div>


</div>



@endsection