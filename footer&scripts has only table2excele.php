<footer class="main-footer">
    <strong>Copyright &copy; 2022-<script>document.write(new Date().getFullYear())</script>.</strong>
    <!-- All rights reserved. -->
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="../../plugins/jquery/jquery.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="../../plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="../../plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="../../plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.js"></script>
<!-- <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.css"> -->
<link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css">
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
 <script src="../../plugins/New Folder/DataTables/datatables.js?v=<?php echo time(); ?>"></script> 
 <!-- <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->
<!-- Table2Any  -->
<!-- <script src="../../plugins/table2any/tableExport.js"></script>
<script src="../../plugins/table2any/jquery.base64.js"></script>
<script src="../../plugins/table2any/jspdf/libs/sprintf.js"></script>
<script src="../../plugins/table2any/jspdf/jspdf.js"></script>
<script src="../../plugins/table2any/jspdf/libs/base64.js"></script> -->
  <!-- <script src="../../plugins/table2excel/table2excel.js"></script> -->

  <script src="../../plugins/tableToAny/xlsx.core.min.js"></script>
  <script src="../../plugins/tableToAny/FileSaver.js"></script>
  <script src="../../plugins/tableToAny/tableexport.js"></script>

 <!-- <script src="../../plugins/Новая Папка/mine/jquery.datatable.min.js"></script> 
 <script src="../../plugins/Новая Папка/mine/dataTables.searchPanes.min.js"></script> 
 <script src="../../plugins/Новая Папка/mine/dataTables.select.min.js"></script> 
 <script src="../../plugins/Новая Папка/mine/dataTables.searchBuilder.min.js"></script> 
 <script src="../../plugins/Новая Папка/mine/dataTables.dateTime.min.js"></script> 
 <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->


  <script>
    $(function () {

      // ----------Books-------------
      $('#example1').DataTable({
        "dom": "Qfrtip",
        "aLengthMenu": [[ 50, 100, 250, 500, -1], [ 50, 100, 250, 500, "Ählisi"]],
        "order": [[0, 'desc']],
        "scrollX": true,
      });

      //-------classes-----------
      $('#example6').DataTable({
        "aLengthMenu": [[ 10, 25, 50, 100, -1],[ 10, 25, 50, 100, "Ählisi"]],
      });

      // -----example4 search a book---------
      $('#example4').DataTable({
        "aLengthMenu": [[ 5, 10, 25, 50, 100, -1 ],[ 5, 10, 25, 50, 100, "Ählisi" ]],
        "info": false,
        "scrollX": true,
      });
      
      // -----borrowed books----------
      $('#example3').dataTable( {
        "dom": "Qfrtip",
        "scrollX": true,
        "order": [[0, 'desc']],
        "columnDefs": [
          { "visible": false, "targets": [5, 6, 7, 8, 11, 12, 13, 14, 15, 17, 18] }
        ],
      } );

      // -----returned books---------
      $('#example5').DataTable({
        "dom": "Qfrtip",
        "aLengthMenu": [[ 10, 25, 50, 100, -1],[ 10, 25, 50, 100, "Ählisi"]],
        "order": [[0, 'desc']],
        "scrollX": true,
      });

      // -----------People-------------
      $('#example2').DataTable({
        "dom": "Qfrtip",
        "paging": true,
        "order": [[4, 'asc']],
      });

      // -----------Removed Books-----------
      $('#example7').DataTable({
        "scrollX": true,
        "order": [[1, 'desc']],
      });

      // -----------Removed People-----------
      $('#example8').DataTable({
        // "scrollX": true,
        "order": [[1, 'desc']],
      });

      
    });
  </script> 

<script>

  if (document.getElementById('borrow_date'))    document.getElementById('borrow_date').valueAsDate = new Date();
  if (document.getElementById('return_date'))    document.getElementById('return_date').valueAsDate = new Date();
  $('.form-control').attr('required', 'required');
  
  // --------- Table2Any ----------

  $('#table2word').click (function() {
    TableExport(document.getElementById("example1"), {
      headers: true,                      // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
      footers: true,                      // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
      formats: ["xlsx"],    // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
      filename: "id",                     // (id, String), filename for the downloaded file, (default: 'id')
      bootstrap: true,                   // (Boolean), style buttons using bootstrap, (default: true)
      exportButtons: "true",                // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
      position: "top",                 // (top, bottom), position of the caption element relative to table, (default: 'bottom')
      ignoreRows: null,                   // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
      ignoreCols: [0, 1, 2, 3, 4],                   // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
      trimWhitespace: true,               // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
      RTL: false,                         // (Boolean), set direction of the worksheet to right-to-left (default: false)
      sheetname: "id"                     // (id, String), sheet name for the exported spreadsheet, (default: 'id')
    });
  });

</script>