@extends('layouts/main')

@section('title','Tambah Transaksi')
@section('css')
<style type="text/css">
	.sidebar{
		display: none;
	}
</style>
@endsection	

@section('content')

<div class="row mb-2">
	
	<div class="col col-md-12">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
				<h6 class="m-0 font-weight-bold text-info">Detail Transaksi</h6>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr class="bg-light">
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
						<tr class="bg-light">
							<td colspan="3">Total Harga</td>
							<td>Rp. {{number_format($total)}},-</td>
						</tr>
						<tr class="bg-light">
							<td colspan="3">Biaya Tambahan</td>
							<td>Rp. {{number_format($transaksi->biaya_tambahan)}},-</td>
						</tr>
						<tr class="bg-light">
							<td colspan="3">Pajak (5%)</td>
							<td>Rp. {{number_format($pajak = $total * 5/100)}},-</td>
						</tr>
						<tr class="bg-light">
							<td colspan="3">Diskon ({{$transaksi->diskon_transaksi}}%)</td>
							@php
							$diskon = ($total+$transaksi->biaya_tambahan+$pajak) * $transaksi->diskon_transaksi / 100;
							@endphp
							<td>Rp. {{number_format($diskon)}},-</td>
						</tr>
						<tr class="bg-light">
							<td colspan="3">Total Bayar</td>
							<td>Rp. {{number_format($total+$transaksi->biaya_tambahan+$pajak - $diskon)}},-</td>
						</tr>
					</tfoot>
				</table>
				<form method="POST" enctype="multipart/form-data" action="/kasir/tambah_transaksi/update_bayar">
					@csrf
					<input type="hidden" name="id_transaksi" value="{{$id_transaksi}}">
					@php
						$pajak = $total * 5/100;
						$total_bayar = $total+$transaksi->biaya_tambahan + $pajak - $diskon;
					@endphp
					<input type="hidden" name="pajak" value="{{$pajak}}">

					<input type="hidden" name="total_bayar" value="{{$total_bayar}}">
					@if($cek_detail > 0)
					<button type="submit" class="btn btn-success">Simpan</button>
					@else
					<button type="submit" disabled="" class="btn btn-success">Simpan</button>
					@endif
					<a href="/kasir/list_transaksi/hapus_transaksi/{{ $transaksi->id_transaksi }}"  class="btn btn-danger">Batal</a>
				</form>
			</div>
		</div>
		
	</div>
</div>
<div class="row">
	<div class="col col-md-4">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-info">Tambah Transaksi</h6>
			</div>
			@if($transaksi->kode_invoice == NULL)
			<form method="POST" enctype="multipart/form-data" action="/kasir/tambah_transaksi/update">
				@csrf
				<div class="card-body">
					<div class=" form-group row mb-4">
						<input type="hidden" name="id_transaksi" value="{{$id_transaksi}}">
						<label class="col col-md-4 col-form-label text-md-left">Kode Invoice</label>
						<input type="text" readonly name="invoice" id="invoice" class="form-control col col-md-7" >
						<!-- <label class="col col-md-7 text-md-left" id="invoice1"></label> -->
					</div>
					<!-- <div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Outlet</label>
						<select class="form-control col col-md-7" name="outlet">
							<option selected="" disabled="">Pilih Outlet</option>
							@foreach($outlet as $data)
							<option value="{{$data->id_outlet}}">{{$data->nama_outlet}}</option>
							@endforeach
						</select>
					</div> -->
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Member</label>
						<select class="form-control col col-md-7" name="member">
							<option selected="" disabled="">Pilih Member</option>
							@foreach($member as $data1)
							<option value="{{$data1->id_member}}">{{$data1->nama_member}}</option>
							@endforeach
						</select>
					</div>
					<input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('Ymd') ?>">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Batas Waktu Pembayaran</label>
						<input type="datetime-local" name="batas_waktu" class="form-control col col-md-7">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Simpan</button>
				</div>
			</form>
			@else
			<form method="POST" enctype="multipart/form-data" action="/kasir/tambah_transaksi/update">
				@csrf
				<div class="card-body">
					<div class=" form-group row mb-4">
						<input type="hidden" name="id_transaksi" value="{{$id_transaksi}}">
						<label class="col col-md-4 col-form-label text-md-left">Kode Invoice</label>
						<input type="text" readonly name="invoice" value="{{$transaksi->kode_invoice}}" class="form-control col col-md-7" >
						<!-- <label class="col col-md-7 text-md-left" id="invoice1"></label> -->
					</div>
					<!-- <div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Outlet</label>
						<select class="form-control col col-md-7" name="outlet">
							<option selected="" disabled="">Pilih Outlet</option>
							@foreach($outlet as $data)
							<option value="{{$data->id_outlet}}">{{$data->nama_outlet}}</option>
							@endforeach
						</select>
					</div> -->
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Member</label>
						<input type="text" name="member" value="{{$tr->nama_member}}" class="form-control col col-md-7" readonly="">
					</div>
					<input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('Ymd') ?>">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Batas Waktu Pengambilan Cucian</label>
						<input type="text" readonly="" name="batas_waktu" value="{{$transaksi->batas_waktu}}" class="form-control col col-md-7">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary" disabled="">Simpan</button>
				</div>
			</form>

			@endif
		</div>
	</div>
	<div class="col col-md-4">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-2">
				<h6 class="m-0 font-weight-bold text-info">Detail Transaksi</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/kasir/tambah_transaksi/detail/upload">
				@csrf
				<input type="hidden" name="id_transaksi" value="{{$transaksi->id_transaksi}}">
				<input type="hidden" name="outlet" id="outlet" value="{{$transaksi->id_outlet}}">
				<div class="card-body">
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
				</div>
			</form>
		</div>
	</div>
	<div class="col col-md-4">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-info">Tambah Transaksi</h6>
			</div>

			<form method="POST" enctype="multipart/form-data" action="/kasir/tambah_transaksi/update_biaya">
				@csrf
				<div class="card-body">
					<input type="hidden" name="id_transaksi" value="{{$id_transaksi}}">
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Total Harga</label>
						<!-- <input type="number" name="biaya_tambahan" class="form-control col col-md-7" placeholder="Biaya Tambahan"> -->
						<div class=" col col-md-7 ">
							<div class="input-group flex-nowrap ">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp</span>
								</div>
								<input type="text" readonly name="total" id="total" value="{{$total}}" class="form-control" >
							</div>
						</div>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Biaya Tambahan</label>
						<div class=" col col-md-7 ">
							<div class="input-group flex-nowrap ">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp</span>
								</div>
								@if($transaksi->biaya_tambahan > 0)
								<input type="number" class="form-control" placeholder="Biaya Tambahan" value="{{$transaksi->biaya_tambahan}}" name="biaya_tambahan" readonly="">
								@else
								<input type="number" class="form-control" placeholder="Biaya Tambahan" name="biaya_tambahan">
								@endif
							</div>
						</div>
					</div>
					<div class=" form-group row mb-4">
						<label class="col col-md-4 col-form-label text-md-left">Diskon</label>
						<!-- <input type="number" name="diskon" class="form-control col col-md-7" placeholder="Diskon"> -->
						<div class=" col col-md-7 ">
							<div class="input-group ">
								@if($transaksi->diskon_transaksi > 0)
								<input type="number" class="form-control" placeholder="Diskon" value="{{$transaksi->diskon_transaksi}}" name="diskon_transaksi" readonly="">
								@else
								<input type="number" class="form-control" placeholder="Diskon" name="diskon_transaksi">
								@endif
								<div class="input-group-append">
									<span class="input-group-text"> % </span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary">Simpan</button>
				</div>
			</form>
			
		</div>
	</div>
</div>

@endsection

@section('js')
<script language="javascript" type="text/javascript">
	var tanggal = document.getElementById('tanggal').value;
	var campur = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var panjang = 9;
	var random_all = '';
	for (var i=0; i<panjang; i++) {
		var hasil = Math.floor(Math.random() * campur.length);
		random_all += campur.substring(hasil,hasil+1);
	}
	document.getElementById('invoice').value = "INV/"+tanggal+"/"+random_all;
	document.getElementById('invoice1').innerHTML = "INV/"+tanggal+"/"+random_all;
	
</script>
<script type="text/javascript">
	
	function cek_harga(){
		var paket = document.getElementById( "paket" ).value;
		var qty = document.getElementById( "qty" ).value;
		var _token = $('input[name="_token"]').val();

		$.ajax({
			url:"{{route('cek_harga_kasir')}}",
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