<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();

$db->selection_calendar_connect();
	$query=mysql_query("SELECT dept FROM department");
	$temp=array();
	$temp[0]['name']="Select Department";
	$cnt = 1;
                while($value = mysql_fetch_array($query))
                {
					
					$temp[$cnt++]['name']=$value['dept'];
					
					
					
                  
                }
				//array_push($response,$temp);
				echo json_encode($temp);
	
	




?>