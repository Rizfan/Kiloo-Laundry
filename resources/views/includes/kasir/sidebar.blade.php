
<div class=" shadow">
  <ul class="navbar-nav bg-white sidebar  accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
      <div class="sidebar-brand-icon">
        <img src="{{url('img/Laundry2.png')}}" style="max-width: 30px;">
      </div>
    <?php 
      $outlet = DB::table('outlet')->where('id_outlet',Auth::user()->id_outlet)->first();
    ?>
      <div class="sidebar-brand-text mx-3">{{$outlet->nama_outlet}}</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Request::is('kasir/dashboard','kasir/dashboard*')) active @endif">
      <a class="nav-link" href="/kasir/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
      member
    </div>

    <li class="nav-item @if(Request::is('kasir/list_member','kasir/list_member*')) active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-users"></i>
        <span>Manage Member</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Member</h6>
          <a class="collapse-item" href="/kasir/list_member">Data Member</a>
          <a class="collapse-item" href="/kasir/list_member/tambah_member">Tambah Member</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Heading -->
    <div class="sidebar-heading">
      paket
    </div>

    <li class="nav-item @if(Request::is('kasir/list_paket','kasir/list_paket*')) active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-fw fa-users"></i>
        <span>Manage Paket</span>
      </a>
      <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Paket</h6>
          <a class="collapse-item" href="/kasir/list_paket">Data Paket</a>
          <a class="collapse-item" href="/kasir/list_paket/tambah_paket">Tambah Paket</a>
        </div>
      </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Heading -->
    <div class="sidebar-heading">
      transaksi
    </div>

    <li class="nav-item @if(Request::is('kasir/list_transaksi','kasir/list_transaksi*')) active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>Manage Transaksi</span>
      </a>
      <div id="collapseFive" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Transaksi</h6>
          <a class="collapse-item" href="/kasir/list_transaksi">Data Transaksi</a>
        </div>
      </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
</div>
    <!-- End of Sidebar-->