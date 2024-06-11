<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectFamily=mysql_query("SELECT * FROM family_temp WHERE emp_pf='".$empid."'");
$db->sr_new_connect();
while($val=mysql_fetch_array($selectFamily))
{


	$temp=array();
	
	
	$upDate=$val['fmy_updatedate'];
	if(strlen($upDate)>10)
	{
	$rest=substr($upDate,0,-8);
	$temp['fmy_updatedate']=$rest;
	}else
	{
		$temp['fmy_updatedate']=$val['fmy_updatedate'];
	}
	
	$temp['fmy_member']=$val['fmy_member'];
	$rel=$val['fmy_rel'];
	
	$rel_query=mysql_query("SELECT shortdesc FROM relation WHERE code='".$rel."'");
	$res=mysql_fetch_array($rel_query);
	$temp['fmy_rel']=$res['shortdesc'];
	
	$gender=$val['fmy_gender'];
	$gender_query=mysql_query("SELECT gender FROM gender WHERE id='".$gender."'");
	$res_gender=mysql_fetch_array($gender_query);
	$temp['fmy_gender']=$res_gender['gender'];
	
	$dob=$val['fmy_dob'];
	if(strlen($dob)>10)
	{
	$restDOB=substr($dob,0,-8);
	$temp['fmy_dob']=$restDOB;
	}else
	{
		$temp['fmy_dob']=$val['fmy_dob'];
	}
	
	
	array_push($response,$temp);
}
echo json_encode($response);
}


?>