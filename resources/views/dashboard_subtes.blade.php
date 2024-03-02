@extends('layouts.admin')

@section('main-content')

<style>

    .card:hover {
        transform: scale(1.02);
        transition: transform 0.2s ease;
    }


</style>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> {{ ucfirst($title) }} </h1> 


    <div class="row">


        <div class="col-xl-12">

            <div class="row">

            @if( count( $categori ) > 0)


                @if($title == 'Pengembangan')                    

                    <!-- Test TKK - TKM -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 py-2 px-3">
                            <div class="card-body text-center feature-1 text-center ">
                                <div class="wrap-icon icon-1">
                                    <i class="bi bi-calculator-fill"></i>                                    
                                </div>
                                <div>
                                    <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase text-decoration-none" href="{{ route('member.soal.type' , $categori->first()->id) }}?jenis_pengembangan=tkp-tkm">TES TKP</a>
                                    <p>Tes Kemampuan Kepolisian</p>
                                </div>  
                            
                            </div>
                        </div>
                    </div>


                    <!-- Test TKK - TKM -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 py-2 px-3">
                            <div class="card-body text-center feature-1 text-center ">
                                <div class="wrap-icon icon-1">
                                    <i class="bi bi-calculator-fill"></i>                                    
                                </div>
                                <div>
                                    <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase text-decoration-none" href="{{ route('member.soal.type' , $categori->first()->id) }}?jenis_pengembangan=tkk">TES TKK</a>
                                    <p>Tes Ketrampilan Komputer</p>
                                </div>  
                            
                            </div>
                        </div>
                    </div>
                


                @else 

                    @foreach( $categori as $row )
                
                        <!--Col-->
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm h-100 py-2 px-3">
                                <div class="card-body text-center feature-1 text-center ">
                                    <div class="wrap-icon icon-1">
                                        <i class="bi bi-calculator-fill"></i>                                    
                                    </div>
                                    <div>
                                        <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase text-decoration-none" href="{{ route('member.soal.type' , $row->id) }}">TES {{ $row->name }}</a>
                                    </div>  
                                
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endif


            @else

                <div class="mx-auto p-4 rounded border border-dark mt-4">
                    <h4>Silahkan membeli paket terlebih dahulu untuk mengakses halaman ini</h4>
                </div>
                
            @endif

            </div>
            {{-- akhir row --}}


        </div>
        {{-- akhir col-xl-8 --}}

        


    </div>

 


@endsection
