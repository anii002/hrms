<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
require_once  'DB_function.php';
$db1=new DB_Function();
//json Array Response
$response=array("error"=>FALSE);
$mob = '';
if(isset($_REQUEST['empid'])&&isset($_REQUEST['grType'])&&isset($_REQUEST['grRefNo'])&&isset($_REQUEST['empType'])&&isset($_REQUEST['description']))
{
	$empid=$_REQUEST['empid'];
	$grType=$_REQUEST['grType'];
	$empType=$_REQUEST['empType'];
	$description=$_REQUEST['description'];
	$grRefNo=$_REQUEST['grRefNo'];
	
	if(!$db1->isUserExisted($empid))
	{
		
		$response["error"]=TRUE;
		$response["error_msg"]="User Not Existed with ".$empid;
		echo json_encode($response);
	}else
	{
		$db->hrms_connect();
		$selectMobile=mysql_query("SELECT emp_name,mobile FROM emp_master1 WHERE emp_no='$empid'");
	$result1=mysql_fetch_array($selectMobile);
	$mobile=$result1['mobile'];
	$mob =$result1['mobile'];
	$name=$result1['emp_name'];
		$db->gr_connect();
		$selectQuery=mysql_query("SELECT cat_id FROM category WHERE cat_name='$grType'");
	$result=mysql_fetch_array($selectQuery);
	$cat_id=$result['cat_id'];
	
	/*$insertQuery=mysql_query("INSERT INTO tbl_grievance(emp_id,emp_name,mobile_no,gri_ref_no,gri_type,gri_desc,gri_upload_date,status) VALUES('".$empid."','".$name."','".$mobile."','".$grRefNo."','".$cat_id."','".$description."',NOW(),'1')");*/
	$insertQuery = mysql_query("INSERT INTO `tbl_grievance`(`emp_id`, `gri_ref_no`, `gri_type`, `gri_desc`, `gri_upload_date`, `status`, `uploaded_by`) VALUES ('".$empid."','".$grRefNo."','".$cat_id."','".$description."',NOW(),'1','".$empid."')");
	
	
	
	if($insertQuery)
	{
		$sent=sendSMS($mob,$grRefNo,$name);
		if($sent)
		{
			$response["error"]=False;
			$response["error_msg"]="Grievance  registered  successfully , and a SMS has been sent to your registered mobile no";
			echo json_encode($response);
		}else
		{
			$response["error"]=False;
			$response["error_msg"]="Grievance registered successfully";
			echo json_encode($response);
		}
		
	}else
	{
		$response["error"]=TRUE;
		$response["error_msg"]="Grievance registration failed";
		echo json_encode($response);
	}
	}
	
	
	
}
else{
	$response["error"]=TRUE;
	$response["error_msg"]="Required  parameters are missing";
	echo json_encode($response);
}

function sendSMS($mobile,$refNo,$name)
{
	
	// Code to Send sms starts here
				  				  
				  //Your authentication key
					/*$authKey = "70302AbSftnyOwtvs53d8e401";
					
					//Multiple mobiles numbers separated by comma
					//$mobileNumber = $result_set['mobile'];
					
					//Sender ID,While using route4 sender id should be 6 characters long.
					$senderId = "FINSUR";
					
					//Your message to send, Add URL encoding here.
					$msg = "Hi, $name Your Grievance has been successfully registered with Ref No:- $refNo   Thanks.";
					$message = urlencode("$msg");
					
					//Define route 
					$route = 4;
					//Prepare you post parameters
					$postData = array(
					'authkey' => $authKey,
					'mobiles' => $mobile,
					'message' => $message,
					'sender' => $senderId,
					'route' => $route
					);
					
					//API URL
					$url="http://smsindia.techmartonline.com/sendhttp.php";
					
					//init the resource
					$ch = curl_init();
					curl_setopt_array($ch, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $postData
					//,CURLOPT_FOLLOWLOCATION => true
					));
					
					
					//Ignore SSL certificate verification
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					
					
					//get response
					$output = curl_exec($ch);
					
					//Print error if any
					if(curl_errno($ch))
					{
						return false;
						
					}
					else{
						//echo "<script>alert('OTP has been sent on your registered mobile //".$result_set['mobile'].".');window.location='forgotpass.php?q=otp';</script>";
						return true;
					}
					//$_SESSION['empid']=$_REQUEST['empid'];
					curl_close($ch);
				return null;*/
				
		$username = "ITsrdpo";
		$password = "chandra1";
		$type="TEXT";
		$sender = "SURRLY";
		$mobile = $mob;
		$msg = "Hi, ".$name." Your Grievance has been successfully registered with Ref No- ".$refNo.". Thank you.";
		$message = urlencode($msg);
		$baseurl = "http://infoigy001.mediaalertbox.in/sendsms/sendsms.php";
		$url = $baseurl."?username=".$username."&password=".$password."&type=".$type."&sender=".$sender."&mobile=".$mobile."&message=".$message;
		$return = file($url);
		$string_version = implode(',', $return);
		if(strpos($string_version, "SUBMIT_SUCCESS") !== "SUBMIT_SUCCESS"){
			$response["error"]=FALSE;
			$response["error_msg"]="Grievance Added Successfully..";
			echo json_encode($response);	
			//$db1->hrms_connect();
			//$query_insert = mysql_query("insert into tbl_otp(emp_id,otp,sent) values('".$emp_id."','$otp',CURRENT_TIMESTAMP)");
			
		}else{
			$response["error"]=TRUE;
			$response["error_msg"] = curl_error($ch);
			 echo json_encode($response);
		}


}
?>