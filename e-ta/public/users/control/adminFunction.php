<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function changeimg($name,$tmp_name)
{
	$upload_dir = "../profile/".$_SESSION['empid'].".jpg";
	$dir = "profile/".$_SESSION['empid'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysql_query("update users set img='$dir' where empid='".$_SESSION['empid']."'");
        return true;
    } else {
        return false;
    }
}
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
  //  echo "<script>alert('$query');</script>";
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

function admin_cont_approve($empid,$ref,$original_id)
{
  global $con;
  $query = "update bill_forward set admin_approved=CURRENT_TIMESTAMP,hold_status='1',admin_approve='1' where reference_id='$ref' AND fowarded_to='$empid'";
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
function finalreturn($remark,$ref,$return_emp,$return_admin)
{
  global $con;
  $query = "update forward_data set hold_status='0',admin_approve='0',depart_time=CURRENT_TIMESTAMP , admin_returned_status='1' where reference_id='$ref' AND fowarded_to='$return_admin'";
  $result = mysql_query($query) or die(mysql_error());
  
  $query_update = mysql_query("update tbl_rejected set status='1' where ref='$ref'");
  
 //  $select = mysql_query("select count(summary_id) as total,summary_id from tbl_summary_details where summary_id in (select summary_id from tbl_summary_details where reference='$ref')");
 //  $result = mysql_fetch_array($select);
  
 //  if($result['total']=='1')
 //  {
	// $delete = mysql_query("delete from tbl_summary where id='".$result['summary_id']."'") or die(mysql_error());
 //  }
  
  // $query_delete = "delete from tbl_summary_details where reference='$ref'";
  // $result = mysql_query($query_delete) or die(mysql_error());
  
  $insert = mysql_query("insert into forward_data(empid, reference_id, fowarded_to, arrived_time, hold_status, admin_returned, admin_returned_status, return_remark) values('$return_emp', '$ref', '$return_emp', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP, '1', '$remark')");
  if($insert)
    return true;
  else
    return false;
}
function finalapproval($ref,$return_emp,$return_admin)
{
  global $con;
  $query = "update forward_data set hold_status='0',admin_approve='1',depart_time = CURRENT_TIMESTAMP, admin_returned_status='0' where reference_id='$ref' AND fowarded_to='$return_admin'";
  $result = mysql_query($query);
  
  $sql1 = "DELETE FROM `tbl_rejected` where ref = '$ref'";
  $query_update = mysql_query($sql1);
  
  $sql = "UPDATE tbl_summary_details SET reject_pending = '0' WHERE empid = '$return_emp' AND reference = '$ref'";
  $result = mysql_query($sql);
 
  $sql_insert = "insert into forward_data(empid, reference_id, fowarded_to, arrived_time, hold_status, depart_time, admin_returned, admin_returned_status) values('$return_emp', '$ref', '12212325', CURRENT_TIMESTAMP, '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '0')";
  $insert = mysql_query($sql_insert);
  
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

function generate_cont_summary($selected_list_emp,$selected_list,$title,$description)
{
  global $con;
  //print_r($selected_list);
  $query_summary = mysql_query("insert into tbl_summary (title,description, is_cont) values('$title','$description', '1')");
  $id = mysql_insert_id();
  $cnt = 0;
  foreach($selected_list as $list)
  {
		$query = "update bill_forward set summary='1'where reference_id='$list'";
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

/*function summarysend($forwardName,$original_id)
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
}*/


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
      $innerquery = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','".$forwardName."',CURRENT_TIMESTAMP,'1','1')";
      $result = mysql_query($innerquery) or die(mysql_erro());
    }
    if($result)
      return true;
    else
      return false;
}

function contin_summarysend($forwardName,$original_id)
{
    global $con;
    $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
    
    while($result_set = mysql_fetch_array($query_select))
    {
        $query = "update bill_forward set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."'";
        $result = mysql_query($query) or die(mysql_error());
        $query_update = "update tbl_summary set forward_status='1' where id='".$result_set['summary_id']."'";
        $result = mysql_query($query_update) or die(mysql_error());
        $innerquery = "insert into bill_forward(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','".$forwardName."',CURRENT_TIMESTAMP,'1','1')";
        $result = mysql_query($innerquery) or die(mysql_erro());
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
    $query_update = "update tbl_summary set approved_status='1',est_approved='1'  where id='".$original_id."'";
    $result = mysql_query($query_update) or die(mysql_error());
    $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','$forwardName',CURRENT_TIMESTAMP,'1','1')";
    $result = mysql_query($query) or die(mysql_erro());
  }
  if($result)
    return true;
  else
    return false;
}

function conti_establishment_send($forwardName,$original_id)
{
  global $con;
  $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
  while($result_set = mysql_fetch_array($query_select))
  {
	  $query = "update bill_forward set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."'";
	$result = mysql_query($query) or die(mysql_error());
	$query_update = "update tbl_summary set approved_status='1' where id='".$original_id."'";
	$result = mysql_query($query_update) or die(mysql_error());
	$query = "insert into bill_forward(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','$forwardName',CURRENT_TIMESTAMP,'1','1')";
	$result = mysql_query($query) or die(mysql_erro());
  }
  if($result)
    return true;
  else
    return false;
}

function forward_bill_admin($empid,$ref,$forwardName)
{
  global $con;
  
	$query = mysql_query("select * from bill_forward where reference_id = '$ref'");
	$fetch = mysql_fetch_array($query);
	$org = $fetch['empid'];
	//echo "update bill_forward set depart_time=CURRENT_TIMESTAMP, hold_status='0' where reference_id = '$ref' AND fowarded_to = '$empid' ORDER BY id DESC";
	$update = mysql_query("update bill_forward set depart_time=CURRENT_TIMESTAMP, hold_status='0' where reference_id = '$ref' AND fowarded_to = '$empid' ORDER BY id DESC");
  
	if($update){
	 $query = "insert into bill_forward(empid, reference_id, fowarded_to, arrived_time, hold_status) values('$org','$ref','$forwardName', CURRENT_TIMESTAMP, '1')";
   $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
  }
  
}

function bill_admin_approved($refid)
{
	$update = mysql_query("update bill_forward set approved='1', hold_status='0' where refid='$refid'");
	if($update)
    return true;
  else
    return false;
}

function finalapprove($original_id, $reference_collected)
{
  global $con;
  $innercount = 0;
  
  $reference = explode(",", $reference_collected);
  $ref_count = count($reference);
  $query_update="UPDATE tbl_summary set est_approved='1' where id='$original_id' ";
  $result=mysql_query($query_update);
  //$query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
  //$count = mysql_num_rows($query_select);
  //while($result_set = mysql_fetch_array($query_select))
  for($i = 0; $i < $ref_count; $i++)
  {
	  $ref = $reference[$i];
    $sql = "select * from taentryform_master where reference='".$ref."'";
	  $query = mysql_query($sql);
	  $resultset = mysql_fetch_array($query);
    /* $innerquery = mysql_query("select fowarded_to from forward_data where reference_id='".$ref."' order by id desc");
    $resultinner = mysql_fetch_array($innerquery);
    if($resultinner['fowarded_to']==$_SESSION['empid'])
    {*/
    $innercount=0;
    $query = "update forward_data set depart_time = CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$reference[$i]."' AND hold_status='1' ORDER BY id DESC LIMIT 1";
    $result = mysql_query($query) or die(mysql_error());
    if($result){
      $innercount++;
      $in_query = mysql_query("select * from employees where pfno='".$resultset['empid']."'");
      $resultSet = mysql_fetch_array($in_query);
      //Your authentication key
      $authKey = "70302AbSftnyOwtvs53d8e401";
                        
      //Multiple mobiles numbers separated by comma
      $mobileNumber = $resultSet['mobile'];
      
      //Sender ID,While using route4 sender id should be 6 characters long.
      $senderId = "FINSUR";
      
      //Your message to send, Add URL encoding here.
      $msg = "Your TA claim with $ref reference number has been approved successfully.";
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
    }
   } 
  validate_summary($original_id);
  if($ref_count == $innercount || $ref_count >= $innercount || $innercount != 0)
    return true;
  else
    return false;
}
// Shiva // for officer aaprove
function finalapprove1($original_id, $reference_collected)
{
  global $con;
  $innercount = 0;
  
  $reference = explode(",", $reference_collected);
  $ref_count = count($reference);
  //$query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
  //$count = mysql_num_rows($query_select);
  //while($result_set = mysql_fetch_array($query_select))
  for($i = 0; $i < $ref_count; $i++)
  {
	  $ref = $reference[$i];
    $sql = "select * from taentryform_master where reference='".$ref."'";
	  $query = mysql_query($sql);
	  $resultset = mysql_fetch_array($query);
    /* $innerquery = mysql_query("select fowarded_to from forward_data where reference_id='".$ref."' order by id desc");
    $resultinner = mysql_fetch_array($innerquery);
    if($resultinner['fowarded_to']==$_SESSION['empid'])
    {*/
    $innercount=0;
    $query = "update forward_data set depart_time = CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$reference[$i]."' AND hold_status='1' ORDER BY id DESC LIMIT 1";
    $result = mysql_query($query) or die(mysql_error());
    if($result){
      $innercount++;
      $in_query = mysql_query("select * from employees where pfno='".$resultset['empid']."'");
      $resultSet = mysql_fetch_array($in_query);
      //Your authentication key
      $authKey = "70302AbSftnyOwtvs53d8e401";
                        
      //Multiple mobiles numbers separated by comma
      $mobileNumber = $resultSet['mobile'];
      
      //Sender ID,While using route4 sender id should be 6 characters long.
      $senderId = "FINSUR";
      
      //Your message to send, Add URL encoding here.
      $msg = "Your TA claim with $ref reference number has been approved successfully.";
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
    }
   } 
  validate_summary($original_id);
  if($ref_count == $innercount || $ref_count >= $innercount || $innercount != 0)
    return true;
  else
    return false;
}
function validate_summary($original_id){
  $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
  $innercount =0;
  $outercount =0;
  while($result2 = mysql_fetch_array($query_select))
  {
    $outercount++;
    $query = "select * from forward_data where reference_id='".$result2['reference']."' AND fowarded_to = '12212325' GROUP BY reference_id ORDER BY id DESC LIMIT 1";
    $innerquery = mysql_query($query);
    $result_query = mysql_fetch_array($innerquery);
  
    if($result_query['hold_status']=='0' && $result_query['depart_time'] != '' || $result_query['depart_time'] != null)
    {
      $innercount++;
    }
  }
  
  if($innercount==$outercount)
  {
    if($_SESSION['role'] == '6'){
      $query_update = "update tbl_summary set admin_approved='1', est_approved='1' where id='".$original_id."'";
      $result = mysql_query($query_update) or die(mysql_error());
    }else{
      $query_update = "update tbl_summary set est_approved='1' where id='".$original_id."'";
      $result = mysql_query($query_update) or die(mysql_error());
    }
  }
}

function contingency_finalapprove($original_id)
{
  global $con;
  $innercount = 0;
  $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
  $count = mysql_num_rows($query_select);
  while($result_set = mysql_fetch_array($query_select))
  {
    $ref = $result_set['reference'];
    $query = mysql_query("select * from master_cont where reference_no = '".$ref."'");
    $resultset = mysql_fetch_array($query);

          $innerquery = mysql_query("select fowarded_to from bill_forward where reference_id = '".$ref."' order by id desc");
                    $resultinner = mysql_fetch_array($innerquery);
                    if($resultinner['fowarded_to']==$_SESSION['empid'])
                    {
                      $innercount=0;
                      $query = "update bill_forward set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."' AND hold_status='1'";
                      $result = mysql_query($query) or die(mysql_error());
                      $in_query = mysql_query("select * from employees where pfno='".$resultset['empid']."'");
                      $resultSet = mysql_fetch_array($in_query);
        /*              //Your authentication key
                        $authKey = "70302AbSftnyOwtvs53d8e401";
                        
                        //Multiple mobiles numbers separated by comma
                        $mobileNumber = $resultSet['mobile'];
                        
                        //Sender ID,While using route4 sender id should be 6 characters long.
                        $senderId = "FINSUR";
                        
                        //Your message to send, Add URL encoding here.
                        $msg = "Your TA claim with $ref reference number has been approved successfully.";
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
                        
                        curl_close($ch);*/
                    }
      }
      $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
      $innercount =0;
      $outercount =0;
      while($result2 = mysql_fetch_array($query_select))
      {
        $outercount++;
        $innerquery = mysql_query("select * from bill_forward where reference_id='".$result2['reference']."' order by id desc");
        $result_query = mysql_fetch_array($innerquery);
        if($result_query['hold_status']=='0')
        {
          $innercount++;
        }
      }
      if($innercount==$outercount)
      {
        $query_update = "update tbl_summary set est_approved='1' where id='".$original_id."'";
          $result = mysql_query($query_update) or die(mysql_error());
      }
  if($query_select)
    return true;
  else
    return false;
}
