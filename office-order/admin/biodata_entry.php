<?php 
$_GLOBALS['a'] ='biodata';
  include_once('../global/header1.php');?>
  
				<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
					<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;BIO DATA</span>
					</div>
					<div style="border:1px solid #67809f;padding:30px;">
					<div class="row">
						<div class="col-md-10 col-sm-12 col-xs-12 text-center" >
							<div class="checkbox form-group">
							 <label class="control-label" ><label style="cursor:pointer; color:red" class="control-label col-md-12 col-sm-3 col-xs-12"><b onclick="refresh_code();">Click Here If You want start SR entry With New PF Number </b></label>
							</div>
						</div>
					</div>
					<?php
						$bio_exist=0;
						if(isset($_SESSION['same_pf_no']))
						{	
							dbcon1();
							$sql=mysql_query("select * from biodata_temp where pf_number='".$_SESSION['same_pf_no']."'");
							$result=mysql_num_rows($sql);
							$resultset = mysql_fetch_array($sql);
							if($result>0)
							{
								$bio_exist=1;
							} 
						}
					?>
		<form class="form-horizontal" action="process_main.php?action=add_biodata" method="POST" enctype="multipart/form-data" id="biodata_form">	
			<div class="row">
				<input type="hidden" name="valided_text" id="valided_text">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber common_pf_number" placeholder="Enter PF Number" required onChange="pf_number(this)" maxlength="11">
									<span class="help-block bio_pf_no"></span>
								  </div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group old_pf">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Old PF Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="bio_oldpf_no" name="bio_oldpf_no" class="form-control form-text TextNumber" placeholder="Enter PF Number" onChange="old_pf_number(this)" maxlength="8">
									<span class="help-block oldpf"></span>
								  </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >ID Card Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="bio_id_no" name="bio_id_no" class="form-control form-text TextNumber" readonly>
								  </div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<?php 
								if($result>0)
									$bio_sr_no = $resultset['sr_no'];
								else
								$bio_sr_no = "0107".mt_rand(100000, 999999);
								?>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >SR Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="bio_sr_no" name="bio_sr_no" value="<?php echo $bio_sr_no ?>" class="form-control" readonly>
								  </div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Birth</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 <input type="text" class="form-control calender_picker" size="30" id="bio_dob" name="bio_dob"/>
								  </div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio_aadhar">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Aadhar No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="bio_aadhar" name="bio_aadhar" class="form-control onlyNumber" placeholder="Enter Aadhar No" onChange="adharnumber(this)" maxlength="12">
									<span class="help-block bioadhar"></span>
								  </div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div> 
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 col-sm-1 col-xs-12" >Employee Name</label>
								  <div class="col-md-10 col-sm-12 col-xs-12" >
									<input type="text" id="bio_emp_name" name="bio_emp_name" class="form-control onlyText" placeholder="First Name      Middle Name        Last Name" required>
								  </div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12" >Emp Old Name</label>
								  <div class="col-md-10 col-sm-8 col-xs-12" >
									<input type="text" id="bio_emp_old_name" name="bio_emp_old_name" class="form-control onlyText" placeholder="First Name      Middle Name        Last Name">
									<span class="old_name" style="color:red;"></span>
								  </div>
								</div>
							</div>
						</div><br>
					</div>
					<div class="col-md-3">
					  <img id="blah" src="avatar5.png" height="200" width="200"/><br>
					  <input type='file' class="form-control" accept="image/*" onchange="readURL(this);" name="imgs" id="imgs" />
					</div>	
				</div><br>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Gender</label>
						  <div class="col-md-9 col-sm-8 col-xs-12">
							<select name="bio_gender" id="bio_gender" class="form-control bio_all_status select2" style="margin-top:0px; width:100%;" required>
								<option value=" " selected></option>
								<?php
										dbcon();
										$sqlreligion=mysql_query("select * from gender");
										while($rwDept=mysql_fetch_array($sqlreligion))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["gender"]; ?></option>
										<?php
										}
									?>
							</select> 
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Marital Status</label>
						  <div class="col-md-9 col-sm-8 col-xs-12">
							<select name="bio_marriage_status" id="bio_marriage_status" class="form-control bio_all_status select2" style="margin-top:0px; width:100%;">
								<option value=" " selected></option>
								<?php
										dbcon();
										$sqlreligion=mysql_query("select * from marital_status");
										while($rwDept=mysql_fetch_array($sqlreligion))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["shortdesc"]; ?></option>
										<?php
										}
									?>
							</select> 
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12">
						<div class="form-group" style="display:none;" id="rdo_1">
							<label class="control-label col-md-12 col-sm-6 col-xs-12"><input type="radio" id="choose_name" name="choose_name" value="Father" class="choose_name">Father Name</label>
						</div>
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12" style="display:none;" id="rdo_2">
						<div class="form-group">
							<label class="control-label col-md-12 col-sm-3 col-xs-12"><input type="radio" id="choose_name" name="choose_name" value="Husband" class="choose_name">Husband Name</label>
						</div>
					</div>
					<div class="col-md-8 col-sm-12 col-xs-12" id="middle_name">
						<div class="form-group">
						<label class="control-label col-md-2 col-sm-3 col-xs-12" id="apply_name"> Name</label>
						  <div class="col-md-10 col-sm-8 col-xs-12" >
							<input type="text" id="bio_rdobtn_name" name="bio_rdobtn_name" class="form-control onlyText" placeholder="First Name      Middle Name     Last Name">
						  </div>
						</div>
					</div>
				</div><br>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group cug_num">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >CUG Number</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" id="bio_cug" name="bio_cug" class="form-control onlyNumber" placeholder="Enter CUG No" onChange="cugnumber(this)" maxlength="10">
							<span class="help-block cugnum"></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group per_con">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Personal Mobile Number</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" id="bio_mob" name="bio_mob" class="form-control onlyNumber" placeholder="Enter Personal Mobile No" onChange="phonenumber(this)" maxlength="10">
							<span class="help-block percon"></span>
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group pran_no">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PRAN/NPS Number</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="bio_pran" name="bio_pran" class="form-control TextNumber" placeholder="Enter PRAN/NPS Number" >
								<span class="help-block pranno"></span>
							  </div>
							</div>
						</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group ru_id">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >RUID Number</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" id="bio_ruid" name="bio_ruid" class="form-control TextNumber" placeholder="Enter RUID Number" onChange="ruidnumber(this)"  maxlength="7">
							<span class="help-block ruid"></span>
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group pan_no">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >PAN No</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" id="bio_pan" name="bio_pan" class="form-control TextNumber" placeholder="Enter PAN Card No" onChange="pannumber(this)" maxlength="10">
							<span class="help-block panno"></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group bio_email">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >E-mail Address</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<input type="email" id="bio_email" name="bio_email" class="form-control" placeholder="Enter E-mail"  onchange="email_valid(this);"> 
							<span class="help-block bioemail"></span>
						  </div>
						</div>
					</div>
				</div>
				<br>	
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
				<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Present Address </label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								 <textarea  rows="2" style="resize:none;" class="form-control primary description" id="bio_p_addr" name="bio_p_addr"  placeholder="Enter Present Address"></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">State Code</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<select class="form-control select2" name="state_code" id="state_code" style="width:100%;">
										<option value=" " selected></option>
										<?php
										$sqlreligion=mysql_query("select * from state");
										while($rwDept=mysql_fetch_array($sqlreligion))
										{
										?>
										<option value="<?php echo $rwDept["longdesc"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
										<?php
										}
									?>
									</select>
									 
								</div>
							</div>
							<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">Pincode</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<select class="form-control select2" name="pincode" id="pincode" style="width:100%;">
										<option value=" " selected></option>
										 
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-3 col-sm-12 col-xs-12 text-center" >
							<div class="checkbox form-group">
							  <label class="control-label" ><input type="checkbox" class="same_add" value="same_add" name="same_add" id="same_add"><b>Same As Present Address</b></label>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Permanent Address </label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<textarea style="resize:none;"  rows="2"  class="form-control primary description" id="bio_pre_addr" name="bio_pre_addr"  placeholder="Enter Permanent Address"></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">State Code</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<select class="form-control select2" name="state_code_2" id="state_code_2" style="width:100%;">
										<option value=" " selected></option>
										 <?php
										$sqlreligion=mysql_query("select * from state");
										while($rwDept=mysql_fetch_array($sqlreligion))
										{
										?>
										<option value="<?php echo $rwDept["longdesc"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
										<?php
										}
									?>
									</select>
								</div>
							</div>
							<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">Pincode</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<select class="form-control select2" name="pincode_2" id="pincode_2" style="width:100%;">
										<option value=" " selected></option>
										 
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-2 col-sm-1 col-xs-12">Identification Mark</label>
							  <div class="col-md-6 col-sm-12 col-xs-12" id="add_iden_mark">
								<!--input type="hidden"-->
								<button class="btn btn-primary" type="button" id="add_mark_box" value="">+ADD</button>
								<button class="btn btn-danger" type="button" id="remove_mark_box" value="">-REMOVE</button>
							  </div>
							</div>
						</div>
					</div>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Religion</label>
							  <div class="col-md-9 col-sm-8 col-xs-12" >
								<select name="bio_religion" id="bio_religion" class="form-control select2" style="margin-top:0px; width:100%;">
									<option value=" " selected></option>
									 <?php
											$sqlreligion=mysql_query("select * from religion");
											while($rwDept=mysql_fetch_array($sqlreligion))
											{
											?>
											<!--<?php echo $rwDept["CODE"]; ?>/-->
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
											<?php
											}
										
										?>
									
								</select> 
							  </div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Community</label>
							  <div class="col-md-9 col-sm-8 col-xs-12" >
								<select name="bio_commu" id="bio_commu" class="form-control select2 " style="margin-top:0px; width:100%;">
									<option value=" " selected></option>
									 <?php
											$sqlreligion=mysql_query("select * from community");
											while($rwDept=mysql_fetch_array($sqlreligion))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["LONGDESC"]; ?></option>
											<?php
											}
										
										?>
									
								</select> 
							  </div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Caste</label>
							  <div class="col-md-9 col-sm-8 col-xs-12" >
								 
								<input type="text" id="bio_cast" name="bio_cast" class="form-control onlyText" placeholder="Enter Caste" >
							  </div>
							</div>
						</div>
					</div><br>
					<div class="row">
						
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-6 col-sm-3 col-xs-12">Recruitment Code / Appointment Type</label>
							  <div class="col-md-6 col-sm-8 col-xs-12">
								<select class="form-control" id="bio_req_code" name="bio_req_code" style="width:100%;" required>
									<option value=" " selected></option>
									<?php 
									    $sql=mysql_query("select * from recruitment");
										while($fetch=mysql_fetch_array($sql))
											{
											?>
											
											<option value="<?php echo $fetch["id"]; ?>"><?php echo $fetch["shortdesc"]; ?></option>
											<?php
											}
                                     ?>									
								</select>
								 
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Group</label>
							  <div class="col-md-9 col-sm-8 col-xs-12" >
								<select name="bio_grp" id="bio_grp" class="form-control select2" style="margin-top:0px; width:100%;" required>
									<option value=" " selected></option>
									<?php
											$group_col=mysql_query("select * from group_col");
											while($group_colre=mysql_fetch_array($group_col))
											{
											?>
											<option value="<?php echo $group_colre["id"]; ?>"><?php echo $group_colre["group_col"]; ?></option>
											<?php
											}
										?>
								</select> 
							  </div>
							</div>
						</div>
					</div><br>	
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Education 
							Qualification at the time of Initial Appointment</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<button class="btn btn-primary" type="button" id="add_edu_info_1">+ADD</button>
								<button class="btn btn-danger" type="button" id="remove_edu_info_1">-REMOVE</button>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12" id="add_edu_info_drop_1">
							
						</div>
						<div class="col-md-5 col-sm-12 col-xs-12" id="edu_pri_info_desc_1">
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Education 
							Qualification Subsequently Acquired</label>
							  <div class="col-md-8 col-sm-12 col-xs-12" >
								<button class="btn btn-primary" type="button" id="add_edu_info_2">+ADD</button>
								<button class="btn btn-danger" type="button" id="remove_edu_info_2">-REMOVE</button>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12" id="add_edu_info_drop_2">
							
						</div>
						<div class="col-md-5 col-sm-12 col-xs-12" id="add_edu_info_desc_2">
						</div>
					</div>
					<br>		 
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<h3>&nbsp;&nbsp;Bank Details</h3><hr>		
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bank Name</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="bio_bank_name" name="bio_bank_name" class="form-control onlyText" placeholder="Enter Bank Name" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Account Number</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="bio_acc_no" name="bio_acc_no" class="form-control onlyNumber" placeholder="Enter Account Number" required>
							  </div>
							</div>
						</div>
					</div>
					<br>	
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group micr">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >MICR Number</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="bio_micr" name="bio_micr" class="form-control TextNumber" placeholder="Enter MICR Number" maxlength="9" onChange="micrcode(this)" >
								<span class="help-block mi_cr"></span>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group ifsc">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >IFSC Code</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="bio_ifsc" name="bio_ifsc" class="form-control TextNumber" placeholder="Enter IFSC Code" maxlength="11" onChange="ifsccode(this)" required>
								<span class="help-block bio_pf_no if_sc"></span>
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						
					</div>
					<br>
					<div class="row" >
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-2 col-sm-1 col-xs-12">Bank Address</label>
							  <div class="col-md-10 col-sm-12 col-xs-12">
								 <textarea  rows="2" style="resize:none;" class="form-control primary description" id="bio_bank_address" name="bio_bank_address"  placeholder="Enter Bank Address"></textarea>
							  </div>
							</div>
						</div>
						<div class="col-sm-2 col-xs-12 pull-right">
						 <button  type="submit"  class="btn btn-info source" name="bio_save" id="bio_save">Save</button>
						 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</div>				
					<br>
					<!--div class="row">
						<div class="col-md-11 col-sm-8 col-xs-8 ">
							<div class="checkbox form-group pull-right">
							  <label class="control-label" ><input type="checkbox" class="same_add" value="same_pf" name="same_pf" id="same_pf"><b>Check If You want to Continue next forms with same PF Number</b></label>
							</div>
						</div>
					</div-->
					
		</form>
		       	
		       	</div>
		       	</div>
				</section>
		       	</div>
		       	</div>
		       	</div>
			    <!--Bio Tab End -->
				<?php include_once('../global/footer.php');?> 
				<?php
	if(isset($_SESSION['same_pf_no']))
	{
		echo "<script>$('.common_pf_number').val('".$_SESSION['same_pf_no']."'); </script>";
		//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
	}
?>
<script src="select2/moment.min.js"></script> 
<link rel="stylesheet" href="select2/bootstrap-datetimepicker.min.css" />
<script src="select2/bootstrap-datetimepicker.min.js"></script>
<script>
$(function () {
        $('.calender_picker').datepicker({
			format:'dd-mm-yyyy',
			autoclose:true,
			forceParse:false
			
		});
		
    });		
</script>
<script>
		
				$("#bio_pf_no").change(function(){
		if($(".bio_pf_no").text()==""){
		var bio_pf_no=$(this).val();
		//alert(bio_pf_no);
		$.ajax({
			type:'POST',
			url:'set_session.php',
			data:'action=set_pf_session&bio_pf_no='+bio_pf_no,
			success:function(html){
				//alert(html);
				 window.location='biodata_entry.php';
			} 
		});
		}else{
			alert("Enter Correct PF Format");
		}
	});
	
	$("#same_add").change(function(){
	debugger;
	if($(this).is(":checked"))
	{
		var add=$("#bio_p_addr").val();
			var state=$("#state_code").val();
			var pin=$("#pincode").val();
			//alert(pin);
			
			$("#bio_pre_addr").val(add);
			$("#state_code_2").html("<option>"+state+"</option>");
			$("#pincode_2").html("<option>"+pin+"</option>");
	}
	else{
			 $("#bio_pre_addr").val("");
			 
			  $.ajax({
				type:"post",
				url:"process.php",
				data:"action=get_state",
				success:function(data){
					//alert(data);
					$("#state_code_2").html(data);
				}
			});
			$("#pincode_2").html("<option></option>");
		} 
});
			
$(document).on("change",".bio_all_status",function(){
//$(".bio_all_status").each(function(){
	
	var gender=$("#bio_gender").val();
	var mar_status=$("#bio_marriage_status").val();
	$("#apply_name").text('');
	//alert(gender);
	//alert(mar_status);
	
	if(gender=='2' && mar_status=='2' || gender=='2' && mar_status=='5')
	{
		$("#rdo_1").show();
		$("#rdo_2").show();
	}else{
		$("#rdo_1").hide();
		$("#rdo_2").hide();
		$("#apply_name").append("Father Name");
	}

	$(".choose_name").change(function(){
		 var name=$(this).val();
		  $("#middle_name").show();
		  $("#apply_name").text('');
		  
		  if($("#rdo_1").is(":visible"))
		  {
			$("#apply_name").text('');
		  }
		  
		  if(name=='Husband')
		  {
			$("#apply_name").append("Husband Name");
		  }else{
			$("#apply_name").append("Father Name");
		  }
	 });
	 
	 
	  
});

// Pincodes
$("#state_code").change(function(){
	 
	 var state_code=$(this).val();
	  //alert(state_code);
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_pincode&state_code='+state_code,
		success:function(html){
			  //alert(html);
			$("#pincode").html(html);
		}
		 
	 });
 });
 $("#state_code_2").change(function(){
	 
	 var state_code=$(this).val();
	  //alert(state_code);
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_pincode&state_code='+state_code,
		success:function(html){
			  //alert(html);
			$("#pincode_2").html(html);
		}
		 
	 });
 });
 
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		
		$("#bio_emp_old_name").focus(function(){
		
		$(".old_name").text("Applicable in case of change in name due to marriage or gazette notification etc.");
	});
	$("#bio_emp_old_name").blur(function(){
		$(".old_name").text("");
	});
	
	var x=0;
$("#add_edu_info_1").click(function(){
	<?php dbcon(); ?>
	x++;
	var edu_drop_ini="<div class='form-group' id='"+x+"'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Edu. Qual.</label><div class=col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info["+x+"]' id='edu_pri_info"+x+"' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank' selected></option><?php $sql=mysql_query("select * from education");while($sql_fetch=mysql_fetch_array($sql)){echo "<option value='".$sql_fetch['id']."'>".$sql_fetch['education']."</option>";}?></select></div></div>";
	//alert(edu_drop_ini);
	var edu_drop_desc="<div class='form-group' id='desc_"+x+"'><input type='text' class='form-control col-md-12 col-sm-12 col-xs-12' name='bio_edu_ini["+x+"]' id='bio_edu_ini"+x+"' placeholder='Description'></div>";
	
	$("#add_edu_info_drop_1").append(edu_drop_ini);
	$("#edu_pri_info_desc_1").append(edu_drop_desc);
	
});

 $("#remove_edu_info_1").click(function(){
		 if(x>0)
		 {
			 $("#"+x).remove();
			 $("#desc_"+x).remove();
			 x--;
		 }else{
			 alert("No TextBox To Remove");
		 }
			 
	 });
var y=0;
$("#add_edu_info_2").click(function(){
	y++;
	var edu_drop_ini="<div class='form-group' id='"+y+"'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Edu. Qual.</label><div class=col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info_sub["+y+"]' id='edu_pri_info_sub"+y+"' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank' selected></option><?php $sql=mysql_query("select * from education");while($sql_fetch=mysql_fetch_array($sql)){echo "<option value='".$sql_fetch['id']."'>".$sql_fetch['education']."</option>";}?></select></div></div>";
	//alert(edu_drop_ini);
	var edu_drop_desc="<div class='form-group' id='desc_"+y+"'><input type='text' class='form-control col-md-12 col-sm-12 col-xs-12' name='bio_edu_sub["+y+"]' id='bio_edu_sub"+y+"' placeholder='Description'></div>";
	
	$("#add_edu_info_drop_2").append(edu_drop_ini);
	$("#add_edu_info_desc_2").append(edu_drop_desc);
});
$("#remove_edu_info_2").click(function(){
		 if(y>0)
		 {
			 $("#"+y).remove();
			 $("#desc_"+y).remove();
			 y--;
		 }else{
			 alert("No TextBox To Remove");
		 }
			 
	 });
	 
	 var z=0;
		 $("#add_mark_box").click(function(){
			 z++;
		 var box="<div><input type='text' class='form-control col-md-6 col-sm-12 col-xs-12' name='bio_mark["+z+"]' id='bio_mark_"+z+"' style='margin-top:20px;'></div>";
			 $("#add_iden_mark").append(box);
			 
		 });
		 $("#remove_mark_box").click(function(){
			 if(z>0)
			 {
				 $("#bio_mark_"+z).remove();
				 z--;
			 }else{
				 alert("No TextBox To Remove");
			 }
				 
		 });
		 
		 $(".choose_name").change(function(){
			 var name=$(this).val();
			  $("#middle_name").show();
			  $("#apply_name").text('');
			  if(name=='Married')
			  {
				$("#apply_name").append("Husband Name");
			  }else{
				  $("#apply_name").append("Father Name");
			  }
		 });
		 
		 	var exist=<?php echo $bio_exist;?>;
	//alert(exist);
	if(exist==1)
	{
		alert("This Pf Number is Already Registered For Biodata Check Other Forms");
		$('#biodata_form input').attr('disabled',true);
		$('#biodata_form textarea').attr('disabled',true);
		$('#biodata_form select').attr('disabled',true);
		$('#biodata_form button').attr('disabled',true);
		$('#bio_save').attr('disabled',true);
		
		// fetch bio
		$.ajax({
		type:"GET",
		url:"biodata_fetch.php",
		data:"action=get_bio_data&pf_counter="+pf_counter_id,
		success:function(data){
			//alert(data);
			var array = data.split("$");
			$("#bio_oldpf_no").val(array[0]);
			$("#bio_id_no").val(array[1]);
			$("#bio_sr_no").val(array[2]);
			$("#bio_dob").val(array[3]);
			$("#bio_aadhar").val(array[4]);
			$("#bio_emp_name").val(array[5]);
			$("#bio_emp_old_name").val(array[6]);
			$("#bio_gender").children('option').remove();
			$("#bio_gender").append(array[7]);
			$("#bio_marriage_status").children('option').remove();
			$("#bio_marriage_status").append(array[8]);
			$("#bio_rdobtn_name").val(array[9]);
			$("#bio_cug").val(array[10]);
			$("#bio_mob").val(array[11]);
			$("#bio_pran").val(array[12]);
			$("#bio_ruid").val(array[13]);
			$("#bio_pan").val(array[14]);
			$("#bio_email").val(array[15]);
			$("#bio_p_addr").val(array[16]);
			$("#state_code").children('option').remove();
			$("#state_code").append(array[17]);
			$("#pincode").children('option').remove();
			$("#pincode").append(array[18]);
			$("#bio_pre_addr").val(array[19]);
			$("#state_code_2").children('option').remove();
			$("#state_code_2").append(array[20]);
			$("#pincode_2").children('option').remove();
			$("#pincode_2").append(array[21]);
			$("#add_iden_mark").append(array[22]);
			z = array[23];
			$("#bio_religion").children('option').remove();
			$("#bio_religion").append(array[24]);
			$("#bio_commu").children('option').remove();
			$("#bio_commu").append(array[25]);
			$("#bio_cast").val(array[26]);
			$("#bio_req_code").children('option').remove();
			$("#bio_req_code").append(array[27]);
			$("#bio_grp").children('option').remove();
			$("#bio_grp").append(array[28]);
			var temp = array[29];
			var edu1 = temp.split("@");
			for(var i = 0; i < edu1.length; i++){
				if(i%2 == 0)
				$("#add_edu_info_drop_1").append(edu1[i]);
				else
				$("#edu_pri_info_desc_1").append(edu1[i]);
			}
			x = array[30];
			var temp1 = array[31];
			var edu1 = temp1.split("@");
			for(var i = 0; i < edu1.length; i++){
				if(i%2 == 0)
				$("#add_edu_info_drop_2").append(edu1[i]);
				else
				$("#add_edu_info_desc_2").append(edu1[i]);
			}
			y = array[32];
			$("#bio_bank_name").val(array[33]);
			$("#bio_acc_no").val(array[34]);
			$("#bio_micr").val(array[35]);
			$("#bio_ifsc").val(array[36]);
			$("#bio_bank_address").val(array[37]);
			//$("#bio_pf_no").val(array[37]);
                        $("#blah").attr("src","upload_doc/"+array[39]);
			

		}
	});
	}
	else{
		$('#biodata_form input').attr('disabled',false);
		$('#biodata_form textarea').attr('disabled',false);
		$('#biodata_form select').attr('disabled',false);
		$('#bio_save').attr('disabled',false);
	}
			</script>
			
			<script>
 function refresh_code()
{
	//alert('hi');
	$.ajax({
		type:'POST'	,
		url:'set_session.php',
		data:'action=set_new_pf',
		success:function(html){
			  alert(html);
			  window.location='biodata_entry.php';
		} 
	 });
}
 
function fun_call(){
 var value = document.getElementById('reason_desig').value;
 var value1 = document.getElementById('app_olddesig1').value;
	document.getElementById('hide_app_olddesig_reason').value=value;
	document.getElementById('app_olddesig').value=value1;
     //alert($("#hide_app_olddesig").val());	
}
	//$(".common_pf_number").attr('readonly',true);
 $(function(){
	$(".onlyText").on("input change paste", function() {
	    var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
	    $(this).val(newVal);
 	});

 	$(document).on("input change paste", ".onlyNumber", function() {
	    var newVal = $(this).val().replace(/[^0-9]*$/g, '');
	    $(this).val(newVal);
 	});

 	$(document).on("input change paste", ".TextNumber", function() {
	    var newVal = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '');
	    $(this).val(newVal);
 	});
	$(document).on("input change paste", ".description", function() {
	    var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');
	    $(this).val(newVal);
 	});
	});
	$("#bio_save").click(function(){
			   var val = $('#valided_text').val();
			    
				if(val!='')
				{
					alert('Please Check All Fields');
					//$("#bio_save").attr('disabled',true);
					
				}
				else 
				{
					$("#bio_save").attr('disabled',false);
				}
			
		});
		function pf_number(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{11}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".bio_pf_no").text("");
				$("#valided_text").val("");
				$(".bio").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				
				
				$(".bio_pf_no").text("PF Number Should be of 11 digits");
				$("#valided_text").val("1");
				$(".bio").addClass("has-error");
				inputtxt.value="";
				
				alert("PF Number Should be of 11 digits");  
				return false;  
				}  
		}
		function old_pf_number(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{8}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".oldpf").text("");
				$("#valided_text").val("");
				$(".old_pf").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".oldpf").text("Old PF Number Should be of 8 digits");
				$("#valided_text").val("1");
				$(".old_pf").addClass("has-error");
				alert("Old PF Number Should be of 8 digits");  
				inputtxt.value="";
				//$("#bio_oldpf_no").val("");
				return false;  
				}  
		}
		function cugnumber(inputtxt)  
		{  
		  var phoneno = /^\d{10}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".cugnum").text("");
				$("#valided_text").val("");
				$(".cug_num").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".cugnum").text("CUG number must be 10 digits");
				$("#valided_text").val("1");
				$(".cug_num").addClass("has-error");
				alert("CUG number must be 10 digits"); 
				inputtxt.value=""; 
				//$("#bio_cug").val("");
				return false;  
				}  
		}
		
		function email_valid(inputtxt)  
		{  
		  var phoneno = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".bioemail").text("");
				$("#valided_text").val("");
				$(".bio_email").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".bioemail").text("Enter Valid Email Address");
				$("#valided_text").val("1");
				$(".bio_email").addClass("has-error");
				alert("Enter Valid Email Address");  
				inputtxt.value="";
				//$("#bio_cug").val("");
				return false;  
				}  
		}
		
		function prannumber(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{16}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".pranno").text("");
				$("#valided_text").val("");
				$(".pran_no").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".pranno").text("PRAN number must be 12 digits or NPS number must be 16 digits");
				$("#valided_text").val("1");
				$(".pran_no").addClass("has-error");
				alert("PRAN number must be 12 digits or NPS number must be 16 digits"); 
				inputtxt.value=""; 
				//$("#bio_cug").val("");
				return false;  
				}  
		}
		
		function phonenumber(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{10}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".percon").text("");
				$("#valided_text").val("");
				$(".per_con").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".percon").text("Mobile number must be 10 digits");
				$("#valided_text").val("1");
				$(".per_con").addClass("has-error");
				alert("Mobile number must be 10 digits");  
				//$("#bio_mob").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		
		function pannumber(inputtxt)
		{  
		  var phoneno = /^[a-zA-Z0-9]{10}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".panno").text("");
				$("#valided_text").val("");
				$(".pan_no").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".panno").text("PAN number must be 10 digits");
				$("#valided_text").val("1");
				$(".pan_no").addClass("has-error");
				alert("PAN number must be 10 digits");  
				//$("#bio_mob").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		
		function adharnumber(inputtxt)  
		{  
		  var phoneno = /^\d{12}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".bioadhar").text("");
				$("#valided_text").val("");
				$(".bio_aadhar").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".bioadhar").text("Adhar Card number must be of 12 digits");
				$("#valided_text").val("1");
				$(".bio_aadhar").addClass("has-error");
				alert("Adhar Card number must be of 12 digits"); 
				//$("#bio_adhar").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		function ruidnumber(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{7}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".ruid").text("");
				$("#valided_text").val("");
				$(".ru_id").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".ruid").text("RUID number must be of 7 digits");
				$("#valided_text").val("1");
				$(".ru_id").addClass("has-error");
				alert("RUID number must be of 7 digits"); 
				//$("#bio_adhar").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		function micrcode(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{9}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".mi_cr").text("");
				$("#valided_text").val("");
				$(".micr").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".mi_cr").text("MICR Code must be of 9 digits");
				$("#valided_text").val("1");
				$(".micr").addClass("has-error");
				alert("MICR Code must be of 9 digits"); 
				//$("#bio_adhar").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		function ifsccode(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{11}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".if_sc").text("");
				$("#valided_text").val("");
				$(".ifsc").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".if_sc").text("IFSC Code must be of 11 digits");
				$("#valided_text").val("1");
				$(".ifsc").addClass("has-error");
				alert("IFSC Code must be of 11 digits"); 
				//$("#bio_adhar").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		
 </script>