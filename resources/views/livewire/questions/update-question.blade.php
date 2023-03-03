<div class="">
    <div class="">
        <h5 class="" id="updateModalLabel">Edit Soal</h5>     
    </div>

    <form method="post" action="{{ route('admin.questions.update', $question->id) }}" enctype="multipart/form-data">

        @method('put')
        @csrf 

        <input type="hidden" name="id" value="{{ $question->id }}">

        <div class="row">
            <div class="col-md-8">

                <div class="form-group" wire:ignore >
                    <label for="soal">Soal No <strong>{{ $question->no }}</strong> </label>      
                
                    <textarea class="form-control" id="ckeditor" name="soal" placeholder="Soal">{{ $question->soal }}</textarea>
                    @error('soal') <span class="text-danger">{{ $message }}</span> @enderror
    
                </div>
    
                {{-- $value = 1, $message = null,$text_soal,$question_id, $gambar --}}
    
                <x-input-pilih-jawaban pilihan="a" value="{{ $question->val_a }}" textSoal="{{ $question->a }}" 
                        questionId="{{ $question->id }}" gambar="{{ $gambar_a_edit }}"/>
                
                <x-input-pilih-jawaban pilihan="b" value="{{ $question->val_b }}" textSoal="{{ $question->b }}" 
                        questionId="{{ $question->id }}" gambar="{{ $gambar_b_edit }}"/>
    
                <x-input-pilih-jawaban pilihan="c" value="{{ $question->val_c }}" textSoal="{{ $question->c }}" 
                        questionId="{{ $question->id }}" gambar="{{ $gambar_c_edit }}"/>
    
                <x-input-pilih-jawaban pilihan="d" value="{{ $question->val_d }}" textSoal="{{ $question->d }}" 
                            questionId="{{ $question->id }}" gambar="{{ $gambar_d_edit }}"/>
    
                <x-input-pilih-jawaban pilihan="e" value="{{ $question->val_e }}" textSoal="{{ $question->e }}" 
                                questionId="{{ $question->id }}" gambar="{{ $gambar_e_edit }}"/>

            </div>

            <div class="col-md-4 position-relative">

                <div class="card p-2 position-fixed fixed">

                        {{-- gambar utama --}}
                    <div class="form-group">
                        <label for="gambar">Gambar Utama</label>
                        <div class="row mt-2">
                            <div class="col">
                                <img src="{{ asset('storage/' . $question->gambar) }}" alt="" srcset="" class="img-fluid m-2 border" width="300px">
        
                                <div class="d-flex mt-2">
                                    <label for="">Ganti:</label>
                                    <input name="gambar_edit" type="file" class="" id="gambar" placeholder="Gambar">
                                
                                </div>
        
                                @error('gambar') <span class="text-danger">{{ $message }}</span> @enderror 
        
                            </div>
                        </div>    
                    </div>
                    {{-- akhir gambar --}}

                    <div class="form-group">
                        <label for="kc_jawaban">Kunci Jawaban</label>
                        <input name="kc_jawaban" type="text" class="form-control" id="kc_jawaban" placeholder="Kc Jawaban">@error('kc_jawaban') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
        
                    <div class="form-group d-none">
                        <label for="status"></label>
                        <select name="status" class="form-control" id="status" placeholder="Status" required>
                            <option value="">Pilih Status</option>
                            <option value="Aktif" {{ ($question->status == 'Aktif')? "selected":"" }}>Aktif</option>
                            <option value="Tidak Aktif" {{ ($question->status == 'Tidak Aktif')? "selected":"" }}>Tidak Aktif</option>    
                        </select>
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="">
                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" data-dismiss="modal">Update</button>
                    </div>

                </div>
                {{-- akhir card --}}
                

            </div>
        </div>
        {{-- akhir row --}}

    </form>
</div>
