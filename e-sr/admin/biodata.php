<?php
// session_start();
// if(!isset($_SESSION['SESS_MEMBER_NAME']))

// {
// echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";

// }

include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

$zone = 1;
$unit = 6;
?>

<script src="select2.full.min.js"></script>

<link rel="stylesheet" href="select2.min.css">

<style>
	.nav-tabs>li>a {

		margin-right: 2px;

		line-height: 1.42857143;

		border: 1px solid transparent;

		border-radius: 4px 4px 0 0;

	}

	.nav>li>a {

		position: relative;

		display: block;

		padding: 10px 8px;



		.form-control {

			font-size: 30px;

			color: red;

		}
</style>

<div class="content-wrapper" style="margin-top: -20px;">

	<section class="content">

		<div class="row">

			<div class="box box-info">

				<div class="box box-warning box-solid">

					<div class="box-header with-border">

						<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">

							<li class="active"><a href="#bio" data-toggle="tab"><b>Bio-Data</b></a></li>

							<li class=""><a href="#medical" data-toggle="tab"><b>Medical Details</b></a></li>

							<li class=""><a href="#appointment" data-toggle="tab"><b>Initial Appointment</b></a></li>

							<li class=""><a href="#present_appointment" data-toggle="tab"><b>Present Working Details</b></a></li>

							<li class=""><a href="#prft" data-toggle="tab"><b>PRFT</b></a></li>

							<li class=""><a href="#penalty" data-toggle="tab"><b>Penalty</b></a></li>

							<li class=""><a href="#increment" data-toggle="tab"><b>Increment</b></a></li>

							<li class=""><a href="#awards" data-toggle="tab"><b>Awards</b></a></li>

							<li class=""><a href="#family" data-toggle="tab"><b>Family Composition</b></a></li>



							<li class=""><a href="#nominee" data-toggle="tab"><b>Nominee(s)</b></a></li>



							<li class=""><a href="#advance" data-toggle="tab"><b>Advance</b></a></li>

							<li class=""><a href="#property" data-toggle="tab"><b>Property</b></a></li>

							<li class=""><a href="#traning" data-toggle="tab"><b>Training</b></a></li>

							<li class=""><a href="#extra_entry" data-toggle="tab"><b>Last Entry</b></a></li>

							<li class=""><a href="#leave" data-toggle="tab"><b>Leave Encashment</b></a></li>

					</div>



					<div class="box-body">

						<div class="tab-content">

							<!--Bio Tab Start -->

							<div class="tab-pane active in" id="bio">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Bio-Data </h3>

								</div>

								<form class="form-horizontal" action="process.php?action=add_biodata" method="POST" enctype="multipart/form-data">

									<div class="row">

										<div class="col-md-9">

											<div class="row">

												<div class="col-md-6 col-sm-12 col-xs-12">

													<div class="form-group">

														<label class="control-label col-md-4 col-sm-3 col-xs-12">PF Number</label>

														<div class="col-md-8 col-sm-8 col-xs-12">

															<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber" placeholder="Enter PF Number" required>

														</div>

													</div>

												</div>

												<div class="col-md-6 col-sm-12 col-xs-12">

													<div class="form-group">

														<label class="control-label col-md-4 col-sm-3 col-xs-12">Old PF Number</label>

														<div class="col-md-8 col-sm-8 col-xs-12">

															<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber" placeholder="Enter PF Number" required>

														</div>

													</div>

												</div>

											</div>

											<div class="row">

												<div class="col-md-6 col-sm-12 col-xs-12">

													<div class="form-group">

														<label class="control-label col-md-4 col-sm-3 col-xs-12">Identity Number</label>

														<div class="col-md-8 col-sm-8 col-xs-12">

															<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber" placeholder="Enter Identity Number" required>

														</div>

													</div>

												</div>

												<div class="col-md-6 col-sm-12 col-xs-12">

													<div class="form-group">

														<?php

														$bio_sr_no = mt_rand(100000, 999999);

														?>

														<label class="control-label col-md-4 col-sm-3 col-xs-12">SR Number</label>

														<div class="col-md-8 col-sm-8 col-xs-12">

															<input type="text" id="bio_sr_no" name="bio_sr_no" value="<?php echo $bio_sr_no ?>" class="form-control" readonly>

														</div>

													</div>

												</div>

											</div><br>

											<div class="row">

												<div class="col-md-6 col-sm-12 col-xs-12">

													<div class="form-group">

														<label class="control-label col-md-4 col-sm-3 col-xs-12">Date Of Birth</label>

														<div class="col-md-8 col-sm-8 col-xs-12">

															<input type="date" id="bio_father_has_name" name="bio_father_has_name" class="form-control" required>

														</div>

													</div>

												</div>

												<div class="col-md-6 col-sm-12 col-xs-12">

													<div class="form-group">

														<label class="control-label col-md-4 col-sm-3 col-xs-12">Personal Mobile Number</label>

														<div class="col-md-8 col-sm-8 col-xs-12">

															<input type="text" id="bio_mob" name="bio_mob" class="form-control onlyNumber" placeholder="Enter Personal Mobile No" required onChange="phonenumber(this)">

														</div>

													</div>

												</div>

											</div>

											<div class="clearfix"></div>

											<div class="row">

												<div class="col-md-12 col-sm-12 col-xs-12">

													<div class="form-group">

														<label class="control-label col-md-2 col-sm-1 col-xs-12">Employee Name</label>

														<div class="col-md-10 col-sm-12 col-xs-12">

															<input type="text" id="bio_emp_name" name="bio_emp_name" class="form-control onlyText" placeholder="Enter Employee Name" required>

														</div>

													</div>

												</div>

											</div><br>

											<div class="row">

												<div class="col-md-12 col-sm-12 col-xs-12">

													<div class="form-group">

														<label class="control-label col-md-2 col-sm-3 col-xs-12">Emp Old Name</label>

														<div class="col-md-10 col-sm-8 col-xs-12">

															<input type="text" id="bio_emp_old_name" name="bio_emp_old_name" class="form-control onlyText" placeholder="Enter Employee Old Name" required>

														</div>

													</div>

												</div>

											</div><br>

										</div>

										<div class="col-md-3">

											<img id="blah" src="avatar5.png" /><br><br>

											<input type='file' class="form-control" accept="image/*" onchange="readURL(this);" name="imgs" id="imgs" required />

										</div>

									</div><br>

									<div class="row">

										<div class="col-md-2 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-12 col-sm-6 col-xs-12"><input type="radio" id="bio_emp_old_name" name="choose_name" value="Father" class="choose_name">Father's Name</label>

											</div>

										</div>

										<div class="col-md-2 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-12 col-sm-3 col-xs-12"><input type="radio" id="bio_emp_old_name" name="choose_name" value="Husband" class="choose_name">Husband's Name</label>

											</div>

										</div>

										<div class="col-md-8 col-sm-12 col-xs-12" id="middle_name" style="display:none;">

											<div class="form-group">

												<label class="control-label col-md-2 col-sm-3 col-xs-12" id="apply_name">Name</label>

												<div class="col-md-10 col-sm-8 col-xs-12">

													<input type="text" id="bio_emp_old_name" name="bio_emp_old_name" class="form-control onlyText" placeholder="Enter Name" required>

												</div>

											</div>

										</div>

									</div><br>



									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">CUG Number</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_adhar" name="bio_adhar" class="form-control onlyNumber" placeholder="Enter CUG No" required onChange="adharnumber(this)">

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Aadhar No</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_adhar" name="bio_adhar" class="form-control onlyNumber" placeholder="Enter Aadhar No" required onChange="adharnumber(this)">

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">PAN No</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_pan" name="bio_pan" class="form-control TextNumber" placeholder="Enter PAN Card No" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">E-mail Address</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="email" id="bio_email" name="bio_email" class="form-control" placeholder="Enter E-mail" required>

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="clearfix"></div>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-1 col-xs-12">Present Address </label>

												<div class="col-md-8 col-sm-12 col-xs-12">



													<textarea rows="2" style="resize:none;" class="form-control primary TextNumber" id="bio_p_addr" name="bio_p_addr" placeholder="Enter Present Address" required></textarea>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-1 col-xs-12">Permanent Address </label>

												<div class="col-md-8 col-sm-12 col-xs-12">



													<textarea style="resize:none;" rows="2" class="form-control primary TextNumber" id="bio_pre_addr" name="bio_pre_addr" placeholder="Enter Permanent Address" required></textarea>

												</div>

											</div>

										</div>

									</div>

									<div class="row">

										<div class="col-md-12 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-2 col-sm-1 col-xs-12">Identification Mark</label>

												<div class="col-md-6 col-sm-12 col-xs-12" id="add_iden_mark">

													<button class="btn btn-primary" type="button" id="add_mark_box" value="">+ADD</button>

												</div>

											</div>

										</div>

									</div>

									<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">

									<div class="row">

										<div class="col-md-4 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-3 col-sm-3 col-xs-12">Religion</label>

												<div class="col-md-9 col-sm-8 col-xs-12">

													<select name="bio_religion" id="bio_religion" class="form-control select2" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Religion</option>

														<?php

														$sqlreligion = mysqli_query($conn, "select * from religion");

														while ($rwDept = mysqli_fetch_array($sqlreligion)) {

														?>

															<!--<!?php echo $rwDept["CODE"]; ?>/-->

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

												<label class="control-label col-md-3 col-sm-3 col-xs-12">Community</label>

												<div class="col-md-9 col-sm-8 col-xs-12">

													<select name="bio_commu" id="bio_commu" class="form-control select2 " style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Community</option>

														<?php

														$sqlreligion = mysqli_query($conn, "select * from community");

														while ($rwDept = mysqli_fetch_array($sqlreligion)) {

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

												<label class="control-label col-md-3 col-sm-3 col-xs-12">Caste</label>

												<div class="col-md-9 col-sm-8 col-xs-12">



													<input type="text" id="bio_cast" name="bio_cast" class="form-control onlyText" placeholder="Enter Caste">

												</div>

											</div>

										</div>

									</div><br>

									<div class="row">

										<div class="col-md-4 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>

												<div class="col-md-9 col-sm-8 col-xs-12">

													<select name="bio_gender" id="bio_gender" class="form-control" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Gender</option>

														<?php

														$sqlreligion = mysqli_query($conn, "select * from gender");

														while ($rwDept = mysqli_fetch_array($sqlreligion)) {

														?>

															<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["gender"]; ?></option>

														<?php

														}

														?>

													</select>

												</div>

											</div>

										</div>

										<div class="col-md-5 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-6 col-sm-3 col-xs-12">Recruitment Code / Appointment Type</label>

												<div class="col-md-6 col-sm-8 col-xs-12">

													<input type="text" id="bio_req_code" name="bio_req_code" class="form-control TextNumber" placeholder=" Employee Recruitment Code" required>

												</div>

											</div>

										</div>

										<div class="col-md-3 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-3 col-sm-3 col-xs-12">Group</label>

												<div class="col-md-9 col-sm-8 col-xs-12">

													<select name="bio_grp" id="bio_grp" class="form-control" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Group</option>

														<?php

														$group_col = mysqli_query($conn, "select * from group_col");

														while ($group_colre = mysqli_fetch_array($group_col)) {

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

												<label class="control-label col-md-2 col-sm-3 col-xs-12">Education Qualification</label>

												<div class="col-md-6 col-sm-12 col-xs-12" id="edu_info">

													<button class="btn btn-primary" type="button" id="add_edu_info">+ADD</button>

												</div>

											</div>

										</div>

									</div>

									<br>

									<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">

									<h3>&nbsp;&nbsp;Bank Details</h3>
									<hr>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Bank Name</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_bank_name" name="bio_bank_name" class="form-control onlyText" placeholder="Enter Bank Name" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Account Number</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_acc_no" name="bio_acc_no" class="form-control" placeholder="Enter Account Number" required>

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">MICR Number</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_micr" name="bio_micr" class="form-control TextNumber" placeholder="Enter MICR Number" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">IFSC Code</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_ifsc" name="bio_ifsc" class="form-control TextNumber" placeholder="Enter IFSC Code" required>

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">REIS Number</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_micr" name="bio_micr" class="form-control TextNumber" placeholder="Enter REIS Number" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">RUID Number</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_ifsc" name="bio_ifsc" class="form-control TextNumber" placeholder="Enter RUID Number" required>

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">PRAN/NPS Number</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="bio_micr" name="bio_micr" class="form-control TextNumber" placeholder="Enter PRAN/NPS Number" required>

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="row">

										<div class="col-md-12 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-2 col-sm-1 col-xs-12">Bank Address</label>

												<div class="col-md-10 col-sm-12 col-xs-12">

													<textarea rows="2" style="resize:none;" class="form-control primary TextNumber" id="bio_bank_address" name="bio_bank_address" placeholder="Enter Bank Address" required></textarea>

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="col-sm-2 col-xs-12 pull-right">

										<button type="submit" class="btn btn-info source">Save</button>

										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

									</div>

								</form>

							</div>

							<!--Bio Tab End -->

							<!--medical Tab Start -->

							<div class="tab-pane" id="medical">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Medical </h3>

								</div>

								<form method="post">

									<div class="modal-body">

										<div class="row">

											<?php $six_digit = mt_rand(100000, 999999); ?>

											<input type="hidden" name="hidden_app_trans" id="hidden_app_trans" value="SUR_APP_<?php echo $six_digit; ?>">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">PF Number<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="medi_pf_no" name="medi_pf_no" placeholder="Enter PF Number" required />

													</div>

												</div>

											</div>

											<input type="button" id="show" name="show" value="More.." class="btn btn-primary" />

										</div>

										<br>

										<div class="table-responsive">

											<table class="table table-bordered" style="width:100%" id="tbl_id">

												<tbody>

													<tr>

														<td><label class="control-label labelhed">Employee Name<span class=""></span></label></td>

														<td><label class="control-label labelhdata">value</label></td>

														<td><label class="control-label labelhed">SR NO</label></td>

														<td><label class="labelhdata labelhdata">Value </label></td>

													</tr>

													<tr>

														<td><label class="control-label labelhed">Gender</label></td>

														<td><label class="control-label labelhdata">Value</label></td>

														<td><label class="control-label labelhed">DOB</label></td>

														<td><label class="control-label labelhdata">Value</label></td>

													</tr>

													<tr>

														<td><input type="button" id="close" name="close" value="Close" class="btn btn-danger" /></td>

													</tr>

												</tbody>

											</table>

										</div>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Medical Category</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select name="medi_cat" id="medi_cat" class="form-control" style="margin-top:0px; width:100%;" required>

															<option disabled selected>Select Category</option>

															<?php

															$sqlreligion = mysqli_query($conn, "select * from medical_code");

															while ($rwDept = mysqli_fetch_array($sqlreligion)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["SHORTDESC"]; ?>/<?php echo $rwDept["LONGDESC"]; ?></option>

															<?php

															}
															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Medical Certificate No </label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" id="medi_cer_no" name="medi_cer_no" class="form-control" placeholder="Enter If any" required>

													</div>

												</div>

											</div>

										</div>

										<br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Medical Certificate Date</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" id="med_cer_date" name="med_cer_date" class="form-control" placeholder="Enter If any">

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>

													<div class="col-md-8 col-sm-12 col-xs-12">

														<input type="date" id="med_ref_date" name="med_ref_date" class="form-control">

													</div>

												</div>

											</div>

										</div>

										<br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference </label>

													<div class="col-md-8 col-sm-12 col-xs-12">

														<textarea rows="2" style="resize:none;" class="form-control primary" id="med_ref" name="med_ref" placeholder="Enter Medical Reference"></textarea>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Medical Remarks</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<textarea rows="2" style="resize:none;" class="form-control primary" id="med_remark" name="med_remark" placeholder="Enter Medical Remarks"></textarea>

													</div>

												</div>

											</div>

										</div>

									</div><br>

									<div class="form-group">

										<div class="col-sm-2 col-xs-1 pull-right">

											<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

											<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />

										</div>

									</div>

								</form>

							</div>

							<!--medical Tab End -->

							<!--Appointment Tab Start -->

							<div class="tab-pane" id="appointment">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Initial Appointment </h3>

								</div>

								<form method="post" action="process.php?action=add_appointment">

									<div class="modal-body">

										<div class="row">

											<?php $six_digit = mt_rand(100000, 999999); ?>

											<input type="hidden" name="hidden_app_trans" id="hidden_app_trans" value="SUR_APP_<?php echo $six_digit; ?>">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">PF Number<span class=""></span></label>

													<div class="col-md-7 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="app_pf_no" name="app_pf_no" placeholder="Enter PF Number" required />

													</div>

													<div class="col-md-1 col-sm-8 col-xs-12">

														<label><i class="fa fa-check" aria-hidden="true" style="color:green"></i></label>

														<!--label><i class="fa fa-times" aria-hidden="true" style="color:red"></i></label-->

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_dept" name="app_dept" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Department --</option>

															<?php

															$sqlDept = mysqli_query($conn, "select * from department");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

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

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_desig" name="app_desig" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Designation --</option>

															<?php

															$sqlDept = mysqli_query($conn, "select * from designation");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"]; ?></option>

															<?php

															}

															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Old Designation<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="app_olddesig" name="app_olddesig" placeholder="Enter Old Designation" />

													</div>

												</div>

											</div>

										</div>

										<br>

										<div class="row" style="display:none;">

											<div class="col-md-12 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-2 ">Description</label>

													<div class="col-md-10">

														<textarea rows="4" style="resize:none" class="form-control primary TextNumber" id="app_desc" name="app_desc" placeholder="Enter Description"></textarea>

													</div>

												</div>

											</div>

										</div><!--br-->

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Date Of Appointment</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="app_date" name="app_date" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Date Of Regularisation</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="app_datereg" name="app_datereg" />

													</div>

												</div>

											</div>

										</div>

										<br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12" id="">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale TYPE</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="ps_type" name="ps_type" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select PC Type --</option>

															<option value="1">3rd Scale Pay</option>

															<option value="1">4th Scale Pay</option>

															<option value="1">5th Scale Pay</option>

															<option value="1">6th Scale Pay</option>

															<option value="2">Level</option>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12" id="level" style='display:none;'>

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Level<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_level" style="margin-top:0px; width:100%;" name="app_level" required>

															<option value="" selected hidden disabled>-- Select Level --</option>

															<?php

															$sqlDept = mysqli_query($conn, "select distinct(7_pc_level) from scale");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>

															<?php

															}

															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12" id="scale" style='display:none;'>

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_scale" name="app_scale" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Scale --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select distinct(6_cpc_scale) from scale");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_group" style="margin-top:0px; width:100%;" name="app_group" required>

															<option value="" selected hidden disabled>-- Select Group --</option>

															<?php

															$group_col = mysqli_query($conn,"select * from group_col");

															while ($group_colre = mysqli_fetch_array($group_col)) {

															?>

																<option value="<?php echo $group_colre["id"]; ?>"><?php echo $group_colre["group_col"]; ?></option>

															<?php

															}

															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Station<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_station" name="app_station" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Station --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from station");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["stationdesc"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Station<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="app_otherstation" name="app_otherstation" placeholder="Enter Station Name" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary app_bill_unit" id="app_bill_unit" name="app_bill_unit" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Bill Unit --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from depot where unit_id='6'");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["BILLUNIT"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary onlyNumber" id="app_rop" name="app_rop" placeholder="Enter ROP" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary app_depot" id="app_depot" name="app_depot" style="margin-top:0px; width:100%;" required readonly>

															<option value="" selected hidden disabled>-- Select Depot --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from depot where unit_id='6'");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DESCRIPTION"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Appointment Reference No<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="app_letterno" name="app_letterno" placeholder="Enter Letter No" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Appointment Letter Date</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="app_letterdate" name="app_letterdate" required />

													</div>

												</div>

											</div>

										</div>

										<br>

										<div class="row">

											<div class="col-md-12 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-2 ">Remarks</label>

													<div class="col-md-10">

														<textarea rows="4" style="resize:none" class="form-control primary TextNumber" id="app_remark" name="app_remark" placeholder="Enter Remarks"></textarea>

													</div>

												</div>

											</div>

										</div>

										<br>

										<div class="form-group">

											<div class="col-sm-2 col-xs-12 pull-right">

												<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

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

								<form method="POST" action="process.php?action=add_presentappoint" id="pre_appo">

									<div class="modal-body">

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" id="pre_pf_no" name="pre_pf_no" class="form-control form-text TextNumber" placeholder="Enter PF Number" required>

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="preapp_dept" name="preapp_dept" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Department --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from department");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="preapp_desig" name="preapp_desig" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Designation --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from designation");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"]; ?></option>

															<?php

															}



															?>

														</select>

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<!--div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Old Designation<span class=""></span></label>

								  <div class="col-md-8 col-sm-8 col-xs-12">

									 <input type="text" class="form-control primary" id="preapp_olddesig" name="preapp_olddesig"  placeholder="Enter Old Designation" />

								  </div>

                                </div>

						    </div-->



											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></a></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_billunit" name="app_billunit" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Bill Unit --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from depot");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["BILLUNIT"]; ?></option>

															<?php

															}

															?>

														</select>

													</div>

												</div>

											</div>



											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_scale" name="app_scale" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Sacle --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select distinct 6_cpc_scale from scale");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Level</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_level" name="app_level" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Level --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select distinct 7_pc_level from scale");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>

															<?php

															}



															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_group" name="app_group" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Group --</option>



															<?php

															$group_col = mysqli_query($conn,"select * from group_col");

															while ($group_colre = mysqli_fetch_array($group_col)) {

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

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Station <a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></a></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_station" name="app_station" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Station --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from station");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["stationdesc"]; ?></option>

															<?php

															}



															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Station<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="app_otherstation" name="app_otherstation" placeholder="Enter Station Name" required />

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="app_depot" name="app_depot" style="margin-top:0px; width:100%;" required readonly>

															<option value="" selected hidden disabled>-- Select Depot --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from depot");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["depot"]; ?></option>

															<?php

															}



															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></a></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary onlyNumber" id="app_rop" name="app_rop" placeholder="Enter ROP" required />

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">





										</div><br>





										<div class="form-group">



											<div class="col-sm-2 col-xs-12 pull-right">

												<input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

												<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

												<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />



												<br>

												<br>

												<br>

											</div>

										</div>



									</div>

								</form>

							</div>

							<!--Present Appointment Tab End -->



							<!--prft Tab Start -->

							<div class="tab-pane" id="prft">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>

								</div>

								<form method="post" action="process.php?action=add_prtf">

									<div class="modal-body">

										<div class="row">

											<?php $six_digit = mt_rand(100000, 999999); ?>

											<input type="hidden" name="hidden_prt_trans" id="hidden_prt_trans" value="SUR_PRT_<?php echo $six_digit; ?>">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="prtf_pf" name="prtf_pf" required placeholder="Enter PF No." />

													</div>

												</div>

											</div>





											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Type<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_type" name="prtf_type" style="margin-top:0px; width:100%;" required>

															<option value="" selected hidden disabled>-- Select Type --</option>

															<?php

															$sql_prtf = mysqli_query($conn,"select * from prtf_type");

															while ($prtf_sql = mysqli_fetch_array($sql_prtf)) {

																echo "<option value='" . $prtf_sql['id'] . "'>" . $prtf_sql['prtf_type'] . "</option>";
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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Order Type<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_ordertype" name="prtf_ordertype" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Order Type --</option>

															<option value="Regular">Regular</option>

															<option value="Adhoc">Adhoc</option>

															<option value="Officiating">Officiating</option>



														</select>



													</div>

												</div>

											</div>



											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="prtf_letterno" name="prtf_letterno" placeholder="Enter Letter No" required />

													</div>

												</div>

											</div>

										</div><br>



										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter Date</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="prtf_letterdate" name="prtf_letterdate" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Off. From</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="prtf_offfrom" name="prtf_offfrom" placeholder="Enter Off. From" required />

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Off. To</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="prtf_offto" name="prtf_offto" placeholder="Enter Off. To" required />

													</div>

												</div>

											</div>



										</div>
										<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_dept" name="prtf_dept" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Department --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from department");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_desig" name="prtf_desig" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Designation --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from designation");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Designation<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="prtf_otherdesig" name="prtf_otherdesig" placeholder="Enter Designation" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_scale" name="prtf_scale" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Sacle --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select distinct 6_cpc_scale from scale");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_group" name="prtf_group" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Group --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from group_col");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>

															<?php

															}



															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Level<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_level" name="prtf_level" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Level --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select distinct 7_pc_level from scale");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Station<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_station" name="prtf_station" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Station --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from station");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["stationdesc"]; ?></option>

															<?php

															}



															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Station<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="prtf_otherstation" name="prtf_otherstation" placeholder="Enter Station Name" required />

													</div>

												</div>

											</div>



										</div><br>

										<div class="row">



											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary onlyNumber" id="prtf_rop" name="prtf_rop" placeholder="Enter ROP" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_billunit" name="prtf_billunit" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Bill Unit --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from depot");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["BILLUNIT"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_depot" name="prtf_depot" style="width:100%;" readonly>

															<option value="" selected hidden disabled>-- Select Depot --</option>

															<?php

															$sqlDept = mysqli_query($conn,"select * from depot where zone='1' and unit='6'");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["depot"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Carried Out<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="prtf_carried" name="prtf_carried" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Carried Out --</option>

															<option value="Yes">Yes</option>

															<option value="No">No</option>

														</select>



													</div>

												</div>

											</div>



										</div><br>



										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">W.E.F Date</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="prtf_wefdate" name="prtf_wefdate" required />

													</div>

												</div>



											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Date of Incr.</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="prtf_incrdate" name="prtf_incrdate" required />

													</div>

												</div>



											</div>

										</div><br>



										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<!--div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Deberation From</label>

								  <div class="col-md-8 col-sm-8 col-xs-12" >

									  <input type="date" class="form-control primary" id="prtf_debfrom" name="prtf_debfrom"  required />

								  </div>

                                </div-->



											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<!--div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Deberation To</label>

								  <div class="col-md-8 col-sm-8 col-xs-12" >

									  <input type="date" class="form-control primary" id="prtf_debto" name="prtf_debto" required  />

								  </div>

                                </div-->

											</div>

										</div><br>

										<div class="form-group">

											<div class="col-sm-7 col-xs-12 pull-right">



												<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

												<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />



												<br>

												<br>

												<br>

											</div>

										</div>





									</div>

								</form>

							</div>

							<!--prft Appointment Tab End -->



							<!--Penalty Tab Start -->

							<div class="tab-pane" id="penalty">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Penalty</h3>

								</div><br>

								<form method="post" action="process.php?action=add_penalty">



									<div class="clearfix"></div>

									<div class="row">

										<?php $six_digit_penalty = mt_rand(100000, 999999); ?>

										<input type="hidden" name="hidden_penalty" id="hidden_penalty" value="SUR_PEN_<?php echo $six_digit_penalty; ?>">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="penalty_pf_no" name="penalty_pf_no" class="form-control TextNumber" placeholder="Enter PF Number" required>

												</div>

											</div>

										</div>





										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Penalty Type</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<select name="p_type" id="p_type" class="form-control select2" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Penalty Type</option>

														<option>Minor</option>

														<option>Major</option>



													</select>

												</div>

											</div>

										</div>

									</div><br>

									<div class="clearfix"></div>



									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Penalty Issued</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="date" id="pen_awarded" name="pen_awarded" class="form-control">

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Penalty Effected</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="date" id="pen_eff" name="pen_eff" class="form-control">

												</div>

											</div>

										</div>



									</div><br>

									<div class="clearfix"></div>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="l_no" name="l_no" class="form-control TextNumber" placeholder="Enter Letter No" required>

												</div>

											</div>

										</div>



										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter Date</label>

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

												<label class="control-label col-md-4 col-sm-3 col-xs-12">ChargeSheet Status</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<select name="chrg_stat" id="chrg_stat" class="form-control select2" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Charge Status</option>

														<?php

														$sql_status = mysqli_query($conn,"select * from charge_sheet_status");

														while ($status_sql = mysqli_fetch_array($sql_status)) {

															echo "<option value='" . $status_sql['id'] . "'>" . $status_sql['charge_sheet_status'] . "</option>";
														}

														?>



													</select>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">ChargeSheet Reference</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="pen_chrg_ref_no" name="pen_chrg_ref_no" class="form-control" placeholder="Enter ChargeSheet Reference Number" required>

												</div>

											</div>

										</div>





									</div><br>



									<div class="row">





										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">From Date</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="date" id="f_date" name="f_date" class="form-control" placeholder="Enter Letter No" required>

												</div>

											</div>

										</div>



										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">To Date</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="date" id="t_date" name="t_date" class="form-control" placeholder="Enter Letter No" required>

												</div>

											</div>

										</div>



									</div><br>

									<div class="row">



									</div>



									<br>
									<div class="row">

										<div class="col-md-12 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-2 ">Remark</label>

												<div class="col-md-10">

													<textarea rows="4" cols="20" class="form-control primary TextNumber" id="penalty_remark" name="penalty_remark" placeholder="Enter Remark" required></textarea>

												</div>

											</div>

										</div>

									</div><br>



									<div class="col-sm-2 col-xs-12 pull-right">

										<button type="submit" class="btn btn-info source">Save</button>

										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>



									</div>





									<!--div class="form-group">

				<div class="col-md-12">

					 <input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php //echo $_SESSION['SESS_MEMBER_NAME']; 
																											?>"/>

					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />

					<input type="reset" id="btnreset" name="btnreset" value="Reset" class="btn btn-default" />

					<input type="button"  id="btnrefresh" name="btnrefresh" value="Refresh"class="btn btn-info" onClick="window.location.reload()"/>

					<br>

					<br>

					<br>

				</div>

				</div-->

								</form>

							</div>

							<!--Penalty Tab End -->



							<!--Increment Tab Start -->

							<div class="tab-pane" id="increment">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Annual Increment </h3>

								</div>

								<form method="post" action="process.php?action=add_increment">

									<div class="modal-body">

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="incr_pf" name="incr_pf" placeholder="Enter PF No." required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Increment Type<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="nom_rel" name="nom_rel" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Increment Type --</option>

															<option value="">Annual</option>

															<option value="">Advance</option>

															<option value="">Special</option>



														</select>

													</div>

												</div>

											</div>





										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Increment Date<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="incr_date" name="incr_date" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="incr_scale" name="incr_scale" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Sacle --</option>

															<?php

															$sqlDept = mysqli_query($conn, "select distinct 6_cpc_scale from scale");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["6_cpc_scale"]; ?> </option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Level<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="incr_level" name="incr_level" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Level --</option>

															<?php

															$sqlDept = mysqli_query($conn, "select distinct 7_pc_level from scale");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["7_pc_level"]; ?></option>

															<?php

															}



															?>

														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Old Rate Of Pay</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary onlyNumber" id="incr_oldrop" name="incr_oldrop" placeholder="Enter Old ROP" required />

													</div>

												</div>

											</div>







										</div><br>



										<!--div class="row">

							<div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Old Group</label>

								  <div class="col-md-8 col-sm-8 col-xs-12" >

								  <select class="form-control primary" id="incr_oldgroup" name="incr_oldgroup" style="width:100%;" required>

							<option value="" selected  disabled>-- Select Group --</option>

							 <?php

								$sqlDept = mysqli_query($conn, "select * from group_col");

								while ($rwDept = mysqli_fetch_array($sqlDept)) {

								?>

								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>

								<?php

								}



								?>

					       </select>

									

								  </div>

                                </div>

						    </div>

							

							

							<div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>

								  <div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary" id="incr_group" name="incr_group" style="width:100%;" required>

							<option value="" selected  disabled>-- Select Group --</option>

							 <?php

								$sqlDept = mysqli_query($conn, "select * from group_col");

								while ($rwDept = mysqli_fetch_array($sqlDept)) {

								?>

								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>

								<?php

								}



								?>

					       </select>

								  </div>

                                </div>

						    </div>

						</div><br-->

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary onlyNumber" id="incr_rop" name="incr_rop" placeholder="Enter ROP" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Personal Pay</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="incr_personel" name="incr_personel" placeholder="Enter Personal Pay" required />

													</div>

												</div>

											</div>







										</div><br>



										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Special Pay<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="incr_special" name="incr_special" placeholder="Enter Special Pay" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 ">Next Increment Date</label>

													<div class="col-md-8">

														<input type="date" class="form-control primary TextNumber" id="incr_nxt_incr" name="incr_nxt_incr" required />

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-12 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-2 ">Remark</label>

													<div class="col-md-10">

														<textarea rows="4" style="resize:none" class="form-control primary TextNumber" id="incr_remark" name="incr_remark" placeholder="Enter Increment Remark" required></textarea>

													</div>

												</div>

											</div>



										</div>

										<br>

										<div class="form-group">

											<div class="col-sm-2 col-xs-12 pull-right">

												<input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

												<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

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

								<form method="post" action="process.php?action=add_awards">

									<div class="modal-body">



										<div class="clearfix"></div>



										<div class="row">

											<?php $six_digit_award = mt_rand(100000, 999999); ?>

											<input type="hidden" name="hidden_award" id="hidden_award" value="SUR_AWR_<?php echo $six_digit_award; ?>">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-3 col-sm-3 col-xs-12">PF No</label>

													<div class="col-md-9 col-sm-8 col-xs-12">

														<input type="text" id="award_pf_no" name="award_pf_no" class="form-control TextNumber" placeholder="Enter PF Number" required>

													</div>

												</div>

											</div>





											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Award</label>

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

													<label class="control-label col-md-3 col-sm-3 col-xs-12">Awarded By</label>

													<div class="col-md-9 col-sm-8 col-xs-12">

														<select name="award_award_by" id="award_award_by" class="form-control" style="margin-top:0px; width:100%;" required>

															<option disabled selected>Select Awarded By</option>

															<option>Minister</option>

															<option>CRB</option>

															<option>GM</option>

															<option>PHOD</option>

															<option>DRM</option>

															<option>BO</option>



														</select>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-3 col-sm-3 col-xs-12">Type Of Award</label>

													<div class="col-md-9 col-sm-8 col-xs-12">

														<select name="award_type_award" id="award_type_award" class="form-control" style="width:100%;" required>

															<option disabled selected>Select Award Type</option>

															<option>Railway Awards</option>

															<option> Other than Railway Awards</option>



														</select>

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-3 col-sm-3 col-xs-12">Other Award</label>

													<div class="col-md-9 col-sm-8 col-xs-12">

														<input type="text" id="award_other_award" name="award_other_award" class="form-control TextNumber" placeholder="Enter Other Award" required>

													</div>

												</div>

											</div>





											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-3 col-sm-1 col-xs-12">Award Details</label>

													<div class="col-md-9 col-sm-12 col-xs-12">

														<textarea rows="2" class="form-control primary TextNumber" id="award_detail" name="award_detail" placeholder="Enter Award Details" required></textarea>

													</div>

												</div>

											</div>



										</div>





									</div><br>

									<div class="clearfix"></div>

									<br>

									<div class="col-sm-2 col-xs-12 pull-right">

										<button type="submit" class="btn btn-info source">Save</button>

										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>



									</div>

								</form>

							</div>

							<!--Awards Tab End -->



							<!--nominee Tab Start -->

							<div class="tab-pane" id="nominee">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Nominee</h3>

								</div><br>

								<form action="process.php?action=nominee" method="POST">

									<div class="modal-body">

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="nom_pf" name="nom_pf" placeholder="Enter PF No" required />

													</div>

												</div>

											</div>



											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Nomination Type<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="nom_type" name="nom_type" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Nomination Type --</option>

															<?php

															$sqlDept = mysqli_query($conn, "select * from nomination_type");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["nomination_type"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Name of Nominee(s)</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="nom_name" name="nom_name" placeholder="Enter Name of Nominee" required />

													</div>

												</div>

											</div>



											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Nominee Relationship<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="nom_rel" name="nom_rel" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Relationship --</option>

															<?php

															$sqlDept = mysqli_query($conn, "select * from relation");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="nom_otherrel" name="nom_otherrel" placeholder="Enter Relationship" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="nom_perc" name="nom_perc" placeholder="Enter Percentage" required />

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select class="form-control primary" id="nom_status" name="nom_status" style="width:100%;" required>

															<option value="" selected hidden disabled>-- Select Marital Status --</option>

															<?php

															$sqlDept = mysqli_query($conn, "select * from marital_status");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["shortdesc"]; ?></option>

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

														<input type="text" class="form-control primary" id="nom_age" name="nom_age" placeholder="Enter Age of Nominee" required />

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="nom_dob" name="nom_dob" placeholder="Enter Name of Nominee" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Nominee PAN No<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="nom_pan" name="nom_pan" placeholder="Enter Nominee PAN Number" required />

													</div>

												</div>

											</div>



										</div><br>

										<div class="row">

											<div class="col-md-12 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-2 col-sm-3 col-xs-12">Nominee Aadhar<span class=""></span></label>

													<div class="col-md-4 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="nom_adhr" name="nom_adhr" placeholder="Enter Nominee Aadhar Number" required />

													</div>

												</div>

											</div>





										</div><br>







										<div class="row">

											<div class="col-md-12 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-2 ">Address of Nominee</label>

													<div class="col-md-10">

														<textarea rows="2" style="resize:none;" class="form-control primary TextNumber" id="nom_address" name="nom_address" placeholder="Enter Address of Nominee" required></textarea>

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-12 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-2 ">Contingencies</label>

													<div class="col-md-10">

														<textarea rows="2" style="resize:none;" class="form-control primary TextNumber" id="nom_conting" name="nom_conting" placeholder="Enter Contingencies" required></textarea>

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-12 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>

													<div class="col-md-10">

														<textarea rows="3" style="resize:none;" class="form-control primary TextNumber" id="nom_subsciber" name="nom_subsciber" placeholder="Enter Name" required></textarea>

													</div>

												</div>

											</div>

										</div><br>

										<div class="form-group">

											<div class="col-sm-3 col-xs-12 pull-right">

												<input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

												<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

												<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />



												<a href="#witness" data-toggle="modal" class="btn btn-fit-height btn-info">Witness

												</a>

												<br>

												<br>

												<br>

											</div>

										</div>





									</div>

								</form>

							</div>

							<!--nominee Tab End -->



							<!--Family Tab Start -->

							<div class="tab-pane" id="family">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Family Composition</h3>

								</div>

								<form method="post" action="process.php?action=family_compo">

									<div class="modal-body">



										<div class="clearfix"></div>



										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" id="fc_pf_no" name="fc_pf_no" class="form-control TextNumber" placeholder="Enter PF Number" required>

													</div>

												</div>

											</div>





											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Date Of Updation</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" id="fc_updated_date" name="fc_updated_date" class="form-control" required>

													</div>

												</div>

											</div>

										</div><br>

										<div class="clearfix"></div>



										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Family Member Name</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" id="fc_fam_mem_name" name="fc_fam_mem_name" class="form-control TextNumber" placeholder="Enter Family Member Name" required>

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Member Relation</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select name="fc_mem_rel" id="fc_mem_rel" class="form-control" style="margin-top:0px; width:100%;" required>

															<option disabled selected>Select Relation</option>

															<?php

															$sqlDept = mysqli_query($conn, "select * from relation");

															while ($rwDept = mysqli_fetch_array($sqlDept)) {

															?>

																<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>

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

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Gender</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<select name="fc_mem_gender" id="fc_mem_gender" class="form-control" style="margin-top:0px; width:100%;" required>

															<option disabled selected>Select Gender</option>

															<?php

															$sqlreligion = mysqli_query($conn, "select * from gender");

															while ($rwDept = mysqli_fetch_array($sqlreligion)) {

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

													<label class="control-label col-md-4 col-sm-1 col-xs-12">DOB</label>

													<div class="col-md-8 col-sm-12 col-xs-12">

														<input type="date" id="fc_fam_mem_dob" name="fc_fam_mem_dob" class="form-control" required>

													</div>

												</div>

											</div>



										</div>





									</div><br>

									<div class="clearfix"></div>

									<br>

									<div class="col-sm-7 col-xs-12 pull-right">

										<button type="submit" class="btn btn-info source">Save</button>

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

								<form action="process.php?action=add_advance" method="POST">

									<div class="modal-body">

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary TextNumber" id="adv_pf" name="adv_pf" required placeholder="Enter PF No" />

													</div>

												</div>

											</div>





											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Advances Type</label>

													<div class="col-md-8 col-sm-8 col-xs-12">



														<select class="form-control primary" id="adv_type" name="adv_type" style="width:100%;">

															<option disabled selected>Select Advances Type</option>

															<option>Computer</option>

															<option>Housing</option>

														</select>

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="adv_letterno" name="adv_letterno" placeholder="Enter Letter No" required />

													</div>

												</div>

											</div>

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter Date</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="adv_letterdate" name="adv_letterdate" required />

													</div>

												</div>

											</div>

										</div><br>



										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">W.E.F Date</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="adv_wefdate" name="adv_wefdate" required />

													</div>

												</div>

											</div>





											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Amount<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="adv_amount" name="adv_amount" placeholder="Enter ROP" required />

													</div>

												</div>

											</div>

										</div><br>

										<h5><b>Recovery Details:</b></h5>
										<hr>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Total Amount</label>

													<label class="control-label col-md-2 col-sm-3 col-xs-12">Principle</label>

													<div class="col-md-6 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="adv_wefdate" name="adv_wefdate" placeholder="Enter Principle Amount" />

													</div>

												</div>

											</div>





											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">Interest<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="text" class="form-control primary" id="adv_amount" name="adv_amount" placeholder="Enter Interest" />

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">From Date</label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="adv_wefdate" name="adv_wefdate" placeholder="Enter Principle Amount" />

													</div>

												</div>

											</div>





											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-4 col-sm-3 col-xs-12">To Date<span class=""></span></label>

													<div class="col-md-8 col-sm-8 col-xs-12">

														<input type="date" class="form-control primary" id="adv_amount" name="adv_amount" placeholder="Enter Interest" />

													</div>

												</div>

											</div>

										</div><br>

										<div class="row">

											<div class="col-md-12 col-sm-12 col-xs-12">

												<div class="form-group">

													<label class="control-label col-md-2 ">Remark</label>

													<div class="col-md-10">

														<textarea rows="4" class="form-control primary TextNumber" id="adv_remark" name="adv_remark" placeholder="Enter Advances Remark" required></textarea>

													</div>

												</div>

											</div>

										</div><br>





										<div class="form-group">

											<div class="col-sm-2 col-xs-12 pull-right">

												<input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

												<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

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

								<form action="process.php?action=add_property" method="POST">



									<div class="clearfix"></div>



									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="pd_pf_no" name="pd_pf_no" class="form-control TextNumber" placeholder="Enter PF Number" required>

												</div>

											</div>

										</div>





										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Property Type</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<select name="pd_pro_type" id="pd_pro_type" class="form-control" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Property Type</option>

														<option value="1">Movable</option>

														<option value="2">Immovable</option>

													</select>

												</div>

											</div>

										</div>

									</div><br>

									<div class="clearfix"></div>



									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Item</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<select name="pd_item_name" id="pd_item_name" class="form-control" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Item Type</option>

														<option value="2">Farm</option>

														<option value="2">Building</option>

														<option value="1">Gold</option>

														<option value="1">Automobile</option>

													</select>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Item</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="pd_othr_item_name" name="pd_othr_item_name" class="form-control TextNumber" required>

												</div>

											</div>

										</div>

										<script>
											var $select1 = $('#pd_pro_type'),

												$select2 = $('#pd_item_name'),

												$options = $select2.find('option');



											$select1.on('change', function() {

												$select2.html($options.filter('[value="' + this.value + '"]'));

											}).trigger('change');
										</script>

									</div>



									<br>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Make/Model</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="pd_make_model" name="pd_make_model" class="form-control TextNumber" placeholder="Enter Make/Modal" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

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

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Location</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="pd_location" name="pd_location" class="form-control TextNumber" placeholder="Enter Location" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

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

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Area</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="pd_area" name="pd_area" class="form-control TextNumber" placeholder="Enter Area" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-1 col-xs-12">Survey Number</label>

												<div class="col-md-8 col-sm-12 col-xs-12">

													<input type="text" id="pd_sur_no" name="pd_sur_no" class="form-control TextNumber" placeholder="Enter Survey No" required>

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Total Cost</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="pd_total_cost" name="pd_total_cost" class="form-control TextNumber" placeholder="Enter Total Cost" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

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

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Source Type</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<select name="pd_sourcr_type" id="pd_sourcr_type" class="form-control" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Source Type</option>

														<option value="1">Train</option>

														<option value="2">Truck</option>

													</select>



												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

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

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="pd_letter_no" name="pd_letter_no" class="form-control" placeholder="Enter Letter Number" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-1 col-xs-12">Letter Date</label>

												<div class="col-md-8 col-sm-12 col-xs-12">

													<input type="date" id="pd_letter_date" name="pd_letter_date" class="form-control" required>

												</div>

											</div>

										</div>

									</div><br>



									<div class="row">

										<div class="col-md-12 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-2 col-sm-1 col-xs-12">Remarks</label>

												<div class="col-md-10 col-sm-12 col-xs-12">



													<textarea rows="2" style="resize:none" class="form-control primary TextNumber" id="prop_remark" name="prop_remark" placeholder="Enter  Remark" required></textarea>

												</div>

											</div>

										</div>

									</div>





									<br>

									<div class="clearfix"></div>

									<br>

									<div class="col-sm-2 col-xs-12 pull-right">

										<button type="submit" class="btn btn-info source">Save</button>

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

								<form action="process.php?action=add_training" method="POST">



									<div class="clearfix"></div>



									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="tr_pf_no" name="tr_pf_no" class="form-control TextNumber" placeholder="Enter PF Number" required>

												</div>

											</div>

										</div>





										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Training Type</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<select name="tr_training_status" id="tr_training_status" class="form-control" style="margin-top:0px; width:100%;" required>

														<option disabled selected>Select Training Status</option>

														<option value="1">Initial</option>

														<option value="2">Promotional</option>

														<option value="3">Refresher</option>

														<option value="4">Special</option>

														<option value="5">Schedule</option>

														<option value="6">Others</option>

													</select>

												</div>

											</div>

										</div>

									</div>

									<script>
										$('#tr_training_status').change(function() {

											var value = $(this).val();

											//alert(value);

											if (value == 5) {

												$('#schedule_id').show();

											} else {

												$('#schedule_id').hide();

											}





										});
									</script>

									<div class="row" id="schedule_id"><br>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Last Date</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="date" id="tr_training_from" name="tr_training_from" class="form-control TextNumber" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Due Date</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="date" id="tr_training_to" name="tr_training_to" class="form-control" required>

												</div>

											</div>

										</div>



									</div><br>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Training From</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="date" id="tr_training_from" name="tr_training_from" class="form-control TextNumber" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Training To</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="date" id="tr_training_to" name="tr_training_to" class="form-control" required>

												</div>

											</div>

										</div>



									</div>



									<div class="clearfix"></div> <br>

									<div class="row">

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No</label>

												<div class="col-md-8 col-sm-8 col-xs-12">

													<input type="text" id="tr_ltr_no" name="tr_ltr_no" class="form-control TextNumber" placeholder="Enter Letter Number" required>

												</div>

											</div>

										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-4 col-sm-1 col-xs-12">Letter Date</label>

												<div class="col-md-8 col-sm-12 col-xs-12">

													<input type="date" id="tr_ltr_date" name="tr_ltr_date" class="form-control" required>

												</div>

											</div>

										</div>

									</div>

									<br>

									<div class="row">

										<div class="col-md-12 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-2 col-sm-1 col-xs-12">Description</label>

												<div class="col-md-10 col-sm-12 col-xs-12">

													<textarea rows="2" class="form-control primary TextNumber" id="tr_desc" name="tr_desc" placeholder="Enter Description" required></textarea>

												</div>

											</div>

										</div>

									</div><br>

									<div class="row">

										<div class="col-md-12 col-sm-12 col-xs-12">

											<div class="form-group">

												<label class="control-label col-md-2 col-sm-1 col-xs-12">Remarks</label>

												<div class="col-md-10 col-sm-12 col-xs-12">

													<textarea rows="2" class="form-control primary TextNumber" id="tr_remark" name="tr_remark" placeholder="Enter Remark" required></textarea>

												</div>

											</div>

										</div>

									</div><br>



									<div class="clearfix"></div>

									<br>

									<div class="col-sm-2 col-xs-12 pull-right">

										<button type="submit" class="btn btn-info source">Save</button>

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

								</div><BR>





							</div>

							<!--Last Tab End -->

							<!--Last Tab Start -->

							<div class="tab-pane" id="leave">

								<div class="box-header with-border">

									<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Leaves And Encashment</h3>

								</div><BR>





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



<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script-->

<link href="select2/select2.min.css" rel="stylesheet" />

<script src="select2/select2.min.js"> </script>

<script>
	$("#bio_religion").select2();

	$("#bio_medi_cat").select2();

	$("#bio_commu").select2();

	$("#bio_grp").select2();

	$("#bio_edu").select2();

	$("#bio_gender").select2();



	$("#bio_commu").select2();

	$("#app_dept").select2();

	$("#app_desig").select2();

	$("#app_level").select2();

	$("#app_scale").select2();



	$("#app_group").select2();

	$("#app_station").select2();

	$("#app_bill_unit").select2();

	$("#app_depot").select2();



	$("#prtf_type").select2();

	$("#prtf_ordertype").select2();

	$("#prtf_dept").select2();

	$("#prtf_desig").select2();

	$("#prtf_scale").select2();

	$("#prtf_group").select2();

	$("#prtf_level").select2();

	$("#prtf_station").select2();

	$("#prtf_depot").select2();

	$("#prtf_carried").select2();

	$("#prtf_billunit").select2();

	$("#p_type").select2();



	$("#chrg_stat").select2();

	//$("#pen_awarded").select2();

	//$("#pen_eff").select2();

	$("#incr_scale").select2();

	$("#incr_group").select2();

	$("#incr_level").select2();

	$("#incr_oldgroup").select2();

	$("#award_award_by").select2();

	$("#award_type_award").select2();

	$("#nom_type").select2();

	$("#nom_rel").select2();

	$("#nom_status").select2();

	$("#fc_mem_rel").select2();

	$("#fc_mem_gender").select2();

	$("#adv_type").select2();

	$("#pd_pro_type").select2();

	$("#pd_item_name").select2();

	$("#tr_training_status").select2();

	$("#preapp_desig").select2();

	$("#preapp_dept").select2();

	$("#preapp_scale").select2();

	$("#preapp_level").select2();

	$("#preapp_group").select2();

	$("#preapp_station").select2();

	$("#preapp_depot").select2();

	$("#preapp_bill_unit").select2();

	$(function() {

		$(".onlyText").on("input change paste", function() {
			debugger;

			var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');

			$(this).val(newVal);

		});



		$(document).on("input change paste", ".onlyNumber", function() {

			var newVal = $(this).val().replace(/[^0-9]*$/g, '');

			$(this).val(newVal);

		});



		$(document).on("input change paste", ".TextNumber", function() {
			debugger;

			var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');

			$(this).val(newVal);

		});

	});





	function phonenumber(inputtxt)

	{

		var phoneno = /^\d{10}$/;

		if ((inputtxt.value.match(phoneno)))

		{

			return true;

		} else

		{

			alert("Mobile number must be integer and 10 digits");

			$("#bio_mob").val("");

			return false;

		}

	}

	function adharnumber(inputtxt)

	{

		var phoneno = /^\d{12}$/;

		if ((inputtxt.value.match(phoneno)))

		{

			return true;

		} else

		{

			alert("Adhar Card number must be integer and 12 digits");

			$("#bio_adhar").val("");

			return false;

		}

	}
</script>

<script>
	$("#app_bill_unit").on("change", function() {

		var app_bill_unit = document.getElementById('app_bill_unit').value;

		// alert(app_bill_unit);

		$.ajax({

			type: "post",

			url: "process.php",

			data: "action=get_depot&app_bill_unit=" + app_bill_unit,

			success: function(data) {

				//alert(data);

				var ddd = data;

				var arr = ddd.split('$');

				//alert(arr[0]);

				$("#app_depot").val(arr[0]);

			}

		});

	});
</script>

<script>
	$(document).ready(function() {

		$('#ps_type').on('change', function() {

			if (this.value == '1')

			{

				$("#scale").show();

			} else

			{

				$("#scale").hide();

			}

		});

		$('#ps_type').on('change', function() {

			if (this.value == '2')

			{

				$("#level").show();

			} else

			{

				$("#level").hide();

			}

		});

	});
</script>

<script>
	$(document).ready(function()

		{

			$("#tbl_id").hide();

			$("#show").click(function()

				{

					$("#tbl_id").show();

					//return false;           

				});

			$("#close").click(function()

				{

					$("#tbl_id").hide();

					//return false;           

				});



		});
</script>

<script>
	debugger;

	var z = 1;

	var x = 1;

	$("#add_mark_box").click(function() {

		var box = "<div><input type='text' class='form-control col-md-6 col-sm-12 col-xs-12' name='bio_mark_" + z + "' id='bio_mark_" + z + "' style='margin-top:20px;'></div>";

		$("#add_iden_mark").append(box);

		z++;

	});

	$("#add_edu_info").click(function() {

		var box = "<div><input type='text' class='form-control col-md-6 col-sm-12 col-xs-12' name='bio_edu_" + x + "' id='bio_edu_" + x + "' style='margin-top:20px;'></div>";

		$("#edu_info").append(box);

		x++;

	});

	$(".choose_name").change(function() {

		var name = $(this).val();

		$("#middle_name").show();

		$("#apply_name").text('');

		$("#apply_name").append(name + " Name");

	});
</script>



<?php include_once('../global/footer.php'); ?>

<script>
	function readURL(input) {

		if (input.files && input.files[0]) {

			var reader = new FileReader();



			reader.onload = function(e) {

				$('#blah')

					.attr('src', e.target.result)

					.width(200)

					.height(200);

			};

			reader.readAsDataURL(input.files[0]);

		}

	}
</script>