<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

$db->selection_calendar_connect();
$temp=array();
if(isset($_REQUEST['dept']))
{
	
	$dept=$_REQUEST['dept'];
	$dept1=str_replace('_',' ',$dept);
$selectDeptID=mysql_query("SELECT id FROM department WHERE dept='".$dept1."'");
$resDeptID=mysql_fetch_array($selectDeptID);


	$temp[0]['name']="Select Category";
	$cnt = 1;
	$query=mysql_query("SELECT categary FROM category_new WHERE dept='".$resDeptID['id']."'");
	
                while($value = mysql_fetch_array($query))
                {
					
					$temp[$cnt++]['name']=$value['categary'];
					
					
					
                  
                }
				//array_push($response,$temp);
				echo json_encode($temp);
	
	

}


?>