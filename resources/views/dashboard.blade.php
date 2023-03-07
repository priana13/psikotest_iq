@extends('layouts.admin')

@section('main-content')

<style>

    .card:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }


</style>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <div class="row">


        <div class="col-xl-8">

            <div class="row">

                    <!--Col-->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body text-center">

                                <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('member.soal') }}?type=psikotes">Psikotes</a>


                                <div class="row no-gutters align-items-center">                                   

                                    <p class="mt-2 text-center">Simulasi tes Psikologi yang meliputi tes Kecerdasan, kecermatan dan kepribadian</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Col-->
                    <div class="col-xl-4 col-md-6 mb-4">

                        <div class="card border-left-warning shadow-sm h-100 py-2">
                            <div class="card-body text-center">
                                <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase " href="{{ route('member.soal') }}?type=Akademik">AKADEMIK</a>

                                <div class="row no-gutters align-items-center">                                   

                                    <p class="mt-2 text-center">Simulasi akademik yang meliputi tes pengetahuan umum, Bahasa Indonesia, Bahasa Inggris, Matematika</p>
                                   
                                </div>

                              


                            </div>
                        </div>
                        
                    </div>

                    <!--Col-->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow-sm h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2 text-center">
                                        <div class="font-weight-bold text-primary text-uppercase mb-1">POTENSI DIRI</div>
                                        <div class="h5 mb-0 font-weight-bold text-danger text-uppercase">segera hadir</div>
                                    </div>

                                    <p class="mt-2 text-center">Ketahui potensi dan pengembangan dirimu</p>
                                  
                                </div>
                            </div>
                        </div>                      


                    </div>


            </div>
            {{-- akhir row --}}


            {{-- row kedua --}}
            <div class="row">

                <!--Col-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2 text-center">
                                    <div class="font-weight-bold text-primary text-uppercase mb-1 ">LEADERSHIP</div>
                                    <div class="h5 mb-0 font-weight-bold text-danger">SEGERA HADIR</div>
                                </div>

                                <p class="mt-2 text-center">Ketahui dan pahami tipe kepemimpinan</p>
                               
                            </div>
                        </div>
                    </div>
                </div>


                <!--Col-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-danger shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2 text-center">
                                    <div class="font-weight-bold text-primary text-uppercase mb-1">INTELECTUAL QUOTIENT</div>
                                    <div class="h5 mb-0 font-weight-bold text-danger">SEGERA HADIR</div>
                                </div>

                                <p class="mt-2 text-center">Mau mengetahui IQ kamu, yuk coba di sini</p>
                               
                            </div>
                        </div>
                    </div>
                </div>

            


        </div>
        {{-- akhir row --}}



        </div>
        {{-- akhir col-xl-8 --}}


        <div class="col-xl-4">


            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
                </div>
                <div class="card-body">
                    <p>Terimakasih telah menggunakan layanan psikotes kami, semoga aplikasi ini bermanfaat untuk Anda</p>
                    <p class="mb-0">Jika lupa terus berlatih dan menambah pengetahuan, semoga Anda sukses.</p>
                </div>
            </div>



        </div>



    </div>

 


@endsection
