<?php 

require_once 'DB_function.php';
$db1=new DB_Function();
$response=array("error"=>FALSE);

	
	if(isset($_POST['mobile'])&&isset($_POST['emp_id']))
	{
		
		$mobile=$_REQUEST['mobile'];
		$emp_id=$_REQUEST['emp_id'];
		//$query = mysql_query("select * from employees where pfno='".$_REQUEST['empid']."'");
		//$count = mysql_num_rows($query);
		//$result_set = mysql_fetch_array($query);
		//if($count>0)
		//{
			$otp = rand(1,10000);
				
				// Code to Send sms starts here
				  				  
				  //Your authentication key
					$authKey = "70302AbSftnyOwtvs53d8e401";
					
					//Multiple mobiles numbers separated by comma
					//$mobileNumber = $result_set['mobile'];
					
					//Sender ID,While using route4 sender id should be 6 characters long.
					$senderId = "FINSUR";
					
					//Your message to send, Add URL encoding here.
					$msg = "Your OTP for TAMM forgot password is $otp";
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
						$response["error"]=TRUE;
					 $response("error_msg" . curl_error($ch));
					 echo json_encode($response);
					}
					else{
						//echo "<script>alert('OTP has been sent on your registered mobile //".$result_set['mobile'].".');window.location='forgotpass.php?q=otp';</script>";
						
						$response["error"]=FALSE;
						$response["error_msg"]="OTP has been sent on your registered mobile".$mobile;
						echo json_encode($response);	
						$query_insert = mysql_query("insert into tbl_otp(empid,otp,sent) values('".$emp_id."','$otp',CURRENT_TIMESTAMP)");
						
					
					
					}
					//$_SESSION['empid']=$_REQUEST['empid'];
					curl_close($ch);
				
				
				
				/*$selectQuery=mysql_query("SELECT otp FROM otp WHERE emp_id='".$emp_id."'");
				$result=mysql_fetch_array($selectQuery);
				
				$response["otp"]=$result["otp"];
				
				echo json_encode($response);*/
				
				
		//}
		/*else
		{
			echo "<script>alert('Please check entered username');window.location='forgotpass.php';</script>";
		}*/
	}
?>