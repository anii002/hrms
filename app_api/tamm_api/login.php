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
				$response["user"]["name"] = $user["name"];
				$response["user"]["userid"] = $user["pfno"];
				$response["user"]["desig"] = $user["desig"];
				$response["user"]["level"]=$user["level"];
				$response["user"]["department"]=$user["dept"];
				$response["user"]["mobile"]=$user["mobile"];
				$response["user"]["email"]=$user["email"];
				$response["user"]["login_flag"]=$user["first_login"];
				$response["user"]["password"]=$user["psw"];
				
				
           
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