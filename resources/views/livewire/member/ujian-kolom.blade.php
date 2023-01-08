<div>

    <div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card position-relative">

                <div class="card-header d-flex justify-content-center">                   

                    <h4 class="text-center">
                        Tes: {{ $exam->nama_tes }}
                    </h4>              
                  
                </div>
                
                <div class="card-body row">                  

                    @if($is_finish == TRUE)



                    <div class="mx-auto">
                         <h2 class="text-center">Tes Telah Selesai</h2>
                         <p>Terimakasih Telah Mengikuti Test ini dengan baik</p>
                         {{-- <h1 class="text-center text-primary"> <strong>{{ number_format($nilai_akhir) }}</strong></h1> --}}


                         <div class="d-flex justify-content-center">
                            <a href="{{ route('member.history') }}" class="btn btn-secondary btn-sm mr-3">
                                History
                            </a>
                            <a href="{{ route('member.hasil_ujian', $examEvent) }}" class="btn btn-success btn-sm mr-3"  type="submit">
                                Lihat Hasil
                            </a>
                            <a href="{{ route('member.soal') }}" class="btn btn-primary btn-sm"  type="submit">
                                Test Lagi
                            </a>
        
                        </div>

                        
                    </div>  
                    
                    




                    @else

                    <div class="col-md-4 mx-auto text-center">
                        <h4>Kolom {{ $kolom }} </h4>

                        <table class="table table-striped">
                            <tr class="bg-primary text-light">
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>E</th>                               
                            </tr>  

                            <tr>
                                <td style="width:20%;">
                                    {{ $exam_column->a }}
                                </td>
                                <td style="width:20%;">
                                    {{ $exam_column->b }}
                                </td>
                                <td style="width:20%;">
                                    {{ $exam_column->c }}
                                </td>
                                <td style="width:20%;">
                                    {{ $exam_column->d }}
                                </td>
                                <td style="width:20%;">
                                    {{ $exam_column->e }}
                                </td>  

                            </tr>
                        </table>                       

                        <div class="mt-4">

                            {{-- <h4>Soal</h4> --}}

                            <h3>{{ $list_nomor }}</h3> 
                            
                            <div class="my-3">
                                <button class="btn btn-secondary" wire:click="jawab('A')">A</button>
                                <button class="btn btn-secondary" wire:click="jawab('B')">B</button>
                                <button class="btn btn-secondary" wire:click="jawab('C')">C</button>
                                <button class="btn btn-secondary" wire:click="jawab('D')">D</button>
                                <button class="btn btn-secondary" wire:click="jawab('E')">E</button>
                                
                            </div>                          


                        </div>
                      


                    </div>
                    @endif
                              



                </div>
            </div>
        </div>
    </div>

    @if($is_finish == FALSE)


    <script>
        CountDownTimer('{{$date}}', 'waktu');
        function CountDownTimer(dt, id)
        {
            var end = new Date('{{$endtime}}');
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            let timer;


            function showRemaining() {
                var now = new Date();
                var distance = end - now;
               
                if (distance < 0) {

                    clearInterval(timer); 
                    
                    // alert('Waktu Tes Kolom ini Telah Habis');

                    Swal.fire({
                        title: 'Waktu Tes Kolom ini Telah Habis',           
                        icon: 'warning',
                        confirmButtonText: 'Oke',
                        timer: 3000, // 3 detik
                        timerProgressBar: true,
                        didDestroy: function(){
                            Livewire.emit('waktuHabis');
                        }
                    });
                    
                    // emit di sini                   

                    return;
                }else{

                    // kurangi waktu yang ada di database
                    Livewire.emit('kurangiWaktu');
                }

                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                // document.getElementById(id).innerHTML = days + 'days ';
                document.getElementById(id).innerHTML = hours + ':';
                document.getElementById(id).innerHTML += minutes + ':';
                document.getElementById(id).innerHTML += seconds;   
                
                // kurangi waktu yang ada di database
            //    console.log(seconds);
            }

            timer = setInterval(showRemaining, 1000);
            // clearInterval(timer);
            // console.log(timer);
        }



    </script>

    @endif


</div>