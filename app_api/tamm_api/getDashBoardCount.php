<?php
require_once 'DB_function.php';
$db=new DB_Function();

$response=array();

if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	
	$query=mysql_query("SELECT empid FROM forward_data WHERE fowarded_to='".$empid."'");
	$res=mysql_num_rows($query);
	
	$response['user']['claim']=$res;
	
	$query1=mysql_query("SELECT * FROM forward_data WHERE fowarded_to='04395207' AND hold_status='1'");
	$res1=mysql_num_rows($query1);
	
	$response['user']['pending']=$res1;
	
	$query2=mysql_query("SELECT * FROM forward_data WHERE fowarded_to='04395207' AND hold_status='0'");
	$res2=mysql_num_rows($query2);
	
	$response['user']['approved']=$res2;
	
	$query3=mysql_query("SELECT pfno FROM employees");
	$res3=mysql_num_rows($query3);
	
	
	$response['user']['employees']=$res3;
	
	echo json_encode($response);
	
	
}




?>