 <footer class="main-footer">
    <!--div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div-->
    <strong>Copyright &copy; 2016-2017 Designed And Developed By ||<a href="http://www.infoigy.com" target="_blank">Infoigy Soft</a>.
	</footer>
	
	<script src="admin/assets/js/jquery.2.1.1.min.js"></script>


		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>


		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="assets/js/jquery.2.1.1.min.js"></script>

<script src="assets/jquery-1.9.1.min.js"></script>

<!--script src="plugins/jQuery/jquery-2.2.3.min.js"></script-->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/jGrowl/jquery.jgrowl.js"></script>

<script src="bootstrap/js/scripts.js"></script>
<script src="plugins/dataTables/jquery.dataTables.js"></script>	
<script src="plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="plugins/dataTables/js/dataTables.tableTools.js"></script>

<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>

<script>
// $(document).ready(function() {
// $('#example').DataTable( {
// dom: 'T<"clear">lfrtip',
// tableTools: {
        // "sSwfPath": "assets/dataTables/swf/copy_csv_xls.swf"
    // }
// } );

// } );
</script>
<script>

	  $(document).ready(function () {
            var table = $('#example').dataTable();
            var tableTools = new $.fn.dataTable.TableTools(table, {
                'aButtons': [
                    {
                        'sExtends': 'xls',
                        'sButtonText': 'Save to Excel',
                        'sFileName': 'Data.xls'
                    },
                  
                    {
                        'sExtends': 'pdf',
                        'bFooter': false
                    },
                    'copy',
                    'csv'
                ],
                'sSwfPath': 'assets/dataTables/swf/copy_csv_xls_pdf.swf'
            });
            $(tableTools.fnContainer()).insertBefore('#datatable_wrapper');
        });

</script>

<!-- daterangepicker -->

<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->

<!-- Slimscroll -->

<!-- FastClick -->
<!--script src="plugins/fastclick/fastclick.js"></script-->
<!-- AdminLTE App -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--script src="dist/js/pages/dashboard.js"></script-->
<!-- AdminLTE for demo purposes -->

</body>
</html>
