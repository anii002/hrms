<?php

include_once('../dbconfig/dbcon.php');

include_once('sr_function.php');

error_reporting(0);

if (isset($_REQUEST['action'])) {

	switch (strtolower($_REQUEST['action'])) {  



		case 'get_bio_data':

			$data = '';

			session_start();

			$conn1=dbcon1();

			$bio_sql = "SELECT * FROM `biodata_temp` WHERE `pf_number` = '".$_SESSION['same_pf_no']."'";

			$bio_query = mysqli_query($conn1,$bio_sql);

			if($bio_query){

				while($bio_data = mysqli_fetch_assoc($bio_query)){

					$data .= $bio_data['oldpf_number']."$".$bio_data['identity_number']."$".$bio_data['sr_no']."$".date('d-m-Y',strtotime($bio_data['dob']))."$".$bio_data['aadhar_number']."$".$bio_data['emp_name']."$".$bio_data['emp_old_name']."$".get_gender_data($bio_data['gender'])."$".get_marital_status($bio_data['marrital_status'])."$".$bio_data['f_h_name']."$".$bio_data['cug']."$".$bio_data['mobile_number']."$".$bio_data['nps_no']."$".$bio_data['ruid_no']."$".$bio_data['pan_number']."$".$bio_data['email']."$".$bio_data['present_address']."$".get_state_data($bio_data['pre_statecode'])."$".get_pincode_data($bio_data['pre_pincode'],$bio_data['pre_statecode'])."$".$bio_data['permanent_address']."$".get_state_data($bio_data['per_statecode'])."$".get_pincode_data($bio_data['per_pincode'],$bio_data['pre_statecode'])."$".get_mark_data($bio_data['identification_mark'])."$".get_reli_data($bio_data['religion'])."$".get_community_data($bio_data['community'])."$".$bio_data['caste']."$".get_recruitment_data($bio_data['recruit_code'])."$".get_group_data($bio_data['group_col'])."$".get_iniEduction($bio_data['education_ini'], $bio_data['edu_desc_ini'])."$".get_subEduction($bio_data['education_sub'], $bio_data['edu_desc_sub'])."$".$bio_data['bank_name']."$".$bio_data['account_number']."$".$bio_data['micr_number']."$".$bio_data['ifsc_code']."$".$bio_data['bank_address']."$".$bio_data['pf_number']."$".$bio_data['imagefile'];

				}

				echo $data;

			}else{

				echo "No Bio Record Found!!!";

			}



		break;



		

	}

}

?>