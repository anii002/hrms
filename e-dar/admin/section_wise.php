<?php
$GLOBALS['flag'] = "1.6";
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
									<label class="control-label">Select Section Wise </label>

									<select name="section_wise[]" multiple id="section_wise" class="select2me form-control billunitindex" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option value="" selected disabled>--Select Section Wise --</option>
										<option value="0">All</option>
										<?php

										$query_emp = mysqli_query($db_edak,"SELECT * from tbl_section");

										while ($value_emp = mysqli_fetch_array($query_emp)) {
											echo "<option value='" . $value_emp['sec_id'] . "'>" . $value_emp['sec_name'] . "</option>";
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
						<i class="fa fa-book"></i>Section Wise Summary Report List
					</div>
				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="font-size: 15px">
										<th>Sr. No</th>
										<th>Unique DAK NO.</th>
										<th>Received From</th>
										<th>Dt of Letter</th>
										<th>Gist of Letter</th>
										<th>Marked To</th>
										<th>Date</th>
										<th>Status</th>
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
		var section_wise = $("#section_wise").val();
		var frm_date = $("#frm_date").val();
		var to_date = $("#to_date").val();
		alert(section_wise + "_" + frm_date + "_" + to_date);
		if (section_wise == null) {
			alert("Please select Fields For Report");
		} else {

			$.ajax({
				type: "post",
				url: "control/adminProcess.php",
				data: "action=section_report&section_wise=" + section_wise + "&frm_date=" + frm_date + "&to_date=" + to_date,
				success: function(data) {
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