<div class="row justify-content-center">
    <div class="col-md-12"> 

        <div>

           {{-- <p>Tipe : {{ $tipe }}</p> --}}

            @if($tipe == 1)    
                @livewire('norma.test.kesatu')   
            @elseif($tipe == 2)    
                @livewire('norma.test.kedua')   
            @elseif($tipe == 3)    
                @livewire('norma.test.ketiga')   
            @elseif($tipe == 4)    
                @livewire('norma.test.keempat')   
            @elseif($tipe == 5)    
                @livewire('norma.test.kelima')   
            @elseif($tipe == 6)    
                @livewire('norma.test.keenam')   
            @elseif($tipe == 7)    
                @livewire('norma.test.ketujuh')   
            @elseif($tipe == 8)    
                @livewire('norma.test.kedelapan')   
            @elseif($tipe == 9)    
                @livewire('norma.test.kesembilan')   
            @elseif($tipe == 10)    
                @livewire('norma.test.kesepuluh')   
            @elseif($tipe == 11)    
                {{-- @livewire('norma.user-norma')    --}}
                {{-- link ke welcome --}}
                <div class="text-center my-4">

                    <a href="{{ route('norma.test.welcome') }}" class="btn btn-primary">Kembali ke Beranda</a>
                
                </div>
            @else
                @livewire('norma.test.petunjuk')   
            @endif
        
        </div>

    </div>

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

