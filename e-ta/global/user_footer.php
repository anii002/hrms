 <footer class="main-footer">
     <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.1
    </div>
    Design and Developed By <strong><a href="http://www.infoigy.com">SALGEM Infoigy Tech Pvt Ltd</a></strong>
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3.1.1 -->
<script src="../../plugins/jQuery/jquery-3.1.1.min.js"></script>
<!--  datatable  -->
<!-- DataTables -->
<!-- Bootstrap 3.3.7 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<!--script src="../../plugins/time/jquery.timepicker.min.js"></script--> <!--   New Code Comment        -->
<!--script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>


<!-- jQuery UI 1.11.4 -->

<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- Morris.js charts -->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script--><!--   New Code Comment        -->
<!--script src="../../plugins/morris/morris.min.js"></script--><!--   New Code Comment        -->
<!-- Sparkline -->
<!--script src="../../plugins/sparkline/jquery.sparkline.min.js"></script--><!--   New Code Comment        -->
<!-- jvectormap -->
<!--script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script><!--   New Code Comment        -->
<!--script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script--><!--   New Code Comment        -->
<!-- jQuery Knob Chart -->
<!--script src="../../plugins/knob/jquery.knob.js"></script--><!--   New Code Comment        -->
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!--script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script--><!--   New Code Comment        -->
<!-- Slimscroll -->
<!--script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script--><!--   New Code Comment        -->
<!-- FastClick -->
<!--script src="../../plugins/fastclick/fastclick.js"></script--><!--   New Code Comment        -->
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--script src="../../dist/js/pages/dashboard.js"></script--><!--   New Code Comment        -->
<!-- AdminLTE for demo purposes -->
<!--script src="../../dist/js/demo.js"></script--><!--   New Code Comment        -->
<!-- iCheck 1.0.1 -->
<!--script src="../../plugins/iCheck/icheck.min.js"></script--><!--   New Code Comment        -->
<!-- InputMask -->

<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>

$(document).ready(function() {
$('#example').DataTable();
 $(".select2").select2();
 $("[data-mask]").inputmask();
 //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
} );
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
