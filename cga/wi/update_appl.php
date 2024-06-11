<?php
	$GLOBALS['flag']="1.8";
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
														dbcon1();
														$sql=mysql_query("SELECT * from applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."' AND username='".$_GET['username']."'");
         												$res=mysql_fetch_array($sql);

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
															<input type="text" class="form-control" id="empname" name="empname" value="<?php echo $res['ex_empname']; ?>"  readonly>
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
															<input type="text" class="form-control" id="appl_name" name="appl_name" value="<?php echo $res['applicant_name']; ?>" >
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
															<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo $res['applicant_dob']; ?>" >
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
															<!-- <input type="text" class="form-control" id="aapl_gender" name="aapl_gender" value="<?php echo $res['applicant_gender']; ?>" > -->
															<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="<?php echo $res['applicant_gender']; ?>" ><?php echo $res['applicant_gender']; ?></option>

																	<?php	
																	dbcon1();
																	$query_emp =mysql_query("SELECT * from gender");

																	while($value_emp = mysql_fetch_array($query_emp))
																	{
																	echo "<option value='".$value_emp['short_code']."'>".$value_emp['gender']."</option>";
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
															<input type="text" class="form-control" id="appl_mobile" name="appl_mobile" value="<?php echo $res['applicant_mobno']; ?>" >
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
															<input type="email" class="form-control" id="appl_email" name="appl_email" value="<?php echo $res['applicant_emailid']; ?>" >
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">PAN No</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_pan" name="appl_pan" value="<?php echo $res['applicant_panno']; ?>"  >
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
															<input type="text" class="form-control" id="appl_aadhar" name="appl_aadhar" value="<?php echo $res['applicant_aadharno']; ?>" >
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Applicant Qualification </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_qualification" name="appl_qualification" value="<?php echo $res['applicant_qualifiaction']; ?>" >
															</div>
														</div>
													</div>
													
													
													
		
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Maritial Status</label>
															
																<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span><!-- 
															<input type="text" class="form-control" id="appl_mstatus" name="appl_mstatus" value="<?php echo $res['mariatial_status']; ?>" >
															</div> -->
															<select name="appl_mstatus" id="appl_mstatus" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="<?php echo $res['mariatial_status']; ?>" ><?php echo getMaritailStatus($res['mariatial_status']); ?></option>
																	  <?php
																	  	dbcon1();
																		 $query_emp =mysql_query("SELECT * from marital_status");
																		
																		 while($value_emp = mysql_fetch_array($query_emp))
																		 {
																		  echo "<option value='".$value_emp['code']."'>".$value_emp['shortdesc']."</option>";
																		}
																	  
																	  ?>
																</select>
														</div>
													</div>
													
												</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Relation With Ex Empolyee </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<!-- <input type="text"  class="form-control" id="relation" name="relation" value="<?php echo $res['relation_with']; ?>" readonly> -->
															<select name="relation" id="relation" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="<?php echo $res['relation_with']; ?>" ><?php echo $res['relation_with']; ?></option>
																	<?php
																	dbcon1();
																	$query_emp =mysql_query("SELECT * from relation");

																	while($value_emp = mysql_fetch_array($query_emp))
																	{
																	echo "<option value='".$value_emp['code']."'>".$value_emp['longdesc']."</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="">
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">caste </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<!-- <input type="text"  class="form-control" id="caste" name="caste" value="<?php echo $res['caste']; ?>" > -->
															<select name="caste" id="caste" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="<?php echo $res['caste']; ?>" ><?php echo $res['caste']; ?></option>
																	<option value="sc">SC</option>  
																	<option value="st">ST</option>  
																	<option value="obc">OBC</option>  
																	<option value="other">OTHER</option>  
																</select>
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
																	<option value="<?php echo ($res['category']); ?>" ><?php echo getcase($res['category']); ?></option>
																	 <?php
																	 	dbcon1();
																		 $query_emp =mysql_query("SELECT * from category");
																		
																		 while($value_emp = mysql_fetch_array($query_emp))
																		 {
																		  echo "<option value='".$value_emp['id']."'>".$value_emp['case_name']."</option>";
																		}
																	  
																	  ?>
																	  
																</select>
															</div>
														</div>
													</div>
													</div>
													<!-- <div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Username </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text"  class="form-control" id="username" name="username" value="<?php echo $res['username']; ?>" >
															</div>
														</div>
													</div> -->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Documents </label><br>
															
															<?php 
															dbcon1();
																$query_emp = "SELECT * from upload_doc where ex_emp_pfno='".$_GET['ex_emp_pfno']."'";
																$result_emp = mysql_query($query_emp);
																$sr=0;
																while($value_emp = mysql_fetch_array($result_emp))
																{
																	$sr++;
																	echo "<a href='../uploadFiles/".$_GET['ex_emp_pfno']."/".$value_emp['file_path']."' target='_blank'>".$value_emp['file_path']."</a>&nbsp&nbsp&nbsp";
																	//echo"<input type='file'  class='form-control' id='file_$sr' name='file_$sr' >";
													
																}

															?>
															<input type="hidden" name="sr" value="<?php echo $sr;?>">
														</div>
													</div>	
													
													
												</div>
												<hr>
												<?php
													dbcon1();
														$sql1=mysql_query("SELECT * from emp_family_tbl where ex_emp_pfno='".$_GET['ex_emp_pfno']."' ");
														$sr=0;
         												while($res1=mysql_fetch_array($sql1))
         												{
         													$sr++;
													 ?>
															<input type="hidden" name="emp_fly_id_<?php echo $sr;?>" value="<?php echo $res1['id'];?>">	
												<div class='row'>
														<h4>&emsp;Family Member <?php echo $sr; ?></h4>
													<div class="col-md-6">
													
														<div class="form-group">
															<label class="control-label">Member Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_name_<?php echo $sr;?>" name="fam_mem_name_<?php echo $sr;?>" value="<?php echo $res1['member_name']; ?>" >
															</div>
														</div>
													</div>
												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Mobile No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_mobno_<?php echo $sr;?>" name="fam_mem_mobno_<?php echo $sr;?>" value="<?php echo $res1['member_mobileno']; ?>" >
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Pan No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_panno_<?php echo $sr;?>" name="fam_mem_panno_<?php echo $sr;?>" value="<?php echo $res1['member_panno']; ?>" >
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Aadhar No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_aadharno_<?php echo $sr;?>" name="fam_mem_aadharno_<?php echo $sr;?>" value="<?php echo $res1['member_aadharno']; ?>" >
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Relation </label>
												<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<!-- <input type="text" class="form-control dtpicker" id="fam_mem_dob_1" name="fam_mem_dob_1" value="<?php echo $res1['member_relation']; ?>" > -->
															<select name="fam_mem_rel_<?php echo $sr;?>" id="fam_mem_rel_<?php echo $sr;?>" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="<?php echo $res1['member_relation']; ?>"><?php echo getRelation($res1['member_relation']); ?></option>
																	<?php
																	dbcon1();
																	$query_emp =mysql_query("SELECT * from relation");

																	while($value_emp = mysql_fetch_array($query_emp))
																	{
																	echo "<option value='".$value_emp['code']."'>".$value_emp['longdesc']."</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member DOB</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control dtpicker" id="fam_mem_dob_<?php echo $sr;?>" name="fam_mem_dob_<?php echo $sr;?>" value="<?php echo $res1['member_dob']; ?>" >
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Qualifiaction</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control dtpicker" id="fam_mem_qualif_<?php echo $sr;?>" name="fam_mem_qualif_<?php echo $sr;?>" value="<?php echo $res1['member_qualifiaction']; ?>" >
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Employed or Otherwise</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control dtpicker" id="fam_mem_employedorother_<?php echo $sr;?>" name="fam_mem_employedorother_<?php echo $sr;?>" value="<?php echo $res1['employed_or_other']; ?>" >
															</div>
														</div>
													</div>


																							
												</div>

												<?php } ?>
												<input type="hidden" name="cnt" value="<?php echo $sr;?>">
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
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>" >
					 <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>">
					 <input type="text" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>">

					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
									<select name="fw_to_pfno" id="fw_to_pfno" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option value="" selected disabled>Select Recruitment cell clerk</option>
										  <?php
											 dbcon1();
											 $query_emp =mysql_query("SELECT name as name,login.pf_number as pf_number,login.* from drmpsurh_cga.login,drmpsurh_sur_railway.resgister_user where resgister_user.emp_no=login.pf_number AND role='7' AND login.dept='".$_SESSION['dept']."' ");
											 					
											 while($value_emp = mysql_fetch_array($query_emp))
											 {
											  	echo "<option value='".$value_emp['pf_number']."'>".$value_emp['name']."</option>";
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
     	format:'dd/mm/yyyy',
      autoclose: true
    });
     $('#appl_dob').datepicker({
     	format:'dd/mm/yyyy',
      autoclose: true
    });

 }); 
</script>