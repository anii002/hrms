 <?php 
$_GLOBALS['a'] ='medical';
  include_once('../global/header_update.php');?>
 <!--Bio Tab Start -->
				<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
					<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Medical Details</span>
					</div>
					<div style="border:1px solid #67809f;padding:30px;">
			<div class="box-header with-border">
				<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
					<li class="active in " ><a href="#medical" data-toggle="tab"><b>Initial</b></a></li>
					<li class=""><a href="#last_medi" data-toggle="tab"><b>Last Medical</b></a></li>
					<li class=""><a href="#medi_history" data-toggle="tab"><b>Medical History</b></a></li>
				</ul>
				 
			</div>
			<?php
				$med_exist=0;
					if(isset($_SESSION['set_update_pf']))
					{	
						dbcon1();
						$sql=mysql_query("select * from  medical_temp where medi_pf_number='".$_SESSION['set_update_pf']."'");
						$result=mysql_num_rows($sql);
						
						if($result>0)
						{
							$med_exist=1;
						}
					}
			?>
			<div class="tab-content">
			<div class="tab-pane active in" id="medical">
			<form id="form_medical" class="apply_readonly" action="process_main.php?action=add_initial_medical" method="POST" >
				<div class="modal-body">
					<div class="row">
					  
						<div class="col-md-6 col-sm-12 col-xs-12">
						<?php
								 
								if($_SESSION['set_update_pf']!="")
								{
									dbcon1();
									$last_pf=$_SESSION['set_update_pf'];
									$sql=mysql_query("select dob from biodata_temp where pf_number='$last_pf'");
									$cnt=mysql_num_rows($sql);
									if($cnt>0){
									while($result=mysql_fetch_array($sql)){
										 
										$dob=$result['dob'];
									}
										$dob=date('d-m-Y', strtotime($dob));
									}
									else{
									$dob="";
								   }
									$sql1=mysql_query("select * from medical_temp where medi_pf_number='$last_pf' ORDER BY id DESC LIMIT 1");
									
									$cnt=mysql_num_rows($sql1);
									if($cnt>0){
										while($result=mysql_fetch_array($sql))
										{
											//echo "i am if";
											$ini_medi_examtype=$result['medi_examtype'];
											$ini_medi_cate=get_medi_category($result['medi_cate']);
											$ini_medi_dob=$result['medi_dob'];
											
											if($result['medi_appo_date']=='0000-00-00')
											{
												$ini_medi_appo_date='';
											}
										else{
											$ini_medi_appo_date=$result['medi_appo_date'];
											}
											$ini_medi_class=$result['medi_class'];
											$ini_medi_design=get_designation($result['medi_design']);
											$ini_medi_certino=$result['medi_certino'];
											if($result['medi_certidate']='0000-00-00'){
												$ini_medi_certidate='';
											}else{
												$ini_medi_certidate=$result['medi_certidate'];
											}
											
											$ini_medi_refno=$result['medi_refno'];
											if($result['medi_refdate']=='0000-00-00')
											{
												$ini_medi_refdate='';
											}else{
											$ini_medi_refdate=$result['medi_refdate'];
											}
											$ini_medi_remark=$result['medi_remark'];
										}
										}
									else{
											//$_SESSION['same_pf_no']="";
											//echo "i am else";
											$medi_pf_no="";
											$ini_medi_examtype="";
											$ini_medi_cate="";
											$ini_medi_dob="";
											$ini_medi_appo_date="";
											$ini_medi_class="";
											$ini_medi_design="";
											$ini_medi_certino="";
											$ini_medi_certidate="";
											$ini_medi_refno="";
											$ini_medi_refdate="";
											$ini_medi_remark="";
									}

								}
								else{
									$dob="";
									$last_pf="";
								   }	
								?>
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary TextNumber common_pf_number" value="<?php echo $last_pf;?>" id="medi_pf_no" name="medi_pf_no" readonly required  />
							  </div>
							</div>
						</div>
						
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Category</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat" id="medi_cat" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option value="" disabled selected>Select Category</option>
										<option value=" " ></option>
										<?php
												dbcon();
												$sqlreligion=mysql_query("select * from medical_classi");
												while($rwDept=mysql_fetch_array($sqlreligion))
												{
												?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
												<?php
												}
											
											?>
											<option value="all class unfit">All Class Unfit</option>
									</select> 
								</div>
                            </div>
						</div>
						
						
					</div>
					<br>
					<h3>PME Schedule Defining Parameters</h3>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Birth</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" name="med_dob" id="med_dob" class="form-control"  required readonly value="<?php echo $dob;?>">
								</div>
                            </div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Appointment</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<?php
								
								dbcon1();
								$sql=mysql_query("select * from appointment_temp where app_pf_number='".$_SESSION['set_update_pf']."'");
								$result=mysql_fetch_array($sql);
								if($result['app_type']==4)
								{
									$x=date('d-m-Y', strtotime($result['app_date']));
								}
									else if($result['app_type']==1 || $result['app_type']==2 ||$result['app_type']==3)
								{
									$x=date('d-m-Y', strtotime($result['app_regul_date']));
								}
								else{
									$x='';
								}
								?>
								<input type="text" name="med_appo_date" id="med_appo_date" class="form-control " value="<?php echo $x; ?>" readonly>
								
								</div>
                            </div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation At Time Of Appointment</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2" id="in_med_desig" name="in_med_desig" style="margin-top:0px; width:100%;" readonly>
							
								<?php
								
								dbcon1();
								$sql=mysql_query("select * from appointment_temp where app_pf_number='".$_SESSION['set_update_pf']."'");
								$result=mysql_fetch_array($sql);
								echo "<option value='".$result['app_designation']."' selected>".get_designation($result['app_designation'])."</option>";
								
								
									//Fetch Designation code
									dbcon();
									$alldesignations = "";
									$sqlDept=mysql_query("select * from designation");
									while($rwDept=mysql_fetch_array($sqlDept))
									{
										$alldesignations .= "<option value=".$rwDept["id"].">".$rwDept["desiglongdesc"]."</option>";
									}
									//echo $alldesignations;
									?>
								</select>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Class For PME</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat_pme" id="medi_cat_pme" class="form-control select2" style="margin-top:0px; width:100%;" required >
										<option value="" selected readonly disabled ></option>
										<option value="">NA</option>
										<?php
										dbcon();
										$sqlDept=mysql_query("select * from medical_pme_class");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["pme_class"]; ?>"><?php echo $rwDept["pme_class"];?></option>
										<?php
										}
									
										?>
									</select> 
								</div>
                            </div>
						</div>
					</div>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">	
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Type of Medical Examination</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<select name="medi_exam" id="medi_exam" class="form-control select2" style="margin-top:0px; width:100%;" required>
										
										<option value="initial" selected>Initial</option>
									</select> 
								</div>
                            </div>
						</div>
						
					</div>
					<br>
					<div class="row">	
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate No </label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="medi_cer_no" name="medi_cer_no" class="form-control" placeholder="Enter Certificate Number" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="med_cer_date" name="med_cer_date" class="form-control calender_picker readonly" placeholder="Click here to Select Date" required >
							  </div>
							</div>
						</div>
					</div>
					<br>	
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference </label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								 <textarea  rows="2" style="resize:none;" class="form-control primary" id="med_ref" name="med_ref"   placeholder="Enter Medical Reference" >SR.DMO/</textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="med_ref_date" name="med_ref_date" class="form-control calender_picker  readonly" placeholder="Select Date"  >
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div class="row" >
						<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-2" >Medical Remarks</label>
						  <div class="col-md-10">
							 <textarea  rows="3" style="resize:none" class="form-control primary description" id="med_remark" name="med_remark"  placeholder="Enter Medical Remarks" ></textarea>
						  </div>
						</div>
					</div>
						 
					</div>	 
				</div><br>
				<div class="form-group">
					<div class="col-sm-2 col-xs-1 pull-right">
						<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
						<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					</div>
				</div>
				<br>
			</form>
		</div>
	<!--medical Tab End -->
	<div class="tab-pane" id="last_medi">
			
			<form method="post" id="form_medical" class="apply_readonly">
			<div class="row pull-right">
					<div class="col-md-12">
					<?php
						if($_SESSION['set_update_pf']!="")
						{	
							dbcon1();
							$last_pf=$_SESSION['set_update_pf'];
							$sql=mysql_query("select * from medical_temp where medi_pf_number='$last_pf'");
							$result=mysql_num_rows($sql);
							if($result>0)
							{
								echo "<a href='#' class='btn btn-danger' id='add_reg_medical' data-toggle='modal' data-target='#add_regular_medical'>+ADD MEDICAL</a>";
							}
						}
					?>
						
					</div><hr>
				</div><br>
				<?php
					if($_SESSION['set_update_pf']!="")
					{
						dbcon1();
						$last_pf=$_SESSION['set_update_pf'];
						$sql=mysql_query("select * from medical_temp where medi_pf_number='$last_pf'  ORDER BY id  DESC LIMIT 1");
					$cnt=mysql_num_rows($sql);
					if($cnt>0)
					{
						while($result=mysql_fetch_array($sql)){
							$medi_examtype=$result['medi_examtype'];
							$medi_cate=get_medi_category($result['medi_cate']);
							$medi_dob=date('d-m-Y', strtotime($result['medi_refdate']));$result['medi_dob'];
							if($result['medi_appo_date']=='0000-00-00')
							{
								$medi_appo_date='';
							}
							else
							{
								$medi_appo_date=date('d-m-Y', strtotime($result['medi_appo_date']));
							}
							
							//echo "<script> alert('$medi_appo_date');</script>";
							$medi_class=$result['medi_class'];
							$medi_design=get_designation($result['medi_design']);
							$medi_certino=$result['medi_certino'];
							if($result['medi_certidate']=='0000-00-00'){
								$medi_certidate='';
								}else{
									$medi_certidate=date('d-m-Y', strtotime($result['medi_certidate']));
									}
							$medi_refno=$result['medi_refno'];
							if($result['medi_refdate']=='0000-00-00'){
								$medi_refdate='';
							}else{
							$medi_refdate=date('d-m-Y', strtotime($result['medi_refdate']));
							}
							$medi_remark=$result['medi_remark'];
							$datetime=date('d-m-Y', strtotime($result['datetime']));
							$updated_by=fetch_user($result['updated_by']);
						}
					}
					else{
						    $medi_examtype="";
							$medi_cate="";
							$medi_dob="";
							$medi_appo_date="";
							$medi_class="";
							$medi_design="";
							$medi_certino="";
							$medi_certidate="";
							$medi_refno="";
							$medi_refdate="";
							$medi_remark="";
							$datetime="";
							$updated_by="";
					}
					}
					else{
						    $medi_examtype="";
							$medi_cate="";
							$medi_dob="";
							$medi_appo_date="";
							$medi_class="";
							$medi_design="";
							$medi_certino="";
							$medi_certidate="";
							$medi_refno="";
							$medi_refdate="";
							$medi_remark="";
							$datetime="";
							$updated_by="";
					}
				?>
			
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary TextNumber common_pf_number" id="last_pf_no" name="last_pf_no" readonly />
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Category</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" class="form-control" id="last_cat" name="last_cat" value="<?php echo $medi_cate;?>" readonly> 
								</div>
                            </div>
						</div>	
						
					</div>
					<br>
					<h3>PME Schedule Defining Parameters</h3>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Birth</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" name="last_med_dob" id="last_med_dob" class="form-control" value="<?php echo $medi_dob;?>" readonly>
								</div>
                            </div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Appointment</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" name="last_med_dob" id="last_med_dob" class="form-control" value="<?php echo $medi_appo_date;?>" readonly>
								</div>
                            </div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control" id="last_desig" name="last_desig" value="<?php echo $medi_design;?>" readonly> 
								  </div>
                                </div>
						    </div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Class For PME</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control" id="last_class" name="last_class" value="<?php echo $medi_class;?>" readonly> 
								</div>
                            </div>
						</div>
					</div>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<br>
					
					<div class="row">	
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Type of Medical Examination</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control" id="last_exam" name="last_exam" value="<?php echo $medi_examtype;?>" readonly> 
								</div>
                            </div>
						</div> 
					</div>
					<br>
					<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate No </label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="last_cer_no" name="last_cer_no" class="form-control" value="<?php echo $medi_certino;?>" readonly>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="last_cer_date" name="last_cer_date" class="form-control" value="<?php echo $medi_certidate;?>"   readonly>
							  </div>
							</div>
						</div>
						
					</div>
					<br>
					<div class="row" >
					
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference </label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								 <textarea  rows="2" style="resize:none;" class="form-control primary" id="last_ref" name="last_ref" readonly><?php echo $medi_refno;?></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="last_ref_date" name="last_ref_date" class="form-control" value="<?php echo $medi_refdate;?>" readonly >
							  </div>
							</div>
						</div>
						 
					</div><br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Updated By</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="last_update" name="last_update" class="form-control" value="<?php echo $updated_by;?>"  readonly>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Updated Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="last_update_date" name="last_update_date" class="form-control" value="<?php echo $datetime;?>"  readonly >
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div class="row" >
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-2" >Medical Remarks</label>
							  <div class="col-md-10">
								 <textarea  rows="3" style="resize:none" class="form-control primary TextNumber" id="last_med_remark" name="last_med_remark" readonly><?php echo $medi_remark;?></textarea>
							  </div>
							</div>
						</div> 
					</div>
				</div><br>
				
			</form>
		</div> 
		<div class="tab-pane" id="medi_history">
			
			<div class="box-body">
				<div class="modal-body">
				<?php
					if($_SESSION['set_update_pf']!="")
					{
						dbcon1();
						$last_pf=$_SESSION['set_update_pf'];
						$sql=mysql_query("select * from medical_temp where medi_pf_number='$last_pf'");
						$cnt=mysql_num_rows($sql);
						if($cnt>0)
						{
						while($result=mysql_fetch_array($sql))
						{
							$medi_pf_number=$result['medi_pf_number'];
							dbcon1();
							$sql1=mysql_query("select emp_name,sr_no from biodata_temp where pf_number='$medi_pf_number'");
							while($result1=mysql_fetch_array($sql1)){
							$emp_name=$result1['emp_name'];
							$sr_no=$result1['sr_no'];}
							$medi_design=get_designation($result['medi_design']);
						}
						}else{
							$medi_pf_number="";
							$emp_name="";
							$sr_no="";
							$medi_design="";
						}
					}
				?>
					<table border="1" class="table table-bordered"  style="width:100%">
						<tbody>
							<tr>
								<td><label class="control-label labelhed " >Service Record No</label></td>
								<td> <label class="control-label labelhdata"><?php echo $sr_no;?></label></td>
								<td><label class="control-label labelhed" >PF No</label></td>
								<td><label class="labelhdata labelhdata"><?php echo $medi_pf_number;?></label></td>
							</tr>
							<tr>
								<td><label class="control-label labelhed" >Employee Name</label></td>
								<td><label class="control-label labelhdata"><?php echo $emp_name;?></label></td>
								<td><label class="control-label labelhed" >Designation</label></td>
								<td><label class="control-label labelhdata"><?php echo $medi_design;?></label></td>
							</tr>				
						</tbody>
					</table>
				</div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Type Of Medical</th>
                  <th>Medical Class</th>
                  <th>Letter No</th>
                  <th>Letter Date</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$cnt=1;
				if($_SESSION['set_update_pf']!="")
					{	dbcon1();
						$last_pf=$_SESSION['set_update_pf'];
						$sql=mysql_query("select * from medical_temp where medi_pf_number='$last_pf'");
						while($result=mysql_fetch_array($sql))
						{
							echo "<tr>";
							echo "<td>$cnt</td>";
							echo "<td>".$result['medi_examtype']."</td>";
							echo "<td>".$result['medi_class']."</td>";
							echo "<td>".$result['medi_certino']."</td>";
								if($result['medi_certidate']=='0000-00-00')
								{$cert='';}
								else{
									$cert=date('d-m-Y', strtotime($result['medi_certidate']));}
							echo "<td>$cert</td>";
							
							echo "<td><a href='medical_detail.php?pf=".$last_pf."&page=update' class='btn btn-primary'>View</a></td>";
							$cnt++;
						}
					}
				?>
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
				</div>
			</div>
		</div>
	 </div> 
   </div>  	
		<?php include('modal_js_header.php');?>
<script>
var x = '';
	var y = '';
	var z='';
jQuery(document).ready(function() {
	
    jQuery('.tab .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tab ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
	
function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
}
});
</script>

<?php
	 if(isset($_SESSION['set_update_pf']))
	{
		echo "<script>$('.common_pf_number').val('".$_SESSION['set_update_pf']."'); </script>";
		//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
	} 
?>
							
<?php include_once('../global/footer.php');?>  
<script>
debugger;
var med_exist=<?php echo $med_exist;?>;
	if(med_exist==1)
	{
		//alert("This Pf Number is Already Registered For Initial Medical Entry");
		$('#form_medical input').attr('disabled',true);
		$('#form_medical textarea').attr('disabled',true);
		$('#form_medical select').attr('disabled',true);
		$('#form_medical button').attr('disabled',true);
		
		var session='<?php echo $_SESSION['set_update_pf'];?>';
		//alert(session);
		$.ajax({
			type:"post",
			url:"process.php",
			data:"action=get_medical_detail&session="+session,
			success:function(data){
			// alert(data);
			  var html=JSON.parse(data);
			 // alert(html['medi_pf_number']);
				//$("#medi_pf_no").val(html['medi_pf_number']);
				$("#medi_exam").html("<option>"+html['medi_examtype']+"</option>");
				$("#medi_cat").html("<option>"+html['medi_cate']+"</option>");
				$("#medi_cat_pme").html("<option>"+html['medi_class']+"</option>");
				$("#in_med_desig").html("<option>"+html['medi_design']+"</option>");
				$("#medi_cer_no").val(html['medi_certino']);
				//alert(html['medi_certidate']);
				$("#med_cer_date").val(html['medi_certidate']);
				$("#med_ref").val(html['medi_refno']);
				$("#med_ref_date").val(html['medi_refdate']);
				$("#med_remark").val(html['medi_remark']);
			
				$("#med_appo_date").val(html['medi_appo_date']);
			}
		});
   
	}else{
		$('#form_medical input').attr('disabled',false);
		$('#form_medical textarea').attr('disabled',false);
		$('#form_medical select').attr('disabled',false);
	}
</script>