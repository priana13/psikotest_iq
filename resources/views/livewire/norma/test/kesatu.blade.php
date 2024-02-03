<div>       
    @if(($waktu_mulai !==null))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-md-6 mb-4">
                        <div class="card border-left-primary shadow-sm h-100 py-2">
                            <div class="card-body text-center">
                                <a class="stretched-link text-primary font-weight-bold text-primary text-uppercase" href="#">PENUJUK WAKTU TEST</a>
                                <div class="row no-gutters align-items-center">
                                    <p class="mt-2 text-center">{{$NormaSe['petunjuk_kedua']??''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xl-3 col-md-4 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body ">
                                <h1 class="timer text-white-100 text-center" data-seconds-left = {{$waktu_test}}></h1> 
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
                            @if($QuizSe)
                                @foreach($QuizSe as $QS => $q)
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-1 text-center">
                                                <h5>{{$q['no']}}</h5>
                                            </label>
                                            <h5><em>{{$q['quiz']}}</em></h5>                                            
                                        </div>                                       
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="a" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_1">a. {{$q['a']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="b" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_1">b. {{$q['b']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="c" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_1">c. {{$q['c']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="d" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_1">d. {{$q['d']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option1_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="e" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option1_1">e. {{$q['e']}}</label>
                                            </div>
                                        </div>                                        
                                    </div>
                                @endforeach
                            @endif    


                            <div class="card-body">
                                 <button id="finish" type="button" class="btn btn-primary pull-right" wire:click="seSelesai({{$test_id}})" >NEXT</button>
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
                                    <h5>PETUNJUK DAN CONTOH SOAL {{$NormaSe['nama']??'INTELLIGENCE STRUCTURE TEST SE - 01'}}</h5>
                                </div>
                                <div class="card-body">
                                   <p>{!! nl2br($NormaSe['petunjuk_kesatu'] ?? '') !!}</p>                                 
                                </div>                                
                                <div class="card-body text-center">     
                                    @if($NormaSe['file_petunjuk'])                               
                                     <img src="{{ url('storage/photos/'.$NormaSe['file_petunjuk'])}}" alt="no image" > 
                                     @endif
                                </div>
                                <div class="card-body">   
                                    <p>JIKA ANDA SUDAH SIAP SILAHKAN KLIK TOMBOL</p>                                    
                                </div>
                                <div class="card-body text-right"> 
                                    <button type="button" class="btn btn-primary text-right" wire:click="seMulai({{$test_id}})">
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


