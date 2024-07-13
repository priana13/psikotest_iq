@section('title', __('Questions'))
<div class="container-fluid">

	@if($psikotes)

	<div class="row mb-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-center">
					
					<h4>Nama Psikotes: <strong>{{ $psikotes->nama_tes }}</strong> </h4>
					
				</div>

				<div class="card-body">

					<div class="row">
						<div class="col-md-4"><h5>Type : {{ $psikotes->type }}</h5></div>
						<div class="col-md-4"><h5>Waktu : {{ $psikotes->waktu }}</h5></div>
						<div class="col-md-4"> <h5>Jumlah Soal: {{ $psikotes->questions->count() }}</h5> </div>

					</div>					
					

				</div>
			</div>
		</div>
	</div>

	@endif


	{{-- List Soal --}}

	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
								{{-- <i class="fab fa-laravel text-info"></i> --}}
							List Soal </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						

						<div class="tombol">							

							<div class="btn btn-sm btn-primary" data-toggle="modal" data-target="#importDataModal">
								<i class="fa fa-upload"></i>  Import
							</div>

							<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal" wire:click="create">
							<i class="fa fa-plus"></i>  Tambah
							</div>

						</div>

					</div>
					
				</div>
				
				<div class="card-body">
						@include('livewire.questions.create')						
						@include('livewire.questions.import')

				<div class="row d-flex justify-content-between pr-3 pb-2">	
					
					<div></div>

					<div>
						<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Cari Nomor Soal">
					</div>

				</div>

				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>No</td> 								
								<th>Soal</th>								
								<th>A</th>
								<th>B</th>
								<th>C</th>
								<th>D</th>
								<th>E</th>	
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($questions as $row)
							<tr>
								<td>{{ $row->no }}</td> 								
								<td>{!! $row->soal !!}</td>								
								<td>{!! $row->a !!}</td>
								<td>{!! $row->b !!}</td>
								<td>{!! $row->c !!}</td>
								<td>{!! $row->d !!}</td>
								<td>{!! $row->e !!}</td>	
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{ route('admin.questions.edit', $row->id) }}"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Question id {{$row->id}}? \nDeleted Questions cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $questions->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
