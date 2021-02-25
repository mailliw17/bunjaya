<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?php if (!empty($page_title)) echo $page_title; ?></title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url() ?>vendor/sbadmin2/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>vendor/googlefont.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>vendor/sbadmin2/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/range-datepicker/daterangepicker.css">

    <!-- Range Datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/sweetalert2/package/dist/sweetalert2.min.css">


</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <!-- <i class="fas fa-car"></i> -->
                <div class="sidebar-brand-text mx-3">Bun Jaya Service</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Main Menu</div>

            <!-- Nav Item - Dashboard -->
            <?php if (($this->session->userdata('role') == 'Master') || ($this->session->userdata('role') == 'Owner')) : ?>

                <li <?= ($this->uri->segment(1) == 'dashboard') ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                    <a class="nav-link" href="<?= base_url() ?>dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

            <?php endif; ?>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider" /> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">Interface</div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if (($this->session->userdata('role') == 'Master') || ($this->session->userdata('role') == 'Kasir')) : ?>

                <li <?= ($this->uri->segment(1) == 'transaksi') ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                    <a class="nav-link" href="<?= base_url() ?>transaksi" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Aplikasi Kasir</span>
                    </a>
                </li>

            <?php endif; ?>

            <?php if (($this->session->userdata('role') == 'Master') || ($this->session->userdata('role') == 'Owner')) : ?>
                <!-- Divider -->
                <hr class="sidebar-divider" />


                <!-- Heading -->
                <div class="sidebar-heading">Master Data</div>

                <li <?= ($this->uri->segment(1) == 'barang') ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                    <a class="nav-link" href="<?= base_url() ?>barang" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-sitemap"></i>
                        <span>Barang</span>
                    </a>
                </li>


                <!-- Nav Item - Utilities Collapse Menu -->
                <li <?= ($this->uri->segment(1) == 'pelanggan') ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                    <a class="nav-link" href="<?= base_url() ?>pelanggan" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-people-carry"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider" />

                <!-- Heading -->
                <div class="sidebar-heading">Data Mining</div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li <?= ($this->uri->segment(1) == 'datamining') ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                    <a class="nav-link" href="<?= base_url() ?>datamining" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-database"></i>
                        <span>Proses Data Mining</span>
                    </a>
                </li>

                <li <?= ($this->uri->segment(1) == 'historydatmin') ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                    <a class="nav-link" href="<?= base_url() ?>historydatmin" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-database"></i>
                        <span>History Data Mining</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Tambahan</div>

            <li <?= ($this->uri->segment(1) == 'history_penjualan') ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                <a class="nav-link" href="<?= base_url() ?>history_penjualan" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-history"></i>
                    <span>History Penjualan (Cetak nota error)</span>
                </a>
            </li>

            <?php if (($this->session->userdata('role') == 'Master') || ($this->session->userdata('role') == 'Owner')) : ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li <?= ($this->uri->segment(1) == 'auth') ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                    <a class="nav-link" href="<?= base_url() ?>auth/tambahadmin" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-user-plus"></i>
                        <span>Tambah Owner / Kasir</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2" />
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Halo, <strong><?= $this->session->userdata('nama'); ?></strong>. Anda login sebagai <strong> <?= $this->session->userdata('role'); ?></strong> </span>
                                <i class="fas fa-angle-double-down"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="<?= base_url() ?>auth/gantipassword">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>

                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->