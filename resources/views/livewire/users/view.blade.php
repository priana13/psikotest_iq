@section('title', __('Users'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-fw fa-users"></i>
							User {{ number_format($total) }}</h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Users">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Tambah User
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.users.create')
						@include('livewire.users.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#ID</td> 
								<th>Nama</th>
								<th>Username</th>
								{{-- <th>HP</th>
								<th>Kota</th>
								<th>Alamat</th>								 --}}
								<th>Level</th>
								<th>Mendaftar</th>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $row)
							<tr>
								<td>{{ $row->id }}</td> 
								<td>{{ $row->name }}</td>
								<td>
								{{ $row->username }} <br>
								{{-- {{ $row->email }} --}}
								</td>
								{{-- <td>{{ $row->hp }}</td>
								<td>{{ $row->kota }}</td>
								<td>{{ $row->alamat }}</td> --}}
								<td>{{ $row->level }}</td>
								<td>{{ $row->created_at->diffForHumans() }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Aksi
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete User id {{$row->id}}? \nDeleted Users cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $users->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
