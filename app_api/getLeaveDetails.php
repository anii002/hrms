<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid'])&&$_REQUEST['year'])
{
	
	$empid=$_REQUEST['empid'];
	$year=$_REQUEST['year'];
	$db->hrms_connect();
$selectLAPLeave=mysql_query("SELECT leave_ob FROM tbl_leave WHERE emp_no='".$empid."' AND leave_code='11' AND leave_yr='".$year."'");
$val=mysql_fetch_array($selectLAPLeave);

$selectLHAPLeave=mysql_query("SELECT leave_ob,bill_unit FROM tbl_leave WHERE emp_no='".$empid."' AND leave_code='31' AND leave_yr='".$year."'");
$val1=mysql_fetch_array($selectLHAPLeave);
	$temp=array();
	
	$temp['billunit']=$val1['bill_unit'];
	$temp['lap']=$val['leave_ob'];
	
	$temp['lhap']=$val1['leave_ob'];
	
	array_push($response,$temp);

echo json_encode($response);
}


?>