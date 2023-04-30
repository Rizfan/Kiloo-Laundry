
<div class=" shadow">
  <ul class="navbar-nav bg-white sidebar  accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/owner/dashboard">
      <div class="sidebar-brand-icon">
        <img src="{{url('img/Laundry.png')}}" style="max-width: 40px;">
      </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Request::is('owner/dashboard','owner/dashboard*')) active @endif">
      <a class="nav-link" href="/owner/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      User
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if(Request::is('owner/list_user','owner/list_user*')) active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-user"></i>
        <span>Manage User</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage User</h6>
          <a class="collapse-item" href="/owner/list_user">Data User</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Heading -->
    <div class="sidebar-heading">
      Outlet
    </div>

    <li class="nav-item @if(Request::is('owner/list_outlet','owner/list_outlet*')) active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-store"></i>
        <span>Manage Outlet</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Outlet</h6>
          <a class="collapse-item" href="/owner/list_outlet">Data Outlet</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
      member
    </div>

    <li class="nav-item @if(Request::is('owner/list_member','owner/list_member*')) active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-users"></i>
        <span>Manage Member</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Member</h6>
          <a class="collapse-item" href="/owner/list_member">Data Member</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Heading -->
    <div class="sidebar-heading">
      paket
    </div>

    <li class="nav-item @if(Request::is('owner/list_paket','owner/list_paket*')) active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-fw fa-users"></i>
        <span>Manage Paket</span>
      </a>
      <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Paket</h6>
          <a class="collapse-item" href="/owner/list_paket">Data Paket</a>
        </div>
      </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Heading -->
    <div class="sidebar-heading">
      transaksi
    </div>

    <li class="nav-item @if(Request::is('owner/list_transaksi','owner/list_transaksi*')) active @endif">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>Manage Transaksi</span>
      </a>
      <div id="collapseFive" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-light py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Transaksi</h6>
          <a class="collapse-item" href="/owner/list_transaksi">Data Transaksi</a>
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
    <!-- End of Sidebar