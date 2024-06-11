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
											<i class="fa fa-book"></i> Medical Decategorized Case Form 
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="control/adminProcess.php?action=medicalCase" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											<div class="form-body">
												<input type="hidden" name="category" value="<?php echo $_GET['case']; ?>">
												<input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>">
												<!-- <h3 class="form-section">Add User</h3> -->
												<div class="row">
													<?php //echo $_GET['id']; ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Number</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-digital-tachograph"></i>
															</span>
															<input type="text" class="form-control" id="sr_no" name="sr_no" placeholder="SUR/P/SAC/CA/UP" required>
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
															<input type="text" class="form-control" style="border-radius: 30px;" id="md_app_d" placeholder="Select Date" name="md_app_d"  required="required">
                      
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
															<input type="text" class="form-control" id="pf_num" name="pf_num" value="<?php echo $res['empno']; ?>" readonly="">
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
															<label class="control-label">Designation and Station </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="desig" name="desig" value="<?php echo designation($res['desigcode'])."  (".$res['stationcode'].")"; ?>" readonly>
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
															<label class="control-label">Date Of normal Retirement </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control " style="border-radius: 30px;" id="date_of_nr" value="<?php echo $res['retirementdate']; ?>"  name="date_of_nr" value=""  readonly="">
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Of Medically decategorized<b style="color: red;">*</b> </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control " style="border-radius: 30px;" id="date_of_md" placeholder="Date Of Medically decategorized" name="date_of_md"  required="required">
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Of Voluntary Retirement <b style="color: red;">*</b></label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control " style="border-radius: 30px;" id="date_of_vr" placeholder="Date Of Voluntary Retirement" name="date_of_vr"  required="required">
															</div>
														</div>
													</div>

													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Scale & Basic Pay </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="s_b_pay" name="s_b_pay" value="<?php echo $res['payrate'];  echo "(".getScaleCode($res['scalecode']).")"; ?>" placeholder="Scale & Basic Pay " readonly>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>

												<hr>
												<h4>&emsp;2)Details of the Candidate:</h4>
													<?php 
														$sql=mysql_query("SELECT * from applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
														$result=mysql_fetch_array($sql);
														$a_date=substr($result['created_at'],0,10);
													?>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date of Application </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="applicant_doa" name="applicant_doa" value="<?php echo $a_date;?>" readonly>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Name of candidate </label>
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
															<label class="control-label">Relation with the Employee </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-users"></i>
															</span>
															<input type="text" class="form-control" id="relation" name="relation" value="<?php echo $result['applicant_name']; ?>" readonly>
															</div>
														</div>
													</div>
													
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">SC/ST/OBC/UR</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-university"></i>
															</span>
															<input type="text" class="form-control" id="caste" name="caste" value="<?php echo $result['caste']; ?>" readonly>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date of Birth</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="ap_dob" name="ap_dob" value="<?php echo $result['applicant_dob']; ?>" readonly>
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
															<input type="text" class="form-control" id="education_qualification" name="education_qualification" value="<?php echo $result['applicant_qualifiaction']; ?>" readonly>
															</div>
														</div>
													</div>
													
													
												</div>
												<div class='row'>
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
												<h4>&emsp;3)Details of All the Members of Family:</h4>
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
															<input type="text" class="form-control" id="nominee_name" name="nominee_name" value="<?php echo $row['member_name']; ?>" readonly>
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
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['member_relation']; ?>" readonly>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Date of Birth</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" style="border-radius: 30px;" value="<?php echo $row['member_dob']; ?>" readonly>
                      
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
															<input type="text" class="form-control" id="maritial_status" name="maritial_status" placeholder=" " readonly>
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
        
     $('#md_app_d').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy',
    });
    //  $('#date_of_nr').datepicker({
    //   autoclose: true
    // });
     $('#date_of_md').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
    });
     $('#date_of_vr').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
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