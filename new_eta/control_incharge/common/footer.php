<!-- BEGIN FOOTER -->
<div class="page-footer">
   <div class="page-footer-inner">
       &copy; Copyright 2024 <a href="http://infoigy.com">Infoigy Tech Pvt. Ltd.</a> All rights
        reserved.
   </div>
   <div class="scroll-to-top">
      <i class="icon-arrow-up"></i>
   </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>


<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="../assets/global/plugins/js_glow/jquery.jgrowl.js"></script>

<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>

<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<!-- <script src="../assets/other/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- bootstrap datepicker -->
 
<!-- BEGIN PAGE LEVEL SCRIPTS -->


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>

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