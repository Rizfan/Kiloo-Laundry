@extends('layouts/owner')

@section('title','Dashboard')

@section('content')
<!-- Content Row -->
<div class="card card-body mb-3 shadow">
  <div>
    <a href="/owner/dashboard" class="btn btn-secondary">Kembali</a>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pdfModal">Cetak Laporan</a>
  </div>
</div>
<!-- Content Row -->
<div class="row">

  @foreach($outlet as $data)
  <!-- User -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{$data->nama_outlet}}</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/owner/{{$data->id_outlet}}/list_transaksi">Selengkapnya</a></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endforeach


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
      <form method="POST" enctype="multipart/form-data" action="/owner/list_transaksi/pdf">
        @csrf
        <div class="modal-body">
          <div class=" form-group row mb-3 mt-3">
            <label class="col col-md-4 col-form-label text-md-left">Outlet</label>
            <select class="form-control col-md-8" name="id_outlet">
              <option value="">Semua</option>
              @foreach($outlet as $t)
              <option value="{{$t->id_outlet}}">{{$t->nama_outlet}}</option>
              @endforeach
            </select>
          </div>
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

@endsection