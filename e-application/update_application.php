<?php
	$GLOBALS['flag']="4.95";
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
						<a href="#"> Update Application</a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Update Application 
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?php
					$conn=dbcon2();
					$query = mysqli_query($conn,"SELECT * FROM add_application WHERE application_id = '".$_GET['application_id']."'");
					$row = mysqli_fetch_array($query);
					$conn=dbcon2();
  					$query1 = mysqli_query($conn,"SELECT * FROM register_user WHERE emp_no = '".$row['pfno']."'");
  					$result = mysqli_fetch_array($query1);
					?>
					<form action="control/adminProcess.php?action=update_application" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<input type="hidden" name="application_id" value="<?php echo $_GET['application_id'];?>">

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
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">ई -मेल / E-Mail</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" readonly="" value="<?php echo $result['emp_email'];?>">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">पदनाम / Designation</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-user-graduate"></i>
										</span>
										<input type="text" id="design" name="design" placeholder="Employee Designation" class="form-control" readonly="" value="<?php echo $result['designation'];?>">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">विभाग / Department</label>
			                    	<input type="text" id="dept" name="dept" class="form-control" placeholder="Employee Department" readonly="" value="<?php echo getdepartment($result['department']);?>">
									</div>
								</div>
							<!--/row-->
							<!--/row-->	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Aadhar Number</label>
										<input type="text" id="aadhar" name="aadhar_num" class="form-control" placeholder="Employee Aadhar Number" readonly="">
									</div>
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Office</label>
													<input type="text" id="office" name="office" class="form-control" placeholder="Employee Office" readonly="" value="<?php echo $result['office'];?>">
									</div>
							</div>
							</div>					
							<div class="row">	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Station</label>
										<input type="text" id="station" name="station" class="form-control" placeholder="Employee Station" readonly="" value="<?php echo $result['station'];?>">
									</div>
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Purpose</label>
										<div class="">
										<select class="form-control select2" style="width: 100%;" tabindex="-1" id="purpose" name="purpose" autofocus="true" required>
				                    		<option value="<?php echo $row['purpose'];?>"><?php echo $row['purpose'];?></option>
				                    		<?php
				                    			$conn=dbcon2();
				                    			$sql=mysqli_query($conn,"SELECT `purpose` FROM `purpose`");
				                    			while($row = mysqli_fetch_array($sql)) {
				                    				echo "<option value='".$row['purpose']."'>".$row['purpose']."</option>";
				                    			}
				                    		?>
				                    	</select>
								
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Attach Document</label>
											<div class="input-group">
													<input type="file" class="form-control imagepdf" name="attach" id="attach" value="<?php echo $row['file'];?>"/>
											</div>
									</div>
								</div>
							</div>							
						</div>
								<div class="form-actions right">
								<button type="reset" class="btn default">Cancel</button>
								<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
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
<script>
 $(".imagepdf").on("change", function(){
		var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['png','jpg','jpeg','pdf']) == -1) {
			alert('Invalid file type!');
			$(this).val("");
		}
	});

</script>
