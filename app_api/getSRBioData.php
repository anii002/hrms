<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectBiodata=mysql_query("SELECT * FROM biodata_temp WHERE pf_number='".$empid."'");
$val=mysql_fetch_array($selectBiodata);


	$temp=array();
	
	$temp['pfNumber']=$val['pf_number'];
	$temp['oldPFNumber']=$val['oldpf_number'];
	$temp['identity_number']=$val['identity_number'];
	$temp['sr_no']=$val['sr_no'];
	$temp['dob']=$val['dob'];
	$temp['mobile_number']=$val['mobile_number'];
	$temp['emp_name']=$val['emp_name'];
	$temp['emp_old_name']=$val['emp_old_name'];
	$temp['f_h_name']=$val['f_h_name'];
	$temp['cug']=$val['cug'];
	$temp['aadhar_number']=$val['aadhar_number'];
	$temp['email']=$val['email'];
	$temp['pan_number']=$val['pan_number'];
	$temp['present_address']=$val['present_address'];
	$temp['permanent_address']=$val['permanent_address'];
	$temp['identification_mark']=$val['identification_mark'];
	$temp['nps_no']=$val['nps_no'];
	$db->sr_new_connect();
	$marital_status=$val['marrital_status'];
	$selectMaritalStatus=mysql_query("SELECT shortdesc FROM marital_status WHERE id='".$marital_status."'");
	$resMaritalStatus=mysql_fetch_array($selectMaritalStatus);
	
	$temp['marital_status']=$resMaritalStatus['shortdesc'];
	
	
	$religion=$val['religion'];
	$selectReligion=mysql_query("SELECT shortdesc FROM religion WHERE id='".$religion."'");
	$resReligion=mysql_fetch_array($selectReligion);
	
	$temp['religion']=$resReligion['shortdesc'];
	
	$community=$val['community'];
	$selectCommunity=mysql_query("SELECT SHORTDESC FROM community WHERE id='".$community."'");
	$resCommunity=mysql_fetch_array($selectCommunity);
	
	$temp['community']=$resCommunity['SHORTDESC'];
	
	$temp['caste']=$val['caste'];
	
	$gender=$val['gender'];
	$selectGender=mysql_query("SELECT gender FROM gender WHERE id='".$gender."'");
	$resGender=mysql_fetch_array($selectGender);
	
	$temp['gender']=$resGender['gender'];
	
	$recruit_code=$val['recruit_code'];
	$selectRecruitment=mysql_query("SELECT shortdesc FROM recruitment WHERE id='".$recruit_code."'");
	$resRecruitment=mysql_fetch_array($selectRecruitment);
	
	$temp['recruit_code']=$resRecruitment['shortdesc'];
	
	$group_col=$val['group_col'];
	
	$selectGroup=mysql_query("SELECT group_col FROM group_col WHERE id='".$group_col."'");
	$resGroupCol=mysql_fetch_array($selectGroup);
	
	$temp['group_col']=$resGroupCol['group_col'];
	
	$education_ini=$val['education_ini'];
	$selectIniEdu=mysql_query("SELECT education FROM education WHERE id='".$education_ini."'");
	$resEduIni=mysql_fetch_array($selectIniEdu);
	
	$temp['education_ini']=$resEduIni['education'];
	
	
	$education_sub=$val['education_sub'];
	
	$selectSubEdu=mysql_query("SELECT education FROM education WHERE id='".$education_sub."'");
	$resEduSub=mysql_fetch_array($selectSubEdu);
	
	$temp['education_sub']=$resEduSub['education'];
	
	$temp['ruid_no']=$val['ruid_no'];
	$imagefile=$val['imagefile'];
	
	$imgUrl="http://drmpsur-hrms.in/e-sr/admin/upload_doc/".$imagefile."";
	
	
	
	$temp['imagefile']=$imgUrl;
	
	$ifsc=$val['ifsc_code'];
	$temp['account_no']=$val['account_number'];
	
	$bankDetail=mysql_query("SELECT bank_name,micr_code,address FROM bank_detail WHERE ifsc_code='".$ifsc."'");
	$resBank=mysql_fetch_array($bankDetail);
	
	$temp['bank_name']=$resBank['bank_name'];
	$temp['micr_code']=$resBank['micr_code'];
	$temp['bank_address']=$resBank['address'];
	$temp['ifsc_code']=$ifsc;
	$temp['pre_statecode']=$val['pre_statecode'];
	$temp['per_statecode']=$val['per_statecode'];
	$temp['pre_pincode']=$val['pre_pincode'];
	$temp['per_pincode']=$val['per_pincode'];
	
	array_push($response,$temp);

echo json_encode($response);
}


?>