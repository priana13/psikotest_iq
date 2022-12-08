@extends('layouts.admin_full')

@section('main-content')

<div class="row mb-3 d-flex justify-content-center">
    <h2> <strong>Konfirmasi Pembayaran</strong> </h2>
</div>

<div class="row">

    <div class="col-md-7 m-auto">

        <div class="card shadow pb-4">          
         
            <div class="card-body text-center">

                <h3> Terimakasih <strong>{{ auth()->user()->name }}</strong> </h3>

                <h3>Konfirmasi Anda sudah kami terima!</h3>

                <h4 class="mt-5">
                    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
                    
                </h4>
                    

            </div>
            <!-- /.card-body -->           
          
        </div>

          
    </div>
</div>



@endsection