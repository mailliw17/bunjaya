<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->

    <?php if ($this->session->flashdata('message_berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Akun Baru Berhasil Dibuat !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $transaksi; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $pelanggan; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $barang; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Page Content -->
    <!-- <div class="container-fluid"> -->
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hasil Pengolahan Data Transaksi</h1>

    <!-- <a class="btn btn-primary" href="<?= base_url() ?>pelanggan/tambahpelangganbaru" style="margin-bottom: 10px;"> <i class="fas fa-plus"></i> Tambah Pelanggan Baru</a> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Tanggal Mulai </th>
                            <th>Tanggal Selesai</th>
                            <th>Nilai Support</th>
                            <th>Nilai Confidence</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($history as $h) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo date("d/M/Y", strtotime($h->start_date)); ?> </td>
                                <td> <?php echo date("d/M/Y", strtotime($h->end_date)); ?> </td>
                                <td> <?php echo $h->min_support; ?>% </td>
                                <td> <?php echo $h->min_confidence; ?>% </td>
                                <td>
                                    <a type="button" href="<?= base_url('historydatmin/viewRule/' . $h->id) ?>" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> Lihat Knowledge</a>

                                    <a onclick="javacript:return confirm('Anda yakin menghapus knowledge ini?')" href="<?php echo base_url('historydatmin/hapushistory/') . $h->id ?>" class=" btn btn-danger btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables Example
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Pengetahuan</th>
                            <th>Akurasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        <tr>
                            <td> <?php echo $no; ?> </td>
                            <td> Pelanggan yang membeli Fren Klea, memiliki kemungkinan 100 % juga untuk membeli Condensor</td>
                            <td>100%</td>
                        </tr>
                        <?php $no++; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->


    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>


<!-- </div> -->