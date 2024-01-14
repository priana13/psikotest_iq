@section('title', __('Memberships'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
							Membership </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Memberships">
						</div>

						@can('admin')

						<div class="btn btn-sm btn-success" data-toggle="modal" data-target="#createDataModal">
							<i class="fa fa-plus"></i>  Tambah Paket
							</div>

						@else
						<a class="btn btn-sm btn-success" href="{{ route('checkout') }}">
							<i class="fa fa-plus"></i> Beli Voucher
						</a>

						@endcan


					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.memberships.create')
						@include('livewire.memberships.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>No</td> 
								@can('admin')
								<th>User</th>
								@endcan

								<th>Paket</th>
								<th>Start</th>
								<th>End</th>
								<th>Status</th>
								@can('admin')
								<td>Aksi</td>
								@endcan
							</tr>
						</thead>
						<tbody>
							@foreach($memberships as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								@can('admin')
								<td>{{ $row->user->name }}</td>
								@endcan
								<td>{{ ($row->package)? $row->package->name : '' }}</td>
								<td>{{ date('d M Y', strtotime($row->start)) }}</td>
								<td>{{ date('d M Y', strtotime($row->end)) }}</td>
								<td>
									
									<span class="badge badge-{{ $warna_status[$row->status] }}">{{ $row->status }}</span>
									
								</td>
								
								@can('admin')
								<td width="90">		
								
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Aksi
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
									
									@if($row->status == 'expired')
									<a class="dropdown-item" onclick="confirm('Confirm Delete Membership id {{$row->id}}? \nDeleted Memberships cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									@endif

									</div>
								</div>	

								</td>
								@endcan
							@endforeach
						</tbody>
					</table>						
					{{ $memberships->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
