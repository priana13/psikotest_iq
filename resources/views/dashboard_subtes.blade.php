@extends('layouts.admin')

@section('main-content')

<style>

    .card:hover {
        transform: scale(1.02);
        transition: transform 0.2s ease;
    }


</style>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> {{ $title }} </h1>

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


        <div class="col-xl-12">

            <div class="row">

                @foreach( $categori as $row )

               
                    <!--Col-->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 py-2 px-3">
                            <div class="card-body text-center feature-1 text-center ">
                                <div class="wrap-icon icon-1">
                                    <i class="bi bi-calculator-fill"></i>                                    
                                </div>
                                <div>
                                    <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase text-decoration-none" href="{{ route('member.soal') }}?type=psikotes">TES {{ $row->name }}</a>
                                </div>  
                               
                            </div>
                        </div>
                    </div>

                @endforeach
                    <!--Col-->
                    {{-- <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 py-2 px-3">
                            <div class="card-body text-center feature-1 text-center ">
                                <div class="wrap-icon icon-1">
                                    <i class="bi bi-thermometer-sun"></i>                                    
                                </div>
                                <div>
                                    <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase text-decoration-none" href="{{ route('member.soal') }}?type=psikotes">Tes Kecerdasan</a>
                                </div>  
                                
                            </div>
                        </div>
                    </div>

                    <!--Col-->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 py-2 px-3">
                            <div class="card-body text-center feature-1 text-center ">
                                <div class="wrap-icon icon-1">
                                    <i class="bi bi-person-badge"></i>                                    
                                </div>
                                <div>
                                    <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase text-decoration-none" href="{{ route('member.soal') }}?type=psikotes">TES KEPRIBADIAN</a>
                                </div>  
                                
                            </div>
                        </div>
                    </div> --}}


                

            </div>
            {{-- akhir row --}}


        </div>
        {{-- akhir col-xl-8 --}}

        


    </div>

 


@endsection
