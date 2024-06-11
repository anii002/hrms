<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
session_start();
include("../../../dbconfig/dbcon.php");
include("function.php");

//adminProcee requests
function changeimg($name,$tmp_name)
{
	$upload_dir = "../profile/".$_SESSION['empid'].".jpg";
	$dir = "profile/".$_SESSION['empid'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysql_query("update employees set img='$dir' where pfno='".$_SESSION['empid']."'");
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
/* function changePass($pass,$confirm)
{
  global $con;
  $query = "update employees set psw='".hashPassword($pass,SALT1,SALT2)."' where id='".$_SESSION['id']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
} */
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
function claimTA($data,$reference,$empid,$year,$months,$cnt,$set,$objective,$journey_type,$cardpass)
{
  global $con;
  $query_outer = "insert into taentryform_master(empid,reference,TAYear, TAMonth, objective, journey_type, cardpass) values('$empid','$reference','$year','$months','$objective','$journey_type','$cardpass')";
  $result_outer = mysql_query($query_outer);
  for($i=0;$i<=$cnt;$i++)
  {
    $query = "INSERT INTO `taentryforms`(empid,reference_id,`taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `set_number`,`journey_type`,`cardpass`) VALUES ('$empid','$reference','".$data['date'][$i]."','".$data['train'][$i]."','".$data['departS'][$i]."','".$data['departT'][$i]."','".$data['arrivalS'][$i]."','".$data['arrivalT'][$i]."','".$data['distance'][$i]."','".$data['percent'][$i]."','".$data['amount'][$i]."','$set','$journey_type','$cardpass')";
    $_SESSION['table_ref']=$reference;
    $result = mysql_query($query) or die(mysql_error());
  }
  if($result)
    return true;
  else
    return false;
}
function addclaimTA($data,$reference,$empid,$year,$months,$cnt,$set,$objective,$journey_type,$cardpass)
{
  global $con;
  for($i=0;$i<=$cnt;$i++)
  {
    $query = "INSERT INTO `taentryforms`(empid,reference_id,`taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `set_number`,`journey_type`,`cardpass`) VALUES ('$empid','$reference','".$data['date'][$i]."','".$data['train'][$i]."','".$data['departS'][$i]."','".$data['departT'][$i]."','".$data['arrivalS'][$i]."','".$data['arrivalT'][$i]."','".$data['distance'][$i]."','".$data['percent'][$i]."','".$data['amount'][$i]."','$set','$journey_type','$cardpass')";
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

function forward_TA($empid,$ref,$forwardName)
{
  global $con;
  $month_array = array('January', 'February','March', 'April', 'May', 'June', 'July', 'August', 'October', 'November', 'December');
  $reference_no = $empid."/".date("Y", strtotime(date('y-m-d')))."/".rand(000001, 999999);
  $taentryform = array();
  $result = mysql_query("SELECT * FROM `taentryform_master` WHERE `reference` = '".$ref."'");
  $row = mysql_fetch_assoc($result);

  $res = mysql_query("SELECT * FROM `taentryforms` WHERE `reference_id` = '".$ref."'");
  while($rw = mysql_fetch_array($res)){
    $taDate = date("F", strtotime($rw['taDate']));
    $currDate = date("F", strtotime(date('y-m-d')));
    if($taDate == $currDate){
      array_push($taentryform, $rw['id']);
      $objective = $rw['Objective'];
    }
  }
  $month = explode(',', $row['TAMonth']);
  $obj = $objective." ".$month_array[$month[0]]." month TA carried out.";
  $count = count($taentryform);
  if($count > 0){
    $res = mysql_query("INSERT INTO `taentryform_master` (`empid`, `reference`, `TAYear`, `TAMonth`, `objective`, `journey_type`, `cardpass`, `status`, `forward_status`, `created_at`, `rejected`) VALUES ('".$row['empid']."', '".$reference_no."', '".$row['TAYear']."', '".$row['TAMonth']."', '".$row['objective']."', '".$row['journey_type']."', '".$row['cardpass']."', ".$row['status'].", ".$row['forward_status'].", '".$row['created_at']."', ".$row['rejected'].")");
    if(mysql_affected_rows() > 0){
      for($i = 0; $i < $count; $i++){
        $r = mysql_query("UPDATE `taentryforms` SET `reference_id` = '".$reference_no."', `Objective` = '".$obj."' WHERE `id` = '".$taentryform[$i]."'");
      }
    }
  }
  
  $query = "update taentryform_master set forward_status='1' where reference='$ref'";
  $result = mysql_query($query);

  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysql_query($query);

  if($result){
    $query = mysql_query("SELECT * FROM employees WHERE pfno='".$empid."'");
    $result_set = mysql_fetch_array($query);
    //Your authentication key
    $authKey = "70302AbSftnyOwtvs53d8e401";
    
    //Multiple mobiles numbers separated by comma
    $mobileNumber = $result_set['mobile'];
    
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
    return true;
  }
  else{
    return false;
  }
}

function forward_bill($empid,$ref,$forwardName)
{
  global $con;

  $query = "update master_cont set forward_status='1' where reference_no='$ref'";
  $result = mysql_query($query);
  $query = "insert into bill_forward(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}

function validate_date($date)
{
  $query = "select SUM(percent) AS SUM from taentryforms where empid='".$_SESSION['empid']."' and taDate='$date' AND status != '0'";
      $result = mysql_query($query);
      $data = mysql_fetch_array($result);
      $cnt = mysql_num_rows($result);
      if($cnt>0 && $data['SUM']!="")
      {
        return $data['SUM'];
      }
      else
      {
        return 0;
      }
}

function forward_returned_ta($empid,$ref,$forwardName)
{
  global $con;
  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysql_query($query) or die(mysql_error());
  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysql_query($query) or die(mysql_erro());
  if($result)
    return true;
  else
    return false;
}

function validateReference($date,$month)
{
	//$query = "select * from taentryform_master where TAYear='$date' and TAMonth='$month' and empid='".$_SESSION['empid']."'";
  $query = "select * from taentryform_master tf INNER JOIN taentryforms t ON tf.reference = t.reference_id where tf.TAYear='$date' and tf.TAMonth='$month' and tf.empid='".$_SESSION['empid']."' AND t.status = '1'";
      $result = mysql_query($query);
      $data = mysql_fetch_array($result);
      $cnt = mysql_num_rows($result);
      if($cnt>0)
      {
        return $data['reference'];
      }
      else
      {
        return 0;
      }
}

function getbackclaimedta($id)
{
    $select = mysql_query("select count(id) as total from forward_data where reference_id='$id'");
    $selectresult = mysql_fetch_array($select);
    if($selectresult['total'] > 0)
    {
        $delete = mysql_query("delete from forward_data where reference_id='$id'");
        if($delete)
        {
          $update = mysql_query("update taentryform_master set forward_status='0' where reference='$id'");
          if($update)
              return true;
          else
              return false;
        }
    }
    else
    {
        //return mysql_affected_rows();
        return false;
    }
}

function getbackclaimedcont($id)
{
    $select = mysql_query("select count(id) as total from bill_forward where reference_id='$id'");
    $selectresult = mysql_fetch_array($select);
    if($selectresult['total'] < 0)
    {
      return false;
    }
    else
    {
        $delete = mysql_query("delete from bill_forward where reference_id = '$id'");
        if(mysql_affected_rows() > 0)
        {
          $update = mysql_query("update master_cont set forward_status='0' where reference_no = '$id'");
          if($update)
              return true;
          else
              return false;
        }
    }
}