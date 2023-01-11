@section('title', __('Examevents'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4 class="mb-3"><i class="fas fa-history"></i>
							History Psikotes </h4>


							<ul class="nav nav-pills">
								<li class="nav-item">
								  <a class="nav-link {{ ($selected == 'cermat')?'active':'' }}" href="#" wire:click.prevent="pilihHiostory('cermat')">Sikap Kerja ({{ $count_history['cermat'] }})</a>
								</li>
								<li class="nav-item">
								  <a class="nav-link {{ ($selected == 'cerdas')?'active':'' }}" href="#" wire:click.prevent="pilihHiostory('cerdas')">Kecerdasan({{ $count_history['kecerdasan'] }})</a>
								</li>								
								<li class="nav-item">
								  <a class="nav-link {{ ($selected == 'kepribadian')?'active':'' }}" wire:click.prevent="pilihHiostory('kepribadian')" href="#">Kepribadian({{ $count_history['kepribadian'] }})</a>
								</li>
							  </ul>

						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						{{-- <div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Examevents">
						</div> --}}
						
						{{-- <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Examevents
						</div> --}}
						

					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.examevents.create')
						@include('livewire.examevents.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 								
								<th>Name</th>	
								@if($selected != 'cermat')
									<th>Salah</th>								
									<th>Benar</th>
									<th>Score</th>
								@endif
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($examevents as $row)

							<?php 

							if($row->nilai >= 80){
								$tanda = 'success';
							}elseif($row->nilai < 80 && $row->nilai > 70){
								$tanda = 'info';
							}elseif($row->nilai <= 70 && $row->nilai > 50){ 
								$tanda = 'warning';
							}else{
								$tanda = 'danger';
							}


							?>
							<tr>								
								<td>
									<strong>{{ $row->name }}</strong><br>
									{{ $row->created_at->diffForHumans() }}
								</td>	
								@if($selected != 'cermat')							
									<td>{{ $row->salah }}</td>								
									<td>{{ $row->benar }}</td>
									<td>
										<span class="badge badge-pill badge-{{ $tanda }}">{{ $row->nilai }}</span>
										
									</td>
								@endif
								<td>
									{{ $row->status }}
								</td>
								<td width="250px" class="text-center" >									

									<nav class="navbar navbar-light bg-light">
									<form class="form-inline">
										@if($selected == 'cermat')
										<a class="btn btn-sm btn-success mx-2" href="{{ route('member.hasil_ujian', $row->id) }}" target="_blank">LIHAT HASIL</a>
										@else 
										<a class="btn btn-sm btn-success mx-2" href="{{ route('member.hasil_ujian_umum', $row->id) }}" target="_blank">LIHAT HASIL</a>
										@endif

										<a class="btn btn-sm btn-danger" onclick="confirm('Confirm Delete Examevent id {{$row->id}}? \nDeleted Examevents cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})">HAPUS</a>
									</form>
									</nav>					

							
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $examevents->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
