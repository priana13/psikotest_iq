<div>              
    @if(($waktu_mulai !==null))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-md-6 mb-4">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body text-center">
                                <div class="row no-gutters align-items-center">
                                    <p class="mt-2 text-center">{{$NormaMind['petunjuk_kedua']??''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <x-card-timer>

                            <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  
                            <h1 class="text-white-100 text-center" id="countdown"></h1>

                        </x-card-timer>
                        <div id="customToastr" class="custom-toastr">
                            <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-title px-4 pt-4 text-center">
                                <h5>{{$nama_test}}</h5>
                            </div>
                            @if($QuizMe)
                                @foreach($QuizMe as $QS => $q)
                                    <div class="card-body">
                                        {{-- Nomor & Pertanyaan --}}
                                        <div class="d-flex align-items-center gap-2 mb-3 pb-3 border-bottom">
                                            <span class="badge rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mr-3"
                                                style="width:32px;height:32px;font-size:14px;flex-shrink:0;">
                                                {{ $q['no'] }}
                                            </span>
                                            <p class="mb-0 fst-italic fs-6 lh-base">{{ $q['quiz'] }}</p>
                                        </div>

                                        {{-- Pilihan Jawaban --}}
                                        @foreach (['a','b','c','d','e'] as $opt)
                                        <div class="mb-2">
                                            <input type="radio"
                                                id="option_{{ $q['no'] }}{{ $opt }}"
                                                wire:model="answer{{ $q['no'] }}"
                                                value="{{ $opt }}"
                                                wire:change="updateDatabase({{ $q['id'] }},{{ $q['no'] }})"
                                                class="d-none quiz-radio">

                                            <label for="option_{{ $q['no'] }}{{ $opt }}"
                                                class="quiz-option d-flex align-items-center gap-2 px-3 py-2 rounded border w-100"
                                                style="cursor:pointer;transition:background .15s,border-color .15s;">
                                                <span class="fw-medium text-muted" style="min-width:20px;">{{ $opt }}.</span>
                                                <span>{{ $q[$opt] }}</span>
                                            </label>
                                        </div>
                                        @endforeach


                                    </div>
                                @endforeach
                            @endif                            
                            <div class="card-body text-right">
                                <button id="finish" type="button" class="btn btn-primary text-right" wire:click="meSelesai({{$test_id}})" style="display: none;">SELESAI</button>
                                <button id="finish_" type="button" class="btn btn-primary text-right" onclick="confirm('Apakah anda ingin mengakhiri test tahap ? ')||event.stopImmediatePropagation()" wire:click="meSelesai({{$test_id}})" >SELESAI</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   
    @else 

            {{-- <div>
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-12">
                            
                            <div class="card">
                                <div class="card-title px-4 pt-4 text-center">
                                    <h5>PETUNJUK DAN CONTOH SOAL {{$NormaMind['nama']??'INTELLIGENCE STRUCTURE TEST ME - 09'}}</h5>
                                </div>
                                <div class="card-body">
                                   <p>{!! nl2br($NormaMind['petunjuk_kesatu'] ?? '') !!}</p>                                 
                                </div>                                
                                <div class="card-body text-center">     
                                    @if($NormaMind['file_petunjuk'])                               
                                     <img src="{{ url('storage/photos/'.$NormaMind['file_petunjuk'])}}" alt="no image" style="width: 100%;height: auto;">  
                                     @endif
                                </div>
                                <div class="card-body text-center">   
                                    <p class="h3">JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                                </div>
                                <div class="card-body text-right text-center">
                                    <button type="button" class="btn btn-primary btn-lg" wire:click="meMulai({{$test_id}})">
                                        NEXT
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}



    @endif
</div>


