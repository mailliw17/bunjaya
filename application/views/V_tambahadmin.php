<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Menambahkan Admin Baru</h1>
    <!-- <p class="mb-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas officia quis praesentium consequuntur nulla odit similique nobis saepe placeat officiis adipisci tempore, incidunt consequatur expedita est nisi aspernatur non numquam!
    </p> -->
    <form action="<?= base_url('auth/tambahadmin') ?>" method="post" class="form-group col-md-6">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukan nama..." name="nama" required autocomplete="off">
            <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Masukan username.." name="username" required autocomplete="off">
            <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group">
            <label for="username">Role : &nbsp;</label>
            <div class="form-check form-check-inline">
                <input type="radio" name="role" <?php if (isset($gender) && $gender == "Owner") echo "checked"; ?> value="Owner" required>&nbsp; Owner
            </div>

            <div class="form-check form-check-inline">
                <input type="radio" name="role" <?php if (isset($gender) && $gender == "Kasir") echo "checked"; ?> value="Kasir" required>&nbsp; Kasir
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password1" placeholder="Masukan password ..." name="password1" required>
            <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group">
            <label for="password">Ulangi Password</label>
            <input type="password" class="form-control" id="password2" placeholder="Masukan password ..." name="password2" required>
            <?= form_error('password2', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group float-right">
            <!-- <button class="mt-1 btn btn-danger" type="reset" data-dismiss="modal">Batal</button> -->
            <button class="mt-1 btn btn-primary" type="submit">Buat Akun</button>
        </div>
    </form>
</div>
</div>