<!-- <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel"> -->
<!-- <div class="row"> -->
<div class="col-sm-12 col-xl-6">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h4 class="card-title"> <strong>Ganti Password</strong></h4>

            <!-- flashdata kalau berhasil nambah -->
            <?= $this->session->flashdata('message') ?>

            <form action="<?= base_url('auth/gantipassword') ?>" method="post">

                <div class="form-group">
                    <label for="passwordLama">Password Lama</label>
                    <input type="password" class="form-control" id="passwordLama" placeholder="Masukan password lama" name="passwordLama" required>
                    <?= form_error('passwordLama', ' <small class="text-danger pl-3">', '</small>');  ?>
                </div>

                <div class="form-group">
                    <label for="passwordBaru1">Password Baru</label>
                    <input type="password" class="form-control" id="passwordBaru1" placeholder="Masukan password baru" name="passwordBaru1" required>
                    <?= form_error('passwordBaru1', ' <small class="text-danger pl-3">', '</small>');  ?>
                </div>

                <div class="form-group">
                    <label for="passwordBaru2">Ulangi Password Baru</label>
                    <input type="password" class="form-control" id="passwordBaru2" placeholder="Masukan password baru" name="passwordBaru2" required>
                    <?= form_error('passwordBaru2', ' <small class="text-danger pl-3">', '</small>');  ?>
                </div>

                <div class="form-group float-right">
                    <a class="mt-1 btn btn-danger" type="reset" href="<?= base_url('dashboard') ?>">Batal</a>
                    <button class="mt-1 btn btn-primary" type="submit">Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- </div> -->