@extends('layouts/main')

@section('title','Dashboard')

@section('content')
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
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="/admin/{{$data->id_outlet}}/list_transaksi">Selengkapnya</a></div>
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

@endsection