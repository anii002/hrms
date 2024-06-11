<!-- BEGIN FOOTER -->
<div class="page-footer">
   <div class="page-footer-inner">
    © Copyright 2020 <a href="http://www.infoigy.com/" target="_blank">Salgem Infoigy Tech Pvt Ltd.</a>All rights reserved.
   </div>
   <div class="scroll-to-top">
      <i class="icon-arrow-up"></i>
   </div>
</div>

<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

<script src="../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- <script src="../assets/admin/pages/scripts/table-advanced.js"></script> -->
<script src="../assets/other/plugins/datepicker/bootstrap-datepicker.js"></script>


<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>


<!-- datatables-->
<script src="../assets/other/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../assets/other/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../assets/other/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../assets/other/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../assets/other/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../assets/other/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../assets/other/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../assets/other/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../assets/other/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script src="../assets/other/plugins/jquery-datatable/jquery-datatable.js"></script>





<script>
jQuery(document).ready(function() {       
$(document).ready(function() {
  $(".select2").select2();
});
});
</script>
<script>
jQuery(document).ready(function() {       
//Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
//    TableAdvanced.init();
});
</script>
<script type="text/javascript">



$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );


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

</html>