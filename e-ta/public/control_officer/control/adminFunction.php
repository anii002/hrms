<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function AddAdmin($empid,$username,$psw,$role,$dept)
{
  global $con;
  $query = "insert into users(empid,username,password,role,dept) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','$role','$dept')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

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
function updateUser($fname,$email,$mobile,$design)
{
  global $con;
  $query = "update users set fname='$fname', designation='$design', mobile='$mobile', email='$email' where id='".$_SESSION['admin_id']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}

function getbackclaimedta($id)
{
    $select = mysql_query("select count(id) as total from forward_data where reference_id='$id'");
    $selectresult = mysql_fetch_array($select);
    if($selectresult['total'] > 0)
    {
      return false;
    }
    else
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
}

//--------------------------------------------------------

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


function adminapprove($empid1,$empid,$ref,$original_id)
{
  global $con;
  $query = "update forward_data set admin_approved=CURRENT_TIMESTAMP,depart_time=CURRENT_TIMESTAMP,hold_status='0',admin_approve='1' where reference_id='$ref' AND fowarded_to='$empid1'";
  $result = mysql_query($query) or die(mysql_error());
  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$original_id',CURRENT_TIMESTAMP,'1')";
   $result = mysql_query($query) or die(mysql_erro());
  if($result)
    return true;
  else
    return false;
}
  
//   function approveAndForward($empid,$ref,$forwardName,$original_id)
// {
//   global $con;
//   $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
//   $result = mysql_query($query) or die(mysql_error());
//   $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$original_id','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
//   $result = mysql_query($query) or die(mysql_erro());
//   if($result)
//     return true;
//   else
//     return false;
// }


//----------------------------------------------------------
function changePass($pass,$confirm)
{
  global $con;
  $query = "update users set password='".hashPassword($pass,SALT1,SALT2)."' where empid='".$_SESSION['empid']."'";
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
/*function addEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address)
{
  global $con;
  $query = "INSERT INTO `employees`( `empid`, `empname`, `billunit`, `mobile`, `email`, `username`, `password`, `gradepay`, `department`, `designation`, `station`, `address`) VALUES ( '$empid', '$fullname', '$billunit', '$mobile', '$email','$empid' , '$empid', '$gradepay', '$dept', '$design', '$station', '$address')";
  $result = mysql_query($query) or die(mysqli_error($con));
  if($result)
    return true;
  else
    return false;
}*/
function updateEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel,$update_id)
{
  global $con;
  $query = "UPDATE `employees` SET `pfno`='$empid', `name`='$empname', `BU`='$billunit', `mobile`='$mobile', `gp`='$email', `desig`='$design',`panno`='$pannumber',`level`='$paylevel' WHERE id='$update_id'";
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
  $data['empid']=$value['pfno'];
  $data['empname']=$value['name'];
  $data['billunit']=$value['BU'];
  $data['mobile']=$value['mobile'];
  $data['email']=$value['gp'];
  $data['panno']=$value['panno'];
  $data['designation']=fetch_design_profile($value['desig']);
  $data['level']=fetch_pay_level($value['level']);
  return json_encode($data);
}
function fetchEmployee1($id)
{
  global $con;
  $query = "select * from employees where pfno = '$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data['empid']=$value['pfno'];
  $data['empname']=$value['name'];
  $data['billunit']=$value['BU'];
  $data['mobile']=$value['mobile'];
  $data['email']=$value['email'];
  $data['panno']=$value['panno'];
  $data['designation']=$value['desig'];
  $data['level']=$value['level'];
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

function AddEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel)
{
  global $con;
  $query = "insert into employees(pfno,panno,name,BU,mobile,gp,desig,level,station,dept,psw) values('$empid','$pannumber','$empname','$billunit','$mobile','$email','$design','$paylevel','Solapur','ACCOUNTS','123')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function AddUser($empid,$username,$psw,$role)
{
  global $con;
  $query = "insert into users(empid,username,password,role) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','$role')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function activeUser($pfno,$active){
  global $con;
  $query = "update employees set status='$active' where pfno='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function activeDepot($id,$active){
  global $con;
  $query = "UPDATE `depot_master` SET `status`='".$active."' WHERE id='$id'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function deactiveDepot($id,$active){
  global $con;
  $query = "UPDATE `depot_master` SET `status`='".$active."' WHERE id='$id'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function deactiveUser($pfno,$active){
  global $con;
  $query = "update employees set status='$active' where pfno='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function applybillunit($empid,$billunit)
{
  $query = "insert into sep_billunit(employee_id,billunit) values('".$empid."','".$billunit."')";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}


