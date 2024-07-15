</div>
</div>
<!-- footer content -->
<!--<footer>-->
<!--    <div class="clearfix"></div>-->
<!--</footer>-->
<!-- /footer content -->

<script type="text/javascript">
    // When the document is ready
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>
<!-- Select2 -->
<script src="select2/select2.full.min.js"></script>
<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="vendors/google-code-prettify/src/prettify.js"></script>

<!-- Custom Theme Scripts -->

<!-- Bootstrap -->

<!-- Datatables -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>

<script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- Bootstrap Colorpicker -->
<script src="vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- iCheck -->
<script src="vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="vendors/Flot/jquery.flot.js"></script>
<script src="vendors/Flot/jquery.flot.pie.js"></script>
<script src="vendors/Flot/jquery.flot.time.js"></script>
<script src="vendors/Flot/jquery.flot.stack.js"></script>
<script src="vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->

<script src="vendors/validator/validator.js"></script>
<script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Dropzone.js -->
<script src="vendors/dropzone/dist/min/dropzone.min.js"></script>

<!-- Ion.RangeSlider -->
<script src="vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

<!-- jquery.inputmask -->
<script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- jQuery Knob -->
<script src="vendors/jquery-knob/dist/jquery.knob.min.js"></script>


<!--Bootstrap Select Multiple Js-->
<script src="css/build/js/bootstrap-select.js"></script>
<script src="css/build/js/bootstrap-select.min.js"></script>


<!-- FullCalendar -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/fullcalendar/dist/fullcalendar.min.js"></script>


<link href='css/assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='css/assets/js/jquery-ui.min.js'></script>
<!-- Custom Theme Scripts-->
<script src="css/build/js/custom.min.js"></script>

<link rel="stylesheet" href="css/calendar/clndr.css">
<script src="css/calendar/underscore-min.js"></script>
<script src="vendors/moment/min/moment.min.js"></script>
<script src="common.js"></script>
<!-- <script src="css/calendar/clndr.js"></script> -->
<!-- <script src="css/calendar/demo.js"></script> -->

<footer>
    <div class="pull-right">
        © Copyright <?php echo date('Y'); ?> <a href="http://infoigy.com" target="_blank"> Salgem Infoigy Tech Pvt. Ltd. </a>All rights reserved.
    </div>
    <div class="clearfix"></div>
</footer>

<script type="text/javascript">
    function modu(modu_name) {
        $.ajax({
            url: '../../../../module.php',
            type: 'POST',
            data: {
                name: modu_name
            },
            success: function(data) {
                //console.log(data);
                $('#rad').html(data);
                $('#mod').html(modu_name.toUpperCase());
            }
        });
    }
</script>