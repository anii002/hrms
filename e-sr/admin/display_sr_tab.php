<?php
// session_start();
$GLOBALS['a'] = 'display_sr';
require_once('../global/header.php');
require_once('../global/topbar.php');
error_reporting(0);
require('mini_function.php');
require('fetch_all_column.php');
require_once('../dbconfig/dbcon.php');
// dbcon1();
$conn = dbcon1();
include('create_log.php');

?>
<style>
	.table tbody tr td {
		border: 1px solid black;
		border-collapse: collapse;
	}

	.labelhed {
		font-size: 17px;
		font-weight: 400;
	}

	.labelhdata {
		font-size: 17px;

	}

	.no-js #loader {
		display: none;
	}

	.js #loader {
		display: block;
		position: absolute;
		left: 100px;
		top: 0;
	}

	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(Preloader_3.gif) center no-repeat #fff;
	}

	table {
		text-transform: uppercase;
	}

	h1 {
		text-transform: uppercase;
	}

	h2 {
		text-transform: uppercase;
	}

	h3 {
		text-transform: uppercase;
	}

	h4 {
		text-transform: uppercase;
	}

	h5 {
		text-transform: uppercase;
	}

	.box.box-solid.box-warning>.box-header {
		color: #131212;
		background: #3c8dbcbd;
		border: solid 1px blue;
	}
</style>
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- <script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
<div class="se-pre-con"></div> -->
<?php

// Bio
$pf_no = $_GET['pf'];
// echo"<script>alert('$pf_no');</script>";
$query = mysqli_query($conn, "select * from biodata_temp where pf_number='$pf_no'");
// $result = mysqli_fetch_assoc($query);
// print_r($result['pf_number']);
if (mysqli_num_rows($query) <= 0) {
	echo "<script>alert('This PF Number is not Registered');</script>";
	$pf_number = $oldpf_number = $identity_number = $sr_no = $dob = $mobile_number = $emp_name = $emp_old_name = $f_h_selction = $f_h_name = $cug = $aadhar_number = $email = $pan_number = $present_address = $pre_statecode = $pre_pincode = $permanent_address = $per_statecode = $per_pincode = $identification_mark = $religion = $community = $caste = $gender = $marrital_status = $recruit_code = $group_col = $education_ini = $edu_desc_ini = $education_sub = $edu_desc_sub = $bank_name = $account_number = $micr_number = $ifsc_code = $ruid_no = $bank_address = $nps_no = $imagefile = "";
} else {
	// while ($result = mysqli_fetch_assoc($query)) {
	$result = mysqli_fetch_assoc($query);
	$pf_number_bio = $result['pf_number'];
	$oldpf_number = $result['oldpf_number'];
	$identity_number = $result['identity_number'];
	$sr_no = $result['sr_no'];
	$dob = $result['dob'];
	$date = date_create($dob);
	$dob = date_format($date, "d/m/Y");
	$mobile_number = $result['mobile_number'];
	$emp_name = $result['emp_name'];
	$emp_old_name = $result['emp_old_name'];
	$f_h_selction = $result['f_h_selction'];
	$f_h_name = $result['f_h_name'];
	$cug = $result['cug'];
	$aadhar_number = $result['aadhar_number'];
	$email = $result['email'];
	$pan_number = $result['pan_number'];
	$present_address = $result['present_address'];
	$pre_statecode = $result['pre_statecode'];
	$pre_pincode = $result['pre_pincode'];
	$permanent_address = $result['permanent_address'];
	$per_statecode = $result['per_statecode'];
	$per_pincode = $result['per_pincode'];
	$identification_mark = $result['identification_mark'];
	// $religion = $result['religion'];
	$religion = get_religion($result['religion']);
	$community = get_community($result['community']);
	// $community = $result['community'];
	$caste = $result['caste'];
	$gender = get_gender($result['gender']);
	// $gender = $result['gender'];
	$marrital_status = got_mr($result['marrital_status']);
	// $marrital_status = $result['marrital_status'];
	$recruit_code = get_recruitment_code($result['recruit_code']);
	// $recruit_code = $result['recruit_code'];
	$group_col = get_group($result['group_col']);
	// $group_col = $result['group_col'];
	$education_ini =$result['education_ini'];
	// echo $education_ini;
	// $education_ini = $result['education_ini'];
	$edu_desc_ini = $result['edu_desc_ini'];
	$education_sub = get_sub_edu($result['education_sub']);
	// $education_sub = $result['education_sub'];
	$edu_desc_sub = $result['edu_desc_sub'];
	$bank_name = $result['bank_name'];
	$account_number = $result['account_number'];
	$micr_number = $result['micr_number'];
	$ifsc_code = $result['ifsc_code'];
	$ruid_no = $result['ruid_no'];
	$bank_address = $result['bank_address'];
	$nps_no = $result['nps_no'];
	$imagefile = $result['imagefile'];
	// echo $imagefile;
	// }
}
//Appointment
// dbcon1();
// $pf_no = $_GET['pf'];
// $query = mysqli_query($conn,"Select * from  appointment_temp where app_pf_number='$pf_no'") or die(mysql_error());
// //$resultset = mysqli_fetch_array($query);
// $result = mysqli_fetch_array($query);
// //{
// $app_pf_number = $result['app_pf_number'];
// $app_designation = get_designation($result['app_designation']);
// $app_department = get_department($result['app_department']);
// $app_type = get_appointment_type($result['app_type']);
// $app_designation = get_designation($result['app_designation']);
// $app_date = $result['app_date'];
// $app_regul_date = $result['app_regul_date'];
// $app_payscale = get_pay_scale_type($result['app_payscale']);
// if ($result['app_payscale'] == '1' || $result['app_payscale'] == '2' || $result['app_payscale'] == '3' || $result['app_payscale'] = '4') {
// 	$app_scale = ($result['app_scale']);
// 	$app_level = '-';
// } else if ($result['app_payscale'] == '5') {
// 	$app_scale = '-';
// 	$app_level = ($result['app_level']);
// } else {
// 	$app_scale = 'NA';
// 	$app_level = 'NA';
// }

// //$app_level=($result['app_level']);  
// $app_group = get_group($result['app_group']);
// $app_station = get_station($result['app_station']);
// //$other_station=($result['other_station']);  
// //$app_billunit=get_billunit($result['app_billunit']);  
// $app_rop = ($result['app_rop']);
// $app_depot = get_depot($result['app_depot']);
// $app_refno = ($result['app_refno']);
// $app_letter_date = ($result['app_letter_date']);
// $app_remark = ($result['app_remark']);
//$date_time=($result['date_time']);  
//$app_remark=($result['app_remark']);  
//}

// Present Appointment
// dbcon1();
// $pf_no = $_GET['pf'];
// $query = mysqli_query($conn,"Select * from present_work_temp where preapp_pf_number='$pf_no'");
// ($result = mysqli_fetch_assoc($query));
// //{
// $preapp_pf_number = $result['preapp_pf_number'];
// $pre_app_department = get_department($result['preapp_department']);
// $pre_app_designation = get_designation($result['preapp_designation']);
// $pre_app_scale_type = get_pay_scale_type($result['ps_type']);
// $pre_app_scale = ($result['preapp_scale']);
// $pre_app_billunit = get_billunit($result['preapp_billunit']);
// $pre_app_level = $result['preapp_level'];
// $pre_app_group_col = get_group($result['preapp_group']);
// $pre_app_station = get_station($result['preapp_station']);
// $pre_app_other = $result['preapp_station'];
// $pre_app_depot = get_depot($result['preapp_depot']);
// $pre_app_rop = $result['preapp_rop'];
// $preapp_remark = $result['preapp_remark'];
// $sgd_dropdwn = $result['sgd_dropdwn'];
// //$sgd_dropdwn_value="$sgd_dropdwn"; 
// if ($sgd_dropdwn == '1') {
// 	$sgd_dropdwn_value = "YES";
// } else if ($sgd_dropdwn == '2') {
// 	$sgd_dropdwn_value = "No";
// } else {
// 	$sgd_dropdwn_value = "";
// }
// $sgd_designation = get_designation($result['sgd_designation']);
// $presgd_otherdesign = $result['presgd_otherdesign'];
// $sgd_pst = get_pay_scale_type($result['sgd_pst']);
// $sgd_scale = $result['sgd_scale'];
// $sgd_level = $result['sgd_level'];
// $sgd_billunit = get_billunit($result['sgd_billunit']);
// $sgd_depot = get_depot($result['sgd_depot']);
// $sgd_station = get_station($result['sgd_station']);
// $sgd_group = get_group($result['sgd_group']);
// $ogd_desig = get_designation($result['ogd_desig']);
// $preogd_otherdesign = $result['preogd_otherdesign'];
// $ogd_pst = get_pay_scale_type($result['ogd_pst']);
// $ogd_scale = $result['ogd_scale'];
// $ogd_level = $result['ogd_level'];
// $ogd_billunit = get_billunit($result['ogd_billunit']);
// $ogd_depot = get_depot($result['ogd_depot']);
// $ogd_station = get_station($result['ogd_station']);
// $ogd_group = get_group($result['ogd_group']);
// $ogd_rop = $result['ogd_rop'];

// //}

// //awards query
// // dbcon1();
// // $pf_no = $_GET['pf'];
// $sql = mysqli_query($conn,"select * from  award_temp where awd_pf_number='$pf_no'");
// if ($sql) {
// 	($fetch_sql = mysqli_fetch_array($sql));
// 	//{
// 	$awd_pf_number = $fetch_sql['awd_pf_number'];
// 	$awd_award_date	 = $fetch_sql['awd_date'];
// 	$awd_awarded_by = get_awarded_by($fetch_sql['awd_by']);
// 	$awd_award_type = got_award($fetch_sql['awd_type']);
// 	$awd_other_award = $fetch_sql['awd_other'];
// 	$awd_award_detail = $fetch_sql['awd_detail'];
// 	//}
// }

// //advance query
// // dbcon1();
// // $pf_no = $_GET['pf'];
// $sql = mysqli_query($conn,"select * from  advance_temp where adv_pf_number='$pf_no'");
// if ($sql) {
// 	$fetch_sql = mysqli_fetch_array($sql);
// 	//{
// 	$pf_no = $fetch_sql['adv_pf_number'];
// 	$advance_type = $fetch_sql['adv_type'];
// 	$letter_number = $fetch_sql['adv_letterno'];
// 	$letter_date = $fetch_sql['adv_letterdate'];
// 	$wef_date = $fetch_sql['adv_wefdate'];
// 	$amount = $fetch_sql['adv_amount'];
// 	$tot_amt = $fetch_sql['adv_principle'];
// 	$interest = $fetch_sql['adv_interest'];
// 	$date_frm = $fetch_sql['adv_from'];
// 	$date_to = $fetch_sql['adv_to'];
// 	$remark = $fetch_sql['adv_remark'];
// 	//}
// }




//increment query	
// dbcon1();
// $pf_no = $_GET['pf'];
// $sql = mysqli_query($conn,"select * from  increment_temp where incr_pf_number='$pf_no'");
// if ($sql) {
// 	($fetch_sql = mysqli_fetch_array($sql));
// 	//{
// 	$inc_pf_number = $fetch_sql['incr_pf_number'];
// 	$inc_increment_type = get_increment_type($fetch_sql['incr_type']);

// 	$inc_increment_date = $fetch_sql['incr_date'];
// 	if ($inc_increment_date != '')
// 		$inc_increment_date = date('Y-m-d', strtotime($fetch_sql['incr_date']));
// 	else
// 		$inc_increment_date = "";
// 	// $date=date_create($inc_increment_date);
// 	// $inc_increment_date = date_format($date,"d/m/Y");
// 	$inc_scale_type = get_pay_scale_type($fetch_sql['ps_type']);
// 	$inc_scale = $fetch_sql['incr_scale'];
// 	$inc_level = $fetch_sql['incr_level'];
// 	$inc_old_rop = $fetch_sql['incr_oldrop'];
// 	$inc_rop = $fetch_sql['incr_rop'];
// 	$inc_personal_pay = $fetch_sql['incr_personel'];
// 	$inc_special_pay = $fetch_sql['incr_special'];
// 	$inc_next_incr_date = $fetch_sql['incr_nextdate'];
// 	if ($inc_next_incr_date != '')
// 		$inc_next_incr_date = date('Y-m-d', strtotime($fetch_sql['incr_nextdate']));
// 	else
// 		$inc_next_incr_date = '';
// 	// $date=date_create($inc_next_incr_date);
// 	// $inc_next_incr_date = date_format($date,"d/m/Y");
// 	$inc_remark = $fetch_sql['incr_remark'];
// 	//}
// }

//Last Entry query
// dbcon1();
// $pf_no = $_GET['pf'];

// $query = mysqli_query("Select * from lastentry_temp where pf_number='$pf_no' ");

// ($result = mysqli_fetch_assoc($query));
// // {
// $pf_number = $result['pf_number'];
// $doj = $result['date_of_join'];
// $retire_type = get_retirement_type($result['retire_type']);
// $dor = $result['retire_date'];
// $desig_or = get_designation($result['retire_designation']);
// $dept = get_department($result['department']);
// $station = $result['station'];
// $rop = $result['rop'];
// $bill_unit = get_billunit($result['bill_unit']);
// $scale_lvl = $result['scale'];
// $depot = get_depot($result['depot']);
// $emp_cat = $result['emp_category'];
// $tot_years = $result['total_years'];
// $tot_months = $result['total_months'];
// $tot_days = $result['total_days'];
// $no_years = $result['no_years'];
// $no_months = $result['no_months'];
// $no_days = $result['no_days'];
// //$nqs=$result['qualification_service'];
// $lap = $result['lap'];
// $lhap = $result['lhap'];
// $ad_leaves = $result['advance_leave'];
// //   }

// //Prft promotion Code Start

// // $pf_no = $_GET['pf'];
// $query = mysqli_query($conn,"Select * from prft_promotion_temp where pro_pf_no='$pf_no'");
// // echo "Select * from prft_promotion_temp where pro_pf_no='$pf_no'".mysql_error();
// while ($result = mysqli_fetch_assoc($query)) {
// 	$pro_pf_no = $result['pro_pf_no'];
// 	$pro_order_type = $result['pro_order_type'];
// 	$pro_letter_no = $result['pro_letter_no'];
// 	$pro_letter_date = $result['pro_letter_date'];
// 	$pro_wef = $result['pro_wef'];
// 	$pro_frm_dept = $result['pro_frm_dept'];
// 	$pro_frm_desig = $result['pro_frm_desig'];
// 	$pro_frm_othr_desig = $result['pro_frm_othr_desig'];
// 	$pro_frm_pay_scale_type = $result['pro_frm_pay_scale_type'];
// 	$pro_frm_scale = $result['pro_frm_scale'];
// 	$pro_frm_level = $result['pro_frm_level'];
// 	$pro_frm_group = $result['pro_frm_group'];
// 	$pro_frm_station = $result['pro_frm_station'];
// 	$pro_frm_othr_station = $result['pro_frm_othr_station'];
// 	$pro_frm_rop = $result['pro_frm_rop'];
// 	$pro_frm_billunit = $result['pro_frm_billunit'];
// 	$pro_frm_depot = $result['pro_frm_depot'];
// 	$pro_to_dept = $result['pro_to_dept'];
// 	$pro_to_desig = $result['pro_to_desig'];
// 	$pro_to_othr_desig = $result['pro_to_othr_desig'];
// 	$pro_to_pay_scale_type = $result['pro_to_pay_scale_type'];
// 	$pro_to_scale = $result['pro_to_scale'];
// 	$pro_to_level = $result['pro_to_level'];
// 	$pro_to_group = $result['pro_to_group'];
// 	$pro_to_station = $result['pro_to_station'];
// 	$pro_to_othr_station = $result['pro_to_othr_station'];
// 	$rop_to = $result['rop_to'];
// 	$pro_to_billunit = $result['pro_to_billunit'];
// 	$pro_to_depot = $result['pro_to_depot'];
// 	$pro_carried_out_type = $result['pro_carried_out_type'];
// 	$pro_carri_wef = $result['pro_carri_wef'];
// 	$pro_carri_date_of_incr = $result['pro_carri_date_of_incr'];
// 	$pro_car_re_accept_ltr_no = $result['pro_car_re_accept_ltr_no'];
// 	$pro_car_re_accept_ltr_date = $result['pro_car_re_accept_ltr_date'];
// 	$pro_car_re_wef_date = $result['pro_car_re_wef_date'];
// 	$pro_car_re_remark = $result['pro_car_re_remark'];
// }
//prft reversion code
// $pf_no = $_GET['pf'];
// $query = mysqli_query($conn,"Select * from prft_reversion_temp where rev_pf_no='$pf_no' ");
// while ($result = mysqli_fetch_assoc($query)) {
// 	$rev_pf_no = $result['rev_pf_no'];
// 	$rev_order_type = $result['rev_order_type'];
// 	$rev_letter_no = $result['rev_letter_no'];
// 	$rev_letter_date = $result['rev_letter_date'];
// 	$rev_wef = $result['rev_wef'];
// 	$rev_frm_dept = $result['rev_frm_dept'];
// 	$rev_frm_desig = $result['rev_frm_desig'];
// 	$rev_frm_othr_desig = $result['rev_frm_othr_desig'];
// 	$rev_frm_pay_scale_type = $result['rev_frm_pay_scale_type'];
// 	$rev_frm_scale = $result['rev_frm_scale'];
// 	$rev_frm_level = $result['rev_frm_level'];
// 	$rev_frm_group = $result['rev_frm_group'];
// 	$rev_frm_station = $result['rev_frm_station'];
// 	$rev_frm_othr_station = $result['rev_frm_othr_station'];
// 	$rev_frm_rop = $result['rev_frm_rop'];
// 	$rev_frm_billunit = $result['rev_frm_billunit'];
// 	$rev_frm_depot = $result['rev_frm_depot'];
// 	$rev_to_dept = $result['rev_to_dept'];
// 	$rev_to_desig = $result['rev_to_desig'];
// 	$rev_to_othr_desig = $result['rev_to_othr_desig'];
// 	$rev_to_pay_scale_type = $result['rev_to_pay_scale_type'];
// 	$rev_to_scale = $result['rev_to_scale'];
// 	$rev_to_level = $result['rev_to_level'];
// 	$rev_to_group = $result['rev_to_group'];
// 	$rev_to_station = $result['rev_to_station'];
// 	$rev_to_othr_station = $result['rev_to_othr_station'];
// 	$rev_to_rop = $result['rev_to_rop'];
// 	$rev_to_billunit = $result['rev_to_billunit'];
// 	$rev_to_depot = $result['rev_to_depot'];
// 	$rev_carried_out_type = $result['rev_carried_out_type'];
// 	$rev_carri_wef = $result['rev_carri_wef'];
// 	$rev_carri_date_of_incr = $result['rev_carri_date_of_incr'];
// 	$rev_car_re_accept_ltr_no = $result['rev_car_re_accept_ltr_no'];
// 	$rev_car_re_accept_ltr_date = $result['rev_car_re_accept_ltr_date'];
// 	$rev_car_re_wef_date = $result['rev_car_re_wef_date'];
// 	$rev_car_re_remark = $result['rev_car_re_remark'];
// }
// 
?>

<!-- Content Header (Page header) -->
<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd; margin-left:430px;">
	<li class="active"><a href="#tabular" data-toggle="tab" class="visit"><b>Tabular</b></a></li>
	<li><a href="#single" data-toggle="tab" class="visit"><b>Single</b></a></li>
</ul>


<div class="tab-content">
	<div id="tabular" class="tab-pane fade in active">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
					<li class="active"><a href="#bio" data-toggle="tab" class="visit" id="biodata"><b>Bio-Data</b></a></li>
					<li class=""><a href="#medical" data-toggle="tab" class="visit" id="medical_tab"><b>Medical Details</b></a></li>
					<li class=""><a href="#appointment" data-toggle="tab" class="visit" id="init_appo"><b>Initial Appointment</b></a></li>
					<li class=""><a href="#present_appointment" data-toggle="tab" class="visit" id="pres_appo"><b>Present Appointment</b></a></li>
					<li class=""><a href="#prft" data-toggle="tab" class="visit" id="prft_tab"><b>PRFT</b></a></li>
					<li class=""><a href="#penalty" data-toggle="tab" class="visit" id="penalty_tab"><b>Penalty</b></a></li>
					<li class=""><a href="#increment" data-toggle="tab" class="visit" id="increment_tab"><b>Increment</b></a></li>
					<li class=""><a href="#awards" data-toggle="tab" class="visit" id="awards_tab"><b>Awards</b></a></li>
					<li class=""><a href="#family" data-toggle="tab" class="visit" id="family_tab"><b>Family Composition</b></a></li>
					<li class=""><a href="#nominee" data-toggle="tab" class="visit" id="nominee_tab"><b>Nominee(s)</b></a></li>
					<li class=""><a href="#training" data-toggle="tab" class="visit" id="training_tab"><b>Training</b></a></li>
					<li class=""><a href="#advance" data-toggle="tab" class="visit" id="advance_tab"><b>Advance</b></a></li>
					<li class=""><a href="#property" data-toggle="tab" class="visit" id="property_tab"><b>Property</b></a></li>
					<li class=""><a href="#extra_entry" data-toggle="tab" class="visit" id="extra_entry_tab"><b>Last Entry</b></a></li>
					<!--li class=""><a href="#leave" data-toggle="tab"><b>Online Office Order</b></a></li-->
				</ul>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="box-body">
						<div class="tab-content">
							<!--Bio Tab Start -->
							<div class="tab-pane active in" id="bio">
								<div class="table-responsive" style="padding:20px;">
									<h3>&nbsp;&nbsp;Personal Info</h3>
									<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
									<table border="1" class="table table-bordered" style="width:100%">
										<tbody>
											<tr>
												<td colspan="5"></td>
												<td style="width:10%">
													<?php
													$imagePath = "upload_doc/" . $imagefile;
													if (!empty($imagefile) && file_exists($imagePath)) {
														$src = $imagePath;
													} else {
														$src = "https://via.placeholder.com/200";
													}
													?>
													<img id="blah" src="<?php echo $src; ?>" width="200px" height="200px" />
												</td>
											</tr>

											<tr>
												<td><label class="control-label labelhed ">PF Number</label></td>
												<td> <label class="control-label labelhdata"> <?php echo $pf_number_bio ?></label></td>
												<td><label class="control-label labelhed "> Old PF Number</label></td>
												<td> <label class="control-label labelhdata"> <?php echo $oldpf_number ?></label></td>
												<td><label class="control-label labelhed">SR NO</label></td>
												<td><label class="labelhdata labelhdata"><?php echo $sr_no ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Date Of Birth<span class=""></span></label></td>
												<td><label class="control-label labelhdata"><?php echo $dob; ?></label></td>
												<td><label class="control-label labelhed">ID Card Number<span class=""></span></label></td>
												<td><label class="control-label labelhdata"></label></td>
												<td><label class="control-label labelhed">Aadhar Number<span class=""></span></label></td>
												<td><label class="control-label labelhdata"><?php echo $aadhar_number ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Employee Name</label></td>
												<td><label class="control-label labelhdata"><?php echo $emp_name ?></label></td>
												<td><label class="control-label labelhed">Employee Old Name</label></td>
												<td><label class="control-label labelhdata"><?php echo $emp_old_name ?></label></td>
												<td><label class="control-label labelhed">Gender</label></td>
												<td><label class="control-label labelhdata"><?php echo $gender ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Marital Status</label></td>
												<td><label class="control-label labelhdata"><?php echo $marrital_status ?></label></td>
												<td><label class="control-label labelhed">Father/Husband Name</label></td>
												<td><label class="control-label labelhdata"><?php echo $f_h_name ?></label></td>
												<td><label class="control-label labelhed">CUG Number</label></td>
												<td><label class="control-label labelhdata"><?php echo $cug ?></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Personal Mobile Number</label></td>
												<td><label class="control-label labelhdata"><?php echo $mobile_number; ?></label></td>
												<td><label class="control-label labelhed">PAN No</label></td>
												<td><label class="control-label labelhdata"><?php echo $pan_number; ?></label></td>
												<td><label class="control-label labelhed">PRAN Number</label></td>
												<td><label class="control-label labelhdata"><?php echo $nps_no; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">RUID Number</label></td>
												<td><label class="control-label labelhdata"><?php echo $ruid_no; ?></label></td>
												<td><label class="control-label labelhed">E-mail Id</label></td>
												<td colspan="3"><label class="control-label labelhdata" style=" text-transform: lowercase;"><?php echo $email; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Persent Address</label></td>
												<td><label class="control-label labelhdata"><?php echo $present_address; ?></label></td>
												<td><label class="control-label labelhed">State Code</label></td>
												<td><label class="control-label labelhdata"><?php echo $pre_statecode; ?></label></td>
												<td><label class="control-label labelhed">Pincode</label></td>
												<td><label class="control-label labelhdata"><?php echo $pre_pincode; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Permanent Address</label></td>
												<td><label class="control-label labelhdata"><?php echo $permanent_address; ?></label></td>
												<td><label class="control-label labelhed">State Code</label></td>
												<td><label class="control-label labelhdata"><?php echo $per_statecode; ?></label></td>
												<td><label class="control-label labelhed">Pincode</label></td>
												<td><label class="control-label labelhdata"><?php echo $per_pincode; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Identification Mark</label></td>
												<td colspan="5"><label class="control-label labelhdata"><?php echo $identification_mark; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Religion</label></td>
												<td><label class="control-label labelhdata"><?php echo $religion; ?></label></td>
												<td><label class="control-label labelhed">Community</label></td>
												<td><label class="control-label labelhdata"><?php echo $community; ?></label></td>
												<td><label class="control-label labelhed">Caste</label></td>
												<td><label class="control-label labelhdata"><?php echo $caste; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Recruitment Code/<br>Appointment Type</label></td>
												<td colspan="1"><label class="control-label labelhdata"><?php echo $recruit_code; ?></label></td>
												<td><label class="control-label labelhed">Group</label></td>
												<td colspan="3"><label class="control-label labelhdata"><?php echo $group_col; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Education Qualification at the time of Initial Appointment</label></td>
												<td colspan="1"><label class="control-label labelhdata"><?php echo $education_ini; ?></label></td>
												<td><label class="control-label labelhed">Education Qualification at the time of Subsequent</label></td>
												<td colspan="3"><label class="control-label labelhdata"><?php echo $education_sub; ?></label></td>
											</tr>

										</tbody>
									</table>
									<h3>&nbsp;&nbsp;Bank Details</h3>
									<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
									<table border="1" class="table table-bordered" style="width:100%">
										<tbody>
											<tr>
												<td><label class="control-label labelhed ">Bank Name</label></td>
												<td> <label class="control-label labelhdata"><?php echo $bank_name; ?></label></td>
												<td><label class="control-label labelhed">Account No</label></td>
												<td><label class="labelhdata labelhdata"><?php echo $account_number; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">MICR Number</label></td>
												<td><label class="control-label labelhdata"><?php echo $micr_number; ?></label></td>
												<td><label class="control-label labelhed">IFSC No</label></td>
												<td><label class="control-label labelhdata"><?php echo $ifsc_code; ?></label></td>
											</tr>
											<tr>

												<td><label class="control-label labelhed">Bank Address</label></td>
												<td colspan="5"><label class="control-label labelhdata"><?php echo $bank_address; ?></label></td>
											</tr>
											<tr></tr>
										</tbody>
									</table>
								</div>
								<div class="pull-right col-md-7 col-sm-12 col-xs-12">
									<!--a href="#" class="btn btn-primary back_btn">Back</a-->
								</div>
							</div>
							<!----Medical Details------>
							<div class="tab-pane" id="medical">
								<h3>&nbsp;&nbsp;Medical Details</h3>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="table-responsive" style="padding:20px;">
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
											// dbcon1();
											$sql = mysqli_query($conn, "select * from medical_temp where medi_pf_number='$pf_no'");
											$cnt = 1;
											while ($result = mysqli_fetch_array($sql)) {
												echo "<tr>";
												echo "<td>$cnt</td>";
												echo "<td>" . $result['medi_examtype'] . "</td>";
												echo "<td>" . $result['medi_class'] . "</td>";
												echo "<td>" . $result['medi_certino'] . "</td>";
												echo "<td>" . date('d/m/Y', strtotime($result['medi_certidate'])) . "</td>";
												echo "<td> <a target='_blank' value='" . $result['id'] . "' class='btn btn-primary update_btn' href='medical_detail.php?pf=$pf_no&page=display'>View </a> </td>";
												echo "</tr>";
												$cnt++;
											}
											?>
										</tbody>
										<tfoot>

										</tfoot>
									</table>
								</div>
								<div class="pull-right col-md-7 col-sm-12 col-xs-12">
									<!--a href="#" class="btn btn-primary back_btn">Back</a-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="single" class="tab-pane fade">
		<div class="box box-warning box-solid">
			<div class="modal-body">
				<div class="row">
					<div class="box-body">
						<div class="table-responsive" style="padding:20px;">
							<h3>&nbsp;&nbsp;Bio-Data</h3>
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<tr>
										<td colspan="5"></td>
										<td style="width:10%">
											<?php
											$imagePath = "../admin/upload_doc/" . $imagefile;
											if (!empty($imagefile) && file_exists($imagePath)) {
												$src = $imagePath;
											} else {
												$src = "https://via.placeholder.com/200"; // Path to your dummy image
											}
											?>
											<img id="blah" src="<?php echo $src; ?>" width="200px" height="200px" />
										</td>
									</tr>

									<tr>
										<td><label class="control-label labelhed ">PF Number</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $pf_number_bio; ?></label></td>
										<td><label class="control-label labelhed "> Old PF Number</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $oldpf_number ?></label></td>
										<td><label class="control-label labelhed">SR NO</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $sr_no ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Date Of Birth<span class=""></span></label></td>
										<td><label class="control-label labelhdata"><?php echo $dob; ?></label></td>
										<td><label class="control-label labelhed">ID Card Number<span class=""></span></label></td>
										<td><label class="control-label labelhdata"></label></td>
										<td><label class="control-label labelhed">Aadhar Number<span class=""></span></label></td>
										<td><label class="control-label labelhdata"><?php echo $aadhar_number ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Employee Name</label></td>
										<td><label class="control-label labelhdata"><?php echo $emp_name ?></label></td>
										<td><label class="control-label labelhed">Employee Old Name</label></td>
										<td><label class="control-label labelhdata"><?php echo $emp_old_name ?></label></td>
										<td><label class="control-label labelhed">Gender</label></td>
										<td><label class="control-label labelhdata"><?php echo $gender ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Marital Status</label></td>
										<td><label class="control-label labelhdata"><?php echo $marrital_status ?></label></td>
										<td><label class="control-label labelhed">Father/Husband Name</label></td>
										<td><label class="control-label labelhdata"><?php echo $f_h_name ?></label></td>
										<td><label class="control-label labelhed">CUG Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $cug ?></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Personal Mobile Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $mobile_number; ?></label></td>
										<td><label class="control-label labelhed">PAN No</label></td>
										<td><label class="control-label labelhdata"><?php echo $pan_number; ?></label></td>
										<td><label class="control-label labelhed">PRAN Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $nps_no; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">RUID Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $ruid_no; ?></label></td>
										<td><label class="control-label labelhed">E-mail Id</label></td>
										<td colspan="3"><label class="control-label labelhdata"><?php echo $email; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Persent Address</label></td>
										<td><label class="control-label labelhdata"><?php echo $present_address; ?></label></td>
										<td><label class="control-label labelhed">State Code</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_statecode; ?></label></td>
										<td><label class="control-label labelhed">Pincode</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_pincode; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Permanent Address</label></td>
										<td><label class="control-label labelhdata"><?php echo $permanent_address; ?></label></td>
										<td><label class="control-label labelhed">State Code</label></td>
										<td><label class="control-label labelhdata"><?php echo $per_statecode; ?></label></td>
										<td><label class="control-label labelhed">Pincode</label></td>
										<td><label class="control-label labelhdata"><?php echo $per_pincode; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Identification Mark</label></td>
										<td colspan="5"><label class="control-label labelhdata"><?php echo $identification_mark; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Religion</label></td>
										<td><label class="control-label labelhdata"><?php echo $religion; ?></label></td>
										<td><label class="control-label labelhed">Community</label></td>
										<td><label class="control-label labelhdata"><?php echo $community; ?></label></td>
										<td><label class="control-label labelhed">Caste</label></td>
										<td><label class="control-label labelhdata"><?php echo $caste; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Recruitment Code/<br>Appointment Type</label></td>
										<td colspan="1"><label class="control-label labelhdata"><?php echo $recruit_code; ?></label></td>
										<td><label class="control-label labelhed">Group</label></td>
										<td colspan="3"><label class="control-label labelhdata"><?php echo $group_col; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Education Qualification at the time of Initial Appointment</label></td>
										<td colspan="1"><label class="control-label labelhdata"><?php echo $education_ini; ?></label></td>
										<td><label class="control-label labelhed">Education Qualification at the time of Subsequent</label></td>
										<td colspan="3"><label class="control-label labelhdata"><?php echo $education_sub; ?></label></td>
									</tr>
								</tbody>
							</table>

							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<tr>
										<td><label class="control-label labelhed ">Bank Name</label></td>
										<td> <label class="control-label labelhdata"><?php echo $bank_name; ?></label></td>
										<td><label class="control-label labelhed">Account No</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $account_number; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">MICR Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $micr_number; ?></label></td>
										<td><label class="control-label labelhed">IFSC No</label></td>
										<td><label class="control-label labelhdata"><?php echo $ifsc_code; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Bank Address</label></td>
										<td colspan="5"><label class="control-label labelhdata"><?php echo $bank_address; ?></label></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require_once('../global/footer.php');
?>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script>
	$(document).ready(function() {
		$('.content-header').show();
	});
</script>

<script>
	$(".tab_view").click(function() {
		$('.content-header').show();
		$('#singles').hide();

	});
	$(".tab_single").click(function() {
		$('#singles').show();
		$('.content-header').hide();

	});
</script> -->
<script>
	$(document).ready(function() {
		$('a[data-toggle="tab"]').on('click', function(e) {
			e.preventDefault();
			$(this).tab('show');
		});
	});
</script>

<script>
	$(".back_btn").click(function() {
		window.location = 'sr_search.php';
	});

	var pre_wk = <?php echo $sgd_dropdwn; ?>;

	if (pre_wk == 2) {
		$("#sgd_ogd_no_mul").show();
		$("#sgd_ogd_yes_mul").hide();

		$("#sgd_ogd_no").show();
		$("#sgd_ogd_yes").hide();
	} else {
		$("#sgd_ogd_no_mul").hide();
		$("#sgd_ogd_yes_mul").show();

		$("#sgd_ogd_no").hide();
		$("#sgd_ogd_yes").show();
	}
</script>
<script>
	$(document).on("click", ".visit", function() {

		var tab = $(this).attr("id");
		//alert(tab);
		$.ajax({
			type: 'POST',
			url: 'log_display_case.php',
			data: 'action=create_log&tab=' + tab,
			success: function(html) {
				//alert(html);
			}
		});
	});
</script>