<div>     
   @if(($waktu_mulai !==null))
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-md-6 mb-4">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body text-center">
                            <div class="row no-gutters align-items-center">
                                <p class="mt-2 text-center">{{$NormaGe['petunjuk_kedua']??''}}</p>
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
                    </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-title px-4 pt-4 text-center">
                            <h5>{{$nama_test}}</h5>
                        </div>
                        @if($QuizGe)
                            @foreach($QuizGe as $QG => $q)
                                <div class="card-body">                                   
                                    
                                    <div class="form-group row">
                                        <label class="col-1 form-control text-center"><h5>{{$q['no']}}</h5></label>
                                        <label class="col-1"></label>
                                        <input type="text" class="col-8 form-control text-center " value="{{$q['quiz']}}" disabled>
                                    </div>      
                                    <div class="form-group row">
                                        <label class="col-1"></label>
                                        <label class="col-1"></label>
                                        <label class="col-8 text-center p-0"><h5>Jawaban :</h5></label>
                                    </div>                    
                                    <div class="form-group row">
                                        <label class="col-1"></label>
                                        <label class="col-1"></label>
                                        <input type="text" class="col-8 form-control text-center" wire:model="answer{{$q['no']}}" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />                                        
                                    </div>                                     
                                </div>
                            @endforeach
                        @endif            
                        <div class="card-body text-right">
                            <button id="finish" type="button" class="btn btn-primary text-right" wire:click="geSelesai({{$test_id}})" style="display: none;">NEXT</button>
                            <button id="finish_" type="button" class="btn btn-primary text-right" onclick="confirm('Apakah anda ingin berpindah ke test tahap selanjutnya ? ')||event.stopImmediatePropagation()" wire:click="geSelesai({{$test_id}})" >NEXT</button>
                        </div>           
                            
                    </div>
                </div>
            </div>
        </div>
    @else
        <div>
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                       
                        <div class="card">
                            <div class="card-title px-4 pt-4 text-center">
                                <h5>PETUNJUK DAN CONTOH SOAL {{$NormaGe['nama']??'INTELLIGENCE STRUCTURE TEST GE - 04'}}</h5>
                            </div>
                            <div class="card-body">
                                   <p>{!! nl2br($NormaGe['petunjuk_kesatu'] ?? '') !!}</p>                                 
                            </div>                                
                            <div class="card-body text-center">     
                                @if($NormaGe['file_petunjuk'])                               
                                 <img src="{{ url('storage/photos/'.$NormaGe['file_petunjuk'])}}" alt="no image" style="width: 100%;height: auto;">  
                                 @endif
                            </div>
                            <div class="card-body text-center">   
                                <p class="h3">JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                            </div>
                            <div class="card-body text-right text-center">
                                <button type="button" class="btn btn-primary btn-lg" wire:click="geMulai({{$test_id}})">
                                    NEXT
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>




