<?php

require_once 'DB_function.php';
$db1=new DB_Function();

//json Array Response
$response=array("error"=>FALSE);
if(isset($_POST['user_id'])&&isset($_POST['password']))
{
	//receiving the Post Parameter
	$user_id=$_POST['user_id'];
	$password=$_POST['password'];
	
	
	
	if($db1->changePass($password,$user_id))
	{
		
		$response["error"]=FALSE;
		$response["error_msg"]="Password Changed Successfully for user- ".$user_id;
		echo json_encode($response);
	}
	else
	{
		$response["error"]=TRUE;
		$response["error_msg"]="Password Not Changed ".mysql_error();
		echo json_encode($response);
	}
		

}	
else
{	$response["error"] = TRUE;
	$response["error_msg"] = "Required parameters (userId or password) is missing!";
	echo json_encode($response);
}
?>