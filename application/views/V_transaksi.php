<div class="form-group">
    <form enctype="multipart/form-data" action="<?= base_url() ?>transaksi/insert_transaksi" method="POST" name="add_name" id="add_name">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- <div class="container">
                <div class="row">
                    <h4>Total Harga (error) :</h4>
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control total_harga" id="total_harga" name="total_harga" placeholder="Otomatis dihitung sistem..." value=10000 readonly>
                    </div>
                </div>
            </div> -->

            <!-- <div class="col-xl-12 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Harga
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <input type="text" class="form-control total_harga" id="total_harga" name="total_harga" placeholder="Otomatis dihitung sistem..." value=10000 readonly>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->



            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
                <!-- <h1 class="h3 mb-0 text-gray-800">Aplikasi Point of Sale</h1> -->
                <!-- <div class="form-group col-md-3">
                    <label for="idpallet">ID transaksi</label>
                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo time(); ?>" readonly>
                </div> -->

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        ID Transaksi
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?php echo time(); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fingerprint fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="form-group col-md-2">
                    <label for="waktu">Tanggal :</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal" value="2020-11-03">
                    <div class="input-group-append"></div>
                </div> -->

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Tanggal
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <input type="text" class="form-control datepicker" id="tanggal" name="datepicker" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-calendar-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="form-group col-md-1"> -->
                <!-- <label for="id_pelanggan">ID_pelanggan</label> -->
                <!-- <input type="hidden" class="form-control" id="id_pelanggan" name="id_pelanggan" readonly> -->
                <!-- <div class="input-group-append"></div> -->
                <!-- </div> -->

                <!-- <div class="form-group col-md-4">
                    <label for="waktu">Pelanggan :</label>
                    <input list="nama_pelanggan_dropdown" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukan nama pelanggan" required autocomplete="off" onchange="autoFillPelanggan(this.value, 'id_pelanggan')">
                    <datalist id="nama_pelanggan_dropdown">
                        <?php
                        foreach ($pelanggan as $p) : ?>
                            <option value="<?= $p->nama_pelanggan ?>"></option>
                        <?php endforeach; ?>
                    </datalist>
                </div> -->

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Pelanggan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <input list="nama_pelanggan_dropdown" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukan nama pelanggan" required autocomplete="off" required>
                                        <datalist id="nama_pelanggan_dropdown">
                                            <?php
                                            foreach ($pelanggan as $p) : ?>
                                                <option value="<?= $p->nama_pelanggan ?>"></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tombol Tambah dan Kurang Baris -->
            <div class="row">
                <div class="form-group col-md-1">
                    <button type="button" class="btn btn-primary btn-sm" id="add" onclick="tambahbaris()">
                        <i class="fas fa-plus"></i>
                        <small>Tambah</small>
                    </button>
                </div>

                <div class="form-group col-md-1">
                    <button type="button" class="btn btn-danger btn-sm" id="minus" onclick="hapusbaris(current_rowid)">
                        <i class="fas fa-minus"></i>
                        Hapus
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dynamic_field">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga Satuan</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody id="tblbody">
                        <tr id="tblrow-1">
                            <td>
                                <input type="number" class="form-control name_list" name="id_barang[]" id="id_barang_1" readonly>
                            </td>
                            <td>
                                <input list="nama_barang_dropdown" class="form-control name_list" id="nama_barang_1" name="nama_barang[]" required autocomplete="off" onchange="autoFill(this.value, 'id_barang_1', 'harga_satuan_1')">
                                <datalist id="nama_barang_dropdown">
                                    <?php
                                    foreach ($barang as $b) : ?>
                                        <option value="<?= $b->nama_barang ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </td>
                            <td>
                                <input type="number" class="form-control name_list" name="qty[]" id="qty_1" onkeyup="sum('1');" required>
                            </td>
                            <td>
                                <input type="text" class="form-control name_list" name="harga_satuan[]" id="harga_satuan_1" readonly>
                            </td>
                            <td>
                                <input type="text" class="form-control name_list sub_total" name="sub_total[]" id="sub_total_1" onchange="get_total(this.value)" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- </div> -->
            <!-- </div> -->
            <!-- <div class="form-row">
                <div class="form-group col-md-10 mx-auto">
                    <input type="text" class="form-control" id="total_harga" name="total_harga" value="" placeholder="Total Harga..." readonly>
                </div>
            </div> -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="ceklis" onclick="disabled_tombol(this)">
                <label class="form-check-label" for="exampleCheck1">Transaksi yang dibuat sudah cocok</label>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" id="submit_button" class="btn btn-facebook btn-block" disabled>PROSES</button>
                </div>
            </div>
    </form>
</div>
</div>
</div>

<script src="<?= base_url() ?>vendor/sbadmin2/jquery/jquery.min.js"></script>

<script>
    var last_tableid = 1;
    var current_tableid = 1;
    var current_rowid = 1;
    var total_row = 1; //kalo perlu, silahkan uncomment

    function create_input(type, name, id, required) {
        var result = document.createElement("INPUT");
        result.type = type;
        result.name = name;
        result.id = id;
        result.required = required;
        return result;
    }

    function create_input_disabled(type, name, id) {
        var result = document.createElement("INPUT");
        result.type = type;
        result.name = name;
        result.id = id;
        //result.readonly = readonly;
        return result;
    }

    function create_input2(name, id, required) {
        var result = document.createElement("INPUT");
        result.name = name;
        result.id = id;
        result.required = required;
        return result;
    }

    function create_action(id, onclick, value) {
        var result = document.createElement("A");
        var text = document.createTextNode(value);
        result.id = id;
        result.setAttribute('onclick', onclick);
        result.href = '#';
        result.appendChild(text);
        return result;
    }

    function tambahbaris() {
        current_rowid++;
        var tblbody = document.getElementById('tblbody');
        var elm_tr = document.createElement("TR");
        var elm_td1 = document.createElement("TD");
        var elm_td2 = document.createElement("TD");
        var elm_td3 = document.createElement("TD");
        var elm_td4 = document.createElement("TD");
        var elm_td5 = document.createElement("TD");
        elm_td1.appendChild(create_input_disabled('text', 'id_barang[]', 'id_barang_' + current_rowid));
        elm_td2.appendChild(create_input2('nama_barang[]', 'nama_barang_' + current_rowid, 'required'));
        elm_td3.appendChild(create_input('number', 'qty[]', 'qty_' + current_rowid, 'required'));
        elm_td4.appendChild(create_input_disabled('text', 'harga_satuan[]', 'harga_satuan_' + current_rowid));
        elm_td5.appendChild(create_input_disabled('text', 'sub_total[]', 'sub_total_' + current_rowid));
        elm_tr.id = 'tblrow_' + current_rowid;
        elm_tr.appendChild(elm_td1);
        elm_tr.appendChild(elm_td2);
        elm_tr.appendChild(elm_td3);
        elm_tr.appendChild(elm_td4);
        elm_tr.appendChild(elm_td5);
        tblbody.appendChild(elm_tr);

        document.getElementById('id_barang_' + current_rowid).className = "form-control name_list";
        document.getElementById('nama_barang_' + current_rowid).className = "form-control name_list";
        document.getElementById('qty_' + current_rowid).className = "form-control name_list";
        document.getElementById('harga_satuan_' + current_rowid).className = "form-control name_list";
        document.getElementById('sub_total_' + current_rowid).className = "form-control name_list";

        var id_barang = 'id_barang_' + current_rowid;
        var harga_satuan = 'harga_satuan_' + current_rowid;
        document.getElementById('nama_barang_' + current_rowid).setAttribute('list', 'nama_barang_dropdown');
        document.getElementById('nama_barang_' + current_rowid).setAttribute('autocomplete', 'off');
        document.getElementById('nama_barang_' + current_rowid).setAttribute("onchange", "autoFill(this.value, '" + id_barang + "' , '" + harga_satuan + "')");
        document.getElementById('sub_total_' + current_rowid).setAttribute("onchange", "get_total(this.value)");
        document.getElementById('id_barang_' + current_rowid).readOnly = true;
        document.getElementById('harga_satuan_' + current_rowid).readOnly = true;
        document.getElementById('sub_total_' + current_rowid).readOnly = true;

        // ini mau buat fungsi sum
        document.getElementById('qty_' + current_rowid).setAttribute("onkeyup", "sum('" + current_rowid + "')");
        document.getElementById('nama_barang_' + current_rowid).required;
        document.getElementById('qty_' + current_rowid).required;
    }

    function hapusbaris() {
        //kalo perlu, silahkan uncomment
        var tblrow = document.getElementById('tblrow_' + current_rowid);
        tblrow.remove();
        current_rowid--;
        // get_total()
    }

    function sum(current) {
        var a = $("#qty_" + current).val();
        var b = $("#harga_satuan_" + current).val();
        var c = a * b;
        $("#sub_total_" + current).val(c);
    }

    // masih error
    // function get_total() {
    //     var sub_total = document.getElementsByName('sub_total');
    //     var total = 0;
    //     console.log($sub_total.length);
    //     for (var i = 1; i < sub_total.length; i++) {
    //         if (sub_total[i].value != '') {
    //             console.log(sub_total[i].value);
    //             total += parseInt(sub_total[i].value);
    //         }
    //     }
    //     // console.log(total);
    //     document.getElementById('total_harga').value = total;
    // }

    function disabled_tombol(ceklis) {
        if (ceklis.checked) {
            document.getElementById('submit_button').disabled = false;
        } else {
            document.getElementById('submit_button').disabled = true;
        }
    }

    function autoFill(value, id_barang, harga_satuan) {
        var nama_barang = value;
        var id_barang = document.getElementById(id_barang);
        var harga_satuan = document.getElementById(harga_satuan);

        $.ajax({
            url: "<?php echo base_url(); ?>index.php/transaksi/get_data_barang",
            method: "POST",
            data: {
                nama_barang: nama_barang
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data != false) { // nama barang ditemukan
                    $.each(data, function(key, val) {
                        console.log(val.id_barang);
                        id_barang.value = val.id_barang;
                        harga_satuan.value = val.harga_satuan;
                    });
                } else {
                    console.log('Tidak ditemukan');
                    id_barang.value = '';
                    harga_satuan.value = '';
                }

            }
        });
    }

    // function autoFillPelanggan(value) {
    //     var nama_pelanggan = value;
    //     var id_pelanggan = document.getElementById("id_pelanggan");

    //     $.ajax({
    //         url: "<?php echo base_url(); ?>index.php/transaksi/get_data_pelanggan",
    //         method: "POST",
    //         data: {
    //             nama_pelanggan: nama_pelanggan
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);
    //             if (data != false) { // nim ditemukan
    //                 $.each(data, function(key, val) {
    //                     console.log(val.id_pelanggan);
    //                     id_pelanggan.value = parseInt(val.id_pelanggan);
    //                 });
    //             } else {
    //                 console.log('Tidak ditemukan');
    //                 id_pelanggan.value = '';
    //             }

    //         }
    //     });
    // }

    // $(document).ready(function() {
    //     var totalan = document.getElementsByName('sub_total');
    //     var total_biaya = document.getElementById('total_harga');

    //     setInterval(function() {
    //         console.log("tes");
    //         totalan.forEach((totalan) => {
    //             console.log(totalan.value);
    //             if (totalan.checked) {
    //                 alert(`You rated: ${totalan.value}`);

    //             }
    //         })
    //         for (var i = 0; i < totalan.length; i++) {
    //             console.log(totalan[i].value);
    //         }
    //     }, 1000);
    // });


    // function get_total(total) {
    //     // var total_biaya = document.getElementById('total_harga');
    //     // total_biaya.value = total_biaya.value + total;
    //     var a = total;
    //     console.log(a);
    // }
</script>



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