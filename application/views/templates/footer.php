 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Bun Jaya Service - 2020</span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->
 </div>
 <!-- End of Content Wrapper -->
 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 Anda yakin untuk keluar dari sistem ?
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">
                     Batal
                 </button>
                 <a class="btn btn-primary" href="<?= base_url() ?>auth/logout">Keluar</a>
             </div>
         </div>
     </div>
 </div>

 <!-- Detail History Penjualan Modal -->
 <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Barang Belanja</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <span id="barang"></span>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">
                     Batal
                 </button>
                 <a class="btn btn-primary" href="#">Cetak Struk</a>
             </div>
         </div>
     </div>
 </div>


 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url() ?>vendor/sbadmin2/jquery/jquery.min.js"></script>
 <script src="<?= base_url() ?>vendor/sbadmin2/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>vendor/sbadmin2/bootstrap/js/bootstrap.min.js"></script>


 <!-- Core plugin JavaScript-->
 <script src="<?= base_url() ?>vendor/sbadmin2/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url() ?>js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url() ?>vendor/sbadmin2/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url() ?>vendor/sbadmin2/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script>
     $(document).ready(function() {
         $('.dataTable').DataTable();
     });
 </script>


 <!-- Datepicker -->
 <script src="<?= base_url() ?>vendor/datepicker/dist/js/bootstrap-datepicker.min.js"> </script>

 <script>
     $(function() {
         $(".datepicker").datepicker({
             format: 'dd-mm-yyyy',
             autoclose: true,
             todayHighlight: true,
         });
     });
 </script>

 <!-- Sweetalert -->
 <script src="<?= base_url() ?>vendor/sweetalert2/package/dist/sweetalert2.all.min.js"></script>

 </body>

 </html>