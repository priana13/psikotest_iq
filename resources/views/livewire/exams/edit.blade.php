@extends('layouts.admin')

@section('main-content')

<div class="row justify-content-center">
    <div class="col-md-12">


        <form action="{{ route('admin.exams.update', $exam->id) }}" method="post">

            @csrf
            @method('put')

            <div class="card">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Psikotess</h5>
                    
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="selected_id">
                <div class="form-group">
                    <label for="nama_tes">Judul</label>
                    <input name="nama_tes" type="text" class="form-control" value="{{ $exam->nama_tes }}" id="nama_tes" placeholder="Nama Tes">@error('nama_tes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="row">


                    <div class="form-group col-md-6">
                        <Label>Categori Tes</Label>
                        <select name="examcategory_id" id="" class="form-control">
                            <option value="">Pilih</option>
                            @foreach($kategori as $row)
                                <option value="{{ $row->id }}" 
                                    {{ ($exam->examcategory_id == $row->id)?'selected':'' }}
                                    >{{ $row->name }}</option>
                            @endforeach
                        </select>
    
                        @error('examcategory_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                    <div class="form-group col-3">
                        <Label>Skala Penilaian</Label>
                        <select name="skala_penilaian" id="" class="form-control">
                             <option value="Normal" {{ ($exam->skala_penilaian == 'Normal')?'selected':'' }}>Normal</option>
                            <option value="Likert" {{ ($exam->skala_penilaian == 'Likert')?'selected':'' }}>Likert</option>
                        </select>
    
                        @error('skala_penilaian') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    

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

                <div class="row px-3">

                    <div class="form-group col-3">
                        <Label>Status</Label>
                        <select name="status" id="" class="form-control">
                            <option value="Draft" {{ ($exam->status == 'Draft')?'selected':'' }}>Draft</option>
                            <option value="Aktif" {{ ($exam->status == 'Aktif')?'selected':'' }}>Aktif</option>
                            <option value="Off" {{ ($exam->status == 'Off')?'selected':'' }}>Off</option>
                        </select>
    
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

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