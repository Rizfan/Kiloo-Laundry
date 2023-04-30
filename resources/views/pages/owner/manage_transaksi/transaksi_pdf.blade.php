<!DOCTYPE html>

<html>

<head>

	<title>REKAPITULASI DATA PAKET</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>

	<style type="text/css">

		table tr td,

		table tr th{

			font-size: 15px;

		}

		@page {

			margin: 50px 25px;

			margin-bottom: 0cm;			

		}

		.gambar{

			width: 450px;

			opacity: 0.03;

			margin-top: 240px; 

			position: relative;

		}

		.gambar1{

			max-width: 150px;

			max-height: 150px;

			margin-right: 500px;

		}

		.hasil{

			margin-top: -800px;

		}

		.custom-footer-page-number:after {

			content: counter(page) " / " counter(page);

		}

		footer {

			position: fixed; 

			bottom: 0cm; 

			left: 0cm; 

			right: 0cm;

			height: 1.3cm;

			margin-right: -25px;

			margin-left: -25px;

			font-size: 12px;



			/** Extra personal styles **/

			/*background-color: #135889;

			color: white;*/

			line-height: 0.05cm;

		}

		.space{

			width: 80%;

		}

		#footer { 

			position: fixed; 

			width: 100%; 

			bottom: 0; 

			left: 0;

			right: 0;

		}

		.foto{

			max-height: 200px;

			margin-left: -100px;

		}

		.data{

			margin-left: 100px;

		}



		.content{

			margin-top: -50px;

		}

		.pagenum:before {

			content: counter(page);

		}

	</style>

	<header>

		<div class="row">

			<center>

				<img src="{{ public_path('/img/Laundry2.png') }}" class="gambar">	

			</center>

			<div class="col col-md-4">

				<img src="{{ public_path('/img/Laundry2.png') }}" class="gambar1">	

			</div>

			<center>

				<div class="col col-md-4" style="font-size: 12px; margin-left: 100px;">

					<p><h4>KILO LAUNDRY</h4>({{$outlet->nama_outlet}}) {{$outlet->alamat_outlet}}<br>Telepon : {{$outlet->tlp_outlet}} <br>Email : kilolaundry@gmail.com <br>Website : kilolaundry.com</p><br>

				</div>

				<div class="col col-md-4" style="font-size: 12px;">
					<br>
					<hr>

					<h5>REKAPITULASI DATA TRANSAKSI <div class="text-uppercase">{{$outlet->nama_outlet}}</div></h5>
					<p>Dari Tanggal {{date('d F Y ',strtotime($awal))}} Sampai Tanggal {{date('d F Y ',strtotime($akhir))}}</p>

				</div>

			</center>

		</div>

	</header>



	<div class="col-md-8 hasil">

		<p style="font-size: 12px;">Tanggal Cetak Laporan : {{$tanggal}}</p>

		<table width="100%" class="table table-bordered table-striped " style="font-size: 12px;" cellpadding="5" cellspacing="5">
			<thead class="bg-light">
				<tr>
					<th>No</th>
					<th>Kode Invoice</th>
					<th>Nama Member</th>
					<th>Tanggal Transaksi</th>
					<th>Total Bayar</th>
					<th>Status</th>
					<th>Pembayaran</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; Date::setlocale('ID');
				$n = 1;
				?>
				@if($cek > 0)
				@foreach($transaksi as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->kode_invoice}}</td>
					<td>{{$data->nama_member}}</td>
					<td>{{date('d F Y ',strtotime($data->tgl_transaksi))}}</td>

					<td>RP. {{number_format($data->total_bayar)}},-</td>


					<td class="text-center">
						{{$data->status_transaksi}}
					</td>

					<td>
						{{$data->pembayaran}}
						
					</td>
				</tr>

				@endforeach
				@else
				<tr>
					<td colspan="7" class="text-center">Data Kosong</td>
				</tr>
				@endif
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4">Total Pendapatan</td>
					<td colspan="3">Rp. {{number_format($total_semua)}},-</td>
				</tr>
			</tfoot>
		</table>
		<div class="row justify-content-end text-right">
			<div class="col-md-8"></div>
			<div class="col col-md-4 ">
				<center>
					<p class="mr-5" style="font-size: 15px;">
						Mengetahui,<br>
					</p>
					<p class="" style="margin-top: -20px;margin-right: 40px; font-size: 15px;">
						Kepala Cabang<br><br><br>
					</p>
					<p class="" style="margin-right: 37px; font-size: 15px;">
						Rizfan Herlaya<br>
					</p>
				</center>
			</div>
		</div>
	</div>
	<footer>
		<hr>
		<div class="mr-auto">
			<p class="mr-auto">&nbsp;&nbsp;HRD</p>
		</div>
		<div class="text-right">
			<span class="custom-footer-page-number ml-auto">Halaman </span>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>