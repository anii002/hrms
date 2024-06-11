<?php
$GLOBALS['flag'] = "1.5";
include('common/header.php');
include('common/sidebar.php');

?>


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">

		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Summary Report</a>
				</li>
			</ul>
		</div>

		<div class="row">
		    <div class="col-md-12">
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-book"></i> Report
    					</div> 
    				</div>
    				<div class="portlet-body form">
    					<div class="form-body">
    					    <form>
    						<!-- <h3 class="form-section">Add User</h3> -->
    						<div class="row">
    							<div class="col-md-4">
    								<div class="form-group">
    									<label class="control-label">Select Source Wise Summary</label> 
    									<select name="src_wise[]" multiple id="src_wise" class="select2me form-control billunitindex" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
    										<option value="" selected disabled>--Select Source Wise Summary--</option>
    										<option value="0">All</option>
    										<?php
    
    										$query_emp = mysql_query("SELECT * from master_source", $db_edak);
    
    										while ($value_emp = mysql_fetch_array($query_emp)) {
    											echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['src_name'] . "</option>";
    										}
    
    										?>
    									</select> 
    								</div>
    							</div>
    							<div class="col-md-4">
    								<div class="form-group">
    									<label class="control-label">From Date</label> 
    									<input type="text" class="form-control datePick" id="frm_date" name="frm_date" placeholder="Select From Date " required required autocomplete="off">
    								</div>
    							</div>
    							<div class="col-md-4">
    								<div class="form-group">
    									<label class="control-label">To Date</label> 
    									<input type="text" class="form-control datePick" id="to_date" name="to_date" placeholder="Select To Date" required autocomplete="off">
    									<span style="color:red" id="warning"></span> 
    								</div>
    							</div>
    						</div> 
    						<button type="button" id="src_btn" class="btn btn-info">submit</button>
    						<button type="reset" class="btn default clear">Clear</button>
    						</form>
    					</div>
    				</div>
    			</div>
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-book"></i>Source Wise Summary Report List
    					</div>
    				</div>
    				<div class="pre-loader preloader-single shadow-inner mg-t-30">
            			<div class="ts_preloading_box">
            				<div id="ts-preloader-absolute30">
            					<div id="absolute30">
            						<span></span><span></span><span></span><span></span><span></span>
            					</div>
            				</div>
            			</div>
            		</div>
    				<div class="portlet-body form">
    					<div class="form-body">
    						<div class="table-responsive">
    							<table class="table table-striped table-bordered" id="example1">
    								<thead>
    									<tr style="font-size: 15px">
    										<th>Sr. No</th>
    										<th>Source</th>
    										<th>Total DAK</th>
    										<th>Action Taken</th>
    										<th>Pending</th>
    										<th>Performance in %</th>
    									</tr>
    								</thead>
    								<tbody id="rpt_body">
    
    								</tbody>
    							</table>
    
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- END DASHBOARD STATS -->
    			<div class="clearfix">
    			</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<?php
include('common/footer.php');
?>
<script>
	$(document).on("click", "#src_btn", function() {
	    $(".pre-loader").show();
		var src_wise = $("#src_wise").val();
		var frm_date = $("#frm_date").val();
		var to_date = $("#to_date").val();
		//alert(src_wise + "_" + frm_date + "_" + to_date);

		var objFromDate = document.getElementById("frm_date").value;
		var objToDate = document.getElementById("to_date").value;

		var date1 = new Date(objFromDate);
		var date2 = new Date(objToDate);

		var date3 = new Date();
		//var date4 = date3.getMonth() + "-" + date3.getDay()+"-"+date3.getYear();
		var currentDate = new Date(date3);
		//console.log(currentDate);
		if (src_wise == "") {
			alert("Please select the Source wise summary field in form..");
			$("#src_wise").focus();
		} else if (frm_date == '') {
			alert("Please select from date field in form..");
			$("#frm_date").focus();
		} else if (to_date == '') {
			alert("Please select to date field in form..");
			$("#to_date").focus();
		} else if (date1 > date2) {
			alert("From date should be less than to date");
			$("#frm_date").val('').focus();
			return false;
		} else if (date1 > currentDate) {
			alert("From Date should be less than current date");
			$("#frm_date").val('').focus();
			return false;
		} else if (date2 > currentDate) {
			alert("To Date should be less than current date");
			$("#to_date").val('').focus();
			return false;
		} else {

			$.ajax({
				type: "post",
				url: "../admin/control/adminProcess.php",
				data: "action=srcWiseSummaryReport&src_wise=" + src_wise + "&frm_date=" + frm_date + "&to_date=" + to_date,
				success: function(data) {
				// 	console.log(data);
					var ddd = data;
					var arr = ddd.split('$');
					$(".pre-loader").hide();
					$('#example1').DataTable().destroy();
					$("#rpt_body").html(data);
					$('#example1').DataTable({
						dom: 'Bfrtip',
						buttons: [
							'copyHtml5',
							'excelHtml5',
							'csvHtml5',
							'pdfHtml5'
						],
						"ordering": false
					});
				}
			});
		}
	});



	$(function() {

		$('.datePick').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});

	});


	$(document).on("input change paste", ".datePick", function() {

		var newVal = $(this).val().replace(/[^0-9]*$/g, '');

		$(this).val(newVal);

	});
	
	$(function(){
    $(".clear").click(function(){
        $("#src_wise").select2('val', 'All');
    });
});
</script>