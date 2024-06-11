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
										<form action="control/adminProcess.php?action=applicant_add" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											 <input type="hidden" id="curDate" value="<?php echo date('m/d/Y'); ?>">
											 <input type="hidden" id="pid" name="pid" value="<?php echo $_GET['id']; ?>">
											 <input type="hidden" id="p_emp_pfno" name="p_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
											 <input type="hidden" id="p_username" name="p_username" value="<?php echo $_GET['username']; ?>">

											<div class="form-body">
												<!-- <h3 class="form-section">Add User</h3> -->
												<div class="row">
													<?php

														$sql=mysql_query("SELECT * from drmpsurh_cga.applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."' AND username='".$_GET['username']."'");
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
															<input type="text" class="form-control" id="empname" name="empname" value="<?php echo $res['ex_empname']; ?>" readonly >
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
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Gender</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo getGender($res['applicant_gender']); ?>" readonly>
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
												<!-- <button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> </button> -->
												<?php
										//$query_emp =mysql_query("SELECT  * from forward_application where ex_emp_pfno='".$_GET['ex_emp_pfno']."'  ");
										//$m=mysql_fetch_array($query_emp);
										//if($m['return_status']==0 && $m['hold_status']==1)
										//{
										//		echo "<a class='btn blue btnn' data-toggle='modal' href='#basic'>Forward To </a>";
											//}?>
											<a class='btn blue btnn' data-toggle='modal' href='#basic'>Forward To </a>
												&nbsp;
												<button type="button" class="btn default">Cancel</button>
												
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
			<form action="control/adminProcess.php?action=forward_application" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Forward To </h4>
				</div>
				<div class="modal-body">
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>" >
					 <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>">
					 <input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>">

					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
									<select name="fw_to_pfno" id="fw_to_pfno" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option value="" selected disabled>Select Recruitment Cell</option>
										  <?php
											 dbcon2();
											 dbcon1();
											 $query_emp =mysql_query("SELECT resgister_user.name as name,login.pf_number as pf_number,drmpsurh_cga.login.* from drmpsurh_cga.login,drmpsurh_sur_railway.resgister_user where resgister_user.emp_no=login.pf_number AND role='7'  ");
											 					
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