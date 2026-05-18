<div>
  
    <div class="row justify-content-center">        
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary text-center"><strong>LIST JAWABAN BENAR (RW) </strong></h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-10">
                        <!-- Adjusted column size -->
                        <!-- Your existing content here -->
                    </div>
                    
                    @if(isset($rekap))
                    <div class="pt-3 col-md-12"> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr>
                                        <td>ID</td>
                                        <th>Email User</th>
                                        <th>SE</th>
                                        <th>WA</th>
                                        <th>AN</th>
                                        <th>GE</th>
                                        <th>RA</th>
                                        <th>ZR</th>
                                        <th>FA</th>
                                        <th>WU</th>
                                        <th>ME</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($rekap as $row)
                                 
                                    <tr>
                                        <td>{{ $row->user_id }}</td> 
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->se }}</td>
                                        <td>{{ $row->wa }}</td>
                                        <td>{{ $row->an }}</td>
                                        <td>{{ $row->ge }}</td>
                                        <td>{{ $row->ra }}</td>
                                        <td>{{ $row->zr }}</td>
                                        <td>{{ $row->fa }}</td>
                                        <td>{{ $row->wu }}</td>
                                        <td>{{ $row->me }}</td>                                       
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <a class="dropdown-item"  href="{{route('norma.report.detail' , $row->user_id)}}" target="_blank"><i class="fa fa-eye"></i> Download </a>
                                                    
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#rekapModal" wire:click="showRekap({{$row->user_id}})"><i class="fa fa-eye"></i> Lihat </a>

                                                    <a class="dropdown-item" href="#" onclick="confirm('Confirm Delete Norma Test User  {{$row->email}}? \nDeleted Exams cannot be recovered!')||event.stopImmediatePropagation()" wire:click="deleteRekap({{$row->user_id}})"><i class="fa fa-trash"></i> Delete </a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        @endforeach                                        
                                </tbody>
                            </table>
                            {{$rekap->links()}} 
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<div id="geKoreksiModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        @livewire('norma.report.ge-koreksi') 
    </div>
</div>

<div id="rekapModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        @livewire('norma.report.rekap-show') 
    </div>
</div>

