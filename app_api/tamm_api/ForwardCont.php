<?php


require_once 'DB_function.php';
$db1=new DB_Function();
$response=array("error"=>FALSE);

if(isset($_REQUEST['empid'])&&isset($_REQUEST['refno'])&&isset($_REQUEST['forward_to']))
{
	
	$empid=$_REQUEST['empid'];
	$refno=$_REQUEST['refno'];
	$forward_to=$_REQUEST['forward_to'];
	
	$query=mysql_query("SELECT pfno FROM employees WHERE name='".$forward_to."'");
	$result=mysql_fetch_array($query);
	$forward_emp=$result['pfno'];
  global $con;
  $query1 = mysql_query("SELECT mobile FROM employees WHERE pfno='".$empid."'");
			$result_set = mysql_fetch_array($query1);
					//Your authentication key
					$authKey = "70302AbSftnyOwtvs53d8e401";
					
					//Multiple mobiles numbers separated by comma
					$mobileNumber = $result_set['mobile'];
					
					//Sender ID,While using route4 sender id should be 6 characters long.
					$senderId = "FINSUR";
					
					//Your message to send, Add URL encoding here.
					$msg = "Your Contingency bill claim with $refno reference number has been submitted successfully.";
					$message = urlencode("$msg");
					
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
					echo 'error:' . curl_error($ch);
					}
					
					curl_close($ch);
  $query2 = "update master_cont set forward_status='1' where reference_no='".$refno."'";
  $result2 = mysql_query($query2);
  $query3 = "insert into bill_forward(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$refno','$forward_emp',CURRENT_TIMESTAMP,'1')";
  $result3 = mysql_query($query3);
  if($result3&&$result2){
    $response["error"]=FALSE;
	$response["msg"]="Contingency Forwarded Successfully";
echo json_encode($response);
  }
  else{
	  $response["error"]=True;
    $response["msg"]="Contingency forwarding unsuccessfull";
  echo json_encode($response);
  }
}
?>