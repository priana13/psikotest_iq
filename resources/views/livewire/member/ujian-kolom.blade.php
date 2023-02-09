<div>

    <style>

        .tombol {
            padding: 10px 23px 10px 23px;
            margin-bottom: 5px;
        }


    </style>

    <div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card position-relative">

                <div class="card-header text-center">                   

                    <h4 class="text-center">
                        Tes: {{ $exam->nama_tes }}
                    </h4>              

                    <h6 class="d-none">
                        Nomor: {{ $nomor }} - Soal terakhir: {{ $soal_terakhir }} - Waktu: {{ $sisa_waktu }}
                    </h6>
                  
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

                    <div class="col-md-7 mx-auto text-center">
                        <h4>Kolom {{ $kolom }} </h4>

                        <table class="table table-striped">
                            <tr class="bg-primary text-light h2">
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>E</th>                               
                            </tr>  

                            <tr class="h2">
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

                        <div class="my-4">                          

                            <h3 class="font-bold" style="font-size:46px;margin-bottom:10px;">{{ $list_nomor }}</h3> <br>
                            
                            <div class="my-3 h2">
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('A')" style="font-size:32px;">A</button>
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('B')" style="font-size:32px;">B</button>
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('C')" style="font-size:32px;">C</button>
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('D')" style="font-size:32px;">D</button>
                                <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('E')" style="font-size:32px;">E</button>
                                
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
        CountDownTimer('waktu');

        function CountDownTimer(id)
        {
            var end = new Date('{{$endtime}}').getTime();
            var _detik = 1000;
            var _menit = _detik * 60;
            var _jam = _menit * 60;
            var _hari = _jam * 24;                     

            const timer = setInterval(function showRemaining() {
                var now = new Date();
                var now = new Date().toLocaleString("en-US", {
                            timeZone: "Asia/Jakarta",
                        });

                const now_jakarta = new Date(now).getTime();

                var selisih = end - now_jakarta;
               
                if (selisih < 0) {

                    clearInterval(timer); 
                    
                    // alert('Waktu Tes Kolom ini Telah Habis');

                    Swal.fire({
                        title: 'WAKTU HABIS',
                        text: 'Pindah kolom berikutnya',
                        timer: 3000, // 3 detik
                        timerProgressBar: true,
                        background: '#282A3A',
                        color: '#ffff',
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

                // var days = Math.floor(selisih / _hari);
                var jam = Math.floor((selisih % _hari) / _jam);
                var menit = Math.floor((selisih % _jam) / _menit);
                var detik = Math.floor((selisih % _menit) / _detik);


                // document.getElementById(id).innerHTML = days + 'days ';
                document.getElementById(id).innerHTML = jam + ':';
                document.getElementById(id).innerHTML += menit + ':';
                document.getElementById(id).innerHTML += detik;                
                
            }, 1000);

            // clearInterval(timer);
            // console.log(timer);
        }



    </script>

    @endif


</div>