<?php
require_once 'DB_connect.php';
require_once 'DB_function.php';
$db=new DB_Connect();
$db1=new DB_Function();
$response=array();

	// $desig=$_REQUEST['desig'];
	// $desig1=str_replace('_',' ',$desig);
	
		 $db->railway_master_connect();
		
		$query=mysql_query("SELECT DEPTNO,DEPTDESC FROM departments");
		
// 		echo 'error'.mysql_error();
		
	$temp1=array();
	
	
				$temp1['name']="Select Department";
				$temp1['id']='0';
				
				array_push($response,$temp1);
                while($value = mysql_fetch_array($query))
                {
					
					
					$temp['name']=$value['DEPTDESC'];
					$temp['id']=$value['DEPTNO'];
					
					
					array_push($response,$temp+$temp1);
					
                  
                }
				
				
				echo json_encode($response);
	


?>