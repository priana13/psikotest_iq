@extends('layouts.admin')
@section('main-content')
<div class="row justify-content-center">
    <div class="col-md-12">               
        @livewire('norma.test.main-norma')                   
        @push('scripts')
            <script>
                $('.timer').startTimer({
                    onComplete: function (element) {
                        element.addClass('is-complete');
                        $('#finish').trigger('click');
                    }
                });

                Livewire.on('timerUpdated', (secondsLeft) => {
                    $('.timer').hide();
                    const countdownInterval = setInterval(updateCountdown, 1000);

                    function updateCountdown() {
                        if (secondsLeft > 0) {
                            secondsLeft--;

                            const hours = Math.floor(secondsLeft / 3600);
                            const minutes = Math.floor((secondsLeft % 3600) / 60);
                            const seconds = secondsLeft % 60;

                            const formattedHours = String(hours).padStart(2, '0');
                            const formattedMinutes = String(minutes).padStart(2, '0');
                            const formattedSeconds = String(seconds).padStart(2, '0');

                            const countdownElement = document.getElementById('countdown');
                            countdownElement.innerHTML = `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;
                        } else {
                            
                            clearInterval(countdownInterval);
                            document.getElementById('countdown').innerHTML = '00:00:00';                            
                            $('#finish').trigger('click');
                        }
                    }
                });

                Livewire.on('reloadPage', function () {                    
                    location.reload();
                });
            </script>
        @endpush
    </div>
</div>
@endsection