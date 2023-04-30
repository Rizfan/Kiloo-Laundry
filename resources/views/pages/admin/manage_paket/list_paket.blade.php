@extends('layouts/main')

@section('title','Manage Paket')

@section('content')

<div class="card shadow mb-4" width="100%">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold text-info">Manage Paket</h6>

		<!-- <a href="#" class="d-none ml-auto d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#statusModal"><i class="fas fa-print fa-sm text-white-50"></i> PDF </a> &nbsp; -->
			

		<a href="/admin/list_paket/tambah_paket" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah Paket</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Outlet</th>
						<th>Jenis Paket</th>
						<th>Nama Paket</th>
						<th>Harga</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					@foreach($paket as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->nama_outlet}}</td>
						<td>{{$data->jenis_paket}}</td>
						<td>{{$data->nama_paket}}</td>
						<td>Rp. {{number_format($data->harga_paket)}},-</td>
						<td>
							<a class="text-light" href="/admin/list_paket/edit_paket/{{ $data->id_paket }}"><button class="btn btn-success"><i class="fa fa-pencil-alt"></i></button></a>
							<a class="text-light hapus" href="#" acc-id="{{$data->id_paket}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Export Data Paket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="/admin/list_paket/pdf">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col col-md-5">

							<label class="col-form-label">Pilih Outlet</label>
						</div>
						<div class="col col-md-7">
							<select class="form-control" name="outlet" >
								<option value="" selected="" disabled="">Semua</option>
								@foreach($outlet as $data1)
								<option value="{{$data1->id_outlet}}">{{$data1->nama_outlet}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Download</button>
				</div>
			</form>
		</div>
	</div>
</div>


@endsection


@section('js')

<script type="text/javascript">

	$('.hapus').on('click',function(){
		var id = $(this).attr('acc-id')
		console.log(id)
		var url = '{{URL::to('admin/list_paket/hapus_paket')}}/' +id

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