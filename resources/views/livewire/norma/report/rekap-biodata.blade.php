@extends('layouts.admin')
@section('main-content')
<div class="row justify-content-center">
    <div class="col-md-12">   

        <h1>Rekap Biodata</h1>           
        
        <div>
  
            <div class="row justify-content-center">        
                <div class="col-md-12">
                    <div class="card shadow">
                    
                        <div class="card-body row">                      
                                                    
                            <div class="pt-3 col-md-12"> 
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead class="thead">
                                            <tr>
                                                <td>ID</td>                                              
                                                <th>Nama</th>
                                                <th>Nomor</th>
                                                <th>Pangkat</th>
                                                <th>Tgl Lahir</th>
                                                <th>Umur</th>
                                                <th>Instansi</th>
                                                <th>Angkatan</th>
                                                <th>IQ</th>                                                                                           
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($user_norma as $row)

                                            <tr>
                                                <td>{{ $row->user_id }}</td>                                              
                                                <td>{{ ($row->nama) ? $row->nama : $row->user->name }}</td>
                                                <td>{{ $row->nomor_test }}</td>
                                                <td>{{ $row->pangkat }}</td>
                                                <td>{{ $row->tgl_lahir }}</td>
                                                <td>{{ $row->usia }}</td>
                                                <td>{{ $row->instansi }}</td>
                                                <td>{{ $row->angkatan }}</td>
                                                <td>{{ $row->user?->iq }}</td>                                                                                           
                                            </tr>
                                        @endforeach
                                                                              
                                        </tbody>
                                    </table>
                                   {{ $user_norma->links() }}
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>


     
    </div>
</div>
@endsection
