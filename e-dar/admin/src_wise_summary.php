<?php
$GLOBALS['flag'] = "1.5";
include('common/header.php');
// include('common/sidebar.php');
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
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Report
					</div>

				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<!-- <h3 class="form-section">Add User</h3> -->
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Select Source Wise Summary</label>

									<select name="src_wise[]" multiple id="src_wise" class="select2me form-control billunitindex" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option value="" selected disabled>--Select Source Wise Summary--</option>
										<option value="0">All</option>
										<?php

										$query_emp = mysqli_query($db_edak,"SELECT * from master_source", );

										while ($value_emp = mysqli_fetch_array($query_emp)) {
											echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['src_name'] . "</option>";
										}

										?>
									</select>

								</div>
							</div>
						</div>
						<div class="row">
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
						<button type="button" onclick="location.reload();" class="btn default">Clear</button>
					</div>
				</div>
			</div>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>Source Wise Summary Report List
					</div>
				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<div class="table-responsive">
							<table class="table table-striped" id="example1">
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
	<!-- END CONTENT -->
</div>
<?php
include('common/footer.php');
?>
<script>
	$(document).on("click", "#src_btn", function() {
		var src_wise = $("#src_wise").val();
		var frm_date = $("#frm_date").val();
		var to_date = $("#to_date").val();
		alert(src_wise + "_" + frm_date + "_" + to_date);
		if (src_wise == null) {
			alert("Please select Fields For Report");
		} else {

			$.ajax({
				type: "post",
				url: "control/adminProcess.php",
				data: "action=srcWiseSummaryReport&src_wise=" + src_wise + "&frm_date=" + frm_date + "&to_date=" + to_date,
				success: function(data) {
					console.log(data);
					var ddd = data;
					var arr = ddd.split('$');
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
</script>