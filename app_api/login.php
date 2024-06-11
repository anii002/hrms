<?php

require_once 'DB_function.php';
require_once 'DB_connect.php';
$db1=new DB_Function();
$db=new DB_Connect();

//json Array Response
$response=array("error"=>FALSE);
if(isset($_REQUEST['user_id'])&&isset($_REQUEST['password']))
{
	//receiving the Post Parameter
	$user_id=$_REQUEST['user_id'];
	$password=$_REQUEST['password'];
	
	if(!$db1->isUserExisted($user_id))
	{
		
		$response["error"]=TRUE;
		$response["error_msg"]="User Not Existed with ".$user_id;
		echo json_encode($response);
	}
	else
	{
		$user=$db1->getUserByUserIdAndPassword($user_id,$password);
		if($user)
		{
		//  print_r($user);
			//sess0on_start();
			
			//$audit=mysql_query("INSERT INTO audit_table VALUES empid=$user_id,action='Login',message='User Logged In Successfully Through //App',created_at=NOW(),status='0'");
				$response["error"] =FALSE;
            //$response["uid"] = $user["unique_id"];
				// $response["user"]["name"] = $user["emp_name"];
				$response["user"]["mobile"]=$user["mobile"];
				$db->hrms_sur_connect();
				
					$stmt=mysql_query("SELECT * FROM prmaemp WHERE empno='$user_id'");
					
					
					
		
// 		echo "error".mysql_error();
		
	//ser=mysql_fetch_array($stmt);
				
				$desig=$user["designation"];
			//cho $desig;
				$selectDesig=mysql_query("SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE='$desig'");
				$resultDesig=mysql_fetch_array($selectDesig);
				$response["user"]["desig"] = $resultDesig["DESIGLONGDESC"];
				
				
				$response["user"]["dob"]=$user["dob"];
				$response["user"]["name"]=$user["name"];    
				$response["user"]["userid"] = $user["emp_no"];
				
				
				
				$dept=$user["department"];
				$selectDept=mysql_query("SELECT DEPTDESC FROM department WHERE DEPTNO=$dept");
			
				$resultDept=mysql_fetch_array($selectDept);
			
				$response["user"]["department"] = $resultDept["DEPTDESC"];
				
				
				$response["user"]["email"]=$user["emp_email"];
				$response["user"]["login_flag"]="";
				$response["user"]["password"]=$user["password"];
				
				$station=$user["station"];
				
				//$db->hrms_ta_connect();
				
				$selectStation=mysql_query("SELECT stationdesc FROM station WHERE stationcode='$station'");
				
				// echo 'station'."SELECT stationdesc FROM station WHERE stationcode=$station";
				$resultStation=mysql_fetch_array($selectStation);
				
				$response["user"]["station"]=$resultStation["stationdesc"].mysql_error();
				
				$response["user"]["user_level"]=$user["7th_pay_level"];
				
				$db->hrms_ta_connect();
				
				// $level_q=mysql_query("SELECT LEVEL FROM `employees` where pfno='".$user_id."' ");
				// 	$level_row=mysql_fetch_array($level_q);
				// 	$lev= $level_row['LEVEL'];
					$lev= $user["7th_pay_level"];;
					
					$level_q1=mysql_query("SELECT amount from ta_amount WHERE min<=$lev AND max>=$lev");
			
					$level_row1=mysql_fetch_array($level_q1);
			
					$user_amount= $level_row1['amount'];
					
					$response["user"]["user_amount"]=$user_amount;
				
           
				echo json_encode($response);
        } else {
            // user failed to store
				$response["error"] = TRUE;
				$response["error_msg"] = " Wrong Credentials!";
				echo json_encode($response);
        }
	}
}	
else
{	$response["error"] = TRUE;
	$response["error_msg"] = "Required parameters (userId or password) is missing!";
	echo json_encode($response);
}
?>