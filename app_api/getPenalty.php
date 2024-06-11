<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectPenalty=mysql_query("SELECT * FROM penalty_temp WHERE pen_pf_number='".$empid."'");
$db->sr_new_connect();
while($val=mysql_fetch_array($selectPenalty))
{


	$temp=array();
	
	
	$temp['pf_number']=$val['pen_pf_number'];
	$pen_type=$val['pen_type'];
	
	$selectPenType=mysql_query("SELECT type FROM penalty_type WHERE id='".$pen_type."'");
	$resPenType=mysql_fetch_array($selectPenType);
	
	$temp['pen_type']=$resPenType['type'];
	$temp['pen_issued']=$val['pen_issued'];
	$temp['pen_effected']=$val['pen_effetcted'];
	$temp['pen_letterno']=$val['pen_letterno'];
	$temp['pen_letter_date']=$val['pen_letterdate'];
	$chargeSheetStatus=$val['pen_chargestatus'];
	
	
	$selectChargeStatus=mysql_query("SELECT charge_sheet_status FROM charge_sheet_status WHERE id='".$chargeSheetStatus."'");
	$resChargeStatus=mysql_fetch_array($selectChargeStatus);
	
	$temp['charge_status']=$resChargeStatus['charge_sheet_status'];
	$temp['charge_ref']=$val['pen_chargeref'];
	$temp['from_date']=$val['pen_from'];
	$temp['to_date']=$val['pen_to'];
	$temp['remark']=$val['pen_remark'];
	
	
	
	
	array_push($response,$temp);
}
echo json_encode($response);
}


?>