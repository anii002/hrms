<?php
	$GLOBALS['flag']="1.4";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">

			
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-book"></i> Death Case Form 
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											<div class="form-body">
												<!-- <h3 class="form-section">Add User</h3> -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Number</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-digital-tachograph"></i>
															</span>
															<input type="text" class="form-control" id="empid" name="empid" placeholder="SUR/P/SAC/CA/UP" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" style="border-radius: 30px;" id="txtdob" placeholder="Date Of Birth" name="txtdob"  autofocus="true" required="required">
                      
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
													
													<!--/span-->
													
													<!--/span-->
												</div>
												<hr style='border:1px solid blue'>
											
											<h4>&emsp;Details of Ex. Employee:</h4>
											<hr>
													
													<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">PF Number </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pf_num" name="pf_num" placeholder="Enter PF Number " required>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Employee Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Employee Name" readonly>
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Designation </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="desig" name="desig" placeholder="Designation " readonly>
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Of Birth </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth " readonly>
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Of Appointment </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="doa" name="doa" placeholder="Date of Appointment " readonly>
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Of Med Decat & Retd </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control txtdob1" style="border-radius: 30px;" id="txtdoe" placeholder="Date Of Expiry" name="txtdoe"  autofocus="true" required="required">
															</div>
														</div>
													</div>

													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Rate of Pay </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ropay" name="ropay" placeholder="Rate of Pay " readonly>
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Service Rendered</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="service_rendered" name="service_rendered" placeholder="Service Rendered " readonly>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Service Left</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="service_left" name="service_left" placeholder="Service Left " readonly>
															</div>
														</div>
													</div>
													
													
													
													
													
													
													<!--/span-->
													
													
													
													<!--/span-->
												</div>
												<hr>
												<h4>&emsp;2)Composition of his Family:</h4>
													<button type='button' class='btn btn-primary pull-right'> Add Family Member</button>
													<br>
													<br>
													<br>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nominee Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Relation with Ex. Employee </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-users"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Age at the time of Death/MU/MD</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Education Qualification</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-university"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Wheather Employed/Otherwise </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
															</div>
														</div>
													</div>
													
												</div>

												<hr>
												<h4>&emsp;3)Particulars of Candidate:</h4>
													
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="applicant_name" name="applicant_name" placeholder="Name ">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date of Birth </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="applicant_dob" name="applicant_dob" placeholder="Date of Birth ">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Educational Qualification</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-university"></i>
															</span>
															<input type="text" class="form-control" id="education" name="education" placeholder="Enter Education " required>
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Age on Date</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-portrait"></i>
															</span>
															<input type="text" class="form-control" id="age" name="age" placeholder="Age Of Employee ">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Wheather SC/ST </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-portrait"></i>
															</span>
															<input type="text" class="form-control" id="sc_or_st" name="sc_or_st" placeholder="Enter SC/ST " required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Maritial Status </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="maritial_status" name="maritial_status" placeholder="Enter Maritial Status" required>
															</div>
														</div>
													</div>
													
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Aadhar Number </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="aadhar" name="aadhar" placeholder="Enter Aadhar number" required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">PAN Number</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pan" name="pan" placeholder="Enter PAN Number ">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Mobile Number</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-mobile-alt"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" >
															</div>
														</div>
													</div>
												</div>

												<hr>
												<h4>&emsp;4)Financial Position of Ex. Employee:</h4>
													
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Income from Family Pension </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="income_fp" name="income_fp" placeholder="Ente Family Pension " required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Expected Incomes From Business/Any other Members of the Family </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-users"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Income " required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Total Income</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="total_income" name="total_income" placeholder="Enter Total Income " required>
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Details of Immovable Property </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-percent"></i>
															</span>
															<input type="text" class="form-control" id="immovable_property" name="immovable_property" placeholder="Enter Details of Immovable Property " required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Whether Ex-Employee has his Own House or Not</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-clipboard-check"></i>
															</span>
															<select name="emp_house" id="emp_house" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																<option value="" selected disabled>Select Role</option>
																<option value="yes" >YES</option>
																<option value="no" >NO</option>
																  
															</select>
															</div>
														</div>
													</div>
													
												</div>

												<hr>
												<h4>&emsp;5)Details of Settlement dues paid are as Follows:</h4>
													
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Provident Fund</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="provident_fund" name="provident_fund" placeholder="Enter Provident Fund " required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">DCRG</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="dcrg" name="dcrg" placeholder="Enter DCRG" required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">NGIS Lumpsum</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ngis_lumps" name="ngis_lumps" placeholder="Enter Lumpsum" required>
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">NGIS Saving Fund </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ngis_saving_fund" name="ngis_saving_fund" placeholder="NGIS Saving Fund " required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Leave Salary</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="leave_sal" name="leave_sal" placeholder="Enter Leave Salary " required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Deposite Linked Insurance</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="deposit_ins" name="deposit_ins" placeholder="Enter Deposite Linked Insurance " required>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Family Pension</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="family_pension" name="family_pension" placeholder="Enter Family Pension " required>
															</div>
														</div>
													</div>
												</div>
											


											</div>

											
													
													
													
											<div class="form-actions right">
												<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
												<button type="button" class="btn default">Cancel</button>
												
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
			
	</div>
<?php
	include 'common/footer.php';
?>
<script>
  $(function() {
        
     $('#txtdob').datepicker({
      autoclose: true
    });
     $('#txtdoe').datepicker({
      autoclose: true
    });

 }); 
</script>
<script type="text/javascript">
  $('#DataTables_Table_22').DataTable( {
                    dom: 'Bfrtip',
                    "pageLength": 5,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
</script>