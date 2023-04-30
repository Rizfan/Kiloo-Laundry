@extends('layouts/main')

@section('title','Detail Transaksi')

@section('content')

<div class="card card-body mb-3 shadow">
	<div>
		<a href="/admin/{{$transaksi->id_outlet}}/list_transaksi" class="btn btn-secondary">Kembali</a>
		<a href="#" class="btn btn-primary" onclick="print()">Cetak</a>
	</div>
</div>

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
						
					</tfoot>
				</table>
				<!-- <a href="/admin/list_transaksi/hapus_transaksi/{{ $transaksi->id_transaksi }}"  class="btn btn-danger">Batal</a> -->
				<!-- <a href="/admin/{{$transaksi->id_outlet}}/list_transaksi" class="btn btn-success">Simpan</a> -->
			</div>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-3">
				<h6 class="m-0 font-weight-bold text-info">Detail Transaksi</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/tambah_transaksi/detail/upload">
				@csrf
				<div class="card-body">
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Kode Invoice</label>
						<label class="col col-md-7 text-md-left">{{$transaksi->kode_invoice}}</label>
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Tanggal Transaksi</label>
						<label class="col col-md-7 text-md-left">{{$transaksi->tgl_transaksi}}</label>
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Batas Waktu Pembayaran</label>
						<label class="col col-md-7 text-md-left">{{$transaksi->batas_waktu}}</label>
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Tanggal Pembayaran</label>
						@if($transaksi->pembayaran == "Belum Dibayar")
						<label class="col col-md-7 text-md-left text-danger">Belum Dilakukan Pembayaran</label>
						@else
						<label class="col col-md-7 text-md-left">{{$transaksi->tgl_bayar}}</label>
						@endif
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Keterangan</label>
						<label class="col col-md-7 text-md-left">{{$transaksi->keterangan}}</label>
					</div>
				</div><!-- 
				<div class="card-footer">
					<button class="btn btn-primary">Tambah</button>
					<a href="/admin/list_jurusan"  class="btn btn-danger">Batal</a>
				</div> -->
			</form>
		</div>
		
	</div>

	<div class="col col-md-6">
		<div class="card shadow">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-3">
				<h6 class="m-0 font-weight-bold text-info">Detail Transaksi</h6>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/tambah_transaksi/detail/upload">
				@csrf
				<div class="card-body">
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Status Transaksi</label>
						@if($transaksi->status_transaksi=="Baru")
						<label  class="col col-md-7 text-md-left"><span class="badge badge-xl badge-primary">{{$transaksi->status_transaksi}}</span> <a href="#" class="text-md-left ml-2" data-toggle="modal" data-target="#statusModal">Ubah Status?</a></label>
						@elseif($transaksi->status_transaksi=="Proses")
						<label  class="col col-md-7 text-md-left"><span class="badge badge-xl badge-warning">{{$transaksi->status_transaksi}}</span> <a href="#" class="text-md-left ml-2" data-toggle="modal" data-target="#statusModal">Ubah Status?</a></label>
						@elseif($transaksi->status_transaksi=="Selesai")
						<label  class="col col-md-7 text-md-left"><span class="badge badge-xl badge-info">{{$transaksi->status_transaksi}}</span> <a href="#" class="text-md-left ml-2" data-toggle="modal" data-target="#statusModal">Ubah Status?</a></label>
						@else
						<label  class="col col-md-7 text-md-left"><span class="badge badge-xl badge-success">{{$transaksi->status_transaksi}}</span> <a href="#" class="text-md-left ml-2" data-toggle="modal" data-target="#statusModal">Ubah Status?</a></label>
						@endif
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Status Pembayaran</label>
						<label class="col col-md-7 text-md-left">{{$transaksi->pembayaran}}</label>
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Harga</label>
						<label class="col col-md-7 text-md-left">RP. {{number_format($total)}}</label>
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Diskon</label>
						<label class="col col-md-7 text-md-left">{{$transaksi->diskon_transaksi}}%</label>
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Pajak (5%)</label>
						<label class="col col-md-7 text-md-left">RP. {{number_format($transaksi->pajak_transaksi)}}</label>
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Biaya Tambahan</label>
						<label class="col col-md-7 text-md-left">RP. {{number_format($transaksi->biaya_tambahan)}}</label>
					</div>
					<div class=" form-group row mb-3">
						<label class="col col-md-4 text-md-left">Total Bayar</label>
						<label class="col col-md-7 text-md-left"><b>RP. {{number_format($transaksi->total_bayar)}}</b></label>
					</div>
				</div><!-- 
				<div class="card-footer">
					<button class="btn btn-primary">Tambah</button>
					<a href="/admin/list_jurusan"  class="btn btn-danger">Batal</a>
				</div> -->
			</form>
		</div>
		
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/admin/detail_transaksi/status1">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="id_transaksi" value="{{$transaksi->id_transaksi}}">
					<div class=" form-group row mb-3 mt-3">
						<label class="col col-md-4 col-form-label text-md-left">Status</label>
						<select class="form-control col col-md-7 text-md-left" name="status">
							<option value="Baru" <?php if ($transaksi->status_transaksi == "Baru") {echo "selected";} ?> >Baru</option>
							<option value="Proses" <?php if ($transaksi->status_transaksi == "Proses") {echo "selected";} ?> >Proses</option>
							<option value="Selesai" <?php if ($transaksi->status_transaksi == "Selesai") {echo "selected";} ?> >Selesai</option>
							<option value="Diambil" <?php if ($transaksi->status_transaksi == "Diambil") {echo "selected";} ?> >Diambil</option>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection