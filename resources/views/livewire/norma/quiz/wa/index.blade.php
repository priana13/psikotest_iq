@extends('layouts.admin')
@section('main-content')
<div class="row justify-content-center">
    <div class="col-md-12">               
        @livewire('norma.quiz.wa.wa-norma')   
        @livewire('norma.quiz.wa.wa-list')    

        
        @push('scripts')
            <script>
                Livewire.on('reloadPage', function () {
                    // Reload the entire page
                    location.reload();
                });
            </script>
        @endpush
    </div>
</div>
@endsection
