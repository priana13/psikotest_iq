<div class="row justify-content-center">
    <div class="col-md-12">
      


        @section('title', __('Exams'))
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="float-left">
                                    <h4><i class="fas fa-list"></i>
                                    Soal Try Out </h4>
                                </div>
                                
                                @if (session()->has('message'))
                                <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                                @endif

                                <div>
                                    {{-- <input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search..."> --}}
                                </div>


                            </div>		
                        

                            <div class="d-flex mt-3" style="display: flex; justify-content: space-between; align-items: center;">
                                
                                <ul class="nav nav-pills">
                                    {{-- <li class="nav-item">
                                    <a class="nav-link {{ ($selected == 'all')?'active':'' }}" href="#" wire:click.prevent="pilihSoal('all')">All({{ $qty }})</a>
                                    </li>
                                    @foreach ($examcategory as $row )
                                    <li class="nav-item">
                                        <a class="nav-link {{ ($selected == $row->id)?'active':'' }}" href="#" wire:click.prevent="pilihSoal({{ $row->id }})">{{ $row->name }}({{ $row->exams->count() }})</a>
                                    </li>
                                    @endforeach --}}

                                    {{-- <input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search..."> --}}


                                </ul>



                                <div class="dropdown d-none">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownTambah" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-plus"></i>
                                        Tambah Tes
                                    </button>
                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownTambah" style="">

                                        <a class="dropdown-item" href="{{ route('admin.exams.create') }}?type=cerdas">
                                            Kecerdasan
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.createCermat') }}">
                                            @lang('app.kecermatan')
                                        </a>	
                                        
                                        <a href="{{ route('admin.exams.create') }}?type=kepribadian" class="dropdown-item" >
                                            Kepribadian
                                        </a>


                                    </div>
                                </div>


                            
                            </div>	
                        </div>
                        
                        
                        <div class="card-body">
                                @include('livewire.exams.create')
                                @include('livewire.exams.update')
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr> 
                                        <td>No</td> 
                                        <th>Nama Tes</th>
                                        <th>Type</th>
                                        <th>Kategori</th>
                                        <th>Waktu</th>
                                        <th>Nilai Min</th>		
                                        <th>Soal</th>
                                        <th>Status</th>						
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exams as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> 
                                        <td>{{ $row->exam->nama_tes }}</td>
                                        <td>{{ ($row->exam->exam_category)?$row->exam->exam_category->type:'' }}</td>
                                        <td>{{ ($row->exam->exam_category)?$row->exam->exam_category->name:'' }}</td>
                                        <td>{{ $row->exam->waktu }}</td>								
                                        <td>{{ $row->exam->nilai_min }}</td>	
                                        <td>{{ $row->exam->questions->count() }}</td>		
                                        <td>
                                            <span class="badge badge-{{ ($row->exam->status == "Aktif")?"success":"secondary" }} px-2 py-1">{{ $row->exam->status }}</span>
                                            
                                        </td>					
                                        <td>									

                                        @if($row->exam->exam_category && $row->exam->exam_category->type == 'Column')

                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.tes-kecermatan' , $row->exam->id) }}">Soal</a>
                                        
                                        @else

                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.exam_soal' , $row->exam->id) }}">Soal</a>

                                        @endif

                                        <a class="btn btn-success btn-sm" href="{{ route('admin.exams.edit', $row->exam->id) }}"><i class="fa fa-edit"></i> Edit </a>

                                        <div class="btn-group d-none">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('admin.exams.edit', $row->exam->id) }}"><i class="fa fa-edit"></i> Edit </a>							 
                                            {{-- <a class="dropdown-item" onclick="confirm('Confirm Delete Exam id {{$row->exam->id}}? \nDeleted Exams cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->exam->id}})"><i class="fa fa-trash"></i> Delete </a>    --}}
                                            </div>
                                        </div>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>						
                            {{ $exams->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>



    </div>     
</div>   