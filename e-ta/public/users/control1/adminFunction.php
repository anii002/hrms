<?php
date_default_timezone_set("Asia/kolkata");
echo date_default_timezone_get();

include("../../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests
function updateUser($fname,$email,$mobile,$design,$dept)
{
  global $con;
  $query = "update users set fname='$fname', dept='$dept', designation='$design', mobile='$mobile', email='$email' where id='".$_SESSION['id']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function changePass($pass,$confirm)
{
  global $con;
  $query = "update users set password='".hashPassword($pass,SALT1,SALT2)."' where id='".$_SESSION['admin_id']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
//Designation
function AddDesign($design)
{
  global $con;
  $query = "insert into designation(designation) values('$design')";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function fetchDesign($id)
{
  global $con;
  $query = "select * from designation where id = '$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return json_encode($value);
}
function UpdateDesign($design,$id)
{
  global $con;
  $query = "update designation set designation='$design' where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function DeleteDesign($id)
{
  global $con;
  $query = "delete from designation where id='$id'";
  $result = mysql_query($query);
    echo "<script>alert('$query');</script>";
  if($result)
    return true;
  else
    return false;
}
function addEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address)
{
  global $con;
  $query = "INSERT INTO `employees`( `empid`, `empname`, `billunit`, `mobile`, `email`, `username`, `password`, `gradepay`, `department`, `designation`, `station`, `address`) VALUES ( '$empid', '$fullname', '$billunit', '$mobile', '$email','$empid' , '$empid', '$gradepay', '$dept', '$design', '$station', '$address')";
  $result = mysql_query($query) or die(mysqli_error($con));
  if($result)
    return true;
  else
    return false;
}
function updateEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address,$update_id)
{
  global $con;
  $query = "UPDATE `employees` SET `empid`='$empid', `empname`='$fullname', `billunit`='$billunit', `mobile`='$mobile', `email`='$email', `gradepay`='$gradepay', `department`='$dept', `designation`='$design', `station`='$station', `address`='$address' WHERE id='$update_id'";
  $result = mysql_query($query) or die(mysqli_error($con));
  if($result)
    return true;
  else
    return false;
}
function FetchEmployee($id)
{
  global $con;
  $query = "select * from employees where id = '$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data['empid']=$value['empid'];
  $data['empname']=$value['empname'];
  $data['billunit']=$value['billunit'];
  $data['mobile']=$value['mobile'];
  $data['email']=$value['email'];
  $data['designation']=fetch_design_profile($value['designation']);
  $data['gradepay']=fetch_gradepay_profile($value['gradepay']);
  $data['department']=fetch_dept_profile($value['department']);
  $data['station']=fetch_station_profile($value['station']);
  $data['address']=$value['address'];
  return json_encode($data);
}
function deleteEmployee($id)
{
  global $con;
  $query = "delete from employees where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function claimTA($data,$reference,$empid,$year,$months,$cnt,$set)
{
  global $con;
  for($i=0;$i<=$cnt;$i++)
  {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','".$data['date'][$i]."','".$data['train'][$i]."','".$data['departS'][$i]."','".$data['departT'][$i]."','".$data['arrivalS'][$i]."','".$data['arrivalT'][$i]."','".$data['distance'][$i]."','".$data['percent'][$i]."','".$data['amount'][$i]."','".$data['objective'][$i]."','$set')";
    $_SESSION['table_ref']=$reference;
    $result = mysql_query($query) or die(mysql_error());
  }
  if($result)
    return true;
  else
    return false;
}
function addclaimTA($data,$reference,$empid,$year,$months,$cnt,$set)
{
  global $con;
  for($i=0;$i<=$cnt;$i++)
  {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','".$data['date'][$i]."','".$data['train'][$i]."','".$data['departS'][$i]."','".$data['departT'][$i]."','".$data['arrivalS'][$i]."','".$data['arrivalT'][$i]."','".$data['distance'][$i]."','".$data['percent'][$i]."','".$data['amount'][$i]."','".$data['objective'][$i]."','$set')";
    $_SESSION['table_ref']=$reference;
    $result = mysql_query($query) or die(mysql_error());
  }
  if($result)
    return true;
  else
    return false;
}

function getTaAmount($level)
{
  $query = "select amount from ta_amount where min<=$level AND max>=$level";
  $result  = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['amount'];
}

function approveAndForward($empid,$ref,$forwardName,$original_id)
{
  global $con;
  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysql_query($query) or die(mysql_error());
  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$original_id','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysql_query($query) or die(mysql_erro());
  if($result)
    return true;
  else
    return false;
}


function adminapprove($empid,$ref,$original_id)
{
  global $con;
  $query = "update forward_data set admin_approved=CURRENT_TIMESTAMP,hold_status='1',admin_approve='1' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function admincancel($empid,$ref,$original_id)
{
  global $con;
  $query = "update forward_data set hold_status='0',admin_approve='0',depart_time=CURRENT_TIMESTAMP , admin_returned_status='1' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysql_query($query) or die(mysql_error());
  $insert = mysql_query("insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,admin_returned,admin_returned_status) values('$original_id','$ref','$original_id',CURRENT_TIMESTAMP,'1',CURRENT_TIMESTAMP,'1')");
  if($insert)
    return true;
  else
    return false;
}
function generatesummary($selected_list_emp,$selected_list,$title,$description)
{
  global $con;
  $query_summary = mysql_query("insert into tbl_summary (title,description) values('$title','$description')");
  $id = mysql_insert_id();
  $cnt = 0;
  foreach($selected_list as $list)
  {
		$query = "update forward_data set summary='1'where reference_id='$list'";
	  $result = mysql_query($query) or die(mysql_error());
	  $query = "insert into tbl_summary_details(summary_id,empid,reference) values('".$id."','".$selected_list_emp[$cnt]."','".$list."')";
	  $result = mysql_query($query) or die(mysql_error());
	  $cnt++;
	}
  if($result)
    return true;
  else
    return false;
}

function summarysend($forwardName,$original_id)
{
  global $con;
  $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
  while($result_set = mysql_fetch_array($query_select))
  {
	  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."'";
	$result = mysql_query($query) or die(mysql_error());
	$query_update = "update tbl_summary set forward_status='1' where id='".$result_set['summary_id']."'";
	$result = mysql_query($query_update) or die(mysql_error());
	$query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','$forwardName',CURRENT_TIMESTAMP,'1','1')";
	$result = mysql_query($query) or die(mysql_erro());
  }
  if($result)
    return true;
  else
    return false;
}

function establishment_send($forwardName,$original_id)
{
  global $con;
  $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
  while($result_set = mysql_fetch_array($query_select))
  {
	  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."'";
	$result = mysql_query($query) or die(mysql_error());
	$query_update = "update tbl_summary set approved_status='1' where id='".$result_set['summary_id']."'";
	$result = mysql_query($query_update) or die(mysql_error());
	$query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','$forwardName',CURRENT_TIMESTAMP,'1','1')";
	$result = mysql_query($query) or die(mysql_erro());
  }
  if($result)
    return true;
  else
    return false;
}

function finalapprove($original_id)
{
  global $con;
  $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
  while($result_set = mysql_fetch_array($query_select))
  {
	  $ref = $result_set['reference'];
	  $query = mysql_query("select * from taentryform_master where reference='".$ref."'");
	  $resultset = mysql_fetch_array($query);
	  $in_query = mysql_query("select * from employees where pfno='".$resultset['empid']."'");
	  $resultSet = mysql_fetch_array($in_query);
	  	//Your authentication key
					$authKey = "70302AbSftnyOwtvs53d8e401";
					
					//Multiple mobiles numbers separated by comma
					$mobileNumber = $resultSet['mobile'];
					
					//Sender ID,While using route4 sender id should be 6 characters long.
					$senderId = "FINSUR";
					
					//Your message to send, Add URL encoding here.
					$msg = "Your TA claim with $ref reference number has been submitted successfully.";
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
	  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."' AND hold_status='1'";
	$result = mysql_query($query) or die(mysql_error());
	$query_update = "update tbl_summary set est_approved='1' where id='".$result_set['summary_id']."'";
	$result = mysql_query($query_update) or die(mysql_error());
  }
  if($result)
    return true;
  else
    return false;
}
