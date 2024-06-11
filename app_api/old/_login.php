<?php

require_once 'DB_function.php';
$db1=new DB_Function();

//json Array Response
$response=array("error"=>FALSE);
if(isset($_REQUEST['user_id'])&&isset($_REQUEST['password']))
{
	//receiving the Post Parameter
	$user_id=$_REQUEST['user_id'];
	$password=$_REQUEST['password'];
	
	if(!$db1->isUserExisted($user_id))
	{
		//user Already Existed
		$response["error"]=TRUE;
		$response["error_msg"]="User Not Existed with ".$user_id;
		echo json_encode($response);
	}
	else
	{
		$user=$db1->getUserByUserIdAndPassword($user_id,$password);
		if($user)
		{
			//session_start();
			
			//$audit=mysql_query("INSERT INTO audit_table VALUES empid=$user_id,action='Login',message='User Logged In Successfully Through //App',created_at=NOW(),status='0'");
				$response["error"] =FALSE;
            //$response["uid"] = $user["unique_id"];
				$response["user"]["name"] = $user["emp_name"];
				$response["user"]["userid"] = $user["emp_no"];
				
				$desig=$user["desig_code"];
				$selectDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE desigcode='$desig'");
				$resultDesig=mysql_fetch_array($selectDesig);
				$response["user"]["desig"] = $resultDesig["desigshortdesc"];
				
				
				$response["user"]["dob"]=$user["birth_date"];
				
				$dept=$user["dept_code"];
				$selectDept=mysql_query("SELECT DEPTDESC FROM department WHERE DEPTNO=$dept");
				$resultDept=mysql_fetch_array($selectDept);
				$response["user"]["department"] = $resultDept["DEPTDESC"];
				
				$response["user"]["mobile"]=$user["mobile"];
				$response["user"]["email"]=$user["email"];
				$response["user"]["login_flag"]=$user["first_login"];
				$response["user"]["password"]=$user["password"];
				$response["user"]["station"]=$user["station_code"];
				
				
           
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