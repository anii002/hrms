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
											<i class="fa fa-book"></i> Applicant Registration Form 
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
															<label class="control-label">Ex-Employees (Parent) PF number</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-user"></i>
															</span>
															<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter PF Number" required>
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
															<input type="text" class="form-control" id="empname" name="empname" placeholder="Name Of Employee" >
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
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
															<input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Maritial Status</label>
															
										<select name="dept" id="dept" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											<option value="" selected disabled>Select Status</option>
											  <?php
												 $query_emp =mysql_query("select * from marital_status");
												
												 while($value_emp = mysql_fetch_array($query_emp))
												 {
												  echo "<option value='".$value_emp['code']."'>".$value_emp['shortdesc']."</option>";
												}
											  
											  ?>
										</select>
										
															
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Upload File </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="file" class="form-control" id="mobile" name="mobile" placeholder=" ">
															</div>
														</div>
													</div>
													<!--/span-->
													
													
													
													<!--/span-->
												</div>
												<hr>
													<button type='button' class='btn btn-primary pull-right' id='add_member' name='add_member'>  Add Family Member</button>
													<br>
													<br>
													<div id='dyn_fam_member' class='row'>
													
													</div>
													
												<div class='row'>
														<h4>&emsp;Family Member 1</h4>
													<div class="col-md-6">
													
														<div class="form-group">
															<label class="control-label">Member 	Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_name_1" name="fam_mem_name_1" placeholder=" ">
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
															<input type="text" class="form-control" id="fam_mem_mobno_1" name="fam_mem_mobno_1" placeholder=" ">
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
															<input type="text" class="form-control" id="fam_mem_panno_1" name="fam_mem_panno_1" placeholder=" ">
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
															<input type="text" class="form-control" id="fam_mem_aadharno_1" name="fam_mem_aadharno_1" placeholder=" ">
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Relation </label>
															<select name="fam_mem_rel_1" id="fam_mem_rel_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											<option value="" selected disabled>Select Status</option>
											  <?php
												 $query_emp =mysql_query("select * from Relation");
												
												 while($value_emp = mysql_fetch_array($query_emp))
												 {
												  echo "<option value='".$value_emp['code']."'>".$value_emp['longdesc']."</option>";
												}
											  
											  ?>
										</select>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member DOB</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control dtpicker" id="fam_mem_dob_1" name="fam_mem_dob_1" placeholder=" ">
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
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Uploaded Question Paper or Syllabus List
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="display" id="example1">
							<thead>
							<tr>
								<th>SR No</th>
								<th>Name</th>
								<th>Year</th>
								<th>Uploaded Date</th>
								
							</tr>
							</thead>
							<tbody>
								<tr>
								<td></td>
								<td></td>
								
							
								<td>
								 <!--button value='".$value_emp['pfno']."' class='btn btn-primary changerole'>Change Role</button>
								<button value='".$value_emp['pfno']."' class='btn btn-warning active' style='margin-left:10px;'>Active</button--></td>
								<td>
								<!--button value='".$value_emp['pfno']."' class='btn btn-danger deactive' style='margin-left:10px;'>Deactive</button--></td>
								</tr>
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
var cnt=1;
$("#add_member").click(function(){
alert("hello");

cnt=cnt+1;
// alert(cnt);
		 $.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_family_form&cnt="+cnt,
		success:function(data){
		  alert(data);
		  $("#dyn_fam_member").prepend(data);
		
		 // alert(family_counter);
	
		  }
	});
});
</script>