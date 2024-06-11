<?php 

require_once 'DB_function.php';

$db1=new DB_Function();
$response=array("error"=>FALSE);

	if(isset($_REQUEST['otp'])&&isset($_REQUEST['password'])&&isset($_REQUEST['emp_id']))
	{
		
		$otp=$_REQUEST['otp'];
		$emp_id=$_REQUEST['emp_id'];
		$pass=$_REQUEST['password'];
		
				
				
			$query_select = mysql_query("SELECT otp FROM tbl_otp WHERE emp_id='".$emp_id."' ORDER BY id DESC LIMIT 1");
			$result=mysql_fetch_array($query_select);
				
				$otp1=$result["otp"];
				echo "db=$otp1";
				echo "sent-$otp";
				if($otp1==$otp)
				{
					$update_query=mysql_query("UPDATE emp_master1 SET password='".$db1->hashPassword($pass,SALT1,SALT2)."',first_login='1' WHERE emp_no='".$emp_id."'");
					
					$query_delete=mysql_query("DELETE FROM tbl_otp WHERE emp_id='".$emp_id."' and otp='".$otp."'");
					
					
					
					$response["error"]=FALSE;
					$response["error_msg"]="OTP ";
					
					echo json_encode($response);
					
				}else
				{
					
				$response["error"]=TRUE;
				$response["error_msg"]="Wrong OTP$otp1";
				echo json_encode($response);
				}
				
				
	}
	else{
		$response["error"]=TRUE;
				$response["error_msg"]="Required Parameter are missing";
				echo json_encode($response);
	}
?>