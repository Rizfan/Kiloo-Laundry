@extends('layouts/main')

@section('title','Tambah Paket')

@section('content')

<div class="row">
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-info">Tambah Paket</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/tambah_paket/upload">
				@csrf
				<div class="card-body">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Outlet</label>
						<select class="form-control col col-md-7" name="outlet">
							<option selected="" disabled="">Pilih Outlet</option>
							@foreach($outlet as $data)
							<option value="{{$data->id_outlet}}">{{$data->id_outlet}} - {{$data->nama_outlet}}</option>
							@endforeach
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Jenis Paket</label>
						<select class="form-control col col-md-7" name="jenis">
							<option selected="" disabled="">Pilih Jenis Paket</option>
							<option value="Kiloan">Kiloan</option>
							<option value="Selimut">Selimut</option>
							<option value="Bed Cover">Bed Cover</option>
							<option value="Kaos">Kaos</option>
							<option value="Lain">Lain</option>
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Nama Paket</label>
						<input type="text" name="nama" class="form-control col col-md-7" placeholder="Nama Paket">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Harga Paket</label>
						<input type="number" name="harga" class="form-control col col-md-7" placeholder="Harga Paket">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Tambah</button>
					<a href="/admin/list_paket"  class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
