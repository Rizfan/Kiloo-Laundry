@extends('layouts/kasir')

@section('title','Dashboard')

@section('content')


<div class="alert alert-success animated fadeIn" role="alert " style="margin-top: 25px;">

  Selamat Datang, {{ Auth::user()->name }}!

</div>

<!-- Content Row -->
<div class="row">

  <!-- Alumni -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Member</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$member}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jurusan -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transaksi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$transaksi}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Outlet -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Paket</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$paket}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-store fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>




@endsection

