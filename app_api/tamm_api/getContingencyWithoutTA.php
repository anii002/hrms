<?php

require_once 'DB_function.php';
$db1=new DB_Function();
$response=array();
if(isset($_REQUEST['empid']))
{
	$empid=$_REQUEST['empid'];
	
	
	
	$query=mysql_query("SELECT reference_no,month,total_amount,objective FROM master_cont WHERE empid='".$empid."' AND forward_status='0'");
	// $res_id=mysql_fetch_array($query);
	
	// $select_contingency=mysql_query("SELECT cntdate,cntfrom,cntTo,kms,rate_per_km,total_amount FROM continjency WHERE cid='".$res_id['id']."'");
	
	while($val=mysql_fetch_array($query))
	{
		$temp=array();
		
		$temp['reference_no']=$val['reference_no'];
		$temp['month']=$val['month'];
		$temp['total_amount']=$val['total_amount'];
		$temp['objective']=$val['objective'];
		
		
		array_push($response,$temp);
	}
	
	echo json_encode($response);
	
	
}


?>