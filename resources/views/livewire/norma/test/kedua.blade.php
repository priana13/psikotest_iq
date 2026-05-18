<div> 
    @if(($waktu_mulai !==null))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-md-6 mb-4">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body text-center">
                                <div class="row no-gutters align-items-center">
                                    <p class="mt-2 text-center">{{$NormaWa['petunjuk_kedua']??''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  
                                <h1 class="text-white-100 text-center" id="countdown"></h1>

                            </div>
                        </div>
                        <!-- <div id="customToastr" class="custom-toastr">
                            <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1>  
                        </div> -->
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-title px-4 pt-4 text-center">
                                <h5>{{$nama_test}}</h5>
                            </div>
                            @if($QuizWa)
                                @foreach($QuizWa as $QW => $q)
                                    <div class="card-body">                                               
                                        <div class="form-group row">
                                            <label class="col-md-1 text-center"><h5>{{$q['no']}}</h5></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}a" wire:model="answer{{$q['no']}}" value="a" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_<?=$q['no'] ?>a">a. {{$q['a']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}b" wire:model="answer{{$q['no']}}" value="b" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_<?=$q['no'] ?>b">b. {{$q['b']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}c" wire:model="answer{{$q['no']}}" value="c" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_<?=$q['no'] ?>c">c. {{$q['c']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}d" wire:model="answer{{$q['no']}}" value="d" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_<?=$q['no'] ?>d">d. {{$q['d']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}e" wire:model="answer{{$q['no']}}" value="e" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_<?=$q['no'] ?>e">e. {{$q['e']}}</label>
                                            </div>
                                        </div>                                        
                                    </div>
                                @endforeach

                            @endif

                                <div class="card-body text-right">
                                    <button id="finish" type="button" class="btn btn-primary text-right" wire:click="waSelesai({{$test_id}})" style="display: none;">
                                        NEXT
                                    </button>
                                    <button id="finish_" type="button" class="btn btn-primary text-right" onclick="confirm('Apakah anda ingin berpindah ke test tahap selanjutnya ? ')||event.stopImmediatePropagation()" wire:click="waSelesai({{$test_id}})" >
                                        NEXT
                                    </button>
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
                                    <h5>PETUNJUK DAN CONTOH SOAL {{$NormaWa['nama']??'INTELLIGENCE STRUCTURE TEST WA - 02'}}</h5>
                                </div>
                               <div class="card-body">
                                   <p>{!! nl2br($NormaWa['petunjuk_kesatu'] ?? '') !!}</p>                                 
                                </div>                                
                                <div class="card-body text-center">     
                                    @if($NormaWa['file_petunjuk'])                               
                                     <img src="{{ url('storage/photos/'.$NormaWa['file_petunjuk'])}}" alt="no image" style="width: 100%;height: auto;"> 
                                     @endif
                                </div>
                                <div class="card-body text-center">   
                                    <p class="h3">JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                                </div>
                                <div class="card-body text-right text-center">
                                    <button type="button" class="btn btn-primary btn-lg" wire:click="waMulai({{$test_id}})">
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


