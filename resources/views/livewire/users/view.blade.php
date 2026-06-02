@section('title', __('Users'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-fw fa-users"></i>
							{{ $level_filter ?? "User" }} {{ number_format($total) }}</h4>
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
								<th>Email</th>
								{{-- <th>HP</th>
								<th>Kota</th>
								<th>Alamat</th>								 --}}
								<th>Level</th>
								<th>Mendaftar</th>
								<th>Status</th>
								<th>Login</th>
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
								<td>{{$row->email }}</td>
								{{-- <td>{{ $row->hp }}</td>
								<td>{{ $row->kota }}</td>
								<td>{{ $row->alamat }}</td> --}}
								<td>{{ $row->level }}</td>
								<td>{{ $row->created_at->diffForHumans() }}</td>
								<td>
								   <span class="badge badge-{{ $row->status == "Aktif" ? "success" : "danger"}}">
										{{ $row->status }} 								   
								   </span>
								</td>
								<td>
								   <span class="badge badge-{{ $row->sessions_count > 0  ? "success" : "danger"}}">
										{{ ($row->sessions_count > 0 ? 'Online' : 'Offline') }}
								   </span>
								</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Aksi
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="javascript:void(0);" data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
										
										@if($row->id !== auth()->user()->id)
										<a href="javascript:void(0);" class="dropdown-item" onclick="confirm('Confirm Delete User id {{$row->id}}? \nDeleted Users cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
										
										<a href="#" class="dropdown-item" onclick="confirm('Update Status User {{$row->name}}?')||event.stopImmediatePropagation()" wire:click="updateStatus({{$row->id}})"><i class="fa fa-power-off" ></i> {{ ($row->status == 'Aktif') ? 'Nonaktifkan' : 'Aktifkan'}} </a> 
										@endif  

										{{-- hapus session user jika sedang login --}}
										@if($row->sessions_count > 0 && $row->id !== auth()->user()->id)
											<a href="javascript:void(0);" class="dropdown-item" onclick="confirm('Hapus semua session user {{$row->name}}?')||event.stopImmediatePropagation()" wire:click="destroySession({{$row->id}})"><i class="fa fa-trash"></i> Hapus Session Login </a>
										@endif
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
