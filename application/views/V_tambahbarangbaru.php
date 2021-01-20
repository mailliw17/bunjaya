<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Menambahkan Barang Baru</h1>
    <hr>
    <form action="<?= base_url('barang/tambahbarangbaru') ?>" method="post" class="form-group col-md-6">
        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <!-- <input type="text" class="form-control" id="nama_barang" placeholder="Masukan nama barang..." name="nama_barang" required autocomplete="off"> -->
            <input list="nama_barang_dropdown" class="form-control name_list" id="nama_barang" name="nama_barang" autocomplete="off" placeholder="Freon Klea..." required autofocus>
            <datalist id="nama_barang_dropdown">
                <?php
                foreach ($barang as $b) : ?>
                    <option value="<?= $b->nama_barang ?>"></option>
                <?php endforeach; ?>
            </datalist>
            <?= form_error('nama_barang', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group">
            <label for="username">Harga Satuan</label>
            <input type="text" class="form-control" id="rupiah" name="harga_satuan" autocomplete="off" placeholder="Rp15.000,00" required>
            <?= form_error('harga_satuan', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group float-right">
            <a class="btn btn-danger" href="<?= base_url('barang') ?>" type="reset">Batal</a>
            <button class="btn btn-primary" type="submit">OK</button>
        </div>
    </form>
</div>
</div>

<!-- Script Auto Format Rupiah (dimatikan dulu, karena belum ketemu trim String ->Int) -->
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>