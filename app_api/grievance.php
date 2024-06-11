<?php
require_once 'DB_connect.php';
$db1=new DB_Connect();

$response=array("error"=>FALSE);
$mob = '';
if(isset($_REQUEST['name'])&&isset($_REQUEST['userid'])&&isset($_REQUEST['mobile'])&&isset($_REQUEST['grRefNo'])
&&isset($_REQUEST['grType'])&&isset($_REQUEST['description']))
{
    
    $doc = $_FILES['doc'];
    $fileinfo = pathinfo($_FILES['doc']['name']);
$extention= $fileinfo['extension'];
$server_ip = gethostbyname(gethostname());


	$imgPath1=$_FILES['doc']['name'];
	$imgTemp1=$_FILES['doc']['tmp_name'];
// $file_path1 = 'upload/'.$name.'.'.$extention; 

 date_default_timezone_set("Asia/Kolkata");
		$now=Date('d-m-Y');
     
     $dir = "../e-gr/admin/main/admin_upload/";
     
     
     
        $file_extension = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
        $file_size= array();
        $filepath="";
     //echo $_FILES["attach"]["name"];
          if($_FILES["doc"]["name"] != null)
          {
              
              move_uploaded_file($imgTemp1, $dir.$imgPath1);
              
                 
          }
    
	//date_default_timezone_set('Asia/Kolkata');
	$name=$_REQUEST['name'];
	$userid=$_REQUEST['userid'];
	$mobile=$_REQUEST['mobile'];
	$mob = $_REQUEST['mobile'];
//	$grRefNo=$_REQUEST['grRefNo'];
	$grRefNo=mt_rand(100000, 999999);
	$description=$_REQUEST['description'];
	$grType=$_REQUEST['grType'];
	$db1->gr_connect();
	$selectQuery=mysql_query("SELECT cat_id FROM category WHERE cat_name='$grType'");
	$result=mysql_fetch_array($selectQuery);
	$cat_id=$result['cat_id'];
	
	//$insertQuery=mysql_query("INSERT INTO tbl_grievance(emp_id,emp_name,mobile_no,gri_ref_no,gri_type,gri_desc,gri_upload_date,status) VALUES('".$userid."','".$name."','".$mobile."','".$grRefNo."','".$cat_id."','".$description."',NOW(),'1')");
	date_default_timezone_set("Asia/Kolkata");
	$current_date = date("Y-m-d H:i:s");
	$target_date = date("Y-m-d H:i:s", strtotime("$current_date +1 month -1 day"));
	$insertQuery = mysql_query("INSERT INTO `tbl_grievance`(`emp_id`, `gri_ref_no`, `gri_type`, `gri_desc`, `gri_upload_date`, `status`, `uploaded_by`,`gri_target_date`) VALUES ('".$userid."','".$grRefNo."','".$cat_id."','".$description."','$current_date','1','".$userid."','$target_date')");
	
// 		$sql_insert = "insert into tbl_grievance(emp_id,gri_ref_no,gri_type,gri_desc,up_doc,doc_id,gri_upload_date,gri_target_date,status) values('$hidden_id','$gri_ref_no','$select_type','$_gri_desc','$optradio','$last_doc','$current_date','$target_date','1')";
	if($insertQuery)
	{
		$sent=sendSMS($mob,$grRefNo);
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
		//$response["error_msg"]= mysql_error();
		echo json_encode($response);
	}
	
	
	
}
else{
	$response["error"]=TRUE;
	$response["error_msg"]="Required  parameters are missing";
	echo json_encode($response);
}

// function sendSMS($mobile,$refNo,$name)
// {
	
// 	// Code to Send sms starts here
				  				  
// 				  //Your authentication key
// 					/*$authKey = "70302AbSftnyOwtvs53d8e401";
					
// 					//Multiple mobiles numbers separated by comma
// 					//$mobileNumber = $result_set['mobile'];
					
// 					//Sender ID,While using route4 sender id should be 6 characters long.
// 					$senderId = "FINSUR";
					
// 					//Your message to send, Add URL encoding here.
// 					$msg = "Hi, $name Your Grievance has been successfully registered with Ref No:- $refNo   Thanks.";
// 					$message = urlencode("$msg");
					
// 					//Define route 
// 					$route = 4;
// 					//Prepare you post parameters
// 					$postData = array(
// 					'authkey' => $authKey,
// 					'mobiles' => $mobile,
// 					'message' => $message,
// 					'sender' => $senderId,
// 					'route' => $route
// 					);
					
// 					//API URL
// 					$url="http://smsindia.techmartonline.com/sendhttp.php";
					
// 					//init the resource
// 					$ch = curl_init();
// 					curl_setopt_array($ch, array(
// 					CURLOPT_URL => $url,
// 					CURLOPT_RETURNTRANSFER => true,
// 					CURLOPT_POST => true,
// 					CURLOPT_POSTFIELDS => $postData
// 					//,CURLOPT_FOLLOWLOCATION => true
// 					));
					
					
// 					//Ignore SSL certificate verification
// 					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// 					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					
					
// 					//get response
// 					$output = curl_exec($ch);
					
// 					//Print error if any
// 					if(curl_errno($ch))
// 					{
// 						return false;
						
// 					}
// 					else{
// 						//echo "<script>alert('OTP has been sent on your registered mobile //".$result_set['mobile'].".');window.location='forgotpass.php?q=otp';</script>";
// 						return true;
// 					}
// 					//$_SESSION['empid']=$_REQUEST['empid'];
// 					curl_close($ch);*/
					
// 		$username = "ITsrdpo";
// 		$password = "chandra1";
// 		$type="TEXT";
// 		$sender = "SURRLY";
// 		$mobile = $mobile;
// 		$msg = "Dear, ".$name." Your Grievance has been successfully registered with Ref No- ".$refNo.". Thank you.";
// 		$message = urlencode($msg);
// 		$baseurl = "http://infoigy001.mediaalertbox.in/sendsms/sendsms.php";
// 		$url = $baseurl."?username=".$username."&password=".$password."&type=".$type."&sender=".$sender."&mobile=".$mobile."&message=".$message;
// 		$return = file($url);
// 		$string_version = implode(',', $return);
// 		if(strpos($string_version, "SUBMIT_SUCCESS") !== "SUBMIT_SUCCESS"){
// 			$response["error"]=FALSE;
// 			$response["error_msg"]="Grievance Added Successfully..";
// 			echo json_encode($response);	
// 			//$db1->hrms_connect();
// 			//$query_insert = mysql_query("insert into tbl_otp(emp_id,otp,sent) values('".$emp_id."','$otp',CURRENT_TIMESTAMP)");
			
// 		}else{
// 			$response["error"]=TRUE;
// 			$response["error_msg"] = curl_error($ch);
// 			 echo json_encode($response);
// 		}

// 				//return null;
	
	
// }
function SendSMS($mobileno,$refno)
{
	$authKey = "70302AbSftnyOwtvs53d8e401";
	// echo $mobileno . "-" . $msg;
	//Multiple mobiles numbers separated by comma
	$mobileNumber = $mobileno;

	//Sender ID,While using route4 sender id should be 6 characters long.
	$senderId = "FINSUR";

	//Your message to send, Add URL encoding here.
	// $msg = "Your TA claim for month of $mon - $y  and  amount $amt with $ref reference number has been submitted successfully.";
	// $ref = "WEL_123456";
	// $msg = "Your TA claim with $ref reference number has been submitted successfully.";
    $msg="Your e-Grievance added successfully with '$refno' reference no.";
	$message = urlencode($msg);
	// echo $message;
	//Define route 
	$route = 4;
	//Prepare you post parameters
	$postData = array(
		'authkey' => $authKey,
		'mobiles' => $mobileNumber,
		'message' => $message,
		'sender' => $senderId,
		'route' => $route
	);

	//API URL
	$url = "http://smsindia.techmartonline.com/sendhttp.php";

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
	if (curl_errno($ch)) {
		return ('error:' . curl_error($ch));
	}

	curl_close($ch);
	return true;
}


?>