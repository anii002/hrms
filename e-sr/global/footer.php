<!-- /.content-wrapper -->
  <footer class="main-footer" id="footer">
    <strong>Copyright &copy; 2017-2018 <a href="http://www.infoigy.com" target="_blank">SALGEM Infoigy Tech Pvt Ltd</a>.</strong> All rights
    reserved.
  </footer>
 <?php
 ?>
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
 

<style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 5mm;  /* this affects the margin in the printer settings */
        }

        body 
        {
            background-color:#FFFFFF; 
            margin: 10px;  /* the margin on the content before printing */
       }
</style>
<script>		
function printContent(el)
		{
					var restorepage = document.body.innerHTML;
					var printcontent = document.getElementById(el).innerHTML;
					document.body.innerHTML = printcontent;
					$("h1").css("display","visible");
					$(".NoPrint").css("display","none");
					$("label").css("display","none");
					$(".pagination").css("display","none");
					$("div.dataTables_info").css("display","none");
					$("thead .sorting:after").css("display","none");
					$url="http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
					$url=str_replace('/questions','',$url);
					// echo $url;
					
					window.print();
					$url="http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
					$url=str_replace('/questions','',$url);
					// echo $url;
					$("h1").css("display","visible");
					$(".NoPrint").css("display","block");
					$("label").css("display","block");
					$(".pagination").css("display","block");
					$("div.dataTables_info").css("display","block");
					$("thead .sorting:after").css("display","block");
					document.body.innerHTML = restorepage;	
					
		}
</script>
<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<!--script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script-->

<!-- Bootstrap 3.3.6 -->
<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables -->
<!--script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script-->

<script src="../plugins/datatables/jquery.dataTables.js"></script>	
<script src="../plugins/datatables/dataTables.bootstrap.js"></script>
<script src="../plugins/datatables/js/dataTables.tableTools.js"></script>

<script>
//-------------hide pagging------------//
// $(document).ready(function() {
    // $('#example').DataTable( {
        // "paging":   false,
        // "ordering": false,
        // "info":     false
    // } );
// } );
//-------------hide pagging close------------//

// $(document).ready(function() {
// $('#example').DataTable( {
// dom: 'T<"clear">lfrtip',
// tableTools: {
        // "sSwfPath": "../plugins/dataTables/swf/copy_csv_xls.swf"
    // }
// } );

// } );



</script>

<script type="text/javascript">
function minmax(value, min, max) 
{
    if(parseInt(value) < min || isNaN(parseInt(value))) 
        return 0; 
    else if(parseInt(value) > max) 
        return 15; 
    else return value;
}
</script>
<!-- Select2 -->
<!--script src="../plugins/select2/select2.full.min.js"></script>
<script src="../plugins/select2/select2.js"></script-->
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../plugins/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../plugins/dist/js/demo.js"></script>
<!-- Page script -->
  <!-- jQuery UI 1.11.4 -->
<script src="../plugins/dist/js/jquery.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../plugins/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../plugins/dist/js/demo.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!--script src="../plugins/morris/morris.min.js"></script-->
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script>
  $(function () {
    //Initialize Select2 Elements
    // $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

	    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    });
	
		    //Date picker
    $('#txtdate').datepicker({
      autoclose: true
    });
	
	//Date picker
    $('#txtfromdates').datepicker({
      autoclose: true
    });
	
	//Date picker
    $('#txttodates').datepicker({
      autoclose: true
    });
	
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

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<script src="../plugins/jGrowl/jquery.jgrowl.js"></script>  
<script>
			// $(function() {
				// $('.tooltip').tooltip();	
				// $('.tooltip-left').tooltip({ placement: 'left' });	
				// $('.tooltip-right').tooltip({ placement: 'right' });	
				// $('.tooltip-top').tooltip({ placement: 'top' });	
				// $('.tooltip-bottom').tooltip({ placement: 'bottom' });
				// $('.popover-left').popover({placement: 'left', trigger: 'hover'});
				// $('.popover-right').popover({placement: 'right', trigger: 'hover'});
				// $('.popover-top').popover({placement: 'top', trigger: 'hover'});
				// $('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
				// $('.notification').click(function() {
					// var $id = $(this).attr('id');
					// switch($id) {
						// case 'notification-sticky':
							// $.jGrowl("Stick this!", { sticky: true });
						// break;
						// case 'notification-header':
							// $.jGrowl("A message with a header", { header: 'Important' });
						// break;
						// default:
							// $.jGrowl("Hello world!");
						// break;
					// }
				// });
			// });
		</script>
<link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
<!--<script src="select2/select2-tab-fix.js"> </script>-->

<script>
$(".select2").select2();
//biodata
$("#bio_religion").select2();
$("#bio_medi_cat").select2();
$("#bio_commu").select2();
$("#bio_grp").select2();
$("#bio_edu").select2();
//$("#bio_gender").select2();
//$("#bio_marriage_status").select2();
$("#edu_pri_info").select2();
 $("#state_code").select2();
$("#state_code_2").select2();
$("#pincode").select2();
$("#pincode_2").select2(); 
//medical
$("#medi_cat").select2();
$("#in_med_desig").select2();
//intial appointment
$("#app_dept").select2();
$("#app_desig").select2();
$("#app_level").select2();
$("#app_scale").select2();
$("#app_group").select2();
//pre 
$("#preapp_dept").select2();
$("#preapp_desig").select2();
$("#preapp_scale").select2();
$("#preapp_level").select2();
$("#preapp_group").select2();
//prft
$("#prtf_type").select2();
$("#prtf_ordertype").select2();
$("#prtf_dept").select2();
$("#prtf_desig").select2();
$("#prtf_scale").select2();
$("#prtf_group").select2();
$("#prtf_level").select2();
$("#prtf_carried").select2();
$("#prtf_billunit").select2();
$("#p_type").select2();


$("#chrg_stat").select2();
$("#incr_scale").select2();
$("#nomn_rel").select2();


//penalty
$("#incr_level").select2();
$("#award_award_by").select2();
$("#award_type_award").select2();
$("#nom_type").select2();
$("#nom_rel").select2();
$("#nom_status").select2();
//$("#fc_mem_rel").select2();
$("#fc_mem_gender").select2();
$("#adv_type").select2();
$("#pd_pro_type").select2();
$("#pd_item_name").select2();
$("#tr_training_status").select2();

/* $("#preapp_desig").select2();
$("#preapp_dept").select2();
$("#preapp_scale").select2();
$("#preapp_level").select2();
$("#preapp_group").select2();
$("#preapp_station").select2();
$("#preapp_depot").select2();
$("#preapp_bill_unit").select2();  */

// akshay select2 code of PRFT

$("#pm_ordertype").select2();
$("#pm_frm_dept").select2();
$("#pm_frm_desig").select2();
$("#pm_frm_scale").select2();
$("#pm_frm_level").select2();
$("#pm_frm_group").select2();
$("#pm_frm_ps_type_3").select2();

$("#pm_to_dept").select2();
$("#pm_to_desig").select2();
$("#pm_to_scale").select2();
$("#pm_to_level").select2();
$("#pm_to_group").select2();
$("#pm_to_ps_type_3").select2();


$("#dp_frm_dept").select2();
$("#dp_frm_desig").select2();
$("#dp_frm_ps_type_3").select2();
$("#dp_frm_group").select2();
$("#dp_frm_scale").select2();
$("#dp_frm_level").select2();


$("#rev_ordertype").select2();
$("#rev_frm_dept").select2();
$("#rev_frm_desig").select2();
$("#rev_frm_ps_type_3").select2();
$("#rev_frm_group").select2();
$("#rev_frm_level").select2();
$("#rev_frm_scale").select2();

$("#rev_to_ps_type_3").select2();
$("#rev_to_dept").select2();
$("#rev_to_desig").select2();
$("#rev_to_group").select2();

$("#tf_ps_type_3").select2();
$("#tf_dept").select2();
$("#tf_desig").select2();
$("#fx_dept").select2();
$("#fx_desig").select2();
$("#fx_ps_type_3").select2();
$("#fx_level").select2();
$("#fx_scale").select2();

$("#re_frm_dept").select2();
$("#re_frm_desig").select2();
$("#re_frm_ps_type_3").select2();
$("#re_frm_scale").select2();
$("#re_frm_group").select2();
$("#re_frm_level").select2();


//fixaction
$("#fx_ordertype").select2();
$("#fx_frm_dept").select2();
$("#fx_frm_desig").select2();
$("#fx_frm_ps_type_3").select2();
$("#fx_frm_level").select2();
$("#fx_frm_scale").select2();
$("#fx_frm_group").select2();


$("#fx_to_dept").select2();
$("#fx_to_desig").select2();
$("#fx_to_ps_type_3").select2();
$("#fx_to_level").select2();
$("#fx_to_scale").select2();
$("#fx_to_group").select2();

//transfer
// $("#tf_ordertype").select2();
// $("#tran_frm_dept").select2();
// $("#tran_frm_desig").select2();
// $("#tran_frm_ps_type_3").select2();
// $("#tran_frm_level").select2();
// $("#tran_frm_scale").select2();
// $("#tran_frm_group").select2();


// $("#tran_to_dept").select2();
// $("#tran_to_desig").select2();
// $("#tran_to_ps_type_3").select2();
// $("#tran_to_level").select2();
// $("#tran_to_scale").select2();
// $("#tran_to_group").select2();
     $('.calender_picker').datepicker({
			format:'dd-mm-yyyy',
			autoclose:true,
			forceParse:false
		}).inputmask('dd-mm-yyyy', {
            placeholder: 'dd-mm-yyyy',
            showMaskOnHover: true,
            showMaskOnFocus: true
        });
</script>
<!--JAVA SCRIPT CODE ALL  17-2-2018-->


<!--JAVA SCRIPT CODE ALL  17-2-2018-->


</body>
</html>
