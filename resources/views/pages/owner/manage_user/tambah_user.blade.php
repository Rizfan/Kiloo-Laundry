@extends('layouts/main')

@section('title','Tambah User')

@section('content')

<div class="row">
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-info">Tambah User</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/tambah_user/upload">
				@csrf
				<div class="card-body">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Nama Lengkap</label>
						<input type="text" name="nama" id="nama" class="form-control col col-md-7" placeholder="Nama Lengkap" >
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Username</label>
						<input type="text" name="username" id="username" class="form-control col col-md-7" onkeyup="cek_nis()" placeholder="Username">
					</div>
					<div class=" form-group row " id="alert"  style="display: none;">
						<div class="alert alert-danger col col-md-11" >
							Username Sudah Terdaftar!
						</div>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Level</label>
						<select class="form-control col col-md-7" name="role" id="role" onchange="cek_role()">
							<option selected="" disabled="">Pilih Level</option>
							<option value="admin">Admin</option>
							<option value="kasir">Kasir</option>
							<option value="owner">Owner</option>
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Outlet</label>
						<select class="form-control col col-md-7" name="outlet" id="outlet">
							<option selected="" disabled="">Pilih Outlet</option>
							@foreach($outlet as $data)
							<option value="{{$data->id_outlet}}">{{$data->nama_outlet}}</option>
							@endforeach
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Email</label>
						<input type="text" name="email" id="email" class="form-control col col-md-7" placeholder="Email" onkeyup="cek_email()">
					</div>
					<div class=" form-group row " id="alert_email"  style="display: none;">
						<div class="alert alert-danger col col-md-11" >
							Email Sudah Terdaftar!
						</div>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Password</label>
						<input type="text" name="password" class="form-control col col-md-7" placeholder="******">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Tambah</button>
					<a href="/admin/list_user"  class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('js')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	
	function cek_nis(){
		var username = document.getElementById( "username" ).value;
		var _token = $('input[name="_token"]').val();

		$.ajax({
			url:"{{route('cek_user')}}",
			type:'POST',
			data:{username:username,_token:_token},
			success:function(result){
				if(result == "ada"){
					document.getElementById('alert').style.display = "block";
					document.getElementById("submit").disabled = true;
				}else{
					document.getElementById('alert').style.display = "none";
					document.getElementById("submit").disabled = false;
				}

			},
		});

	}
	function cek_email(){
		var email = document.getElementById( "email" ).value;
		var _token = $('input[name="_token"]').val();

		$.ajax({
			url:"{{route('cek_email')}}",
			type:'POST',
			data:{email:email,_token:_token},
			success:function(result){
				if(result == "ada_email"){
					document.getElementById('alert_email').style.display = "block";
					document.getElementById("submit").disabled = true;
				}else{
					document.getElementById('alert_email').style.display = "none";
					document.getElementById("submit").disabled = false;
				}

			},
		});

	}

	function cek_role(){
		var role = document.getElementById( "role" ).value;
		if(role == "kasir"){
			document.getElementById("outlet").disabled = false;
		}else{
			document.getElementById("outlet").disabled = true;
		}
	}


</script>

@endsection