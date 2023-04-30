@extends('layouts/kasir')

@section('title','Manage Transaksi')

@section('content')

<div class="card shadow mb-4" width="100%">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold text-info">Manage Transaksi</h6>

		<a href="#" class="d-none ml-auto d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#pdfModal"><i class="fas fa-print fa-sm text-white-50"></i> PDF </a> &nbsp;

		<a href="/kasir/tambah_transaksi/upload" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Tambah Transaksi</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-light">
					<tr>
						<th>No</th>
						<th>Kode Invoice</th>
						<th>Nama Member</th>
						<th>Tanggal Transaksi</th>
						<th>Total Bayar</th>
						<th>Status</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; Date::setlocale('ID');
					$n = 1; 
					?>
					@foreach($transaksi as $data)
					<tr>
						<td>{{$no++}}</td>
						<td><a href="/kasir/detail_transaksi/{{$data->id_transaksi}}">{{$data->kode_invoice}}</a></td>
						<td>{{$data->nama_member}}</td>
						<td>{{date('d F Y ',strtotime($data->tgl_transaksi))}}</td>

						<td>RP. {{number_format($data->total_bayar)}},-</td>


						<td class="text-center">
							<select id="status{{ $n }}" class="form-control" onchange="updateSTATUS({{ $n++ }})">
								@if($data->status_transaksi == "Baru")
								<option value="{{ $data->id_transaksi }}_Baru" selected disabled>Baru</option>
								<option value="{{ $data->id_transaksi }}_Proses">Proses</option>
								<option value="{{ $data->id_transaksi }}_Selesai">Selesai</option>
								<option value="{{ $data->id_transaksi }}_Diambil">Di Ambil</option>
								@endif
								@if($data->status_transaksi == "Proses")
								<option value="{{ $data->id_transaksi }}_Proses" selected disabled>Proses</option>
								<option value="{{ $data->id_transaksi }}_Selesai">Selesai</option>
								<option value="{{ $data->id_transaksi }}_Diambil">Di Ambil</option>
								@endif
								@if($data->status_transaksi == "Selesai")
								<option value="{{ $data->id_transaksi }}_Selesai" selected disabled>Selesai</option>
								<option value="{{ $data->id_transaksi }}_Diambil">Di Ambil</option>
								@endif
								@if($data->status_transaksi == "Diambil")
								<option value="{{ $data->id_transaksi }}_Diambil" selected disabled>Telah Diambil</option>
								@endif
							</select>
						</td>

						<td>
							@if($data->pembayaran=="Belum Dibayar")
							<a class="text-light" href="/kasir/list_transaksi/bayar/{{ $data->id_transaksi }}"><button class="btn btn-primary" >Bayar</button></a>
							@else
							<a class="text-light batal" href="#" acc-id="{{$data->id_transaksi}}"><button class="btn btn-danger">Batal Bayar</button></a>
							@endif
							<!-- <a class="text-light" href="/kasir/list_transaksi/edit_transaksi/{{ $data->id_transaksi }}"><button class="btn btn-success"><i class="fa fa-pencil-alt"></i></button></a> -->

							<a class="text-light hapus" href="#" acc-id="{{$data->id_transaksi}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
							<a class="text-light" href="/kasir/invoice/{{$data->id_transaksi}}"><button class="btn btn-primary"><i class="fas fa-print"></i></button></a>
						</td>
					</tr>

					@endforeach
				</tbody>
				<tfoot class="bg-light">
					<tr>
						<th colspan="4">Total Pemasukan</th>
						<th colspan="3">Rp. {{number_format($total_semua)}},-</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="ModalSuccess" tabindex="-1" role="dialog" aria-labelledby="ModalSuccess" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Berhasil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" onclick="refresh()">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h4><b>Berhasil Update Transaksi</b> <b id="success-text"></b></h4>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn glow btn-secondary" data-dismiss="modal">
					<i class="fa fa-x d-block d-sm-none"></i>
					<span class="d-none d-sm-block" onclick="refresh()">Close</span>
				</a>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Cetak Laporan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="/kasir/list_transaksi/pdf">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="id_outlet" value="{{Auth::user()->id_outlet}}">
					<div class=" form-group row mb-3 mt-3">
						<label class="col col-md-4 col-form-label text-md-left">Tanggal Awal</label>
						<input type="datetime-local" name="tgl_awal" class="form-control col-md-8" required="">
					</div>
					<div class=" form-group row mb-3 mt-3">
						<label class="col col-md-4 col-form-label text-md-left">Tanggal Akhir</label>
						<input type="datetime-local" name="tgl_akhir" class="form-control col-md-8" required="">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Cetak</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

	$('#ModalSuccess').on('hidden.modal', function () {
		location.reload();
	});
	function refresh(){
		location.reload();		
	}
	
	function updateSTATUS(value) {
		let result = document.getElementById("status"+value).value;
		$.ajax({
			url: "{{route('update_status_kasir')}}",
			cache: false,
			type: 'POST',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: 'data='+encodeURIComponent(result),
			success: function(data){
				$('#ModalSuccess').modal('show');
			}
		});
	}

</script>
@endsection

@section('js')

<script type="text/javascript">

	$('.hapus').on('click',function(){
		var id = $(this).attr('acc-id')
		console.log(id)
		var url = '{{URL::to('kasir/list_transaksi/hapus_transaksi')}}/' +id

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
	$('.batal').on('click',function(){
		var id = $(this).attr('acc-id')
		console.log(id)
		var url = '{{URL::to('kasir/list_transaksi/batal_bayar')}}/' +id

		Swal.fire({
			title: 'Apakah Anda Yakin?',
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