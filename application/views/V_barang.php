<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
    <a class="btn btn-primary" href="<?= base_url() ?>barang/tambahbarangbaru" style="margin-bottom: 10px;"> <i class="fas fa-plus"></i> Tambah Barang Baru</a>

    <?php if ($this->session->flashdata('message_berhasil')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Barang Baru Berhasil Didaftarkan ke sistem !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message_hapus')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Barang Berhasil Dihapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message_edit')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Barang Berhasil Diedit !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

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
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang->result_array() as $b) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $b['nama_barang']; ?> </td>


                                <td> <?php $hasil_rupiah = "Rp " . number_format($b['harga_satuan'], 2, ',', '.');
                                        echo $hasil_rupiah; ?> </td>

                                <td>
                                    <a href="<?php echo base_url('barang/editbarang/') . $b['id_barang'] ?>" class=" btn btn-warning btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="far fa-edit"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>

                                    <a onclick="javacript:return confirm('Anda yakin menghapus barang ini?')" href="<?php echo base_url('barang/hapusbarang/') . $b['id_barang'] ?>" class=" btn btn-danger btn-icon-split btn-sm">
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
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->