<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectIniAppoint=mysql_query("SELECT * FROM present_work_temp WHERE preapp_pf_number='".$empid."'");
$val=mysql_fetch_array($selectIniAppoint);


	$temp=array();
	
	$temp['pfNumber']=$val['preapp_pf_number'];
	$app_department=$val['preapp_department'];
	$app_designation=$val['preapp_designation'];
	$app_payscale=$val['ps_type'];
	$temp['app_scale']=$val['preapp_scale'];
	$temp['app_level']=$val['preapp_level'];
	$app_group=$val['preapp_group'];
	$app_station=$val['preapp_station'];
	$preapp_billunit=$val['preapp_billunit'];
	$temp['app_rop']=$val['preapp_rop'];
	$app_depot=$val['preapp_depot'];
	
	
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
	
	$selectBillUnit=mysql_query("SELECT billunit FROM billunit WHERE id='".$preapp_billunit."'");
	$resBillUnit=mysql_fetch_array($selectBillUnit);
	
	$temp['billunit']=$resBillUnit['billunit'];
	
	
	array_push($response,$temp);

echo json_encode($response);
}


?>