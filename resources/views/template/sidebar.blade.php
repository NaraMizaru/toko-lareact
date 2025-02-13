<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-regular fa-fw fa-envelope"></i>
            {{-- <img src="{{asset('assets/img/E - VOTING (2).png')}}" height="40"> --}}
        </div>
        <div class="sidebar-brand-text mx-3">E-Voting <sup>2.0</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="fa-regular fa-fw fa-house"></i>
            <span>Dashboard</span>
        </a>
    </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">Kelola</div>

        <li class="nav-item">
            <a href="{{ route('admin.kategori') }}" class="nav-link">
                <i class="fa-regular fa-fw fa-school"></i>
                <span>Kelola Kategori</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.produk') }}" class="nav-link">
                <i class="fa-regular fa-fw fa-users"></i>
                <span>Kelola Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fa-regular fa-fw fa-check-to-slot"></i>
                <span>Kelola Kasir</span>
            </a>
        </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
