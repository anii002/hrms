<?php
$GLOBALS['flag'] = "1.4";
include('common/header.php');
include('common/sidebar.php');
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-book"></i> Applicant Registration Form
						</div>
					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="control/adminProcess.php?action=applicant_add" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
							<!-- <input type="hidden" id="curDate" value="<?php echo date('m/d/Y') ?>"> -->
							<input type="hidden" id="curDate1" value="<?php echo date('d/m/Y') ?>">
							<div class="form-body">
								<!-- <h3 class="form-section">Add User</h3> -->
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Ex-Employees (Parent) PF number</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fas  fa-user"></i>
												</span>
												<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter PF Number" required>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Employee Name</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fas  fa-user"></i>
												</span>
												<input type="text" class="form-control" id="empname" name="empname" placeholder="Name Of Employee">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Department </label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fas fa-envelope"></i>
												</span>
												<input type="text" class="form-control" id="department" name="department" placeholder=" ">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Designation </label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fas fa-envelope"></i>
												</span>
												<input type="text" class="form-control" id="design" name="design" placeholder=" ">
											</div>
										</div>
									</div>
								</div>
								<!--/row-->

								<hr>
								<h4>&emsp;Applicant Details</h4>
								<hr>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Applicant Name </label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fas fa-envelope"></i>
												</span>
												<input type="text" class="form-control onlyText" id="appl_name" name="appl_name" maxlength="25" placeholder=" ">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Date Of Birth </label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fas fa-envelope"></i>
												</span>
												<input type="text" class="form-control txtdob" id="appl_dob" name="aapl_dob" placeholder=" ">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Gender</label>
											<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
												<option value="" selected disabled>Select Gender </option>
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
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Mobile Number </label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fas fa-phone"></i>
												</span>
												<input type="text" class="form-control onlyNumber" id="appl_mobile" name="appl_mobile" onchange="phonenumber(this)" maxlength="10">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Category</label>
											<select name="category" id="category" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
												<option value="" selected disabled>Select Category</option>
												<?php
												$con = dbcon1();
												$query_emp = mysqli_query($con, "SELECT * from category");

												while ($value_emp = mysqli_fetch_array($query_emp)) {
													echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['case_name'] . "</option>";
												}

												?>
											</select>
										</div>
									</div>
								</div>

								<input type="hidden" id="username" name="username" value="">
							</div>
							<div class="form-actions right">
								<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
								<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
							</div>
						</form>
						<!-- END FORM-->
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>Registered User List
						</div>
						<div class="tools">
						</div>
					</div>
					<div class="portlet-body">
						<table class="table table-bordered table-hover" id="example1">
							<thead>
								<tr>
									<th>SR No</th>
									<th>Ex. Employee PFno</th>
									<th>Ex. Employee Name</th>
									<th>Applicant Name</th>
									<th>Category</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$con = dbcon1();
								$query_emp = "SELECT * FROM drmpsurh_cga.applicant_registration where added_by='" . $_SESSION['unitid'] . "' order by id desc";
								$result_emp = mysqli_query($con,$query_emp);
								$sr = 1;
								while ($value_emp = mysqli_fetch_array($result_emp)) {
									$id = $value_emp['id'];
									echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_emp['ex_emp_pfno'] . "</td>
								<td>" . $value_emp['ex_empname'] . "</td>
								<td>" . $value_emp['applicant_name'] . "</td>
								<td>" . getcase($value_emp['category']) . "</td>
								<td>";

									if ($value_emp['fw_status'] != 1) {
										echo "<button value='" . $id . "' id='" . $value_emp['ex_emp_pfno'] . "'  class='btn btn-danger remove'>Remove</button>&nbsp;<a href='update_appl.php?id=" . $id . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "' class='btn btn blue'>Update</a>";
									}


									echo "<a href='view.php?id=" . $id . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "' class='btn btn blue'>View </a></td>";

									echo "</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
		</div>

	</div>
</div>
<?php
include 'common/footer.php';
?>
<script>
	$(document).on("change", "#empid", function() {
		var value = $('#empid').val();
		//alert(value);
		$.ajax({
				url: 'control/adminProcess.php',
				type: 'POST',
				data: {
					action: 'fetch_employee_details',
					id: value
				},
			})
			.done(function(html) {
				//alert(html);
				var data = JSON.parse(html);

				if (html == 1) {
					alert("already registered in Applicant Register list")
					$('#empid').focus().val('');
				} else if (data.pf_number == null) {
					alert("Not Found PF number.....")
					$('#empid').focus().val('');
				} else {
					$("#empid").val(data.pf_number);
					$("#empname").val(data.emp_name);
					$("#design").val(data.designation);
					$("#department").val(data.department);
				}

			});

	});
</script>
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


	$(document).on("click", ".remove", function() {
		var value = $(this).attr("value");
		var pf = $(this).attr("id");
		//alert(value);

		$.ajax({
			url: 'control/adminProcess.php',
			type: 'POST',
			data: "action=removeApplicant&id=" + value + "&pf=" + pf,
			success: function(data) {
				//alert(data);
				if (data == 1) {
					alert("Applicant Removed Succeessfully");
					window.location = "registration.php";
				}
				//     	
				else {
					alert("Failed");
				}
			}


		});
	});

	$(document).on('change', '#empid', function() {
		var pf_number = $("#empid").val();
		//alert(pf_number);
		$("#username").val(pf_number);
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