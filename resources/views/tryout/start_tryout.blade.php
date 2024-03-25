@extends('layouts.admin_full')

@section('main-content')


<div class="row">
    
    <div class="col text-center p-5">

        <h2 class="mt-3 h1"> <strong>Selamat Datang </strong> </h2>

        <h2 class="mb-3 h1"> <strong>Tryout Tes Psikologi</strong> </h2>

        <br>
        <br>

        <p>Jika Anda sudah siap, silahkan klik tombol mulai!</p>

        <a href="{{ route('mulai-ujian' , $try_out_1->exam_id) }}?is_tryout=1" class="btn btn-warning btn-lg text-dark">Mulai</a>

    </div>

</div>    


@endsection