<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Proses Mining</h1>
    <!-- <p class="mb-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas officia quis praesentium consequuntur nulla odit similique nobis saepe placeat officiis adipisci tempore, incidunt consequatur expedita est nisi aspernatur non numquam!
    </p> -->
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">PETUNJUK</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <ul>
                    <li>
                        Nilai Support adalah nilai frekuensi suatu item muncul pada semua transaksi didalam basis data, sebagai contoh suatu item memiliki nilai support sebanyak 5% mengandung arti bahwa item tersebut muncul sebanyak 5% dari semua transaksi yang ada. <br> <strong>Pada masukan diatas pengguna diminta untuk memasukkan nilai minimum support yang akan digunakan sebagai masukan untuk pemrosesan data mining sehingga hasil yang diperoleh memiliki <u> nilai support lebih dari atau sama </u> dengan nilai minimum support yang sudah dimasukkan oleh pengguna.</strong>
                    </li>

                </ul>

                <ul>
                    <li>
                        Confidence adalah nilai kemungkinan suatu item akan dibeli ketika ada pembelian terhadap item lain. <br> <strong> Pada masukan diatas pengguna diminta untuk memasukkan nilai minimum confidence yang akan digunakan sebagai masukan untuk pemrosesan data mining sehingga hasil yang diperoleh memiliki <u>nilai confidence lebih dari atau sama </u> dengan nilai minimum yang sudah dimasukkan oleh pengguna.</strong>
                    </li>
                </ul>


            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success" role="alert">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } else if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } else if ($this->session->flashdata('warning')) { ?>
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
        </div>
    <?php } else if ($this->session->flashdata('info')) { ?>
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
        </div>
    <?php } ?>

    <form action="<?= base_url() ?>datamining/prosesapriori" method="post" class="form-group col-md-4">

        <div class="form-group row">
            <div class="col-md-12">
                <i class="fas fa-calendar-week"></i>
                <label for="nama">Rentang Tanggal</label>
                <input type="text" class="form-control" id="range_tanggal" placeholder="24/02/2021 - 25/02/2021" name="range_tanggal" autocomplete="off" required>
            </div>
        </div>

        <div class="form-group">
            <label for="nama">Nilai Support</label>
            <input type="number" step="any" class="form-control" id="support" placeholder="10" name="support" required autocomplete="off">
            <?= form_error('support', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group">
            <label for="username">Nilai Confidence</label>
            <input type="number" step="0.1" class="form-control" id="confidence" placeholder="20" name="confidence" required autocomplete="off">
            <?= form_error('confidence', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <hr>

        <div class="form-group float-right">
            <!-- <button class="mt-1 btn btn-danger" type="reset" data-dismiss="modal">Batal</button> -->
            <button class="mt-1 btn btn-primary" type="submit">Mulai Proses</button>
        </div>
    </form>
</div>
</div>