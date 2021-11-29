<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Sembako Atieko</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <br>

    <!-- Heading -->
    <div class="sidebar-heading">
        Dashboard
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('dashboard/'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Data Barang -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataBarang" aria-expanded="true" aria-controls="dataBarang">
            <i class="fa fa-shopping-cart"></i></i>
            <span>Data Barang</span>
        </a>
        <div id="dataBarang" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Barang</h6>
                <a class="collapse-item" href="<?php echo site_url('barang/read'); ?>">Data Barang</a>
                <a class="collapse-item" href="<?php echo site_url('kategori_barang/read'); ?>">Kategori Barang</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Penjualan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataPenjualan" aria-expanded="true" aria-controls="dataPenjualan">
            <i class="fa fa-coins"></i></i>
            <span>Penjualan</span>
        </a>
        <div id="dataPenjualan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Penjualan</h6>
                <a class="collapse-item" href="<?php echo site_url('penjualan/read'); ?>">Penjualan</a>
                <a class="collapse-item" href="<?php echo site_url('laporan_penjualan/read'); ?>">Laporan Penjualan</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pembelian Barang -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#beli" aria-expanded="true" aria-controls="beli">
            <i class="fa fa-shopping-basket"></i></i>
            <span>Pembelian</span>
        </a>
        <div id="beli" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pembelian</h6>
                <a class="collapse-item" href="<?php echo site_url('pembelian/read'); ?>">Data Pembelian</a>
                <a class="collapse-item" href="<?php echo site_url('laporan_pembelian/read'); ?>">Laporan Pembelian</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#chart" aria-expanded="true" aria-controls="chart">
            <i class="fa fa-chart-area"></i></i>
            <span>Charts</span>
        </a>
        <div id="chart" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Charts</h6>
                <a class="collapse-item" href="<?php echo site_url('buku/line/read'); ?>">Line Chart</a>
                <a class="collapse-item" href="<?php echo site_url('buku/pie/read'); ?>">Pie Chart</a>
                <a class="collapse-item" href="<?php echo site_url('buku/column/read'); ?>">Column Chart</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>