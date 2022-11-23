<div>

    <div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card position-relative">

                <div class="card-header d-flex justify-content-center">                   

                    <h4 class="text-center">
                        {{ $exam->nama_tes }}
                    </h4>              
                  
                </div>
                
                <div class="card-body row">

                    <div class="col-md-4 mx-auto text-center">
                        <h4>Kolom 1 - 1</h4>

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
                                    7
                                </td>
                                <td style="width:20%;">
                                    2
                                </td>
                                <td style="width:20%;">
                                    3
                                </td>
                                <td style="width:20%;">
                                    6
                                </td>
                                <td style="width:20%;">
                                    0
                                </td>  

                            </tr>
                        </table>                       

                        <div class="mt-4">

                            {{-- <h4>Soal</h4> --}}

                            <h4>2	3	0	6</h4>  
 
                            
                            <div class="my-3">
                                <button class="btn btn-success">A</button>
                                <button class="btn btn-secondary">B</button>
                                <button class="btn btn-secondary">C</button>
                                <button class="btn btn-secondary">D</button>
                                <button class="btn btn-secondary">E</button>
                                
                            </div>

                            <div class="my-3">
                                <button class="btn btn-primary">Jawab</button>
                            </div>


                        </div>
                      


                    </div>

                              



                </div>
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
                    
                    alert('Waktu Tes Telah Habis');
                    // emit di sini
                    Livewire.emit('waktuHabis');

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