@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">        

        <div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card position-sticky">
                        <div class="card-header d-flex justify-content-between">                          
        
                            <div>
                                <h4>Soal Psikotes Kecermatan</h4>                           
                            </div>  
                            
                        </div>
                        <form action="{{ route('admin.storeCermat') }}" method="post">
                            @csrf
                        
                        <div class="card-body row">  
        
                            <div class="col">
        
                                <div class="form-group">
                                    <label for="nama-tes">Nama Tes</label>
                                    <input type="text" class="form-control" name="namatest" value="{{ old('namatest') }}">
                                    @error('namatest') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

        
                                <div class="form-group">
                                    <label for="peraturan">Intruksi Soal</label>
                                    <textarea name="peraturan" class="form-control" name="" id="peraturan" cols="30" rows="10">{{ old('peraturan') }}</textarea>
                                    @error('peraturan') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
            
        
                                <div class="row">
        
                                    <div class="form-group col-3">
                                        <label for="waktu">Waktu Per Kolom (Menit)</label>
                                        <input type="number" class="form-control" name="waktu" value="{{ old('waktu') }}">
                                        @error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
        
                                    <div class="form-group col-3">
                                        <label for="nilai_min">Nilai Min</label>
                                        <input type="number" class="form-control" name="nilai_min" value="{{ old('nilai_min') }}">
                                        @error('nilai_min') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
        
        
                                </div>
        
                                <button class="btn btn-primary" wire:click="berikutnya">Buat Psikotes</button>
        
        
                            </div>
        
        
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        
        </div>



    </div>     
</div>   

@endsection