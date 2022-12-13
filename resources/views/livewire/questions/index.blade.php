@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">
        @if(isset($id))

        @livewire('questions',[
            'id' => $id
        ])

        @else

        @livewire('questions')

        @endif

    </div>     
</div>   


@push('script')

    <script>

        alert('oke')
    </script>
@endpush

@endsection