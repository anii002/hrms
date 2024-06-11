<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

$db->selection_calendar_connect();
$temp=array();
	$temp[0]['name']="Select Category";
	$cnt = 1;
	$query=mysql_query("SELECT categary FROM category_new");
	
                while($value = mysql_fetch_array($query))
                {
					
					$temp[$cnt++]['name']=$value['categary'];
					
					
					
                  
                }
				//array_push($response,$temp);
				echo json_encode($temp);
	
	




?>