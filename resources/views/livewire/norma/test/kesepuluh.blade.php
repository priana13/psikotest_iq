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
                                        <div class="form-group row">
                                            <label class="col-1 text-center">
                                                <h5>{{$q['no']}}</h5>
                                            </label>
                                            <h5><em>{{$q['quiz']}}</em></h5>                                            
                                        </div>                                       
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option_a_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="a" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option_a_{{$q['no']}}">a. {{$q['a']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option_b_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="b" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option_b_{{$q['no']}}">b. {{$q['b']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option_c_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="c" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option_c_{{$q['no']}}">c. {{$q['c']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option_d_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="d" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option_d_{{$q['no']}}">d. {{$q['d']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-1"></label>
                                            <div class="icheck-primary icheck-inline">
                                                <input type="radio" id="option_e_{{$q['no']}}" wire:model="answer{{$q['no']}}" value="e" wire:change="updateDatabase({{$q['id']}},{{$q['no']}})" />
                                                <label for="option_e_{{$q['no']}}">e. {{$q['e']}}</label>
                                            </div>
                                        </div>                                        
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
   
    @endif
</div>


