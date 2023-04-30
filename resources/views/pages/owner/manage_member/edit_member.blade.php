@extends('layouts/main')

@section('title','Edit Member')

@section('content')

<div class="row">
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-info">Edit Member</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/edit_member/update">
				@csrf
				<input type="hidden" name="id" value="{{$member->id_member}}">
				<div class="card-body">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Nama Member</label>
						<input type="text" name="nama" value="{{$member->nama_member}}" class="form-control col col-md-7" placeholder="Nama Member">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Jenis Kelamin</label>
						<select class="form-control col col-md-7" name="jenkel">
							<option selected="" disabled="">Jenis Kelamin</option>
							<option value="L" <?php if($member->jenis_kelamin=="L") : echo 'selected'; ?><?php endif; ?>>Laki-laki</option>
							<option value="P" <?php if($member->jenis_kelamin=="P") : echo 'selected'; ?><?php endif; ?>>Perempuan</option>
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">No. Telp Member</label>
						<input type="text" name="tlp" value="{{$member->tlp_member}}" class="form-control col col-md-7" placeholder="No. Telp Member">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Alamat Member</label>
						<textarea name="alamat" class="form-control col col-md-7" placeholder="Alamat Member">{{$member->alamat_member}}</textarea>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Simpan</button>
					<a href="/admin/list_member"  class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
