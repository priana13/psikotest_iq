<div class="row justify-content-center">
    <div class="col-md-12">  
        
    <div>
    
        <div class="row justify-content-center">        
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary text-center"><strong>LIST JAWABAN BENAR (RW) </strong></h5>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-3 mb-3">
                            <label for="rekap-search">Cari nama peserta</label>
                            <input id="rekap-search" type="search" class="form-control form-control-sm" placeholder="Nama peserta" wire:model.debounce.300ms="search">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="rekap-start-date">Tanggal mulai</label>
                            <input id="rekap-start-date" type="date" class="form-control form-control-sm" wire:model="startDate">
                            @error('startDate') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="rekap-end-date">Tanggal akhir</label>
                            <input id="rekap-end-date" type="date" class="form-control form-control-sm" wire:model="endDate">
                            @error('endDate') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-5 mb-3 d-flex align-items-end justify-content-md-end">
                            <button type="button" class="btn btn-secondary btn-sm mr-2" wire:click="resetFilters">Reset filter</button>
                            <button type="button" class="btn btn-success btn-sm" wire:click="exportExcel" wire:loading.attr="disabled" wire:target="exportExcel">
                                <i class="fa fa-file-excel"></i> Export Excel
                            </button>
                        </div>
                        <div class="col-md-12">
                            <small class="d-block text-muted">Filter tanggal berdasarkan aktivitas tes terakhir. Export mencakup semua hasil sesuai filter.</small>
                        </div>
                        
                        @if(isset($rekap))
                        <div class="pt-3 col-md-12"> 
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead class="thead">
                                        <tr>
                                            <td>ID</td>
                                            <td>Tgl</td>
                                            <th>Peserta</th>
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
                                    
                                        @forelse($rekap as $row)

                                    
                                    
                                        <tr>
                                            <td>{{ $row->user_id }}</td> 
                                            <td>{{ date("d-m-Y" , strtotime($row->created_at))}}</td>
                                            <td>{{ $row->name }}</td>
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

                                                        <a class="dropdown-item" href="#" onclick="confirm('Confirm Delete Norma Test User  {{$row->name}}? \nDeleted Exams cannot be recovered!')||event.stopImmediatePropagation()" wire:click="deleteRekap({{$row->user_id}})"><i class="fa fa-trash"></i> Delete </a>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        @empty
                                        <tr><td colspan="13" class="text-center">Tidak ada data yang sesuai filter.</td></tr>
                                        @endforelse
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

    </div>
</div>