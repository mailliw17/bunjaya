<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">History Data Mining</h1>

    <?php if ($this->session->flashdata('message_hapus')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Knowledge Berhasil Dihapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

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
                                <td> <?php echo date("d/M/Y", strtotime($h['start_date'])); ?> </td>
                                <td> <?php echo date("d/M/Y", strtotime($h['end_date'])); ?> </td>
                                <td> <?php echo $h['support']; ?> </td>
                                <td> <?php echo $h['confidence']; ?> </td>
                                <td>
                                    <a type="button" href="<?= base_url('historydatmin/detailknowledge') ?>" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i> Lihat Knowledge</a>

                                    <a onclick="javacript:return confirm('Anda yakin menghapus knowledge ini?')" href="<?php echo base_url('historydatmin/hapushistory/') . $h['id_history_mining'] ?>" class=" btn btn-danger btn-icon-split btn-sm">
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