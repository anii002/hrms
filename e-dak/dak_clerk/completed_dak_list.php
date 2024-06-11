<?php
$GLOBALS['flag'] = "1.51";
include('common/header.php');
include('common/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER--> 
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Completed DAK List</a>
				</li>
			</ul>

		</div>
		<div class="row">
		    <div class="col-md-12">
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-book"></i>Completed List
    					</div> 
    				</div>
    				<div class="portlet-body form">
    					<div class="form-body">
    						<div class="row">
    							<div class="col-md-6">
    								<div class="form-group">
    									<label class="control-label">Select From Date</label>
    									<div class="input-group">
    										<span class="input-group-addon">
    											<i class="fas  fa-user"></i>
    										</span>
    										<input type="text" class="form-control txtrdfrom" id="r_date" name="r_date" autocomplete="off">
    									</div>
    								</div>
    							</div>
    							<div class="col-md-6">
    								<div class="form-group">
    									<label class="control-label">Select To Date</label>
    									<div class="input-group">
    										<span class="input-group-addon">
    											<i class="fas  fa-user"></i>
    										</span>
    										<input type="text" class="form-control txtrdfrom" id="r_date2" name="r_date2" autocomplete="off">
    									</div>
    								</div>
    							</div>
    						</div>
    						<button type="button" class="btn btn-info" id="btnc">Submit</button>
    					</div>
    				</div>
    			</div>
    			<div class="portlet box blue">
    				<div class="portlet-title">
    					<div class="caption">
    						<i class="fa fa-book"></i>Completed List
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
    						<div class="table-responsive" id="setTable">
    
    						</div>
    					</div>
    				</div>
    			</div>
			</div>
		</div>
		<!-- END DASHBOARD STATS -->
		<div class="clearfix">
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
include('common/footer.php');
?>
<script>
	$(function() {

		$('.txtrdfrom').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});

	});

	$(document).on("click", "#btnc", function() {
	    $(".pre-loader").show();
		var fdate = $("#r_date").val();
		var tdate = $("#r_date2").val();
		//alert(date);
		var date1 = new Date(fdate);
		var date2 = new Date(tdate);

		var date3 = new Date();
		//var date4 = date3.getMonth() + "-" + date3.getDay()+"-"+date3.getYear();
		var currentDate = new Date(date3);
		//console.log(currentDate);
		 if (fdate == '') {
			alert("Please select from date field in form..");
			$("#r_date").focus();
		} else if (tdate == '') {
			alert("Please select to date field in form..");
			$("#r_date2").focus();
		} else if (date1 > date2) {
			alert("From date should be less than to date");
			$("#r_date").val('').focus();
			return false;
		} else if (date1 > currentDate) {
			alert("From Date should be less than current date");
			$("#r_date").val('').focus();
			return false;
		} else if (date2 > currentDate) {
			alert("To Date should be less than current date");
			$("#r_date2").val('').focus();
			return false;
		}
		else {

			$.ajax({
				type: "post",
				url: "control/adminProcess.php",
				data: "action=completeList&fdate=" + fdate+"&tdate="+tdate,
				success: function(data) {
                        $(".pre-loader").hide();
					$("#setTable").html(data);

					$('#example1').DataTable({
						dom: 'Bfrtip',
						buttons: [
							'copy', 'csv', 'excel', 'pdf', 'print'
						]
					});
				}
			});
		}

	});
</script>