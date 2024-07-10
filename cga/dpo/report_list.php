<?php
$GLOBALS['flag'] = "2.7";
include('common/header.php');
include('common/sidebar.php');
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>Report
						</div>
						<div class="tools">
						</div>
					</div>

					<div class="portlet-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Choose Month</label>
									<select required name="month" id="month" class="form-control">
										<option value="" selected disabled>--SELECT MONTH--</option>
										<option value="01">January</option>
										<option value="02">February</option>
										<option value="03">March</option>
										<option value="04">April</option>
										<option value="05">May</option>
										<option value="06">June</option>
										<option value="07">July</option>
										<option value="08">August</option>
										<option value="09">September</option>
										<option value="10">Octomber</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Choose Year</label>
									<select required name="year" id="year" class="form-control">
										<option value="" selected disabled>--SELECT YEAR--</option>
										<?php
										$firstYear = (int)date('Y');
										$lastYear = $firstYear - 5;
										for ($i = $firstYear; $i >= $lastYear; $i--) {
											echo '<option value=' . $i . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-actions right">
							<button type="button" class="btn blue submit_btn"><i class="fa fa-check"></i> Show</button>&nbsp;
							<button type="button" class="btn default" onClick="window.location.reload();"> Clear</button>&nbsp;
							<!-- <button type="button" class="btn default" onclick="history.go(-1);">Cancel</button> -->

						</div>

					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>Report List
						</div>
						<div class="tools">
						</div>
					</div>

					<div class="portlet-body">
						<br>
						<div id="s">

						</div>
					</div>
				</div>
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
		</div>

	</div>

</div>
</div>
<?php
include 'common/footer.php';
?>

<script type="text/javascript">
	$('#DataTables_Table_22').DataTable({
		dom: 'Bfrtip',
		"pageLength": 5,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});



	$(document).on("click", ".submit_btn", function() {
		//var emp_id=$("#emp").val();
		var year = $("#year").val();
		var month = $("#month").val();

		// alert(emp_id+""+year+""+month);

		if (year == null || month == null) {
			alert("Please Choose Month & Year For Report");
		} else {

			$.ajax({
				type: "post",
				url: "control/adminProcess.php",
				data: "action=reports&year=" + year + "&month=" + month,
				success: function(data) {

					$("#s").html(data);
					$(".attend").show();
					$('#DataTables_Table_22').DataTable({
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