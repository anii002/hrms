<?php 
 //session_start();
$GLOBALS['a'] = 'display_sr';
include_once('../global/header_view.php');
include_once('../global/topbar_dis.php');
//include_once('../global/sidebaradmin.php');
// include('get_func.php');
//error_reporting(0);
include('mini_function.php');
include('fetch_all_column.php');
include_once('../dbconfig/dbcon.php');
dbcon1();


?>
<style>


.table tbody tr td {
    border: 1px solid black;
    border-collapse: collapse;
}
.labelhed{
	font-size:17px;
	font-weight:400;
}
.labelhdata{
	font-size:17px;
	
}.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(Preloader_3.gif) center no-repeat #fff;
}
table {text-transform:uppercase;}
h1{text-transform:uppercase;}
h2{text-transform:uppercase;}
h3{text-transform:uppercase;}
h4{text-transform:uppercase;}
h5{text-transform:uppercase;}

.box.box-solid.box-warning>.box-header {
    color: #131212;
    background: #3c8dbcbd;
    border: solid 1px blue;
}
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
<div class="se-pre-con"></div>
				<?php
				
				// Bio
					// $pf_no=$_GET['pf'];
					//$pf_no=$_SESSION['ses_id'];
				//echo"<script>alert('$pf_no');</script>";
					 $query=mysql_query("Select * from biodata_temp where pf_number='".$_GET['pf']."' ");
					 
					 if(mysql_num_rows($query)<=0)
					 {
						 echo "<script>alert('This PF Number is not Registered ');</script>";
						 $pf_number=$oldpf_number=$identity_number=$sr_no=$dob=$mobile_number=$emp_name=$emp_old_name=$f_h_selction=$f_h_name=$cug=$aadhar_number=$email=$pan_number=$present_address=$pre_statecode=$pre_pincode=$permanent_address=$per_statecode=$per_pincode=$identification_mark=$religion=$community=$caste=$gender=$marrital_status=$recruit_code=$group_col=$education_ini=$edu_desc_ini=$education_sub=$edu_desc_sub=$bank_name=$account_number=$micr_number=$ifsc_code=$ruid_no=$bank_address=$nps_no=$imagefile="";
					 }else{
					 while($result=mysql_fetch_assoc($query))
					    {
							$pf_number_bio=$result['pf_number'];
							$oldpf_number=$result['oldpf_number'];
							$identity_number=$result['identity_number'];
							$sr_no=$result['sr_no'];
							$dob=$result['dob'];
							$date=date_create($dob);
							$dob = date_format($date,"d/m/Y");
							$mobile_number=$result['mobile_number'];
							$emp_name=$result['emp_name'];
							$emp_old_name=$result['emp_old_name'];
							$f_h_selction=$result['f_h_selction'];
							$f_h_name=$result['f_h_name'];
							$cug=$result['cug'];							 
							$aadhar_number=$result['aadhar_number'];
							$email=$result['email'];
							$pan_number=$result['pan_number'];
							$present_address=$result['present_address'];
							$pre_statecode=$result['pre_statecode'];
							$pre_pincode=$result['pre_pincode'];
							$permanent_address=$result['permanent_address'];
							$per_statecode=$result['per_statecode'];
							$per_pincode=$result['per_pincode'];  
							$identification_mark=$result['identification_mark'];
							$religion=get_religion($result['religion']);							  
							$community=get_community($result['community']);
							$caste=$result['caste'];
							$gender=get_gender($result['gender']);
							$marrital_status=got_mr($result['marrital_status']);
							$recruit_code=get_recruitment_code($result['recruit_code']);
							$group_col=get_group($result['group_col']);
							$education_ini=get_initial_edu($result['education_ini']);
							$edu_desc_ini=$result['edu_desc_ini'];
							$education_sub=get_sub_edu($result['education_sub']);
							$edu_desc_sub=$result['edu_desc_sub'];
							$bank_name=$result['bank_name'];
							$account_number=$result['account_number'];
							$micr_number=$result['micr_number'];
							$ifsc_code=$result['ifsc_code'];
							$ruid_no=$result['ruid_no'];
							$bank_address=$result['bank_address'];
							$nps_no=$result['nps_no'];
							$imagefile=$result['imagefile'];
				        }
					 }
			//Appointment
					dbcon1();
					 $pf_no=$_GET['pf'];
					$query=mysql_query("Select * from  appointment_temp where app_pf_number='$pf_no'") or die(mysql_error());
						//$resultset = mysql_fetch_array($query);
						$result=mysql_fetch_array($query);
						//{
							$app_pf_number=$result['app_pf_number']; 
							$app_designation=get_designation($result['app_designation']);
							$app_department=get_department($result['app_department']);  
							$app_type=get_appointment_type($result['app_type']);  
							$app_designation=get_designation($result['app_designation']);  
							$app_date=$result['app_date'];  
							$app_regul_date=$result['app_regul_date'];  
							$app_payscale=get_pay_scale_type($result['app_payscale']);  
							$app_scale=($result['app_scale']);  
							$app_level=($result['app_level']);  
							$app_group=get_group($result['app_group']);  
							$app_station=get_station($result['app_station']);  
							//$other_station=($result['other_station']);  
							//$app_billunit=get_billunit($result['app_billunit']);  
							$app_rop=($result['app_rop']);  
							$app_depot=get_depot($result['app_depot']);  
							$app_refno=($result['app_refno']);  
							$app_letter_date=($result['app_letter_date']);  
							$app_remark=($result['app_remark']);  
							//$date_time=($result['date_time']);  
							//$app_remark=($result['app_remark']);  
						//}
					  
			 // Present Appointment
					dbcon1();
					$pf_no=$_GET['pf'];
					$query=mysql_query("Select * from present_work_temp where preapp_pf_number='$pf_no'");
					 ($result=mysql_fetch_assoc($query));
						//{
							$preapp_pf_number=$result['preapp_pf_number'];  
							$pre_app_department=get_department($result['preapp_department']);  
							$pre_app_designation=get_designation($result['preapp_designation']);   
							$pre_app_scale_type=get_pay_scale_type($result['ps_type']); 
							$pre_app_scale=($result['preapp_scale']); 
							$pre_app_billunit=get_billunit($result['preapp_billunit']); 					
							$pre_app_level=$result['preapp_level'];  
							$pre_app_group_col=get_group($result['preapp_group']);  
							$pre_app_station=get_station($result['preapp_station']);  
							$pre_app_other=$result['preapp_station'];  
							$pre_app_depot=get_depot($result['preapp_depot']);  
							$pre_app_rop=$result['preapp_rop'];  
							$preapp_remark=$result['preapp_remark'];  
							$sgd_dropdwn=$result['sgd_dropdwn']; 
							//$sgd_dropdwn_value="$sgd_dropdwn"; 
							if($sgd_dropdwn=='1'){
								$sgd_dropdwn_value="YES";
							}
							else if($sgd_dropdwn=='2'){
								$sgd_dropdwn_value="No";
							}
							else{
								$sgd_dropdwn_value="";
							}
							$sgd_designation=get_designation($result['sgd_designation']);  
							$presgd_otherdesign=$result['presgd_otherdesign'];  
							$sgd_pst=get_pay_scale_type($result['sgd_pst']);  
							$sgd_scale=$result['sgd_scale'];  
							$sgd_level=$result['sgd_level'];  
							$sgd_billunit=get_billunit($result['sgd_billunit']);  
							$sgd_depot=get_depot($result['sgd_depot']);  
							$sgd_station=get_station($result['sgd_station']);  
							$sgd_group=get_group($result['sgd_group']);  
							$ogd_desig=get_designation($result['ogd_desig']);  
							$preogd_otherdesign=$result['preogd_otherdesign'];  
							$ogd_pst=get_pay_scale_type($result['ogd_pst']);  
							$ogd_scale=$result['ogd_scale'];  
							$ogd_level=$result['ogd_level'];  
							$ogd_billunit=get_billunit($result['ogd_billunit']);  
							$ogd_depot=get_depot($result['ogd_depot']);  
							$ogd_station=get_station($result['ogd_station']);  
							$ogd_group=get_group($result['ogd_group']);  
							$ogd_rop=$result['ogd_rop'];  
							
						//}
					
				//awards query
				dbcon1();
				 $pf_no=$_GET['pf'];
					$sql=mysql_query("select * from  award_temp where awd_pf_number='$pf_no'");
					if($sql){
						($fetch_sql=mysql_fetch_array($sql));
						//{
							$awd_pf_number = $fetch_sql['awd_pf_number'];
							$awd_award_date	 = $fetch_sql['awd_date'];
							$awd_awarded_by = get_awarded_by($fetch_sql['awd_by']);
							$awd_award_type = got_award($fetch_sql['awd_type']);
							$awd_other_award = $fetch_sql['awd_other'];
							$awd_award_detail = $fetch_sql['awd_detail'];
						//}
					}

				//advance query
				dbcon1();
				 $pf_no=$_GET['pf'];
				$sql=mysql_query("select * from  advance_temp where adv_pf_number='$pf_no'");
				if($sql){
						$fetch_sql=mysql_fetch_array($sql);
							//{
									$pf_no = $fetch_sql['adv_pf_number'];
									$advance_type=$fetch_sql['adv_type'];
									$letter_number= $fetch_sql['adv_letterno'];
									$letter_date = $fetch_sql['adv_letterdate'];
									$wef_date = $fetch_sql['adv_wefdate'];
									$amount = $fetch_sql['adv_amount'];
									$tot_amt = $fetch_sql['adv_principle'];
									$interest = $fetch_sql['adv_interest'];
									$date_frm = $fetch_sql['adv_from'];
									$date_to = $fetch_sql['adv_to'];
									$remark = $fetch_sql['adv_remark'];
							//}
						}

			
				
		
		//increment query	
			dbcon1();
			 $pf_no=$_GET['pf'];
			$sql=mysql_query("select * from  increment_temp where incr_pf_number='$pf_no'");
				if($sql){
					($fetch_sql=mysql_fetch_array($sql));
					//{
						$inc_pf_number = $fetch_sql['incr_pf_number'];
						$inc_increment_type=get_increment_type($fetch_sql['incr_type']);
						
						$inc_increment_date= $fetch_sql['incr_date'];
						if($inc_increment_date!='')
						$inc_increment_date=date('Y-m-d', strtotime($fetch_sql['incr_date']));
					else
						$inc_increment_date="";
						// $date=date_create($inc_increment_date);
							// $inc_increment_date = date_format($date,"d/m/Y");
						$inc_scale_type = get_pay_scale_type($fetch_sql['ps_type']);
						$inc_scale = $fetch_sql['incr_scale'];
						$inc_level = $fetch_sql['incr_level'];
						$inc_old_rop = $fetch_sql['incr_oldrop'];
						$inc_rop = $fetch_sql['incr_rop'];
						$inc_personal_pay = $fetch_sql['incr_personel'];
						$inc_special_pay = $fetch_sql['incr_special'];
						$inc_next_incr_date = $fetch_sql['incr_nextdate'];
						if($inc_next_incr_date!='')
						$inc_next_incr_date=date('Y-m-d', strtotime($fetch_sql['incr_nextdate']));
					else
						$inc_next_incr_date='';
						// $date=date_create($inc_next_incr_date);
							// $inc_next_incr_date = date_format($date,"d/m/Y");
						$inc_remark = $fetch_sql['incr_remark'];	
					//}
				}
			
			//Last Entry query
				dbcon1();
				$pf_no=$_GET['pf'];
				
					$query=mysql_query("Select * from lastentry_temp where pf_number='$pf_no' ");
					
					 ($result=mysql_fetch_assoc($query));
					   // {
							$pf_number=$result['pf_number'];
							$doj=$result['date_of_join'];
							$retire_type=$result['retire_type'];
							$dor=$result['retire_date'];
							$desig_or=$result['retire_designation'];
							$dept=$result['department'];
							$station=$result['station'];
							$rop=$result['rop'];
							$bill_unit=$result['bill_unit'];
							$scale_lvl=$result['scale'];
							$depot=$result['depot'];							 
							$emp_cat=$result['emp_category'];
							$tot_years=$result['total_years'];
							$tot_months=$result['total_months'];
							$tot_days=$result['total_days'];
							$no_years=$result['no_years'];
							$no_months=$result['no_months'];
							$no_days=$result['no_days'];
							//$nqs=$result['qualification_service'];
							$lap=$result['lap'];
							$lhap=$result['lhap'];
							$ad_leaves=$result['advance_leave'];
				     //   }
						
						//Prft promotion Code Start
						
						 $pf_no=$_GET['pf'];
					 $query=mysql_query("Select * from prft_promotion_temp where pro_pf_no='$pf_no'");
					// echo "Select * from prft_promotion_temp where pro_pf_no='$pf_no'".mysql_error();
						while($result=mysql_fetch_assoc($query))		
						
						{
							$pro_pf_no=$result['pro_pf_no'];
							$pro_order_type=$result['pro_order_type'];
							$pro_letter_no=$result['pro_letter_no'];
							$pro_letter_date=$result['pro_letter_date'];
							$pro_wef=$result['pro_wef'];
							$pro_frm_dept=$result['pro_frm_dept'];
							$pro_frm_desig=$result['pro_frm_desig'];
							$pro_frm_othr_desig=$result['pro_frm_othr_desig'];
							$pro_frm_pay_scale_type=$result['pro_frm_pay_scale_type'];
							$pro_frm_scale=$result['pro_frm_scale'];
							$pro_frm_level=$result['pro_frm_level'];							 
							$pro_frm_group=$result['pro_frm_group'];
							$pro_frm_station=$result['pro_frm_station'];
							$pro_frm_othr_station=$result['pro_frm_othr_station'];
							$pro_frm_rop=$result['pro_frm_rop'];
							$pro_frm_billunit=$result['pro_frm_billunit'];
							$pro_frm_depot=$result['pro_frm_depot'];
							$pro_to_dept=$result['pro_to_dept'];
							$pro_to_desig=$result['pro_to_desig'];
							$pro_to_othr_desig=$result['pro_to_othr_desig'];
							$pro_to_pay_scale_type=$result['pro_to_pay_scale_type'];
							$pro_to_scale=$result['pro_to_scale'];
							$pro_to_level=$result['pro_to_level'];
							$pro_to_group=$result['pro_to_group'];
							$pro_to_station=$result['pro_to_station'];
							$pro_to_othr_station=$result['pro_to_othr_station'];
							$rop_to=$result['rop_to'];
							$pro_to_billunit=$result['pro_to_billunit'];
							$pro_to_depot=$result['pro_to_depot'];
							$pro_carried_out_type=$result['pro_carried_out_type'];
							$pro_carri_wef=$result['pro_carri_wef'];
							$pro_carri_date_of_incr=$result['pro_carri_date_of_incr'];
							$pro_car_re_accept_ltr_no=$result['pro_car_re_accept_ltr_no'];
							$pro_car_re_accept_ltr_date=$result['pro_car_re_accept_ltr_date'];
							$pro_car_re_wef_date=$result['pro_car_re_wef_date'];
							$pro_car_re_remark=$result['pro_car_re_remark'];
				        }
						//prft reversion code
						 $pf_no=$_GET['pf'];
					 $query=mysql_query("Select * from prft_reversion_temp where rev_pf_no='$pf_no' ");
					 while($result=mysql_fetch_assoc($query))		
						{
							$rev_pf_no=$result['rev_pf_no'];
							$rev_order_type=$result['rev_order_type'];
							$rev_letter_no=$result['rev_letter_no'];
							$rev_letter_date=$result['rev_letter_date'];
							$rev_wef=$result['rev_wef'];
							$rev_frm_dept=$result['rev_frm_dept'];
							$rev_frm_desig=$result['rev_frm_desig'];
							$rev_frm_othr_desig=$result['rev_frm_othr_desig'];
							$rev_frm_pay_scale_type=$result['rev_frm_pay_scale_type'];
							$rev_frm_scale=$result['rev_frm_scale'];
							$rev_frm_level=$result['rev_frm_level'];							 
							$rev_frm_group=$result['rev_frm_group'];
							$rev_frm_station=$result['rev_frm_station'];
							$rev_frm_othr_station=$result['rev_frm_othr_station'];
							$rev_frm_rop=$result['rev_frm_rop'];
							$rev_frm_billunit=$result['rev_frm_billunit'];
							$rev_frm_depot=$result['rev_frm_depot'];
							$rev_to_dept=$result['rev_to_dept'];
							$rev_to_desig=$result['rev_to_desig'];
							$rev_to_othr_desig=$result['rev_to_othr_desig'];
							$rev_to_pay_scale_type=$result['rev_to_pay_scale_type'];
							$rev_to_scale=$result['rev_to_scale'];
							$rev_to_level=$result['rev_to_level'];
							$rev_to_group=$result['rev_to_group'];
							$rev_to_station=$result['rev_to_station'];
							$rev_to_othr_station=$result['rev_to_othr_station'];
							$rev_to_rop=$result['rev_to_rop'];
							$rev_to_billunit=$result['rev_to_billunit'];
							$rev_to_depot=$result['rev_to_depot'];
							$rev_carried_out_type=$result['rev_carried_out_type'];
							$rev_carri_wef=$result['rev_carri_wef'];
							$rev_carri_date_of_incr=$result['rev_carri_date_of_incr'];
							$rev_car_re_accept_ltr_no=$result['rev_car_re_accept_ltr_no'];
							$rev_car_re_accept_ltr_date=$result['rev_car_re_accept_ltr_date'];
							$rev_car_re_wef_date=$result['rev_car_re_wef_date'];
							$rev_car_re_remark=$result['rev_car_re_remark'];
				        }
	?>
				
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
<section class="content-header1" style="display:none" id="singles">
	<div class="box box-warning box-solid">
		<div class="modal-body">
			<div class="row">
				 <div class="box-body"> 
					 <div class="table-responsive" style="padding:20px;">
			            <h3>&nbsp;&nbsp;Bio-Data</h3>
							<table border="1" class="table table-bordered"  style="width:100%">
								<tbody>
									<tr>
										<td colspan="5"></td>
										<td style="width:10%"> <img id="blah" src="upload_doc/<?php echo $imagefile;?>" width ="200px" height="200px"/></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed " >PF Number</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $pf_number_bio ?></label></td>
										<td><label class="control-label labelhed " > Old PF Number</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $oldpf_number ?></label></td>
										<td><label class="control-label labelhed" >SR NO</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $sr_no ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Date Of Birth<span class=""></span></label></td>
										<td><label class="control-label labelhdata"><?php echo $dob; ?></label></td>
										<td><label class="control-label labelhed" >ID Card Number<span class=""></span></label></td>
										<td><label class="control-label labelhdata"></label></td>
										<td><label class="control-label labelhed" >Aadhar Number<span class=""></span></label></td>
										<td><label class="control-label labelhdata"><?php echo $aadhar_number ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Employee Name</label></td>
										<td><label class="control-label labelhdata"><?php echo $emp_name ?></label></td>
										<td><label class="control-label labelhed" >Employee Old Name</label></td>
										<td><label class="control-label labelhdata"><?php echo $emp_old_name ?></label></td><td><label class="control-label labelhed" >Gender</label></td>
										<td><label class="control-label labelhdata"><?php echo $gender ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Marital Status</label></td>
										<td><label class="control-label labelhdata"><?php echo $marrital_status ?></label></td>
										<td><label class="control-label labelhed" >Father/Husband Name</label></td>
										<td><label class="control-label labelhdata"><?php echo $f_h_name ?></label></td>
										<td><label class="control-label labelhed">CUG Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $cug ?></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Personal Mobile Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $mobile_number; ?></label></td>
										<td><label class="control-label labelhed" >PAN No</label></td>
										<td><label class="control-label labelhdata"><?php echo $pan_number; ?></label></td>
										<td><label class="control-label labelhed" >PRAN Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $nps_no; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >RUID Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $ruid_no; ?></label></td>
										<td><label class="control-label labelhed" >E-mail Id</label></td>
										<td colspan="3"><label class="control-label labelhdata"><?php echo $email; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Persent Address</label></td>
										<td><label class="control-label labelhdata"><?php echo $present_address; ?></label></td>
										<td><label class="control-label labelhed" >State Code</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_statecode; ?></label></td>
										<td><label class="control-label labelhed" >Pincode</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_pincode; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Permanent Address</label></td>
										<td><label class="control-label labelhdata"><?php echo $permanent_address; ?></label></td>
										<td><label class="control-label labelhed" >State Code</label></td>
										<td><label class="control-label labelhdata"><?php echo $per_statecode; ?></label></td>
										<td><label class="control-label labelhed" >Pincode</label></td>
										<td><label class="control-label labelhdata"><?php echo $per_pincode; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Identification Mark</label></td>
										<td colspan="5"><label class="control-label labelhdata"><?php echo $identification_mark; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Religion</label></td>
										<td><label class="control-label labelhdata"><?php echo $religion; ?></label></td>
										<td><label class="control-label labelhed" >Community</label></td>
										<td><label class="control-label labelhdata"><?php echo $community; ?></label></td><td><label class="control-label labelhed" >Caste</label></td>
										<td><label class="control-label labelhdata"><?php echo $caste; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Recruitment Code/<br>Appointment Type</label></td>
										<td colspan="1"><label class="control-label labelhdata"><?php echo $recruit_code; ?></label></td><td><label class="control-label labelhed" >Group</label></td>
										<td colspan="3"><label class="control-label labelhdata"><?php echo $group_col; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >Education Qualification at the time of Initial Appointment</label></td>
										<td colspan="1"><label class="control-label labelhdata"><?php echo $education_ini; ?></label></td><td><label class="control-label labelhed" >Education Qualification at the time of Subsequent</label></td>
										<td colspan="3"><label class="control-label labelhdata"><?php echo $education_sub; ?></label></td>
									</tr>
									
								</tbody>
							</table>
			 	
							<table border="1" class="table table-bordered"  style="width:100%">
								<tbody>				
									<tr>
										<td><label class="control-label labelhed " >Bank Name</label></td>
										<td> <label class="control-label labelhdata"><?php echo $bank_name; ?></label></td>
										<td><label class="control-label labelhed" >Account No</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $account_number; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed" >MICR Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $micr_number; ?></label></td>
										<td><label class="control-label labelhed" >IFSC No</label></td>
										<td><label class="control-label labelhdata"><?php echo $ifsc_code; ?></label></td>
									</tr>
									<tr>
										
										<td><label class="control-label labelhed" >Bank Address</label></td>
										<td colspan="5"><label class="control-label labelhdata"><?php echo $bank_address; ?></label></td>
									</tr>
									<tr>
										
										
									</tr>						
								</tbody>
							</table>			
		            </div>     
					
					<h3>&nbsp;&nbsp;Medical Details</h3>
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
					dbcon1();
					$sql=mysql_query("select * from medical_temp where medi_pf_number='$pf_no'");
					$cnt=1;
					while($result=mysql_fetch_array($sql))
					{
						echo "<tr>";
						echo "<td>$cnt</td>";
						echo "<td>".$result['medi_examtype']."</td>";
						echo "<td>".$result['medi_class']."</td>";
						echo "<td>".$result['medi_certino']."</td>";
						echo "<td>".$result['medi_certidate']."</td>";
						echo '<td>
								<a value="'.$result['id'].'" target="_blank" class="btn btn-primary update_btn" href="medical_detail.php?pf=$pf_no&page=display" >View</a>
							</td>';
						echo "</tr>";
						$cnt++;
					}
				?>
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
			</div>
			
			<h3>&nbsp;&nbsp;Initial Appointment</h3>
		<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">				 		 
			<div class="table-responsive" style="padding:20px;">
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr>
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $app_pf_number; ?> </label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $app_department; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Type of Initial Appointment</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $app_type; ?></label></td>
							<td><label class="control-label labelhed" >Designation<span class=""></span></label></td>
							<td><label class="labelhdata labelhdata"><?php echo $app_designation; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Appointment Date</label></td>
							<td><label class="control-label labelhdata"><?php 
							$date=date_create($app_date);
							echo date_format($date,"d/m/Y"); ?></label></td>
							<td><label class="control-label labelhed" >Regularisation Date</label></td>
							<td><label class="control-label labelhdata"><?php 
							$date=date_create($app_regul_date);
							echo date_format($date,"d/m/Y"); ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Pay Scale type</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_payscale; ?></label></td><td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_scale; ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_level; ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_group; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_station; ?></label></td>
							<td><label class="control-label labelhed" >ROP</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_rop; ?></label></td>
							
						</tr>
						
						<tr>	
							<td><label class="control-label labelhed" >Workplace</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_depot; ?></label></td>
							<td><label class="control-label labelhed" >Appointment Reference Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_refno; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Appointment Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php 
							$date=date_create($app_letter_date);
							echo date_format($date,"d/m/Y");?></label></td>
							<td><label class="control-label labelhed" >Remark</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_remark; ?></label></td>
						</tr>					
					</tbody>
				</table>
			</div>
			
			
			 
			<div class="table-responsive" style="padding:20px;" id="sgd_ogd_no">
			<h3>&nbsp;&nbsp;Present Working Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number; ?> </label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Weather Employee is officiating in 
higher<br> grade than substantive grade?<span class=""></span></label></td>
							<td><label class="labelhdata"><?php  echo $sgd_dropdwn_value ?></label></td>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="labelhdata"><?php echo  $pre_app_designation ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_scale_type ?></label></td>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_scale ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_level ?></label></td>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_billunit  ?></label></td>
							
						</tr>
						<tr>
						<td><label class="control-label labelhed" >Depot/Workplace</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_depot ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_group_col ?></label></td>
							
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_other ?></label></td>	
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_rop ?></label></td>	
						</tr>	
					</tbody>		
				</table>
			</div>
			
			<div class="table-responsive" style="padding:20px;" id="sgd_ogd_yes">
			<h3>&nbsp;&nbsp;Present Working Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number ?> </label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Weather Employee is Officiating in 
higher<br> grade than substantive grade?<span class=""></span></label></td>
							<td colspan="5"><label class="labelhdata"><?php echo $sgd_dropdwn_value; ?></label></td>
							
						</tr>
						
						<tr>
							<td colspan="4"> <label class="control-label labelhed" style="font-size:18px;" ><b>Substancive Grade Details</b></label></td>
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_designation ?></label></td>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_pst ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_scale ?></label></td>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_level ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_billunit ?></label></td>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_depot ?></label></td>
							
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_station ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_group ?></label></td>
							
						</tr>
						
						
						<tr>
							<td colspan="4"> <label class="control-label labelhed" style="font-size:18px;" ><b>Officiating Grade Details</b></label></td>
						</tr>
								
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_desig ?></label></td>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_pst ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_scale ?></label></td>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_level ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_billunit ?></label></td>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_depot ?></label></td>
							
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_station ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_group ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $ogd_rop ?></label></td>	
						</tr>
						
					</tbody>		
				</table>
			</div>
			
			
			 <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
			 <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
						<li class="active"><a href="#prfts" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#revers" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#transs" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fixs" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
			
			<div class="tab-content">
 			<div class="tab-pane active in" id="prfts">
		
		<div  class="tab-pane" id="prfts" style="padding:10px;">
			
		 
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Promotion</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		
					<?php
					$pf_no=$_GET['pf'];
					$cnt_pr=1;
					$sql=mysql_query("select * from  prft_promotion_temp where pro_pf_no='$pf_no'");
					while($result=mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>$cnt_pr</td>";
						echo "<td>".$result['pro_pf_no']."</td>";
						echo "<td>".$result['pro_order_type']."</td>";
						echo "<td>".$result['temp_transaction_id']."</td>";
						echo "<td><a target='_blank' href='prft_show_promotion.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
						echo "</tr>";
						$cnt_pr++;
					}
				?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example2').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
	 						 
    </div> 	 
       
	  <div class="tab-pane" id="revers">
	
		<div  class="tab-pane" id="revers" style="padding:10px;">
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Reversion</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		<?php
					$pf_no=$_GET['pf'];
					$cnt_rv=1;
					$sql=mysql_query("select * from   prft_reversion_temp where rev_pf_no='$pf_no'");
					while($result=mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>$cnt_rv</td>";
						echo "<td>".$result['rev_pf_no']."</td>";
						echo "<td>".$result['rev_order_type']."</td>";
						echo "<td>".$result['temp_transaction_id']."</td>";
						echo "<td><a target='_blank' href='prft_show_reversion.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
						echo "</tr>";
						$cnt_rv++;
					}
				?>
					
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example3').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		 				 
    </div> 	
	
	<div class="tab-pane" id="transs">
		
		<div  class="tab-pane" id="transs" style="padding:10px;">
			 
			 
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Transfer</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example4" class="table table-striped">
                <thead>
                <tr>
                   <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		<?php
					$pf_no=$_GET['pf'];
						$cnt_tr=1;
						$sql=mysql_query("select * from prft_transfer_temp where trans_pf_no='$pf_no'");
						while($result=mysql_fetch_array($sql)){
							echo "<tr>";
							echo "<td>$cnt_tr</td>";
							echo "<td>".$result['trans_pf_no']."</td>";
							echo "<td>".get_order_type_transfer($result['trans_order_type'])."</td>";
							echo "<td>".$result['temp_transaction_id']."</td>";
							echo "<td><a target='_blank' href='prft_show_transfer.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
							echo "</tr>";
							$cnt_tr++;
						}
					?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example4').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div>

<div class="tab-pane" id="fixs">
		
		<div  class="tab-pane" id="fixs" style="padding:10px;">
			 
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Fixation</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example5" class="table table-striped">
                <thead>
                <tr>
                   <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		
						<?php
						dbcon1();
						$pf_no=$_GET['pf'];
						$cnt_fx=1;
						$sql1=mysql_query("select * from prft_fixation_temp where fix_pf_no='$pf_no'");
						$cnt=mysql_num_rows($sql1);
						
					 
						while($result=mysql_fetch_array($sql1)){
							//echo "<script>alert(".$result['id'].")</script>";
							echo "<tr>";
							echo "<td>$cnt_fx</td>";
							echo "<td>".$result['fix_pf_no']."</td>";
							echo "<td>".get_order_type_fixation($result['fix_order_type'])."</td>";
							echo "<td>".$result['temp_transaction_id']."</td>";
							echo "<td><a target='_blank' href='prft_show_fixaction.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
							echo "</tr>";
							$cnt_fx++;
						}
					?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example5').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div>
  </div> 	
 	<div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Penalty Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
			<?php 
					//penalty 
				 dbcon1();
				  $pf_no=$_GET['pf'];
				  //echo "<script>alert('$pf_no');</script>";
				$cnt=1;
				  $query=mysql_query("Select * from penalty_temp where pen_pf_number='$pf_no'");
				  //echo "Select * from penalty_temp where pen_pf_number='$pf_no'".mysql_error();
					while($result=mysql_fetch_assoc($query))
					 {
							
				?>

			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
					<tr><td colspan="5" style="background-color:grey;color:white;"><b><?php echo $cnt;?> Penalty</b></td></tr>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $result['pen_pf_number']; ?></label></td>
						<td><label class="control-label labelhed" >Penalty Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo get_penalty_type($result['pen_type']); ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Penalty Issued</label></td>
						<td><label class="control-label labelhdata"><?php 
						echo  date('d-m-Y', strtotime($result['pen_issued'])); ?></label></td>
						<td><label class="control-label labelhed" >Penalty Effected</label></td>
						<td><label class="control-label labelhdata"><?php 
						echo  date('d-m-Y', strtotime($result['pen_effetcted'])); ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $result['pen_letterno']; ?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php 
						echo date('d-m-Y', strtotime($result['pen_letterdate'])); ?></label></td>
					</tr>	
					<tr>
						<td><label class="control-label labelhed" >ChargeSheet Status</label></td>
						<td><label class="control-label labelhdata"><?php echo get_charge_sheet_status($result['pen_chargestatus']); ?></label></td>
						<td><label class="control-label labelhed" >ChargeSheet Reference Number </label></td>
						<td><label class="control-label labelhdata"><?php echo $result['pen_chargeref'];?></label></td>
					</tr>	
					<tr>
						<td><label class="control-label labelhed" >From Date</label></td>
						<td><label class="control-label labelhdata"><?php echo date('d-m-Y', strtotime($result['pen_from'])); ?></label></td>
						<td><label class="control-label labelhed" >To Date</label></td>
						<td><label class="control-label labelhdata"><?php 
						echo date('d-m-Y', strtotime($result['pen_to'])); ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Remarks</label></td>
						<td colspan="5"><label class="control-label labelhdata"><?php echo $result['pen_remark'];  ?></label></td>
						
					</tr>	
					<?php $cnt++;?>
<?php 
}
?>
				</tbody>
			</table>
		</div>
		<?php 
	dbcon1();
		$sql=mysql_query("select * from  increment_temp where incr_pf_number='$pf_no'");
		$sql_fetch=mysql_fetch_array($sql);
	?>
	<div class="table-responsive" style="padding:20px;">
	<h3 >&nbsp;&nbsp;Increment Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
			<table border='1' class='table table-bordered'  style='width:100%'>
			<tr>
			<td>Pf Number</td>
			<td><?php echo $sql_fetch['incr_pf_number'];?></td>
			</tr>
			</table>
			<table border='1' class='table table-bordered'  style='width:100%'>
			<tbody>
			<tr>
				<th>Sr No</th>
				<th>Increment type</th>
				<th>Pay Scale type</th>
				<th>Pay Scale/level</th>
				<th>rate of pay</th>
				<th>increment date</th>
				<th>reason</th>
			</tr>
		<?php
		dbcon1();
		$sql=mysql_query("select * from  increment_temp where incr_pf_number='$pf_no'");
		$cnt="1";
		while($result=mysql_fetch_array($sql)){
			
			$incr_scale="";
			$incr_level="";
			$ps_type=get_pay_scale_type($result['ps_type']);
				if($result['ps_type']=='2'||$result['ps_type']=='3'||$result['ps_type']=='4'){
					$incr_scale=$result['incr_scale'];
					$incr_level="";
				}
				else if($result['ps_type']=='5'){
					$incr_level=$result['incr_level'];
					$incr_scale="";
				}
							
			echo "<tr>";
			echo"<td>$cnt</td>";	
			echo "<td>".get_increment_type($result['incr_type'])."</td>";		
			echo "<td>".get_pay_scale_type($result['ps_type'])."</td>";	
			echo "<td>$incr_scale $incr_level </td>";	
			echo "<td>".$result['incr_rop']."</td>";	
			echo "<td>".date('Y-m-d', strtotime($result['incr_date']))."</td>";	
			echo "<td>".$result['incr_remark']."</td>";	
			echo "</tr>";
		$cnt++;	
		}
	?>	
	</tbody>
	</table>
		
</div>

<h3>&nbsp;&nbsp;Adavance Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
		<div class="table-responsive" style="padding:20px;">
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
				<?php 
				dbcon1();
				$sql=mysql_query("select * from  advance_temp where adv_pf_number='$pf_no'");
				if($sql){
						while($fetch_sql=mysql_fetch_array($sql))
							{
									$pf_no = $fetch_sql['adv_pf_number'];
									$advance_type=$fetch_sql['adv_type'];
									$letter_number= $fetch_sql['adv_letterno'];
									$letter_date = $fetch_sql['adv_letterdate'];
									$wef_date = $fetch_sql['adv_wefdate'];
									$amount = $fetch_sql['adv_amount'];
									$tot_amt = $fetch_sql['adv_principle'];
									$interest = $fetch_sql['adv_interest'];
									$date_frm = $fetch_sql['adv_from'];
									$date_to = $fetch_sql['adv_to'];
									$remark = $fetch_sql['adv_remark'];
							
				?>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $pf_no;?></label></td>
						<td><label class="control-label labelhed" >Advances Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo $advance_type;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $letter_number;?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php 
						$date=date_create($letter_date);
					$letter_date = date_format($date,"d/m/Y");echo $letter_date;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >WEF Date</label></td>
						<td><label class="control-label labelhdata"><?php 
						$date=date_create($wef_date);
					$wef_date = date_format($date,"d/m/Y");echo $wef_date ?></label></td>
						<td><label class="control-label labelhed" >Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $amount ?></label></td>
					</tr>

					<tr>
						<td colspan="6"><label class="control-label labelhed" ><b>Recovery Details</b></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Total Principle Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $tot_amt ?></label></td>
						<td><label class="control-label labelhed" >Total Interest</label></td>
						<td><label class="control-label labelhdata"><?php echo $interest ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >From Date</label></td>
						<td><label class="control-label labelhdata"><?php $date=date_create($date_frm);
					$date_frm = date_format($date,"d/m/Y"); echo $date_frm ?></label></td>
						<td><label class="control-label labelhed" >To Date</label></td>
						<td><label class="control-label labelhdata"><?php $date=date_create($date_to);
					$date_to = date_format($date,"d/m/Y"); echo $date_to ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed">Remarks</label></td>
						<td colspan="6"><label class="control-label labelhdata"><?php echo $remark;?></label></td>
					</tr>
					<tr><td colspan="5" style="background-color:gray"></td></tr>
					 
					<?php 
					}
						}
					?>
				</tbody>
			</table> 
		</div><br><br>	
		<div class="table-responsive" style="padding:20px;">
		<h3>&nbsp;&nbsp;Property Details</h3>
		<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
			
				<?php 
				//property query
			$sql=mysql_query("select * from  property_temp where pro_pf_number='$pf_no'");
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
					  $pf_no = $fetch_sql['pro_pf_number'];
					  $property_type=get_property_type($fetch_sql['pro_type']);
					  $item= get_property_item($fetch_sql['pro_item']);
					  $other_item = $fetch_sql['pro_otheritem'];
					  $make_modal = $fetch_sql['pro_make'];
					  $dop = $fetch_sql['pro_dop'];
					  $location = $fetch_sql['pro_location'];
					  $reg_no = $fetch_sql['pro_regno'];
					  $area = $fetch_sql['pro_area'];
					  $survey_number = $fetch_sql['pro_surveyno'];
					  $tot_cost = $fetch_sql['pro_cost'];
					  $source = $fetch_sql['pro_source'];
					  $source_type = get_source_typ($fetch_sql['pro_sourcetype']);
					  $amount = $fetch_sql['pro_amount'];
					  $letter_number = $fetch_sql['pro_letterno'];
					  $letter_date = $fetch_sql['pro_letterdate'];
					  $remark = $fetch_sql['pro_remark'];
					
				  ?>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $pf_no ?></label></td>
						<td><label class="control-label labelhed" >Property Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo $property_type;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Item</label></td>
						<td><label class="control-label labelhdata"><?php echo $item;?></label></td>
						<td><label class="control-label labelhed" >Other Item</label></td>
						<td><label class="control-label labelhdata"><?php echo $other_item;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Make/Model</label></td>
						<td><label class="control-label labelhdata"><?php echo $make_modal;?></label></td>
						<td><label class="control-label labelhed" >Date Of Purchase</label></td>
						<td><label class="control-label labelhdata"><?php
						$date=date_create($dop);
					$dop = date_format($date,"d/m/Y"); echo $dop;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Location</label></td>
						<td><label class="control-label labelhdata"><?php echo $location;?></label></td>
						<td><label class="control-label labelhed" >Registration No</label></td>
						<td><label class="control-label labelhdata"><?php echo $reg_no ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Area</label></td>
						<td><label class="control-label labelhdata"><?php echo $area;?></label></td>
						<td><label class="control-label labelhed" >Survey Number</label></td>
						<td><label class="control-label labelhdata"><?php echo $survey_number;?></label></td>
					</tr><tr>
						<td><label class="control-label labelhed" >Total Cost</label></td>
						<td><label class="control-label labelhdata"><?php echo $tot_cost;?></label></td>
						<td><label class="control-label labelhed" >Source</label></td>
						<td><label class="control-label labelhdata"><?php echo $source;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Source type</label></td>
						<td><label class="control-label labelhdata"><?php echo $source_type;?></label></td>
						<td><label class="control-label labelhed" >Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $amount;?></label></td>
					</tr>

					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $letter_number;?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php
					$date=date_create($letter_date);
					$letter_date = date_format($date,"d/m/Y");						echo $letter_date;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Remarks</label></td>
						<td colspan="3"><label class="control-label labelhdata"><?php echo $remark;?></label></td>
					</tr>
					<tr><td colspan="5" style="background-color:gray"></td></tr>
					<?php 
					}
				  }
				  ?>
				</tbody>
			</table>
		</div>
		
		<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Family Composition Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
	<?php
	dbcon1();
		$sql=mysql_query("select * from  family_temp where emp_pf='$pf_no'");
		
		while($result=mysql_fetch_array($sql)){
			
			$fmy_pf_number=$result['fmy_pf_number'];
			$fmy_updatedate=$result['fmy_updatedate'];
			$date=date_create($fmy_updatedate);
			$fmy_updatedate = date_format($date,"d/m/Y");
			$fmy_member=$result['fmy_member'];
			$fmy_rel=get_relation($result['fmy_rel']);
			$fmy_gender=get_gender($result['fmy_gender']);
			$fmy_dob=$result['fmy_dob'];
			$date=date_create($fmy_dob);
			$fmy_dob = date_format($date,"d/m/Y");
			echo "<table border='1' class='table table-bordered'  style='width:100%'>";
			echo "<tbody>";
			echo "<tr>";
				
			// echo "<td><label class='control-label labelhed ' >Relative ID</label></td>";		
			// echo "<td> <label class='control-label labelhdata'>$fmy_pf_number</label></td>";	
			echo "<td ><label class='control-label labelhed' >Date Of Updation</label></td>"	;	
			echo "<td colspan='3'><label class='labelhdata labelhdata'>$fmy_updatedate</label></td>";		
			echo "</tr>";	
			echo "<tr>";	
			echo "<td><label class='control-label labelhed' >Family Member Name</label></td>";	
			echo "<td><label class='control-label labelhdata'>$fmy_member</label></td>";		
			echo "<td><label class='control-label labelhed' >Member Relation</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_rel</label></td>";		
			echo "</tr>";	
			echo "<tr>";	
			echo "<td><label class='control-label labelhed' >Gender</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_gender</label></td>";		
			echo "<td><label class='control-label labelhed' >DOB</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_dob</label></td>";		
			echo "</tr>";
			echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
			echo "</tbody>";
			echo "</table>";
			
		}
	?>				
			
		
	</div>
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Award Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
		<table border="1" class="table table-bordered"  style="width:100%">
			<tbody>
			<?php
			dbcon1();
					$sql=mysql_query("select * from  award_temp where awd_pf_number='$pf_no'");
					if($sql){
						while($fetch_sql=mysql_fetch_array($sql))
						{
							$awd_pf_number = $fetch_sql['awd_pf_number'];
							$awd_award_date	 = $fetch_sql['awd_date'];
							$date=date_create($awd_award_date);
							$awd_award_date = date_format($date,"d/m/Y");
							$awd_awarded_by = get_awarded_by($fetch_sql['awd_by']);
							$awd_award_type = got_award($fetch_sql['awd_type']);
							$awd_other_award = $fetch_sql['awd_other'];
							$awd_award_detail = $fetch_sql['awd_detail'];
						
					?>
				<tr>
					<td><label class="control-label labelhed " >PF No</label></td>
					<td> <label class="control-label labelhdata"><?php echo $awd_pf_number ?></label></td>
					<td><label class="control-label labelhed" >Date Of Award</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $awd_award_date;?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Awarded By</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_awarded_by;?></label></td>
					<td><label class="control-label labelhed" >Type Of Award</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_award_type;?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Other Award</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_other_award;?></label></td>
					<td><label class="control-label labelhed" >Award Details</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_award_detail ?></label></td>
				</tr>
				<tr>
				<tr><td colspan="5" style="background-color:gray"></td></tr>
				</tr>
				<?php 
				}
					}
					?>
			</tbody>
		</table>
	</div>
	
	<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
					<li class="active"><a href="#nominees" data-toggle="tab"><b>PF Nominee</b></a></li>
						<li class=""><a href="#giss" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuitys" data-toggle="tab"><b>Gratuity Nominee</b></a></li>
						
			</ul>
				 
			</div>
	<div class="tab-content">
  <div class="tab-pane active in" id="nominees">
		
		<div  class="tab-pane" id="nominees" style="padding:10px;">
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>PF Nominee</h3><hr>
							<div class="row">
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
             <div class="table-responsive">
			 <?php 
			 dbcon1();
				$sql=mysql_query("select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='PF'");
				while($result=mysql_fetch_array($sql)){
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'>".$result['nom_pf_number']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_type']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_name']."</label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".get_relation($result['nom_rel'])."</label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_otherrel']."</label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_per']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'>".got_mr($result['nom_status'])."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					$date=date_create($result['nom_dob']);
					echo "<td><label class='control-label labelhdata'>".
							date_format($date,"d/m/Y");"</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_panno']."</label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_aadhar']."</label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_address']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_conti']."</label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_subscriber']."</label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
					echo "</tbody>";
					echo "</table>";
				}
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example2').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>	
</div>
<div class="tab-pane" id="giss">
		
		<div  class="tab-pane" id="giss" style="padding:10px;">
			 
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>GIS Nominee</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="table-responsive">
			<?php 
				dbcon1();
				$sql=mysql_query("select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GIS'");
				while($result=mysql_fetch_array($sql)){
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'>".$result['nom_pf_number']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_type']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_name']."</label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".get_relation($result['nom_rel'])."</label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_otherrel']."</label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_per']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'>".got_mr($result['nom_status'])."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					$date=date_create($result['nom_dob']);
					$dob = date_format($date,"d/m/Y");
					echo "<td><label class='control-label labelhdata'>".$dob."</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_panno']."</label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_aadhar']."</label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_address']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_conti']."</label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_subscriber']."</label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";					
					echo "</tbody>";
					echo "</table>";
				}
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example3').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 	
	<div class="tab-pane" id="gratuitys">
		
		<div  class="tab-pane" id="gratuitys" style="padding:10px;">
			 
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Gratuity Nominee</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="table-responsive">
				<?php 
				dbcon1();
				$sql=mysql_query("select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GRA'");
				while($result=mysql_fetch_array($sql)){
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'>".$result['nom_pf_number']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_type']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_name']."</label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".get_relation($result['nom_rel'])."</label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_otherrel']."</label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_per']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'>".got_mr($result['nom_status'])."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					$date=date_create($result['nom_dob']);
					$dob = date_format($date,"d/m/Y");
					echo "<td><label class='control-label labelhdata'>".$dob."</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_panno']."</label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_aadhar']."</label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_address']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_conti']."</label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_subscriber']."</label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
					echo "</tbody>";
					echo "</table>";
				}
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example4').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div>		
	 				 
     
 
    </div> 
  <div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp; Training</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
		<table border="1" class="table table-bordered"  style="width:100%">
			<tbody>		
				<?php 
					dbcon1();
			$nominee=mysql_query("select * from  training_temp where pf_number='$pf_no'");
			while($fetch_nominee=mysql_fetch_array($nominee))
			{
				
				$tra_pf_number=$fetch_nominee['pf_number'];
				$tra_training_status = get_training_type($fetch_nominee['training_type']);
				$tra_last_date	 = $fetch_nominee['last_date'];
				$tra_due_date = $fetch_nominee['due_date'];
				$tra_training_from = $fetch_nominee['training_from'];
				$tra_training_to = $fetch_nominee['letter_date'];
			    $tra_description  = $fetch_nominee['description'];
				$tra_letter_number  = $fetch_nominee['letter_no'];
				$tra_letter_date  = $fetch_nominee['letter_date'];
				$tra_remark = $fetch_nominee['remarks'];
				?>
				<tr>
					<td><label class="control-label labelhed " >PF No</label></td>
					<td> <label class="control-label labelhdata"><?php echo $tra_pf_number ?></label></td>
					<td><label class="control-label labelhed" >Training Type</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $tra_training_status ?></label></td>
				</tr>
				
				<tr>
				<td><label class="control-label labelhed" >Last Date</label></td>
					<td><label class="labelhdata labelhdata"><?php
					$date=date_create($tra_last_date);
					$tra_last_date = date_format($date,"d/m/Y");	echo $tra_last_date; ?></label>
				</td><td><label class="control-label labelhed" >Due Date</label></td>
					<td><label class="labelhdata labelhdata"><?php 
					$date=date_create($tra_due_date);
					$tra_due_date = date_format($date,"d/m/Y");echo $tra_due_date; ?></label>
				</td>
				</tr>
				
				
				<tr>
					<td><label class="control-label labelhed" >Training From</label></td>
					<td><label class="control-label labelhdata"><?php 
					$date=date_create($tra_training_from);
					$tra_training_from = date_format($date,"d/m/Y");					echo $tra_training_from ?></label></td>
					<td><label class="control-label labelhed" >Training To</label></td>
					<td><label class="control-label labelhdata"><?php $date=date_create($tra_training_to);
					$tra_training_to = date_format($date,"d/m/Y"); echo $tra_training_to ?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Letter No</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_letter_number ?></label></td>
					<td><label class="control-label labelhed" >Letter Date</label></td>
					<td><label class="control-label labelhdata"><?php 
					$date=date_create($tra_letter_date);
					$tra_letter_date = date_format($date,"d/m/Y");echo $tra_letter_date ?></label></td>
				</tr>	
				<tr>
					<td><label class="control-label labelhed" >Description</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_description ?></label></td>
					<td><label class="control-label labelhed" >remark</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_remark ?></label></td>
				</tr>	
				<tr><td colspan="5" style="background-color:gray"></td></tr>				
				<?php 
			}
				?>
			</tbody>
		</table>							
	</div>
	  <div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Last Entry</h3>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr>
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $pf_number ?></label></td>
							<td><label class="control-label labelhed " > Date Of Joining</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $doj ?></label></td>
						</tr>
						<tr>
								<td><label class="control-label labelhed" >Retirement type</label></td>
							   <td><label class="labelhdata labelhdata"><?php echo $retire_type ?></label></td>
							   <td><label class="control-label labelhed" >Date Of Retirement</label></td>
							  <td><label class="control-label labelhdata"><?php echo $dor; ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Designation on Retirement</label></td>
							<td><label class="control-label labelhdata"><?php echo $desig_or ?></label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="control-label labelhdata"><?php echo $dept ?></label></td>
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $station ?></label></td>
							<td><label class="control-label labelhed" >ROP</label></td>
							<td><label class="control-label labelhdata"><?php echo $rop ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $bill_unit ?></label></td>
							<td><label class="control-label labelhed" >Scale/Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $scale_lvl ?></label></td>
						</tr>
						<tr>	
							<td><label class="control-label labelhed">Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $depot ?></td>
							<td><label class="control-label labelhed" >Employee Category</label></td>
							<td><label class="control-label labelhdata"><?php echo $emp_cat; ?></label></td>
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" >Total Service</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $tot_years,"  Years  ", $tot_months,"  Months  ", $tot_days,"  Days  "; ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >No. of Qualification Service</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $no_years,"  Years  ", $no_months,"  Months  ", $no_days,"  Days  "; ?></label></td>
						</tr>						
					</tbody>
				</table>
				<h3>&nbsp;&nbsp;Leave Balance</h3>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>				
						<tr>
							<td><label class="control-label labelhed " >LAP</label></td>
							<td> <label class="control-label labelhdata"><?php echo $lap; ?></label></td>
							<td><label class="control-label labelhed" >LHAP</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $lhap; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Advance Leaves</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $ad_leaves; ?></label></td>
						</tr>
						
					</tbody>
				</table>			
		</div>
                </div>
            </div>
      </div>
    </div>
</section>

<!----------------------------------------------Tab View----------------------------------------------------------->

    <section class="content-header" style="display:none">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
					<li class="active"><a href="#bio" data-toggle="tab"><b>Bio-Data</b></a></li>
					<li class=""><a href="#medical" data-toggle="tab"><b>Medical Details</b></a></li>
					<li class=""><a href="#appointment" data-toggle="tab"><b>Initial Appointment</b></a></li>
					<li class=""><a href="#present_appointment" data-toggle="tab"><b>Present Appointment</b></a></li>	<li class=""><a href="#prft" data-toggle="tab"><b>PRFT</b></a></li> 
					<li class=""><a href="#penalty" data-toggle="tab"><b>Penalty</b></a></li> 
					<li class=""><a href="#increment" data-toggle="tab"><b>Increment</b></a></li>	
					<li class=""><a href="#awards" data-toggle="tab"><b>Awards</b></a></li> 
					<li class=""><a href="#family" data-toggle="tab"><b>Family Composition</b></a></li>  
					<li class=""><a href="#nominee" data-toggle="tab"><b>Nominee(s)</b></a></li>
					<li class=""><a href="#training" data-toggle="tab"><b>Training</b></a></li>  
					<li class=""><a href="#advance" data-toggle="tab"><b>Advance</b></a></li> 
					<li class=""><a href="#property" data-toggle="tab"><b>Property</b></a></li>
					<li class=""><a href="#extra_entry" data-toggle="tab"><b>Last Entry</b></a></li>  
				
				</ul>     	 
			</div>	 
			<div class="modal-body" >
				<div class="row">
					<div class="box-body"> 
						<div class="tab-content">
			      <!--Bio Tab Start -->
	<div class="tab-pane active in" id="bio"> 		 
		<div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Personal Info</h3>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr>
							<td colspan="5"></td>
							<td style="width:10%"> <img id="blah" src="upload_doc/<?php echo $imagefile;?>" width ="200px" height="200px"/></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $pf_number_bio ?></label></td>
							<td><label class="control-label labelhed " > Old PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $oldpf_number ?></label></td>
							<td><label class="control-label labelhed" >SR NO</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $sr_no ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Date Of Birth<span class=""></span></label></td>
							<td><label class="control-label labelhdata"><?php echo $dob; ?></label></td>
							<td><label class="control-label labelhed" >ID Card Number<span class=""></span></label></td>
							<td><label class="control-label labelhdata"></label></td>
							<td><label class="control-label labelhed" >Aadhar Number<span class=""></span></label></td>
							<td><label class="control-label labelhdata"><?php echo $aadhar_number ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Employee Name</label></td>
							<td><label class="control-label labelhdata"><?php echo $emp_name ?></label></td>
							<td><label class="control-label labelhed" >Employee Old Name</label></td>
							<td><label class="control-label labelhdata"><?php echo $emp_old_name ?></label></td><td><label class="control-label labelhed" >Gender</label></td>
							<td><label class="control-label labelhdata"><?php echo $gender ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Marital Status</label></td>
							<td><label class="control-label labelhdata"><?php echo $marrital_status ?></label></td>
							<td><label class="control-label labelhed" >Father/Husband Name</label></td>
							<td><label class="control-label labelhdata"><?php echo $f_h_name ?></label></td>
							<td><label class="control-label labelhed">CUG Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $cug ?></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Personal Mobile Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $mobile_number; ?></label></td>
							<td><label class="control-label labelhed" >PAN No</label></td>
							<td><label class="control-label labelhdata"><?php echo $pan_number; ?></label></td>
							<td><label class="control-label labelhed" >PRAN Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $nps_no; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >RUID Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $ruid_no; ?></label></td>
							<td><label class="control-label labelhed" >E-mail Id</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $email; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Persent Address</label></td>
							<td><label class="control-label labelhdata"><?php echo $present_address; ?></label></td>
							<td><label class="control-label labelhed" >State Code</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_statecode; ?></label></td>
							<td><label class="control-label labelhed" >Pincode</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_pincode; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Permanent Address</label></td>
							<td><label class="control-label labelhdata"><?php echo $permanent_address; ?></label></td>
							<td><label class="control-label labelhed" >State Code</label></td>
							<td><label class="control-label labelhdata"><?php echo $per_statecode; ?></label></td>
							<td><label class="control-label labelhed" >Pincode</label></td>
							<td><label class="control-label labelhdata"><?php echo $per_pincode; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Identification Mark</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $identification_mark; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Religion</label></td>
							<td><label class="control-label labelhdata"><?php echo $religion; ?></label></td>
							<td><label class="control-label labelhed" >Community</label></td>
							<td><label class="control-label labelhdata"><?php echo $community; ?></label></td><td><label class="control-label labelhed" >Caste</label></td>
							<td><label class="control-label labelhdata"><?php echo $caste; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Recruitment Code/<br>Appointment Type</label></td>
							<td colspan="1"><label class="control-label labelhdata"><?php echo $recruit_code; ?></label></td><td><label class="control-label labelhed" >Group</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $group_col; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Education Qualification at the time of Initial Appointment</label></td>
							<td colspan="1"><label class="control-label labelhdata"><?php echo $education_ini; ?></label></td><td><label class="control-label labelhed" >Education Qualification at the time of Subsequent</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $education_sub; ?></label></td>
						</tr>
						
					</tbody>
				</table>
				<h3>&nbsp;&nbsp;Bank Details</h3>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>				
						<tr>
							<td><label class="control-label labelhed " >Bank Name</label></td>
							<td> <label class="control-label labelhdata"><?php echo $bank_name; ?></label></td>
							<td><label class="control-label labelhed" >Account No</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $account_number; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >MICR Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $micr_number; ?></label></td>
							<td><label class="control-label labelhed" >IFSC No</label></td>
							<td><label class="control-label labelhdata"><?php echo $ifsc_code; ?></label></td>
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" >Bank Address</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $bank_address; ?></label></td>
						</tr>
						<tr>
							
							
						</tr>						
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
					dbcon1();
					$sql=mysql_query("select * from medical_temp where medi_pf_number='$pf_no'");
					$cnt=1;
					while($result=mysql_fetch_array($sql))
					{
						echo "<tr>";
						echo "<td>$cnt</td>";
						echo "<td>".$result['medi_examtype']."</td>";
						echo "<td>".$result['medi_class']."</td>";
						echo "<td>".$result['medi_certino']."</td>";
						echo "<td>".date('d-m-Y', strtotime($result['medi_certidate']))."</td>";
						echo "<td>
								<a target='_blank' value='".$result['id']."' class='btn btn-primary update_btn' href='medical_detail.php?pf=$pf_no&page=display'>View</a>
							</td>";
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
			
	<div class="tab-pane" id="appointment">
		<h3>&nbsp;&nbsp;Initial Appointment</h3>
		<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">				 		 
			<div class="table-responsive" style="padding:20px;">
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr>
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $app_pf_number; ?> </label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $app_department; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Type of Initial Appointment</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $app_type; ?></label></td>
							<td><label class="control-label labelhed" >Designation<span class=""></span></label></td>
							<td><label class="labelhdata labelhdata"><?php echo $app_designation; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Appointment Date</label></td>
							<td><label class="control-label labelhdata"><?php 
							$date=date_create($app_date);
							echo date_format($date,"d/m/Y"); ?></label></td>
							<td><label class="control-label labelhed" >Regularisation Date</label></td>
							<td><label class="control-label labelhdata"><?php 
							$date=date_create($app_regul_date);
							echo date_format($date,"d/m/Y"); ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Pay Scale type</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_payscale; ?></label></td><td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_scale; ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_level; ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_group; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_station; ?></label></td>
							<td><label class="control-label labelhed" >ROP</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_rop; ?></label></td>
						</tr>
						
						<tr>	
							<td><label class="control-label labelhed" >Workplace</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_depot; ?></label></td>
							<td><label class="control-label labelhed" >Appointment Reference Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_refno; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Appointment Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php 
							$date=date_create($app_letter_date);
							echo date_format($date,"d/m/Y");?></label></td>
							<td><label class="control-label labelhed" >Remark</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_remark; ?></label></td>
						</tr>					
					</tbody>
				</table>
			</div>
			<div class="pull-right col-md-7 col-sm-12 col-xs-12">
				<!--a href="#" class="btn btn-primary back_btn">Back</a-->
			</div>						 
    </div>
 <div class="tab-pane" id="present_appointment">
			<div class="table-responsive" style="padding:20px;" id="sgd_ogd_no_mul">
			<h3>&nbsp;&nbsp;Present Working Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number; ?> </label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Weather Employee is officiating in 
higher<br> grade than substantive grade?<span class=""></span></label></td>
							<td><label class="labelhdata"><?php  echo $sgd_dropdwn_value ?></label></td>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="labelhdata"><?php echo  $pre_app_designation ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_scale_type ?></label></td>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_scale ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_level ?></label></td>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_billunit  ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Depot/Workplace</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_depot ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_group_col ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_other ?></label></td>	
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_rop ?></label></td>	
						</tr>	
					</tbody>		
				</table>
			</div>
			
			<div class="table-responsive" style="padding:20px;" id="sgd_ogd_yes_mul">
			<h3>&nbsp;&nbsp;Present Working Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number ?> </label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Weather Employee is Officiating in 
higher<br> grade than substantive grade?<span class=""></span></label></td>
							<td colspan="5"><label class="labelhdata"><?php echo $sgd_dropdwn_value; ?></label></td>
						</tr>
						
						<tr>
							<td colspan="4"> <label class="control-label labelhed" style="font-size:18px;" ><b>Substancive Grade Details</b></label></td>
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_designation ?></label></td>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_pst ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_scale ?></label></td>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_level ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_billunit ?></label></td>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_depot ?></label></td>
							
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_station ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $sgd_group ?></label></td>	
						</tr>
						
						<tr>
							<td colspan="4"> <label class="control-label labelhed" style="font-size:18px;" ><b>Officiating Grade Details</b></label></td>
						</tr>
								
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_desig ?></label></td>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_pst ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_scale ?></label></td>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_level ?></label></td>
							
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_billunit ?></label></td>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_depot ?></label></td>
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_station ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $ogd_group ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $ogd_rop ?></label></td>	
						</tr>
						
					</tbody>		
				</table>
			</div>
			
			
			<div class="pull-right col-md-7 col-sm-12 col-xs-12">
				<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
			</div>					 
      </div>			 
		<div class="tab-pane" id="prft">
		
		<div  class="tab-pane" id="prft" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Promotion</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		
					<?php
					$pf_no=$_GET['pf'];
					$cnt_pr=1;
					$sql=mysql_query("select * from  prft_promotion_temp where pro_pf_no='$pf_no'");
					while($result=mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>$cnt_pr</td>";
						echo "<td>".$result['pro_pf_no']."</td>";
						echo "<td>".$result['pro_order_type']."</td>";
						echo "<td>".$result['temp_transaction_id']."</td>";
						echo "<td><a target='_blank' href='prft_show_promotion.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
						echo "</tr>";
						$cnt_pr++;
					}
				?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example2').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 
	<div class="tab-pane" id="rever">
		
		<div  class="tab-pane" id="rever" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Reversion</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-striped">
                <thead>
                <tr>
                  <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		<?php
					$pf_no=$_GET['pf'];
					$cnt_rv=1;
					$sql=mysql_query("select * from   prft_reversion_temp where rev_pf_no='$pf_no'");
					while($result=mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>$cnt_rv</td>";
						echo "<td>".$result['rev_pf_no']."</td>";
						echo "<td>".$result['rev_order_type']."</td>";
						echo "<td>".$result['temp_transaction_id']."</td>";
						echo "<td><a target='_blank' href='prft_show_reversion.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
						echo "</tr>";
						$cnt_rv++;
					}
				?>
					
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example3').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 	
	<div class="tab-pane" id="trans">
		
		<div  class="tab-pane" id="trans" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Transfer</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example4" class="table table-striped">
                <thead>
                <tr>
                   <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		<?php
					$pf_no=$_GET['pf'];
						$cnt_tr=1;
						$sql=mysql_query("select * from prft_transfer_temp where trans_pf_no='$pf_no'");
						while($result=mysql_fetch_array($sql)){
							echo "<tr>";
							echo "<td>$cnt_tr</td>";
							echo "<td>".$result['trans_pf_no']."</td>";
							echo "<td>".get_order_type_transfer($result['trans_order_type'])."</td>";
							echo "<td>".$result['temp_transaction_id']."</td>";
							echo "<td><a target='_blank' href='prft_show_transfer.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
							echo "</tr>";
							$cnt_tr++;
						}
					?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example4').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div> 	
	<div class="tab-pane" id="fix">
		
		<div  class="tab-pane" id="rever" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
						<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
						<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Fixation</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example5" class="table table-striped">
                <thead>
                <tr>
                   <th>Sr No</th>
                  <th>PF Number</th>
                  <th>Order Type</th>
                  <th>Transion Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		
						<?php
						dbcon1();
						$pf_no=$_GET['pf'];
						$cnt_fx=1;
						$sql1=mysql_query("select * from prft_fixation_temp where fix_pf_no='$pf_no'");
						$cnt=mysql_num_rows($sql1);
						
					 
						while($result=mysql_fetch_array($sql1)){
							//echo "<script>alert(".$result['id'].")</script>";
							echo "<tr>";
							echo "<td>$cnt_fx</td>";
							echo "<td>".$result['fix_pf_no']."</td>";
							echo "<td>".get_order_type_fixation($result['fix_order_type'])."</td>";
							echo "<td>".$result['temp_transaction_id']."</td>";
							echo "<td><a target='_blank' href='prft_show_fixaction.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
							echo "</tr>";
							$cnt_fx++;
						}
					?>
			
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example5').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
		</div>						 
    </div>
	
	
	
	
<!--Penalty Tab Start -->
	<div class="tab-pane" id="penalty">
		<div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Penalty Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
			<?php 
					//penalty 
				 dbcon1();
				  $pf_no=$_GET['pf'];
				  //echo "<script>alert('$pf_no');</script>";
				$cnt=1;
				  $query=mysql_query("Select * from penalty_temp where pen_pf_number='$pf_no'");
				  //echo "Select * from penalty_temp where pen_pf_number='$pf_no'".mysql_error();
					while($result=mysql_fetch_assoc($query))
					 {
							
				?>

			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
					<tr><td colspan="5" style="background-color:grey;color:white;"><b><?php echo $cnt;?> Penalty</b></td></tr>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $result['pen_pf_number']; ?></label></td>
						<td><label class="control-label labelhed" >Penalty Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo get_penalty_type($result['pen_type']); ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Penalty Issued</label></td>
						<td><label class="control-label labelhdata"><?php 
						echo  date('d-m-Y', strtotime($result['pen_issued'])); ?></label></td>
						<td><label class="control-label labelhed" >Penalty Effected</label></td>
						<td><label class="control-label labelhdata"><?php 
						echo  date('d-m-Y', strtotime($result['pen_effetcted'])); ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $result['pen_letterno']; ?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php 
						echo date('d-m-Y', strtotime($result['pen_letterdate'])); ?></label></td>
					</tr>	
					<tr>
						<td><label class="control-label labelhed" >ChargeSheet Status</label></td>
						<td><label class="control-label labelhdata"><?php echo get_charge_sheet_status($result['pen_chargestatus']); ?></label></td>
						<td><label class="control-label labelhed" >ChargeSheet Reference Number </label></td>
						<td><label class="control-label labelhdata"><?php echo $result['pen_chargeref'];?></label></td>
					</tr>	
					<tr>
						<td><label class="control-label labelhed" >From Date</label></td>
						<td><label class="control-label labelhdata"><?php echo date('d-m-Y', strtotime($result['pen_from'])); ?></label></td>
						<td><label class="control-label labelhed" >To Date</label></td>
						<td><label class="control-label labelhdata"><?php 
						echo date('d-m-Y', strtotime($result['pen_to'])); ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Remarks</label></td>
						<td colspan="5"><label class="control-label labelhdata"><?php echo $result['pen_remark'];  ?></label></td>
						
					</tr>	
					<?php $cnt++;?>
<?php 
}
?>
				</tbody>
			</table>
		</div>
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="#" class="btn btn-primary back_btn">Back</a-->
		</div>
    </div>
	<!--Penalty Tab End -->
	<!--Increment tab begins -->
	<?php 
	dbcon1();
		$sql=mysql_query("select * from  increment_temp where incr_pf_number='$pf_no'");
		$sql_fetch=mysql_fetch_array($sql);
	?>
<div class="tab-pane" id="increment">
	<div class="table-responsive" style="padding:20px;">
	<h3 >&nbsp;&nbsp;Increment Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
			<table border='1' class='table table-bordered'  style='width:100%'>
			<tr>
			<td>Pf Number</td>
			<td><?php echo $sql_fetch['incr_pf_number'];?></td>
			</tr>
			</table>
			<table border='1' class='table table-bordered'  style='width:100%'>
			<tbody>
			<tr>
				<th>Sr No</th>
				<th>Increment type</th>
				<th>Pay Scale type</th>
				<th>Pay Scale/level</th>
				<th>rate of pay</th>
				<th>increment date</th>
				<th>reason</th>
			</tr>
		<?php
		dbcon1();
		$sql=mysql_query("select * from  increment_temp where incr_pf_number='$pf_no'");
		$cnt="1";
		while($result=mysql_fetch_array($sql)){
			
			$incr_scale="";
			$incr_level="";
			$ps_type=get_pay_scale_type($result['ps_type']);
				if($result['ps_type']=='2'||$result['ps_type']=='3'||$result['ps_type']=='4'){
					$incr_scale=$result['incr_scale'];
					$incr_level="";
				}
				else if($result['ps_type']=='5'){
					$incr_level=$result['incr_level'];
					$incr_scale="";
				}
							
			echo "<tr>";
			echo"<td>$cnt</td>";	
			echo "<td>".get_increment_type($result['incr_type'])."</td>";		
			echo "<td>".get_pay_scale_type($result['ps_type'])."</td>";	
			echo "<td>$incr_scale $incr_level </td>";	
			echo "<td>".$result['incr_rop']."</td>";	
			echo "<td>".date('Y-m-d', strtotime($result['incr_date']))."</td>";	
			echo "<td>".$result['incr_remark']."</td>";	
			echo "</tr>";
		$cnt++;	
		}
	?>	
	</tbody>
	</table>
		
</div>
<div class="pull-right col-md-7 col-sm-12 col-xs-12">
	
</div>
</div>
<!-- advance details -->
    <div class="tab-pane" id="advance">
	<h3>&nbsp;&nbsp;Adavance Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
		<div class="table-responsive" style="padding:20px;">
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
				<?php 
				dbcon1();
				$sql=mysql_query("select * from  advance_temp where adv_pf_number='$pf_no'");
				if($sql){
						while($fetch_sql=mysql_fetch_array($sql))
							{
									$pf_no = $fetch_sql['adv_pf_number'];
									$advance_type=$fetch_sql['adv_type'];
									$letter_number= $fetch_sql['adv_letterno'];
									$letter_date = $fetch_sql['adv_letterdate'];
									$wef_date = $fetch_sql['adv_wefdate'];
									$amount = $fetch_sql['adv_amount'];
									$tot_amt = $fetch_sql['adv_principle'];
									$interest = $fetch_sql['adv_interest'];
									$date_frm = $fetch_sql['adv_from'];
									$date_to = $fetch_sql['adv_to'];
									$remark = $fetch_sql['adv_remark'];
							
				?>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $pf_no;?></label></td>
						<td><label class="control-label labelhed" >Advances Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo $advance_type;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $letter_number;?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php 
						$date=date_create($letter_date);
					$letter_date = date_format($date,"d/m/Y");echo $letter_date;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >WEF Date</label></td>
						<td><label class="control-label labelhdata"><?php 
						$date=date_create($wef_date);
					$wef_date = date_format($date,"d/m/Y");echo $wef_date ?></label></td>
						<td><label class="control-label labelhed" >Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $amount ?></label></td>
					</tr>

					<tr>
						<td colspan="6"><label class="control-label labelhed" ><b>Recovery Details</b></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Total Principle Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $tot_amt ?></label></td>
						<td><label class="control-label labelhed" >Total Interest</label></td>
						<td><label class="control-label labelhdata"><?php echo $interest ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >From Date</label></td>
						<td><label class="control-label labelhdata"><?php $date=date_create($date_frm);
					$date_frm = date_format($date,"d/m/Y"); echo $date_frm ?></label></td>
						<td><label class="control-label labelhed" >To Date</label></td>
						<td><label class="control-label labelhdata"><?php $date=date_create($date_to);
					$date_to = date_format($date,"d/m/Y"); echo $date_to ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed">Remarks</label></td>
						<td colspan="6"><label class="control-label labelhdata"><?php echo $remark;?></label></td>
					</tr>
					<tr><td colspan="5" style="background-color:gray"></td></tr>
					 
					<?php 
					}
						}
					?>
				</tbody>
			</table> 
		</div><br><br>
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="#" class="btn btn-primary back_btn">Back</a-->
		</div>
    </div>
	<!-- Property tab -->
	<div class="tab-pane" id="property">
		<div class="table-responsive" style="padding:20px;">
		<h3>&nbsp;&nbsp;Property Details</h3>
		<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
			
				<?php 
				//property query
			$sql=mysql_query("select * from  property_temp where pro_pf_number='$pf_no'");
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
					  $pf_no = $fetch_sql['pro_pf_number'];
					  $property_type=get_property_type($fetch_sql['pro_type']);
					  $item= get_property_item($fetch_sql['pro_item']);
					  $other_item = $fetch_sql['pro_otheritem'];
					  $make_modal = $fetch_sql['pro_make'];
					  $dop = $fetch_sql['pro_dop'];
					  $location = $fetch_sql['pro_location'];
					  $reg_no = $fetch_sql['pro_regno'];
					  $area = $fetch_sql['pro_area'];
					  $survey_number = $fetch_sql['pro_surveyno'];
					  $tot_cost = $fetch_sql['pro_cost'];
					  $source = $fetch_sql['pro_source'];
					  $source_type = get_source_typ($fetch_sql['pro_sourcetype']);
					  $amount = $fetch_sql['pro_amount'];
					  $letter_number = $fetch_sql['pro_letterno'];
					  $letter_date = $fetch_sql['pro_letterdate'];
					  $remark = $fetch_sql['pro_remark'];
					
				  ?>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $pf_no ?></label></td>
						<td><label class="control-label labelhed" >Property Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo $property_type;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Item</label></td>
						<td><label class="control-label labelhdata"><?php echo $item;?></label></td>
						<td><label class="control-label labelhed" >Other Item</label></td>
						<td><label class="control-label labelhdata"><?php echo $other_item;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Make/Model</label></td>
						<td><label class="control-label labelhdata"><?php echo $make_modal;?></label></td>
						<td><label class="control-label labelhed" >Date Of Purchase</label></td>
						<td><label class="control-label labelhdata"><?php
						$date=date_create($dop);
					$dop = date_format($date,"d/m/Y"); echo $dop;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Location</label></td>
						<td><label class="control-label labelhdata"><?php echo $location;?></label></td>
						<td><label class="control-label labelhed" >Registration No</label></td>
						<td><label class="control-label labelhdata"><?php echo $reg_no ?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Area</label></td>
						<td><label class="control-label labelhdata"><?php echo $area;?></label></td>
						<td><label class="control-label labelhed" >Survey Number</label></td>
						<td><label class="control-label labelhdata"><?php echo $survey_number;?></label></td>
					</tr><tr>
						<td><label class="control-label labelhed" >Total Cost</label></td>
						<td><label class="control-label labelhdata"><?php echo $tot_cost;?></label></td>
						<td><label class="control-label labelhed" >Source</label></td>
						<td><label class="control-label labelhdata"><?php echo $source;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Source type</label></td>
						<td><label class="control-label labelhdata"><?php echo $source_type;?></label></td>
						<td><label class="control-label labelhed" >Amount</label></td>
						<td><label class="control-label labelhdata"><?php echo $amount;?></label></td>
					</tr>

					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $letter_number;?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php
					$date=date_create($letter_date);
					$letter_date = date_format($date,"d/m/Y");						echo $letter_date;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Remarks</label></td>
						<td colspan="3"><label class="control-label labelhdata"><?php echo $remark;?></label></td>
					</tr>
					<tr><td colspan="5" style="background-color:gray"></td></tr>
					<?php 
					}
				  }
				  ?>
				</tbody>
			</table>
		</div>
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<!--a href="#" class="btn btn-primary back_btn">Back</a-->
		</div>
    </div>
<!-- family composition -->
<div class="tab-pane" id="family">
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Family Composition Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
	<?php
	dbcon1();
		$sql=mysql_query("select * from  family_temp where emp_pf='$pf_no'");
		
		while($result=mysql_fetch_array($sql)){
			
			$fmy_pf_number=$result['fmy_pf_number'];
			$fmy_updatedate=$result['fmy_updatedate'];
			$date=date_create($fmy_updatedate);
			$fmy_updatedate = date_format($date,"d/m/Y");
			$fmy_member=$result['fmy_member'];
			$fmy_rel=get_relation($result['fmy_rel']);
			$fmy_gender=get_gender($result['fmy_gender']);
			$fmy_dob=$result['fmy_dob'];
			$date=date_create($fmy_dob);
			$fmy_dob = date_format($date,"d/m/Y");
			echo "<table border='1' class='table table-bordered'  style='width:100%'>";
			echo "<tbody>";
			echo "<tr>";
				
			// echo "<td><label class='control-label labelhed ' >Relative ID</label></td>";		
			// echo "<td> <label class='control-label labelhdata'>$fmy_pf_number</label></td>";	
			echo "<td ><label class='control-label labelhed' >Date Of Updation</label></td>"	;	
			echo "<td colspan='3'><label class='labelhdata labelhdata'>$fmy_updatedate</label></td>";		
			echo "</tr>";	
			echo "<tr>";	
			echo "<td><label class='control-label labelhed' >Family Member Name</label></td>";	
			echo "<td><label class='control-label labelhdata'>$fmy_member</label></td>";		
			echo "<td><label class='control-label labelhed' >Member Relation</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_rel</label></td>";		
			echo "</tr>";	
			echo "<tr>";	
			echo "<td><label class='control-label labelhed' >Gender</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_gender</label></td>";		
			echo "<td><label class='control-label labelhed' >DOB</label></td>";		
			echo "<td><label class='control-label labelhdata'>$fmy_dob</label></td>";		
			echo "</tr>";
			echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
			echo "</tbody>";
			echo "</table>";
			
		}
	?>				
			
		
	</div>
	<div class="pull-right col-md-7 col-sm-12 col-xs-12">
		<!--a href="#" class="btn btn-primary back_btn">Back</a-->
	</div>
</div>
<!--awards-->
<div class="tab-pane" id="awards">
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Award Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
		<table border="1" class="table table-bordered"  style="width:100%">
			<tbody>
			<?php
			dbcon1();
					$sql=mysql_query("select * from  award_temp where awd_pf_number='$pf_no'");
					if($sql){
						while($fetch_sql=mysql_fetch_array($sql))
						{
							$awd_pf_number = $fetch_sql['awd_pf_number'];
							$awd_award_date	 = $fetch_sql['awd_date'];
							$date=date_create($awd_award_date);
							$awd_award_date = date_format($date,"d/m/Y");
							$awd_awarded_by = get_awarded_by($fetch_sql['awd_by']);
							$awd_award_type = got_award($fetch_sql['awd_type']);
							$awd_other_award = $fetch_sql['awd_other'];
							$awd_award_detail = $fetch_sql['awd_detail'];
						
					?>
				<tr>
					<td><label class="control-label labelhed " >PF No</label></td>
					<td> <label class="control-label labelhdata"><?php echo $awd_pf_number ?></label></td>
					<td><label class="control-label labelhed" >Date Of Award</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $awd_award_date;?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Awarded By</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_awarded_by;?></label></td>
					<td><label class="control-label labelhed" >Type Of Award</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_award_type;?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Other Award</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_other_award;?></label></td>
					<td><label class="control-label labelhed" >Award Details</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_award_detail ?></label></td>
				</tr>
				<tr>
				<tr><td colspan="5" style="background-color:gray"></td></tr>
				</tr>
				<?php 
				}
					}
					?>
			</tbody>
		</table>
	</div>
	 
</div>
<!-- nominee -->
<div class="tab-pane" id="nominee">
		
		<div  class="tab-pane" id="nominee" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
					<li class=""><a href="#nominee" data-toggle="tab"><b></b></a></li>
						<!--li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li-->
						
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Nominee Details</h3><hr>
							<div class="row">
	 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
             <div class="table-responsive">
			 <?php 
			 dbcon1();
				$sql=mysql_query("select * from  nominee_temp where nom_pf_number='$pf_no'");
				while($result=mysql_fetch_array($sql)){
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'>".$result['nom_pf_number']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_type']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_name']."</label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".get_relation($result['nom_rel'])."</label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_otherrel']."</label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_per']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'>".got_mr($result['nom_status'])."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					$date=date_create($result['nom_dob']);
					echo "<td><label class='control-label labelhdata'>".
							date_format($date,"d/m/Y");"</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_panno']."</label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_aadhar']."</label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_address']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_conti']."</label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_subscriber']."</label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
					echo "</tbody>";
					echo "</table>";
				}
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   
	<script>
  $(function () {
    $('#example2').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		 					 
    </div> 
	<div class="tab-pane" id="gis">
		
		<div  class="tab-pane" id="gis" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details	</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#nominee" data-toggle="tab"><b>Nominee</b></a></li>
						<!--li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li-->
						
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>GIS Nominee</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="table-responsive">
			<?php 
				dbcon1();
				$sql=mysql_query("select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GIS'");
				while($result=mysql_fetch_array($sql)){
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'>".$result['nom_pf_number']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_type']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_name']."</label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".get_relation($result['nom_rel'])."</label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_otherrel']."</label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_per']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'>".got_mr($result['nom_status'])."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					$date=date_create($result['nom_dob']);
					$dob = date_format($date,"d/m/Y");
					echo "<td><label class='control-label labelhdata'>".$dob."</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_panno']."</label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_aadhar']."</label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_address']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_conti']."</label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_subscriber']."</label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";					
					echo "</tbody>";
					echo "</table>";
				}
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example3').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		 					 
    </div> 	
	<div class="tab-pane" id="gratuity">
		
		<div  class="tab-pane" id="gratuity" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee</h3>
			<div class="box-header with-border">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class=""><a href="#nominee" data-toggle="tab"><b>PF Nominee</b></a></li>
						<li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li>
						
			</ul>
				 
			</div>
					<div class="box-body">
					<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
						<h3>Gratuity Nominee</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="table-responsive">
				<?php 
				dbcon1();
				$sql=mysql_query("select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GRA'");
				while($result=mysql_fetch_array($sql)){
					
					echo "<table border='1' class='table table-bordered'  style='width:100%'>";
					echo "<tbody>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>PF No</label></td>";
					echo "<td> <label class='control-label labelhdata'>".$result['nom_pf_number']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_type']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_name']."</label>";
					echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
					echo "<td><label class='labelhdata labelhdata'>".get_relation($result['nom_rel'])."</label>";
					echo "</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_otherrel']."</label></td>";
					echo "<td><label class='control-label labelhed' >Percentage</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_per']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
					echo "<td><label class='control-label labelhdata'>".got_mr($result['nom_status'])."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					$date=date_create($result['nom_dob']);
					$dob = date_format($date,"d/m/Y");
					echo "<td><label class='control-label labelhdata'>".$dob."</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_panno']."</label></td>";
					echo "</tr>	";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_aadhar']."</label></td>";
					echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_address']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_conti']."</label></td>";
					echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_subscriber']."</label></td>";
					echo "</tr>";
					echo"<tr><td colspan='5' style='background-color:gray'></td></tr>";
					echo "</tbody>";
					echo "</table>";
				}
			 ?>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>	
	<script>
  $(function () {
    $('#example4').DataTable()
   
  })
</script>
							</div>
				</div>
				</form>
			</div>
		</div>			 
		 					 
    </div> 	
<!-- training tab -->	
<div class="tab-pane" id="training">
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp; Training</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
		<table border="1" class="table table-bordered"  style="width:100%">
			<tbody>		
				<?php 
					dbcon1();
			$nominee=mysql_query("select * from  training_temp where pf_number='$pf_no'");
			while($fetch_nominee=mysql_fetch_array($nominee))
			{
				
				$tra_pf_number=$fetch_nominee['pf_number'];
				$tra_training_status = get_training_type($fetch_nominee['training_type']);
				$tra_last_date	 = $fetch_nominee['last_date'];
				$tra_due_date = $fetch_nominee['due_date'];
				$tra_training_from = $fetch_nominee['training_from'];
				$tra_training_to = $fetch_nominee['letter_date'];
			    $tra_description  = $fetch_nominee['description'];
				$tra_letter_number  = $fetch_nominee['letter_no'];
				$tra_letter_date  = $fetch_nominee['letter_date'];
				$tra_remark = $fetch_nominee['remarks'];
				?>
				<tr>
					<td><label class="control-label labelhed " >PF No</label></td>
					<td> <label class="control-label labelhdata"><?php echo $tra_pf_number ?></label></td>
					<td><label class="control-label labelhed" >Training Type</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $tra_training_status ?></label></td>
				</tr>
				
				<tr>
				<td><label class="control-label labelhed" >Last Date</label></td>
					<td><label class="labelhdata labelhdata"><?php
					$date=date_create($tra_last_date);
					$tra_last_date = date_format($date,"d/m/Y");	echo $tra_last_date; ?></label>
				</td><td><label class="control-label labelhed" >Due Date</label></td>
					<td><label class="labelhdata labelhdata"><?php 
					$date=date_create($tra_due_date);
					$tra_due_date = date_format($date,"d/m/Y");echo $tra_due_date; ?></label>
				</td>
				</tr>
				
				
				<tr>
					<td><label class="control-label labelhed" >Training From</label></td>
					<td><label class="control-label labelhdata"><?php 
					$date=date_create($tra_training_from);
					$tra_training_from = date_format($date,"d/m/Y");					echo $tra_training_from ?></label></td>
					<td><label class="control-label labelhed" >Training To</label></td>
					<td><label class="control-label labelhdata"><?php $date=date_create($tra_training_to);
					$tra_training_to = date_format($date,"d/m/Y"); echo $tra_training_to ?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Letter No</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_letter_number ?></label></td>
					<td><label class="control-label labelhed" >Letter Date</label></td>
					<td><label class="control-label labelhdata"><?php 
					$date=date_create($tra_letter_date);
					$tra_letter_date = date_format($date,"d/m/Y");echo $tra_letter_date ?></label></td>
				</tr>	
				<tr>
					<td><label class="control-label labelhed" >Description</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_description ?></label></td>
					<td><label class="control-label labelhed" >remark</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_remark ?></label></td>
				</tr>	
				<tr><td colspan="5" style="background-color:gray"></td></tr>				
				<?php 
			}
				?>
			</tbody>
		</table>							
	</div>
	<div class="pull-right col-md-7 col-sm-12 col-xs-12">
		<!--a href="#" class="btn btn-primary back_btn">Back</a-->
	</div>
</div>		

<div class="tab-pane" id="extra_entry"> 		 
		<div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Personal Info</h3>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr>
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $pf_number ?></label></td>
							<td><label class="control-label labelhed " > Date Of Joining</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $doj ?></label></td>
						</tr>
						<tr>
								<td><label class="control-label labelhed" >Retirement type</label></td>
							   <td><label class="labelhdata labelhdata"><?php echo $retire_type ?></label></td>
							   <td><label class="control-label labelhed" >Date Of Retirement</label></td>
							  <td><label class="control-label labelhdata"><?php echo $dor; ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Designation on Retirement</label></td>
							<td><label class="control-label labelhdata"><?php echo $desig_or ?></label></td>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="control-label labelhdata"><?php echo $dept ?></label></td>
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $station ?></label></td>
							<td><label class="control-label labelhed" >ROP</label></td>
							<td><label class="control-label labelhdata"><?php echo $rop ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $bill_unit ?></label></td>
							<td><label class="control-label labelhed" >Scale/Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $scale_lvl ?></label></td>
						</tr>
						<tr>	
							<td><label class="control-label labelhed">Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $depot ?></td>
							<td><label class="control-label labelhed" >Employee Category</label></td>
							<td><label class="control-label labelhdata"><?php echo $emp_cat; ?></label></td>
						</tr>
						<tr>
							
							<td><label class="control-label labelhed" >Total Service</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $tot_years,"  Years  ", $tot_months,"  Months  ", $tot_days,"  Days  "; ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >No. of Qualification Service</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $no_years,"  Years  ", $no_months,"  Months  ", $no_days,"  Days  "; ?></label></td>
						</tr>						
					</tbody>
				</table>
				<h3>&nbsp;&nbsp;Leave Balance</h3>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>				
						<tr>
							<td><label class="control-label labelhed " >LAP</label></td>
							<td> <label class="control-label labelhdata"><?php echo $lap; ?></label></td>
							<td><label class="control-label labelhed" >LHAP</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $lhap; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Advance Leaves</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $ad_leaves; ?></label></td>
						</tr>
						
					</tbody>
				</table>			
		</div>
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			
		</div>						  
    </div>	


		 
		       </div>	    
             </div>
        </div>
      </div>
  </div>
   </div>
	  </section>
	 </div>	
   <?php
 include_once('../global/footer.php');
 ?> 
 <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script>
 $(document).ready(function(){
	 
	 $('.content-header').show(); 	
});
 </script>
 
 <script>
  
$(".tab_view").click(function(){
		  $('.content-header').show();
		   $('#singles').hide();
			 
	 });
	 $(".tab_single").click(function(){
		  $('#singles').show();
		  $('.content-header').hide();
			 
	 });
 </script>
<script>
 


$(".back_btn").click(function(){
	window.location='sr_search.php';
});

var pre_wk=<?php echo $sgd_dropdwn;?>;

if(pre_wk==2)
{
	$("#sgd_ogd_no_mul").show();
	$("#sgd_ogd_yes_mul").hide();
	
	$("#sgd_ogd_no").show();
	$("#sgd_ogd_yes").hide();
}
else{
	$("#sgd_ogd_no_mul").hide();
	$("#sgd_ogd_yes_mul").show();
	
	$("#sgd_ogd_no").hide();
	$("#sgd_ogd_yes").show();
}
</script>
 