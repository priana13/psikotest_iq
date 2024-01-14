@extends('layouts.admin')
@section('main-content')
<style>
    .card:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }


</style>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Norma List Soal') }}</h1>
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
            <!--Col-->
           
            <?php
                $nama = [];

                if($test){
                    foreach ($test as $key => $value) {                        
                        $nama[$value->tipe] = $value->nama;
                    }
                } 
            ?>
                <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.se') }}">{{($nama[1])??'INTELLIGENCE STRUCTURE TEST SE - 01'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.wa') }}">{{($nama[2])??'INTELLIGENCE STRUCTURE TEST WA - 02'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.an') }}">{{($nama[3])??'INTELLIGENCE STRUCTURE TEST AN - 03'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.ge') }}">{{($nama[4])??'INTELLIGENCE STRUCTURE TEST GE - 04'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.ra') }}">{{($nama[5])??'INTELLIGENCE STRUCTURE TEST RA - 05'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.zr') }}">{{($nama[6])??'INTELLIGENCE STRUCTURE TEST ZR - 06'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.fa') }}">{{($nama[7])??'INTELLIGENCE STRUCTURE TEST FA - 07'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.wu') }}">{{($nama[8])??'INTELLIGENCE STRUCTURE TEST WU - 08'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.mind') }}">{{($nama[9])??'INTELLIGENCE STRUCTURE TEST ME - Mind'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mt-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">                            
                            <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="{{ route('norma.quiz.me') }}">{{($nama[10])??'INTELLIGENCE STRUCTURE TEST ME - 09'}}</a>            
                            <div class="row no-gutters align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                            
        </div>
        {{-- akhir row --}}
        
    </div>
    {{-- akhir col-xl-8 --}}
    
</div>
@endsection
