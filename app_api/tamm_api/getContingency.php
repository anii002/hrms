<?php

require_once 'DB_function.php';
$db1=new DB_Function();
$response=array();
if(isset($_REQUEST['referenceno'])&&isset($_REQUEST['set_number']))
{
	$refNo=$_REQUEST['referenceno'];
	$setNo=$_REQUEST['set_number'];
	
	if($setNo=='0')
	{
		$query=mysql_query("SELECT id FROM master_cont WHERE reference_no='".$refNo."'");
	$res_id=mysql_fetch_array($query);
	
	$select_contingency=mysql_query("SELECT cont_date,from_place,to_place,kms,rate,amount FROM add_cont WHERE set_no='".$res_id['id']."'");
	
	while($val=mysql_fetch_array($select_contingency))
	{
		$temp=array();
		
		$temp['cont_date']=$val['cont_date'];
		$temp['cont_from']=$val['from_place'];
		$temp['cont_to']=$val['to_place'];
		$temp['kms']=$val['kms'];
		$temp['rate_per_km']=$val['rate'];
		$temp['total_amount']=$val['amount'];
		
		array_push($response,$temp);
	}
	
	echo json_encode($response);
	}else
	{
	// echo "cont with TA";
	$query=mysql_query("SELECT id FROM continjency_master WHERE reference='".$refNo."' AND set_number='".$setNo."'");
	$res_id=mysql_fetch_array($query);
	
	$select_contingency=mysql_query("SELECT cntdate,cntfrom,cntTo,kms,rate_per_km,total_amount FROM continjency WHERE cid='".$res_id['id']."'");
	
	while($val=mysql_fetch_array($select_contingency))
	{
		$temp=array();
		
		$temp['cont_date']=$val['cntdate'];
		$temp['cont_from']=$val['cntfrom'];
		$temp['cont_to']=$val['cntTo'];
		$temp['kms']=$val['kms'];
		$temp['rate_per_km']=$val['rate_per_km'];
		$temp['total_amount']=$val['total_amount'];
		
		array_push($response,$temp);
	}
	
	echo json_encode($response);
	}
	
}


?>