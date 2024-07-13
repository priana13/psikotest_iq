@extends('layouts.admin')

@section('main-content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('downloads')
        </div>     
    </div>   
</div>
@endsection


{{-- @extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">
        @livewire('examcategorys')
    </div>     
</div>   

@endsection --}}

