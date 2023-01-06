@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">


        <form action="{{ route('admin.exams.store') }}" method="post">

            @csrf         
            <input type="hidden" name="type" value="{{ $type }}">

            <div class="card">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Buat Psikotes Baru</h5>
                    
                </div>
                <div class="modal-body">                   
                
                <div class="form-group">
                    <label for="nama_tes">Judul</label>
                    <input name="nama_tes" type="text" class="form-control" value="{{ old('nama_tes') }}" id="nama_tes" placeholder="Nama Tes">@error('nama_tes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              
    
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input name="waktu" type="number" class="form-control" value="{{ old('waktu') }}" id="number" placeholder="Waktu">@error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
    
                <div class="form-group">
                    <label for="nilai_min">Nilai Minimal</label>
                    <input name="nilai_min" type="number" class="form-control" id="nilai_min" value="{{ old('nilai_min') }}" placeholder="Nilai Min">@error('nilai_min') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="peraturan">Peraturan</label>
                    <textarea name="peraturan" id="ckeditor" cols="30" rows="10"
                    class="form-control"
                    >{{ old('peraturan') }}</textarea>
                    @error('peraturan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                   
                </div>
                <div class="card-footer">
                    <a type="button" class="btn btn-secondary" href="{{ route('admin.exams') }}">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
           </div>


        </form>
       



    </div>     
</div>   

@endsection