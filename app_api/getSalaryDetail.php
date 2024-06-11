<?php

require_once 'DB_connect.php';
$db1=new DB_Connect();

//json Array Response
$response=array("error"=>FALSE);
if(isset($_REQUEST['emp_id'])&&isset($_REQUEST['date']))
{
	//receiving the Post Parameter
	$emp_id=$_REQUEST['emp_id'];
	$date=$_REQUEST['date'];
	$db1->hrms_connect();
	$selectQuery=mysql_query("SELECT bill_unit,gross_pay,total_deduction,net_pay FROM pay_master WHERE emp_no='$emp_id' AND pay_cal_period='$date'");
	$result=mysql_fetch_array($selectQuery);
	
	if($result>0)
	{
		$response["error"] =FALSE;
		
		
	
            //$response["uid"] = $user["unique_id"];
				$response["user"]["bill_unit"] = $result["bill_unit"];
				$response["user"]["gross_pay"] = $result["gross_pay"];			
				$response["user"]["net_pay"]=$result["net_pay"];
				$response["user"]["total_deduction"]=$result["total_deduction"];
				
				
				
           
				echo json_encode($response);
	}else
	{
		$response["error"]=TRUE;
		$response["error_msg"]="Record Not Found";
		echo json_encode($response);
	}
	
	
}	
else
{	$response["error"] = TRUE;
	$response["error_msg"] = "Required parameters (userId or password) is missing!";
	echo json_encode($response);
}
?>