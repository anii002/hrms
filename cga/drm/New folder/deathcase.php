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
										<form action="control/adminProcess.php?action=deathData_ins" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											<input type="hidden" name="category" value="<?php echo $_GET['case']; ?>">
												<input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>">
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
															<input type="text" autofocus="true" class="form-control" id="sr_no" style="text-transform: uppercase;" name="sr_no" placeholder="SUR/P/SAC/CA/UP" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">P/S A Cell Dtd:-</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" style="border-radius: 30px;" id="date" placeholder="Select Date" name="date"   required="required">
                      
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
											
											<h4>&emsp;1)Details of Ex. Employee:</h4>
											<hr>
													<?php

														$sql=mysql_query("select * from prmaemp where empno='".$_GET['ex_emp_pfno']."' ");
         												$res=mysql_fetch_array($sql);

													 ?>
													<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">PF Number </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pf_num" name="pf_num" value="<?php echo $res['empno']; ?>" readonly>
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
															<input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php echo $res['empname']; ?>" readonly>
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
															<input type="text" class="form-control" id="desig" name="desig" value="<?php echo designation($res['desigcode']);?>" readonly>
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
															<input type="text" class="form-control" id="dob" name="dob" value="<?php echo $res['birthdate']; ?>" readonly>
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
															<input type="text" class="form-control" id="doa" name="doa" value="<?php echo $res['rlyjoindate']; ?>" readonly>
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Of Expiry<b style="color: red;">*</b> </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control " style="border-radius: 30px;" id="txtdoe" placeholder="Select Date"  name="txtdoe"  autofocus="true" required="required">
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
															<input type="text" class="form-control" id="ropay" name="ropay" value="<?php echo $res['payrate'];?>" readonly>
															</div>
														</div>
													</div>
													
													
													
													
													
													
													
													
													<!--/span-->
													
													
													
													<!--/span-->
												</div>
												<hr>
												<h4>&emsp;2)Composition of his Family:</h4>
												<?php
														$sql=mysql_query("SELECT * from emp_family_tbl where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$sr=0;
														while ($row=mysql_fetch_array($sql)) {
															$sr++;
													?>
													<?php echo $sr.")"; ?>
													
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nominee Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['member_name']; ?>" readonly>
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
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo getRelation($row['member_relation']); ?>" readonly>
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
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['member_dob']; ?>" readonly>
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
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['member_qualifiaction']; ?>" readonly>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Maritial Status </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="maritial_status" name="maritial_status" value="<?php echo getMaritailStatus($row['marital_status']); ?>" readonly>
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
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['employed_or_other']; ?>" readonly>
															</div>
														</div>
													</div>
													
												</div>
											<?php }?>
												<hr>
												<h4>&emsp;3)Particulars of Applicant:</h4>
													<?php 
														$sql=mysql_query("SELECT str_to_date(applicant_dob,'%d/%m/%Y')as dob,str_to_date(created_at,'%d-%m-%Y')as cre,applicant_registration.* from applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
														$result=mysql_fetch_array($sql);
														$a_date=substr($result['created_at'],0,10);

														// Declare and define two dates 
														$date1 = strtotime($result['dob']);  
														$date2 = strtotime($result['cre']);  

														// Formulate the Difference between two dates 
														$diff = abs($date2 - $date1);  
														// To get the year divide the resultant date into 
														// total seconds in a year (365*60*60*24) 
														$years = floor($diff / (365*60*60*24));  


														// To get the month, subtract it with years and 
														// divide the resultant date into 
														// total seconds in a month (30*60*60*24) 
														$months = floor(($diff - $years * 365*60*60*24) 
														/ (30*60*60*24));  


														// To get the day, subtract it with years and  
														// months and divide the resultant date into 
														// total seconds in a days (60*60*24) 
														$days = floor(($diff - $years * 365*60*60*24 -  
														$months*30*60*60*24)/ (60*60*24));
														// printf("%d years, %d months, %d days", $years, $months, 
														// $days);
														
													?>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php echo $result['applicant_name']; ?>" readonly>
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
															<input type="text" class="form-control" id="applicant_dob" name="applicant_dob" value="<?php echo $result['applicant_dob']; ?>" readonly>
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
															<input type="text" class="form-control" id="education" name="education" value="<?php echo $result['applicant_qualifiaction']; ?>" readonly>
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
															<input type="text" class="form-control" id="age" name="age" value="<?php printf("%d years, %d months, %d days", $years, $months, 
														$days); ?>" readonly>
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
															<input type="text" class="form-control" id="sc_or_st" name="sc_or_st" value="<?php echo $result['caste']; ?>" readonly>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Maritial Status</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="maritial_status" name="maritial_status" value="<?php echo getMaritailStatus($result['mariatial_status']); ?>" readonly>
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
															<input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $result['applicant_aadharno']; ?>" readonly>
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
															<input type="text" class="form-control" id="pan" name="pan" value="<?php echo $result['applicant_panno']; ?>" readonly>
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
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $result['applicant_mobno']; ?>" readonly >
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Category for which eligible<b style="color: red;">*</b> </label>
															<div class="input-group">
															<span class="input-group-addon">
															 <i class="fas fa-id-card"></i>
															</span>
															
															<select name="eligible" id="eligible" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																<option value="" selected disabled>Select Eligible Category</option>
																<option value="1">Group A</option>								
																<option value="2">Group B</option>								
																<option value="3">Group C</option>								
																<option value="4">Group D</option>												
															</select>
															</div>
														</div>
													</div>
												</div>

												<hr>
												<h4>&emsp;4)Financial Position of Ex. Employee:</h4>
													
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Income from Family Pension <b style="color: red;">*</b></label>
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
															<label class="control-label">Expected Incomes From Business/Any other Members of the Family <b style="color: red;">*</b></label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-users"></i>
															</span>
															<input type="text" class="form-control" id="expected_income" name="expected_income" placeholder="Enter Income " required>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Total Income<b style="color: red;">*</b></label>
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
															<label class="control-label">Details of Immovable Property <b style="color: red;">*</b></label>
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
															<label class="control-label">Whether Ex-Employee has his Own House or Not<b style="color: red;">*</b></label>
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
															<label class="control-label">Provident Fund <b style="color: red;">*</b></label>
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
															<label class="control-label">DCRG<b style="color: red;">*</b></label>
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
															<label class="control-label">NGIS Lumpsum<b style="color: red;">*</b></label>
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
															<label class="control-label">NGIS Saving Fund<b style="color: red;">*</b> </label>
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
															<label class="control-label">Leave Salary<b style="color: red;">*</b></label>
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
															<label class="control-label">Deposite Linked Insurance<b style="color: red;">*</b></label>
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
															<label class="control-label">Family Pension<b style="color: red;">*</b></label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="family_pension" name="family_pension" placeholder="Enter Family Pension " required>
															</div>
														</div>
													</div>
												</div>
												
												<h4>&nbsp;&nbsp;06)<b style="color: red;">*</b></h4>
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<textarea name="six" rows="5" class="form-control" required="">In this case the ex. employee expired on 21/02/2006 leaving behind widow Smt. Laxmi one minor son & one minor Dtr. only.Smt. Laxmi W/o ex employee was not interested to take up job in Rlys hence she had requestsed to register her son Depak name for Appt. on CG after his attaining age of majority vide her application dtd 22/07/2017.Page-15. Her request was considered & as per orders on Office Note on NP Page-2-1. She was advised to submit Application for her son Deepak Appt. after his attaining age of majority. Page-31.   </textarea>
														</div>
													</div>
												</div>
												<h4>&nbsp;&nbsp;07)<b style="color: red;">*</b></h4>
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<textarea name="seven" rows="5" class="form-control" required="">Now Smt laxmi vide her application dtd 22/02/2007 is requesting for Appt on CG to her son Mr. Deepak in Gr C Category as he has now attained age of Majority, Page-43. Accordingly case was processed & present status of Ex Empolyee missing was obtained from Police Authorities dtd 20/01/2018 has obtained Page-73. Pass Port Authorities also certified that the name of ex employee has not been issued Pass Port. Page-66.</textarea>
														</div>
													</div>
												</div>
												<h4>&nbsp;&nbsp;08)<b style="color: red;">*</b></h4>
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<textarea name="eight" class="form-control" rows="5" required="">Report submitted by S&WI at Page-61---51 & 74 may kindly be perused.</textarea>
														</div>
													</div>
												</div>
												<h4>&nbsp;&nbsp;09)<b style="color: red;">*</b></h4>
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<textarea name="nine" rows="5" class="form-control" required="">Name of candidate is appearing in the Pass/PTO & settlement Papers of ex empolyee at Page-14 & 02 resp. </textarea>
														</div>
													</div>
												</div>
												<h4>&nbsp;&nbsp;10)<b style="color: red;">*</b></h4>
												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<textarea name="ten" rows="5" class="form-control" required="">His educational qualication ie SSC  & HSC, has been verified by S & WI & school Authorities at page 50,49,48,47 resp.</textarea>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<textarea name="last_common" rows="5" class="form-control" required="">In view of the above if agreed to smt Laxmi request for Appointment on CG to her son Mr. Deepak in Gr C Category will be considered & be called for Screening to adjudge his Suitability for posting in Gr C Category. </textarea>
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
        
     $('#date').datepicker({
      autoclose: true,
      format:'dd/mm/yyyy'
    });
     $('#txtdoe').datepicker({
      autoclose: true,
      format:'dd/mm/yyyy'
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