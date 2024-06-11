<?php 
 session_start();
$GLOBALS['a'] = 'sr_entry';
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');
// include('get_func.php');
//error_reporting(0);
include('mini_function.php');
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
	
}
</style>

				<?php
				
				// Bio
					 $pf_no=$_GET['pf'];
					 $query=mysql_query("Select * from biodata_track where pf_number='$pf_no' ");
					 
					 if(mysql_num_rows($query)<=0)
					 {
						 echo "<script>alert('This PF Number is not Registered');</script>";
						 $pf_number=$oldpf_number=$identity_number=$sr_no=$dob=$mobile_number=$emp_name=$emp_old_name=$f_h_selction=$f_h_name=$cug=$aadhar_number=$email=$pan_number=$present_address=$pre_statecode=$pre_pincode=$permanent_address=$per_statecode=$per_pincode=$identification_mark=$religion=$community=$caste=$gender=$marrital_status=$recruit_code=$group_col=$education_ini=$edu_desc_ini=$education_sub=$edu_desc_sub=$bank_name=$account_number=$micr_number=$ifsc_code=$ruid_no=$bank_address=$nps_no=$imagefile="";
					 }else{
					 while($result=mysql_fetch_assoc($query))
					    {
							$pf_number=$result['pf_number'];
							$oldpf_number=$result['oldpf_number'];
							$identity_number=$result['identity_number'];
							$sr_no=$result['sr_no'];
							$dob=$result['dob'];
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
							$religion=$result['religion'];							  
							$community=$result['community'];
							$caste=$result['caste'];
							$gender=$result['gender'];
							$marrital_status=$result['marrital_status'];
							$recruit_code=$result['recruit_code'];
							$group_col=$result['group_col'];
							$education_ini=$result['education_ini'];
							$edu_desc_ini=$result['edu_desc_ini'];
							$education_sub=$result['education_sub'];
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
					$query=mysql_query("Select * from  appointment_temp where app_pf_number='$pf_no'") or die(mysql_error());
						//$resultset = mysql_fetch_array($query);
						while($result=mysql_fetch_array($query))
						{
							$app_pf_number=$result['app_pf_number']; 
							$app_designation=get_designation($result['app_designation']);
							$app_department=get_department($result['app_department']);  
							//$app_old=$result['app_old-designation'];  
							$app_date=$result['app_date'];  
							$app_regul_date=$result['app_regul_date'];  
							$app_payscale=$result['app_payscale'];  
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
						}
					  
			 // Present Appointment
					dbcon1();
					$pf_no=$_GET['pf'];
					$query=mysql_query("Select * from present_work_temp where preapp_pf_number='$pf_no'");
					while($result=mysql_fetch_assoc($query))
						{
							$preapp_pf_number=$result['preapp_pf_number'];  
							$pre_app_department=get_department($result['preapp_department']);  
							$pre_app_designation=get_designation($result['preapp_designation']);   
							$pre_app_scale=$result['preapp_scale']; 
							$pre_app_billunit=get_billunit($result['preapp_billunit']); 					
							$pre_app_level=$result['preapp_level'];  
							$pre_app_group_col=get_group($result['preapp_group']);  
							$pre_app_station=get_station($result['preapp_station']);  
							$pre_app_other=$result['preapp_station'];  
							$pre_app_depot=get_depot($result['preapp_depot']);  
							$pre_app_rop=$result['preapp_rop'];  
							$preapp_remark=$result['preapp_remark'];  
							$sgd_dropdwn=$result['sgd_dropdwn'];  
							$sgd_designation=get_designation($result['sgd_designation']);  
							$presgd_otherdesign=$result['presgd_otherdesign'];  
							$sgd_pst=$result['sgd_pst'];  
							$sgd_scale=$result['sgd_scale'];  
							$sgd_level=$result['sgd_level'];  
							$sgd_billunit=get_billunit($result['sgd_billunit']);  
							$sgd_depot=get_depot($result['sgd_depot']);  
							$sgd_station=get_station($result['sgd_station']);  
							$sgd_group=get_group($result['sgd_group']);  
							$ogd_desig=get_designation($result['ogd_desig']);  
							$preogd_otherdesign=$result['preogd_otherdesign'];  
							$ogd_pst=$result['ogd_pst'];  
							$ogd_scale=$result['ogd_scale'];  
							$ogd_level=$result['ogd_level'];  
							$ogd_billunit=get_billunit($result['ogd_billunit']);  
							$ogd_depot=get_depot($result['ogd_depot']);  
							$ogd_station=get_station($result['ogd_station']);  
							$ogd_group=get_group($result['ogd_group']);  
							$ogd_rop=$result['ogd_rop'];  
							
						}
						
		 /*	//prtf code	 
			dbcon1();
					$pf_no=$_GET['pf'];
					$query=mysql_query("Select * from prft_temp where prft_pf_number='$pf_no' ");
					while($result=mysql_fetch_assoc($query))
						{
							$prft_pf_number=$result['prft_pf_number'];  
							$prft_type=get_prtf_type($result['prft_type']);
							$prft_ordertype=$result['prft_ordertype'];
							$prft_letterno=$result['prft_letterno'];
							$prft_letterdate=$result['prft_letterdate'];
							$prft_billunitfrom=get_billunit($result['prft_billunitfrom']);
							$prft_billunitto=get_billunit($result['prft_billunitto']);
							
							$prft_department=get_department($result['prft_department']);  
							$prft_designation=get_designation($result['prft_designation']);  
							$prft_otherdesig=$result['prft_otherdesig'];  
							$ps_type=$result['ps_type'];  
							  
							$prft_scale=($result['prft_scale']);  
							$prft_level=($result['prft_level']);  
							$prft_group=get_group($result['prft_group']);  
							$prft_station=get_station($result['prft_station']);  
							$prft_billunit=get_billunit($result['prft_billunit']); 
							$prft_other=$result['prft_otherstation'];
							$prft_rop=($result['prft_rop']);  
							$prft_depot=get_depot($result['prft_depot']);  
							$prft_carriedout=($result['prft_carriedout']);  
							
							$prft_wefdate=($result['prft_wefdate']); 
							$prft_incrdate=($result['prft_incrdate']); 
							$date_time=($result['date_time']);  
					
						}
				//Nominee Query
				dbcon1();
					$nominee=mysql_query("select * from nominee_temp where nom_pf_number='$pf_no'");
					while($fetch_nominee=mysql_fetch_array($nominee))
						{
							$nom_nomination_type =get_nom_type($fetch_nominee['nom_type']);
							$nom_pf_number1 = $fetch_nominee['nom_pf_number'];
							$nom_nominee_name= $fetch_nominee['nom_name'];
							$nom_nominee_relationship =get_relation($fetch_nominee['nom_rel']);
							$nom_other_relationship = $fetch_nominee['nom_otherrel'];
							$nom_percentage = $fetch_nominee['nom_per'];
							$nom_maritial_status = $fetch_nominee['nom_status'];
							$nom_age1 = $fetch_nominee['nom_age'];
							$nom_dob = $fetch_nominee['nom_dob'];
							$nom_nominee_address = $fetch_nominee['nom_address'];
							$nom_panno= $fetch_nominee['nom_panno'];					
							$nom_contingencies = $fetch_nominee['nom_conti'];
							$nom_address= $fetch_nominee['nom_address'];
							$nom_aadhar= $fetch_nominee['nom_aadhar']; 
							$nom_person_relation_detail = $fetch_nominee['nom_subscriber'];
							
						}
					*/
				//awards query
				dbcon1();
					$sql=mysql_query("select * from  award_temp where awd_pf_number='$pf_no'");
					if($sql){
						while($fetch_sql=mysql_fetch_array($sql))
						{
							$awd_pf_number = $fetch_sql['awd_pf_number'];
							$awd_award_date	 = $fetch_sql['awd_date'];
							$awd_awarded_by = $fetch_sql['awd_by'];
							$awd_award_type = got_award($fetch_sql['awd_type']);
							$awd_other_award = $fetch_sql['awd_other'];
							$awd_award_detail = $fetch_sql['awd_detail'];
						}
					}

				//advance query
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
							}
						}








/*


			//property query
			$sql=mysql_query("select * from  property_temp where pro_pf_number='$pf_no'");
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
					  $pf_no = $fetch_sql['pro_pf_number'];
					  $property_type=$fetch_sql['pro_type'];
					  $item= $fetch_sql['pro_item'];
					  $other_item = $fetch_sql['pro_otheritem'];
					  $make_modal = $fetch_sql['pro_make'];
					  $dop = $fetch_sql['pro_dop'];
					  $location = $fetch_sql['pro_location'];
					  $reg_no = $fetch_sql['pro_regno'];
					  $area = $fetch_sql['pro_area'];
					  $survey_number = $fetch_sql['pro_surveyno'];
					  $tot_cost = $fetch_sql['pro_cost'];
					  $source = $fetch_sql['pro_source'];
					  $source_type = get_property_source($fetch_sql['pro_sourcetype']);
					  $amount = $fetch_sql['pro_amount'];
					  $letter_number = $fetch_sql['pro_letterno'];
					  $letter_date = $fetch_sql['pro_letterdate'];
					  $remark = $fetch_sql['pro_remark'];
					}
				  }*/
				//Penalty fetch query
				 //Umesh Code Here
				 dbcon1();
				  $query=mysql_query("Select * from penalty_temp where pen_pf_number='$pf_no'");
					 while($result=mysql_fetch_assoc($query))
					 {
						 $pen_pf_number=$result['pen_pf_number'];
						 $pen_type=$result['pen_type'];
						 $pen_letter_number=$result['pen_issued'];
						 $pen_letter_date=$result['pen_effetcted'];
						 $pen_charge_sheet_status=$result['pen_letterno'];
						 $pen_penalty_awarded=$result['pen_letterdate'];
						 $pen_penalty_effected=$result['pen_chargestatus'];
						 $pen_chargeref=$result['pen_chargeref'];
						 $pen_from_date=$result['pen_from'];
						 $pen_to_date=$result['pen_to'];
						 $pen_remark=$result['pen_remark']; 
					 }
		
		//increment query	
			$sql=mysql_query("select * from  increment_track where incr_pf_number='$pf_no' ORDER BY ID DESC");
		//	echo"select * from  increment_track where incr_pf_number='$pf_no' ORDER BY id DESC".mysql_error();
			$data=[];
			$cnt='0';
			$i='0';
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						$cnt++;
					}
				//	echo"<script>alert($cnt);</script>";
					print_r($data);
					if($cnt>1)
					{
						$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['final_transaction_id']!=$data[$i]['final_transaction_id'])
					{
						$inc_transc_id=$data[$i]['final_transaction_id'];
					
						$temp--;
						$i--;	
					}
					else if($data[$temp]['final_transaction_id']==$data[$i]['final_transaction_id'])
					{
						$inc_transc_id=$data[$i]['final_transaction_id'];
					
						$temp--;
						$i--;	
					}
						$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['date_time']!=$data[$i]['date_time'])
					{
						$inc_updated_date1=$data[$i]['date_time'];
						$inc_updated_date=date('d-m-Y',strtotime($inc_updated_date1));
						$temp--;
						$i--;	
					}
					else if($data[$temp]['date_time']==$data[$i]['date_time'])
					{
						$inc_updated_date1=$data[$i]['date_time'];
						$inc_updated_date=date('d-m-Y',strtotime($inc_updated_date1));
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
	
					if($data[$temp]['incr_pf_number']!=$data[$i]['incr_pf_number'])
					{
			
						$inc_pf_number=$data[$i]['incr_pf_number'].' <span style="margin-left:6px; color:blue;" val="incr_pf_number" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					//		echo" <script>alert('updated')</script>";
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else if($data[$temp]['incr_pf_number']==$data[$i]['incr_pf_number'])
					{
			
						$inc_pf_number=$data[$i]['incr_pf_number'];
						$temp--;
						$i--;	
					//		echo" <script>alert('updated')</script>";
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_date']!=$data[$i]['incr_date'])
					{
						$inc_increment_date1=$data[$i]['incr_date'];
						$inc_increment_date=date('d-m-Y',strtotime($inc_increment_date1)).' <span style="margin-left:6px; color:blue;" val="incr_date" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_date']==$data[$i]['incr_date'])
					{
						$inc_increment_date1=$data[$i]['incr_date'];
						$inc_increment_date=date('d-m-y',strtotime($inc_increment_date1));
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_type']!=$data[$i]['incr_type'])
					{
						$inc_increment_type=$data[$i]['incr_type'].' <span style="margin-left:6px; color:blue;" val="incr_type" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_type']==$data[$i]['incr_type'])
					{
						$inc_increment_type=$data[$i]['incr_type'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['ps_type']!=$data[$i]['ps_type'])
					{
						$inc_ps_type=$data[$i]['ps_type'].'<span style="margin-left:6px; color:blue;" val="ps_type" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['ps_type']==$data[$i]['ps_type'])
					{
						$inc_ps_type=$data[$i]['ps_type'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_scale']!=$data[$i]['incr_scale'])
					{
						$inc_scale=$data[$i]['incr_scale'].'<span style="margin-left:6px; color:blue;" val="incr_scale" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_scale']==$data[$i]['incr_scale'])
					{
						$inc_scale=$data[$i]['incr_scale'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_level']!=$data[$i]['incr_level'])
					{
						$inc_level=$data[$i]['incr_level'].'<span style="margin-left:6px; color:blue;" val="incr_level" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_level']==$data[$i]['incr_level'])
					{
						$inc_level=$data[$i]['incr_level'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_oldrop']!=$data[$i]['incr_oldrop'])
					{
						$inc_old_rop=$data[$i]['incr_oldrop'].'<span style="margin-left:6px; color:blue;" val="incr_oldrop" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_oldrop']==$data[$i]['incr_oldrop'])
					{
						$inc_old_rop=$data[$i]['incr_oldrop'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_rop']!=$data[$i]['incr_rop'])
					{
						$inc_rop=$data[$i]['incr_rop'].'<span style="margin-left:6px; color:blue;" val="incr_rop" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_rop']==$data[$i]['incr_rop'])
					{
						$inc_rop=$data[$i]['incr_rop'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_personel']!=$data[$i]['incr_personel'])
					{
						$inc_personal_pay=$data[$i]['incr_personel'].'<span style="margin-left:6px; color:blue;" val="incr_personel" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_personel']==$data[$i]['incr_personel'])
					{
						$inc_personal_pay=$data[$i]['incr_personel'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_special']!=$data[$i]['incr_special'])
					{
						$inc_special_pay=$data[$i]['incr_special'].'<span style="margin-left:6px; color:blue;" val="incr_special" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_special']==$data[$i]['incr_special'])
					{
						$inc_special_pay=$data[$i]['incr_special'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_nextdate']!=$data[$i]['incr_nextdate'])
					{
						$inc_next_incr_date1=$data[$i]['incr_nextdate'];
						$inc_next_incr_date=date('d-m-Y',strtotime($inc_next_incr_date1)).'<span style="margin-left:6px; color:blue;" val="incr_nextdate" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_nextdate']==$data[$i]['incr_nextdate'])
					{
						$inc_next_incr_date=$data[$i]['incr_nextdate'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['incr_remark']!=$data[$i]['incr_remark'])
					{
						$inc_remark=$data[$i]['incr_remark'].'<span style="margin-left:6px; color:blue;" val="incr_remark" data-toggle="modal" tbl_name="increment_track" col_nm="incr_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['incr_remark']==$data[$i]['incr_remark'])
					{
						$inc_remark=$data[$i]['incr_remark'];
						$temp--;
						$i--;	
					}
					}
					else
					{
						$sql=mysql_query("select * from  increment_track where incr_pf_number='$pf_no' order by id desc limit 1");
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
						$inc_transc_id=$fetch_sql['final_transaction_id'];
						$inc_updated_date1=$fetch_sql['date_time'];
					    $inc_updated_date=date('d-m-Y',strtotime($inc_updated_date1));
						$inc_pf_number = $fetch_sql['incr_pf_number'];
						$inc_increment_type=$fetch_sql['incr_type'];
						$inc_increment_date= $fetch_sql['incr_date'];
						$inc_scale = $fetch_sql['incr_scale'];
						$inc_level = $fetch_sql['incr_level'];
						$inc_old_rop = $fetch_sql['incr_oldrop'];
						$inc_rop = $fetch_sql['incr_rop'];
						$inc_personal_pay = $fetch_sql['incr_personel'];
						$inc_special_pay = $fetch_sql['incr_special'];
						$inc_next_incr_date = $fetch_sql['incr_nextdate'];
						$inc_remark = $fetch_sql['incr_remark'];	
					}
				}
					}
				}




//property
$sql=mysql_query("select * from  property_track where pro_pf_number='$pf_no' ORDER BY ID DESC");
		//	echo"select * from  property_track where pro_pf_number='$pf_no' ORDER BY id DESC".mysql_error();
			$data=[];
			$cnt='0';
			$i='0';
				if($sql)
				{
					while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						$cnt++;
					}
				//echo"<script>alert($cnt);</script>";
					//print_r($data);
					if($cnt>1)
				{
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['final_transaction_id']!=$data[$i]['final_transaction_id'])
					{
						$pro_transc_id=$data[$i]['final_transaction_id'];
					
						$temp--;
						$i--;	
					}
					else if($data[$temp]['final_transaction_id']==$data[$i]['final_transaction_id'])
					{
						$pro_transc_id=$data[$i]['final_transaction_id'];
					
						$temp--;
						$i--;	
					}
						$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['date_time']!=$data[$i]['date_time'])
					{
						$pro_updated_date1=$data[$i]['date_time'];
						$pro_updated_date=date('d-m-Y',strtotime($pro_updated_date1));
						$temp--;
						$i--;	
					}
					else if($data[$temp]['date_time']==$data[$i]['date_time'])
					{
						$pro_updated_date1=$data[$i]['date_time'];
						$pro_updated_date=date('d-m-Y',strtotime($pro_updated_date1));
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
				
					if($data[$temp]['pro_pf_number']!=$data[$i]['pro_pf_number'])
					{
			
						$pf_no=$data[$i]['pro_pf_number'].' <span style="margin-left:6px; color:blue;" val="pro_pf_number" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					//		echo" <script>alert('updated')</script>";
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else if($data[$temp]['pro_pf_number']==$data[$i]['pro_pf_number'])
					{
			
						$pf_no=$data[$i]['pro_pf_number'];
						$temp--;
						$i--;	
					//		echo" <script>alert('updated')</script>";
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_type']!=$data[$i]['pro_type'])
					{
						$property_type=$data[$i]['pro_type'].' <span style="margin-left:6px; color:blue;" val="pro_type" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';;
			
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_type']==$data[$i]['pro_type'])
					{
						$property_type=$data[$i]['pro_type'];
				
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_item']!=$data[$i]['pro_item'])
					{
						$item=$data[$i]['pro_item'].' <span style="margin-left:6px; color:blue;" val="pro_item" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_item']==$data[$i]['pro_item'])
					{
						$item=$data[$i]['pro_item'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_otheritem']!=$data[$i]['pro_otheritem'])
					{
						$other_item=$data[$i]['pro_otheritem'].'<span style="margin-left:6px; color:blue;" val="pro_otheritem" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_otheritem']==$data[$i]['pro_otheritem'])
					{
						$other_item=$data[$i]['pro_otheritem'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_make']!=$data[$i]['pro_make'])
					{
						$make_modal=$data[$i]['pro_make'].'<span style="margin-left:6px; color:blue;" val="pro_make" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_open"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_make']==$data[$i]['pro_make'])
					{
						$make_modal=$data[$i]['pro_make'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_dop']!=$data[$i]['pro_dop'])
					{
						$dop1=$data[$i]['pro_dop'];
						$dop=date('d-m-Y',strtotime($dop1)).'<span style="margin-left:6px; color:blue;" val="pro_dop" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_dop']==$data[$i]['pro_dop'])
					{
						$dop1=$data[$i]['pro_dop'];
						$dop=date('d-m-Y',strtotime($dop1)).'<span style="margin-left:6px; color:blue;" val="pro_dop" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_location']!=$data[$i]['pro_location'])
					{
						$location=$data[$i]['pro_location'].'<span style="margin-left:6px; color:blue;" val="pro_location" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_location']==$data[$i]['pro_location'])
					{
						$location=$data[$i]['pro_location'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_regno']!=$data[$i]['pro_regno'])
					{
						$reg_no=$data[$i]['pro_regno'].'<span style="margin-left:6px; color:blue;" val="pro_regno" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_regno']==$data[$i]['pro_regno'])
					{
						$reg_no=$data[$i]['pro_regno'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_area']!=$data[$i]['pro_area'])
					{
						$area=$data[$i]['pro_area'].'<span style="margin-left:6px; color:blue;" val="pro_area" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_area']==$data[$i]['pro_area'])
					{
						$area=$data[$i]['pro_area'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_surveyno']!=$data[$i]['pro_surveyno'])
					{
						$survey_number=$data[$i]['pro_surveyno'].'<span style="margin-left:6px; color:blue;" val="pro_surveyno" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_surveyno']==$data[$i]['pro_surveyno'])
					{
						$survey_number=$data[$i]['pro_surveyno'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_cost']!=$data[$i]['pro_cost'])
					{
						$tot_cost=$data[$i]['pro_cost'].'<span style="margin-left:6px; color:blue;" val="pro_cost" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_cost']==$data[$i]['pro_cost'])
					{
						$tot_cost=$data[$i]['pro_cost'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_source']!=$data[$i]['pro_source'])
					{
						$source=$data[$i]['pro_source'].'<span style="margin-left:6px; color:blue;" val="pro_source" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_source']==$data[$i]['pro_source'])
					{
						$source=$data[$i]['pro_source'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_sourcetype']!=$data[$i]['pro_sourcetype'])
					{
						$source_type=get_property_source($data[$i]['pro_sourcetype']).'<span style="margin-left:6px; color:blue;" val="pro_sourcetype" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_sourcetype']==$data[$i]['pro_sourcetype'])
					{
						$source_type=$data[$i]['pro_sourcetype'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_amount']!=$data[$i]['pro_amount'])
					{
						$amount=$data[$i]['pro_amount'].'<span style="margin-left:6px; color:blue;" val="pro_amount" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_amount']==$data[$i]['pro_amount'])
					{
						$amount=$data[$i]['pro_amount'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_letterno']!=$data[$i]['pro_letterno'])
					{
						$letter_number=$data[$i]['pro_letterno'].'<span style="margin-left:6px; color:blue;" val="pro_letterno" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_letterno']==$data[$i]['pro_letterno'])
					{
						$letter_number=$data[$i]['pro_letterno'];
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_letterdate']!=$data[$i]['pro_letterdate'])
					{
						$letter_dates1=$data[$i]['pro_letterdate'];
						$letter_dates=date('d-m-Y',strtotime($letter_dates1)).'<span style="margin-left:6px; color:blue;" val="pro_letterdate" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
					
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_letterdate']==$data[$i]['pro_letterdate'])
					{
						$letter_dates1=$data[$i]['pro_letterdate'];
						$letter_dates=date('d-m-Y',strtotime($letter_dates1));
					
						$temp--;
						$i--;	
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pro_remark']!=$data[$i]['pro_remark'])
					{
						$remark=$data[$i]['pro_remark'].'<span style="margin-left:6px; color:blue;" val="pro_remark" data-toggle="modal" tbl_name="property_track" col_nm="pro_pf_number" data-target="#delete" class="fa fa-edit click_pro"></span>';
						$temp--;
						$i--;	
					}
					else if($data[$temp]['pro_remark']==$data[$i]['pro_remark'])
					{
						$remark=$data[$i]['pro_remark'];
						$temp--;
						$i--;	
					}
					
				}
				else
				{
					$sql=mysql_query("select * from  property_track where pro_pf_number='$pf_no' ORDER BY ID DESC LIMIT 1");
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
					  $pro_transc_id=$fetch_sql['final_transaction_id'];
					  $pro_updated_date1=$fetch_sql['date_time'];
					  $pro_updated_date=date('d-m-Y',strtotime($pro_updated_date1));
					  $pf_no = $fetch_sql['pro_pf_number'];
					  $property_type=$fetch_sql['pro_type'];
					  $item= $fetch_sql['pro_item'];
					  $other_item = $fetch_sql['pro_otheritem'];
					  $make_modal = $fetch_sql['pro_make'];
					 
					  $dop1=$fetch_sql['pro_dop'];
						$dop=date('d-m-Y',strtotime($dop1));
					  $location = $fetch_sql['pro_location'];
					  $reg_no = $fetch_sql['pro_regno'];
					  $area = $fetch_sql['pro_area'];
					  $survey_number = $fetch_sql['pro_surveyno'];
					  $tot_cost = $fetch_sql['pro_cost'];
					  $source = $fetch_sql['pro_source'];
					  $source_type = get_property_source($fetch_sql['pro_sourcetype']);
					  $amount = $fetch_sql['pro_amount'];
					  $letter_number = $fetch_sql['pro_letterno'];
					  $letter_date1 = $fetch_sql['pro_letterdate'];
					  $letter_dates=date('d-m-Y',strtotime($letter_date1));
					  $remark = $fetch_sql['pro_remark'];
					}
				  }
				}
			}











	//Training query
		$nominee=mysql_query("select * from  training_temp where pf_number='$pf_no'");
			while($fetch_nominee=mysql_fetch_array($nominee))
			{
				
				$tra_pf_number=$fetch_nominee['pf_number'];
				$tra_training_status = $fetch_nominee['training_type'];
				$tra_last_date	 = $fetch_nominee['last_date'];
				$tra_due_date = $fetch_nominee['due_date'];
				$tra_training_from = $fetch_nominee['training_from'];
				$tra_training_to = $fetch_nominee['letter_date'];
			    $tra_description  = $fetch_nominee['description'];
				$tra_letter_number  = $fetch_nominee['letter_no'];
				$tra_letter_date  = $fetch_nominee['letter_date'];
				$tra_remark = $fetch_nominee['remarks'];
				
			} 
			
			//Last Entry query
				dbcon1();
				$pf_no=$_GET['pf'];
				
					$query=mysql_query("Select * from lastentry_temp where pf_number='$pf_no' ");
					
					 while($result=mysql_fetch_assoc($query))
					    {
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
				        }
						
						//Prft promotion Code Start
						
						/* $pf_no=$_GET['pf'];
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
							$pro_to_rop=$result['pro_to_rop'];
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
				        }*/
	?>
				
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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
					<li class=""><a href="#leave" data-toggle="tab"><b>Leave & Encashment</b></a></li>
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
				<input type="hidden" name="hidden_pfno" value="<?php echo $pf_no; ?>" id="hidden_pfno"/>
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr>
							<td colspan="5"></td>
							<td style="width:10%"> <img id="blah" src="upload_doc/<?php echo $imagefile;?>" width ="200px" height="200px"/></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $pf_number ?></label></td>
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
							<td colspan="3"><label class="control-label labelhdata"><?php echo $recruit_code; ?></label></td><td><label class="control-label labelhed" >Group</label></td>
							<td colspan="2"><label class="control-label labelhdata"><?php echo $group_col; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Education Qualification at the time of Initial Appointment</label></td>
							<td colspan="3"><label class="control-label labelhdata"><?php echo $education_ini; ?></label></td><td><label class="control-label labelhed" >Education Qualification at the time of Subsequent</label></td>
							<td colspan="2"><label class="control-label labelhdata"><?php echo $education_sub; ?></label></td>
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
			<a href="#" class="btn btn-primary back_btn">Back</a>
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
						echo "<td>".$result['medi_cate']."</td>";
						echo "<td>".$result['medi_class']."</td>";
						echo "<td>".$result['medi_certino']."</td>";
						echo "<td>".$result['medi_certidate']."</td>";
						echo "<td>
								<a value='".$result['id']."' class='btn btn-primary update_btn' href='medical_detail.php?pf=$pf_no'>View</a>
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
				<a href="#" class="btn btn-primary back_btn">Back</a>
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
							<td><label class="labelhdata labelhdata"><?php echo $app_department; ?></label></td>
							<td><label class="control-label labelhed" >Designation<span class=""></span></label></td>
							<td><label class="labelhdata labelhdata"><?php echo $app_department; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Appointment Date</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_date; ?></label></td>
							<td><label class="control-label labelhed" >Regularisation Date</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_regul_date; ?></label></td>
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
							<td colspan="5"><label class="control-label labelhdata"><?php echo $app_station; ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >ROP</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $app_rop; ?></label></td>
						</tr>
						<tr>	
							<td><label class="control-label labelhed" >Workplace</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_depot; ?></label></td>
							<td><label class="control-label labelhed" >Appointment Reference Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_refno; ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Appointment Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_letter_date; ?></label></td>
							<td><label class="control-label labelhed" >Remark</label></td>
							<td><label class="control-label labelhdata"><?php echo $app_remark; ?></label></td>
						</tr>					
					</tbody>
				</table>
			</div>
			<div class="pull-right col-md-7 col-sm-12 col-xs-12">
				<a href="#" class="btn btn-primary back_btn">Back</a>
			</div>						 
    </div>
 <div class="tab-pane" id="present_appointment">
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
higher grade than substansive grade?<span class=""></span></label></td>
							<td><label class="labelhdata"><?php echo $pre_app_designation ?></label></td>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="labelhdata"><?php echo $pre_app_billunit ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_scale ?></label></td>
							<td><label class="control-label labelhed" >Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_scale ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_level ?></label></td>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_group_col ?></label></td>
							
						</tr>
						<tr>
						<td><label class="control-label labelhed" >Depot/Workplace</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_depot ?></label></td>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $pre_app_station ?></label></td>
							
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
higher grade than substansive grade?<span class=""></span></label></td>
							<td colspan="5"><label class="labelhdata"><?php echo $sgd_dropdwn ?></label></td>
							
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
				<a href="sr_view.php" class="btn btn-primary">Back</a>
			</div>					 
      </div>
	<!---- PRTF DEtails----->			 
	<!---- PRTF DEtails----->			 
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
                  <th>PF No</th>
                  <th>Order Type</th>
                  <th>Transaction Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$cnt_pr=1;
					$sql=mysql_query("select * from  prft_promotion_temp where pro_pf_no='$pf_no'");
					while($result=mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>$cnt_pr</td>";
						echo "<td>".$result['pro_pf_no']."</td>";
						echo "<td>".$result['pro_order_type']."</td>";
						echo "<td>".$result['temp_transaction_id']."</td>";
						echo "<td><a href='prft_show_promotion.php?pf_no=$pf_no' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
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
			<a href="sr_view.php" class="btn btn-primary">Back</a>
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
                  <th>PF No</th>
                  <th>Order Type</th>
                  <th>Transaction Id</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$cnt_rv=1;
					$sql=mysql_query("select * from   prft_reversion_temp where rev_pf_no='$pf_no'");
					while($result=mysql_fetch_array($sql)){
						echo "<tr>";
						echo "<td>$cnt_rv</td>";
						echo "<td>".$result['rev_pf_no']."</td>";
						echo "<td>".$result['rev_order_type']."</td>";
						echo "<td>".$result['temp_transaction_id']."</td>";
						echo "<td><a href='prft_show_reversion.php?pf_no=$pf_no' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
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
			<a href="sr_view.php" class="btn btn-primary">Back</a>
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
                   <th>PF No</th>
                  <th>Order Type</th>
                  <th>Transaction ID</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		<?php
						$cnt_tr=1;
						$sql=mysql_query("select * from prft_transfer_temp where trans_pf_no='$pf_no'");
						while($result=mysql_fetch_array($sql)){
							echo "<tr>";
							echo "<td>$cnt_tr</td>";
							echo "<td>".$result['trans_pf_no']."</td>";
							echo "<td>".$result['trans_order_type']."</td>";
							echo "<td>".$result['temp_transaction_id']."</td>";
							echo "<td><a href='prft_show_transfer.php?pf_no=$pf_no' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
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
			<a href="sr_view.php" class="btn btn-primary">Back</a>
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
                  <th>Order Type</th>
                  <th>Last updated Date</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
              		<?php
						$cnt_fx=1;
						$sql=mysql_query("select * from prft_fixation_temp where fix_pf_no='$pf_no'");
						while($result=mysql_fetch_array($sql)){
							echo "<tr>";
							echo "<td>$cnt_fx</td>";
							echo "<td>".$result['fix_pf_no']."</td>";
							echo "<td>".$result['fix_order_type']."</td>";
							echo "<td>".$result['temp_transaction_id']."</td>";
							echo "<td><a href='prft_show_fixaction.php?pf_no=$pf_no' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
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
			<a href="sr_view.php" class="btn btn-primary">Back</a>
		</div>						 
    </div> 
<?php



dbcon1();
				$sql=mysql_query("select * from  penalty_track where pen_pf_number='$pf_no' ORDER BY ID DESC");
		
			$data=[];
			$cnt='0';
			$i='0';
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						$cnt++;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
	                if($cnt>1)
					{
					if($data[$temp]['final_transaction_id']!=$data[$i]['final_transaction_id'])
					{
			
							$pen_final_transaction_id=$data[$i]['final_transaction_id'].'<span style="margin-left:6px;" val="final_transaction_id" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
							$temp--;
							$i--;	
							
							
					}
					else if($data[$temp]['final_transaction_id']==$data[$i]['final_transaction_id'])
					{
						$pen_final_transaction_id=$data[$i]['final_transaction_id'];
							$temp--;
							$i--;
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_pf_number']!=$data[$i]['pen_pf_number'])
					{
			
						$pen_pf_number=$data[$i]['pen_pf_number'].'<span style="margin-left:6px;" val="pen_pf_number" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
							$temp--;
							$i--;	
							
					}
					else if($data[$temp]['pen_pf_number']==$data[$i]['pen_pf_number'])
					{
						$pen_pf_number=$data[$i]['pen_pf_number'];
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_type']!=$data[$i]['pen_type'])
					{
			
						$pen_type=$data[$i]['pen_type'].'<span style="margin-left:6px;" val="pen_type" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
					}
					else if($data[$temp]['pen_type']==$data[$i]['pen_type'])
					{
						$pen_type=$data[$i]['pen_type'];
						
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_issued']!=$data[$i]['pen_issued'])
					{
			
						$pen_issued1=$data[$i]['pen_issued'];
							$pen_issued=date('d-m-Y',strtotime($pen_issued1)).'<span style="margin-left:6px;" val="pen_issued" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
					}
					else if($data[$temp]['pen_issued']==$data[$i]['pen_issued'])
					{
						$pen_issued1=$data[$i]['pen_issued'];
					    $pen_issued=date('d-m-Y',strtotime($pen_issued1));
							$temp--;
							$i--;
					}
				
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_effetcted']!=$data[$i]['pen_effetcted'])
					{
			
						$pen_effetcted1=$data[$i]['pen_effetcted'];
						$pen_effetcted=date('d-m-Y',strtotime($pen_effetcted1)).'<span style="margin-left:6px;" val="pen_effetcted" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['pen_effetcted']==$data[$i]['pen_effetcted'])
					{
						$pen_effetcted1=$data[$i]['pen_effetcted'];
						$pen_effetcted=date('d-m-Y',strtotime($pen_effetcted1));
						
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_letterno']!=$data[$i]['pen_letterno'])
					{
			
						$pen_letterno=$data[$i]['pen_letterno'].'<span style="margin-left:6px;" val="pen_letterno" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
					
							$temp--;
							$i--;	
							
					}
					else if($data[$temp]['pen_letterno']==$data[$i]['pen_letterno'])
					{
						$pen_letterno=$data[$i]['pen_letterno'];
							
						
							$temp--;
							$i--;	
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_letterdate']!=$data[$i]['pen_letterdate'])
					{
			
						$pen_letterdate1=$data[$i]['pen_letterdate'];
						$pen_letterdate=date('d-m-Y',strtotime($pen_letterdate1)).'<span style="margin-left:6px;" val="pen_letterdate" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['pen_letterdate']==$data[$i]['pen_letterdate'])
					{
						$pen_letterdate1=$data[$i]['pen_letterdate'];
						$pen_letterdate=date('d-m-Y',strtotime($pen_letterdate1));
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_chargestatus']!=$data[$i]['pen_chargestatus'])
					{
			
						$pen_chargestatus=$data[$i]['pen_chargestatus'].'<span style="margin-left:6px;" val="pen_chargestatus" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
					
						
						
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['pen_chargestatus']==$data[$i]['pen_chargestatus'])
					{
						$pen_chargestatus=$data[$i]['pen_chargestatus'];
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_chargeref']!=$data[$i]['pen_chargeref'])
					{
			
						$pen_chargeref=$data[$i]['pen_chargeref'].'<span style="margin-left:6px;" val="pen_chargeref" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['pen_chargeref']==$data[$i]['pen_chargeref'])
					{
						$pen_chargeref=$data[$i]['pen_chargeref'];
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_from']!=$data[$i]['pen_from'])
					{
			
						$pen_from1=$data[$i]['pen_from'];
						
				$pen_from=date('d-m-Y',strtotime($pen_from1)).'<span style="margin-left:6px;" val="pen_from" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['pen_from']==$data[$i]['pen_from'])
					{
						$pen_from1=$data[$i]['pen_from'];
						$pen_from=date('d-m-Y',strtotime($pen_from1)).
							$temp--;
							$i--;
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_to']!=$data[$i]['pen_to'])
					{
			
						$pen_to1=$data[$i]['pen_to'];
						$pen_to=date('d-m-Y',strtotime($pen_to1)).'<span style="margin-left:6px;" val="pen_to" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['pen_to']==$data[$i]['pen_to'])
					{
						$pen_to1=$data[$i]['pen_to'];
						$pen_to=date('d-m-Y',strtotime($pen_to1));
							$temp--;
							$i--;
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['pen_remark']!=$data[$i]['pen_remark'])
					{
			
						$pen_remark=$data[$i]['pen_remark'].'<span style="margin-left:6px;" val="pen_remark" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['pen_remark']==$data[$i]['pen_remark'])
					{
						$pen_remark=$data[$i]['pen_remark'];
							$temp--;
							$i--;
					}
					$temp=$cnt-1;
					$i=$temp-1;
					
					if($data[$temp]['date_time']!=$data[$i]['date_time'])
					{
			
						$date_time=$data[$i]['date_time'];
							$pen_update_Date=date('d-m-Y',strtotime($date_time)).'<span style="margin-left:6px;" val="date_time" data-toggle="modal" tbl_name="penalty_track" col_nm="pen_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
						
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['date_time']==$data[$i]['date_time'])
					{
						$date_time=$data[$i]['date_time'];
						$pen_update_Date=date('d-m-y',strtotime($date_time));
							$temp--;
							$i--;
					}
					
				}
				}
				else{
					
					 dbcon1();
				  $query=mysql_query("Select * from penalty_track where pen_pf_number='$pf_no'");
					 $result=mysql_fetch_assoc($query);
					 
						 $pen_final_transaction_id=$result['final_transaction_id'];
						 $pen_pf_number=$result['pen_pf_number'];
						 $pen_type=$result['pen_type'];
						 
						 $pen_issued1=$result['pen_issued'];
						 $pen_issued=date('d-m-Y',strtotime($pen_issued1));
						 
						 $pen_effetcted=$result['pen_effetcted'];
						 $pen_letterno=$result['pen_letterno'];
						 $pen_letterdate1=$result['pen_letterdate'];
						 
						 $pen_letterdate=date('d-m-Y',strtotime($pen_letterdate1));
						 $pen_chargestatus=$result['pen_chargestatus'];
						 $pen_chargeref=$result['pen_chargeref'];
						 
						 $pen_from1=$result['pen_from'];
						 $pen_from=date('d-m-Y',strtotime($pen_from1));
						 
						 $pen_to1=$result['pen_to'];
						  $pen_to=date('d-m-Y',strtotime($pen_to1));
						  
						 $pen_remark=$result['pen_remark']; 
						 
						 $date_time=$result['date_time']; 
						 $pen_update_Date=date('d-m-Y',strtotime($date_time));	
				}		
		?>
<!--Penalty Tab Start -->
	<div class="tab-pane" id="penalty">
		<div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Penalty Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
			<div class="row">
	<div class="col-sm-6 col-md-6">
	<label class="control-label labelhed" style="float:left;">Transaction Id:&nbsp;<?php echo $pen_final_transaction_id; ?>
	</div>
	<div class="col-sm-6 col">
		<label class="control-label labelhed" style="float:right;">Last Update:&nbsp;<?php echo $pen_update_Date; ?>	</div>
	</div>
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $pen_pf_number;?></label></td>
						<td><label class="control-label labelhed" >Penalty Type</label></td>
						<td><label class="labelhdata labelhdata"><?php echo $pen_type;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Penalty Issued</label></td>
						<td><label class="control-label labelhdata"><?php echo $pen_issued;?></label></td>
						<td><label class="control-label labelhed" >Penalty Effected</label></td>
						<td><label class="control-label labelhdata"><?php echo $pen_effetcted;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata"><?php echo $pen_letterno;?></label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata"><?php echo $pen_letterdate;?></label></td>
					</tr>	
					<tr>
						<td><label class="control-label labelhed" >ChargeSheet Status</label></td>
						<td><label class="control-label labelhdata"><?php echo $pen_chargestatus;?></label></td>
						<td><label class="control-label labelhed" >ChargeSheet Reference Number </label></td>
						<td><label class="control-label labelhdata"><?php echo $pen_chargeref;?></label></td>
					</tr>	
					<tr>
						<td><label class="control-label labelhed" >From Date</label></td>
						<td><label class="control-label labelhdata"><?php echo $pen_from;?></label></td>
						<td><label class="control-label labelhed" >To Date</label></td>
						<td><label class="control-label labelhdata"><?php echo $pen_to;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Remarks</label></td>
						<td colspan="5"><label class="control-label labelhdata"><?php echo $pen_remark; ?></label></td>
						
					</tr>	
				</tbody>
			</table>
		</div>
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<a href="#" class="btn btn-primary back_btn">Back</a>
		</div>
    </div>
	<!--Penalty Tab End -->
	<!--Increment tab begins -->
<div class="tab-pane" id="increment">
	<div class="table-responsive" style="padding:20px;">
	<h3 >&nbsp;&nbsp;Increment Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
	<div class="container">
		<div class="row">
			<div class="col-sm-4" style="font-size:15px; font-weight:400px;">Transaction ID:<b><?php echo $inc_transc_id; ?></b></div>
				<div class="col-sm-4"></div>
					<div class="col-sm-4"style="font-size:15px; font-weight:400px;">Updated Date:<b><?php echo $inc_updated_date; ?></b></div>
		</div>
	</div>
	<table border="1" class="table table-bordered"  style="width:100%">
		<tbody>
			<tr>
				<td><label class="control-label labelhed " >PF No</label></td>
				<td> <label class="control-label labelhdata"><?php echo $inc_pf_number ?></label></td>
				<td><label class="control-label labelhed" >Pay Scale type</label></td>
				<td><label class="labelhdata labelhdata"><?php echo $inc_ps_type;?></label></td>
				
			</tr>
			<tr>
				<td><label class="control-label labelhed" >Increment type</label></td>
				<td><label class="labelhdata labelhdata"><?php echo $inc_increment_type;?></label></td>
				<td><label class="control-label labelhed" >Increment Date</label></td>
				<td><label class="labelhdata labelhdata"><?php echo $inc_increment_date;?></label></td>
				
			</tr>
			<tr>
				<td><label class="control-label labelhed" >Scale</label></td>
				<td><label class="control-label labelhdata"><?php echo $inc_scale;?></label></td>
				<td><label class="control-label labelhed" >Level</label></td>
				<td><label class="control-label labelhdata"><?php echo $inc_level;?></label></td>
				
			</tr>
			<tr>
				<td><label class="control-label labelhed" >Old Rate Of Pay</label></td>
				<td><label class="control-label labelhdata"><?php echo $inc_old_rop;?></label></td>
				<td><label class="control-label labelhed" >Rate Of Pay</label></td>
				<td><label class="control-label labelhdata"><?php echo $inc_rop ?></label></td>
				
			</tr>
			<tr>
				<td><label class="control-label labelhed" >Personal Pay</label></td>
				<td><label class="control-label labelhdata"><?php echo $inc_personal_pay;?></label></td>
				<td><label class="control-label labelhed" >Special Pay</label></td>
				<td><label class="control-label labelhdata"><?php echo $inc_special_pay;?></label></td>
				
			</tr>
			<tr>
				<td><label class="control-label labelhed" >Next Increment</label></td>
				<td><label class="control-label labelhdata"><?php echo $inc_next_incr_date;?></label></td>
			</tr>
			<tr>
				<td><label class="control-label labelhed" >Remark</label></td>
				<td colspan="4"><label class="control-label labelhdata" ><?php echo $inc_remark;?></label></td>
			</tr>
		</tbody>
	</table>
</div>
<div class="pull-right col-md-7 col-sm-12 col-xs-12">
	<a href="#" class="btn btn-primary back_btn">Back</a>
</div>
</div>


	

<!---- advance details---->
<?php
dbcon1();
				$sql=mysql_query("select * from  advance_track where adv_pf_number='$pf_no'");
				if($sql){
					echo'   <div class="tab-pane" id="advance">';
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
									$tid=$fetch_sql['final_transaction_id'];
									$up_date=$fetch_sql['date_time'];
									$newDate = date("d-m-Y", strtotime($up_date));
							
						




 
	echo'<h3>&nbsp;&nbsp;Adavance Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
		<div class="table-responsive" style="padding:20px;">
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata">'.$pf_no.'</label></td>
						<td><label class="control-label labelhed" >Advances Type</label></td>
						<td><label class="labelhdata labelhdata">'.$advance_type.'</label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Letter No</label></td>
						<td><label class="control-label labelhdata">'.$letter_number.'</label></td>
						<td><label class="control-label labelhed" >Letter Date</label></td>
						<td><label class="control-label labelhdata">'.$letter_date.'</label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >WEF Date</label></td>
						<td><label class="control-label labelhdata">'.$wef_date .'</label></td>
						<td><label class="control-label labelhed" >Amount</label></td>
						<td><label class="control-label labelhdata">'.$amount .'</label></td>
					</tr>

					<tr>
						<td colspan="6"><label class="control-label labelhed" ><b>Recovery Details</b></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Total Principle Amount</label></td>
						<td><label class="control-label labelhdata">'.$tot_amt .'</label></td>
						<td><label class="control-label labelhed" >Total Interest</label></td>
						<td><label class="control-label labelhdata">'.$interest.'</label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >From Date</label></td>
						<td><label class="control-label labelhdata">'.$date_frm .'</label></td>
						<td><label class="control-label labelhed" >To Date</label></td>
						<td><label class="control-label labelhdata">'. $date_to .'</label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed">Remarks</label></td>
						<td colspan="6"><label class="control-label labelhdata">'.$remark.'</label></td>

					</tr>
				</tbody>
			</table>
		</div>';
		}
				
				}
				echo'<div class="pull-right col-md-7 col-sm-12 col-xs-12">
	<a href="#" class="btn btn-primary back_btn">Back</a>
</div>';
	echo '</div>';
    ?>
	<!----Property tab------>
	<div class="tab-pane" id="property">
	<h3>&nbsp;&nbsp;Property</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
	<div class="container">
		<div class="row">
			<div class="col-sm-4" style="font-size:15px; font-weight:400px;">Transaction ID:<b><?php echo $inc_transc_id; ?></b></div>
				<div class="col-sm-4"></div>
					<div class="col-sm-4"style="font-size:15px; font-weight:400px;">Updated Date:<b><?php echo $inc_updated_date; ?></b></div>
		</div>
	</div>
		<div class="table-responsive" style="padding:20px;">
		<h3>&nbsp;&nbsp;Property Details</h3>
		<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
			<table border="1" class="table table-bordered"  style="width:100%">
				<tbody>
					<tr>
						<td><label class="control-label labelhed " >PF No</label></td>
						<td> <label class="control-label labelhdata"><?php echo $pf_no; ?></label></td>
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
						<td><label class="control-label labelhed" >Date Of Pay</label></td>
						<td><label class="control-label labelhdata"><?php echo $dop;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Location</label></td>
						<td><label class="control-label labelhdata"><?php echo $location;?></label></td>
						<td><label class="control-label labelhed" >Registration No</label></td>
						<td><label class="control-label labelhdata"><?php echo $reg_no ;?></label></td>
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
						<td><label class="control-label labelhdata"><?php echo $letter_dates;?></label></td>
					</tr>
					<tr>
						<td><label class="control-label labelhed" >Remarks</label></td>
						<td colspan="3"><label class="control-label labelhdata"><?php echo $remark;?></label></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<a href="#" class="btn btn-primary back_btn">Back</a>
		</div>
    </div>
<!--- family composition--->
<div class="tab-pane" id="family">
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Family Composition Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
	<?php
		$sql=mysql_query("select * from  family_temp where emp_pf='$pf_no'");
		
		while($result=mysql_fetch_array($sql)){
			
			$fmy_pf_number=$result['fmy_pf_number'];
			$fmy_updatedate=$result['fmy_updatedate'];
			$fmy_member=$result['fmy_member'];
			$fmy_rel=$result['fmy_rel'];
			$fmy_gender=$result['fmy_gender'];
			$fmy_dob=$result['fmy_dob'];
			
			echo "<table border='1' class='table table-bordered'  style='width:100%'>";
			echo "<tbody>";
			echo "<tr>";
				
			echo "<td><label class='control-label labelhed ' >PF No</label></td>";		
			echo "<td> <label class='control-label labelhdata'>$fmy_pf_number</label></td>";	
			echo "<td><label class='control-label labelhed' >Date Of Updation</label></td>"	;	
			echo "<td><label class='labelhdata labelhdata'>$fmy_updatedate</label></td>";		
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

			echo "</tbody>";
			echo "</table>";
			
		}
	?>				
			
		
	</div>
	<div class="pull-right col-md-7 col-sm-12 col-xs-12">
		<a href="#" class="btn btn-primary back_btn">Back</a>
	</div>
</div>
<!--awards-->
<?php



dbcon1();
				$sql=mysql_query("select * from  award_track where awd_pf_number='$pf_no' ORDER BY ID DESC");
		//	echo"select * from  increment_track where incr_pf_number='$pf_no' ORDER BY id DESC".mysql_error();
			$data=[];
			$cnt='0';
			$i='0';
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						$cnt++;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
	             if($cnt>1)
				 {
					if($data[$temp]['final_transaction_id']!=$data[$i]['final_transaction_id'])
					{
			
							$awd_final_transaction_id=$data[$i]['final_transaction_id'].'<span style="margin-left:6px;" val="final_transaction_id" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
							$temp--;
							$i--;	
							
							
					}
					else if($data[$temp]['final_transaction_id']==$data[$i]['final_transaction_id'])
					{
						$final_transaction_id=$data[$i]['final_transaction_id'];
							$temp--;
							$i--;
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['awd_pf_number']!=$data[$i]['awd_pf_number'])
					{
			
						$awd_pf_number=$data[$i]['awd_pf_number'].'<span style="margin-left:6px;" val="awd_pf_number" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
							echo"<script>alert($awd_pf_number)</script>";
							$temp--;
							$i--;	
							
					}
					else if($data[$temp]['awd_pf_number']==$data[$i]['awd_pf_number'])
					{
						$awd_pf_number=$data[$i]['awd_pf_number'];
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['awd_date']!=$data[$i]['awd_date'])
					{
			
						$awd_date=$data[$i]['awd_date'];
						$awddate=date('d-m-Y',strtotime($awd_date)).'<span style="margin-left:6px;" val="awd_date" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
							$temp--;
							$i--;	
							
					}
					else if($data[$temp]['awd_date']==$data[$i]['awd_date'])
					{
						$awd_date=$data[$i]['awd_date'];
						$awddate=date(d-m-Y,strtotime($awd_date));
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['awd_by']!=$data[$i]['awd_by'])
					{
			
						$awd_by=$data[$i]['awd_by'].'<span style="margin-left:6px;" val="awd_by" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
					}
					else if($data[$temp]['awd_by']==$data[$i]['awd_by'])
					{
						$awd_by=$data[$i]['awd_by'];
							$temp--;
							$i--;
					}
				
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['awd_type']!=$data[$i]['awd_type'])
					{
			
						$awd_type=$data[$i]['awd_type'].'<span style="margin-left:6px;" val="awd_type" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['awd_type']==$data[$i]['awd_type'])
					{
						$awd_type=$data[$i]['awd_type'];
						
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['awd_other']!=$data[$i]['awd_other'])
					{
			
						$awd_other=$data[$i]['awd_other'].'<span style="margin-left:6px;" val="awd_other" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
					
							$temp--;
							$i--;	
							
					}
					else if($data[$temp]['awd_other']==$data[$i]['awd_other'])
					{
						$awd_other=$data[$i]['awd_other'];
							
						
							$temp--;
							$i--;	
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['awd_detail']!=$data[$i]['awd_detail'])
					{
			
						$awd_detail=$data[$i]['awd_detail'].'<span style="margin-left:6px;" val="awd_detail" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['awd_detail']==$data[$i]['awd_detail'])
					{
						$awd_detail=$data[$i]['awd_detail'];
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['date_time']!=$data[$i]['date_time'])
					{
			
						$date_time=$data[$i]['date_time'];
							$awd_update_Date=date('d-m-Y',strtotime($date_time)).'<span style="margin-left:6px;" val="date_time" data-toggle="modal" tbl_name="award_track" col_nm="awd_pf_number" data-target="#delete" class="fa fa-edit click_awards"></span>';
						
						
						
							$temp--;
							$i--;	
							
						
					}
					else if($data[$temp]['date_time']==$data[$i]['date_time'])
					{
						$date_time=$data[$i]['date_time'];
						$awd_update_Date=date('d-m-y',strtotime($date_time));
							$temp--;
							$i--;
					}
				}
				}
				else{
					dbcon1();
					$sql=mysql_query("select * from  award_track where awd_pf_number='$pf_no'");
					if($sql){
						while($fetch_sql=mysql_fetch_array($sql))
					  {
						$fetch_sql=mysql_fetch_array($sql);
						
						    $awd_final_transaction_id=$fetch_sql['final_transaction_id'];
							$awd_pf_number = $fetch_sql['awd_pf_number'];
							
							$awd_award_date = $fetch_sql['awd_date'];
							$awddate = date("d-m-Y", strtotime($awd_award_date));
							
							$awd_by = $fetch_sql['awd_by'];
							$awd_type = got_award($fetch_sql['awd_type']);
							$awd_other = $fetch_sql['awd_other'];
							$awd_detail = $fetch_sql['awd_detail'];
							
							$up_date=$fetch_sql['date_time'];							
							$awd_update_Date = date("d-m-Y", strtotime($up_date));
							
					  }
					         }

				    }
					
		?>
<div class="tab-pane" id="awards">
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Award Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
	<div class="row">
	<div class="col-sm-6 col-md-6">
	<label class="control-label labelhed" style="float:left;">Transaction Id:&nbsp;<?php echo $awd_final_transaction_id ?>
	</div>
	<div class="col-sm-6 col">
		<label class="control-label labelhed" style="float:right;">Last Update:&nbsp;<?php echo $awd_update_Date ?>	</div>
	</div>
		<table border="1" class="table table-bordered"  style="width:100%">
			<tbody>
				<tr>
					<td><label class="control-label labelhed " >PF No</label></td>
					<td> <label class="control-label labelhdata"><?php echo $awd_pf_number ?></label></td>
					<td><label class="control-label labelhed" >Date Of Award</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $awddate;?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Awarded By</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_by;?></label></td>
					<td><label class="control-label labelhed" >Type Of Award</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_type;?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Other Award</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_other;?></label></td>
					<td><label class="control-label labelhed" >Award Details</label></td>
					<td><label class="control-label labelhdata"><?php echo $awd_detail ?></label></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="pull-right col-md-7 col-sm-12 col-xs-12">
		<a href="#" class="btn btn-primary back_btn">Back</a>
	</div>
</div>
<!----nominee---->
<div class="tab-pane" id="nominee">
		
		<div  class="tab-pane" id="nominee" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details</h3>
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
						<h3>PF Nominee</h3><hr>
							<div class="row">
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
             <div class="table-responsive">
			 <?php 
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
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_rel']."</label>";
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
					echo "<td><label class='control-label labelhdata'>".$result['nom_status']."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_dob']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['tra_remark']."</label></td>";
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
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			<a href="sr_view.php" class="btn btn-primary">Back</a>
		</div>						 
    </div> 
	<div class="tab-pane" id="gis">
		
		<div  class="tab-pane" id="gis" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details	</h3>
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
						<h3>GIS Nominee</h3><hr>
							<div class="row">
										<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="table-responsive">
			<?php 
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
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_rel']."</label>";
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
					echo "<td><label class='control-label labelhdata'>".$result['nom_status']."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_dob']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['tra_remark']."</label></td>";
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
			<a href="sr_view.php" class="btn btn-primary">Back</a>
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
					echo "<td><label class='labelhdata labelhdata'>".$result['nom_rel']."</label>";
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
					echo "<td><label class='control-label labelhdata'>".$result['nom_status']."</label></td>";
					echo "<td><label class='control-label labelhed' >Age</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_age']."</label></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['nom_dob']."</label></td>";
					echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
					echo "<td><label class='control-label labelhdata'>".$result['tra_remark']."</label></td>";
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
			<a href="sr_view.php" class="btn btn-primary">Back</a>
		</div>						 
    </div> 	
<!----training tab----->	
<div class="tab-pane" id="training">
<?php

			dbcon1();
				$sql=mysql_query("select *from  training_track where pf_number='$pf_no' ORDER BY ID DESC");
		//	echo"select * from  increment_track where incr_pf_number='$pf_no' ORDER BY id DESC".mysql_error();
			$data=[];
			$cnt='0';
			$i='0';
				if($sql){
					while($fetch_sql=mysql_fetch_array($sql))
					{
						$data[$cnt]=$fetch_sql;
						$cnt++;
					}
							//$transc_id=$fetch_sql['final_transaction_id'];
							
							//$tra_upd_date=$fetch_sql['date_time'];
							//$tra_upd_date=date('d-m-Y', strtotime($tra_upd_date1));
							//echo "<script>alert($updated_date);</script>";
					//echo"<script>alert($cnt);</script>";
					//print_r($data);
					if($cnt>1)
					{
						$temp=$cnt-1;
					$i=$temp-1;		
					if($data[$temp]['final_transaction_id']!=$data[$i]['final_transaction_id'])
					{
			
							$transc_id=$data[$i]['final_transaction_id'];//.'<span style="margin-left:6px; color:blue;" //val="final_transaction_id" data-toggle="modal" tbl_name="advance_track" col_nm="adv_pf_number" //data-target="#delete" class="fa fa-edit training_click"></span>';
							//echo" <script>alert('updated')</script>";
							$temp--;
							$i--;	
							$tra_upd_date=$fetch_sql['date_time'];
							$tra_upd_date=date('d-m-Y', strtotime($tra_upd_date1));	
							
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$transc_id1=$data[$i]['final_transaction_id'];
						$tra_upd_date=$fetch_sql['date_time'];
							$tra_upd_date=date('d-m-Y', strtotime($tra_upd_date1));	
							$temp--;
							$i--;
					}
						
						
						
						
							$temp=$cnt-1;
							$i=$temp-1;
					if($data[$temp]['pf_number']!=$data[$i]['pf_number'])
					{
			
							$tra_pf_number=$data[$i]['pf_number'].'<span style="margin-left:6px; color:blue;" val="pf_number" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
							//echo" <script>alert('updated')</script>";
							$temp--;
							$i--;		
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$tra_pf_number=$data[$i]['pf_number'];
							$temp--;
							$i--;
					}
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['training_type']!=$data[$i]['training_type'])
					{
			
						$tra_type=$data[$i]['training_type'].'<span style="margin-left:6px; color:blue;" val="training_type" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
							//echo"<script>alert($advance_type)</script>";
							$temp--;
							$i--;	
							
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$tra_type=$data[$i]['training_type'];
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['last_date']!=$data[$i]['last_date'])
					{
			
						$tra_last_date1=$data[$i]['last_date'];
						$tra_last_date=date('d-m-Y', strtotime($tra_last_date1)).'<span style="margin-left:6px; color:blue;" val="last_date" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
							
							$temp--;
							$i--;	
							
						
					}
					else
					{
						$tra_last_date1=$data[$i]['last_date'];
						$tra_last_date=date('d-m-Y', strtotime($tra_last_date1));
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['due_date']!=$data[$i]['due_date'])
					{
			
						$tra_due_date1=$data[$i]['due_date'];
						$tra_due_date=date('d-m-Y', strtotime($tra_due_date1)).'<span style="margin-left:6px; color:blue;" val="due_date" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
							
							$temp--;
							$i--;	
							
						
					}
					else
					{
						$tra_due_date1=$data[$i]['due_date'];
						$tra_due_date=date('d-m-Y', strtotime($tra_due_date));
							$temp--;
							$i--;
					}
				
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['training_from']!=$data[$i]['training_from'])
					{
			
						$tra_training_from1=$data[$i]['training_from'];
						$tra_training_from=date('d-m-Y', strtotime($tra_training_from1)).'<span style="margin-left:6px; color:blue;" val="training_from" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
							//echo"<script>alert($letter_number)</script>";
							$temp--;
							$i--;	
							
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$tra_training_from1=$data[$i]['training_from'];//.'<span style="margin-left:6px;" class="fa fa-edit"></span>';
						$tra_training_from=date('d-m-Y', strtotime($tra_training_from1));
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['training_to']!=$data[$i]['training_to'])
					{
			
						$tra_training_to1=$data[$i]['training_to'];
						$tra_training_to=date('d-m-Y', strtotime($tra_training_to1)).'<span style="margin-left:6px; color:blue;" val="training_to" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
							//echo"<script>alert($letter_number)</script>";
							$temp--;
							$i--;	
							
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$tra_training_to1=$data[$i]['training_to'];//.'<span style="margin-left:6px;" class="fa fa-edit"></span>';
						$tra_training_to=date('d-m-Y', strtotime($tra_training_to1));
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['letter_no']!=$data[$i]['letter_no'])
					{
			
						$tra_letter_number=$data[$i]['letter_no'].'<span style="margin-left:6px; color:blue;" val="letter_no" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
						
							//echo"<script>alert($letter_number)</script>";
							$temp--;
							$i--;	
							
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$tra_letter_number=$data[$i]['letter_no'];
							$temp--;
							$i--;
					}
					
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['letter_date']!=$data[$i]['letter_date'])
					{
			
						$tra_letter_date1=$data[$i]['letter_date'];
						$tra_letter_date=date('d-m-Y', strtotime($tra_letter_date1)).'<span style="margin-left:6px; color:blue;" val="letter_date" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
							//echo"<script>alert($letter_number)</script>";
							$temp--;
							$i--;	
							
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$tra_letter_date1=$data[$i]['letter_date'];//.'<span style="margin-left:6px;" class="fa fa-edit"></span>';
						$tra_letter_date=date('d-m-Y', strtotime($tra_letter_date1));
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['description']!=$data[$i]['description'])
					{
			
						$tra_description=$data[$i]['description'].'<span style="margin-left:6px; color:blue;" val="description" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
						
							//echo"<script>alert($letter_number)</script>";
							$temp--;
							$i--;	
							
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$tra_description=$data[$i]['description'];
							$temp--;
							$i--;
					}
					
					$temp=$cnt-1;
					$i=$temp-1;
					if($data[$temp]['remarks']!=$data[$i]['remarks'])
					{
			
						$tra_remark=$data[$i]['remarks'].'<span style="margin-left:6px; color:blue;" val="remarks" data-toggle="modal" tbl_name="training_track" col_nm="pf_number" data-target="#delete" class="fa fa-edit training_click"></span>';
						
						
							//echo"<script>alert($letter_number)</script>";
							$temp--;
							$i--;	
							
						//echo"<script>alert($temp)</script>";
						//echo"<script>alert($i)</script>";
					}
					else
					{
						//echo" <script>alert('not updated')</script>";
						$tra_remark=$data[$i]['remarks'];//.'<span style="margin-left:6px;" class="fa fa-edit"></span>';
						
							$temp--;
							$i--;
					}
				}
				else{
				
				
				$sql=mysql_query("select *from advance_leave where adv_pf_number='$pf_no' ORDER BY ID DESC LIMIT 1");
				while($fetch_sql1=mysql_fetch_array($sql))
				{
										
				$tra_pf_number=$fetch_nominee['pf_number'];
				$tra_type = $fetch_nominee['training_type'];
				$tra_last_date1=$data[$i]['last_date'];
				$tra_last_date=date('d-m-Y', strtotime($tra_last_date1));
				$tra_due_date1=$data[$i]['due_date'];
				$tra_due_date=date('d-m-Y', strtotime($tra_due_date1));
				$tra_training_from1=$data[$i]['training_from'];
				$tra_training_from=date('d-m-Y', strtotime($tra_training_from1));
				$tra_training_to1=$data[$i]['training_to'];
				$tra_training_to=date('d-m-Y', strtotime($tra_training_to1));
			    $tra_description  = $fetch_nominee['description'];
				$tra_letter_number  = $fetch_nominee['letter_no'];
				$tra_letter_date1=$data[$i]['letter_date'];//.'<span style="margin-left:6px;" class="fa fa-edit"></span>';
				$tra_letter_date=date('d-m-Y', strtotime($tra_letter_date1));
				$tra_remark = $fetch_nominee['remarks'];
									}
					}
				
										
								
			?>
							
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp Training</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
							<div class="container">
							<div class="row">
							<div class="col-sm-4" style="font-size:15px; font-weight:400px;">Transaction ID:<b><?php echo $transc_id; ?></b></div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4"style="font-size:15px; font-weight:400px;">Updated Date:<b><?php echo $tra_upd_date; ?></b></div>
							</div>
							</div>
	<br>
		<table border="1" class="table table-bordered"  style="width:100%">
			<tbody>						
				<tr>
					<td><label class="control-label labelhed " >PF No</label></td>
					<td> <label class="control-label labelhdata"><?php echo $tra_pf_number; ?></label></td>
					<td><label class="control-label labelhed" >Training Type</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $tra_type; ?></label></td>
				</tr>
				
				<tr>
				<td><label class="control-label labelhed" >Last Date</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $tra_last_date; ?></label>
				</td><td><label class="control-label labelhed" >Due Date</label></td>
					<td><label class="labelhdata labelhdata"><?php echo $tra_due_date; ?></label>
				</td>
				</tr>
				
				
				<tr>
					<td><label class="control-label labelhed" >Training From</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_training_from; ?></label></td>
					<td><label class="control-label labelhed" >Training To</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_training_to; ?></label></td>
				</tr>
				<tr>
					<td><label class="control-label labelhed" >Letter No</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_letter_number ?></label></td>
					<td><label class="control-label labelhed" >Letter Date</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_letter_date ?></label></td>
				</tr>	
				<tr>
					<td><label class="control-label labelhed" >Description</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_description ?></label></td>
					<td><label class="control-label labelhed" >remark</label></td>
					<td><label class="control-label labelhdata"><?php echo $tra_remark ?></label></td>
				</tr>					
			</tbody>
		</table>							
	</div>
	<div class="pull-right col-md-7 col-sm-12 col-xs-12">
		<a href="#" class="btn btn-primary back_btn">Back</a>
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
			<a href="sr_view.php" class="btn btn-primary">Back</a>
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

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Transaction History</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="POST" >

            <div style="padding: 10px" class="form-group table-responsive">
            		<table class="table table-bordered table-striped">
            			<thead>
            			<tr>
            			<th>Sr. No.</th>
            			<th>Transaction ID</th>
            			<th>From (Old)</th>
            			<th>To (New)</th>
            			<th>Updated Date</th>
            			<th>Updated Time</th>
            			<th>Updated By</th>
            			</tr>
            			</thead>
            			<tbody class="display_history">
            				


            			</tbody>
              		</table>
              <div class="col-sm-10">
                <input type="hidden" class="form-control" id="delete_id" name="delete_id">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
  </div>
</div>
</div>
</div>



<script>
$(".back_btn").click(function(){
	window.location='sr_search.php';
});

var pre_wk=<?php echo $sgd_dropdwn;?>;
if(pre_wk==0)
{
	$("#sgd_ogd_no").show();
	$("#sgd_ogd_yes").hide();
}else{
	$("#sgd_ogd_no").hide();
	$("#sgd_ogd_yes").show();
}


$(document).on("click",".click_pro",function(){
	var pf = $("#hidden_pfno").val();
	var val = $(this).attr('val');
	var val1 = $(this).attr('tbl_name');
	var val2 = $(this).attr('col_nm');
	 $.ajax({
		type:"post",
		url:"process.php",
		data:"action=fetch_history&pf="+pf+"&val="+val+"&val1="+val1+"&val2="+val2,
		success:function(data){
		//  alert(data);
		  $(".display_history").html(data);
		  }
	});
});


$(document).on("click",".click_open",function(){
	var pf = $("#hidden_pfno").val();
	var val = $(this).attr('val');
	var val1 = $(this).attr('tbl_name');
	var val2 = $(this).attr('col_nm');
	 $.ajax({
		type:"post",
		url:"process.php",
		data:"action=fetch_history&pf="+pf+"&val="+val+"&val1="+val1+"&val2="+val2,
		success:function(data){
		//  alert(data);
		  $(".display_history").html(data);
		  }
	});
});





</script>