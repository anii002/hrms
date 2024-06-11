<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectIniAppoint=mysql_query("SELECT * FROM appointment_temp WHERE app_pf_number='".$empid."'");
$val=mysql_fetch_array($selectIniAppoint);


	$temp=array();
	
	$temp['pfNumber']=$val['app_pf_number'];
	$app_department=$val['app_department'];
	$app_designation=$val['app_designation'];
	$temp['app_date']=$val['app_date'];
	$temp['app_regul_date']=$val['app_regul_date'];
	$app_payscale=$val['app_payscale'];
	$temp['app_scale']=$val['app_scale'];
	$temp['app_level']=$val['app_level'];
	$app_group=$val['app_group'];
	$app_station=$val['app_station'];
	$temp['app_rop']=$val['app_rop'];
	$temp['app_letter_date']=$val['app_letter_date'];
	$temp['app_remark']=$val['app_remark'];
	$temp['app_refno']=$val['app_refno'];
	$app_depot=$val['app_depot'];
	$app_type=$val['app_type'];
	
	$db->sr_new_connect();
	
	
	$selectDep=mysql_query("SELECT DEPTDESC FROM department WHERE id='".$app_department."'");
	$resDep=mysql_fetch_array($selectDep);
	
	$temp['dept']=$resDep['DEPTDESC'];
	
	$selectDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$app_designation."'");
	$resDesig=mysql_fetch_array($selectDesig);
	
	$temp['desig']=$resDesig['desigshortdesc'];
	
	$selectPayscale=mysql_query("SELECT type FROM pay_scale_type WHERE id='".$app_payscale."'");
	$resPayscale=mysql_fetch_array($selectPayscale);
	
	$temp['pay_scale_type']=$resPayscale['type'];
	
	$selectGroup=mysql_query("SELECT group_col FROM group_col WHERE id='".$app_group."'");
	$resGroupCol=mysql_fetch_array($selectGroup);
	
	$temp['group']=$resGroupCol['group_col'];
	
	$selectStation=mysql_query("SELECT stationdesc FROM station WHERE stationcode='".$app_station."'");
	$resStation=mysql_fetch_array($selectStation);
	
	$temp['station']=$resStation['stationdesc'];
	
	$selectDepot=mysql_query("SELECT DESCRIPTION FROM depot WHERE id='".$app_depot."'");
	$resDepot=mysql_fetch_array($selectDepot);
	
	$temp['depot']=$resDepot['DESCRIPTION'];
	
	$selectAppType=mysql_query("SELECT type FROM appointment_type WHERE id='".$app_type."'");
	$resAppType=mysql_fetch_array($selectAppType);
	
	$temp['app_type']=$resAppType['type'];
	
	
	array_push($response,$temp);

echo json_encode($response);
}


?>