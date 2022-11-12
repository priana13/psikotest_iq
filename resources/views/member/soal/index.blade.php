@extends('layouts.admin')

@section('main-content')

@section('title', __('Exams'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							List Soal Psikotes </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Exams">
						</div>
						<div class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i> Membership
						</div>
					</div>
				</div>
				
				<div class="card-body">
					
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nama Tes</th>
								<th>Waktu</th>
								<th>Nilai Min</th>
								<th>Status</th>
								<td class="text-center">ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($exams as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nama_tes }}</td>
								<td>{{ $row->waktu }}</td>
								<td>{{ $row->nilai_min }}</td>
								<td> Active </td>
								<td class="text-center">
								<div class="btn-group">
									<a href="{{route('member.ujian' , $row->id)}}" class="btn btn-info btn-sm" target = "_blank">
									 Test Sekarang
									</a> 
                                    
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


@endsection