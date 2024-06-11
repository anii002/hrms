<?php
include_once('../dbconfig/dbcon.php');
include('create_log.php');
include_once('sr_function.php');
error_reporting(0);
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {  

		case 'get_bio_data':
			$data = '';
			session_start();
			dbcon1();
			$bio_sql = "SELECT * FROM `biodata_temp` WHERE `pf_number` = '".$_SESSION['set_update_pf']."'";
			$bio_query = mysql_query($bio_sql);
			if($bio_query){
				while($bio_data = mysql_fetch_assoc($bio_query)){
					$data .= $bio_data['oldpf_number']."$".$bio_data['identity_number']."$".$bio_data['sr_no']."$".date('d-m-Y',strtotime($bio_data['dob']))."$".$bio_data['aadhar_number']."$".$bio_data['emp_name']."$".$bio_data['emp_old_name']."$".get_gender_data($bio_data['gender'])."$".get_marital_status($bio_data['marrital_status'])."$".$bio_data['f_h_name']."$".$bio_data['cug']."$".$bio_data['mobile_number']."$".$bio_data['nps_no']."$".$bio_data['ruid_no']."$".$bio_data['pan_number']."$".$bio_data['email']."$".$bio_data['present_address']."$".get_state_data($bio_data['pre_statecode'])."$".get_pincode_data($bio_data['pre_pincode'],$bio_data['pre_statecode'])."$".$bio_data['permanent_address']."$".get_state_data($bio_data['per_statecode'])."$".get_pincode_data($bio_data['per_pincode'],$bio_data['pre_statecode'])."$".get_mark_data($bio_data['identification_mark'])."$".get_reli_data($bio_data['religion'])."$".get_community_data($bio_data['community'])."$".$bio_data['caste']."$".get_recruitment_data($bio_data['recruit_code'])."$".get_group_data($bio_data['group_col'])."$".get_iniEduction($bio_data['education_ini'], $bio_data['edu_desc_ini'])."$".get_subEduction($bio_data['education_sub'], $bio_data['edu_desc_sub'])."$".$bio_data['bank_name']."$".$bio_data['account_number']."$".$bio_data['micr_number']."$".$bio_data['ifsc_code']."$".$bio_data['bank_address']."$".$bio_data['pf_number']."$".$bio_data['imagefile']."$".$bio_data['f_h_selction'];
				}
				echo $data;
			}else{
				echo "No Bio Record Found!!!";
			}
		break;

		case 'update_biodata':
		  	date_default_timezone_set('Asia/Kolkata');
			session_start();
			$trans_id=date('dmYHis');
			$bio_pf_no=$_POST['bio_pf_no'];
			$bio_oldpf_no=$_POST['bio_oldpf_no'];
			$bio_id_no=$_POST['bio_id_no'];
			$bio_sr_no=$_POST['bio_sr_no'];
			
			$img="";
			$bio_dob=date('Y-m-d', strtotime($_POST['bio_dob']));
			
			dbcon1();
			
			$bio_sql1 = mysql_query("SELECT `imagefile` FROM `biodata_temp` WHERE `pf_number` = '".$_SESSION['set_update_pf']."'") or die(mysql_error());
				while($result1=mysql_fetch_array($bio_sql1)){
					$img=$result1['imagefile'];
				}
			
			$bio_aadhar=$_POST['bio_aadhar'];
			$bio_emp_name=$_POST['bio_emp_name'];
			$bio_emp_old_name=$_POST['bio_emp_old_name'];
			$bio_gender=$_POST['bio_gender'];
			
			$bio_marriage_status=$_POST['bio_marriage_status'];
			
			$bio_rdobtn_selection=$_POST['choose_name'];
			$bio_rdobtn_name=$_POST['bio_rdobtn_name'];
			$bio_cug=$_POST['bio_cug'];
			$bio_mob=$_POST['bio_mob'];
			$bio_pran=$_POST['bio_pran'];
			$bio_ruid=$_POST['bio_ruid'];
			$bio_pan=$_POST['bio_pan'];
			$bio_email=$_POST['bio_email'];
			$bio_p_addr=$_POST['bio_p_addr'];
			
			$state_code=$_POST['state_code'];
			$pincode=$_POST['pincode'];
			
			$bio_pre_addr=$_POST['bio_pre_addr'];
			
			$state_code_2=$_POST['state_code_2'];
			$pincode_2=$_POST['pincode_2'];
			
			$bio_mark = $_REQUEST['bio_mark'];
			$all_bio_mark = implode(',',$bio_mark);			
			$bio_religion=$_POST['bio_religion'];
			$bio_commu=$_POST['bio_commu'];
			$bio_cast=$_POST['bio_cast'];
			
			$bio_req_code=$_POST['bio_req_code'];
			$bio_grp=$_POST['bio_grp'];
			
			$edu_pri_info = $_REQUEST['edu_pri_info'];
			$all_bio_edu = implode(',',$edu_pri_info);	
			
			$edu_pri_desc = $_REQUEST['bio_edu_ini'];
			$all_bio_edu_desc = implode(',',$edu_pri_desc);
			
			$edu_pri_info_sub = $_REQUEST['edu_pri_info_sub'];
			$all_bio_edu_sub = implode(',',$edu_pri_info_sub);	
			
			$edu_pri_desc_sub = $_REQUEST['bio_edu_sub'];
			$all_bio_edu_desc_sub = implode(',',$edu_pri_desc_sub);
			

			$bio_bank_name=$_POST['bio_bank_name'];
			$bio_acc_no=$_POST['bio_acc_no'];
			$bio_micr=$_POST['bio_micr'];
			$bio_ifsc=$_POST['bio_ifsc'];	
			
			$bio_bank_address=addslashes($_POST['bio_bank_address']);
			
			$update_by=$_SESSION['id'];
			
			if(!empty($_FILES['imgs']['name']))
			{
				$s_q=mysql_query("update `biodata_temp` set `imagefile`='' where `pf_number`='$bio_pf_number'")or die(mysql_error());
				
				$img_name=$_FILES['imgs']['name'];
				$img_tmp_name=$_FILES['imgs']['tmp_name'];
				$newfilename = $img_name;
				$folder_name="upload_doc/".$bio_pf_no."/"; 	
				
				if(is_dir("upload_doc/".$bio_pf_no))
				{
					if(file_exists('upload_doc/'.$bio_pf_no.'/'.$bio_pf_no.'.jpg'))
					{
						rename('upload_doc/'.$bio_pf_no.'/'.$bio_pf_no.'.jpg' , 'upload_doc/'.$bio_pf_no.'/'.date("m-d-y").date("h-i-sa").'.jpg');
						//echo "success";
					} 
				}
				else{
					mkdir("upload_doc/".$bio_pf_no);
					if(file_exists('upload_doc/'.$bio_pf_no.'/'.$bio_pf_no.'.jpg'))
					{
						rename('upload_doc/'.$bio_pf_no.'/'.$bio_pf_no.'.jpg' , 'upload_doc/'.$bio_pf_no.'/'.date("m-d-y").date("h-i-sa").'.jpg');
						echo "success";
					} 
				}
			}
			else
			{
				$newfilename = $img;
			} 
		
		// upload scanned document code
			$name_array="";
			$tmp_name_array="";
			$cnt = 0;
			
			//echo $_FILES['doc_file']['size'];
			
			$i=1;
			$count=0;
			foreach($_FILES['doc_file']['size'] as $file){
				if(empty($file))
				{	
					//echo "File is empty";
					$count=0;
					$i++;
				}else{
					$count=1;
				}
			}
			
			if($count==1)
			{
				if($_FILES['doc_file']['error'][0] != 4)
					{
						$cnt = count($_FILES['doc_file']['name']);
						for($i=0;$i<$cnt;$i++)
						{
							$name_array[$i] = $_FILES['doc_file']['name'][$i];
							$tmp_name_array[$i] = $_FILES['doc_file']['tmp_name'][$i];
						}
					} 
			
					$name_array=$_FILES['doc_file']['name'];
					$tmp_name_array=$_FILES['doc_file']['tmp_name'];
			
					//$pf_number=$_POST['doc_pf_no'];
					$count=0;
				
					$folder_name="upload_scanned_doc/";
					
					if(is_dir("upload_scanned_doc/".$bio_pf_no))
					{
							
					}
					else{
						mkdir("upload_scanned_doc/".$bio_pf_no);
					}
					if(is_dir("upload_scanned_doc/".$bio_pf_no."/biodata"))
					{
							
					}
					else{
						mkdir("upload_scanned_doc/".$bio_pf_no."/biodata");
					}
					
					$folder_name="upload_scanned_doc/".$bio_pf_no."/biodata/";
					
					for($i=0;$i<count($tmp_name_array);$i++)
					{
						
						$temp = explode(".", $name_array[$i]);
						$newfilename = rand(1000,99999) . '.' . end($temp);
						
						$q=mysql_query("select count from sr_doc where pf_number='$bio_pf_no' order by id desc limit 1");
						$f=mysql_fetch_array($q);
						if($f['count']!="")
						{
							$count=$f['count']+1;
						}else{
							$count=$count+1;
						}
						
						$sql_img=mysql_query("insert into sr_doc(pf_number,biodata,count,update_date,uploaded_by) values('$bio_pf_no','$newfilename','$count',CURRENT_TIMESTAMP,'1')")or die(mysql_error());
						
						$action="Inserted Biodata Scanned Document in SR Doc Table";
						$action_on=$bio_pf_no;
						create_log($action,$action_on);
						
						if($sql_img)
						{
							move_uploaded_file($tmp_name_array[$i],$folder_name.$newfilename);
						}
					}
			}
			
					//echo $folder_name."<br>";
			 
			
		    
			$check=mysql_query("select * from biodata_temp where pf_number='".$_SESSION['set_update_pf']."'"); 
			$result_check=mysql_num_rows($check);
			
			if($result_check==0){
				
				$result1=mysql_query("insert into `biodata_temp`(`zone`,`temp_transaction_id`,`division`,`pf_number`, `oldpf_number`, `identity_number`, `sr_no`, `dob`, `mobile_number`, `emp_name`, `emp_old_name`, `f_h_selction`, `f_h_name`, `cug`, `aadhar_number`, `email`, `pan_number`, `present_address`, `permanent_address`,`identification_mark`, `religion`, `community`, `caste`, `gender`, `recruit_code`, `group_col`,`education_ini`,`edu_desc_ini`,`education_sub`,`edu_desc_sub`,`bank_name`, `account_number`, `micr_number`, `ifsc_code`, `reis_no`, `ruid_no`, `nps_no`, `bank_address`,`imagefile`,`marrital_status`,`pre_statecode`,`pre_pincode`,`per_statecode`,`per_pincode`,`updated_by`,`date_time`,`updated_fields`,`updated_reason`,`letter_no`,`letter_datetime`,`uploaded_letter`,`approved_status`,`approved_by`,`approved_datetime`)values('01','$trans_id','SUR','$bio_pf_no','$bio_oldpf_no','$bio_id_no','$bio_sr_no','$bio_dob','$bio_mob','$bio_emp_name','$bio_emp_old_name','$bio_rdobtn_selection','$bio_rdobtn_name','$bio_cug','$bio_aadhar','$bio_email','$bio_pan','$bio_p_addr','$bio_pre_addr','$all_bio_mark','$bio_religion','$bio_commu','$bio_cast','$bio_gender','$bio_req_code','$bio_grp','$all_bio_edu','$all_bio_edu_desc','$all_bio_edu_sub','$all_bio_edu_desc_sub','$bio_bank_name','$bio_acc_no','$bio_micr','$bio_ifsc','$bio_reis','$bio_ruid','$bio_pran','$bio_bank_address','$newfilename','$bio_marriage_status','$state_code','$pincode','$state_code_2','$pincode_2','$update_by',Now(),'','','','','','','','')");
				
				$result2 = mysql_query("insert into `biodata_track`(`zone`, `temp_transaction_id`, `final_transaction_id`, `division`, `pf_number`, `oldpf_number`, `identity_number`, `sr_no`, `dob`, `mobile_number`, `emp_name`, `emp_old_name`, `f_h_selction`, `f_h_name`, `cug`, `aadhar_number`, `email`, `pan_number`, `present_address`, `permanent_address`, `identification_mark`, `religion`, `community`, `caste`, `gender`, `recruit_code`, `group_col`, `education_ini`, `edu_desc_ini`, `education_sub`, `edu_desc_sub`, `bank_name`, `account_number`, `micr_number`, `ifsc_code`, `ruid_no`, `nps_no`, `bank_address`, `imagefile`, `marrital_status`, `pre_statecode`, `pre_pincode`, `per_statecode`, `per_pincode`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`) values('01', '$trans_id', '$trans_id', 'SUR', '$bio_pf_no', '$bio_oldpf_no', '$bio_id_no', '$bio_sr_no', '$bio_dob', '$bio_mob', '$bio_emp_name', '$bio_emp_old_name', '$bio_rdobtn_selection', '$bio_rdobtn_name', '$bio_cug', '$bio_aadhar', '$bio_email', '$bio_pan', '$bio_p_addr', '$bio_pre_addr', '$all_bio_mark', '$bio_religion', '$bio_commu', '$bio_cast', '$bio_gender', '$bio_req_code', '$bio_grp', '$all_bio_edu', '$all_bio_edu_desc', '$all_bio_edu_sub', '$all_bio_edu_desc_sub', '$bio_bank_name', '$bio_acc_no', '$bio_micr', '$bio_ifsc', '$bio_ruid', '$bio_pran', '$bio_bank_address', '$newfilename', '$bio_marriage_status', '$state_code', '$pincode', '$state_code_2', '$pincode_2', '$update_by',Now(),'', '','','','','','','')");
				
				$action="Record Inserted In Biodata Temp and Biodata Track";
				
			}else{
			dbcon1();
			$sq=mysql_query("SELECT * from biodata_temp where pf_number='".$bio_pf_no."'");
			if($sq)
			{
				while($fetch_sql=mysql_fetch_array($sq))
				{
		
					if($bio_oldpf_no==$fetch_sql['oldpf_number'] && $bio_id_no==$fetch_sql['identity_number'] && $bio_dob==$fetch_sql['dob'] && $bio_aadhar==$fetch_sql['aadhar_number'] && $bio_emp_name==$fetch_sql['emp_name'] && $bio_emp_old_name==$fetch_sql['emp_old_name'] && $bio_gender==$fetch_sql['gender'] && $bio_marriage_status==$fetch_sql['marrital_status'] && $bio_rdobtn_selection==$fetch_sql['f_h_selction'] && $bio_rdobtn_name==$fetch_sql['f_h_name'] && $bio_cug==$fetch_sql['cug'] && $bio_mob==$fetch_sql['mobile_number'] && $bio_pran==$fetch_sql['nps_no'] && $bio_ruid==$fetch_sql['ruid_no'] && $bio_pan==$fetch_sql['pan_number'] && $bio_email==$fetch_sql['email'] && $bio_p_addr==$fetch_sql['present_address'] && $state_code==$fetch_sql['pre_statecode'] && $pincode==$fetch_sql['pre_pincode'] && $bio_pre_addr==$fetch_sql['permanent_address'] && $state_code_2==$fetch_sql['per_statecode'] && $pincode_2==$fetch_sql['per_pincode'] && $all_bio_mark==$fetch_sql['identification_mark'] && $bio_religion==$fetch_sql['religion'] && $bio_commu==$fetch_sql['community'] && $bio_cast==$fetch_sql['caste'] && $bio_req_code==$fetch_sql['recruit_code'] && $bio_grp==$fetch_sql['group_col'] && $all_bio_edu==$fetch_sql['education_ini'] && $all_bio_edu_desc==$fetch_sql['edu_desc_ini'] && $all_bio_edu_sub==$fetch_sql['education_sub'] && $all_bio_edu_desc_sub==$fetch_sql['edu_desc_sub'] && $bio_bank_name==$fetch_sql['bank_name'] && $bio_acc_no==$fetch_sql['account_number'] && $bio_micr==$fetch_sql['micr_number'] && $bio_ifsc==$fetch_sql['ifsc_code'] && $bio_bank_address==$fetch_sql['bank_address'] && $newfilename==$fetch_sql['imagefile'])
					{
						echo "<script>alert('Nothing Has Changed')</script>";
					}
					else
					{
						/* echo "<script>alert('In else')</script>";
						
						echo $bio_oldpf_no."<>".$fetch_sql['oldpf_number']."<br>";
						echo $bio_id_no."<>".$fetch_sql['identity_number']."<br>";
						echo $bio_dob."<>".$fetch_sql['dob']."<br>";
						echo $bio_aadhar."<>".$fetch_sql['aadhar_number']."<br>";
						echo $bio_emp_name."<>".$fetch_sql['emp_name']."<br>";
						echo $bio_emp_old_name."<>".$fetch_sql['emp_old_name']."<br>";
						echo $bio_gender."<>".$fetch_sql['gender']."<br>";
						echo $bio_marriage_status."<>".$fetch_sql['marrital_status']."<br>";
						echo $bio_rdobtn_selection."<>".$fetch_sql['f_h_selction']."<br>";
						echo $bio_rdobtn_name."<>".$fetch_sql['f_h_name']."<br>";  
						echo $bio_cug."<>".$fetch_sql['cug']."<br>";  
						echo $bio_mob."<>".$fetch_sql['mobile_number']."<br>";  
						echo $bio_pran."<>".$fetch_sql['nps_no']."<br>";  
						echo $bio_ruid."<>".$fetch_sql['ruid_no']."<br>";  
						echo $bio_pan."<>".$fetch_sql['pan_number']."<br>";  
						echo $bio_email."<>".$fetch_sql['email']."<br>";  
						echo $bio_p_addr."<>".$fetch_sql['present_address']."<br>";  
						echo $state_code."<>".$fetch_sql['pre_statecode']."<br>";  
						echo $pincode."<>".$fetch_sql['pre_pincode']."<br>";  
						echo $bio_pre_addr."<>".$fetch_sql['permanent_address']."<br>";  
						echo $state_code_2."<>".$fetch_sql['per_statecode']."<br>";  
						echo $pincode_2."<>".$fetch_sql['per_pincode']."<br>";  
						echo $all_bio_mark."<>".$fetch_sql['identification_mark']."<br>";  
						echo $bio_religion."<>".$fetch_sql['religion']."<br>";  
						echo $bio_commu."<>".$fetch_sql['community']."<br>";  
						echo $bio_cast."<>".$fetch_sql['caste']."<br>";  
						echo $bio_req_code."<>".$fetch_sql['recruit_code']."<br>";  
						echo $bio_grp."<>".$fetch_sql['group_col']."<br>";  
						echo $all_bio_edu."<>".$fetch_sql['education_ini']."<br>";  
						echo $all_bio_edu_desc."<>".$fetch_sql['edu_desc_ini']."<br>";  
						echo $all_bio_edu_sub."<>".$fetch_sql['education_sub']."<br>";  
						echo $all_bio_edu_desc_sub."<>".$fetch_sql['edu_desc_sub']."<br>";  
						echo $bio_bank_name."<>".$fetch_sql['bank_name']."<br>";  
						echo $bio_acc_no."<>".$fetch_sql['account_number']."<br>";  
						echo $bio_micr."<>".$fetch_sql['micr_number']."<br>";  
						echo $bio_ifsc."<>".$fetch_sql['ifsc_code']."<br>";  
						echo $bio_bank_address."<>".$fetch_sql['bank_address']."<br>";  
						echo $newfilename."<>".$fetch_sql['imagefile']."<br>";   */
					
					
						$result2 = mysql_query("insert into `biodata_track`(`zone`, `temp_transaction_id`, `final_transaction_id`, `division`, `pf_number`, `oldpf_number`, `identity_number`, `sr_no`, `dob`, `mobile_number`, `emp_name`, `emp_old_name`, `f_h_selction`, `f_h_name`, `cug`, `aadhar_number`, `email`, `pan_number`, `present_address`, `permanent_address`, `identification_mark`, `religion`, `community`, `caste`, `gender`, `recruit_code`, `group_col`, `education_ini`, `edu_desc_ini`, `education_sub`, `edu_desc_sub`, `bank_name`, `account_number`, `micr_number`, `ifsc_code`, `ruid_no`, `nps_no`, `bank_address`, `imagefile`, `marrital_status`, `pre_statecode`, `pre_pincode`, `per_statecode`, `per_pincode`, `updated_by`, `date_time`, `updated_fields`, `updated_reason`, `letter_no`, `letter_datetime`, `uploaded_letter`, `approved_status`, `approved_by`, `approved_datetime`) values('01', '$trans_id', '$trans_id', 'SUR', '$bio_pf_no', '$bio_oldpf_no', '$bio_id_no', '$bio_sr_no', '$bio_dob', '$bio_mob', '$bio_emp_name', '$bio_emp_old_name', '$bio_rdobtn_selection', '$bio_rdobtn_name', '$bio_cug', '$bio_aadhar', '$bio_email', '$bio_pan', '$bio_p_addr', '$bio_pre_addr', '$all_bio_mark', '$bio_religion', '$bio_commu', '$bio_cast', '$bio_gender', '$bio_req_code', '$bio_grp', '$all_bio_edu', '$all_bio_edu_desc', '$all_bio_edu_sub', '$all_bio_edu_desc_sub', '$bio_bank_name', '$bio_acc_no', '$bio_micr', '$bio_ifsc', '$bio_ruid', '$bio_pran', '$bio_bank_address', '$newfilename', '$bio_marriage_status', '$state_code', '$pincode', '$state_code_2', '$pincode_2', '$update_by',Now(),'', '','','','','','','')");
						
						$action="Updated Record in Biodata Temp and Inserted Record in Biodata Track";
					}
				}
			}
			$result1 = mysql_query("UPDATE `biodata_temp` SET `oldpf_number`='".$bio_oldpf_no."', `dob`='".$bio_dob."', `mobile_number`='".$bio_mob."', `emp_name`='".$bio_emp_name."', `emp_old_name`='".$bio_emp_old_name."', `f_h_selction`='".$bio_rdobtn_selection."', `f_h_name`='".$bio_rdobtn_name."', `cug`='".$bio_cug."', `aadhar_number`='".$bio_aadhar."', `email`='".$bio_email."', `pan_number`='".$bio_pan."', `present_address`='".$bio_p_addr."', `pre_statecode`='".$state_code."', `pre_pincode`='".$pincode."', `permanent_address`='".$bio_pre_addr."', `per_statecode`='".$state_code_2."', `per_pincode`='".$pincode_2."', `identification_mark`='".$all_bio_mark."', `religion`='".$bio_religion."', `community`='".$bio_commu."', `caste`='".$bio_cast."', `gender`='".$bio_gender."', `marrital_status`='".$bio_marriage_status."', `recruit_code`='".$bio_req_code."', `group_col`='".$bio_grp."', `education_ini`='".$all_bio_edu."', `edu_desc_ini`='".$all_bio_edu_desc."', `education_sub`='".$all_bio_edu_sub."', `edu_desc_sub`='".$all_bio_edu_desc_sub."', `bank_name`= '".$bio_bank_name."', `account_number`='".$bio_acc_no."', `micr_number`= '".$bio_micr."', `ifsc_code`= '".$bio_ifsc."', `ruid_no`= '".$bio_ruid."', `nps_no`= '".$bio_pran."', `bank_address`= '".$bio_bank_address."', `imagefile`='".$newfilename."', `updated_by`='".$_SESSION['id']."', `date_time`=NOW(), `identity_number`='$bio_id_no' WHERE `pf_number` = '".$bio_pf_no."'");
			
		}
			dbcon1();
			
			if($result1 && $result2)
			{
				/* echo $img_tmp_name."<br>";
				echo $folder_name."<br>".$newfilename; */
				move_uploaded_file($img_tmp_name,$folder_name.$newfilename);
			
				/* $action_on=$bio_pf_no;
				create_log($action,$action_on); */
			
			   echo "<script>window.location='biodata_update.php';alert('Bio Data updated successfully');</script>";
			}else
			{
				echo $update_bio_temp_sql."<br/>".$insert_bio_track_sql;
				echo "<script>window.location='biodata_update.php';alert('Failed to update. Please try again');</script>";
			} 
		break;
	}
}
?>