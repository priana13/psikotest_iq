@section('title', __('Scores'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Score Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Scores">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Scores
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.scores.create')
						@include('livewire.scores.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>User Id</th>
								<th>Exam Id</th>
								<th>Benar</th>
								<th>Salah</th>
								<th>Kosong</th>
								<th>Score</th>
								<th>Keterangan</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($scores as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->user_id }}</td>
								<td>{{ $row->exam_id }}</td>
								<td>{{ $row->benar }}</td>
								<td>{{ $row->salah }}</td>
								<td>{{ $row->kosong }}</td>
								<td>{{ $row->score }}</td>
								<td>{{ $row->keterangan }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Score id {{$row->id}}? \nDeleted Scores cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $scores->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
