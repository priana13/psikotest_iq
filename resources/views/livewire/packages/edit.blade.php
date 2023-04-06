@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">   

        @livewire('packages.edit-package', ['package' => $package])

    </div>     
</div>   

@endsection
