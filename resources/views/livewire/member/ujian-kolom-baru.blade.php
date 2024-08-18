<div>


        
    @if($examEvent->status != 'Selesai')
    <!-- timmer -->
    <div id="timer" class=""
    x-data="{
        sisaWaktu: 0,
        status: '{{ $examEvent->status }}',
        textWaktu : ''
    }"

    x-init="

    let waktu = localStorage.getItem('sisaWaktu{{ $examEvent->id }}');

    if(waktu == null || waktu == 0){

        localStorage.setItem('sisaWaktu{{ $examEvent->id }}', 60);
    }

    {{-- console.log(waktu); --}}

    {{-- 

    console.log(localStorage.getItem('sisaWaktu{{ $examEvent->id }}')); --}}

    fetch('{{ url('/api/cek-waktu/' . $examEvent->id) }}')
        .then(response => response.json())
        .then(data => sisaWaktu = data);


    myinterval = setInterval(function() {  

        waktu = localStorage.getItem('sisaWaktu{{ $examEvent->id }}');

        var _detik = 1000;
        var _menit = _detik * 60;
        var _jam = _menit * 60;
        var _hari = _jam * 24; 

        {{-- console.log(waktu) --}}

        if(waktu > 0){
            {{-- sisaWaktu -= 1;  --}}

            localStorage.setItem('sisaWaktu{{ $examEvent->id }}' , waktu - 1);   
            
            sisaWaktu = waktu;
        
            var jam = Math.floor((sisaWaktu * _detik % _hari) / _jam);
            var menit = Math.floor((sisaWaktu * _detik % _jam) / _menit);
            var detik = Math.floor((sisaWaktu * _detik % _menit) / _detik);            

            textWaktu = jam + ':';
            textWaktu += menit + ':';
            textWaktu += detik;

        }
        
        
        if( waktu == 1){

            Swal.fire({
                title: 'WAKTU HABIS',
                text: 'Pindah kolom berikutnya',
                timer: 3000, // 3 detik
                timerProgressBar: true,
                background: '#282A3A',
                color: '#ffff',
                didDestroy: function(){
                    Livewire.emit('waktuHabis');

                    $wire.kirimJawaban( localStorage.getItem('jawaban') );

                    localStorage.setItem('nomor_saat_ini' , 1);

                    localStorage.setItem('jawaban', JSON.stringify([]));
                }
            });
            

        }      
                
    }, 1000);   

            
    "

    >

            @if(request()->is_tryout)   

                <div class="row">

                    <livewire:header-tryout></livewire:header-tryout>

                

                    <div class="col d-flex justify-items-center">

                        <h3 class="text-center my-auto"> 
                                {{-- <i class="fas fa-fw fa-clock"></i>             --}}
                            <span class="btn btn-primary text-lg font-weight-bold" id="waktu2" x-text="textWaktu">0:0:0</span>        
                        </h3>  

                    </div>

                </div>

            @else                
                <h3 class="text-center"> 
                {{-- <i class="fas fa-fw fa-clock"></i>             --}}
                    <span class="btn btn-primary text-lg font-weight-bold" id="waktu2" x-text="textWaktu">0:0:0</span>        
                </h3> 
            @endif


        {{-- <h2 class="text-center">     

            <span class="btn btn-primary font-weight-bold py-1" style="font-size: 32px;letter-spacing: 5px;"
                x-text="textWaktu"
            >0:0:0</span>
        </h2>            --}}
    </div>

    @endif

    {{-- @livewire('member.ujian-kolom' , 
    [
    'exam' => $exam,
    'examEvent' => $examEvent,
    'kolom' => $kolom
    ]) --}}



    {{-- start section soal kolom --}}
    <div


        x-data="{
            list_soal_baru: @entangle('list_soal_baru'),
            nomor_saat_ini: 1,
            jawaban: JSON.parse(localStorage.getItem('jawaban')) || [],
            soal_a: '',
            soal_b:'',
            soal_c:'',
            soal_d:'',
            pilihJawaban(jawabanBaru) {                   
            
                const soal = this.list_soal_baru.find(row => row.no == this.nomor_saat_ini);             

                {{-- console.log(soal); --}}

                this.jawaban.push({   
                    id: soal.id,              
                    nomor: this.nomor_saat_ini,
                    jawaban: jawabanBaru
                })

                {{-- console.log(this.jawaban) --}}

                localStorage.setItem('jawaban', JSON.stringify(this.jawaban));

               // setting nomor saat ini lagi
               this.nomor_saat_ini ++;
               localStorage.setItem('nomor_saat_ini', this.nomor_saat_ini);
               const soalBaru = this.list_soal_baru.find(row => row.no == this.nomor_saat_ini);  

                this.soal_a = soalBaru.a;
                this.soal_b = soalBaru.b;
                this.soal_c = soalBaru.c;
                this.soal_d = soalBaru.d;              
                
            },
            getSoal() {
            
                const soal = this.list_soal_baru.find(row => row.no == this.nomor_saat_ini); 

                this.soal_a = soal.a;
                this.soal_b = soal.b;
                this.soal_c = soal.c;
                this.soal_d = soal.d;

            },
            setNomorSaatIni(){

                nomor_local = parseInt( localStorage.getItem('nomor_saat_ini') );

                if(!nomor_local){
                    localStorage.setItem('nomor_saat_ini' , 1);
                }

                this.nomor_saat_ini = parseInt( localStorage.getItem('nomor_saat_ini') );
            }
        }"

        x-init="       
              getSoal();
              setNomorSaatIni();            
        
        "
    
    
    >

            <style>

                .tombol {
                    padding: 8px 15px 8px 15px;
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

                            @if($examEvent->kode_tryout)

                                <div class="mx-auto text-center">

                                    <h2 class="text-center">TRYOUT TELAH SELESAI</h2>

                                    <a href="{{ route('tryout.hasil', $examEvent->kode_tryout) }}" class="btn btn-success"  type="submit">
                                        LIHAT NILAI
                                    </a>

                                </div>
                            

                            @else

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

                            @endif 


                            @else

                            <div class="col-md-7 mx-auto text-center">
                                <h4>Kolom {{ $kolom }} 
                                    {{-- - No:  <span x-text="nomor_saat_ini"></span> --}}
                                </h4>

                                <table class="table table-striped">
                                    <tr class="bg-primary text-light h3">
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

                                    <h3 class="font-bold" style="font-size:40px;margin-bottom:10px;">
                                        <span x-text="soal_a"></span>
                                        <span x-text="soal_b"></span>
                                        <span x-text="soal_c"></span>
                                        <span x-text="soal_d"></span>
                                        {{-- {{ $list_nomor }} --}}
                                    </h3> <br>
                                    
                                    <div class="my-3">                                     

                                        <button class="btn btn-secondary btn-lg tombol"  x-on:click="pilihJawaban('{{ $exam_column->a }}')" style="font-size:20px;">A</button>
                                        <button class="btn btn-secondary btn-lg tombol" x-on:click="pilihJawaban('{{ $exam_column->b }}')" style="font-size:20px;">B</button>
                                        <button class="btn btn-secondary btn-lg tombol" x-on:click="pilihJawaban('{{ $exam_column->c }}')" style="font-size:20px;">C</button>
                                        <button class="btn btn-secondary btn-lg tombol" x-on:click="pilihJawaban('{{ $exam_column->d }}')" style="font-size:20px;">D</button>
                                        <button class="btn btn-secondary btn-lg tombol" x-on:click="pilihJawaban('{{ $exam_column->e }}')" style="font-size:20px;">E</button>
                                        
                                        {{-- <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('A')" style="font-size:20px;">A</button>
                                        <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('B')" style="font-size:20px;">B</button>
                                        <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('C')" style="font-size:20px;">C</button>
                                        <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('D')" style="font-size:20px;">D</button>
                                        <button class="btn btn-secondary btn-lg tombol" wire:click.prevent="jawab('E')" style="font-size:20px;">E</button>
                                         --}}
                                    </div>                          


                                </div>
                            


                            </div>
                            @endif
                                    



                        </div>
                    </div>
                </div>
            </div>
            

    {{-- end section soal kolom --}}


    @push('scripts')
    <script>

        Livewire.on('ujianSelesai', id => {

            $('#timer').hide();

        });


    </script>
    @endpush




</div>