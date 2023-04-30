@extends('layouts/main')

@section('title','Detail Transaksi')


@section('content')

<div class="row">
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
				<h6 class="m-0 font-weight-bold text-info">Detail Transaksi</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/tambah_transaksi/detail/upload">
				@csrf
				<input type="hidden" name="id_transaksi" value="{{$transaksi->id_transaksi}}">
				<input type="hidden" name="outlet" id="outlet" value="{{$transaksi->id_outlet}}">
				<div class="card-body">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Kode Invoice</label>
						<input type="text" name="nama" value="{{$transaksi->kode_invoice}}" readonly="" class="form-control col col-md-7" placeholder="Nama Outlet">
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Paket</label>
						<select class="form-control col col-md-7" name="paket" id="paket" >
							<option selected="" disabled="">Pilih Paket</option>
							@foreach($paket as $data)
							<option value="{{$data->id_paket}}">{{$data->jenis_paket}} - {{$data->nama_paket}}</option>
							@endforeach
						</select>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Jumlah</label>

						<div class=" col col-md-7 ">
							<div class="input-group ">
								<input type="number" class="form-control" name="qty" id="qty" onkeyup="cek_harga()" placeholder="Jumlah">
								<div class="input-group-append">
									<span class="input-group-text"> Kg </span>
								</div>
							</div>
						</div>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Keterangan</label>
						<textarea name="keterangan" class="form-control col col-md-7" placeholder="Keterangan"></textarea>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Harga Paket</label>
						<div class=" col col-md-7 ">
							<div class="input-group flex-nowrap ">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp</span>
								</div>
								<input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Paket" readonly="">
							</div>
						</div>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Total Harga</label>
						<div class=" col col-md-7 ">
							<div class="input-group flex-nowrap ">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp</span>
								</div>
								<input type="number" class="form-control" name="total" id="total" placeholder="Total" readonly="">
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" acc-id="{{ $transaksi->id_outlet }}">Tambah</button>
					<a href="/admin/list_jurusan"  class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
				<h6 class="m-0 font-weight-bold text-info">Detail Transaksi</h6>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Paket</th>
							<th>Harga Paket</th>
							<th>QTY/Jumlah</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						@foreach($detail as $t)
						<tr>
							<td>{{$t->jenis_paket}} - {{$t->nama_paket}}</td>
							<td>Rp. {{number_format($t->harga_paket)}},-</td>
							<td>{{$t->qty}}</td>
							<td>Rp. {{number_format($t->total_harga)}},-</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3">Total</td>
							<td>Rp. {{number_format($total)}},-</td>
						</tr>
					</tfoot>
				</table>
				<a href="#" class="btn btn-success">Simpan</a>
			</div>
		</div>
		
	</div>
</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
	
	function cek_harga(){
		var paket = document.getElementById( "paket" ).value;
		var qty = document.getElementById( "qty" ).value;
		var _token = $('input[name="_token"]').val();

		$.ajax({
			url:"{{route('cek_harga')}}",
			type:'POST',
			data:{paket:paket,_token:_token},
			success:function(result){

				document.getElementById('harga').value = result;
				var total = result * qty;
				document.getElementById('total').value = total;
			},
		});

	}

</script>


@endsection
