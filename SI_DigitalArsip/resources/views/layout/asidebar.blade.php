<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="https://e-arsip.kopegtelkp.com/public/logo-fullkpg.png" alt="AdminLTE Logo" class="img-circle "
            style="opacity: .8;background-color:white" height="60" width="60">
        <span class="brand-text font-weight-bold">SISTEM INFORMASI
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <span class="brand-text font-weight-bold text-white ml-5">DIGITAL ARSIP
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-book"></i>
                        <p>
                            Kelola Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/subkategori" class="nav-link">
                        <i class="nav-icon fa-solid fa-book"></i>
                        <p>
                            Kelola SubKategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kelolaberkas" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Kelola Berkas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kelolauser" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelola User
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>