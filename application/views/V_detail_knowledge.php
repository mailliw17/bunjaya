<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">History Data Mining</h1> -->
    <div class="" style="margin-bottom: 10px;">
        <a class="btn btn-primary btn-sm" type="button" href="<?= base_url('historydatmin') ?>"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Knowledge ID :</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <h5>Min Support: </h5>
                    <h5>Min Confidence: </h5>
                </div>
                <div class="col-sm">
                    <h5>Start Date: </h5>
                    <h5>End Date: </h5>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->


    <!-- Satu Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Hasil Analisis
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Knowledge</th>
                            <th>Akurasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- EOF Tabel -->

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->