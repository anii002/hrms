<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
	echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');

?>
<script>
	// $(document).ready(function () {
	// $('#example').dataTable({
	// "bPaginate": false
	// });
	// });
	//----------------------------// Document Ready Function //----------------------------//
	$(document).ready(function() {
		ShowRecordsEmployee();
		$("#frmaddemployee").submit(function(event) {
			var formData = new FormData($(this)[0]);
			formData.append("Flag", $("#btnSave").val());
			$.ajax({
				url: "Ajaxemployee.php",
				type: 'POST',
				data: formData,
				async: false,
				success: function(data) {
					// alert(data);
					// ShowRecordsEmployee();
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
	}); ///ready fun close


	//----------------------------//Function ShowRecords User//----------------------------//
	function ShowRecordsEmployee() {
		$.post("Ajaxemployee.php", {
				Flag: "ShowRecordsEmployee"
			},
			function(data, success) {
				$("#divRecords").html(data);
				//var oTable = $('#tbl_employee').dataTable
				({
					"oLanguage": {
						"sSearch": "Search all columns:"
					},
					"aoColumnDefs": [{
							'bSortable': false,
							'aTargets': [0]
						} //disables sorting for column one
					],
					'iDisplayLength': 10,
					"sPaginationType": "full_numbers",

					// "sPaginationType": "none",
					"dom": 'T<"clear">lfrtip'
				});
			}
		);
	}

	$(document).ready(function() {
		$('#tbl_employee').DataTable({
			"paging": false,
			"ordering": false,
			"info": false
		});
	});
	//------------------End---------------------------//
</script>

<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -20px;">
	<!-- Content Header (Page header) --><br>
	<h2>Employee Management</h2>
	<section class="content-header">

		<br>
		<br>
		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->

		<div class="row">
			<div class="box box-info">

				<div class="box box-warning box-solid">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-list"></i> &nbsp;&nbsp; Employee List...</h3>
					</div>


					<div class="box-body">
						<span style="color:red;">NOTE&nbsp;::&nbsp;Click this button to add employee to existing group</span><br><br>
						<form method="post" id="frmaddemployee" action="AjaxReAssign.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
							<input type="submit" value="Add More Employees" name="submit" class="btn btn-primary btn-flat" /><br>
							<br><br>
							<div class="form-group">
								<div class="input-group col-md-6">
									<label> You are adding this employees to "<?php if (isset($_GET["grpname"])) {
																					echo $_GET["grpname"];
																				} ?>" group </label>
									<input type="hidden" value="<?php echo $_GET["gid"]; ?>" id="GRP" name="GRP" style='border:0px;'>
								</div>
							</div>

							<div class="table-responsive">
								<table class='table table-striped  table-hover' id='tbl_employee' style="font-size:10px;text-align:left;">
									<thead>
										<tr class='odd gradeX'>
											<th style='display:none;'> Employee Code</th>
											<th style=''></th>
											<th> PF No</th>
											<th> Name </th>
											<th> Design </th>
											<th> Pay Scale </th>
											<?php
											$sql = mysqli_query($conn,"SELECT * FROM year order by id desc limit 7");
											while ($rev = mysqli_fetch_array($sql)) {
											?>
												<th style="font-size:10px;"><?php echo $rev['years']; ?></th>
											<?php
											}
											?>
											<th> View</th>
										</tr>

									</thead>

									<tbody>
										<?php


										$sqlemployee = mysqli_query($conn,"select * from tbl_employee where emplcode not in(select empid from group_details)");
										while ($rwEmployee = mysqli_fetch_array($sqlemployee, MYSQLI_ASSOC)) {
											$empid = $rwEmployee["empid"];
											$year = $rwEmployee["year"];
											$emppf = $rwEmployee["emplcode"];
											$dept = $rwEmployee["dept"];
											$design = $rwEmployee["design"];
											$station = $rwEmployee["station"];
											$payscale = $rwEmployee["payscale"];
											$year = $rwEmployee["year"];
											$uploadfile = $rwEmployee["uploadfile"];
											$empname = $rwEmployee["empname"];

										?>
											<tr class="headings">
												<td style="display:none;" id="tdempid$empid"><?php echo $empid; ?></td>
												<td id="tdempid$empid"><input type="checkbox" name="check_list[]" value=<?php echo $emppf; ?> /></td>
												<td id="tdemppf$empid"><?php echo "<a href='frmshowemployee.php?emppf=" . $emppf . "'>$emppf</a> " ?></td>
												<td id="tddept$empid"><?php echo $empname; ?></td>
												<td id="tddesign$empid"><?php echo $design; ?></td>
												<td id="tdstation$empid"><?php echo $payscale; ?></td>
												<?php
												$i = 0;
												$sql = mysqli_query($conn,"SELECT * FROM year order by id desc limit 7");
												while ($rev = mysqli_fetch_array($sql)) {
													$sql_query = mysqli_query($conn,"select * from scanned_img where empid='" . $emppf . "' AND year='" . $rev['years'] . "'");
													$result = mysqli_fetch_array($sql_query);
													$demo_year = $rev['years'];

													if ($result['image'] != "") {
														$query = mysqli_query($conn,"select * from scanned_apr where empid='" . $emppf . "' AND year='" . $rev['years'] . "'");
														$rwQuery = mysqli_fetch_array($query);
														$Rtype = $rwQuery['reporttype'];
														if ($rwQuery['reporttype'] == 'APAR Report') {

												?>
															<td style="font-size:10px;"><input type="hidden" value="<?php echo $rwQuery['reporttype']; ?>"><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value=<?php echo $rev["years"]; ?>><label style="color:green;font-size:10px;">AV[AR]</label></td>
														<?php

														} else {
														?>
															<td><input type="hidden" value="<?php echo $rwQuery['reporttype']; ?>"><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value="<?php echo $rev["years"]; ?>"><label style="color:green;">AV[WR]</label></td>
														<?php
														}
													} else {
														$sqlreason = mysqli_query($conn,"select * from tbl_reason where  empcode='$emppf' AND financialyear='$demo_year'");
														$rwReason = mysqli_fetch_array($sqlreason);

														if (isset($rwReason["reasontype"]) != '') {
															echo "<td id='tduploadfile$empid'>" . $rwReason["reasontype"] . "</td>";
														} else {
															echo "<td id='tduploadfile$empid'>NA</td>";
														}

														?>
												<?php
													}
												}
												?>
												<td style="font-size:10px;width:3px;"><?php echo '<a href="frmviewemployee.php?emppf=' . $emppf . '"><i class="fa fa-eye"></i></a> ' ?></td>

											</tr>
										<?php
										}
										?>
									</tbody>

								</table>
							</div>

						</form>
					</div>
				</div>
			</div>


		</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

<script>
	function anchoonclick(click_id) {
		var empcode = document.getElementById("txtemppf").value;
		document.getElementById("te").innerHTML = click_id;
		alert(click_id.id);
		//return empcode;

	}
</script>
<?php
include_once('../global/footer.php');
include_once('../global/Modal_Member.php');
?>