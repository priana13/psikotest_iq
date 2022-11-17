<div class="row">

    <div class="col">

        <!-- timmer -->
        <div>
            <h3 class="text-center"> 
            <i class="fas fa-fw fa-clock"></i>
            50:13</h3>
        </div>


        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $exam->nama_tes }}</h6>
                <h6><strong>{{ $step }}</strong> dari {{ $total }}</h6>
            </div>
            <div class="card-body">
                
                <p> <strong>{{ $step }}. {{ $soal->soal }}</strong> </p>
              
                <fieldset class="form-group row">
                  
                    <div class="col-sm-10">

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-a" wire:model="jawaban" value="a" >
                            <label class="form-check-label" for="jawaban-a">
                            A. {{ $soal->a }}
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-b"  wire:model="jawaban" value="b">
                            <label class="form-check-label" for="jawaban-b">
                            B. {{ $soal->b }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-c"  wire:model="jawaban" value="c">
                            <label class="form-check-label" for="jawaban-c">
                            C. {{ $soal->c }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-d" wire:model="jawaban" value="d">
                            <label class="form-check-label" for="jawaban-d">
                            D. {{ $soal->d }}
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban-e"  wire:model="jawaban" value="e">
                            <label class="form-check-label" for="jawaban-e">
                            E. {{ $soal->e }}
                            </label>
                        </div>
                   
                    </div>
                </fieldset>

                <div class="mb-3">
                    <div class="arror">
                        @error('jawaban') <span class="text-danger">Belum ada Jawaban yang Terpilih</span> @enderror                     
                    </div>
                </div>
                
                <div class="d-flex justify-content-left">
                    <button class="btn btn-default btn-sm mr-3">
                        Sebelunya
                    </button>
                    <button class="btn btn-primary btn-sm" wire:click="berikutnya" type="submit">
                        Berikutnya
                    </button>

                </div>



            </div>
        </div>

    </div>


</div>