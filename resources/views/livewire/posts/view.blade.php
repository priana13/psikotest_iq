@section('title', __('Posts'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Pages </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Posts">
						</div>

						<div>

						<a class="btn btn-sm btn-primary" href="{{ route('admin.categories') }}">
							Kategori
						</a>

						<a class="btn btn-sm btn-info" href="{{ route('posts.create') }}">
						<i class="fa fa-plus"></i>  Tambah Page
						</a>


						</div>


					</div>
				</div>
				
				<div class="card-body">
						{{-- @include('livewire.posts.create') --}}
						{{-- @include('livewire.posts.update') --}}
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Title</th>									
								<th>Category</th>																				
								<th>Status</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>
								    <strong>{{ $row->title }} </strong>	<br>
									{{ $row->slug }}

								</td>
								
								<td>{{ $row->category->category }}</td>																					
								<td>{{ $row->status }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a  class="dropdown-item" href="{{ route('front.page', $row->slug) }}" target="_blank"><i class="fa fa-eye"></i> Lihat </a>										<a  class="dropdown-item" href="{{ route('posts.edit', $row->id) }}"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Post id {{$row->id}}? \nDeleted Posts cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $posts->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
