<?php
require_once 'DB_connect.php';

$db=new DB_Connect();

$response=array();

	$dept=$_REQUEST['dept'];
	// $desig1=str_replace('_',' ',$desig);
	
		 $db->hrms_sur_connect();
		 
		 $dept=$_REQUEST['dept'];
		
		$query=mysql_query("SELECT DESIGCODE,DESIGLONGDESC FROM designations ");
		
// 		echo "error".mysql_error();
	$temp1=array();
	
	
				$temp1['name']="Select Designation";
				$temp1['id']='0';
				
				array_push($response,$temp1);
                while($value = mysql_fetch_array($query))
                {
					
					
					$temp['name']=$value['DESIGLONGDESC'];
					$temp['id']=$value['DESIGCODE'];
					
					
					array_push($response,$temp+$temp1);
					
                  
                }
				
				
				echo json_encode($response);
	


?>