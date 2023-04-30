@extends('layouts/kasir')

@section('title','Edit Paket')

@section('content')

<div class="row">
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-info">Edit Paket</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/edit_paket/update">
				@csrf
				<div class="card-body">
					<input type="hidden" name="id" value="{{$paket->id_paket}}">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Jenis Paket</label>
						<select class="form-control col col-md-7" name="jenis">
							<option selected="" disabled="">Pilih Jenis Paket</option>
							<option value="Kiloan" <?php if($paket->jenis_paket=="Kiloan") { echo 'selected'; } ?>>Kiloan</option>
							<option value="Selimut" <?php if($paket->jenis_paket=="Selimut") { echo 'selected'; } ?>>Selimut</option>
							<option value="Bed Cover" <?php if($paket->jenis_paket=="Bed Cover") { echo 'selected'; } ?>>Bed Cover</option>
							<option value="Kaos" <?php if($paket->jenis_paket=="Kaos") { echo 'selected'; } ?>>Kaos</option>
							<option value="Lain" <?php if($paket->jenis_paket=="Lain") { echo 'selected'; } ?>>Lain</option>
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Nama Paket</label>
						<input type="text" name="nama" value="{{$paket->nama_paket}}" class="form-control col col-md-7" placeholder="Nama Paket">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Harga Paket</label>
						<input type="number" name="harga" value="{{$paket->harga_paket}}" class="form-control col col-md-7" placeholder="Harga Paket">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Simpan</button>
					<a href="/kasir/list_paket"  class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
