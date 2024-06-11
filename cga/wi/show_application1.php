<?php
	$GLOBALS['flag']="1.9";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue btnz">
						<div class="portlet-title">
							<div class="caption btnboom">
											<i class="fa fa-book"></i> Application Form 
										</div>
						</div>

						<div class="portlet-body form">
							<form action="control/adminProcess.php?action=service_particulars" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
								<!-- <input type="hidden" id="curDate" value="<?php echo date('m/d/Y'); ?>"> -->
								<input type="hidden" id="curDate1" value="<?php echo date('d/m/Y') ?>">
						 <input type="hidden" id="pid" name="pid" value="<?php echo $_GET['id']; ?>">
						 <input type="hidden" id="p_emp_pfno" name="p_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
						 <input type="hidden" id="p_username" name="p_username" value="<?php echo $_GET['username']; ?>">
						 <input type="hidden" id="case" name="case" value="<?php echo $_GET['case']; ?>">
											
							<div class="form-body">

							<div class="tabbable-line ">
								<ul class="nav nav-tabs btnboom">
									<li class="active">
										<a href="#tab_15_1" data-toggle="tab">
										form </a>
									</li>
									
									<!-- <li>
										<a href="#tab_15_2" data-toggle="tab">
										 Documents </a>
									</li> -->
									<li>
										<a href="#tab_15_3" data-toggle="tab">
										 WI form </a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_15_1">
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
															<input type="text" class="form-control onlyText" id="appl_name" name="appl_name" value="<?php echo $res['applicant_name']; ?>" >
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
															<input type="text" class="form-control appl_dob" id="appl_dob" name="aapl_dob" value="<?php echo $res['applicant_dob']; ?>" >
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Gender</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<!-- <input type="text" class="form-control" id="aapl_gender" name="aapl_gender" value="<?php echo $res['applicant_gender']; ?>" > -->
															<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="<?php echo $res['applicant_gender']; ?>" ><?php echo getGender($res['applicant_gender']); ?></option>

																	<?php
																	dbcon2();
																	$query_emp =mysql_query("SELECT * from gender");

																	while($value_emp = mysql_fetch_array($query_emp))
																	{
																	echo "<option value='".$value_emp['id']."'>".$value_emp['gender']."</option>";
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
															<input type="text" class="form-control onlyNumber" onchange="phonenumber(this)" id="appl_mobile" name="appl_mobile" value="<?php echo $res['applicant_mobno']; ?>" maxlength="10">
															</div>
														</div>
													</div>
												</div>
												<div class="row">	
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
															<input type="text" class="form-control" id="appl_pan" name="appl_pan" style="text-transform: uppercase; " onchange="pannumber(this)" value="<?php echo $res['applicant_panno']; ?>" maxlength="10"  >
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Aadhar No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control onlyNumber" id="appl_aadhar" onchange="adharnumber(this)" name="appl_aadhar" value="<?php echo $res['applicant_aadharno']; ?>" maxlength="12" >
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
															<input type="text" class="form-control description" id="appl_qualification" name="appl_qualification" value="<?php echo $res['applicant_qualifiaction']; ?>" maxlength="25">
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
																	<option selected="" disabled="" >Select Maritial status</option>
																	<!-- <option value="<?php echo $res['mariatial_status']; ?>" ><?php echo getMaritailStatus($res['mariatial_status']); ?></option> -->
																	  <?php
																	  dbcon2();
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
																	<option selected="" disabled="" >Select relation with ex. employee</option>
																	<!-- <option value="<?php echo $res['relation_with']; ?>" ><?php echo $res['relation_with']; ?></option> -->
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
												</div>
													<div class="row">
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
																	<option value="SC">SC</option>  
																	<option value="ST">ST</option>  
																	<option value="OBC">OBC</option>  
																	<option value="General(UR)">General(UR)</option>  
																</select>
															</div>

														</div>
													</div>
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Permanent Address </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<textarea class="form-control description" id="p_address" name="p_address" ></textarea>
															</div>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Identification Mark 1 </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control onlyText" id="ident_mark1" name="ident_mark1" placeholder=" " maxlength="300">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Identification Mark 2 </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control onlyText" id="ident_mark2" name="ident_mark2" placeholder=" " maxlength="300">
															</div>
														</div>
													</div>
													
												</div>
												<!--<div class="row">-->
												<!--	<div class="col-md-6">-->
												<!--		<div class="form-group">-->
												<!--			<label class="control-label">Username </label>-->
												<!--			<div class="input-group">-->
												<!--			<span class="input-group-addon">-->
												<!--			<i class="fas fa-envelope"></i>-->
												<!--			</span>-->
												<!--			<input type="text"  class="form-control" id="username" name="username" value="<?php //echo $res['username']; ?>"readonly >-->
												<!--			</div>-->
												<!--		</div>-->
												<!--	</div>-->
												<!--	<div class="col-md-6">-->
												<!--		<div class="form-group">-->
												<!--			<label class="control-label">Password<span style="color:red;">*</span>  <small style="color:red;">Password is Date of Birth of Appliacnt without any (/)</small> </label>-->
												<!--			<div class="input-group">-->
												<!--			<span class="input-group-addon">-->
												<!--			<i class="fas fa-envelope"></i>-->
												<!--			</span>-->
												<!--			<input type="text"  class="form-control" id="password" name="password" value="<?php //echo $res['applicant_dob']; ?>" readonly>-->
												<!--			</div>-->
												<!--		</div>-->
												<!--	</div>-->
												<!--</div>-->
													
												<hr>	
													<button type='button' class='btn btn-primary pull-right' id='add_member' name='add_member'>  Add Family Member</button>
													<br>
													<br>
													<input type="hidden" name="count" id="count" value="1">
													<!-- <div id='dyn_fam_member' class='row'>
													
													</div> -->
													
												<div class='row'>
														<h4>&emsp;Family Member 1</h4>
													<div class="col-md-6">
													
														<div class="form-group">
															<label class="control-label">Member Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control onlyText" id="fam_mem_name_1" name="fam_mem_name_1" placeholder=" ">
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
															<input type="text" class="form-control onlyNumber" id="fam_mem_mobno_1" name="fam_mem_mobno_1" placeholder=" " onchange="m_phonenumber(this)" maxlength="10">
															</div>
														</div>
													</div>
												</div>
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Pan No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_panno_1" name="fam_mem_panno_1" style="text-transform: uppercase; " onchange="m_pannumber(this)" maxlength="10">
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
															<input type="text" class="form-control onlyNumber" id="fam_mem_aadharno_1" name="fam_mem_aadharno_1" placeholder=" " onchange="m_adharnumber(this)" maxlength="12">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Relation </label>
															<select name="fam_mem_rel_1" id="fam_mem_rel_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											<option value="" selected disabled>Select Status</option>
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

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Maritial Status</label>
															
																<select name="fam_mem_maritial_st_1" id="fam_mem_maritial_st_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="" selected disabled>Select Status</option>
																	  <?php
																	  dbcon2();
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
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member DOB</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control appl_dob" id="fam_mem_dob_1" name="fam_mem_dob_1" placeholder=" ">
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
															<input type="text" class="form-control dtpicker description1" id="fam_mem_qualif_1" name="fam_mem_qualif_1" placeholder=" " maxlength="20">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Employed or Otherwise</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control dtpicker description1" id="fam_mem_employedorother_1" name="fam_mem_employedorother_1" maxlength="20">
															</div>
														</div>
													</div>
												</div>



																							
												
													<div id='dyn_fam_member'>
													
													</div>
													
												</div>
											</div>
												
												
									<div class="tab-pane " id="tab_15_3">
										<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div style="margin-left: 25px" class="table-responsive">
													<table  class="table table-bordered table-striped" style="width: 85%;">
														<tbody>
															<?php 
															dbcon2();
																$sql=mysql_query("SELECT * from drmpsurh_sur_railway.resgister_user where emp_no='".$_GET['ex_emp_pfno']."' ");
         														$res=mysql_fetch_array($sql);
															?>
															<tr>
																<td style="width: 30px;">1</td>
																<td style="width: 323px;">Name of the Employee</td>
																<td><?php echo $res['name']; ?></td>
															</tr>
																<tr>
																<td>2</td>
																<td>Whether belongs to SC/ST/OBC</td>
																<td><?php //echo $res['community']; ?></td>
															</tr>
															<tr>
																<td>3</td>
																<td>Design & place of last working</td>
																<td><?php echo designation($res['designation'])." &  (".$res['station'].")"; ?></td>
															</tr>
																<tr>
																<td>4</td>
																<td>Scale & rate of pay</td>
																<td><?php   echo $res['basic_pay'];  ?></td>
															</tr>
																<tr>
																<td>5</td>
																<td>Date of Birth</td>
																<td><?php echo $res['dob']; ?></td>
															</tr>
																<tr>
																<td>6</td>
																<td>Date of Appointment<br>(Note:copy of the service certificate has to be enclosed in support of the information against item 1 to 6 )</td>
																<td><?php echo $res['doa']; ?></td>
															</tr>
																<tr>
																<td>7</td>
																<td>Date of death/medical decategorised /medically unfit/missing</td>
																<td>
																	<?php
																	dbcon1();
																		$sql=mysql_query("SELECT * from category where id='".$_GET['case']."'");
																		$res=mysql_fetch_array($sql);
																		if($res['id']==1)
																		{
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="expiry_date" placeholder=" ">';

																		}
																		elseif ($res['id']==2) 
																		{
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="missing_date" placeholder=" ">';
																			
																		}
																		elseif ($res['id']==3) 
																		{
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="date_of_md" placeholder="Date Of Medically decategorized ">';
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="date_of_vr" placeholder="Date Of Voluntary ">';
																		}
																		elseif ($res['id']==4) 
																		{
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="txtdomd" placeholder="Date Of Med Decat ">';
																			echo '<input type="text" class="form-control appl_dob f_date" id="" name="txtdor" placeholder="Date Of Retd ">';
																		}
																	?>
																	
															</tr>									
															<tr>
																<td>8</td>
																<td>Whether death is due to accident on duty, if so, particulars of compensation paid.</td>
																<td><input type="text" class="form-control" name="due_to_accident"></td>
																
															</tr>									
															<tr>
																<td>9</td>
																<td>Priority no. under which the case falls</td>
																<td><input type="text" name="priority_no" class="form-control"></td>
															</tr>
															<tr>
																<td>10</td>
																<td>Cause of death /reason for medical unfitness /decategorisation</td>
																<td><input type="text" name="cause_death/medical" class="form-control"></td>
															</tr>
															<tr>
																<td>11</td>
																<td>The period of sickness in case of medical unfit / decategorisation</td>
																<td><input type="text" name="period_sickness" class="form-control"></td>
															</tr>
															<tr>
																<td>12</td>
																<td>Total service</td>
																<td><input type="text" name="total_service" class="form-control"></td>
															</tr>
															<tr>
																<td>13</td>
																<td>Date on which the alternative job offered (furnish Design/deptt & scale of the alternative post enclose copy of the alternative appointment).</td>
																<td><textarea name="alt_job_offered" class="form-control" rows="2"></textarea></td>
															</tr>
															<tr>
																<td>14</td>
																<td>Whether alternative appointment on same emolument offered or otherwise</td>
																<td><textarea name="apptmt_emolumt" class="form-control" rows="2"></textarea></td>
															</tr>
															<tr>
																<td rowspan="6">15</td>
																<td >Emoluments the employee has been drawing before decategorisation & BP also the post offered on alternative appointment.</td>
																<td ><p style="text-align: center;width: 50%;float: left;">Before</p> <p style="text-align: center;width: 50%;float: right;">After</p></td>
															</tr>
															<tr >
																<td>BP</td>
																<td ><input type="text" class="form-control" style="width: 47%;float: left;margin-right: 10px;" name="before_bp"> <input type="text" style="width: 48%;" class="form-control" name="after_bp"></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>DA</td>
																<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_da"><input type="text" class="form-control" style="width: 48%;" name="after_da"></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>HRA</td>
																<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_hra"><input type="text" style="width: 48%;" class="form-control" name="after_hra"></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>CCA</td>
																<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_cca"><input type="text" style="width: 48%;" class="form-control" name="after_cca"></td>
																<!-- <td></td> -->
															</tr>
															<tr>
																<td>OTHERS</td>
																<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_others"><input type="text" style="width: 48%;" class="form-control" name="after_others"></td>
																<!-- <td></td> -->
															</tr>
															
															<tr>
																<td>16</td>
																<td>Is there drop in emolument ,percentage of drop on alternative appointment.</td>
																<td><textarea class="form-control" name="drop_in_emlmt"></textarea></td>
															</tr>
															<tr>
																<td>17</td>
																<td>Reasons if any, for not accepting the altenative appointment (Encl copy of refusal)</td>
																<td><textarea class="form-control" name="not_accepting_alter"></textarea></td>
															</tr>
															<tr>
																<td>18</td>
																<td>Date on which the service terminated / compulsory retd. due to non_acceptance of alternative appt OR retired without waiting for alternative appt (Encl copy of office order)</td>
																<td><textarea class="form-control" name="service_terminated/compulsory_retd" rows="3"></textarea></td>
															</tr>
															<tr>
																<td rowspan="8">19</td>
																<td>Settlement dues paid</td>
																<td></td>
															</tr>
															<tr>
																<td>PF:</td>
																<td><input type="text" class="form-control" name="pf"></td>
															</tr>
															<tr>
																<td>DCRG:</td>
																<td><input type="text" class="form-control" name="dcrg"></td>
															</tr>
															<tr>
																<td>GIS:</td>
																<td><input type="text" class="form-control" name="gis"></td>
															</tr>
															<tr>
																<td>IL:</td>
																<td><input type="text" class="form-control" name="il"></td>
															</tr>
															<tr>
																<td>LE:</td>
																<td><input type="text" class="form-control" name="le"></td>
															</tr>
															<tr>
																<td>Compensation in regard to WCA:</td>
																<td><input type="text" class="form-control" name="wca"></td>
															</tr>
															<tr>
																<td>Others:</td>
																<td><input type="text" class="form-control" name="other"></td>
															</tr>
															<tr>
																<td>20</td>
																<td>Pension /family pension sanction with relief</td>
																<td><input type="text" class="form-control" name="family_pension"></td>
															</tr>
															<tr>
																<td>1</td>
																<td>Whether employed else were including in railways as CL/Sub & reasons for leaving the job (with particulars of employment viz. post held since when and monthly emolument) </td>
																<td><textarea class="form-control" rows="3" name="cl/sub_reasons"></textarea></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Whether eligible for the post of Gr. C or D based on educational qualification? </td>
																<td><!-- <input type="text" class="form-control"  name="eligible_group"> -->
																	<select name="eligible_group" id="eligible_group" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																<option value="" selected disabled>Select Eligible Category</option>
																<!-- <option value="Group A">Group A</option>								
																<option value="Group B">Group B</option> -->								
																<option value="Group C">Group C</option>								
																<option value="Group D">Group D</option>												
															</select>
																</td>
															</tr>
															<tr>
																<td>3</td>
																<td>Date of receipt of application (for compassionate appointment and from whom Encl copy)</td>
																<td><textarea class="form-control" rows="3" name="date_of_receipt"></textarea></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Whether the widow has remarried or otherwise (encl declaration of the widow) </td>
																<td><textarea class="form-control" rows="3" name="widow_remarried"></textarea></td>
															</tr>
															<tr>
																<td>5</td>
																<td>Whether the widow has applied for appointment for herself or forward within the time limit of 5 years from the date of death of deceased employee. </td>
																<td><textarea class="form-control" rows="3" name="widow_applied_appmt"></textarea></td>
															</tr>
															<tr>
																<td>6</td>
																<td>Reason why she could not apply for appointment for herself or forward within five years. </td>
																<td><textarea class="form-control" rows="3" name="not_apply_appmt"></textarea></td>
															</tr>
															<tr>
																<td>7</td>
																<td>In the case the ward is minor at the time of death of the deceased,whether the widow has applied within 2 years from the date of the candidate attained majority.  </td>
																<td><textarea class="form-control" rows="3" name="attained_majority"></textarea></td>
															</tr>
															<tr>
																<td>8</td>
																<td>Detail remarking as on the circumtances of the case warranting relaxation of time limit of 5 to 20 years. </td>
																<td><textarea class="form-control" rows="3" name="warranting_time_limit"></textarea></td>
															</tr>
															<tr>
																<td>9</td>
																<td>Whether relaxation in the age is required, if so to what extant (while seeking age relaxation the provision of age limit for SC/ST candidates has to be observed). </td>
																<td><textarea class="form-control" rows="3" name="relaxation_age_req"></textarea></td>
															</tr>
															<tr>
																<td>10</td>
																<td>Date on which proforma filled and report submitted  </td>
																<td><textarea class="form-control" rows="3" name="filled_n_report_submit"></textarea></td>
															</tr>
															<tr>
																<td>11</td>
																<td>Special or any other particulars considered relevant in the case: </td>
																<td><textarea class="form-control" rows="4" name="other_particulars"></textarea></td>
															</tr>

														</tbody>
													</table>
													</div>

													<div class="row">
														
														
														<div class="col-md-6" style="margin-left: 20px;">
															<div class="form-group">
																<label class="control-label">Present financial status of the family indicating land, immovable and movable property with details</label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
																</span>
																<textarea class="form-control" rows="5" name="twenty_one"></textarea>
																</div>
															</div>
														</div>
														<div class="col-md-6" style="margin-left: 20px;">
															<div class="form-group">
																<label class="control-label">Upload Verified Documents / Files<span style="color:red;">*</span>  <small style="color:red;">documents(in pdf format) & images(in jpg or png)</small> </label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
																</span>
																<input type="file" multiple="multiple" class="form-control" id="file" name="file[]" accept="image/jpeg,image/png,application/pdf"  placeholder=" ">
																</div>
															</div>
														</div>
													</div>
											</div>
																				
							

						</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions right">
												<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'>Submit </button><!-- 
												<a class='btn blue btnn' data-toggle='modal' href='#basic'> </a> -->
												&nbsp;
												<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
	include 'common/footer.php';
?>



<script>
  $(function() {
        
    //  $('#fam_mem_dob_1').datepicker({
    //  	format:'dd/mm/yyyy',
    //   autoclose: true
    // });
     $('.appl_dob').datepicker({
     	format:'dd/mm/yyyy',
      autoclose: true
    });

 }); 
 
 
 $(document).on("click",".submit_btn",function(){

    if( document.getElementById("file").files.length == '' ){
    alert("Please select file....");
}

});


  document.getElementById("file").onchange = function(){  // on selecting file(s)
    for(var file in this.files){ // loop over all files
        if(isNaN(file) === false){  // if it is actually a file and not any other property
            if(this.files[file].type !== "application/pdf" && this.files[file].type !== "image/jpeg" && this.files[file].type !== "image/png"){ // if NOT PDF!!
                alert('Please select PDFs and img files only.');
                $("#file").val('');
                return false;
            }
        }
    }
    var oFile = document.getElementById("file").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
    	for(var file in this.files)
    	{
    		if(isNaN(file)===false)
    		{
    			if (this.files[file].size > 9097152) // 2 mb for bytes.
            	{
                	alert("Please check selected any of the file size is greater 9mb!..  please select file under 9mb!");
                	$("#file").val('');
                	return;
            	}

    		}
    	}
    // alert('Yay!! All selected files are in PDF format.');
    // return true;
}

var cnt=1;

$("#add_member").click(function(){
//alert("hello");

cnt=cnt+1;
// alert(cnt);
		 $.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_family_form&cnt="+cnt,
		success:function(data){
		  //alert(data);
		  $("#dyn_fam_member").prepend(data);
		  $("#count").val(cnt);
		
		 // alert(family_counter);
	
		  }
	});
});

$(function(){

$(".onlyText").on("input change paste", function() {

var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');

$(this).val(newVal);


});



$(document).on("input change paste", ".onlyNumber", function() {

var newVal = $(this).val().replace(/[^0-9]*$/g, '');

$(this).val(newVal);

});
});

// $(document).on('change','#appl_dob',function(){
//   	var dob=$("#appl_dob").val();
	
// 	$("#password").val(dob);

//   });

$("#appl_dob").on("change", function(){
    var dob=$("#curDate1").val();
    var doa=$("#appl_dob").val();
    // alert("curr "+dob);
    // alert("DOB "+doa);
    // $('#emp_doa').val(doa);
    var parts = dob.split("/");
    var s=new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split("/");
    var s1=new Date(parts1[2], parts1[1] - 1, parts1[0]);
    // alert(s);
    // alert(s1);
    if(s1 >= s){
      alert('Please select valid Date of Birth');
      $("#appl_dob").val("");
      $("#appl_dob").focus();
    }
  });

function phonenumber(inputtxt)  
    {  
    
      var phoneno = /^[6789]\d{9}$/;  
      if((inputtxt.value.match(phoneno)))  
      {  
        return true;  
        }  
        else  
        {  
        $("#appl_mobile").val("");
         $("#appl_mobile").focus();
        alert("Invalid Mobile number");  
        
        return false;  
        }  
    }

     function pannumber(inputtxt)
        {  
              var phoneno = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;  
              
             
               if((inputtxt.value.match(phoneno)))  
                {  
                    return true;  
                    
                }  
              else  
                {    
                    alert("Please enter in proper format... "); 
                    $('#appl_pan').val("");
                    $('#appl_pan').focus();
                    return false;  
                }  
        }
        function adharnumber(inputtxt)  
        {  
              var phoneno = /^\d{12}$/;  
              if((inputtxt.value.match(phoneno)))  
                {  
                    //$(".span_id7").text("");
                   
                    return true;  
                }  
              else  
                {  
                    //$(".span_id7").text("Adhar Card number must be of 12 digits");
                    alert("Adhar Card number must be of 12 digits"); 
                    $("#appl_aadhar").val("");
                    $("#appl_aadhar").focus();
                    return false;  
                }  
        }


    $(document).on("input change paste", ".description", function() {

        var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');

        $(this).val(newVal);

    });
    $(document).on("input change paste", ".description1", function() {

        var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');

        $(this).val(newVal);

    });

    function m_pannumber(inputtxt)
        {  
              var phoneno = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;  
              
             
               if((inputtxt.value.match(phoneno)))  
                {  
                    return true;  
                    
                }  
              else  
                {    
                    alert("Please enter in proper format... "); 
                    $('#fam_mem_panno_1').val("");
                    $('#fam_mem_panno_1').focus();
                    return false;  
                }  
        }
        function m_adharnumber(inputtxt)  
        {  
              var phoneno = /^\d{12}$/;  
              if((inputtxt.value.match(phoneno)))  
                {  
                    //$(".span_id7").text("");
                   
                    return true;  
                }  
              else  
                {  
                    //$(".span_id7").text("Adhar Card number must be of 12 digits");
                    alert("Adhar Card number must be of 12 digits"); 
                    $("#fam_mem_aadharno_1").val("");
                    $("#fam_mem_aadharno_1").focus();
                    return false;  
                }  
        }
        function m_phonenumber(inputtxt)  
    {  
    
      var phoneno = /^[6789]\d{9}$/;  
      if((inputtxt.value.match(phoneno)))  
      {  
        return true;  
        }  
        else  
        {  
        $("#fam_mem_mobno_1").val("");
         $("#fam_mem_mobno_1").focus();
        alert("Invalid Mobile number");  
        
        return false;  
        }  
    }
    $("#fam_mem_dob_1").on("change", function(){
    var dob=$("#curDate1").val();
    var doa=$("#fam_mem_dob_1").val();
    // alert("curr "+dob);
    // alert("DOB "+doa);
    // $('#emp_doa').val(doa);
    var parts = dob.split("/");
    var s=new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split("/");
    var s1=new Date(parts1[2], parts1[1] - 1, parts1[0]);
    // alert(s);
    // alert(s1);
    if(s1 >= s){
      alert('Please select valid Date of Birth');
      $("#fam_mem_dob_1").val("");
      $("#fam_mem_dob_1").focus();
    }
  });

    $(".f_date").on("change", function(){
    var dob=$("#curDate1").val();
    var doa=$(".f_date").val();
    // alert("curr "+dob);
    // alert("DOB "+doa);
    // $('#emp_doa').val(doa);
    var parts = dob.split("/");
    var s=new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split("/");
    var s1=new Date(parts1[2], parts1[1] - 1, parts1[0]);
    // alert(s);
    // alert(s1);
    if(s1 >= s){
      alert('Please select valid Date..');
      $(".f_date").val("");
      $(".f_date").focus();
    }
  });
</script>