@extends('layouts/owner')

@section('title','Dashboard')

@section('content')
<div class="alert alert-success animated fadeIn" role="alert " style="margin-top: 25px;">

  Selamat Datang, {{ Auth::user()->name }}!

</div>
<!-- Content Row -->
<div class="row">

  <!-- User -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah User</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

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
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Outlet</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$outlet}}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-store fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>




<!-- Content Row -->

<div class="row">

  <!-- Pie Chart -->
  <div class="col-xl-5 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-info">Data Transaksi Berdasarkan Status Cucian</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="myPieChart1"></canvas>
        </div>
        <div class="mt-4 text-center small">
          <span class="mr-2">
            <i class="fas fa-circle text-danger"></i> Baru
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-primary"></i> Proses
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Selesai
          </span>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{url('backend/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{url('backend/js/demo/chart-area-demo.js')}}"></script>
<script src="{{url('backend/js/demo/chart-pie-demo.js')}}"></script>


<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart1");
var myPieChart1 = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Selesai","Proses","Baru" ],
    datasets: [{
      data: [ '{{$selesai}}','{{$proses}}','{{$baru}}'],
      backgroundColor: ['#55c78b', '#4e73df','#e54b39'],
      hoverBackgroundColor: ['#17a673','#2e59d9', '#bf3c2d'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 20,
      yPadding: 20,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
  },
});

</script>

@endsection

