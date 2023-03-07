<div class="row">


    <div class="col">

        <div class="header d-flex justify-content-between">

            <button class="btn btn-sm btn-primary mb-1" onclick="listNo()" id="sidebarToggle">Nomor</button>

            @if(!$finish_status)

                <button class="btn btn-sm btn-danger mb-1" onclick="akhiriTest();">Akhiri Tes</button>

            @endif

        </div>


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $exam->nama_tes }}</h6>
                <h6><strong>{{ $step }}</strong> dari {{ $total }}</h6>
            </div>
            <div class="card-body">
                
                @if(!$finish_status)

                <p> <strong>{!! $soal->soal !!}</strong> </p>

                    @if($soal->gambar)
                        <div class="row">
                            <img src="{{ asset('storage/' . $soal->gambar) }}" alt="" class="img-fluid float-left mx-2" width="400px">

                        </div>  
                    @endif               
              
                <fieldset class="form-group row">
                    
                                    
                    <div class="{{ ($soal->gambar)?"col-sm-9":"col" }} mt-3" >

                        <div class="form-check mb-2 shadow-sm p-2 soal" style=""  wire:click="pilih('a')">

                            <div class="row">                                

                                <input class="mx-3" type="radio" name="jawaban" id="jawaban-a" wire:model="jawaban" value="a">                            
                                <label class="form-check-label" for="jawaban-a">
                                A. {!! $soal->a !!}
                                </label>  

                            </div>

                            <div class="row">  
                                
                                @php 
                                    $src_a = $soal->questionImages()->type('a')->first();
                                    ($src_a)?
                                        $src_a = $src_a->image:
                                        $src_a = '';                                    
                                @endphp
                                @if($src_a)
                                <img class="img img-fluid ml-5 mt-2" src="/storage/{{ $src_a }}" width="100px" alt="" srcset="">
                                @endif
                            </div>

                        </div>

                        <div class="form-check mb-2 shadow-sm p-2 soal" wire:click="pilih('b')">
                            <div class="row">

                            <input class="mx-3" type="radio" name="jawaban" id="jawaban-b"  wire:model="jawaban" value="b">
                            <label class="form-check-label" for="jawaban-b">
                            B. {!! $soal->b !!}
                            </label>

                            </div>

                            <div class="row">

                                @php 
                                $src_b = $soal->questionImages()->type('b')->first();
                                ($src_b)?
                                    $src_b = $src_b->image:
                                    $src_b = '';                                    
                                @endphp

                                @if($src_b)
                                <img class="img img-fluid ml-5 mt-2" src="/storage/{{ $src_b }}" width="100px" alt="" srcset="">
                                @endif
                            </div>

                        </div>

                        <div class="form-check mb-2 shadow-sm p-2 soal" wire:click="pilih('c')">

                            <div class="row">

                                <input class="mx-3" type="radio" name="jawaban" id="jawaban-c"  wire:model="jawaban" value="c">
                                <label class="form-check-label" for="jawaban-c">
                                C. {!! $soal->c !!}
                                </label>

                            </div>

                            <div class="row">

                                @php 
                                $src_c = $soal->questionImages()->type('c')->first();
                                ($src_c)?
                                    $src_c = $src_c->image:
                                    $src_c = '';                                    
                                @endphp

                                @if($src_c)
                                <img class="img img-fluid ml-5 mt-2" src="/storage/{{ $src_c }}" width="100px" alt="" srcset="">
                                @endif

                            </div>

                        </div>

                        <div class="form-check mb-2 shadow-sm p-2 soal" wire:click="pilih('d')">

                            <div class="row">
                                <input class="mx-3" type="radio" name="jawaban" id="jawaban-d" wire:model="jawaban" value="d">
                                <label class="form-check-label" for="jawaban-d">
                                D. {!! $soal->d !!}
                                </label>
                            </div>

                            <div class="row">

                                @php 
                                $src_d = $soal->questionImages()->type('d')->first();
                                ($src_d)?
                                    $src_d = $src_d->image:
                                    $src_d = '';                                    
                                @endphp
                                
                                @if($src_d)
                                <img class="img img-fluid ml-5 mt-2" src="/storage/{{ $src_d }}" width="100px" alt="" srcset="">
                                @endif
                            </div>

                          
                        </div>

                        <div class="form-check mb-2 shadow-sm p-2 soal" wire:click="pilih('e')">

                            <div class="row">
                                <input class="mx-3" type="radio" name="jawaban" id="jawaban-e"  wire:model="jawaban" value="e">
                                <label class="form-check-label" for="jawaban-e">
                                E. {!! $soal->e !!}
                                </label>

                            </div>

                            <div class="row">

                                @php 
                                $src_e = $soal->questionImages()->type('e')->first();
                                ($src_e)?
                                    $src_e = $src_e->image:
                                    $src_e = '';                                    
                                @endphp

                                @if($src_e)

                                <img class="img img-fluid ml-5 mt-2" src="/storage/{{ $src_e }}" width="100px" alt="" srcset="">
                               
                                @endif
                            </div>

                        </div>                      
                   
                    </div>
                </fieldset>

                <div class="mb-3">
                    <div class="arror">
                        @error('jawaban') <span class="text-danger">Belum ada Jawaban yang Terpilih</span> @enderror                     
                    </div>
                </div>
                
                <div class="d-flex justify-content-left">
                    <button class="btn btn-default btn-sm mr-3" wire:click="jawab_nanti">
                        Jawab Nanti
                    </button>
                    <button class="btn btn-primary btn-sm" wire:click="berikutnya" type="submit">
                        Jawab
                    </button>

                </div>
                

                @else

                {{-- JIKA SUDAH SELESAI --}}         


                <div class="text-center">

                    <p class="text-center">
                        Terimakasih Sudah menyelesaikan Psikotes ini dengan baik
                        {{-- <h3 class="text-center">Score Anda: <strong> <span class="text-success">{{ $examEvent->nilai }}</span> </strong></h3> --}}
                    </p>  

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('member.history') }}" class="btn btn-secondary btn-sm mr-3">
                            History
                        </a>
                        <a href="{{ route('member.hasil_ujian_umum', $examEvent) }}" class="btn btn-success btn-sm mr-3"  type="submit">
                            Lihat Hasil
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

    @push('scripts')
    

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

                    var now = new Date().toLocaleString("en-US", {
                            timeZone: "Asia/Jakarta",
                        });

                    const now_jakarta = new Date(now).getTime();
                    // console.log(now, end , now_jakarta );

                    var selisih = end - now_jakarta;
                    if (selisih < 0) {

                        clearInterval(timer); 
                        
                        alert('Waktu Tes Telah Habis');
                        // emit di sini
                        Livewire.emit('waktuHabis');

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

        }

        var hidesidebar = 0;

        function listNo(){

            if(hidesidebar == 0){
                $('#accordionSidebar').hide();
                hidesidebar = 1;
            }else{
                $('#accordionSidebar').show();
                hidesidebar = 0;

            }

        }

        function akhiriTest(){       


            Swal.fire({
                icon: 'warning',
                title: 'Yakin ingin mengakhiri Tes ini?', 
                confirmButtonText: 'Ya Akhiri',                   
                showCancelButton: true,                           
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

                    Livewire.emit('selesaikanUjian');

                    Swal.fire('Tes Telah Diakhiri!', '', 'success')
                } 
            })


        }
      


    </script>

    @endpush


</div>