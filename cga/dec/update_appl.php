<?php
$GLOBALS['flag'] = "1.8";
include('common/header.php');
include('common/sidebar.php');
?>

<div class="page-content-wrapper">
	<div class="page-content">


		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-book"></i> Pending Application Form
				</div>

			</div>
			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				<form action="control/adminProcess.php?action=update_applicant" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
					<!-- <input type="hidden" id="curDate" value="<?php echo date('m/d/Y'); ?>"> -->
					<input type="hidden" id="curDate1" value="<?php echo date('d/m/Y') ?>">
					<input type="hidden" id="pid" name="pid" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" id="p_emp_pfno" name="p_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
					<input type="hidden" id="p_username" name="p_username" value="<?php echo $_GET['username']; ?>">

					<div class="form-body">
						<!-- <h3 class="form-section">Add User</h3> -->
						<div class="row">
							<?php
							$con = dbcon1();
							$sql = mysqli_query($con, "select * from applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' AND username='" . $_GET['username'] . "'");
							$res = mysqli_fetch_array($sql);

							?>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Ex-Employees (Parent) PF number</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="empid" name="empid" value="<?php echo $res['ex_emp_pfno']; ?>" readonly="">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Employee Name</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="empname" name="empname" value="<?php echo $res['ex_empname']; ?>" readonly>
									</div>
								</div>
							</div>

							<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Department </label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-envelope"></i>
										</span>
										<input type="text" class="form-control" id="department" name="department" value="<?php echo $res['ex_empdept']; ?>" readonly>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Designation </label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-envelope"></i>
										</span>
										<input type="text" class="form-control" id="design" name="design" value="<?php echo $res['ex_empdesig']; ?>" readonly>
									</div>
								</div>
							</div>
							<!--/span-->

							<!--/span-->
						</div>
						<hr style='border:1px solid blue'>

						<h4>&emsp;Applicant Details</h4>
						<hr>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Applicant Name </label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-envelope"></i>
										</span>
										<input type="text" class="form-control onlyText" id="appl_name" name="appl_name" value="<?php echo $res['applicant_name']; ?>">
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Date Of Birth </label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-envelope"></i>
										</span>
										<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo $res['applicant_dob']; ?>">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Gender</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-envelope"></i>
										</span>
										<!-- <input type="text" class="form-control" id="aapl_gender" name="aapl_gender" value="<?php //echo $res['applicant_gender']; 
																																?>" > -->
										<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											<option value="<?php echo $res['applicant_gender']; ?>"><?php echo getGender($res['applicant_gender']); ?></option>

											<?php
											$con = dbcon2();
											$query_emp = mysqli_query($con, "SELECT * from gender");

											while ($value_emp = mysqli_fetch_array($query_emp)) {
												echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['gender'] . "</option>";
											}

											?>

										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Mobile Number </label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-envelope"></i>
										</span>
										<input type="text" class="form-control onlyNumber" id="appl_mobile" name="appl_mobile" onchange="phonenumber(this)" value="<?php echo $res['applicant_mobno']; ?>" maxlength="10">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Category</label>


									<div class="input-group">
										<span class="input-group-addon">
											<i class="fas fa-envelope"></i>
										</span>
										<!-- <input type="text" class="form-control" id="appl_qualification" name="appl_qualification" value="<?php echo getcase($res['category']); ?>" readonly> -->
										<select name="category" id="category" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											<option value="<?php echo ($res['category']); ?>"><?php echo getcase($res['category']); ?></option>
											<?php
											$con = dbcon1();
											$query_emp = mysqli_query($con, "select * from category");

											while ($value_emp = mysqli_fetch_array($query_emp)) {
												echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['case_name'] . "</option>";
											}

											?>

										</select>
									</div>
								</div>
							</div>




						</div>



					</div>


					<div class="form-actions right">
						<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i>Update </button>
						<!-- <a class='btn blue btnn' data-toggle='modal' href='#basic'>Forward To </a> -->
						&nbsp;
						<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>

					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>


	</div>
</div>
<?php
include 'common/footer.php';
?>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=pending_fw_application" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Forward To </h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
					<input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>">
					<input type="text" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">

								<select name="fw_to_pfno" id="fw_to_pfno" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
									<option value="" selected disabled>Select Recruitment cell clerk</option>
									<?php

									$query_emp = mysqli_query($con, "SELECT emp_data.emp_name as name,login.pf_number as pf_number,login.* from login,emp_data where emp_data.pf_number=login.pf_number AND role='7' AND login.dept='" . $_SESSION['dept'] . "' ");

									while ($value_emp = mysqli_fetch_array($query_emp)) {
										echo "<option value='" . $value_emp['pf_number'] . "'>" . $value_emp['name'] . "</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

								<button type="submit" class="btn blue">Forward</button>

							</div>
						</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn blue">Save changes</button> -->
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
	$(function() {

		$('#fam_mem_dob_1').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true
		});
		$('#appl_dob').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true
		});

	});

	$(function() {

		$(".onlyText").on("input change paste", function() {

			var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');

			$(this).val(newVal);


		});



		$(document).on("input change paste", ".onlyNumber", function() {

			var newVal = $(this).val().replace(/[^0-9]*$/g, '');

			$(this).val(newVal);

		});
	});

	function phonenumber(inputtxt) {

		var phoneno = /^[6789]\d{9}$/;
		if ((inputtxt.value.match(phoneno))) {
			return true;
		} else {
			$("#appl_mobile").val("");
			$("#appl_mobile").focus();
			alert("Invalid Mobile number");

			return false;
		}
	}
	$("#appl_dob").on("change", function() {
		var dob = $("#curDate1").val();
		var doa = $("#appl_dob").val();
		// alert("curr "+dob);
		// alert("DOB "+doa);
		// $('#emp_doa').val(doa);
		var parts = dob.split("/");
		var s = new Date(parts[2], parts[1] - 1, parts[0]);
		var parts1 = doa.split("/");
		var s1 = new Date(parts1[2], parts1[1] - 1, parts1[0]);
		// alert(s);
		// alert(s1);
		if (s1 >= s) {
			alert('Please select valid Date of Birth');
			$("#appl_dob").val("");
			$("#appl_dob").focus();
		}
	});
</script>