<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link bg-lightblue">
        <img src="<?= base_url('assets/'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sakomsiba</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/home" class="nav-link <?php if ($title == "Dashboard") {
                                                        echo 'active';
                                                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php if (session()->role == 'admin' || session()->role == 'superadmin') : ?>
                    <li class="nav-item">
                        <a href="/user" class="nav-link <?php if ($title == "Manage User") {
                                                            echo 'active';
                                                        } ?>">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Manage User
                            </p>
                        </a>
                    </li>

                    <li class="nav-item  <?php if ($title == "Kabupaten" || $title == "Kecamatan" || $title == "Desa") {
                                                echo 'menu-open';
                                            } ?>">
                        <a href="#" class="nav-link <?php if ($title == "Kabupaten" || $title == "Kecamatan" || $title == "Desa") {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Manage Wilayah
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kabupaten" class="nav-link <?php if ($title == "Kabupaten") {
                                                                            echo 'active';
                                                                        } ?>">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>
                                        Manage Kabupaten
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/kecamatan" class="nav-link <?php if ($title == "Kecamatan") {
                                                                            echo 'active';
                                                                        } ?>">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>
                                        Manage Kecamatan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/desa" class="nav-link <?php if ($title == "Desa") {
                                                                    echo 'active';
                                                                } ?>">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>
                                        Manage Desa
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/manage_pelaporan" class="nav-link <?php if ($title == "Manage Pelaporan") {
                                                                        echo 'active';
                                                                    } ?>">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Manage Pelaporan Banjir
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/statistik" class="nav-link <?php if ($title == "Statistik Kebutuhan") {
                                                                    echo 'active';
                                                                } ?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Statistik Kebutuhan
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (session()->role == 'user' || session()->role == 'superadmin') : ?>
                    <li class="nav-item">
                        <a href="/pelaporan" class="nav-link <?php if ($title == "Pelaporan") {
                                                                    echo 'active';
                                                                } ?>">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Pelaporan Banjir
                            </p>
                        </a>
                    </li>

                    <li class="nav-item  <?php if ($title == "Data Pelaporan Proses" || $title == "Data Pelaporan Selesai" || $title == "Data Pelaporan Dibatalkan") {
                                                echo 'menu-open';
                                            } ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Data Pelaporan Banjir
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/data_pelaporan" class="nav-link <?php if ($title == "Data Pelaporan Proses") {
                                                                                echo 'active';
                                                                            } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Proses</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/data_pelaporan/selesai" class="nav-link <?php if ($title == "Data Pelaporan Selesai") {
                                                                                        echo 'active';
                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Selesai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/data_pelaporan/batal" class="nav-link <?php if ($title == "Data Pelaporan Dibatalkan") {
                                                                                    echo 'active';
                                                                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Dibatalkan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>