<?php
	$GLOBALS['flag']="4.96";
	include('common/header.php');
	include('common/sidebar.php');
	include("control/function.php");
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> View Application Details</a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<!-- <div class="caption">
						<i class="fa fa-book"></i> View Application Details
					</div> -->
					<div class="caption col-md-6 col-xs-6">
								View Application Details
							</div>
							<div class="caption col-md-6 text-right backbtn">
								<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
							</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?php
					dbcon3();
					$query = mysql_query("SELECT * FROM add_application WHERE application_id = '".$_GET['application_id']."'");
					$row = mysql_fetch_array($query);
					dbcon2();
  					$query1 = mysql_query("SELECT * FROM register_user WHERE emp_no = '".$row['pfno']."'");
  					$result = mysql_fetch_array($query1);
					?>
					<form action="control/adminProcess.php?action=forward_cos" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<input type="hidden" name="application_id" value="<?php echo $_GET['application_id'];?>">
							<input type="hidden" name="user" value="<?php echo $_SESSION['user'];?>">

										<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">कर्मचारी आईडी / PFNO</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-user-circle"></i>
										</span>
										<input type="text" class="form-control" id="empid" name="empid" placeholder="PF Number" value="<?php echo $result['emp_no'];?>" required autofocus="true" readonly="">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">नाम / Name</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="empname" name="empname" placeholder="Employee Name" readonly="" value="<?php echo $result['name'];?>">
										</div>
									</div>
								</div>
								
								<!--/span-->
							<!--/row-->
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">मोबाइल / Mobile</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-phone"></i>
										</span>
										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Employee Mobile number" readonly="" value="<?php echo $result['mobile'];?>">
										</div>
									</div>
								</div>
								<!--/span-->
								<!-- <div class="col-md-3">
									<div class="form-group">
										<label class="control-label">ई -मेल / E-Mail</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" readonly="" value="<?php echo $result['emp_email'];?>">
										</div>
									</div>
								</div> -->
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">पदनाम / Designation</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-user-graduate"></i>
										</span>
										<input type="text" id="design" name="design" placeholder="Employee Designation" class="form-control" readonly="" value="<?php echo designation($result['designation']);?>">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">विभाग / Department</label>
			                    	<input type="text" id="dept" name="dept" class="form-control" placeholder="Employee Department" readonly="" value="<?php echo getdepartment($result['department']);?>">
									</div>
								</div>
							<!--/row-->
							<!--/row-->	
								<!-- <div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Aadhar Number</label>
										<input type="text" id="aadhar" name="aadhar_num" class="form-control" placeholder="Employee Aadhar Number" readonly="">
									</div>
								</div> -->	
								<!-- <div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Office</label>
													<input type="text" id="office" name="office" class="form-control" placeholder="Employee Office" readonly="" value="<?php echo $result['office'];?>">
									</div>
								</div -->
									<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Station</label>
										<input type="text" id="station" name="station" class="form-control" placeholder="Employee Station" readonly="" value="<?php echo $result['station'];?>">
									</div>
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Subject</label>
										<div class="">
											<input type="text" id="purpose" name="purpose" class="form-control" value="<?php echo $row['purpose'];?>" readonly/>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">User</label>
										<?php
										//dbcon3();
										//$query_bu_users = mysql_query("SELECT `user_pfno` FROM `add_user` WHERE user_role = '2'");
										//$row1 = mysql_fetch_array($query_bu_users);
										// echo "SELECT `user_pfno`,office_description FROM `add_user` WHERE user_role = '2'";
										?>
										<!-- <input type="hidden" id="user" name="user" class="form-control" value="<?php echo $row1['user_pfno'];?>" readonly/> -->
									 <select class="form-control select2" style="width: 100%;" tabindex="-1" id="user" name="user" autofocus="true" required>
			                    		<option value="" selected="" disabled="">Select Chief OS</option>
			                    		<?php
			                    		
			                    		dbcon3();
										$query_bu_users = mysql_query("SELECT `user_pfno`,`office_description` FROM `add_user` WHERE user_role = '2'");
										while($row_bu_users = mysql_fetch_array($query_bu_users))
										{
	
											dbcon2();
					    			 		$q_name = mysql_query("SELECT `name` FROM `register_user` WHERE emp_no = '".$row_bu_users['user_pfno']."'");
					    			 		$row_name_emp = mysql_fetch_array($q_name);
					    			 		 // echo $row_name_emp['name'];
					    			 		 echo "<option value='".$row_bu_users['user_pfno']."'>".$row_bu_users['office_description']."-".$row_name_emp['name']."</option>";
						    			 	
										}	
			                    		?>
			                    	</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
											<div class="input-group">
												<label class="control-label">Description</label>
												<textarea rows="4" cols="38" name="description" readonly=""><?php echo $row['description'];?></textarea>
											</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
											<div class="input-group">
												<label class="control-label">Remark</label>
												<textarea rows="4" cols="38" name="remark" required=""></textarea>
											</div>
									</div>
								</div>
							</div>
							<!--<div class="row">-->
							<!--	<div class="col-md-3">-->
							<!--		<div class="form-group">-->
							<!--				<div class="input-group">-->
							<!--					<label class="control-label">Remark</label>-->
							<!--					<textarea rows="4" cols="50" name="remark" required=""></textarea>-->
							<!--				</div>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>				-->
							<div class="row">	
							
								<div class="col-md-3">
									<div class="form-group">
											<div class="input-group" style="margin-top: 25px;">
													<a class="btn btn-circle green" href="<?php echo 'control/'.$row['file'];?>">View Document</a>
											</div>
									</div>
								</div>
							</div>							
						</div>
								<div class="form-actions right">
								<button type="reset" class="btn default">Cancel</button>
								<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i>forward</button>
								</div>
					</form>
								<!--/span-->
							</div>
							
					<!-- END FORM-->
				</div>
			</div>

			
			
		</div>
	</div>

	
	
<?php
	include 'common/footer.php';
?>

