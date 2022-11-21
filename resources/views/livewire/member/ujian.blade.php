<div class="row">

    <div class="col">


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $exam->nama_tes }}</h6>
                <h6><strong>{{ $step }}</strong> dari {{ $total }}</h6>
            </div>
            <div class="card-body">
                
                @if(!$finish_status)

                <p> <strong>{{ $step }}. {{ $soal->soal }}</strong> </p>
              
                <fieldset class="form-group row">
                  
                    <div class="col-sm-10">

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-a" wire:model="jawaban" value="a" >
                            <label class="form-check-label" for="jawaban-a">
                            A. {{ $soal->a }}
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-b"  wire:model="jawaban" value="b">
                            <label class="form-check-label" for="jawaban-b">
                            B. {{ $soal->b }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-c"  wire:model="jawaban" value="c">
                            <label class="form-check-label" for="jawaban-c">
                            C. {{ $soal->c }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-d" wire:model="jawaban" value="d">
                            <label class="form-check-label" for="jawaban-d">
                            D. {{ $soal->d }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-e"  wire:model="jawaban" value="e">
                            <label class="form-check-label" for="jawaban-e">
                            E. {{ $soal->e }}
                            </label>
                        </div>
                   
                    </div>
                </fieldset>

                <div class="mb-3">
                    <div class="arror">
                        @error('jawaban') <span class="text-danger">Belum ada Jawaban yang Terpilih</span> @enderror                     
                    </div>
                </div>
                
                <div class="d-flex justify-content-left">
                    <button class="btn btn-default btn-sm mr-3">
                        Sebelunya
                    </button>
                    <button class="btn btn-primary btn-sm" wire:click="berikutnya" type="submit">
                        Berikutnya
                    </button>

                </div>
                

                @else

                {{-- JIKA SUDAH SELESAI --}}         


                <div class="text-center">

                    <p class="text-center">
                        Terimakasih Sudah menyelesaikan Psikotes ini dengan baik, berikut hasil psikotest Anda:
                        <h3 class="text-center">Score Anda: <strong> <span class="text-success">{{ $examEvent->nilai }} 50</span> </strong></h3>
                    </p>  

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('member.history') }}" class="btn btn-secondary btn-sm mr-3">
                            History
                        </a>
                        <a href="{{ route('member.soal') }}" class="btn btn-primary btn-sm"  type="submit">
                            Test Lagi
                        </a>
    
                    </div>


                </div>
                @endif



            </div>
        </div>

    </div>


    <script>
        CountDownTimer('{{$date}}', 'waktu');
        function CountDownTimer(dt, id)
        {
            var end = new Date('{{$endtime}}');
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;
            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                if (distance < 0) {

                    clearInterval(timer);                    
                    return;
                }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                // document.getElementById(id).innerHTML = days + 'days ';
                document.getElementById(id).innerHTML = hours + ':';
                document.getElementById(id).innerHTML += minutes + ':';
                document.getElementById(id).innerHTML += seconds;                
            }
            timer = setInterval(showRemaining, 1000);
        }
    </script>


</div>