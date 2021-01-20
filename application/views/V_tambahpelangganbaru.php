<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Menambahkan Pelanggan Baru</h1>
    <hr>
    <form action="<?= base_url('pelanggan/tambahpelangganbaru') ?>" method="post" class="form-group col-md-6">
        <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <!-- <input type="text" class="form-control" id="nama_pelanggan" placeholder="Ahmad Bustomi..." name="nama_pelanggan" required autocomplete="off" autofocus> -->
            <input list="nama_pelanggan_dropdown" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Ahmad Bustomi..." autocomplete="off" required autofocus>
            <datalist id="nama_pelanggan_dropdown">
                <?php
                foreach ($pelanggan as $p) : ?>
                    <option value="<?= $p->nama_pelanggan ?>"></option>
                <?php endforeach; ?>
            </datalist>
            <?= form_error('nama_pelanggan', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group float-right">
            <a class="btn btn-danger" href="<?= base_url('pelanggan') ?>" type="reset">Batal</a>
            <button class="btn btn-primary" type="submit">OK</button>
        </div>
    </form>
</div>
</div>