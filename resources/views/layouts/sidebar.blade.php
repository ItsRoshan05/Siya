<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Yayasan Al-Rasyid</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <p class="text-white">Selamat Datang {{ auth()->user()->name }}</p>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Master Data Section -->
                @if(auth()->user()->jabatan !== 'user')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('donaturs.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Donatur</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Kegiatan Section -->
                @if(auth()->user()->jabatan !== 'user')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Kegiatan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kegiatans.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('donations.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Donasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pengeluarans.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Laporan Section -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('laporan.donasi') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendapatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laporan.pengeluaran') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>