<?php
require_once 'DB_connect.php';
require_once 'DB_function.php';
$db=new DB_Connect();
$db1=new DB_Function();
$response=array();

	// $desig=$_REQUEST['desig'];
	// $desig1=str_replace('_',' ',$desig);
	
		 $db->railway_master_connect();
		
		$query=mysql_query("SELECT * FROM station where divisioncode='SUR'");
		
// 		echo 'error'.mysql_error();
		
	$temp1=array();
	
	
				$temp1['name']="Select Station";
				$temp1['id']='0';
				
				array_push($response,$temp1);
                while($value = mysql_fetch_array($query))
                {
					
					
					$temp['name']=$value['stationdesc'];
					$temp['id']=$value['stationcode'];
					
					
					array_push($response,$temp+$temp1);
					
                  
                }
				
				
				echo json_encode($response);
	


?>