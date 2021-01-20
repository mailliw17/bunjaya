<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">History Penjualan</h1>
    <p class="mb-4">
        <!-- Masih error di group by per id_transaksi dan juga error ditampilin nama pelanggan -->
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables Example
            </h6> 
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>ID Transaksi</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Total Pembayaran</th>
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
                                <td> <?php echo $h['id_transaksi']; ?> </td>
                                <td> <?php echo date("d/M/Y", strtotime($h['tanggal'])); ?> </td>
                                <td> <?php echo $h['nama_pelanggan']; ?> </td>
                                <td> <?php $hasil_rupiah = "Rp " . number_format($h['total'], 2, ',', '.');
                                        echo $hasil_rupiah; ?> </td>

                                <td>
                                    <a id="detail" class="btn btn-info btn-sm" href="<?php echo base_url('nota/print/') . $h['id_transaksi'] ?>" target="_blank">
                                        <i class="fas fa-print"></i> Cetak Struk
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
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?php if ($this->session->flashdata('insert_multidata_berhasil')) : ?>
    <script>
        Swal.fire(
            'Berhasil',
            'Transaksi sukses dilaksanakan!',
            'success'
        )
    </script>
<?php endif; ?>