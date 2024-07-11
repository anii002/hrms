<?php
$GLOBALS['flag'] = "2.2";
include('common/header.php');
include('common/sidebar.php');
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet box blue btnz">
			<div class="portlet-title">
				<div class="caption btnboom">
					<i class="fa fa-book"></i> Application Form
				</div>
			</div>

			<div class="portlet-body form">
				<form action="control/adminProcess.php?action=basic_details" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
					<input type="hidden" name="category" value="<?php echo $_GET['case']; ?>">
					<input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>">


					<div class="tabbable-line ">
						<ul class="nav nav-tabs btnboom">
							<li class="active">
								<a href="#tab_15_1" data-toggle="tab">
									DAK form report </a>
							</li>

							<li>
								<a href="#tab_15_2" data-toggle="tab">
									nomination note </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active h" id="tab_15_1">
								<div class="form-body">
									<!-- <h3 class="form-section">Add User</h3> -->
									<?php
									$con = dbcon2();
									$sql = mysqli_query($con, "SELECT * From drmpsurh_sur_railway.register_user where emp_no='" . $_GET['ex_emp_pfno'] . "'");
									$res = mysqli_fetch_array($sql);
									echo mysqli_error($con);

									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Ex-Employees (Parent) PF number</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas  fa-user"></i>
													</span>
													<input type="text" class="form-control" id="empid" name="empid" value="<?php echo $res['emp_no']; ?>" readonly="">
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
													<input type="text" class="form-control" id="empname" name="empname" value="<?php echo $res['name']; ?>" readonly="">
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
													<input type="text" class="form-control" id="department" name="department" value="<?php echo getdepartment($res['department']); ?>" readonly="">
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
													<input type="text" class="form-control" id="design" name="design" value="<?php echo designation($res['designation']); ?>" readonly="">
												</div>
											</div>
										</div>
										<!--/span-->

										<!--/span-->
									</div>
									<hr style='border:1px solid blue'>

									<h4>&emsp;Applicant Details</h4>
									<hr>
									<?php
									$con = dbcon1();
									$sql1 = mysqli_query($con, "SELECT * From drmpsurh_cga.applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
									$res1 = mysqli_fetch_array($sql1);
									//echo mysqli_error();

									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Applicant Name </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<input type="text" class="form-control" id="appl_name" name="appl_name" value="<?php echo $res1['applicant_name']; ?>" readonly="">
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
													<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo $res1['applicant_dob']; ?>" readonly="">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Gender</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo getgender($res1['applicant_gender']); ?>" readonly="">
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
													<input type="text" class="form-control" id="appl_mobile" name="appl_mobile" value="<?php echo $res1['applicant_mobno']; ?>" readonly="">
												</div>
											</div>
										</div>
									</div>

									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Category</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<input type="text" class="form-control" id="appl_mobile" name="appl_mobile" value="<?php echo getcase($res1['category']); ?>" readonly="">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">E-Mail </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<input type="email" class="form-control" id="appl_email" name="email" onchange="email_valid(this)">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">PAN No</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<input type="text" class="form-control" id="appl_pan" name="pan" style="text-transform: uppercase;" onchange="pannumber(this)" maxlength="10">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Aadhar No </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<input type="text" class="form-control" id="appl_aadhar" name="aadhar" onchange="adharnumber(this)" placeholder=" " maxlength="12">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Applicant Qualification </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<input type="text" class="form-control description" id="appl_qualification" name="qualification" maxlength="35" placeholder=" ">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">SC/ST/OBC/Other</label>

												<select name="appl_caste" id="appl_caste" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
													<option value="" selected disabled>Select Status</option>
													<option value="SC">SC</option>
													<option value="ST">ST</option>
													<option value="OBC">OBC</option>
													<option value="General(UR)">Genl.(UR)</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Upload Files<span style="color:red;">*</span> <small style="color:red;">documents(in pdf format) & images(in png or jpeg format)</small> </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<input type="file" multiple="multiple" class="form-control" id="file" name="file[]" accept="image/jpeg,image/png,application/pdf" required="">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>



							<div class="tab-pane h" id="tab_15_2">
								<div class="form-body">
									<!-- <h3 class="form-section">Add User</h3> -->
									<div class="row">

										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">P/Rect Dt:-</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas  fa-calendar-alt"></i>
													</span>
													<input type="text" class="form-control ddate" style="border-radius: 30px;" id="date" placeholder="Select Date" name="date">

												</div>
											</div>
										</div>

										<!--/span-->
									</div>
									<!--/row-->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Subject</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-pencil-alt"></i>
													</span>
													<textarea class="form-control" rows="3" name="subject"></textarea>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Ref</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-pencil-alt"></i>
													</span>
													<textarea class="form-control" rows="3" name="ref"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9">
											<div class="form-group">
												<label class="control-label"></label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-pencil-alt"></i>
													</span>
													<textarea class="form-control" rows="4" name="para1" required=""></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9">
											<div class="form-group">
												<label class="control-label"></label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-pencil-alt"></i>
													</span>
													<textarea class="form-control" rows="4" name="para2"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9">
											<div class="form-group">
												<label class="control-label"></label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-pencil-alt"></i>
													</span>
													<textarea class="form-control" rows="4" name="last_para" required=""></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="form-actions right">
								<button type="submit" class="btn blue submit_btn" id='submit_btn'><i class="fa fa-check"></i> Submit</button>&nbsp;
								<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
							</div>

						</div>
					</div>

				</form>
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

		$('#appl_dob').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true
		});

	});




	$(document).on('change', '#empid', function() {
		var pf_number = $("#empid").val();
		//alert(pf_number);
		var a = $("#username").val("APPL_" + pf_number);
	});



	document.getElementById("file").onchange = function() { // on selecting file(s)
		for (var file in this.files) { // loop over all files
			if (isNaN(file) === false) { // if it is actually a file and not any other property
				if (this.files[file].type !== "application/pdf" && this.files[file].type !== "image/jpeg" && this.files[file].type !== "image/png") { // if NOT PDF!!
					alert('Please select PDFs and img files only.');
					$("#file").val('');
					return false;
				}
			}
		}
		var oFile = document.getElementById("file").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
		for (var file in this.files) {
			if (isNaN(file) === false) {
				if (this.files[file].size > 2097152) // 2 mb for bytes.
				{
					alert("Please check selected any of the file size is greater 2mb!..  please select file under 2mb!");
					$("#file").val('');
					return;
				}

			}
		}
		// alert('Yay!! All selected files are in PDF format.');
		// return true;
	}

	$("#txtdob").on("change", function() {
		var dob = $("#curDate").val();
		var doa = $("#txtdob").val();
		// alert("curr "+dob);
		// alert("Appointment "+doa);
		// $('#emp_doa').val(doa);
		var parts = dob.split("/");
		var s = new Date(parts[2], parts[1] - 1, parts[0]);
		var parts1 = doa.split("/");
		var s1 = new Date(parts1[2], parts1[1] - 1, parts1[0]);
		// alert(s);
		// alert(s1);
		if (s1 >= s) {
			alert('Please select valid Date of Birth');
			$("#txtdob").val("");
			$("#txtdob").focus();
		}
	});


	function email_valid(inputtxt) {
		var phoneno = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if ((inputtxt.value.match(phoneno))) {
			return true;
		} else {
			alert("Enter Valid Email Address");
			// $("#email").val("");                  
			$("#appl_email").focus();
			return false;
		}
	}

	$(document).on("change", "#appl_name", function() {
		var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
		if (newVal == '') {
			$("#appl_name").focus();
			$(this).val(newVal);
			alert("Enter Alphabets only");
		}


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

	$(function() {

		$('.ddate').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy'
		});
		//     $('#txtdoe').datepicker({
		//      autoclose: true,
		//      format:'dd/mm/yyyy'
		//    });

	});

	function pannumber(inputtxt) {
		var phoneno = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
		if ((inputtxt.value.match(phoneno))) {
			return true;

		} else {
			alert("Please enter in proper format... ");
			$('#appl_pan').val("");
			$('#appl_pan').focus();
			return false;
		}
	}

	function adharnumber(inputtxt) {
		var phoneno = /^\d{12}$/;
		if ((inputtxt.value.match(phoneno))) {
			//$(".span_id7").text("");

			return true;
		} else {
			//$(".span_id7").text("Adhar Card number must be of 12 digits");
			alert("Adhar Card number must be of 12 digits");
			$("#appl_aadhar").val("");
			$("#appl_aadhar").focus();
			return false;
		}
	}


	$(document).on("input change paste", ".description", function() {

		var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');

		$(this).val(newVal);

	});
	$(document).on("click", ".submit_btn", function() {

		if (document.getElementById("file").files.length == '') {
			alert("Please select file....");
		}

	});
</script>