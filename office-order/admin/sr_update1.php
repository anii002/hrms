<?php 
 session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php'); 
include('mini_function.php');

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script src="javascript.js"></script>
<style>
/* .nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}
 */
 
 /*----- Tabs -----*/
.tab {
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#7FB5DA;
            font-size:16px;
            font-weight:600;
            color:#4c4c4c;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.active a, li.active a:hover {
        background:#fff;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }

.nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}
</style>
<div class="content-wrapper" style="margin-top: -20px;">
   <section class="content"> 
      <div class="row">
	     <div class="box box-info">
			<div class="box box-warning box-solid">
			    <div class="box-header with-border">
					 <ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
						<li class="active"><a href="#bio" data-toggle="tab"><b>Bio Data</b></a></li>
						<li class="medical_initial"><a href="#medical" data-toggle="tab"><b>Medical Details</b></a></li>
						<li class=""><a href="#appointment" data-toggle="tab"><b>Initial Appointment</b></a></li>
						<li class=""><a href="#present_appointment" data-toggle="tab"><b>Present Working Details</b></a></li>					
						<li class="prft_prm"><a href="#prft" data-toggle="tab"><b>PRFT</b></a></li> 
						<li class=""><a href="#penalty" data-toggle="tab"><b>Penalty</b></a></li> 
						<li class=""><a href="#increment" data-toggle="tab"><b>Increment</b></a></li>	
						<li class=""><a href="#awards" data-toggle="tab"><b>Awards</b></a></li> 
						 <li class=""><a href="#family" data-toggle="tab"><b>Family Composition</b></a></li> 
						
						<li class=""><a href="#nominee" data-toggle="tab"><b>Nominee(s)</b></a></li>
						
						<li class=""><a href="#advance" data-toggle="tab"><b>Advance</b></a></li> 
						<li class=""><a href="#property" data-toggle="tab"><b>Property</b></a></li> 
						<li class=""><a href="#traning" data-toggle="tab"><b>Training</b></a></li>  
						<li class=""><a href="#extra_entry" data-toggle="tab"><b>Last Entry</b></a></li>  
						<li class=""><a href="#leave" data-toggle="tab"><b>Online Office Order</b></a></li>
               </div>
		<div class="box-body"> 
			<div class="tab-content">			
			     <!--Bio Tab Start -->
				<div class="tab-pane active in" id="bio">
					<div class="box-header with-border">
						  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Bio-Data </h3>
					</div>
		<form class="form-horizontal" action="bio_process.php?action=update_biodata" method="POST" enctype="multipart/form-data" id="biodata_form">	
				<div class="row">
				<input type="hidden" name="valided_text" id="valided_text">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber common_pf_number" placeholder="Enter PF Number" required onChange="pf_number(this)" maxlength="11" readonly>
									<span class="help-block bio_pf_no"></span>
								  </div>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group old_pf">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Old PF Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="bio_oldpf_no" name="bio_oldpf_no" class="form-control form-text TextNumber" placeholder="Enter PF Number" onChange="old_pf_number(this)" maxlength="8" readonly>
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
								$bio_sr_no = mt_rand(100000, 999999);
								?>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >SR Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="bio_sr_no" name="bio_sr_no" value="0107<?php echo $bio_sr_no ?>" class="form-control" readonly>
								  </div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Birth</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 <input type="text" class="form-control" size="30" id="bio_dob" name="bio_dob"/>
								  </div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio_aadhar">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Aadhar No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="bio_aadhar" name="bio_aadhar" class="form-control onlyNumber" placeholder="Enter Aadhar No" required onChange="adharnumber(this)" maxlength="12">
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
									<input type="text" id="bio_emp_old_name" name="bio_emp_old_name" class="form-control onlyText" placeholder="First Name      Middle Name        Last Name" required>
									<span class="old_name" style="color:red;"></span>
								  </div>
								</div>
							</div>
						</div><br>
					</div>
					<div class="col-md-3">
					  <img id="blah" src="avatar5.png"/><br>
					  <input type='file' class="form-control" accept="image/*" onchange="readURL(this);" name="imgs" id="imgs" />
					</div>	
				</div><br>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Gender</label>
						  <div class="col-md-9 col-sm-8 col-xs-12">
							<select name="bio_gender" id="bio_gender" class="form-control bio_all_status" style="margin-top:0px; width:100%;" required>
								<option value="blank" disabled selected></option>
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
							<select name="bio_marriage_status" id="bio_marriage_status" class="form-control bio_all_status" style="margin-top:0px; width:100%;" required>
								<option value="blank" selected></option>
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
							<input type="text" id="bio_rdobtn_name" name="bio_rdobtn_name" class="form-control onlyText" placeholder="First Name      Middle Name     Last Name" required>
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
							<input type="text" id="bio_cug" name="bio_cug" class="form-control onlyNumber" placeholder="Enter CUG No" required onChange="cugnumber(this)" maxlength="10">
							<span class="help-block cugnum"></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group per_con">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Personal Mobile Number</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" id="bio_mob" name="bio_mob" class="form-control onlyNumber" placeholder="Enter Personal Mobile No" required onChange="phonenumber(this)" maxlength="10">
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
								<input type="text" id="bio_pran" name="bio_pran" class="form-control TextNumber" placeholder="Enter PRAN/NPS Number" onchange="prannumber(this)" required maxlength="12">
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
							<input type="text" id="bio_pan" name="bio_pan" class="form-control TextNumber" placeholder="Enter PAN Card No" onChange="pannumber(this)" required maxlength="10">
							<span class="help-block panno"></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group bio_email">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >E-mail Address</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<input type="email" id="bio_email" name="bio_email" class="form-control" placeholder="Enter E-mail" required onblur="email_valid(this);"> 
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
								 <textarea  rows="2" style="resize:none;" class="form-control primary description" id="bio_p_addr" name="bio_p_addr"  placeholder="Enter Present Address" required></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">State Code</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<select class="form-control" name="state_code" id="state_code" required style="width:100%;">
										<option value="blank" selected></option>
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
									<select class="form-control" name="pincode" id="pincode" required style="width:100%;">
										<option value="blank" selected></option>
										 
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
								<textarea style="resize:none;"  rows="2"  class="form-control primary description" id="bio_pre_addr" name="bio_pre_addr"  placeholder="Enter Permanent Address" required></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">State Code</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<select class="form-control" name="state_code_2" id="state_code_2" required style="width:100%;">
										<option value="blank" selected></option>
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
									<select class="form-control" name="pincode_2" id="pincode_2" required style="width:100%;">
										<option value="blank" selected></option>
										 
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
								<select name="bio_religion" id="bio_religion" class="form-control select2" style="margin-top:0px; width:100%;" required>
									<option value="blank" selected></option>
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
								<select name="bio_commu" id="bio_commu" class="form-control select2 " style="margin-top:0px; width:100%;" required>
									<option value="blank" selected></option>
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
									<option value="blank" selected></option>
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
								<select name="bio_grp" id="bio_grp" class="form-control" style="margin-top:0px; width:100%;" required>
									<option value="blank" selected></option>
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
							Qualification at the time of Subsequent</label>
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
								<input type="text" id="bio_micr" name="bio_micr" class="form-control TextNumber" placeholder="Enter MICR Number" maxlength="9" onChange="micrcode(this)" required>
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
								 <textarea  rows="2" style="resize:none;" class="form-control primary description" id="bio_bank_address" name="bio_bank_address"  placeholder="Enter Bank Address" required></textarea>
							  </div>
							</div>
						</div>
					</div>				
					<br>
					<div class="col-sm-2 col-xs-12 pull-right">
						 <button  type="submit"  class="btn btn-info source" name="bio_saveBtn" id="bio_saveBtn">Save</button>
						 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
		</form>
		        </div>	
			    <!--Bio Tab End -->
				<!--medical Tab Start -->
		<div class="tab-pane" id="medical">
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
						<li class="" ><a href="#medical" data-toggle="tab"><b>Initial</b></a></li>
						<li class=""><a href="#last_medi" data-toggle="tab"><b>Last Medical</b></a></li>
						<li class=""><a href="#medi_history" data-toggle="tab"><b>Medical History</b></a></li>
						</ul>
				 
			</div>
			<form id="form_medical" class="apply_readonly" action="process_main.php?action=add_initial_medical" method="POST" >
				<div class="modal-body">
					<div class="row">
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
									}
									else{
									$dob="";
								   }
									$sql1=mysql_query("select * from medical_temp where medi_pf_number='$last_pf' ORDER BY id  LIMIT 1");
									//echo "select * from medical_temp where medi_pf_number='$last_pf' ORDER BY id  LIMIT 1".mysql_error();
									$cnt=mysql_num_rows($sql1);
									if($cnt>0){
										$result=mysql_fetch_array($sql1);
										
											$ini_medi_examtype=$result['medi_examtype'];
											$ini_medi_cate=get_medi_category($result['medi_cate']);
											$ini_medi_dob=$result['medi_dob'];
											$ini_medi_appo_date=$result['medi_appo_date'];
											$ini_medi_class=$result['medi_class'];
											$ini_medi_design=get_designation($result['medi_design']);
											$ini_medi_certino=$result['medi_certino'];
											$ini_medi_certidate=$result['medi_certidate'];
											$ini_medi_refno=$result['medi_refno'];
											$ini_medi_refdate=$result['medi_refdate'];
											$ini_medi_remark=$result['medi_remark'];
										
										}
									else{
											//$_SESSION['same_pf_no']="";
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
								
								?>
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary TextNumber common_pf_number" value="<?php echo $last_pf;?>" readonly />
							  </div>
							</div>
						</div>
						
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Category</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat" id="medi_cat" class="form-control" style="margin-top:0px; width:100%;" required>
										<option value="" selected><?php echo $ini_medi_cate;?></option>
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
								
								<input type="text" class="form-control" readonly value="<?php echo $ini_medi_dob;?>">
								
								</div>
                            </div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Appointment</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" class="form-control" value="<?php echo $ini_medi_appo_date;?>"  required>
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
								<select class="form-control primary" id="in_med_desig" name="in_med_desig" style="margin-top:0px; width:100%;" required>
								<option value="" selected><?php echo $ini_medi_design;?></option>
								
								</select>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Class For PME</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat_pme" id="medi_cat_pme" class="form-control" style="margin-top:0px; width:100%;" required>
									
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
								<select name="medi_exam" id="medi_exam" class="form-control" style="margin-top:0px; width:100%;" required>
										<option value="" selected><?php echo $ini_medi_examtype;?></option>
										<option value="initial">Initial</option>
										<option value="periodic">Periodic</option>
										<option value="special">Special</option>
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
								<input type="text" value="<?php echo $ini_medi_certino;?>" class="form-control" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="date" value="<?php echo $ini_medi_certidate;?>" class="form-control">
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
								 <textarea  rows="2" style="resize:none;" class="form-control primary"><?php echo $ini_medi_refno;?></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" class="form-control" value="<?php echo $ini_medi_refdate;?>">
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
							 <textarea  rows="3" style="resize:none" class="form-control primary description"><?php echo $ini_medi_remark;?></textarea>
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
			</form>
		</div> 
	<!--medical Tab End -->
	<div class="tab-pane" id="last_medi">
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#medical" data-toggle="tab"><b>Initial</b></a></li>
						<li class=""><a href="#last_medi" data-toggle="tab"><b>Last Medical</b></a></li>
						<li class=""><a href="#medi_history" data-toggle="tab"><b>Medical History</b></a></li>
						</ul>
				 
			</div>
			<form method="post" id="form_medical" class="apply_readonly">
			
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
							$medi_dob=$result['medi_dob'];
							$medi_appo_date=$result['medi_appo_date'];
							$medi_class=$result['medi_class'];
							$medi_design=get_designation($result['medi_design']);
							$medi_certino=$result['medi_certino'];
							$medi_certidate=$result['medi_certidate'];
							$medi_refno=$result['medi_refno'];
							$medi_refdate=$result['medi_refdate'];
							$medi_remark=$result['medi_remark'];
							$datetime=$result['datetime'];
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
						
					</div>
				</div>
			</form>
		</div> 
		<div class="tab-pane" id="medi_history">
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#medical" data-toggle="tab"><b>Initial</b></a></li>
						<li class=""><a href="#last_medi" data-toggle="tab"><b>Last Medical</b></a></li>
						<li class=""><a href="#medi_history" data-toggle="tab"><b>Medical History</b></a></li>
			</ul>
				 
			</div>
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
							echo "<td>".$result['medi_certidate']."</td>";
							echo "<td><a href='#' class='btn btn-primary'>View</a></td>";
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
	 
	<!--Appointment Tab Start -->
		<div class="tab-pane" id="appointment">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Initial Appointment </h3>
			</div>
			
			<form method="post" action="process_main.php?action=update_appointment">
			
			<div class="modal-body">
				<div class="row">
					 
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control primary TextNumber" value="<?php echo $_SESSION['set_update_pf'];?>" id="app_pf_no" name="app_pf_no" readonly />
						  </div>
						  <div class="col-md-1 col-sm-8 col-xs-12">
							 <!--label><i class="fa fa-check" aria-hidden="true" style="color:green"></i></label--> 
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Type of Initial Appointment</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control" id="initial_type" name="initial_type"  required>
									<option value="" selected hidden disabled>-- Select Initial Appointment --</option>
									<!--<?php
									/* $sqlDept=mysql_query("select * from appointment_type");
									while($rwDept=mysql_fetch_array($sqlDept))
									{ */
									?>
									<option value="<?php //echo $rwDept["id"]; ?>"><?php //echo $rwDept["type"];?></option>
									<?php
									//}
								
									?>-->
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Department</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth" >Engagement Department</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary" id="app_dept" name="app_dept" style="margin-top:0px; width:100%;" required>
							
							</select>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg"> Designation<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Designation<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary" id="app_desig" name="app_desig" style="margin-top:0px; width:100%;" required>
							<option value="blank" selected></option>
							<?php
								/* $sqlDept=mysql_query("select * from designation");
								while($rwDept=mysql_fetch_array($sqlDept))
								{ */
								?>
								<option value="<?php// echo $rwDept["id"]; ?>"><?php //echo $rwDept["desiglongdesc"];?></option>
								<?php
								//}
							
								?>
							</select>
						  </div>
						</div>
					</div>
						<script>
							
					</script>
				</div>
				<br>
				 
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth1" >
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control primary" id="app_other_desig" name="app_other_desig" placeholder="Enter Other Designation" />
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="appo_date">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Appointment</label>

						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="date" class="form-control primary" id="app_date" name="app_date" />
						  </div>
						</div>
					</div>
					
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg" >Date Of Regularisation</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth" >Date Of Engagement</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="date" class="form-control primary" id="app_datereg" name="app_datereg"  />
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Pay Scale TYPE</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Pay Scale TYPE</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary ps_type" id="ps_type_1" name="ps_type_1" style="margin-top:0px; width:100%;" required>
									
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>	
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Group<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Group<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary" id="app_group"  style="margin-top:0px; width:100%;" name="app_group" required>
									<option value="blank" selected></option>
									<?php
									/* $group_col=mysql_query("select * from group_col");
									while($group_colre=mysql_fetch_array($group_col))
									{ */
									?>
									<option value="<?php //echo $group_colre["id"]; ?>"><?php //echo $group_colre["group_col"]; ?></option>
									<?php
									//}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="level_1">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Level<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Level<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary" id="app_level" style="margin-top:0px; width:100%;"  name="app_level" >
									<option value="blank" selected></option>
									 <?php
										/* $sqlDept=mysql_query("select distinct(7_pc_level) from scale");
										while($rwDept=mysql_fetch_array($sqlDept))
										{ */
										?>
										<option value="<?php //echo $rwDept["7_pc_level"]; ?>"><?php //echo $rwDept["7_pc_level"]; ?></option>
										<?php
										//}
									?>
								</select>
							</div>
						</div><br><br>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="scale_1">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary" id="app_scale" name="app_scale" style="margin-top:0px; width:100%;" >
									<option value="blank" selected></option>
										 <?php
											 /* $sqlDept=mysql_query("select distinct(6_cpc_scale) from scale");
											 while($rwDept=mysql_fetch_array($sqlDept))
											 { */
											 ?>
											 <option value="<?php //echo $rwDept["6_cpc_scale"]; ?>"><?php //echo $rwDept["6_cpc_scale"]; ?></option>
											<?php
											// }
										?>
								</select>
							</div>
						</div><br><br>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Station<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Station<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="hidden" id="station_id3" name="station_id3" class="other">
								<input type="text" class="form-control primary station" id="station3" name="station3" required data-toggle="modal" data-target="#station" readonly>
									
							</div>
						</div>
					</div>
						
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Rate Of Pay<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Rate Of Pay<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="text" class="form-control primary onlyNumber" id="app_rop" name="app_rop"   placeholder="Enter ROP" required />
						  </div>
						</div>
					</div>	
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Workplace<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement  Workplace<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" class="form-control primary app_depot depot bill_unit" id="depot3" name="depot3" required readonly data-toggle="modal" data-target="#bill_unit_select">
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Appointment Reference No<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement  Reference No<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary TextNumber" id="app_letterno" name="app_letterno"   placeholder="Enter Letter No" required />
							</div>
                        </div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Appointment Letter Date</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement  Letter Date</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="date" class="form-control primary" id="app_letterdate" name="app_letterdate" required />
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-2 lbl_reg">Remarks</label>
						<label class="control-label col-md-2 lbl_oth" >Engagement Remarks</label>
						  <div class="col-md-10">
							 <textarea  rows="4" style="resize:none" class="form-control primary description" id="app_remark" name="app_remark"  placeholder="Enter Remarks" ></textarea>
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-2 col-xs-12 pull-right">
						<input type="submit" id="btnSave" name="btnSave" value="Update"  class="btn btn-primary" />
						<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
						<br>
					</div>
				</div>	
            </div>
			</form>
		</div>
		        <!--Appointment Tab End -->
				
				<!--Present Appointment Tab Start -->
		<div class="tab-pane" id="present_appointment">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Present Working Details</h3>
			</div>
			<?php
				/* $pre_exist=0;
				if(isset($_SESSION['same_pf_no']))
				{	
					dbcon1();
					$sql=mysql_query("select * from present_work_temp where preapp_pf_number='".$_SESSION['same_pf_no']."'");
					//echo "select * from biodata_temp where pf_number='".$_SESSION['same_pf_no']."'".mysql_error();
					$result=mysql_num_rows($sql);
					
					if($result>0)
					{
						$pre_exist=1;
					}
				} */
			?>
			<form method="POST" action="process_main.php?action=update_present_work_detail" id="pre_appo" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="pre_pf_no" name="pre_pf_no" class="form-control form-text TextNumber common_pf_number" readonly required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary" id="preapp_dept" name="preapp_dept" style="margin-top:0px; width:100%;" required>
								<option value="" selected hidden disabled>-- Select Department --</option>
								<?php
									/* dbcon();
									$sqlDept=mysql_query("select * from department");
									while($rwDept=mysql_fetch_array($sqlDept))
									{ */
									?>
									<option value="<?php //echo $rwDept["id"]; ?>"><?php //echo $rwDept["DEPTDESC"]; ?></option>
									<?php
									//}
								
								?>
								</select>
							  </div>
							</div>
						</div>
					</div>
					<br>
	<!---------------------------------------------New Code  11-1-2018-------------------------------------------------- -->
					<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Weather Employee is officiating in <br>higher grade than substansive grade?</label>
							  <div class="col-md-3 col-sm-8 col-xs-12" style="margin-left:-15px">
								<select name="preapp_subtype1" id="preapp_subtype1" class="form-control bio_all_status" style="margin-top:0px; width:100%;" required>
								<option value="blank" selected >Select Type</option>
							 
								<option value="1">Yes</option>
								<option value="2">No</option>
							</select> 
							  </div>
							</div>
						</div>
					</div>
					<br>
					
					<div class="row" style="display:none" id="show1">
							<h3>Substantive Grade Details</h3>
							<hr></hr>
								<div class="row">
						
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="preapp_sgd_desig" name="preapp_sgd_desig" style="margin-top:0px; width:100%;" required>
									<option value="" selected hidden disabled>-- Select Designation --</option>
									<?php
										/* dbcon();
										$sqlDept=mysql_query("select * from designation");
										while($rwDept=mysql_fetch_array($sqlDept))
										{ */
										?>
										<option value="<?php //echo $rwDept["id"]; ?>"><?php //echo $rwDept["desiglongdesc"];?></option>
										<?php
										//}
									
										?>
									</select>
								  </div>
                                </div>
						    </div>
						
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type1" id="sgd_ps_type_2" name="sgd_ps_type_2" style="margin-top:0px; width:100%;" required>
											
										</select>
									</div>
								</div>
							</div>
						</div> 
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_preapp_sgd_desig" style="display:none;">
						<div class="form-group"><br>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control primary" id="preapp_sgd_other_desig" name="preapp_sgd_other_desig" placeholder="Enter Other Designation" />
						  </div>
						</div>
					</div> 						
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="preapp_sgd_level" name="preapp_sgd_level" style="margin-top:0px; width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
										 <?php
											/* dbcon();
											$sqlDept=mysql_query("select distinct 7_pc_level from scale");
											while($rwDept=mysql_fetch_array($sqlDept))
											{ */
											?>
											<option value="<?php //echo $rwDept["7_pc_level"]; ?>"><?php //echo $rwDept["7_pc_level"]; ?></option>
											<?php
											//}
										?>
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="preapp_sgd_scale" name="preapp_sgd_scale" style="margin-top:0px; width:100%;">
										<option value="" selected hidden disabled>-- Select Sacle --</option>
										 <?php
											/* dbcon();
											$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
											while($rwDept=mysql_fetch_array($sqlDept))
											{ */
											?>
											<option value="<?php //echo $rwDept["6_cpc_scale"]; ?>"><?php //echo $rwDept["6_cpc_scale"]; ?></option>
											<?php
											//}
										?>
								</select>
								  </div>
                                </div>
						    </div>
							
							 
							
						</div><br>
						 <div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="hidden" name="depot_bill_unit2" id="depot_bill_unit2">
									  <input type="text" class="form-control primary bill_unit" id="billunit2" name="billunit2" required data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot2" name="depot2" required readonly>
								  </div>
                                </div>
						    </div>
							
						</div><br>
					 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station <a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_id4" name="station_id4" class="other">
									<input type="text" class="form-control primary station" id="station4" name="station4" required data-toggle="modal" data-target="#station" readonly>
							
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="sgd_preapp_group" name="sgd_preapp_group" style="margin-top:0px; width:100%;" required>
							<option value="" selected hidden disabled>-- Select Group --</option>
							 
							 <?php
												/* dbcon();
												$group_col=mysql_query("select * from group_col");
												while($group_colre=mysql_fetch_array($group_col))
												{ */
												?>
												<option value="<?php //echo $group_colre["id"]; ?>"><?php //echo $group_colre["group_col"]; ?></option>
												<?php
												//}
											
											?>
					       </select>
								  </div>
                                </div>
						    </div>
							
							
						</div><br>
								
							<h3>Officiating Grade Details</h3>	
							
						<hr></hr>
							<div class="row">
						
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="preapp_ogd_desig" name="preapp_ogd_desig" style="margin-top:0px; width:100%;" required>
									<option value="" selected hidden disabled>-- Select Designation --</option>
									<?php
										/* dbcon();
										$sqlDept=mysql_query("select * from designation");
										while($rwDept=mysql_fetch_array($sqlDept))
										{ */
										?>
										<option value="<?php //echo $rwDept["id"]; ?>"><?php// echo $rwDept["desiglongdesc"];?></option>
										<?php
										//}
									
										?>
									</select>
								  </div>
                                </div>
						    </div>
						
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type2" id="ogd_ps_type_2" name="ogd_ps_type_2" style="margin-top:0px; width:100%;" required>
											
										</select>
									</div>
								</div>
							</div>
						</div> 
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_preapp_ogd_desig" style="display:none;">
						<div class="form-group"><br>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control primary" id="preapp_ogd_other_desig" name="preapp_other_desig" placeholder="Enter Other Designation" />
						  </div>
						</div>
					</div> 						
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level2">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="preapp_ogd_level" name="preapp_ogd_level" style="margin-top:0px; width:100%;">
										
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale2">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="preapp_ogd_scale" name="preapp_ogd_scale" style="margin-top:0px; width:100%;">
										
								</select>
								  </div>
                                </div>
						    </div>
							
							 
							
						</div><br>
						 <div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="hidden" name="depot_bill_unit4" id="depot_bill_unit4">
									  <input type="text" class="form-control primary bill_unit" id="billunit4" name="billunit4" required data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot4" name="depot4" required readonly>
								  </div>
                                </div>
						    </div>
							
						</div><br>
					 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station <a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_id5" name="station_id5" class="other">
									<input type="text" class="form-control primary station" id="station5" name="station5" required data-toggle="modal" data-target="#station" readonly>
							
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="preapp_ogd_group" name="preapp_ogd_group" style="margin-top:0px; width:100%;" required>
							
					       </select>
								  </div>
                                </div>
						    </div>
							
							
						</div><br>
			  	         <div class="row">
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="preapp_ogd_rop" name="preapp_ogd_rop"   placeholder="Enter ROP" required />
								  </div>
                                </div>
						    </div>
						</div><br>
								
					</div>
					<div class="row" id="pwd">
					<div class="row">
						
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="preapp_desig" name="preapp_desig" style="margin-top:0px; width:100%;" required>
									
									</select>
								  </div>
                                </div>
						    </div>
						
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type" id="ps_type_2" name="ps_type_2" style="margin-top:0px; width:100%;" required>
											
										</select>
									</div>
								</div>
							</div>
						</div> 
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_predesig" Style="display:none">
						<div class="form-group"><br>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control primary" id="preapp_other_desig" name="preapp_other_desig" placeholder="Enter Other Designation" />
						  </div>
						</div>
					</div> 						
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level_2">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="preapp_level" name="preapp_level" style="margin-top:0px; width:100%;">
										
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale_2">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="preapp_scale" name="preapp_scale" style="margin-top:0px; width:100%;">
									
								</select>
								  </div>
                                </div>
						    </div>
							
							 
							
						</div><br>
						 <div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="hidden" name="depot_bill_unit1" id="depot_bill_unit1">
									  <input type="text" class="form-control primary bill_unit" id="billunit1" name="billunit1" required data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot1" name="depot1" required readonly>
								  </div>
                                </div>
						    </div>
							
						</div><br>
					 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station <a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_id6" name="station_id6" class="other">
									<input type="text" class="form-control primary station" id="station6" name="station6" required data-toggle="modal" data-target="#station" readonly>
							
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="preapp_group" name="preapp_group" style="margin-top:0px; width:100%;" required>
							
					       </select>
								  </div>
                                </div>
						    </div>
							
							
						</div><br>
			  	         <div class="row">
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="preapp_rop" name="preapp_rop"   placeholder="Enter ROP" required />
								  </div>
                                </div>
						    </div>
						</div><br>
						</div>
<!---------------------------------------------- New Code End 11-1-2018 ---------------------------------------------->
				<div class="form-group">
					<div class="col-sm-2 col-xs-12 pull-right">
						<input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
						<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success">
						<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" >
						<br>
					</div>
				</div>
					
            </div>
			</form>
		</div>
		        <!--Present Appointment Tab End -->
			<!--prft Tab Start -->
				 <div class="tab-pane" id="prft">
				 <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
						<div class="box-header with-border">
						<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class="prft_rev"><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class="prft_trans"><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class="prft_fixa"><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
						</ul>
				 
						</div>
					
		<form method="post" action="process_main.php?action=add_prtf_promotion" class="apply_readonly">
				<div class="modal-body">
				<h3>Promotion</h3><hr>
					<div class="row">	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="pm_pf" name="pm_pf"  placeholder="Enter PF No." readonly /> 
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary odrtype" id="pm_ordertype" name="pm_ordertype" style="width:100%;" >
											<option value="" selected hidden disabled>-- Select Order Type --</option>
											<option value="officiating">Officiating/MACP/DCP/ACP</option>
											<option value="adhoc">Abstraction of Medical Categorized</option>
											<option value="regular">Change Of Department/Category</option>
											<option value="deputation">Deputation</option>
											<option value="reparation">Reparation</option> 
										</select>
									</div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary TextNumber" id="pm_letterno" name="pm_letterno" placeholder="Enter Letter No"  />
									</div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="pm_letterdate" name="pm_letterdate"   />
									</div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >With Effect From</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="date" class="form-control primary" id="pm_wef" name="pm_wef">
									</div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row" id="promoform" style="display:none">
							<div class="col-md-6">
								<h4 id="from1"><b>Promotion From</b></h4>
								<h4 style="display:none;" id="from"><b>From</b></h4>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
											<div class="col-md-8 col-sm-8 col-xs-12" >
												<select class="form-control primary" id="pm_frm_dept" name="pm_frm_dept" style="width:100%;"		>
													<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
														$sqlDept=mysql_query("select * from department");
														while($rwDept=mysql_fetch_array($sqlDept))
														{
														?>
														<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
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
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary" id="pm_frm_desig" name="pm_frm_desig" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="pm_frm_otherdesig" name="pm_frm_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type" id="pm_frm_ps_type_3" name="pm_frm_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" id="scale_3" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="pm_frm_scale" name="pm_frm_scale" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Sacle --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
								<?php
								}
							
							?>
					         </select>
								  </div>
                                </div>
						    </div>
						</div>	
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_3">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="pm_frm_level" name="pm_frm_level" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
										 <?php
											$sqlDept=mysql_query("select distinct 7_pc_level from scale");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
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
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="pm_frm_group" name="pm_frm_group" style="width:100%;" >
									<option value="" selected hidden disabled>-- Select Group --</option>
									 <?php
										$sqlDept=mysql_query("select * from group_col");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
					 <div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="hidden" id="station_id1" name="station_id1" class="other">
								<input type="text" class="form-control primary station" id="station1" name="station1"  data-toggle="modal" data-target="#station" readonly>
							  </div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary TextNumber" id="pm_frm_otherstation" name="pm_frm_otherstation"  placeholder="Enter Station Name"  />
							  </div>
							</div>
						</div>
					</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="pm_frm_rop" name="pm_frm_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unita" id="depot_bill_unita">
											 <input type="text" class="form-control primary bill_unit" id="billunita" name="billunita"  data-toggle="modal" data-target="#bill_unit_select" readonly>
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depota" name="depota" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>							
			</div>					
			<div class="col-md-6">
				<h4 id="to1"><b>Promotion To</b></h4>
				<h4 style="display:none" id="to"><b>To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary" id="pm_to_dept" name="pm_to_dept" style="width:100%;">
														<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
													$sqlDept=mysql_query("select * from department");
												while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
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
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary" id="pm_to_desig" name="pm_to_desig" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="pm_to_otherdesig" name="pm_to_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="pm_to_ps_type_3" name="pm_to_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="pro_to_scale" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="pm_to_scale" name="pm_to_scale" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Sacle --</option>
									 <?php
										$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
										<?php
										}
									
									?>
									 </select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12"id="pro_to_level" style="display:none;" >
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="pm_to_level" name="pm_to_level" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
										 <?php
											$sqlDept=mysql_query("select distinct 7_pc_level from scale");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="pm_to_group" name="pm_to_group" style=		"width:100%;" >
										<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_id7" name="station_id7" class="other">
									<input type="text" class="form-control primary station" id="station7" name="station7"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="pm_to_otherstation" name="pm_to_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="pm_to_rop" name="pm_to_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unit5" id="depot_bill_unit5">
											 <input type="text" class="form-control primary bill_unit" id="billunit5" name="billunit5"  data-toggle="modal" data-target="#bill_unit_select" readonly>
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot5" name="depot5" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	
<!--Deputation Code start-->
				<div class="row" id="deputation_tb" style="display:none">
					<div class="col-md-6">
						<h4 id="from1"><b>Deputation From</b></h4>
						<h4 style="display:none;" id="from"><b>From</b></h4>
						<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary" id="dp_frm_dept" name="dp_frm_dept" style="width:100%;"		>
											<option value="" selected hidden disabled>-- Select Department --</option>
											<?php
											$sqlDept=mysql_query("select * from department");
										while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="dp_frm_desig" name="dp_frm_desig" style="width:100%;" >
											<option value="" selected hidden disabled>-- Select Designation --</option>
											<?php
												$sqlDept=mysql_query("select * from designation");
												while($rwDept=mysql_fetch_array($sqlDept))
												{
												?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary" id="dp_frm_otherdesig" name="dp_frm_otherdesig" placeholder="Enter Designation" />
									</div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="dp_frm_ps_type_3" name="dp_frm_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="depu_from_scale" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary" id="dp_frm_scale" name="dp_frm_scale" style="width:100%;">
											<option value="" selected hidden disabled>-- Select Sacle --</option>
											 <?php
												$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
												while($rwDept=mysql_fetch_array($sqlDept))
												{
												?>
												<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
												<?php
												}	
											?>
										</select>
									</div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="depu_from_level">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="dp_frm_level" name="dp_frm_level" style="width:100%;">
											<option value="" selected hidden disabled>-- Select Level --</option>
											 <?php
												$sqlDept=mysql_query("select distinct 7_pc_level from scale");
												while($rwDept=mysql_fetch_array($sqlDept))
												{
												?>
												<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="dp_frm_group" name="dp_frm_group" style=		"width:100%;" >
											<option value="" selected hidden disabled>-- Select Group --</option>
											 <?php
												$sqlDept=mysql_query("select * from group_col");
												while($rwDept=mysql_fetch_array($sqlDept))
												{
												?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="hidden" id="station_id8" name="station_id8" class="other">
										<input type="text" class="form-control primary station" id="station8" name="station8"  data-toggle="modal" data-target="#station" readonly>
									</div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary TextNumber" id="dp_frm_otherstation" name="dp_frm_otherstation"  placeholder="Enter Station Name"  />
									</div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary onlyNumber" id="dp_frm_rop" name="dp_frm_rop"   placeholder="Enter ROP"  />
									</div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" name="depot_bill_unit6" id="depot_bill_unit6">
									 <input type="text" class="form-control primary bill_unit" id="billunit6" name="billunit6"  data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
								</div>
							</div>
						</div>
						<br>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot6" name="depot6" readonly>
								  </div>
                                </div>
						    </div> 
						</div>							
					</div>
								
<!--Deputation from end-->								
<!--Deputation to start-->								
			<div class="col-md-6">
				<h4 id="to1"><b>Deputation To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary depot" id="dp_to_dept" name="dp_to_dept" >
								  </div>
                                </div>
						    </div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" class="form-control primary depot" id="dp_to_desig" name="dp_to_dept" >
										  </div>
                                </div>
						    </div>
								</div>
								<br>
									 <div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary depot" id="dp_to_othr_desig" name="dp_to_othr_desig" >
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale / Level</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="dp_to_pay_scale_level" name="dp_to_pay_scale_level" >
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="dp_to_grp" name="dp_to_grp" >
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Place<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary depot" id="dp_to_place" name="dp_to_place" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary depot" id="dp_to_rop" name="dp_to_rop" >
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" class="form-control primary depot" id="depot_bill_unit7" name="depot_bill_unit7" >
										  <input type="text" class="form-control primary depot" id="billunit7" name="billunit7" >
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot7" name="depot7" >
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	

<!--Deputation Code End-->
<!--Reparation Code Start--->

				<div class="row" id="reparation_tb" style="display:none">
								<div class="col-md-6">
				<h4 id="to1"><b>Reparation To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary depot" id="re_to_dept" name="re_to_dept" >
								  </div>
                                </div>
						    </div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" class="form-control primary depot" id="re_to_desig" name="re_to_desig" >
										  </div>
                                </div>
						    </div>
								</div>
								<br>
									 <div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary depot" id="re_to_otr_desig" name="re_to_otr_desig" >
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale / Level</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="re_to_pay_scale" name="re_to_pay_scale" >
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="re_to_group" name="re_to_group" >
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Place<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary depot" id="re_to_place" name="re_to_place" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary depot" id="re_to_rop" name="re_to_rop" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="depot_bill_unit8" name="depot_bill_unit8" >
								  <input type="text" class="form-control primary depot" id="billunit8" name="billunit8" >
								  </div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot8" name="depot8">
								  </div>
                                </div>
						    </div> 
						</div>
					</div>	
					<div class="col-md-6">
						<h4 id="from1"><b>Reparation From</b></h4>
						<h4 style="display:none;" id="from"><b>From</b></h4>
						<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary" id="re_frm_dept" name="re_frm_dept" style="width:100%;">
											<option value="" selected hidden disabled>-- Select Department --</option>
												<?php
												$sqlDept=mysql_query("select * from department");
												while($rwDept=mysql_fetch_array($sqlDept))
												{
												?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="re_frm_desig" name="re_frm_desig" style="width:100%;" >
										<option value="" selected hidden disabled>-- Select Designation --</option>
										<?php
											$sqlDept=mysql_query("select * from designation");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="re_frm_otherdesig" name="re_frm_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type" id="re_frm_ps_type_3" name="re_frm_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" id="repa_scale" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="re_frm_scale" name="re_frm_scale" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Sacle --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
								<?php
								}
							
							?>
					         </select>
								  </div>
                                </div>
						    </div>
						</div>	
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="repa_level">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="re_frm_level" name="re_frm_level" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Level --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 7_pc_level from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="re_frm_group" name="re_frm_group" style=		"width:100%;" >
										<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_id9" name="station_id9" class="other">
									<input type="text" class="form-control primary station" id="station9" name="station9"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="re_frm_otherstation" name="re_frm_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="re_frm_rop" name="re_frm_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" name="depot_bill_unit9" id="depot_bill_unit9">
									 <input type="text" class="form-control primary bill_unit" id="billunit9" name="billunit9"  data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot9" name="depot9" readonly>
								  </div>
                                </div>
						    </div> 
						</div>							
					</div>			
				</div>	
			<!--Reparation Code end--->
					
				<!--Carried Out Code Start-->
						<hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Carried Out<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary return1" id="prtf_carried" name="prtf_carried" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Carried Out --</option>
									<option value="Yes">Carried Out</option>
									<option value="No">Returned</option>
									 </select>
									 
								  </div>
                                </div>
						    </div>
							 
						</div><br>
						<div class="row" id="return" style="display:none;">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter NO.</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_acc_ltr_no" name="prtf_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="date" class="form-control primary" id="prtf_acc_ltr_date" name="prtf_acc_ltr_date" />
									  </div>
									</div>
								</div>	
							</div><br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >WEF Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="date" class="form-control primary" id="prtf_carr_wef_date" name="prtf_carr_wef_date" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_carr_remark" name="prtf_carr_remark" />
									  </div>
									</div>
								</div>	
							</div>
						
						
						
						</div>
					   <div class="row" id="notreturn">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="prtf_wefdate" name="prtf_wefdate"   />
								  </div>
                                </div>
								
						</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Incr.</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="prtf_incrdate" name="prtf_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
						
				<div class="form-group">
					<div class="col-sm-2 col-xs-12 pull-right">
						<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
						<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
						<br>
					</div>
				</div>
            </div>
	</form>
		        </div>
				
				
		<div class="tab-pane" id="rever">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class="prft_rev"><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class="prft_trans"><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class="prft_fixa"><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
			<div class="box-body">
		<form method="post" action="process_main.php?action=update_prtf_reversion" class="apply_readonly">
				<div class="modal-body">
				<h3>Reversion</h3><hr>
					<div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="rev_pf" name="rev_pf"  placeholder="Enter PF No."readonly /> 
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary odrtype1" id="rev_ordertype" name="rev_ordertype" style="width:100%;" >
									<option value="" selected hidden disabled>-- Select Order Type --</option>
									<option value="officiating1">Officiating/MACP/DCP/ACP</option>
									<option value="adhoc1">Abstraction of Medical Categorized</option>
									<option value="regular1">Change Of Department/Category</option>
									<option value="deputation1">Deputation</option>
									<option value="reparation1">Reparation</option> 
									 </select>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							  <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="rev_letterno" name="rev_letterno" placeholder="Enter Letter No"  />
								  </div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="rev_letterdate" name="rev_letterdate"   />
								  </div>
                                </div>
						    </div>
						</div><br>
						
						 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >With Effect From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="rev_wef" name="rev_wef">
								  </div>
                                </div>
						    </div>
						</div><br>
						
<!--Reversion Code Start -->
						<div class="row" id="revform1" style="display:none">
								<div class="col-md-6">
								<h4 id="from2"><b>Reversion From</b></h4>
								<h4 style="display:none;" id="from3"><b>From</b></h4>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary" id="rev_frm_dept" name="rev_frm_dept" style="width:100%;"		>
														<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
													$sqlDept=mysql_query("select * from department");
												while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
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
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary" id="rev_frm_desig" name="rev_frm_desig" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="rev_frm_otherdesig" name="rev_frm_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary " id="rev_frm_ps_type_3" name="rev_frm_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" id="rev_to_scale" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="rev_frm_scale" name="rev_frm_scale" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Sacle --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
								<?php
								}
							
							?>
					         </select>
								  </div>
                                </div>
						    </div>
						</div>	
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="rev_to_level">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="rev_frm_level" name="rev_frm_level" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Level --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 7_pc_level from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="rev_frm_group" name="rev_frm_group" style=		"width:100%;" >
										<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_ida" name="station_ida" class="other">
									<input type="text" class="form-control primary station" id="stationa" name="stationa"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="rev_to_otherstation" name="rev_to_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="rev_frm_rop" name="rev_frm_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unitb" id="depot_bill_unitb">
											 <input type="text" class="form-control primary bill_unit" id="billunitb" name="billunitb"  data-toggle="modal" data-target="#bill_unit_select" readonly>
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depotb" name="depotb" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>							
			</div>
								
								
			<div class="col-md-6">
				<h4 id="to2"><b>Reversion To</b></h4>
				<h4 style="display:none" id="to3"><b>To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary" id="rev_to_dept" name="rev_to_dept" style="width:100%;"		>
														<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
													$sqlDept=mysql_query("select * from department");
												while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
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
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary" id="rev_to_desig" name="rev_to_desig" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="rev_to_otherdesig" name="rev_to_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="rev_to_ps_type_3" name="rev_to_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" id="rev_scale" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="rev_to_scale" name="rev_to_scale" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Sacle --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
								<?php
								}
							
							?>
					         </select>
								  </div>
                                </div>
						    </div>
						</div>	
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="rev_level">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="rev_to_level" name="rev_to_level" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Level --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 7_pc_level from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="rev_to_group" name="rev_to_group" style=		"width:100%;" >
										<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idb" name="station_idb" class="other">
									<input type="text" class="form-control primary station" id="stationb" name="stationb"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="rev_to_otherstation" name="rev_to_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="rev_to_rop" name="rev_to_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unitc" id="depot_bill_unitc">
											 <input type="text" class="form-control primary bill_unit" id="billunitc" name="billunitc"  data-toggle="modal" data-target="#bill_unit_select" readonly>
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depotc" name="depotc" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	
				<!--Deputation Code-->
						<div class="row" id="deputation_tb1" style="display:none">
								<div class="col-md-6">
								<h4 id="from1"><b>Deputation From</b></h4>
								<h4 style="display:none;" id="from"><b>From</b></h4>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary" id="re_de_dept" name="re_de_dept" style="width:100%;"		>
														<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
													$sqlDept=mysql_query("select * from department");
												while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
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
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary" id="re_de_desig" name="re_de_desig" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="re_de_otherdesig" name="re_de_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type" id="re_de_ps_type_3" name="re_de_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" id="scale_3" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="re_de_scale" name="re_de_scale" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Sacle --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
								<?php
								}
							
							?>
					         </select>
								  </div>
                                </div>
						    </div>
						</div>	
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_3">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="re_de_level" name="re_de_level" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Level --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 7_pc_level from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="re_de_group" name="re_de_group" style=		"width:100%;" >
										<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idc" name="station_idc" class="other">
									<input type="text" class="form-control primary station" id="stationc" name="stationc"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="re_de_otherstation" name="re_de_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="re_de_rop" name="re_de_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unitd" id="depot_bill_unitd">
											 <input type="text" class="form-control primary bill_unit" id="billunitd" name="billunitd"  data-toggle="modal" data-target="#bill_unit_select" readonly>
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depotd" name="depotd" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>							
			</div>
								
								
			<div class="col-md-6">
				<h4 id="to1"><b>Deputation To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary depot" id="re_de_to_dept" name="re_de_to_dept" >
								  </div>
                                </div>
						    </div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" class="form-control primary depot" id="re_de_to_desc" name="re_de_to_desc" >
										  </div>
                                </div>
						    </div>
								</div>
								<br>
									 <div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary depot" id="re_de_to_other" name="re_de_to_other" >
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale / Level</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="re_de_to_ps" name="re_de_to_ps" >
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="re_de_to_grp" name="re_de_to_grp" >
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Place<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary depot" id="re_de_to_place" name="re_de_to_place" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary depot" id="re_de_to_rop" name="re_de_to_rop" >
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="text" class="form-control primary depot" id="re_de_to_bill_unit" name="re_de_to_bill_unit" >
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="re_de_to_deopt" name="re_de_to_deopt" >
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	

<!--Deputation Code End-->
<!--Reparation Code Start--->

				<div class="row" id="reparation_tb13" style="display:none">
								<div class="col-md-6">
				<h4 id="to1"><b>Reparation To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary depot" id="rep_to_dept" name="rep_to_dept" >
								  </div>
                                </div>
						    </div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" class="form-control primary depot" id="rep_to_desc" name="rep_to_desc" >
										  </div>
                                </div>
						    </div>
								</div>
								<br>
									 <div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary depot" id="rep_to_oth_desc" name="rep_to_oth_desc" >
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale / Level</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary" id="rep_to_ps_level" name="rep_to_ps_level" >
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="rep_to_grp" name="rep_to_grp" >
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Place<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary depot" id="rep_to_place" name="rep_to_place" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary depot" id="rep_to_rop" name="rep_to_rop" >
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="text" class="form-control primary depot" id="rep_to_bill_unit" name="rep_to_bill_unit" >
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="rep_to_deopt" name="rep_to_deopt" >
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
					<div class="col-md-6">
						<h4 id="from1"><b>Promotion From</b></h4>
						<h4 style="display:none;" id="from"><b>From</b></h4>
						<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary" id="rep_from_dept" name="rep_from_dept" style="width:100%;"		>
														<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
													$sqlDept=mysql_query("select * from department");
												while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
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
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary" id="rep_from_desg" name="rep_from_desg" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="rep_from_oth_desg" name="rep_from_oth_desg" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type" id="rep_from_ps_type_3" name="rep_from_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" id="scale_3" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="rep_from_scale" name="rep_from_scale" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Sacle --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
								<?php
								}
							
							?>
					         </select>
								  </div>
                                </div>
						    </div>
						</div>	
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_3">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="rep_from_level" name="rep_from_level" style="width:100%;">
							<option value="" selected hidden disabled>-- Select Level --</option>
							 <?php
								$sqlDept=mysql_query("select distinct 7_pc_level from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="rep_from_group" name="rep_from_group" style="width:100%;" >
										<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idd" name="station_idd" class="other">
									<input type="text" class="form-control primary station" id="stationd" name="stationd"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="rep_from_otherstation" name="rep_from_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="rep_from_rop" name="rep_from_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unite" id="depot_bill_unite">
											 <input type="text" class="form-control primary bill_unit" id="billunite" name="billunite"  data-toggle="modal" data-target="#bill_unit_select" readonly>
										  </div>
										</div>
									</div>
								</div>
								<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depote" name="depote" readonly>
								  </div>
                                </div>
						    </div>
						</div>							
					</div>
				</div>	
<!--Reparation Code end--->

						<hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Carried Out<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary return2" id="rep_from_rev_carried" name="rep_from_rev_carried" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Carried Out --</option>
									<option value="Yes">Carried Out</option>
									<option value="No">Returned</option>
									 </select>
									 
								  </div>
                                </div>
						    </div>
							 
						</div><br>
						<div class="row" id="return2" style="display:none;">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter NO.</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_acc_ltr_no" name="prtf_rev_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_acc_ltr_date" name="prtf_rev_acc_ltr_date" />
									  </div>
									</div>
								</div>	
							</div><br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >WEF Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="rev_carr_wef_date" name="rev_carr_wef_date" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="rev_carr_remark" name="rev_carr_remark" />
									  </div>
									</div>
								</div>	
							</div>
						
						
						
						</div>
					   <div class="row" id="notreturn2">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="rep_rev_wefdate" name="rep_rev_wefdate"   />
								  </div>
                                </div>
								
						</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Incr.</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="rep_rev_incrdate" name="rep_rev_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
							<br>
				<div class="form-group">
				<div class="col-sm-2 col-xs-12 pull-right">
					
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
					
			
            </div>
			</form>
            </div>
		</div>
		<div class="tab-pane" id="trans">
		<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class="prft_rev"><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class="prft_trans"><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class="prft_fixa"><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
			<h3>Transfer</h3>
			<div class="box-body">
					<form method="post" action="process_main.php?action=update_transfer" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						 <div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="tf_pf" name="tf_pf"  placeholder="Enter PF No."/ readonly > 
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary odrtype2" id="tf_ordertype" name="tf_ordertype" style="width:100%;" >
									<option value="" selected hidden disabled>-- Select Order Type --</option>
									<option value="1">Intra Division</option>
									<option value="2">Inter Division</option>
									<option value="3">Inter Railway Transfer</option>
									
									 </select>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							  <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="tf_letterno" name="tf_letterno" placeholder="Enter Letter No"  />
								  </div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="tf_letterdate" name="tf_letterdate"   />
								  </div>
                                </div>
						    </div>
						</div><br>
						
						 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >With Effect From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="depot_bill_unitf" id="depot_bill_unitf">
									  <input type="date" class="form-control primary" id="bill_unitf" name="bill_unitf">
								  </div>
                                </div>
						    </div>
							<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit To</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="depot_bill_unit5" id="depot_bill_unit5">
									  <input type="text" class="form-control primary TextNumber bill_unit" id="bill_unit5" name="bill_unit5" placeholder="Bill Unit To"  data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div-->
						</div><br>
							
							
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
			  	         <div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="tf_dept" name="tf_dept" style="width:100%;">
									<option value="blank" selected></option>
									<?php
										$sqlDept=mysql_query("select * from department");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
										<?php
										}
									
									?>
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="tf_desig" name="tf_desig" style="width:100%;" >
									<option value="blank" selected></option>
									<?php
										$sqlDept=mysql_query("select * from designation");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
										<?php
										}
									
										?>
									</select>
								  </div>
                                </div>
						    </div>
							
						</div><br>
						 <div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="tf_otherdesig" name="tf_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="tf_ps_type_3" name="tf_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Paysss</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
							
							
						</div><br>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="tf_group" name="tf_group" style="width:100%;" >
							<option value="blank" selected></option>
							 <?php
								$sqlDept=mysql_query("select * from group_col");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" id="trans_scale" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="tf_scale" name="tf_scale" style="width:100%;">
							<option value="blank" selected></option>
							 <?php
								$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
								<?php
								}
							
							?>
					         </select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="trans_level">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="tf_level" name="tf_level" style="width:100%;">
							<option value="blank" selected></option>
							 <?php
								$sqlDept=mysql_query("select distinct 7_pc_level from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
							
						</div><br>
						<div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_ide" name="station_ide" class="other">
									<input type="text" class="form-control primary station" id="statione" name="statione"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="prtf_otherstation" name="prtf_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
							
						</div><br>
						<div class="row">
						
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="prtf_rop" name="prtf_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" name="depot_bill_unitg" id="depot_bill_unitg">
									 <input type="text" class="form-control primary bill_unit" id="billunitg" name="billunitg"  data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depotg" name="depotg" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div><hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">

<!--Carried Out Code Start-->
					<hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Carried Out<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary return3" id="prtf_rev_carried" name="prtf_rev_carried" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Carried Out --</option>
									<option value="Yes">Carried Out</option>
									<option value="No">Returned</option>
									 </select>
									 
								  </div>
                                </div>
						    </div>
							 
						</div><br>
						<div class="row" id="return3" style="display:none;">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter NO.</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_acc_ltr_no" name="prtf_rev_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="rev_acc_ltr_no" name="rev_acc_ltr_no" />
									  </div>
									</div>
								</div>	
							</div><br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >WEF Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_carr_wef_date" name="prtf_rev_carr_wef_date" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_carr_remark" name="prtf_rev_carr_remark" />
									  </div>
									</div>
								</div>	
							</div>
						
						
						
						</div>
					   <div class="row" id="notreturn3">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="prtf_rev_wefdate" name="prtf_rev_wefdate"   />
								  </div>
                                </div>
								
						</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Incr.</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="prtf_rev_incrdate" name="prtf_rev_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
							<br>
				<div class="form-group">
				<div class="col-sm-2 col-xs-12 pull-right">
					
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
							<br>
				
					
			
            </div>
			</form>
            </div>
		</div>
		</div>
		
		<!--- Fixation Tab Start-->
		<div class="tab-pane" id="fix">
		<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class="prft_rev"><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class="prft_trans"><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class="prft_fixa"><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div><h3>Fixation</h3><hr>
			<div class="box-body">
					<form method="post" action="process_main.php?action=update_fixation" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						 <div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="fx_pf" name="fx_pf"  placeholder="Enter PF No."/ required> 
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary odrtype" id="fx_ordertype" name="fx_ordertype" style="width:100%;" >
									<option value="" selected hidden disabled>-- Select Order Type --</option>
									<option value="1">Regular</option>
									<option value="2">Adhoc</option>
									<option value="3">Officiating</option>
									
									 </select>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							  <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="fx_letterno" name="fx_letterno" placeholder="Enter Letter No"  />
								  </div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="fx_letterdate" name="fx_letterdate"   />
								  </div>
                                </div>
						    </div>
						</div><br>
						
						 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >With Effect From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="depot_bill_unith" id="depot_bill_unith">
									  <input type="date" class="form-control primary" id="bill_unith" name="bill_unith">
								  </div>
                                </div>
						    </div>
							<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit To</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="depot_bill_unit5" id="depot_bill_unit5">
									  <input type="text" class="form-control primary TextNumber bill_unit" id="bill_unit5" name="bill_unit5" placeholder="Bill Unit To"  data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div-->
						</div><br>
							
							
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
			  	         <div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="fx_dept" name="fx_dept" style="width:100%;">
									<option value="blank" selected></option>
									<?php
										$sqlDept=mysql_query("select * from department");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
										<?php
										}
									
									?>
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="fx_desig" name="fx_desig" style="width:100%;" >
									<option value="blank" selected></option>
									<?php
										$sqlDept=mysql_query("select * from designation");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
										<?php
										}
									
										?>
									</select>
								  </div>
                                </div>
						    </div>
							
						</div><br>
						 <div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="fx_otherdesig" name="fx_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary" id="fx_ps_type_3" name="fx_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<option value="1">3rd Scale Pay</option>
											<option value="1">4th Scale Pay</option>
											<option value="1">5th Scale Pay</option>
											<option value="1">6th Scale Pay</option>
											<option value="2">7th Scale Pay</option>
										</select>
									</div>
								</div>
							</div>
							
							
						</div><br>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="fx_group" name="fx_group" style="width:100%;" >
							<option value="blank" selected></option>
							 <?php
								$sqlDept=mysql_query("select * from group_col");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" id="fix_scale" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="fx_scale" name="fx_scale" style="width:100%;">
							<option value="blank" selected></option>
							 <?php
								$sqlDept=mysql_query("select distinct 6_cpc_scale from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["6_cpc_scale"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>
								<?php
								}
							
							?>
					         </select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="fix_level">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="fx_level" name="fx_level" style="width:100%;">
							<option value="blank" selected></option>
							 <?php
								$sqlDept=mysql_query("select distinct 7_pc_level from scale");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["7_pc_level"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>
								<?php
								}
							
							?>
					       </select>
								  </div>
                                </div>
						    </div>
							
						</div><br>
						<div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idf" name="station_idf" class="other">
									<input type="text" class="form-control primary station" id="stationf" name="stationf"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="fx_otherstation" name="fx_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
							
						</div><br>
						<div class="row">
						
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="fx_rop" name="fx_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" name="depot_bill_uniti" id="depot_bill_uniti">
									 <input type="text" class="form-control primary bill_unit" id="billuniti" name="billuniti"  data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depoti" name="depoti" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div><hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						
<!--Carried out-->						
						<hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Carried Out<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary return4" id="prtf_rev_carried" name="prtf_rev_carried" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Carried Out --</option>
									<option value="Yes">Carried Out</option>
									<option value="No">Returned</option>
									 </select>
									 
								  </div>
                                </div>
						    </div>
							 
						</div><br>
						<div class="row" id="return4" style="display:none;">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter NO.</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_acc_ltr_no" name="prtf_rev_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_acc_ltr_no" name="prtf_rev_acc_ltr_no" />
									  </div>
									</div>
								</div>	
							</div><br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >WEF Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_carr_wef_date" name="prtf_rev_carr_wef_date" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_carr_remark" name="prtf_rev_carr_remark" />
									  </div>
									</div>
								</div>	
							</div>
						
						
						
						</div>
					   <div class="row" id="notreturn4">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="prtf_rev_wefdate" name="prtf_rev_wefdate"   />
								  </div>
                                </div>
								
						</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Incr.</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="prtf_rev_incrdate" name="prtf_rev_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
							<br>
				<div class="form-group">
				<div class="col-sm-2 col-xs-12 pull-right">
					
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
					
			
            </div>
			</form>
            </div>
		</div>
		</div>
	<!--- Fixation Tab End-->
		       <!--prft Tab End -->
			   
		       <!--Penalty Tab Start -->
				 <div class="tab-pane" id="penalty">
				 <div class="box-header with-border">
							  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Penalty</h3>
				</div><br>
					 <form method="post" action="process_main.php?action=update_penalty" class="apply_readonly">
					
					<div class="clearfix"></div>
					<div class="row">
					
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="penalty_pf_no" name="penalty_pf_no" class="form-control TextNumber common_pf_number" readonly required>
								  </div>
                                </div>
						    </div>	
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Penalty Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select name="p_type" id="p_type" class="form-control select2" style="margin-top:0px; width:100%;" required>
										
									</select> 
								  </div>
                                </div>
						    </div>
					</div><br>
					<div class="clearfix"></div> 

					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Penalty Issued</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="date" id="pen_awarded" name="pen_awarded" class="form-control">
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Penalty Effected</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="date" id="pen_eff" name="pen_eff" class="form-control">
								  </div>
                                </div>
						    </div>
							
					</div><br>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="l_no" name="l_no" class="form-control TextNumber" placeholder="Enter Letter No" required>
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="date" id="ltr_date" name="ltr_date" class="form-control" placeholder="Enter Date" required>
								  </div>
                                </div>
						    </div>
					</div><br>
					<div class="clearfix"></div>
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >ChargeSheet Status</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="chrg_stat" id="chrg_stat" class="form-control select2" style="margin-top:0px; width:100%;" required>
										
									</select> 
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >ChargeSheet Reference</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="pen_chrg_ref_no" name="pen_chrg_ref_no" class="form-control" placeholder="Enter ChargeSheet Reference Number" required>
								  </div>
                                </div>
						    </div>
							
							
					</div><br>		
						
						<div class="row">
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >From Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="date" id="f_date" name="f_date" class="form-control" placeholder="Enter Letter No" required>
								  </div>
                                </div>
						    </div>

						    <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >To Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="date" id="t_date" name="t_date" class="form-control" placeholder="Enter Letter No" required>
								  </div>
                                </div>
							</div>
							
					</div><br>	
					<div class="row" >
							
						</div>
						
						<br><div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 ">Remark</label>
								  <div class="col-md-10">
									 <textarea  rows="4" cols="20" class="form-control primary description" id="penalty_remark" name="penalty_remark"  placeholder="Enter Remark" required></textarea>
								  </div>
                                </div>
						    </div>
						</div><br>
						
						<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
		        </div>
		       <!--Penalty Tab End -->
			   
			   <!--Increment Tab Start -->
				 <div class="tab-pane" id="increment">
				          <div class="box-header with-border">
							  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Annual Increment </h3>
							</div>
					 	<form method="post" action="process_main.php?action=update_increment" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="incr_pf" name="incr_pf" readonly required />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Increment Type<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="incr_type" name="incr_type" style="width:100%;" required>
										
										</select>
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Increment Date<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="date" class="form-control primary" id="incr_date" name="incr_date" required  />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type" id="ps_type_4" name="ps_type_4" style="margin-top:0px; width:100%;" required>
											
										</select>
									</div>
								</div>
							</div>
							
						</div><br>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12" id="scale_4" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary" id="incr_scale" name="incr_scale" style="width:100%;"  >
							
					         </select>
								  </div>
                                </div>
						    </div>
						<div class="col-md-6 col-sm-12 col-xs-12" id="level_4" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary" id="incr_level" name="incr_level" style="width:100%;" >
										
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Old Rate Of Pay</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 <input type="text" class="form-control primary onlyNumber" id="incr_oldrop" name="incr_oldrop" placeholder="Enter Old ROP"    />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="incr_rop" name="incr_rop" placeholder="Enter ROP" required />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Personal Pay</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 <input type="text" class="form-control primary TextNumber" id="incr_personel" name="incr_personel"  placeholder="Enter Personal Pay" required />
								  </div>
                                </div>
						    </div> 
						</div><br>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Special Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="incr_special" name="incr_special"  placeholder="Enter Special Pay" required />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 ">Next Increment Date</label>
								  <div class="col-md-8">
									  <input type="date" class="form-control primary" id="incr_nxt_incr" name="incr_nxt_incr" required />
								  </div>
                                </div>
						    </div>
						</div><br>
					 <div class="row">
					 	<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 ">Remark</label>
								  <div class="col-md-10">
									 <textarea  rows="4" style="resize:none" class="form-control primary description" id="incr_remark" name="incr_remark"placeholder="Enter Increment Remark" required></textarea>
								  </div>
                                </div>
						    </div>
					 </div>
			  	<br>
				<div class="form-group">
				<div class="col-sm-2 col-xs-12 pull-right">
					<input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
					
            </div>
			</form>		  
		        </div>	
			    <!--Increment Tab End -->
		
		      <!--Awards Tab Start -->
				<div class="tab-pane" id="awards">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Awards</h3>
				</div>
					 <form method="post" action="process_main.php?action=update_awards" class="apply_readonly">
				<div class="modal-body">
					
					<div class="clearfix"></div>
					  <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<input type="text" id="award_pf_no" name="award_pf_no" class="form-control TextNumber common_pf_number" readonly required>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Date Of Award</label>
								  <div class="col-md-9 col-sm-8 col-xs-12">
									<input type="date" id="award_date" name="award_date" class="form-control" required>
								  </div>
                                </div>
						    </div>
					</div><br>
					<div class="clearfix"></div> 
												
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Awarded By</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<select name="award_award_by" id="award_award_by" class="form-control" style="margin-top:0px; width:100%;" required>
										
									</select> 
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Type Of Award</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<select name="award_type_award" id="award_type_award" class="form-control" style="width:100%;" required>
										
									</select> 
								  </div>
                                </div>
						    </div>
							</div><br>
							<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Other Award</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<input type="text" id="award_other_award" name="award_other_award" class="form-control TextNumber" placeholder="Enter Other Award" >
								  </div>
                                </div>
						    </div>
						    
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-3 col-sm-1 col-xs-12">Award Details</label>
								  <div class="col-md-9 col-sm-12 col-xs-12">
									<textarea  rows="2"  class="form-control primary description" id="award_detail" name="award_detail"placeholder="Enter Award Details" required></textarea>
								  </div>
                                </div>
							</div>
							
						    </div>
							
							
					</div><br>
					<div class="clearfix"></div>
						<br>
						<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
					</form>
		        </div>
		       <!--Awards Tab End -->
			   
							<!--nominee Tab Start -->
				<div class="tab" id="nominee">
				    <ul class="tab-links">
				        <li class="active"><a href="#tab1">PF Nominee</a></li>
				        <li><a href="#tab2">GIS Nominee</a></li>
				        <li><a href="#tab3">Gratuty Nominee</a></li>
				    </ul>

					<div class="tab-content">
        <div id="tab1" class="tab active">
            <div class="tab-pane city" id="pf_nominee">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;PF Nominee</h3><button type="button" id="pf_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>   
                </div><br>
                <form  action="process_main.php?action=update_pf_nominee" method="POST" class="apply_readonly">
					<?php 
						dbcon1();
						$sql=mysql_query("select * from nominee_temp where nom_pf_number='".$_SESSION['set_update_pf']."' and nom_type='PF'");
						$result=mysql_num_rows($sql);
						//echo "<script>alert('$result');</script>";
						$pf_fetch_count=$result;
						for($i=1;$i<=$result;$i++)
						{
							$result2=mysql_fetch_array($sql)
							
						
					?>
                    <div class="modal-body">
                    	<div id="append_PFdata">
                        </div>
                        <div class="row">
                        	<div class='box-header'><h3 class='box-title'><i class='fa fa-book'></i><?php echo $i;?> PF Nominee</h3><hr/></div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="nom_pf1" name="nom_pf1" readonly required/> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Name of Nominee(s)</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="update_id<?php echo $i;?>" value="<?php echo $result2['id']; ?>">
                                        <input type="text" class="form-control primary" id="nom_name<?php echo $i;?>" name="nom_name<?php echo $i;?>" value="<?php echo $result2['nom_name'];?>" required /> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary" id="nomn_rel<?php echo $i;?>" name="nomn_rel<?php echo $i;?>" style="width:100%;" required>
										 <option selected value='"<?php echo $result2['nom_rel'];?>"'><?php echo get_relation($result2['nom_rel']);?></option>
                                            <?php
                                            $sqlDept=mysql_query("select * from relation where id<>'".$result2['nom_rel']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
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
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="nom_otherrel<?php echo $i;?>" name="nom_otherrel<?php echo $i;?>" value="<?php echo $result2['nom_otherrel'];?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="nom_perc<?php echo $i;?>" name="nom_perc<?php echo $i;?>" value="<?php echo $result2['nom_per'];?>" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary" id="nom_status<?php echo $i;?>" name="nom_status<?php echo $i;?>" style="width:100%;" required>
                                            <option value="<?php echo $result2['nom_status'];?>" selected><?php echo got_mr($result2['nom_status']);?></option>
                                            <?php
											dbcon();
                                            $sqlDept=mysql_query("select * from marital_status");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>">
                                            <?php echo $rwDept["shortdesc"]; ?>
                                            </option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="nom_age<?php echo $i;?>" name="nom_age<?php echo $i;?>" value="<?php echo $result2['nom_age'];?>" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="date" class="form-control primary" id="nom_dob<?php echo $i;?>" name="nom_dob<?php echo $i;?>" value="<?php echo $result2['nom_dob'];?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee PAN No<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary TextNumber" id="nom_pan<?php echo $i;?>" name="nom_pan<?php echo $i;?>" value="<?php echo $result2['nom_panno'];?>" maxlength="10" required/> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" >Nominee Aadhar<span class=""></span></label>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="nom_adhr<?php echo $i;?>" name="nom_adhr<?php echo $i;?>" value="<?php echo $result2['nom_aadhar'];?>" required maxlength="12"/> 
                                    </div>  
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Address of Nominee</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2" style="resize:none;"  class="form-control primary description" id="nom_address<?php echo $i;?>" name="nom_address<?php echo $i;?>" placeholder="Enter Address of Nominee" required><?php echo $result2['nom_address'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Contingencies</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2"style="resize:none;" class="form-control primary description" id="nom_conting<?php echo $i;?>" name="nom_conting<?php echo $i;?>" required><?php echo $result2['nom_conti'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>
                                    <div class="col-md-10">
                                        <textarea  rows="3" style="resize:none;" class="form-control primary description" id="nom_subsciber<?php echo $i;?>" name="nom_subsciber<?php echo $i;?>" placeholder="Enter Name" required> <?php echo $result2['nom_subscriber'];?> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div></br>
						
						
                        <br>          
                        
                    </div>
					<?php }?>
					<input type="hidden" id="nominee_type" value="PF">
                        <input type="hidden" id="pf_counter" name="pf_counter"/>
					<div class="form-group">
                            <div class="col-sm-3 col-xs-12 pull-right">
                                <input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
                                <input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
                                <!--a href="#witness" style="display:none;" data-toggle="modal" class="btn btn-fit-height btn-info">Witness</a-->
                                <br><br><br>
                            </div>
                        </div>
                </form>
            </div>
        </div>
 
        <div id="tab2" class="tab">
            <div class="tab-pane city active" id="gis_nominee">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;GIS Nominee</h3><button type="button" id="gis_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>
                </div><br>
                <form  action="process_main.php?action=update_gis_nominee" method="POST" class="apply_readonly">
                    <div class="modal-body">
 						<div id="append_GISdata">
                        </div><br/>
						<?php 
						dbcon1();
						$sql=mysql_query("select * from nominee_temp where nom_pf_number='".$_SESSION['set_update_pf']."' and nom_type='GIS'");
						$result=mysql_num_rows($sql);
						//echo "<script>alert('$result');</script>";
						$gis_fetch_count=$result;
						for($i=1;$i<=$result;$i++)
						{
							$result2=mysql_fetch_array($sql)
					?>
						<div class='box-header'><h3 class='box-title'><i class='fa fa-book'></i><?php echo $i;?> GIS Nominee</h3><hr/></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="gis_pf1" name="gis_pf1" readonly required/> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Name of Nominee(s)</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="gis_update_id<?php echo $i;?>" value="<?php echo $result2['id']; ?>">
                                        <input type="text" class="form-control primary" id="gis_name<?php echo $i;?>" name="gis_name<?php echo $i;?>" value="<?php echo $result2['nom_name'];?>" required /> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary" id="gis_rel<?php echo $i;?>" name="gis_rel<?php echo $i;?>" style="width:100%;" required>
                                            <option value="<?php echo $result2['nom_rel'];?>" selected><?php echo get_relation($result2['nom_rel']);?></option>
                                            <?php
                                            $sqlDept=mysql_query("select * from relation where id <> '".$result2['nom_rel']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
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
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gis_otherrel<?php echo $i;?>" name="gis_otherrel<?php echo $i;?>" value="<?php echo $result2['nom_otherrel'];?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gis_perc<?php echo $i;?>" name="gis_perc<?php echo $i;?>" value="<?php echo $result2['nom_per'];?>" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary" id="gis_status<?php echo $i;?>" name="gis_status<?php echo $i;?>" style="width:100%;" required>
										<option value="<?php echo $result2['nom_status'];?>" selected><?php echo got_mr($result2['nom_status']);?></option>
                                            <?php
											dbcon();
                                            $sqlDept=mysql_query("select * from marital_status where id<>'".$result2['nom_status']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>">
                                            <?php echo $rwDept["shortdesc"]; ?>
                                            </option>
                                            <?php
                                            }

                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gis_age<?php echo $i;?>" name="gis_age<?php echo $i;?>" value="<?php echo $result2['nom_age'];?>" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="date" class="form-control primary" id="gis_dob<?php echo $i;?>" name="gis_dob<?php echo $i;?>" value="<?php echo $result2['nom_dob'];?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee PAN No<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary TextNumber" id="gis_pan<?php echo $i;?>" name="gis_pan<?php echo $i;?>" value="<?php echo $result2['nom_panno'];?>" maxlength="10" required/> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" >Nominee Aadhar<span class=""></span></label>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="gis_adhr<?php echo $i;?>" name="gis_adhr<?php echo $i;?>"  required value="<?php echo $result2['nom_aadhar'];?>" maxlength="12"/> 
                                    </div>  
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Address of Nominee</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2" style="resize:none;"  class="form-control primary description" id="gis_address<?php echo $i;?>" name="gis_address<?php echo $i;?>" required><?php echo $result2['nom_address'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Contingencies</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2"style="resize:none;" class="form-control primary description" id="gis_conting<?php echo $i;?>" name="gis_conting<?php echo $i;?>" required><?php echo $result2['nom_conti'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>
                                    <div class="col-md-10">
                                        <textarea  rows="3" style="resize:none;" class="form-control primary description" id="gis_subsciber<?php echo $i;?>" name="gis_subsciber<?php echo $i;?>" required><?php echo $result2['nom_subscriber'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }?>
					<input type="hidden" id="nominee_type_gis" name="nominee_type_gis" value="GIS">
                        <input type="hidden" id="gis_counter" name="gis_counter"/>
                       <br> 
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12 pull-right">
                                <input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
                                <input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
                                <!--a href="#witness" data-toggle="modal" class="btn btn-fit-height btn-info">Witness</a-->
                                <br><br><br>
                            </div>
                        </div>
					</form>
                    </div>
                
            </div>
        </div>
 
        <div id="tab3" class="tab">
            <div class="tab-pane city" id="gra_nominee">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Gratuty Nominee</h3><button type="button" id="gra_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>
                </div><br>
                    <div class="modal-body">
					 <form  action="process_main.php?action=update_gra_nominee" method="POST" class="apply_readonly">
                    	<div id="append_GRAdata">
                        </div>
						<?php 
						 dbcon1();
						$sql=mysql_query("select * from nominee_temp where nom_pf_number='".$_SESSION['set_update_pf']."' and nom_type='GRA'");
						$result=mysql_num_rows($sql);
						//echo "<script>alert('$result');</script>";
						$gra_fetch_count=$result;
						for($i=1;$i<=$result;$i++)
						{
							$result2=mysql_fetch_array($sql);
						
						?>
                        <div class="row">
                        	<div class='box-header'><h3 class='box-title'><i class='fa fa-book'></i><?php echo $i;?> Gratuty Nominee</h3><hr/></div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="gra_pf1" name="gra_pf1" readonly required/> 
                                    </div>
                                </div>
                            </div>
                            
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Name of Nominee(s)</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="gra_update_id<?php echo $i;?>" value="<?php echo $result2['id'];?>">
                                        <input type="text" class="form-control primary" id="gra_name<?php echo $i;?>" name="gra_name<?php echo $i;?>" value="<?php echo $result2['nom_name'];?>" required /> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary" id="gra_rel<?php echo $i;?>" name="gra_rel<?php echo $i;?>" style="width:100%;" required>
                                            <option value="<?php echo $result2['nom_rel'];?>" selected><?php echo get_relation($result2['nom_rel']);?></option>
                                            <?php
                                            $sqlDept=mysql_query("select * from relation where id <> '".$result2['nom_rel']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
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
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gra_otherrel<?php echo $i;?>" name="gra_otherrel<?php echo $i;?>" value="<?php echo $result2['nom_otherrel'];?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gra_perc<?php echo $i;?>" name="gra_perc<?php echo $i;?>" value="<?php echo $result2['nom_per'];?>" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary" id="gra_status<?php echo $i;?>" name="gra_status<?php echo $i;?>" style="width:100%;" required>
                                            <option value="<?php echo $result2['nom_status'];?>" selected><?php echo got_mr($result2['nom_status']);?></option>
                                            <?php
											dbcon();
                                            $sqlDept=mysql_query("select * from marital_status where id<>'".$result2['nom_status']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>">
                                            <?php echo $rwDept["shortdesc"]; ?>
                                            </option>
                                            <?php
                                            }

                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gra_age<?php echo $i;?>" name="gra_age<?php echo $i;?>" value="<?php echo $result2['nom_age'];?>" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="date" class="form-control primary" id="gra_dob<?php echo $i;?>" name="gra_dob<?php echo $i;?>" value="<?php echo $result2['nom_dob'];?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee PAN No<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary TextNumber" id="gra_pan<?php echo $i;?>" name="gra_pan<?php echo $i;?>" value="<?php echo $result2['nom_panno'];?>" maxlength="10"  required/> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" >Nominee Aadhar<span class=""></span></label>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="gra_adhr<?php echo $i;?>" name="gra_adhr<?php echo $i;?>" value="<?php echo $result2['nom_aadhar'];?>" maxlength="12" required/> 
                                    </div>  
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Address of Nominee</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2" style="resize:none;"  class="form-control primary description" id="gra_address<?php echo $i;?>" name="gra_address1"placeholder="Enter Address of Nominee" required><?php echo $result2['nom_address'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Contingencies</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2"style="resize:none;" class="form-control primary description" id="gra_conting<?php echo $i;?>" name="gra_conting<?php echo $i;?>"  placeholder="Enter Contingencies" required><?php echo $result2['nom_conti'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>
                                    <div class="col-md-10">
                                        <textarea  rows="3" style="resize:none;" class="form-control primary description" id="gra_subsciber<?php echo $i;?>" name="gra_subsciber<?php echo $i;?>"placeholder="Enter Name" required><?php echo $result2['nom_subscriber'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php }?>
						<input type="hidden" id="nominee_type_gra" name="nominee_type_gra" value="GRA">
						<input type="hidden" id="gra_counter" name="gra_counter"/>
                        <br>              
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12 pull-right">
                                <input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
                                <input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
                                <!--a href="#witness" data-toggle="modal" class="btn btn-fit-height btn-info">Witness</a-->
                                <br><br><br>
                            </div>
                        </div>
						
                    </div>
				</form>
            </div>
        </div>
    </div>
			    </div>
				<!--nominee Tab End -->
			
			<!--Family Tab Start -->
					 <div class="tab-pane" id="family">
					 <div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Family Composition</h3>
					</div>
					
					<div class="row pull-right" style="margin-right:20px;">
						<a class="btn btn-primary" href="#" id="add_member" name="add_member">+Add Family Member</a>
					</div>
					<br>
					<br>
					
				<form method="post" action="process_main.php?action=update_family_compo" class="apply_readonly">
				<div class="modal-body">
					<div class="row" style="margin-top:10px;margin-bottom:10px;">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="fc_pf_main" name="fc_pf_main" class="form-control TextNumber common_pf_number" readonly required>
							  </div>
							</div>
						</div>
					</div>
					<input type="hidden" name="hidden_fc_count" id="hidden_fc_count">
					<?php 
						 dbcon1();
						$sql=mysql_query("select * from family_temp where emp_pf='".$_SESSION['set_update_pf']."'");
						$result=mysql_num_rows($sql);
						//echo "<script>alert('$result');</script>";
						$family_fetch_count=$result;
						for($i=1;$i<=$result;$i++)
						{
							$result2=mysql_fetch_array($sql);
						
					?>
				
					<div id="add_member_div" name="add_member_div">
					</div>
					
					<input type="hidden" name="family_update_id<?php echo $i;?>" id="family_update_id<?php echo $i;?>" value="<?php echo $result2['id'];?>">
					<div class="row">
						<h4><?php echo $i;?> Family Member</h4>
					</div>
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="fc_pf_no<?php echo $i;?>" name="fc_pf_no<?php echo $i;?>" class="form-control TextNumber" value="<?php echo $result2['fmy_pf_number'];?>" required>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Updation</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="date" id="fc_updated_date<?php echo $i;?>" name="fc_updated_date<?php echo $i;?>" class="form-control" value="<?php echo $result2['fmy_updatedate'];?>" required>
								  </div>
                                </div>
						    </div>
					</div><br>		
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Family Member Name</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="fc_fam_mem_name<?php echo $i;?>" name="fc_fam_mem_name<?php echo $i;?>" class="form-control TextNumber" value="<?php echo $result2['fmy_member'];?>" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Member Relation</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<select name="fc_mem_rel<?php echo $i;?>" id="fc_mem_rel<?php echo $i;?>" class="form-control" style="margin-top:0px; width:100%;" required>
									<option value="<?php echo $result2['fmy_rel'];?>" selected ><?php echo get_relation($result2['fmy_rel']);?></option>
									<?php
										$sqlDept=mysql_query("select * from relation where id<>'".$result2['fmy_rel']."'");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
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
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Gender</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="fc_mem_gender<?php echo $i;?>" id="fc_mem_gender<?php echo $i;?>" class="form-control" style="margin-top:0px; width:100%;" required>
										<option selected value="<?php echo $result2['fmy_gender'];?>"><?php echo get_gender($result2['fmy_gender']);?></option>
										<?php
												$sqlreligion=mysql_query("select * from gender where id<>'".$result2['fmy_gender']."'");
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
								<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">DOB</label>
								  <div class="col-md-8 col-sm-12 col-xs-12" >
									<input type="date" id="fc_fam_mem_dob<?php echo $i;?>" name="fc_fam_mem_dob<?php echo $i;?>" value="<?php echo $result2['fmy_dob'];?>" class="form-control" required>
								  </div>
                                </div>
							</div>
							
						    </div>
							
						<?php }?>
					</div><br>
					<div class="clearfix"></div>
						<br>
						<div class="col-sm-7 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
					</form>
					</div>
			<!--family Tab End -->
		
			<!--advance Tab Start -->
					 <div class="tab-pane" id="advance">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Advance</h3>
								</div><br>
						  <form action="process_main.php?action=update_advance" method="POST" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="adv_pf" name="adv_pf"  placeholder="Enter PF No"  readonly>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Advances Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 
							 <select class="form-control primary" id="adv_type" name="adv_type" style="width:100%;">
							 
							 </select>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary" id="adv_letterno" name="adv_letterno"   placeholder="Enter Letter No" required />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="date" class="form-control primary" id="adv_letterdate" name="adv_letterdate" required  />
								  </div>
                                </div>
						    </div>
						</div><br>
						
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 <input type="date" class="form-control primary" id="adv_wefdate" name="adv_wefdate" required  />
								  </div>
                                </div>
						    </div>
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Amount<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary" id="adv_amount" name="adv_amount" placeholder="Enter ROP" required />
								  </div>
                                </div>
						    </div>
						</div><br>
						<h5><b>Recovery Details:</b></h5><hr>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Total Amount</label>
								<label class="control-label col-md-2 col-sm-3 col-xs-12" >Principle</label>
								 <div class="col-md-6 col-sm-8 col-xs-12" >
									 <input type="text" class="form-control primary" id="adv_principle" name="adv_principle" placeholder="Enter Principle Amount" />
								  </div> 
                                </div>
						    </div>
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Interest<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary" id="adv_interest" name="adv_interest" placeholder="Enter Interest" />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >From Date</label>
								 <div class="col-md-8 col-sm-8 col-xs-12" >
									 <input type="date" class="form-control primary" id="adv_frmdate" name="adv_frmdate" placeholder="Enter Principle Amount" />
								  </div> 
                                </div>
						    </div>
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >To Date<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="date" class="form-control primary" id="adv_todate" name="adv_todate" placeholder="Enter Interest" />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 ">Remark</label>
								  <div class="col-md-10">
									 <textarea  rows="4"  class="form-control primary description" id="adv_remark" name="adv_remark"placeholder="Enter Advances Remark" required></textarea>
								  </div>
                                </div>
						    </div>
						</div><br>
					 
			  	
				<div class="form-group">
				<div class="col-sm-2 col-xs-12 pull-right">
					<input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
					
            </div>
			</form>
					</div>
			<!--advance Tab End -->
			
				<!--Peoperty Tab Start -->
					 <div class="tab-pane" id="property">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Property</h3>
								</div><br>
						   <form  action="process_main.php?action=add_property" method="POST" class="apply_readonly">
					
					<div class="clearfix"></div>
					
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="pd_pf_no" name="pd_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" readonly required>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Property Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select name="pd_pro_type" id="pd_pro_type" class="form-control" style="margin-top:0px; width:100%;" required>
										
									</select> 
								  </div>
                                </div>
						    </div>
					</div><br>
					<div class="clearfix"></div> 						
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Item</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="pd_item_name" id="pd_item_name" class="form-control" style="margin-top:0px; width:100%;" required>
										
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Item</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="pd_othr_item_name" name="pd_othr_item_name" class="form-control TextNumber">
								  </div>
                                </div>
						    </div>
								
						    </div>
						
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Make/Model</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_make_model" name="pd_make_model" class="form-control TextNumber"placeholder="Enter Make/Modal" required> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">DOP</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="date" id="pd_dop" name="pd_dop" class="form-control" required>
									  </div>
									</div>
								</div>			
						    </div>
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Location</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_location" name="pd_location" class="form-control TextNumber"placeholder="Enter Location" required> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Registration No</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_reg_no" name="pd_reg_no" class="form-control TextNumber" placeholder="Enter Registration No" required>
									  </div>
									</div>
								</div>			
						    </div>
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Area</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_area" name="pd_area" class="form-control TextNumber" placeholder="Enter Area" required> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Survey Number</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_sur_no" name="pd_sur_no" class="form-control TextNumber"  placeholder="Enter Survey No" required>
									  </div>
									</div>
								</div>			
						    </div>
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Total Cost</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_total_cost" name="pd_total_cost" class="form-control TextNumber"placeholder="Enter Total Cost" required> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Source</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_source" name="pd_source" class="form-control TextNumber" placeholder="Enter Source" required>
									  </div>
									</div>
								</div>			
						    </div>
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Source Type</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<select name="pd_sourcr_type" id="pd_sourcr_type" class="form-control" style="margin-top:0px; width:100%;" required>
										
									</select> 
										
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Amount</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_source_amt" name="pd_source_amt" class="form-control TextNumber" placeholder="Enter Source Amount" required>
									  </div>
									</div>
								</div>			
						    </div>
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_letter_no" name="pd_letter_no" class="form-control"placeholder="Enter Letter Number" required> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Letter Date</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="date" id="pd_letter_date" name="pd_letter_date" class="form-control" required>
									  </div>
									</div>
								</div>			
						    </div><br>
							 
								<div class="row" >
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-2 col-sm-1 col-xs-12">Remarks</label>
								  <div class="col-md-10 col-sm-12 col-xs-12">
									 
									 <textarea  rows="2" style="resize:none"  class="form-control primary description" id="prop_remark" name="prop_remark"placeholder="Enter  Remark" required></textarea>
								  </div>
                                </div>
							</div>
						</div>
							
							
					<br>
					<div class="clearfix"></div>
						<br>
						<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   </div>
					</form>
					</div>
			  <!--property Tab End -->
			
			<!--Training Tab Start -->
					 <div class="tab-pane" id="traning">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Training</h3>
								</div><BR>
						  <form action="process_main.php?action=add_training" method="POST" class="apply_readonly">
					
					<div class="clearfix"></div>
					
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tr_pf_no" name="tr_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" readonly required >
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select name="tr_training_status" id="tr_training_status" class="form-control" style="margin-top:0px; width:100%;" required>
										
									</select> 
								  </div>
                                </div>
						    </div>
					</div >
					
					<div class="row" id="schedule_id"><br>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Last Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="date" id="tr_training_date" name="tr_training_date" class="form-control "  >
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12"> 
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Due Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="date" id="tr_training_to" name="tr_training_to" class="form-control"  >
								  </div>
                                </div>
						    </div>
							
						    </div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="date" id="tr_training_from" name="tr_training_from" class="form-control " required>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training To</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="date" id="tr_training_to" name="tr_training_to" class="form-control" required>
								  </div>
                                </div>
						    </div>
							
						    </div>
						
					<div class="clearfix"></div> <br>
						<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="tr_ltr_no" name="tr_ltr_no" class="form-control TextNumber" placeholder="Enter Letter Number" required> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Letter Date</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="date" id="tr_ltr_date" name="tr_ltr_date" class="form-control" required>
									  </div>
									</div>
								</div>		
					</div>
					<br>
								<div class="row" >
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-2 col-sm-1 col-xs-12">Description</label>
								  <div class="col-md-10 col-sm-12 col-xs-12">
									 <textarea  rows="2"  class="form-control primary description" id="tr_desc" name="tr_desc"placeholder="Enter Description" required></textarea>
								  </div>
                                </div>
							</div>
						</div><br>
					<div class="row" >
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-2 col-sm-1 col-xs-12">Remarks</label>
								  <div class="col-md-10 col-sm-12 col-xs-12">
									<textarea  rows="2"  class="form-control primary description" id="tr_remark" name="tr_remark"placeholder="Enter Remark" required></textarea>
								  </div>
                                </div>
							</div>
						</div><br>
					
					<div class="clearfix"></div>
						<br>
						<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
							     <br>						
					
					</form>
					</div>
			  <!--Training Tab End -->
			  
		     <!--Last Tab Start -->
					
					 <div class="tab-pane" id="extra_entry">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Last Entry</h3>
								</div><br>
									 <form action="process_main.php?action=add_lastentry" method="POST" class="apply_readonly">
					
					<div class="clearfix"></div>
					
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="le_pf_no" name="le_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" required readonly >
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Joining</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="le_doj" name="le_doj" class="form-control TextNumber startdate" readonly placeholder="Select Date">
								  </div>
                                </div>
						    </div>
					</div >
					<br>
					<div class="row" id="schedule_id">
						<div class="col-md-6 col-sm-12 col-xs-12"> 
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Retirement Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="le_retiredment_type" id="le_retiredment_type" class="form-control" style="margin-top:0px; width:100%;" required>
										<option disabled selected >Select Retirement Type</option>
										<option value="1">Superannuation</option>
										<option value="2">VRS</option>
										<option value="3">Death</option>
										
									</select> 
								  </div>
                                </div>
					    </div>
					
					
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Retirement</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="date" id="tr_training_from" name="tr_training_from" class="form-control startdate">
								  </div>
                                </div>
						    </div>
						
							
						    </div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation On Retirement</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="le_des_retitr" name="le_des_retitr" class="form-control TextNumber" readonly>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="le_dept" name="le_dept" class="form-control" readonly>
								  </div>
                                </div>
						    </div>
							
						    </div>
						
					<div class="clearfix"></div> <br>
						<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="hidden" id="station_idh" name="station_idh">
										<input type="text" id="stationh" name="stationh" class="form-control station"  readonly> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">ROP</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_rop" name="le_rop" class="form-control" readonly>
									  </div>
									</div>
								</div>		
					</div>
					<br>
					<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="le_billunit" name="le_billunit" class="form-control TextNumber"  readonly> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Scale/Level</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_scale_level" name="le_scale_level" class="form-control" readonly>
									  </div>
									</div>
								</div>		
					</div>
					<br>
					<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="le_depot" name="le_depot" class="form-control TextNumber"  readonly> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Employee Category</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_emp_cat" name="le_emp_cat" class="form-control" readonly>
									  </div>
									</div>
								</div>		
					</div>
					<br>
					<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Total Service</label>
									  <div class="col-md-3 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_year" name="le_total_year" class="form-control TextNumber" placeholder="Years" > 
									  </div>
									  <div class="col-md-3 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_month" name="le_total_month" class="form-control TextNumber" placeholder="Months"  > 
									  </div>
									  <div class="col-md-2 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_day" name="le_total_day" class="form-control TextNumber" placeholder="days"  > 
									  </div>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >NO Qualification Service</label>
									  <div class="col-md-3 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_year" name="le_total_year" class="form-control TextNumber" placeholder="Years" > 
									  </div>
									  <div class="col-md-3 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_month" name="le_total_month" class="form-control TextNumber" placeholder="Months"  > 
									  </div>
									  <div class="col-md-2 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_day" name="le_total_day" class="form-control TextNumber" placeholder="days"  > 
									  </div>
									</div>
								</div>
					</div>
					<br>
							<hr ></hr>
					<h3>Leave Balance</h3>
					<hr ></hr>
						<div class="row">
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >LAP</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="le_lap" name="le_lap" class="form-control TextNumber"  readonly> 
									  </div>
									</div>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">LHAP</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_lhap" name="le_lhap" class="form-control" readonly>
									  </div>
									</div>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Advance Leaves</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_advance" name="le_advance" class="form-control" readonly>
									  </div>
									</div>
								</div>		
					</div>
					<br>
					<div class="clearfix"></div>
						<br>
						<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
							     <br>						
					
					</form>
					</div> 
			  <!--Last Tab End -->
			   <!--Last Tab Start -->
					<div class="tab-pane" id="leave">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Online Office Order</h3>
								</div><BR>
						  <p>All Office orders are display here</p>
					 
					</div>  
			  <!--Last Tab End -->
		
          </div>
		  
        </div>
			
			
		</div>
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal Bill Unit-->
<div id="bill_unit_select" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Deopt and Bill Unit</h4>
      </div>
      <div class="modal-body">
		<input type="hidden" name="got_bill_unit" id="got_bill_unit">
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Zone</label>
				<select class="form-control" style="width:100%;" id="modal_zone" name="modal_zone">
					<option value="blank" selected>--Select Zone--</option>
					<?php
						dbcon();
						$sql=mysql_query("select * from aims");
						while($sql_fetch=mysql_fetch_array($sql))
						{
							echo "<option value='".$sql_fetch['RLYCODE']."'>".$sql_fetch['LONGDESC']."</option>";
						}
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Unit</label>
				<select class="form-control" style="width:100%;" id="modal_unit" name="modal_unit">
					<option value="" readonly hidden selected>--Select Unit--</option>
					
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Bill Unit/Depot</label>
				<select class="form-control" style="width:100%;" id="bill_unit_depot" name="bill_unit_depot">
					<option value="" readonly hidden selected>--Bill Unit/Depot--</option>
					
				</select>
			</div>
		</div>
      </div>
      <div class="modal-footer">
		<div class="row pull-left">
			<div class="col-md-12">
			<a href="#" data-toggle='modal' data-target="#extra_billunit" data-dismiss="modal" style="color:red;">In case of Complexities In mapping units click on this link for customise mapping</a>
			</div>
		</div>
		<br>
		<br>
        <button type="button" class="btn btn-primary" id="modal_okay" name="modal_okay" data-dismiss="modal">Okay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- bill unit modal ends----------->

<!--Extra Modal Bill Unit-->
<div id="extra_billunit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Deopt and Bill Unit</h4>
      </div>
      <div class="modal-body">
	  <form method="POST" action="process.php?add_deopt_billunit">
		<input type="hidden" name="got_bill_unit" id="got_bill_unit">
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Zone</label>
				<input type="text" class="form-control" id="extra_modal_zone" name="extra_modal_zone">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Unit</label>
				<input type="text" class="form-control" id="extra_modal_unit" name="extra_modal_unit">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Bill Unit</label>
				<input type="text" class="form-control" id="extra_modal_billunit" name="extra_modal_billunit">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Depot</label>
				<input type="text" class="form-control" id="extra_modal_depot" name="extra_modal_depot">
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modal_add_depot_okay" name="modal_add_depot_okay" data-dismiss="modal">Okay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
	</form>
  </div>
</div>
<!-- bill unit modal ends----------->

 <!-- station Unit-->
<div id="station" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Station</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Zone</label>
				<select class="form-control" style="width:100%;" id="modal_zone_station" name="modal_zone_station">
					<option value="blank" selected>--Select Zone--</option>
					<?php
						dbcon();
						$sql=mysql_query("select * from aims");
						while($sql_fetch=mysql_fetch_array($sql))
						{
							echo "<option value='".$sql_fetch['RLYCODE']."'>".$sql_fetch['LONGDESC']."</option>";
						}
					?>
				</select>
			</div>
		</div>
		<input type="hidden" name="got_station" id="got_station">
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Division</label>
				<select class="form-control" style="width:100%;" id="modal_division" name="modal_division">
					<option value="" selected>--Select Division--</option>
					<?php
						/* dbcon();
						$sql=mysql_query("select * from division");
						while($sql_fetch=mysql_fetch_array($sql))
						{
							echo "<option value='".$sql_fetch['rlycode']."'>".$sql_fetch['longdesc']."</option>";
						} */
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Station</label>
				<select class="form-control" style="width:100%;" id="modal_station" name="modal_station">
					<option value="" readonly hidden selected>--Select Station--</option>
					
				</select>
			</div>
		</div>
		<br>
		<div class="row" style="display:none;" id="other_station">
			<div class="col-md-12">
				<label for="modal_zone">Enter Name of Other Station</label>
				<input type="text" class="form-control" id="add_other_station" name="add_other_station">
			</div>
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modal_station_okay" name="modal_station_okay" data-dismiss="modal">Okay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- station modal ends----------->

  <!-- add regular medical modal start-->
<div id="add_regular_medical" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Medical</h4>
      </div>
      <div class="modal-body">
			<form action="process_main.php?action=add_initial_medical" method="POST">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary TextNumber common_pf_number" id="medi_pf_no" name="medi_pf_no" readonly required />
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Category</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat" id="medi_cat" class="form-control" style="margin-top:0px; width:100%;" required>
										<option value="blank" selected></option>
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
								<?php
								$last_pf="";
								if($_SESSION['set_update_pf']!="")
								{	dbcon1();
									$last_pf=$_SESSION['set_update_pf'];
									$sql=mysql_query("select dob from biodata_temp where pf_number='$last_pf'");
									
									while($result=mysql_fetch_array($sql)){
										$last_pf=$result['dob'];
									}
								}else{
									$last_pf="";
								}
									
								?>
								<input type="text" name="med_dob" id="med_dob" class="form-control"  required readonly value="<?php echo $last_pf;?>">
								
								</div>
                            </div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Appointment</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="date" name="med_appo_date" id="med_appo_date" class="form-control"  required>
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
								<select class="form-control primary" id="in_med_desig" name="in_med_desig" style="margin-top:0px; width:100%;" required>
								<option value="blank" selected></option>
								<?php
									dbcon();
									$sqlDept=mysql_query("select * from designation");
									while($rwDept=mysql_fetch_array($sqlDept))
									{
									?>
									<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
									<?php
									}
								
									?>
								</select>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Class For PME</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat_pme" id="medi_cat_pme" class="form-control" style="margin-top:0px; width:100%;" required>
										<option value="blank" selected></option>
										<option value="A1/A2/A3">A1/A2/A3</option>
										<option value="B1/B2">B1/B2</option>
										<option value="C1/C2">C1/C2</option>
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
								<select name="medi_exam" id="medi_exam" class="form-control" style="margin-top:0px; width:100%;" required>
										<option value="blank" selected></option>
										<!--option value="initial">Initial</option-->
										<option value="periodic">Periodic</option>
										<option value="special">Special</option>
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
								<input type="text" id="medi_cer_no" name="medi_cer_no" class="form-control" placeholder="Enter If any" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="date" id="med_cer_date" name="med_cer_date" class="form-control   " placeholder="Enter If any" required>
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
								 <textarea  rows="2" style="resize:none;" class="form-control primary" id="med_ref" name="med_ref"  placeholder="Enter Medical Reference" ></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="date" id="med_ref_date" name="med_ref_date" class="form-control   " placeholder="Select Date"  required>
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
			
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >ADD</button>
		<button type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>
<!-- bill unit modal ends----------->
<script type="text/javascript">
    $(function () {
        $('#bio_dob').datepicker();
    });
</script>
<script>
var x = '';
	var y = '';
jQuery(document).ready(function() {
	
    jQuery('.tab .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tab ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
	
	//fetch biodata
	$.ajax({
		type:"GET",
		url:"bio_process.php",
		data:"action=get_bio_data&pf_counter="+pf_counter_id,
		success:function(data){
			//alert(data);
			var array = data.split("$");
			//$("#bio_oldpf_no").val(array[0]);
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
			$("#bio_p_addr").html(array[16]);
			$("#state_code").children('option').remove();
			$("#state_code").append(array[17]);
			$("#pincode").children('option').remove();
			$("#pincode").append(array[18]);
			$("#bio_pre_addr").html(array[19]);
			$("#state_code_2").children('option').remove();
			$("#state_code_2").append(array[20]);
			$("#pincode_2").children('option').remove();
			$("#pincode_2").append(array[21]);
			$("#add_iden_mark").append(array[22]);
			$("#bio_religion").children('option').remove();
			$("#bio_religion").append(array[23]);
			$("#bio_commu").children('option').remove();
			$("#bio_commu").append(array[24]);
			$("#bio_cast").val(array[25]);
			$("#bio_req_code").children('option').remove();
			$("#bio_req_code").append(array[26]);
			$("#bio_grp").children('option').remove();
			$("#bio_grp").append(array[27]);
			var temp = array[28];
			var edu1 = temp.split("@");
			for(var i = 0; i < edu1.length; i++){
				if(i%2 == 0)
				$("#add_edu_info_drop_1").append(edu1[i]);
				else
				$("#edu_pri_info_desc_1").append(edu1[i]);
			}
			x = array[29];
			var temp1 = array[30];
			var edu1 = temp1.split("@");
			for(var i = 0; i < edu1.length; i++){
				if(i%2 == 0)
				$("#add_edu_info_drop_2").append(edu1[i]);
				else
				$("#add_edu_info_desc_2").append(edu1[i]);
			}
			y = array[31];
			$("#bio_bank_name").val(array[32]);
			$("#bio_acc_no").val(array[33]);
			$("#bio_micr").val(array[34]);
			$("#bio_ifsc").val(array[35]);
			$("#bio_bank_address").html(array[36]);
			//$("#bio_pf_no").val(array[37]);
			

		}
	});
	
	//fetch appointment
	 var pf_number='<?php echo "".$_SESSION['set_update_pf'];?>';
	//alert(pf_number);
	$.ajax({
			type:'POST',
			url:'process.php',
			data:'action=get_appointment_data&pf_number='+pf_number,
			success:function(data){
			   //alert(data);
			var ddd=data;
			var arr2=ddd.split('$');
			var dt=arr2[3];
			 var newdate = dt.split("/").reverse().join("-");
			 
			 var rdt=arr2[4];
			 var newdate1 = rdt.split("/").reverse().join("-");
			 
			  var lrdt=arr2[15];
			 var newdate2 = lrdt.split("/").reverse().join("-");
			 
			
			 
			$("#app_dept").append("<option selected>"+arr2[0]+"</option>");
			$("#app_desig").append("<option selected>"+arr2[1]+"</option>");
			$('#app_date').val(newdate);
			$('#app_datereg').val(newdate1);
		    $("#ps_type_1").append("<option selected>"+arr2[5]+"</option>");
		     $("#app_scale").append("<option selected>"+arr2[6]+"</option>");
		     $("#app_level").append("<option selected>"+arr2[7]+"</option>");
		     $("#app_group").append("<option selected>"+arr2[8]+"</option>");
			 $("#station3").val(arr2[9]);
			 $("#app_rop").val(arr2[12]);
			 $("#depot3").val(arr2[13]);
			 $("#app_letterno").val(arr2[14]);
			 $("#app_letterdate").val(newdate2);
			 $("#app_remark").val(arr2[16]);
			  $("#initial_type").append("<option selected>"+'Regular'+"</option>");
			}
		});
	
	// fetch present work
	var pre_pf=$("#pre_pf_no").val();
	$.ajax({
		type:"POST",
		url:"process.php",
		data:"action=fetch_present_work&pre_pf="+pre_pf,
		success:function(data){
			//alert(data);
			
			var html = JSON.parse(data);
			//alert(html['sgd_designation']);
			$("#preapp_dept").append("<option selected>"+html['preapp_department']+"</option>");
			$("#preapp_sgd_desig").append("<option selected value=''>"+html['sgd_designation']+"</option>");
			$("#preapp_desig").append("<option selected>"+html['preapp_designation']+"</option>");
			$("#preapp_otherstation").val(html['pre_otherdesign']);
			$("#ps_type_2").append("<option selected>"+html['ps_type']+"</option>");
			$("#preapp_scale").val(html['preapp_scale']);
			$("#preapp_group").val(html['preapp_group']);
			$("#station6").val(html['preapp_station']);
			$("#station_id6").val(html['preapp_station']);
			$("#preapp_level").val(html['preapp_level']);
			$("#billunit1").val(html['preapp_billunit']);
			$("#depot_bill_unit1").val(html['preapp_billunit']);
			$("#depot1").val(html['preapp_depot']);
			$("#preapp_rop").val(html['preapp_rop']);
			$("#preapp_subtype1").val(html['sgd_dropdwn']);
			if(html['sgd_dropdwn']=='1')
			{
				$("#show1").show();
				$("#show2").show();
				$("#pwd").hide();
			}
			$("#preapp_sgd_other_desig").val(html['presgd_otherdesign']);
			$("#sgd_ps_type_2").append("<option selected>"+html['sgd_pst']+"</option>");
			$("#preapp_sgd_scale").append("<option selected>"+html['sgd_scale']+"</option>");
			$("#preapp_sgd_level").append("<option selected>"+html['sgd_level']+"</option>");
			$("#billunit2").val(html['sgd_billunit']);
			$("#depot_bill_unit2").val(html['sgd_billunit']);
			$("#depot2").val(html['sgd_depot']);
			$("#station4").val(html['sgd_station']);
			$("#station_id4").val(html['sgd_station']);
			$("#sgd_preapp_group").append("<option selected>"+html['sgd_group']+"</option>");
			$("#preapp_ogd_desig").append("<option selected>"+html['ogd_desig']+"</option>");
			$("#preapp_ogd_other_desig").val(html['preogd_otherdesign']);
			$("#ogd_ps_type_2").append("<option selected>"+html['ogd_pst']+"</option>");
			$("#preapp_ogd_scale").append("<option selected>"+html['ogd_scale']+"</option>");
			$("#preapp_ogd_level").append("<option selected>"+html['ogd_level']+"</option>");
			$("#billunit4").val(html['ogd_billunit']);
			$("#depot_bill_unit4").val(html['ogd_billunit']);
			$("#depot4").val(html['ogd_depot']);
			$("#station5").val(html['ogd_station']);
			$("#station_id5").val(html['ogd_station']);
			$("#preapp_ogd_group").append("<option selected>"+html['ogd_group']+"</option>");
			$("#preapp_ogd_rop").val(html['ogd_rop']);
			 
				 
		}
	});
	
	//fetch advance
	$.ajax({
		type:"POST",
		url:"process.php",
		data:"action=fetch_advance&pre_pf="+pf_number,
		success:function(data){
			//alert(data);
			
			var html = JSON.parse(data);
			//alert(html);
			$("#adv_type").append("<option selected>"+html['adv_type']+"</option>");
			
			$("#adv_letterno").val(html['adv_letterno']);
			$("#adv_letterdate").val(html['adv_letterdate'].slice(0,-9));
			$("#adv_wefdate").val(html['adv_wefdate'].slice(0,-9));
			$("#adv_amount").val(html['adv_amount']);
			$("#adv_principle").val(html['adv_principle']);
			$("#adv_interest").val(html['adv_interest']);
			$("#adv_frmdate").val(html['adv_from'].slice(0,-9));
			$("#adv_todate").val(html['adv_to'].slice(0,-9));
			$("#adv_remark").val(html['adv_remark']);
	
		}
	});
	
	//fetch increment
	$.ajax({
		type:"POST",
		url:"process.php",
		data:"action=fetch_increment&pre_pf="+pf_number,
		success:function(data){
			//alert(data);
			
			var html = JSON.parse(data);
			//alert(html);
			$("#incr_type").append("<option selected>"+html['incr_type']+"</option>");
			
			$("#incr_date").val(html['incr_date'].slice(0,-9));
			$("#ps_type_4").append("<option selected>"+html['ps_type']+"</option>");
			if(html['ps_type']=='1')
			{
				$("#level_4").hide();
				$("#scale_4").show();
			}
			else
			{
				$("#scale_4").hide();
				$("#level_4").show();
			}
			$("#incr_scale").append("<option selected>"+html['incr_scale']+"</option>");
			$("#incr_level").append("<option selected>"+html['incr_level']+"</option>");
			$("#incr_oldrop").val(html['incr_oldrop']);
			$("#incr_rop").val(html['incr_rop']);
			$("#incr_personel").val(html['incr_personel']);
			$("#incr_special").val(html['incr_special']);
			$("#incr_nxt_incr").val(html['incr_nextdate'].slice(0,-9));
			$("#incr_remark").val(html['incr_remark']);
		}
	});
	
	//add_penalty
	$.ajax({
		type:"POST",
		url:"process.php",
		data:"action=fetch_present_penalty&pre_pf="+pf_number,
		success:function(data){
			//alert(data);
			
			var html = JSON.parse(data);
			//alert(html['sgd_designation']);
			$("#penalty_pf_no").val(html['pen_pf_number']);	
			$("#p_type").append("<option selected>"+html['pen_type']+"</option>");
			$("#pen_awarded").val(html['pen_issued'].slice(0,-9));
			$("#pen_eff").val(html['pen_effetcted'].slice(0,-9));
			$("#l_no").val(html['pen_letterno']);
			$("#ltr_date").val(html['pen_letterdate'].slice(0,-9));	
			$("#chrg_stat").append("<option selected>"+html['pen_chargestatus']+"</option>");
			$("#pen_chrg_ref_no").val(html['pen_chargeref']);	
			$("#f_date").val(html['pen_from'].slice(0,-9));	
			$("#t_date").val(html['pen_to'].slice(0,-9));	
			$("#penalty_remark").val(html['pen_remark']);	
				
		}

	});
	
	//fetch_awards
	$.ajax({
		type:"POST",
		url:"process.php",
		data:"action=fetch_present_awards&pre_pf="+pf_number,
		success:function(data){
			//alert(data);
			
			var html = JSON.parse(data);
			//alert(html['sgd_designation']);
			$("#award_pf_no").val(html['awd_pf_number']);	
			$("#award_date").val(html['awd_date'].slice(0,-9));	
			$("#award_award_by").append("<option selected>"+html['awd_by']+"</option>");
			$("#award_type_award").append("<option selected>"+html['awd_type']+"</option>");
			$("#award_other_award").val(html['awd_other']);
			$("#award_detail").val(html['awd_other']);	
         	
		}
	});
	
	$.ajax({
		type:"POST",
		url:"process.php",
		data:"action=fetch_property&pro_pf="+pf_number,
		success:function(data){
			//alert(data);
			 
			var html = JSON.parse(data);
		//	alert(html);
			//alert(html['sgd_designation']);
			$("#pd_pf_no").val(html['pro_pf_number']);
			if(html['pd_pro_type']==1)
			{
				var pro1='movable';
				$("#pd_pro_type").append("<option selected>"+pro1+"</option>");
			}	
			else
			{
				var pro2='immovable';
				$("#pd_pro_type").append("<option selected>"+pro2+"</option>");
			}
			
			$("#pd_item_name").append("<option selected>"+html['pro_item']+"</option>");
			$("#pd_othr_item_name" ).val(html['pro_otheritem']);
			$("#pd_make_model").val(html['pro_make']);
			$("#pd_dop").val(html['pro_dop'].slice(0,-9));
			$("#pd_location").val(html['pro_location']);
			$("#pd_reg_no").val(html['pro_regno']);
			$("#pd_area").val(html['pro_area']);
			$("#pd_sur_no").val(html['pro_surveyno']);
			$("#pd_total_cost").val(html['pro_cost']);
			$("#pd_source").val(html['pro_source']);
			$("#pd_sourcr_type").val(html['pro_sourcetype']);
			$("#pd_source_amt").val(html['pro_amount']);
			$("#pd_letter_no").val(html['pro_letterno']);
			$("#pd_letter_date").val(html['pro_letterdate'].slice(0,-9));
			$("#prop_remark").val(html['pro_remark']);
			 
				 
		}
	});

	
	//var tra_pf=$("#tr_pf_no").val();
   // alert(pf_number);
	$.ajax({
		type:"POST",
		url:"process.php",
		data:"action=fetchtraining&tra_pf="+pf_number,
		success:function(data){
			//alert(data);
 			var html =JSON.parse(data);
			//alert(html);
			//alert(html['sgd_designation']);
			$("#tr_pf_no").val(html['pf_number']);
			if(html['tr_training_status']==1)
			{
				var tra1='Initial';
				$("#tr_training_status").append("<option selected>"+tra1+"</option>");
			}	
			else if(html['tr_training_status']==2)
			{
				var tra2='Promotional';
				$("#tr_training_status").append("<option selected>"+tra2+"</option>");
			}
			else if(html['tr_training_status']==3)
			{
				var tra3='Refresher';
				$("#tr_training_status").append("<option selected>"+tra3+"</option>");
			}
			else if(html['tr_training_status']==4)
			{
				var tra4='Special';
				$("#tr_training_status").append("<option selected>"+tra4+"</option>");
				
			}
			else if(html['tr_training_status']==5)
			{
				var tra5='Schedule';
				$("#tr_training_status").append("<option selected>"+tra5+"</option>");
				
				
			}
			else if(html['tr_training_status']==6)
			{
				var tra6='Others';
				$("#tr_training_status").append("<option selected>"+tra6+"</option>");
			}
			
			//alert(html['training_from']);
			//alert(html['last_date']);
			
			$("#tr_training_date").val(html['last_date']);
			$("#tr_training_todate").val(html['due_date']);
			$("#tr_training_from").val(html['training_from']);
			$("#tr_training_to").val(html['last_date']);
			$("#tr_ltr_no").val(html['letter_no']);
			$("#tr_ltr_date").val(html['letter_date']);
			$("#tr_desc").val(html['description']);
			$("#tr_remark").val(html['remarks']);
				 
		}
	});
	
});


var pf_counter_id = <?php echo $pf_fetch_count+1;?>;
var gis_counter_id = <?php echo $gis_fetch_count+1;?>;
var gra_counter_id = <?php echo $gra_fetch_count+1;?>;

function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
}

  $("#pf_counter_btn").on("click", function(){debugger;
	$("#pf_counter").val(pf_counter_id);
	var pf_counter = pf_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_pf&pf_counter="+pf_counter,
		success:function(data){
			$("#append_PFdata").prepend(data);
			$("#pf_counter").val(pf_counter_id);
			pf_counter_id++;
		}
	});
});

 $("#gis_counter_btn").on("click", function(){debugger;
	$("#gis_counter").val(gis_counter_id);
	var gis_counter = gis_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_gis&gis_counter="+gis_counter,
		success:function(data){
			$("#append_GISdata").prepend(data);
			$("#gis_counter").val(gis_counter_id);
			gis_counter_id++;
		}
	});
});

 $("#gra_counter_btn").on("click", function(){debugger;
	$("#gra_counter").val(gra_counter_id);
	var gra_counter = gra_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_gra&gra_counter="+gra_counter,
		success:function(data){
			$("#append_GRAdata").prepend(data);
			$("#gra_counter").val(gra_counter_id);
			gra_counter_id++;
		}
	});
});
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
			  window.location='sr_entry.php';
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
					$("#bio_save").attr('disabled',true);
					
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
				//$("#bio_cug").val("");
				return false;  
				}  
		}
		
		function prannumber(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{12}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".pranno").text("");
				$("#valided_text").val("");
				$(".pran_no").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".pranno").text("PRAN number must be 12 digits");
				$("#valided_text").val("1");
				$(".pran_no").addClass("has-error");
				alert("PRAN number must be 12 digits");  
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
				
				return false;  
				}  
		}
		
 </script>
 <script>
 jQuery(document).ready(function() {
	var $select1 = $( '#pd_pro_type' ),
		$select2 = $( '#pd_item_name' ),
	$options = $select2.find( 'option' );

		$select1.on( 'change', function() {
			$select2.html( $options.filter( '[value="' + this.value + '"]' ) );
		} ).trigger( 'change' );
 });
</script>
 <script>
$('#tr_training_status').change(function () {
	var value = $(this).val(); 
	//alert(value);
	if (value == 5) {
		$('#schedule_id').show();
	}
	else {
		$('#schedule_id').hide();
	}
	 

});
 
$('#initial_type').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			 if($(this).val()!= "4"){
           $(".lbl_oth").show();
           $(".lbl_reg").hide();
           $("#appo_date").hide();
		    
            } 
else{
	  $(".lbl_oth").hide();
           $(".lbl_reg").show();
    }			
});

var med_exist=<?php echo $med_exist;?>;
	if(med_exist==1)
	{
		//alert("This Pf Number is Already Registered For Initial Medical Entry");
		$('#form_medical input').attr('disabled',true);
		$('#form_medical textarea').attr('disabled',true);
		$('#form_medical select').attr('disabled',true);
	}else{
		$('#form_medical input').attr('disabled',false);
		$('#form_medical textarea').attr('disabled',false);
		$('#form_medical select').attr('disabled',false);
	}
</script>
 <script>
$("#app_bill_unit").on("change", function(){
var app_bill_unit = document.getElementById('app_bill_unit').value;
// alert(app_bill_unit);
$.ajax({
  type:"post",
  url:"process.php",
  data:"action=get_depot&app_bill_unit="+app_bill_unit,
  success:function(data){
  //alert(data);
	var ddd=data;
	var arr=ddd.split('$');
	//alert(arr[0]);
	 $("#app_depot").val(arr[0]);
  }
});
});
</script>
 <script>
$(document).ready(function(){
	
		$("#preapp_desig").change( function(){ 
			var x2 = $(this).val();
			//alert(x2);
			if(x2 == '2031'){	
				 $("#lbl_oth2").show();
			}else{
				 $("#lbl_oth2").hide();
			}	
		 });
	
		$(".lbl_reg").show();
		$('.ps_type').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#scale_"+got_type).show();
		  }else{
			  $("#scale_"+got_type).hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#level_"+got_type).show();
		  }else{
			  $("#level_"+got_type).hide();
		  }
		});
		
		<!------------------------------------------------SGD Code start--------------------------------------------------->
		$('.ps_type1').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#scale").show();
		  }else{
			  $("#scale").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#level").show();
		  }else{
			  $("#level").hide();
		  }
		});
		<!------------------------------------------SGD Code End-------------------------------------------------------->
		
		<!-----------------------------------------OGD Code start------------------------------------------------------->
		$('.ps_type2').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#scale2").show();
		  }else{
			  $("#scale2").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#level2").show();
		  }else{
			  $("#level2").hide();
		  }
		});
		<!----------------------------------- OGD Code start ---------------------------------------------------------->
		// officiating and substansive drop down Type hide show code
	$('#preapp_subtype1').on('change', function () {
		// alert ('sdsdadasda');
			if (this.value == '1') {
				$("#show1").show();
				$("#show2").show();
				$("#pwd").hide();
	
				$("#preapp_desig").attr('required',false);
				$("#preapp_group").attr('required',false);
				$("#preapp_rop").attr('required',false);
				$("#station_id6").attr('required',false);
				$("#depot_bill_unit1").attr('required',false);
				$("#ps_type_2").attr('required',false);

				
				$("#preapp_desig").val("");
				$("#preapp_desig").val('blank').trigger('change');
				$("#ps_type_2").val("");
				$("#preapp_otherstation").val("");
				 
				$("#preapp_level").val('blank').trigger('change');
				$("#preapp_scale").val('blank').trigger('change');				
				 			 
				$("#depot_bill_unit1").val("");			
				$("#billunit1").val("");
				
				$("#station_id6").val("");
				$("#station6").val("");
				
				$("#preapp_rop").val("");	
				$("#preapp_group").val("");
				
			    $("#preapp_sgd_desig").val(""); 
				$("#sgd_ps_type_2").val(""); 
				
				$("#sgd_depot_bill_unit1").val(""); 
				$("#depot1").val(""); 
				$("#station_id4").val(""); 
				
				$("#sgd_preapp_group").val(""); 
				
				$("#preapp_ogd_desig").val(""); 
				$("#ogd_ps_type_2").val(""); 
				$("#ogd_depot_bill_unit1").val(""); 
				$("#station_id5").val(""); 
				$("#ogd_preapp_group").val("");
				$("#preapp_ogd_rop").val("");

				}
				else {
					 
				$("#show1").hide();
				$("#show2").hide();
				$("#pwd").show();
				
				$("#preapp_sgd_desig").attr('required',false);
				$("#sgd_ps_type_2").attr('required',false);
				$("#sgd_depot_bill_unit1").attr('required',false);
				$("#station_id4").attr('required',false);
				$("#sgd_preapp_group").attr('required',false);
				
				$("#preapp_ogd_desig").attr('required',false);
				$("#ogd_ps_type_2").attr('required',false);
				$("#ogd_depot_bill_unit1").attr('required',false);
				$("#station_id5").attr('required',false);
				$("#preapp_ogd_group").attr('required',false);
				$("#preapp_ogd_rop").attr('required',false);
				
				
			    $("#preapp_sgd_desig").val(""); 
				$("#sgd_ps_type_2").val(""); 
				$("#preapp_sgd_other_desig").val(""); 
				$("#preapp_sgd_level").val(""); 
				$("#preapp_sgd_scale").val(""); 
				$("#depot_bill_unit2").val(""); 
				$("#station_id4").val(""); 
				$("#sgd_preapp_group").val(""); 
				$("#billunit2").val(""); 
				$("#depot2").val(""); 
				$("#station4").val("");
			
				
				$("#preapp_ogd_desig").val(""); 
				$("#ogd_ps_type_2").val(""); 
				$("#preapp_ogd_other_desig").val(""); 
				$("#preapp_ogd_level").val(""); 
				$("#preapp_ogd_scale").val(""); 
				$("#depot_bill_unit3").val(""); 
				$("#station_id5").val(""); 
				$("#ogd_preapp_group").val("");
				$("#preapp_ogd_rop").val("");
					$("#billunit3").val(""); 
					$("#depot3").val(""); 
					$("#station5").val(""); 
											
					}
			});
		
	});
</script>
<?php
	 if(isset($_SESSION['set_update_pf']))
	{
		echo "<script>$('.common_pf_number').val('".$_SESSION['set_update_pf']."'); </script>";
		//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
	} 
?>
<script>
$(document).ready(function()
{	
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
				 window.location='sr_entry.php';
			} 
		});
		}else{
			alert("Enter Correct PF Format");
		}
	});
	
	// PRFT Promotion Update
	$(".prft_prm").click(function(){
		var prft_pf_no='<?php echo "".$_SESSION['set_update_pf'];?>';
		
		$.ajax({
		type:"post",
		url:"process_main.php",
		data:"action=get_prft_promotion&prft_pf_no="+prft_pf_no,
		success:function(data){
			var ddd=data;
			var arr=ddd.split('$');
		  
			if(arr[1]=='officiating' || arr[1]=='regular')
			{
				$("#promoform").show();
				$('#pm_ordertype').val(arr[1]).trigger('change');
				$("#pm_letterno").val(arr[2]);
				$('#pm_letterdate').val(arr[3]);
				$('#pm_wef').val(arr[4]);
				$('#pm_frm_dept').val(arr[5]).trigger('change');
				$('#pm_frm_desig').val(arr[6]).trigger('change');
				$('#pm_frm_otherdesig').val(arr[7]);
				$('#pm_frm_ps_type_3').val(arr[8]).trigger('change');
				$('#pm_frm_scale').val(arr[9]).trigger('change');
				$('#pm_frm_level').val(arr[10]).trigger('change');
				$('#pm_frm_group').val(arr[11]).trigger('change');
				$('#station1').val(arr[12]);
				$('#pm_frm_otherstation').val(arr[13]);
				$('#pm_frm_rop').val(arr[25]);
				$('#billunita').val(arr[15]);
				$('#depota').val(arr[15]);
				$('#pm_to_dept').val(arr[16]).trigger('change');
				$('#pm_to_desig').val(arr[17]).trigger('change');
				$('#pm_to_otherdesig').val(arr[18]);
				$('#pm_to_ps_type_3').val(arr[19]);
				$('#pm_to_scale').val(arr[20]).trigger('change');
				$('#pm_to_level').val(arr[21]).trigger('change');
				$('#pm_to_group').val(arr[22]).trigger('change');
				$('#station7').val(arr[23]);
				$('#pm_to_otherstation').val(arr[24]);
				$('#pm_to_rop').val(arr[26]);
				$('#billunit5').val(arr[28]);
				$('#depot5').val(arr[28]);
			}
			else if(arr[1]=='adhoc')
			{
				$("#promoform").show();
				$("#to").show();
				$("#from").show();
				 
				$('#pm_ordertype').val(arr[1]).trigger('change');
				$("#pm_letterno").val(arr[2]);
				$('#pm_letterdate').val(arr[3]);
				$('#pm_wef').val(arr[4]);
				$('#pm_frm_dept').val(arr[5]).trigger('change');
				$('#pm_frm_desig').val(arr[6]).trigger('change');
				$('#pm_frm_otherdesig').val(arr[7]);
				$('#pm_frm_ps_type_3').val(arr[8]).trigger('change');
				$('#pm_frm_scale').val(arr[9]).trigger('change');
				$('#pm_frm_level').val(arr[10]).trigger('change');
				$('#pm_frm_group').val(arr[11]).trigger('change');
				$('#station1').val(arr[12]);
				$('#pm_frm_otherstation').val(arr[13]);
				$('#pm_frm_rop').val(arr[25]);
				$('#billunita').val(arr[15]);
				$('#depota').val(arr[15]);
				$('#pm_to_dept').val(arr[16]).trigger('change');
				$('#pm_to_desig').val(arr[17]).trigger('change');
				$('#pm_to_otherdesig').val(arr[18]);
				$('#pm_to_ps_type_3').val(arr[19]);
				$('#pm_to_scale').val(arr[20]).trigger('change');
				$('#pm_to_level').val(arr[21]).trigger('change');
				$('#pm_to_group').val(arr[22]).trigger('change');
				$('#station7').val(arr[23]);
				$('#pm_to_otherstation').val(arr[24]);
				$('#pm_to_rop').val(arr[26]);
				$('#billunit5').val(arr[28]);
				$('#depot5').val(arr[28]);
			}
			else if(arr[1]=='deputation')
			{
				$("#deputation_tb").show();
				$('#pm_ordertype').val(arr[1]).trigger('change');
				$("#pm_letterno").val(arr[2]);
				$('#pm_letterdate').val(arr[3]);
				$('#pm_wef').val(arr[4]);

				$('#dp_frm_dept').val(arr[5]).trigger('change');
				$('#dp_frm_desig').val(arr[6]).trigger('change');
				$('#dp_frm_otherdesig').val(arr[7]);
				$('#dp_frm_ps_type_3').val(arr[8]).trigger('change');
				$('#dp_frm_scale').val(arr[9]).trigger('change');
				$('#dp_frm_level').val(arr[10]).trigger('change');
				$('#dp_frm_group').val(arr[11]).trigger('change');
				$('#station8').val(arr[12]);
				$('#dp_frm_otherstation').val(arr[13]);
				$('#dp_frm_rop').val(arr[25]);
				$('#billunit6').val(arr[15]);
				$('#depot6').val(arr[15]);
				
				$('#dp_to_dept').val(arr[16]);
				$('#dp_to_desig').val(arr[17]);
				$('#dp_to_othr_desig').val(arr[18]);				
				$('#dp_to_grp').val(arr[22]);
				$('#dp_to_place').val(arr[23]);
			    $('#dp_to_pay_scale_level').val(arr[20]);
				$('#dp_to_rop').val(arr[26]);
				$('#billunit7').val(arr[27]);
				$('#depot7').val(arr[28]);
			}
			else 
			{
				$("#reparation_tb").show();
				$('#pm_ordertype').val(arr[1]).trigger('change');
				$("#pm_letterno").val(arr[2]);
				$('#pm_letterdate').val(arr[3]);
				$('#pm_wef').val(arr[4]);
				
				$('#re_to_dept').val(arr[16]);
				$('#re_to_desig').val(arr[17]);
				$('#re_to_otr_desig').val(arr[18]);				
				$('#re_to_group').val(arr[22]);
				$('#re_to_place').val(arr[23]);
				$('#re_to_pay_scale').val(arr[20]);
				$('#re_to_rop').val(arr[26]);
				$('#billunit8').val(arr[27]);
				$('#depot8').val(arr[28]);
				
				
				$('#re_frm_dept').val(arr[5]).trigger('change');
				$('#re_frm_desig').val(arr[6]).trigger('change');
				$('#re_frm_otherdesig').val(arr[7]);
				$('#re_frm_ps_type_3').val(arr[8]).trigger('change');
				$('#re_frm_scale').val(arr[9]).trigger('change');
				$('#re_frm_level').val(arr[10]).trigger('change');
				$('#re_frm_group').val(arr[11]).trigger('change');
				$('#station9').val(arr[12]);
				$('#re_frm_otherstation').val(arr[13]);
				$('#re_frm_rop').val(arr[25]);
				$('#billunit9').val(arr[15]);
				$('#depot9').val(arr[15]);
				
				
			} 

           	
			
		if(arr[29] == 'No')
		  {
			$("#return").show();
			$("#notreturn").hide();
		  }
		  else{
			  
			  $("#return").hide();
			  $("#notreturn").show();
		  }
           	$('#prtf_carried').val(arr[29]).trigger('change');
			
           	$('#prtf_wefdate').val(arr[30]);
           	$('#prtf_incrdate').val(arr[31]);
			
           	$('#prtf_acc_ltr_no').val(arr[32]);
           	$('#prtf_acc_ltr_date').val(arr[33]);
           	$('#prtf_carr_wef_date').val(arr[34]);
           	$('#prtf_carr_remark').val(arr[35]);
           
		  }
	    });
	});
	
	// PRFT Reversion Update
	$(".prft_rev").click(function(){
		var prft_pf_no='<?php echo "".$_SESSION['set_update_pf'];?>';
		 
		$.ajax({
		type:"post",
		url:"process_main.php",
		data:"action=get_prft_reversion&prft_pf_no="+prft_pf_no,
		success:function(data){	 
			alert(data);
			var ddd=data;
			var arr=ddd.split('$');
			if(arr[1]=='officiating1' || arr[1]=='regular1')
			{
				$("#revform1").show();	
				$('#rev_ordertype').val(arr[1]).trigger('change');
				$("#rev_letterno").val(arr[2]);
				$('#rev_letterdate').val(arr[3]);
				$('#rev_wef').val(arr[4]);
				$('#rev_frm_dept').val(arr[5]).trigger('change');
				$('#rev_frm_desig').val(arr[6]).trigger('change');
				$('#rev_frm_otherdesig').val(arr[7]);
				$('#rev_frm_ps_type_3').val(arr[8]).trigger('change');
				$('#rev_frm_scale').val(arr[9]).trigger('change');
				$('#rev_frm_level').val(arr[10]).trigger('change');
				$('#rev_frm_group').val(arr[11]).trigger('change');
				$('#stationa').val(arr[12]);
				$('#rev_to_otherstation').val(arr[13]);
				$('#rev_frm_rop').val(arr[25]);
				$('#billunitb').val(arr[15]);
				$('#depotb').val(arr[15]);
				
				$('#rev_to_dept').val(arr[16]).trigger('change');
				$('#rev_to_desig').val(arr[17]).trigger('change');
				$('#rev_to_otherdesig').val(arr[18]);
				$('#rev_to_ps_type_3').val(arr[19]);
				$('#rev_to_scale').val(arr[20]).trigger('change');
				$('#rev_to_level').val(arr[21]).trigger('change');
				$('#rev_to_group').val(arr[22]).trigger('change');
				$('#stationb').val(arr[23]);
				$('#rev_to_otherstation').val(arr[24]);
				$('#rev_to_rop').val(arr[26]);
				$('#billunitc').val(arr[28]);
				$('#depotc').val(arr[28]);
			}

			else if(arr[1]=='adhoc1')
			{
			    $("#revform1").show();
			    $("#to3").show();
			    $("#from3").show();
				 
				$('#rev_ordertype').val(arr[1]).trigger('change');
				$("#rev_letterno").val(arr[2]);
				$('#rev_letterdate').val(arr[3]);
				$('#rev_wef').val(arr[4]);
				$('#rev_frm_dept').val(arr[5]).trigger('change');
				$('#rev_frm_desig').val(arr[6]).trigger('change');
				$('#rev_frm_otherdesig').val(arr[7]);
				$('#rev_frm_ps_type_3').val(arr[8]).trigger('change');
				$('#rev_frm_scale').val(arr[9]).trigger('change');
				$('#rev_frm_level').val(arr[10]).trigger('change');
				$('#rev_frm_group').val(arr[11]).trigger('change');
				$('#stationa').val(arr[12]);
				$('#rev_to_otherstation').val(arr[13]);
				$('#rev_frm_rop').val(arr[25]);
				$('#billunitb').val(arr[15]);
				$('#depotb').val(arr[15]);
				
				$('#rev_to_dept').val(arr[16]).trigger('change');
				$('#rev_to_desig').val(arr[17]).trigger('change');
				$('#rev_to_otherdesig').val(arr[18]);
				$('#rev_to_ps_type_3').val(arr[19]);
				$('#rev_to_scale').val(arr[20]).trigger('change');
				$('#rev_to_level').val(arr[21]).trigger('change');
				$('#rev_to_group').val(arr[22]).trigger('change');
				$('#stationb').val(arr[23]);
				$('#rev_to_otherstation').val(arr[24]);
				$('#rev_to_rop').val(arr[26]);
				$('#billunitc').val(arr[28]);
				$('#depotc').val(arr[28]);
				
			}
			else if(arr[1]=='deputation1')
			{
				$("#deputation_tb1").show();
				$('#rev_ordertype').val(arr[1]).trigger('change');
				$("#rev_letterno").val(arr[2]);
				$('#rev_letterdate').val(arr[3]);
				$('#rev_wef').val(arr[4]);
				
				$('#re_de_dept').val(arr[5]).trigger('change');
				$('#re_de_desig').val(arr[6]).trigger('change');
				$('#re_de_otherdesig').val(arr[7]);
				$('#re_de_ps_type_3').val(arr[8]).trigger('change');
				$('#re_de_scale').val(arr[9]).trigger('change');
				$('#re_de_level').val(arr[10]).trigger('change');
				$('#re_de_group').val(arr[11]).trigger('change');
				$('#stationc').val(arr[12]);
				$('#re_de_otherstation').val(arr[13]);
				$('#re_de_rop').val(arr[25]);
				$('#billunitd').val(arr[15]);
				$('#depotd').val(arr[15]);
				
				$('#re_de_to_dept').val(arr[16]);
				$('#re_de_to_desc').val(arr[17]);
				$('#re_de_to_other').val(arr[18]);				
				$('#re_de_to_grp').val(arr[22]);
				$('#re_de_to_place').val(arr[23]);
			    $('#re_de_to_ps').val(arr[20]);
				$('#re_de_to_rop').val(arr[26]);
				$('#re_de_to_bill_unit').val(arr[27]);
				$('#re_de_to_deopt').val(arr[28]);
			}
			else 
			{
				alert('hie');
				$("#reparation_tb13").show();
				$('#rev_ordertype').val(arr[1]).trigger('change');
				$("#rev_letterno").val(arr[2]);
				$('#rev_letterdate').val(arr[3]);
				$('#rev_wef').val(arr[4]);
				
				$('#rep_to_dept').val(arr[16]);
				$('#rep_to_desc').val(arr[17]);
				$('#rep_to_oth_desc').val(arr[18]);				
				$('#rep_to_grp').val(arr[22]);
				$('#rep_to_place').val(arr[23]);
				$('#rep_to_ps_level').val(arr[20]);
				$('#rep_to_rop').val(arr[26]);
				$('#rep_to_bill_unit').val(arr[27]);
				$('#rep_to_deopt').val(arr[28]);
				
				
				$('#rep_from_dept').val(arr[5]).trigger('change');
				$('#rep_from_desg').val(arr[6]).trigger('change');
				$('#rep_from_oth_desg').val(arr[7]);
				$('#rep_from_ps_type_3').val(arr[8]).trigger('change');
				$('#rep_from_scale').val(arr[9]).trigger('change');
				$('#rep_from_level').val(arr[10]).trigger('change');
				$('#rep_from_group').val(arr[11]).trigger('change');
				$('#stationd').val(arr[12]);
				$('#rep_from_otherstation').val(arr[13]);
				$('#rep_from_rop').val(arr[25]);
				$('#billunite').val(arr[15]);
				$('#depote').val(arr[15]);
			} 

           	
			 alert(arr[29]);
		if(arr[29] == 'No')
		  {
			 
			$("#return2").show();
			$("#notreturn2").hide();
		  }
		  else{
			  
			  $("#return2").hide();
			  $("#notreturn2").show();
		  }
           	$('#rep_from_rev_carried').val(arr[29]).trigger('change');
			
           	$('#rep_rev_wefdate').val(arr[30]);
           	$('#rep_rev_incrdate').val(arr[31]);
			
           	$('#prtf_rev_acc_ltr_no').val(arr[32]);
           	$('#prtf_rev_acc_ltr_date').val(arr[33]);
           	$('#rev_carr_wef_date').val(arr[34]);
           	$('#rev_carr_remark').val(arr[35]);
           
		  }
	    });
	});
	 
	
	// PRFT transfer Fetch Code Here
	// Umesh Code here

	$(".prft_trans").click(function(){
		var prft_pf_no='<?php echo "".$_SESSION['set_update_pf'];?>';
		//alert(prft_pf_no);
		$.ajax({
		type:"post",
		url:"process_main.php",
		data:"action=get_prft_transfer&prft_pf_no="+prft_pf_no,
		success:function(data){
			var html = JSON.parse(data);
		    //  alert(data);
		   
				// $('#tf_pf').val(html['trans_pf_no']);
				$('#tf_ordertype').append("<option selected>"+html['trans_order_type']+"</option>");
				$("#tf_letterno").val(html['trans_letter_no']);
				$('#tf_letterdate').val(html['trans_letter_date']);
				$('#bill_unitf').val(html['trans_wef']);

				$('#tf_dept').append("<option selected>"+html['trans_frm_dept']+"</option>");
				$('#tf_desig').append("<option selected>"+html['trans_frm_desig']+"</option>");
				$('#tf_otherdesig').val(html['trans_frm_othr_desig']);
				$('#tf_ps_type_3').append("<option selected>"+html['trans_frm_pay_scale_type']+"</option>");
				$('#tf_scale').val(html['trans_frm_scale']);
				$('#tf_level').val(html['trans_frm_level']);
				$('#tf_group').val(html['trans_frm_group']);
				$('#statione').val(html['trans_frm_station']);
				$('#prtf_otherstation').val(html['trans_frm_othr_station']);
				$('#prtf_rop').val(html['trans_frm_rop']);
				$('#billunitg').val(html['trans_frm_billunit']);
				$('#depotg').val(html['trans_frm_depot']);
				$('#prtf_rev_carried').val(html['trans_carried_out_type']);
				$('#prtf_rev_acc_ltr_no').val(html['trans_carri_wef']);
				$('#rev_acc_ltr_no').val(html['trans_car_re_accept_ltr_no']);
				$('#prtf_rev_carr_wef_date').val(html['trans_car_re_accept_ltr_date']);
				$('#prtf_rev_carr_remark').val(html['trans_car_re_remark']);
				$('#prtf_rev_wefdate').val(html['trans_car_re_wef_date']);
				$('#prtf_rev_incrdate').val(html['trans_carri_date_of_incr']);
				
           
		  }
	    });
	});
	
	
	// PRFT Fixation Fetch Code Here
	// Umesh Code Here
	
	
	

	$(".prft_fixa").click(function(){
		var prft_pf_no='<?php echo "".$_SESSION['set_update_pf'];?>';
//alert(prft_pf_no);
		$.ajax({
		type:"post",
		url:"process_main.php",
		data:"action=get_prft_fixation&prft_pf_no="+prft_pf_no,
		success:function(data){
			var html = JSON.parse(data);
		      //alert(data);
		   
				// $('#fx_pf').val(html['fix_pf_no']);
				$('#fx_ordertype').append("<option selected>"+html['fix_order_type']+"</option>");
				$("#fx_letterno").val(html['fix_letter_no']);
				$('#fx_letterdate').val(html['fix_letter_date']);
				$('#bill_unith').val(html['fix_wef']);

				$('#fx_dept').append("<option selected>"+html['fix_frm_dept']+"</option>");
				$('#fx_desig').append("<option selected>"+html['fix_frm_desig']+"</option>");
				$('#fx_otherdesig').val(html['fix_frm_othr_desig']);
				$('#fx_ps_type_3').append("<option selected>"+html['fix_frm_pay_scale_type']+"</option>");
				$('#fx_scale').val(html['fix_frm_scale']);
				$('#fx_level').val(html['fix_frm_level']);
				$('#fx_group').val(html['fix_frm_group']);
				$('#stationf').val(html['fix_frm_station']);
				$('#fx_otherstation').val(html['fix_frm_othr_station']);
				$('#fx_rop').val(html['fix_frm_rop']);
				$('#billuniti').val(html['fix_frm_billunit']);
				$('#depoti').val(html['fix_frm_depot']);
				$('#prtf_rev_carried').val(html['fix_carried_out_type']);	
				$('#prtf_rev_wefdate').val(html['fix_carri_wef']);
				$('#prtf_rev_incrdate').val(html['fix_car_re_accept_ltr_no']);
				
				
           
		  }
	    });
	});
	
	
    $(".tbl_id").hide();
    $(".show").click(function()
    {
		var show=$(this).attr("id");
		var show_id=show.slice(-1);
        $("#tbl_id"+show_id).show();
             
    });
	function open_modal(){
		$('#old_desg_modal').modal('show');
	}
	 
	

});
</script>							
<script>
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
		 
		 
</script>
<script>
$(document).ready(function(){
	
	$("#app_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth1").show();
          
	}else{
		 $(".lbl_oth1").hide();
	}	
});	

$("#preapp_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_predesig").show();
          
	}else{
		 $(".lbl_oth_predesig").hide();
	}	
});
$("#preapp_sgd_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_preapp_sgd_desig").show();
          
	}else{
		 $(".lbl_oth_preapp_sgd_desig").hide();
	}	
});
$("#preapp_ogd_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_preapp_ogd_desig").show();
          
	}else{
		 $(".lbl_oth_preapp_ogd_desig").hide();
	}	
});

 //var x='';
$("#add_edu_info_1").click(function(){
	debugger;
	x++;
	var edu_drop_ini="<div class='form-group' id='"+x+"'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Educational Qualification</label><div class=col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info["+x+"]' id='edu_pri_info_"+x+"' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank' selected></option><?php $sql=mysql_query("select * from education");while($sql_fetch=mysql_fetch_array($sql)){echo "<option value='".$sql_fetch['id']."'>".$sql_fetch['education']."</option>";}?></select></div></div>";
	//alert(edu_drop_ini);
	var edu_drop_desc="<div class='form-group' id='desc_"+x+"'><input type='text' class='form-control col-md-12 col-sm-12 col-xs-12' name='bio_edu_ini["+x+"]' id='bio_edu_ini"+x+"' placeholder='Description'></div>";
	
	$("#add_edu_info_drop_1").append(edu_drop_ini);
	$("#edu_pri_info_desc_1").append(edu_drop_desc);
	
});

 
 $(document).on("click", "#remove_edu_info_1", function(){
		 if(x>0)
		 {
			 $("#"+x).remove();
			 $("#desc_"+x).remove();
			 x--;
			
		 }else{
			 alert("No Row to remove");
		 }
			 
	 });
//var y='';
$("#add_edu_info_2").click(function(){
	debugger;
	y++;
	var edu_drop_ini="<div class='form-group' id='sub_"+y+"'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Educational Qualification</label><div class=col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info_sub["+y+"]' id='edu_pri_info_sub"+y+"' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank' selected></option><?php $sql=mysql_query("select * from education");while($sql_fetch=mysql_fetch_array($sql)){echo "<option value='".$sql_fetch['id']."'>".$sql_fetch['education']."</option>";}?></select></div></div>";
	//alert(edu_drop_ini);
	var edu_drop_desc="<div class='form-group' id='sub_desc_"+y+"'><input type='text' class='form-control col-md-12 col-sm-12 col-xs-12' name='bio_edu_sub["+y+"]' id='bio_edu_sub"+y+"' placeholder='Description'></div>";
	
	$("#add_edu_info_drop_2").append(edu_drop_ini);
	$("#add_edu_info_desc_2").append(edu_drop_desc);
});
$(document).on("click", "#remove_edu_info_2", function(){
		 if(y>0)
		 {debugger;
			 $("#sub_"+y).remove();
			 $("#sub_desc_"+y).remove();
			 y--;
			  //alert(y);
		 }else{
			 alert("No Row to remove");
		 }
			 
	 });

	 
	$("#bio_emp_old_name").focus(function(){
		
		$(".old_name").text("Applicable in case of change in name due to marriage or gazette notification etc.");
	});
	$("#bio_emp_old_name").blur(function(){
		$(".old_name").text("");
	});
});

</script>
<?php include_once('../global/footer.php');?>  
<script>
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
 
</script>

<link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
<script>
 $("#modal_zone_station").select2();
 $("#modal_zone").select2();
 $("#modal_unit").select2();
 $("#bill_unit_depot").select2();
 $("#modal_station").select2();
 $("#modal_division").select2();
	var bill_unit="";
	var deopt="";
	var station="";
	$(".bill_unit").click(function(){
			$('#modal_zone').val('blank').trigger('change'); 
			 $('#modal_unit').html("");
			 $('#bill_unit_depot').html("");
			 bill_unit=$(this).attr("id");
			 //alert(bill_unit);
		 });
	$(".station").click(function(){
		//alert('data');
		 $('#modal_zone_station').val('blank').trigger('change'); 
		$("#modal_station").html("");
		$("#modal_division").html("");
		station=$(this).attr("id");
		//$('#modal_zone').select2("val", null); 
		//alert(station);
		$(this).val("");
		
	});
	// Stations
	$("#modal_zone_station").change(function(){
	
	 //$('#modal_division').html("");
	 
	 var zone=$(this).val();
	   //alert(zone);
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_division&zone='+zone,
		success:function(html){
			 //alert(html);
			$("#modal_division").html(html);
		}
		 
	 });
 });
	
	$("#modal_division").change(function(){
		var division=$(this).val();
		//alert(division);
		$("#modal_station").html("");
		$.ajax({
			type:'POST',
			url:'process.php',
			data:'action=get_station&division='+division,
			success:function(html){
			// alert(html);
			$("#modal_station").html(html);
			}
		});
	});
	
	$("#modal_station_okay").click(function(){
		var station_name=$("#modal_station option:selected").text();
		var station_id=$("#modal_station").val();
		//alert(station_id);
		$("#"+station).val(station_name);
		var hidden_station=station.slice(-1);
		$("#station_id"+hidden_station).val(station_id);
		
		if($("#add_other_station").val()!="")
		{
			var new_station=$("#add_other_station").val();
			var new_div=$("#modal_division").val();
			//alert(new_station);
			//alert(new_div);
			$.ajax({
				type:'POST',
				url:'process.php',
				data:'action=add_new_station&new_station='+new_station+'&new_div='+new_div,
				success: function (html) {
				  $("#station_id"+hidden_station).val("");
				  $("#station3").val(new_station);
				  
				}
				
			});
		}
		
	});
	$("#bill_unit_depot").change(function(){
		
	});
	
 
 $("#modal_zone").change(function(){
	
	 $('#modal_unit').html("");
	 $('#bill_unit_depot').html("");
	 var zone=$(this).val();
	 //alert(zone);
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_division1&zone='+zone,
		success:function(html){
			//alert(html);
			$("#modal_unit").html(html);
		}
		 
	 });
 });
 
 $("#modal_unit").change(function(){
	$('#bill_unit_depot').html("");
	 var unit=$(this).val();
	 //alert(zone);
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_bill_unit_depot&unit='+unit,
		success:function(html){
			//alert(html);
			$("#bill_unit_depot").html(html);
		}
		 
	 });
 });
 $("#modal_okay").click(function(){
		var got_billunit=$("#bill_unit_depot").val();
		//alert(got_billunit);
		$.ajax({
			type:'POST',
			url:'process.php',
			data:'action=get_separate&got_billunit='+got_billunit,
				success:function(html){
				//alert(html);
				var data=JSON.parse(html);
				var deopt=bill_unit.slice(-1);
				$("#"+bill_unit).val(data['billunit']);
				$("#depot"+deopt).val(data['deopt']);	
				$("#depot_bill_unit"+deopt).val(got_billunit);
			}
		});
		
		//alert(bill_unit);
		if(got_billunit=='not_available'){
			//alert('jdd');
			var got=bill_unit.slice(-1);
			$("#depot"+got).attr('readonly',false);
		}
});

$("#modal_station").change(function(){
	if($(this).val() == 'other_station'){
			//alert($(.other).attr("id"));
			$("#other_station").show();
		}  
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

 </script>
 <script>
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
</script>
<script>
$("#same_add").change(function(){
	if($(this).is(":checked"))
	{
	var add=$("#bio_p_addr").val();
			var state=$("#state_code").val();
			var pin=$("#pincode").val();
			//alert(pin);
			
			$("#bio_pre_addr").text(add);
			$("#state_code_2").html("<option>"+state+"</option>");
			$("#pincode_2").html("<option>"+pin+"</option>");
	}
	else{
			 $("#bio_pre_addr").text("");
			$("#state_code_2").html("<option></option>");
			$("#pincode_2").html("<option></option>");
		 } 
});


$(".medical_initial").click(function(){
	debugger;
	<?php 
	if(isset($_SESSION['same_pf_no']))
	{
	?>
	if (<?php echo $_SESSION['same_pf_no'];?>!=""){
      var session=<?php echo $_SESSION['same_pf_no'];?>;
	  //alert(session);
	  $.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_medical_detail&session="+session,
		success:function(data){
		 // alert(data);
		  var html=JSON.parse(data);
		 // alert(html['medi_pf_number']);
		 $("#medi_pf_no").val(html['medi_pf_number']);
		 $("#medi_exam").html("<option>"+html['medi_examtype']+"</option>");
		 $("#medi_cat").html("<option>"+html['medi_cate']+"</option>");
		  $("#medi_cat_pme").html("<option>"+html['medi_class']+"</option>");
		  $("#in_med_desig").html("<option>"+html['medi_design']+"</option>");
		  $("#medi_cer_no").val(html['medi_certino']);
		  $("#med_cer_date").val(html['medi_certidate']);
		  $("#med_ref").val(html['medi_refno']);
		  $("#med_ref_date").val(html['medi_refdate']);
		  $("#med_remark").val(html['medi_remark']);
		  }
	});
    } 
	<?php 
	}
	?>
});

$(document).on("change","#newpfnumber",function(){
	$.ajax({
		type:'POST'	,
		url:'set_session.php',
		data:'action=set_new_pf',
		success:function(html){
			  alert(html);
			  window.location='sr_entry.php';
		} 
	 });
});

var family_counter=<?php echo $family_fetch_count+1;?>;
$("#add_member").click(function(){
	//alert("this"); 
	 $.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_family_form&family_counter="+family_counter,
		success:function(data){
		  //alert(data);
		  $("#add_member_div").prepend(data);
		  $("#hidden_fc_count").val(family_counter);
		  family_counter++;
		  }
	});
	
}); 
</script>