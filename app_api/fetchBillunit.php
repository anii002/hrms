<?php
require_once 'DB_connect.php';
require_once 'DB_function.php';
$db=new DB_Connect();
$db1=new DB_Function();
$response=array();

	// $desig=$_REQUEST['desig'];
	// $desig1=str_replace('_',' ',$desig);
	
// 		 $db->ebooklet_scr_head_quarter_connect();
		
		$query=mysql_query("SELECT id,billunit FROM billunit");
	$temp1=array();
	
	
				$temp1['name']="Select Billunit";
				$temp1['id']='0';
				
				array_push($response,$temp1);
                while($value = mysql_fetch_array($query))
                {
					
					
					$temp['name']=$value['billunit'];
					$temp['id']=$value['id'];
					
					
					array_push($response,$temp+$temp1);
					
                  
                }
				
				
				echo json_encode($response);
	


?>