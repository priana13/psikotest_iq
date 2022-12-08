@extends('layouts.admin_full')

@section('main-content')

<div class="row mb-3 d-flex justify-content-center">
    <h2> <strong>Konfirmasi Pembayaran</strong> </h2>
</div>

<div class="row">

    <div class="col-md-7 m-auto">

        <div class="card shadow pb-4">          
         
            <div class="card-body">
             
                <div class="row">

                    <form action="{{ route('store_konfirmasi') }}" method="post" enctype="multipart/form-data">
                    
                    @csrf

                    <input name="id_transaksi" type="hidden" value="{{ $transaksi->id }}">

                    <div class="col py-2 px-5 mb-5">                     


                       <div class="form-group">
                        <label for=""> <strong>Order ID</strong>   </label>
                        <input type="text" class="form-control form-control-lg" name="id" value="#{{ $transaksi->id }}">
                       </div> 
                                      
                        <div class="form-group">
                         <label for=""><strong>Atas Nama Rekening</strong> </label>
                         <input type="text" class="form-control form-control-lg" name="atas_nama" value="{{ old('atas_nama') }}">

                         @error('atas_nama')
                            <div class="text-danger">{{ $message }}</div>
                         @enderror
                        
                        </div>
                                         
                        <div class="form-group">
                         <label for=""><strong>Transfer ke</strong> </label>
                         <input type="text" class="form-control form-control-lg" name="rek_tujuan" value="{{ old('rek_tujuan') }}">

                         @error('rek_tujuan')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                        </div>
                                   
                        <div class="form-group">
                         <label for=""><strong>Tanggal Transfer</strong> </label>
                         <input type="date" class="form-control form-control-lg" name="tanggal_tf" value="{{ date('Y-m-d') }}" value="{{ old('tanggal_tf') }}">
                         @error('tanggal_tf')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                        
                        </div>
                                      
                        <div class="form-group">
                         <label for=""><strong>Jumlah Transfer</strong> </label>
                         <input type="text" class="form-control form-control-lg" name="jumlah" value="{{ old('jumlah') }}">
                         @error('jumlah')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                        </div>
                                    
                        <div class="form-group">
                         <label for=""><strong>Bukti Transfer</strong> </label>
                         <input type="file" class="form-control form-control-lg" name="bukti_transfer">
                         @error('bukti_transfer')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg">Kirim</button>

                    </div>

                    <!-- /.Akhir col-->  

                </form>
                </div>
                 <!-- /.card-row -->  
                

            </div>
            <!-- /.card-body -->           
          
        </div>

          
    </div>
</div>



@endsection