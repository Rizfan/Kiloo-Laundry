@extends('layouts/kasir')

@section('title','Manage Member')

@section('content')

<div class="card shadow mb-4" width="100%">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold text-info">Manage Member</h6>
		<a href="/kasir/list_member/tambah_member" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah Member</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Member</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Telp.</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					@foreach($member as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->nama_member}}</td>
						<td>{{$data->jenis_kelamin}}</td>
						<td>{{$data->alamat_member}}</td>
						<td>{{$data->tlp_member}}</td>
						<td>
							<a class="text-light" href="/kasir/list_member/edit_member/{{ $data->id_member }}"><button class="btn btn-success"><i class="fa fa-pencil-alt"></i></button></a>
							<a class="text-light" onclick="return confirm('Apakah Anda Yakin?')" href="/kasir/list_member/hapus_member/{{ $data->id_member }}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection