<?php 
$_GLOBALS['a'] ='biodata';
  include_once('../global/header_update.php');
  
	include('create_log.php');
  
	$action="Visited Biodata page";
	$action_on=$_SESSION['set_update_pf'];
	create_log($action,$action_on);
  ?>

<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp; User Managment</span>
			</div>
			<div style="border:1px solid #67809f;padding:30px;">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp; ADD USER</h3>
				</div><br>				
				<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber nospace common_pf_number" placeholder="Enter PF Number" maxlength="11" required>
									<span class="help-block bio_pf_no"></span>
								  </div>
								</div>
							</div>
							<?php
								dbcon1();
								$bio_exist=0;
								$sql=mysql_query("select * from biodata_temp where pf_number='".$_SESSION['set_update_pf']."'");
								$bio_row=mysql_num_rows($sql);
								if($bio_row>0){
									$bio_exist=1;
								}
								//echo "<script>alert('$bio_exist');</script>";
							?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Name</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="bio_oldpf_no" name="bio_oldpf_no" class="form-control form-text TextNumber nospace" placeholder="Enter Name" onChange="old_pf_number(this)" maxlength="8" >
								<span class="help-block oldpf"></span>
							 </div>
						</div>
					</div>
			</div>
				<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group bio">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary select2" id="preapp_dept" name="preapp_dept" style="margin-top:0px; width:100%;" > 
									<option selected disabled value="">Select Department</option>
										<?php echo $dept;?>
									</select>
									  </div>
									</div>
								</div>
								
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group old_pf">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
								 <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2" id="preapp_sgd_desig" name="preapp_sgd_desig" style="margin-top:0px; width:100%;" >
									<?php echo $alldesignations;?>
								</select>
								 </div>
							</div>
						</div>
				</div><br><div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >User Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2" id="preapp_sgd_desig" name="preapp_sgd_desig" style="margin-top:0px; width:100%;" >
								<option selected disabled value="">Select User Type</option>
								<option value="">Select User Type</option>
								<option value="">Select User Type</option>
								<option value="">Select User Type</option>
							</select>
								  </div>
								</div>
							</div>
							
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >User Status</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary select2" id="preapp_sgd_desig" name="preapp_sgd_desig" style="margin-top:0px; width:100%;" >
								<option selected disabled value="">Select Status</option>
								<option value="">Select Status</option>
								<option value="">Select Status</option>
								<option value="">Select Status</option>
							</select>
							 </div>
						</div>
					</div>
			</div>
			
			<br>
			
			<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Enter User Name </label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber nospace common_pf_number" placeholder="Enter User Name" maxlength="11" required>
									<span class="help-block bio_pf_no"></span>
								  </div>
								</div>
							</div>
							<?php
								dbcon1();
								$bio_exist=0;
								$sql=mysql_query("select * from biodata_temp where pf_number='".$_SESSION['set_update_pf']."'");
								$bio_row=mysql_num_rows($sql);
								if($bio_row>0){
									$bio_exist=1;
								}
								//echo "<script>alert('$bio_exist');</script>";
							?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Enter Password</label>
							 <div class="col-md-7 col-sm-8 col-xs-12" >
								<input type="text" id="bio_oldpf_no" name="bio_oldpf_no" class="form-control form-text TextNumber nospace" placeholder="Enter Password" onChange="old_pf_number(this)" maxlength="8" >
								<span class="help-block oldpf"></span>
							 </div>
							 <div class="col-md-1 col-sm-8 col-xs-12">
									<span class="fa fa-eye" style="font-size:18px;cursor: pointer;margin-top:7px;"></span>
								  </div>
						</div>
					</div>
			</div>
		
			<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Re-Enter Password </label>
								  <div class="col-md-7 col-sm-8 col-xs-12" >
									<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber nospace common_pf_number" placeholder="Re-Enter Password" maxlength="11" required>
									<span class="help-block bio_pf_no"></span>
								  </div> 
								  <div class="col-md-1 col-sm-8 col-xs-12">
									<span class="fa fa-eye-slash" style="font-size:18px;cursor: pointer;margin-top:7px;"></span>
								  </div>
								</div>
							</div>
							<?php
								dbcon1();
								$bio_exist=0;
								$sql=mysql_query("select * from biodata_temp where pf_number='".$_SESSION['set_update_pf']."'");
								$bio_row=mysql_num_rows($sql);
								if($bio_row>0){
									$bio_exist=1;
								}
								//echo "<script>alert('$bio_exist');</script>";
							?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >e-mail Id</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="bio_oldpf_no" name="bio_oldpf_no" class="form-control form-text TextNumber nospace" placeholder="Enter e-mail Id" onChange="old_pf_number(this)" maxlength="8" >
								<span class="help-block oldpf"></span>
							 </div>
						</div>
					</div>
			</div>
			<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Present Address</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<textarea   style="width: 100%;resize:none"></textarea>
								
							 </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Parmanant Address</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<textarea   style="width: 100%;resize:none"></textarea>
							 </div>
						</div>
					</div>
			</div>
			
			<!--div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Upload Signature</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="file" id="bio_oldpf_no" name="bio_oldpf_no" class="form-control form-text TextNumber nospace" placeholder="Enter e-mail Id" onChange="old_pf_number(this)" maxlength="8" >
								
							 </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Parmanant Address</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<img src="#" height="80px" width="300px"></img>
							 </div>
						</div>
					</div>
			</div-->
			<br>
			<div class="col-sm-2 col-xs-12 pull-right">
			<center>
						 <button  type="submit"  class="btn btn-primary source" name="bio_saveBtn" id="bio_saveBtn">Save</button>
						  <button  type="submit" class="btn btn-danger source" name="bio_updateBTN" id="bio_updateBTN">Cancel</button>
						 <button type="button" class="btn btn-danger"  style="display:none;" data-dismiss="modal">Close</button>
					</div>
					</center>
					<br>
				
				
				
			</div>
</div>
<?php include_once('../global/footer.php');?>  