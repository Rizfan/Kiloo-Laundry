@extends('layouts/main')

@section('title','Edit Outlet')

@section('content')

<div class="row">
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-info">Edit Outlet</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/edit_outlet/update">
				@csrf
				<div class="card-body">
					<input type="hidden" name="id" value="{{$outlet->id_outlet}}">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Nama Outlet</label>
						<input type="text" name="nama" value="{{$outlet->nama_outlet}}" class="form-control col col-md-7" placeholder="Nama Outlet">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">No. Telp Outlet</label>
						<input type="text" name="tlp" value="{{$outlet->tlp_outlet}}" class="form-control col col-md-7" placeholder="No. Telp Outlet">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Alamat Outlet</label>
						<textarea name="alamat" class="form-control col col-md-7" placeholder="Alamat Outlet">{{$outlet->alamat_outlet}}</textarea>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Simpan</button>
					<a href="/admin/list_outlet"  class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
