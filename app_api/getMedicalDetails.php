<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid'])&&isset($_REQUEST['medtype'])&&isset($_REQUEST['date']))
{
	
	$MedType=$_REQUEST['medtype'];
	$date=$_REQUEST['date'];
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectMedical=mysql_query("SELECT m.medi_pf_number,m.medi_examtype,m.medi_cate,m.medi_dob,m.medi_appo_date,m.medi_class, m.medi_certino, m.medi_certidate, m.medi_refno, m.medi_refdate,m.updated_by,m.updated_datetime,a.app_date,a.app_designation FROM medical_temp m INNER JOIN appointment_temp a ON m.medi_pf_number=a.app_pf_number WHERE m.medi_pf_number='".$empid."' AND m.medi_examtype='".$MedType."' AND m.medi_certidate='".$date."'");
$val=mysql_fetch_array($selectMedical);


	$temp=array();
	
	$temp['medi_pf_number']=$val['medi_pf_number'];
	$temp['medi_examtype']=$val['medi_examtype'];
	$medi_cate=$val['medi_cate'];
	$temp['medi_dob']=$val['medi_dob'];
	$temp['medi_appo_date']=$val['medi_appo_date'];
	$temp['medi_class']=$val['medi_class'];
	$temp['app_date']=$val['app_date'];
	$temp['medi_certino']=$val['medi_certino'];
	$temp['medi_certidate']=$val['medi_certidate'];
	$temp['medi_refno']=$val['medi_refno'];
	$temp['medi_refdate']=$val['medi_refdate'];
	$updated_by=$val['updated_by'];
	$temp['updated_datetime']=$val['updated_datetime'];
	$designation=$val['app_designation'];
	
	$db->sr_new_connect();
	
	$selectMediCat=mysql_query("SELECT longdesc FROM medical_classi WHERE id='".$medi_cate."'");
	$resMedCat=mysql_fetch_array($selectMediCat);
	
	$temp['medi_cat']=$resMedCat['longdesc'];
	
	
	$selectUpdatedBy=mysql_query("SELECT username FROM tbl_login WHERE adminid='".$updated_by."'");
	$resUpdatedBy=mysql_fetch_array($selectUpdatedBy);
	
	$temp['updated_by']=$resUpdatedBy['username'];
	
	$selectDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$designation."'");
	$resDesig=mysql_fetch_array($selectDesig);
	
	$temp['designation']=$resDesig['desigshortdesc'];
	
	array_push($response,$temp);

echo json_encode($response);
}


?>