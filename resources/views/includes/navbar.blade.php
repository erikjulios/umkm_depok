        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #325288;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard.index')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ADMIN</h6>
                        <a class="collapse-item" href="{{ route('produk.index') }}">Data Produk</a>
                        <a class="collapse-item" href="{{route('umkm.index')}}">Data UMKM</a>
                        <a class="collapse-item" href="{{route('transaksi.index')}}">Data Transaksi</a>
                        <a class="collapse-item" href="{{route('dikemas.index')}}">Konfirmasi Pengiriman</a>
                        <p class="collapse-item" >Data User (Maintance)</p>
                        <p class="collapse-item" >Report (Maintance) </p>
                    </div>
                </div>
            </li>

        </ul>
        <!-- End of Sidebar -->
