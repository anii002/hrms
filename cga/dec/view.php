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
					<input type="hidden" id="curDate" value="<?php echo date('m/d/Y'); ?>">
					<input type="hidden" id="pid" name="pid" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" id="p_emp_pfno" name="p_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
					<input type="hidden" id="p_username" name="p_username" value="<?php echo $_GET['username']; ?>">

					<div class="form-body">
						<!-- <h3 class="form-section">Add User</h3> -->
						<div class="row">
							<?php
							$con=dbcon1();
							$sql = mysqli_query($con,"select * from applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' AND username='" . $_GET['username'] . "'");
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
										<input type="text" class="form-control" id="appl_name" name="appl_name" value="<?php echo $res['applicant_name']; ?>" readonly>
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
										<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo $res['applicant_dob']; ?>" readonly>
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
										<input type="text" class="form-control" id="aapl_gender" name="aapl_gender" value="<?php echo getGender($res['applicant_gender']); ?>" readonly>

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
										<input type="text" class="form-control" id="appl_mobile" name="appl_mobile" value="<?php echo $res['applicant_mobno']; ?>" readonly>
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
										<input type="text" class="form-control" id="appl_qualification" name="appl_qualification" value="<?php echo getcase($res['category']); ?>" readonly>

									</div>
								</div>
							</div>
						</div>



					</div>






					<div class="form-actions right">
						<!-- <button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i>Update </button> -->
						<!-- <a class='btn blue btnn' data-toggle='modal' href='#basic'>Forward To </a> -->
						&nbsp;
						<button type="button" class="btn blue" onclick="history.go(-1);">Back</button>

					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>


	</div>
</div>
</div>
<?php
include 'common/footer.php';
?>



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
</script>