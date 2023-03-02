@extends('layouts.admin')
<!-- Modal -->

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">      
{{-- 
        @livewire('questions.update-question', [
            'id' => $id
        ])      --}}

        @include('livewire.questions.update-question')

    </div>     
</div>   

@endsection