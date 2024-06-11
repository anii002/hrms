<!-- BEGIN FOOTER -->
<div class="page-footer">
   <div class="page-footer-inner">
       2019 &copy; Salgem Infoigy Tech Pvt Ltd.
   </div>
   <div class="scroll-to-top">
      <i class="icon-arrow-up"></i>
   </div>
</div>

<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>


<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<!-- <script src="../assets/other/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- bootstrap datepicker -->
<script src="../assets/other/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>   
<script src="../assets/admin/pages/scripts/table-managed.js"></script>  
<!-- END PAGE LEVEL SCRIPTS -->
<script src="../assets/global/plugins/select2/select2.full.min.js"></script>
<script src="../assets/admin/pages/scripts/components-pickers.js"></script>

<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initCalendar(); // init index page's custom scripts
   Tasks.initDashboardWidget();
});

$(document).ready(function() {
  $(".select2").select2();
});
$(document).ready(function () {
    //Date picker
    $('.datepicker_1').datepicker({
      autoclose: true,
      format:'dd/mm/yyyy',
    });
  });

$(document).ready(function(){
  'use strict';
    $(window).on('load', function () {
        if ($(".pre-loader").length > 0)
        {
            $(".pre-loader").fadeOut(1500);
            // $(".pre-loader").fadeOut("slow");
        }
    });
});


$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});
</script>

<!-- END JAVASCRIPTS -->



<script type="text/javascript">
    var disabledTool = new Date();
    disabledTool.setDate(disabledTool.getDate() - 2);
    disabledTool.setHours(0, 0, 0, 0);
 
    $(function () {
        $("#datepicker").datepicker({
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });
    });
</script>

    <script type="text/javascript">
     function modu(modu_name)
        {
            $.ajax({
                url : '../../../../module.php',
                type : 'POST',
                data : {name:modu_name},
                success: function(data)
                {
                    //console.log(data);
                    $('#rad').html(data);
                    $('#mod').html(modu_name.toUpperCase());
                }
            });
        }
  </script>


</body>
<!-- END BODY -->
</html>