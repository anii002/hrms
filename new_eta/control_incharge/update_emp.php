<?php
$GLOBALS['flag'] = "4.9";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">कर्मचारी का विवरण अपडेट करें / Update the Employee Details</a>
				</li>
			</ul>

		</div>
		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption col-md-6">
					<b>कर्मचारी का विवरण अपडेट करें / Update the Employee Details</b>
				</div>
				<div class="caption col-md-6 text-right backbtn">
					<a href="#."></a>
				</div>
			</div>
			<div class="portlet-body form">

				<form method="POST">
					<div class="form-body add-train">
						<div class="row add-train-title">
							<div class="col-md-12">
								<div class="form-group">
									<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
									<div class="portlet-body">
										<div class="table-scrollable summary-table">
											<table id="example1" class="table table-hover table-bordered display">
												<thead>
													<tr class="warning">
														<th>अनु क्रमांक / ID</th>
														<th>कर्मचारी आईडी / Empid</th>
														<th>नाम / Name</th>
														<th>मोबाइल / Mobile</th>
														<th>कार्रवाई / Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													// echo $dep=getdepartment($_SESSION['deptmt']);
													$dep = $_SESSION['dept'];
													$query_main = "SELECT DISTINCT(pfno) FROM employees_update WHERE dept='" . $dep . "' AND isupdated='1' AND CI_PF='" . $_SESSION['empid'] . "' ORDER BY id desc";
													$result_main = mysqli_query($conn,$query_main);

													while ($rows = mysqli_fetch_array($result_main)) {
														//  echo "SELECT `id`,`pfno`, `name`, `desig`,`station`, `mobile`, `email`,`dept`, `depot_id`,`status` FROM `employees_update` WHERE pfno='".$rows['pfno']."' AND isupdated='1' ORDER BY id desc limit 1";
														$result_emp = mysqli_query($conn,"SELECT `id`,`pfno`, `name`, `desig`,`station`, `mobile`, `email`,`dept`, `depot_id`,`status` FROM `employees_update` WHERE pfno='" . $rows['pfno'] . "' AND isupdated='1' ORDER BY id desc limit 1");
														echo mysqli_error($conn);
														$sr = 1;
														while ($value_emp = mysqli_fetch_array($result_emp)) {
															echo "
								                  <tr>
								                  <td>" . $sr++ . "</td>
								                    <td>" . $value_emp['pfno'] . "</td>
								                    <td>" . $value_emp['name'] . "</td>
								                    <td>" . $value_emp['mobile'] . "</td>				                    
								                    <td><a href='update_emp_approve.php?empid=" . $value_emp['pfno'] . "&id=" . $value_emp['id'] . " ' id='" . $value_emp['id'] . "' value='" . $value_emp['pfno'] . "' class='btn blue' case='view'>Show</a>";

															echo "</td></tr>
								                ";
														}
													}
													?>
												</tbody>
											</table>
										</div>
										<div class="text-right">
											<!-- <button class="btn yellow">Print</button> -->
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</form>

			</div>
		</div>

	</div>
</div>

<div id="responsive" class="modal fade modal-scroll modalemployeedata" tabindex="-1" data-replace="true">
	<div class="modal-header btn-orange-moon">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Employee Data : <span id="name1" name="name1"></span> </h4>
	</div>
	<form action="control/adminProcess.php?action=updateEmpData" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
		<div class="modal-body">
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<input type="hidden" id="txtpfno" name="txtpfno">
				<input type="hidden" id="id" name="id">
				<input type="hidden" id="designation_id" name="designation_id">
				<input type="hidden" id="station_id" name="station_id">
				<input type="hidden" id="dept_id" name="dept_id">
				<input type="hidden" id="depot_id1" name="depot_id1">
				<div class="form-body">
					<!-- <h3 class="form-section">Add User</h3> -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">बिल युनिट / Bill Unit</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="billunit" name="billunit" />
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">पैन नं / PAN No.</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="panno" name="panno" />
									</span>
								</div>
							</div>
						</div>

					</div>
					<!--/row-->
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">नाम / Name</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="name" name="name" />
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">पदनाम / Designation</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="designation" name="designation" />
									</span>
								</div>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">स्टेशन / Station</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="station" name="station" />
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">मोबाइल / Mobile</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="mobile" name="mobile" />
									</span>
								</div>
							</div>
						</div>

					</div>
					<!--/row-->
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">ई -मेल / E-Mail</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="email" name="email" />
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">वर्ग / Category</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="catg" name="catg" />
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">विभाग / Department</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="dept" name="dept" />
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">डिपो / Depot</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="depot" name="depot" />
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">मूल वेतन / Basic Pay</label>
								<div class="input-group">
									<span>
										<input class="modal_data" id="bp" name="bp" />
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">ग्रेड पे / Grade Pay</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="gp" name="gp" />
									</span>
								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">जन्म तारीख / Birth Date</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="bdate" name="bdate" />
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">नियुक्ति / Appointment Date</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="apdate" name="apdate" />
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">स्तर / Level</label>
								<div class="input-group">
									<span>
										<input class="modal_data" type="text" readonly id="level" name="level" />
									</span>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!--/row-->

			</div>
		</div>
		<div class="modal-footer">
			<!-- <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> -->
			<button type="submit" class="btn blue">Approve</button>
		</div>
	</form>
</div>


<?php
include 'common/footer.php';
?>


<!-- <div class="modal-scrollable" style="z-index: 10051;"> -->
<!-- <div> -->

<!-- </div> -->

<script>
	$(document).on("click", ".btn_action", function() {
		var value = $(this).attr('id');
		// alert(value);
		$.ajax({
				url: 'control/adminProcess.php',
				type: 'POST',
				data: {
					action: 'fetchEmployeeUpdated',
					id: value
				},
			})
			.done(function(html) {
				//   alert(html);
				var data = JSON.parse(html);
				$("#id").val(data.id);
				$("#txtpfno").val(data.pfno);
				$("#billunit").val(data.billunit);
				$("#panno").val(data.panno);
				$("#name").val(data.empname);
				$("#name1").text(data.empname);
				$("#designation_id").val(data.designation_id);
				$("#designation").val(data.designation);
				$("#station_id").val(data.station_id);
				$("#station").val(data.station);
				$("#mobile").val(data.mobile);
				$("#email").val(data.email);
				$("#catg").val(data.catg);
				$("#dept_id").val(data.dept_id);
				$("#dept").val(data.dept);
				$("#depot_id1").val(data.depot_id1);
				$("#depot").val(data.depot_id);
				$("#bp").val(data.bp);
				$("#gp").val(data.gp);
				$("#bdate").val(data.bdate);
				$("#apdate").val(data.apdate);
				$("#level").val(data.level);
			});

	});
</script>