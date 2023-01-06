@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">


        <form action="{{ route('admin.exams.update', $exam->id) }}" method="post">

            @csrf
            @method('put')

            <div class="card">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Psikotes</h5>
                    
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="selected_id">
                <div class="form-group">
                    <label for="nama_tes">Judul</label>
                    <input name="nama_tes" type="text" class="form-control" value="{{ $exam->nama_tes }}" id="nama_tes" placeholder="Nama Tes">@error('nama_tes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                @if($exam->type == 'cermat')
    
                    <div class="row">
    
                        <div class="form-group col-md-6">
                            <label for="waktu">Jumlah Kolom</label>
                            <input name="col_qty" type="number" class="form-control" id="col_qty" value="{{ $exam->col_qty }}"placeholder="col_qty">@error('col_qty') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
    
                        <div class="form-group col-md-6">
                            <label for="waktu">Waktu</label>
                            <input name="waktu" type="number" class="form-control" value="{{ $exam->waktu }}" id="waktu" placeholder="Waktu">@error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
    
                    </div>
                @else
    
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input name="waktu" type="number" class="form-control" value="{{ $exam->waktu }}" id="number" placeholder="Waktu">@error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                @endif
    
    
                <div class="form-group">
                    <label for="nilai_min">Nilai Minimal</label>
                    <input name="nilai_min" type="number" class="form-control" id="nilai_min" value="{{ $exam->nilai_min }}" placeholder="Nilai Min">@error('nilai_min') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="peraturan">Peraturan</label>
                    <textarea name="peraturan" id="ckeditor" cols="30" rows="10"
                    class="form-control"
                    >{{ $exam->peraturan }}</textarea>
                    @error('peraturan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                    </form>
                </div>
                <div class="card-footer">
                    <a type="button" class="btn btn-secondary" href="{{ route('admin.exams') }}">Batal</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
           </div>


        </form>
       



    </div>     
</div>   

@endsection