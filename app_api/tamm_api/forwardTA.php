<?php


require_once 'DB_function.php';
$db1=new DB_Function();
$response=array("error"=>FALSE);

if(isset($_REQUEST['empid'])&&isset($_REQUEST['refno'])&&isset($_REQUEST['forward_to']))
{
	
	$empid=$_REQUEST['empid'];
	$refno=$_REQUEST['refno'];
	$forward_to=$_REQUEST['forward_to'];
	$mobile=$_REQUEST['mobileNo'];
	
	date_default_timezone_set('Asia/Kolkata');
	    $date1=date("d/m/Y h:i:s");
	
	$query=mysql_query("SELECT pfno FROM employees WHERE name='".$forward_to."'");
	$result=mysql_fetch_array($query);
	$forward_emp=$result['pfno'];
  global $con;
  $query1 = mysql_query("SELECT mobile FROM employees WHERE pfno='".$empid."'");
			$result_set = mysql_fetch_array($query1);
			$query_select1 = mysql_query("SELECT TAMonth,TAYear,SUM(taentrydetails.amount)as amount from taentry_master,taentrydetails WHERE taentry_master.reference_no=taentrydetails.reference_no AND taentry_master.empid=taentrydetails.empid AND taentry_master.empid='".$empid."' AND taentry_master.reference_no='".$refno."' ");
            $result1 = mysql_fetch_array($query_select1);
			
			$month=$result1['TAMonth'];
			$year=$result1['TAYear'];
			$amount=$result1['amount'];
			
			$month_array=array("1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June","7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");
			
			if($month_array[$month])
			{
			    $month=$month_array[$month];
			}
			
					//Your authentication key
					$authKey = "70302AbSftnyOwtvs53d8e401";
					
					//Multiple mobiles numbers separated by comma
					$mobileNumber = $mobile;
					
					//Sender ID,While using route4 sender id should be 6 characters long.
					$senderId = "FINSUR";
					
					//Your message to send, Add URL encoding here.
					$msg = "Your TA claim for month of $month - $year and amount $amount with $refno reference number has been submitted successfully.";
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
  $query2 = "update taentry_master set forward_status='1' where reference_no='".$refno."'";
  $result2 = mysql_query($query2);
  // echo "update taentryform_master set forward_status='1' where reference='$refno'".mysql_error();
  $query3 = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$refno','$forward_emp',CURRENT_TIMESTAMP,'1')";
  $result3 = mysql_query($query3);
  if($result2 && $result3){
    $response["error"]=FALSE;
	$response["msg"]="TA Forwarded Successfully";
echo json_encode($response);
  }
  else{
    $response["error"]=True;
    $response["msg"]="TA forwarding unsuccessfull";
  echo json_encode($response);}
}
?>