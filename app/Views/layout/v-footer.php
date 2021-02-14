</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1
    </div>
    <strong>&copy; 2021 Manajemen Pengajuan Surat Pengantar RW 16 Sariwangi .</strong>
</footer>

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>/resources/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/resources/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/resources/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- table2excel -->
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script> 
<!-- table2excel -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script> 
<script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script> 
<script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js"></script> 
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/resources/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/resources/dist/js/demo.js"></script>
<!-- page script -->
<script>
    // table
    $(function () {
        $.fn.dataTable.moment('DD/MM/YY');
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            // "columnDefs" : [{"targets":3, "type":"date-euro"}],
            "order": [[ 4, "asc" ]],
        });
        $('#tableVerAcc').DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[ 0, "asc" ]],
        });
    });

    $("#exportbutton").click(function(){
        $("#example1").table2excel({
        // exclude CSS class
            exclude:".excludeData",
            name:"Worksheet Name",
            filename:"SomeFile",//do not include extension
            fileext:".xlsx" // file extension
        });
    });


</script>
</body>
</html>