<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Barang</h1>
    <!-- <p class="mb-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas officia quis praesentium consequuntur nulla odit similique nobis saepe placeat officiis adipisci tempore, incidunt consequatur expedita est nisi aspernatur non numquam!
    </p> -->
    <form action="" method="post" class="form-group col-md-6">
        <div class="form-group col-md-6">
            <input type="hidden" class="form-control" id="id_barang" name="id_barang" value="<?= $barang['id_barang']; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required autocomplete="off" value="<?= $barang['nama_barang']; ?>" placeholder="Masukan nama barang...">
            <?= form_error('nama_barang', ' <small class="text-danger pl-3">', '</small>');  ?>
        </div>

        <div class="form-group">
            <label for="username">Harga Satuan</label>
            <input type="text" class="form-control" id="rupiah" name="harga_satuan" required value="<?= $barang['harga_satuan']; ?>" autocomplete="off" placeholder="Masukan angka harga...">
        </div>

        <div class="form-group float-right">
            <a class="btn btn-danger" href="<?= base_url('barang') ?>" type="reset">Batal</a>
            <button class="btn btn-primary" type="submit">OK</button>
        </div>
    </form>
</div>
</div>

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