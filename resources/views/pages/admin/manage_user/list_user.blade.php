@extends('layouts/main')

@section('title','Manage User')

@section('content')

<div class="card shadow mb-4" width="100%">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold text-info">Manage User</h6>
		<a href="/admin/list_user/tambah_user" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah User</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Outlet</th>
						<th>Level</th>
						<th>Username</th>
						<th>Email</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					@foreach($user as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->name}}</td>
						@if($data->id_outlet == NULL)
						<td>-</td>
						@else
						<td>{{$data->nama_outlet}}</td>
						@endif
						<td>{{$data->role}}</td>
						<td>{{$data->username}}</td>
						<td>{{$data->email}}</td>
						<td>
							<a class="text-light" href="/admin/list_user/edit_user/{{ $data->id }}"><button class="btn btn-success"><i class="fa fa-pencil-alt"></i></button></a>
							<a class="text-light hapus" href="#" acc-id="{{ $data->id }}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection

@section('js')

<script type="text/javascript">

	$('.hapus').on('click',function(){
		var id = $(this).attr('acc-id')
		console.log(id)
		var url = '{{URL::to('admin/list_user/hapus_user')}}/' +id

		Swal.fire({
			title: 'Apakah Anda Yakin?',
			text: "Data yang telah dihapus tidak dapat dikembalikan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = url;
				
			}
		})
	});
</script>

@endsection