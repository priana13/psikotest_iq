@section('title', __('Exams'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							List Psikotes </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search...">
						</div>

						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownTambah" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-plus"></i>
								Tambah Tes
							</button>
							<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownTambah" style="">

								<a href="#" class="dropdown-item" data-toggle="modal" data-target="#createDataModal">
									Tes Kecerdasan
								</a>
								<a class="dropdown-item" href="{{ route('admin.tes-kecermatan') }}">
									Tes Kecermatan
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
								<th>Waktu</th>
								<th>Nilai Min</th>								
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($exams as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nama_tes }}</td>
								<td>{{ $row->type }}</td>
								<td>{{ $row->waktu }}</td>
								<td>{{ $row->nilai_min }}</td>								
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Exam id {{$row->id}}? \nDeleted Exams cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
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
