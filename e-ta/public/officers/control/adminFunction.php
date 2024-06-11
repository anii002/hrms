<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
session_start();
include("../../../dbconfig/dbcon.php");
include("function.php");


function fetch_dept_profile($id)
{
  //fetch department using id
  global $con;
  $data = "";
  $dept = "select * from department where dept_id='$id'";
  $result = mysql_query($dept);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
  $dept = "select * from department where dept_id <> '$id'";
  $result = mysql_query($dept);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
  return $data;
}
function fetch_design_profile($id)
{
  //fetch designation using id
  global $con;
  $data = "";
  $query = "select * from designation where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['id']."'>".$value['designation']."</option>";
  $query = "select * from designation where id <> '$id'";
  $result = mysql_query($query);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['id']."'>".$value['designation']."</option>";
  return $data;
}
function fetch_station_profile($id)
{
  //fetch designation using id
  global $con;
  $data = "";
  $query = "select * from stations where station_id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
  $query = "select * from stations where station_id <> '$id'";
  $result = mysql_query($query);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
  return $data;
}
function fetch_gradepay_profile($id)
{
  //fetch designation using id
  global $con;
  $data = "";
  $query = "select * from gradepay where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  $query = "select * from gradepay where id <> '$id'";
  $result = mysql_query($query);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  return $data;
}
function designation($id)
{
  global $con;
  $query = "select * from designation where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['designation'];
}
function employee($id)
{
  global $con;
  $query = "select name from employees where pfno='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['name'];
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
function addEmployee($empid,$pan,$fullname,$billunit,$mobile,$gradepay,$design,$level)
{
	 $password='123';
  $psw=hashPassword($password,SALT1,SALT2);
  global $con;
 
 // echo $query = "INSERT INTO `employees`( `pfno`, `name`, `BU`, `mobile`, `username`, `password`, `gradepay`, `designation`, `level`, `added_by`) VALUES ( '$empid', '$fullname', '$billunit', '$mobile', '$empid' , '$empid', '$gradepay', '$design', '$level', 'OS')";
 $query = "insert into employees (pfno, panno, name, BU, mobile, gp, desig, level, station, dept, psw, added_by,status) values('$empid', '$pan', '$fullname', '$billunit', '$mobile', '$gradepay', '$design', '$level', 'Solapur', '', '$psw', 'OS','1')";
  $result = mysql_query($query) or die(mysql_error($con));
  if($result){
    return true;
  }
  else{
    return false;
  }
}
function updateEmployee($empid,$pan,$fullname,$billunit,$mobile,$gradepay,$design,$level,$update_id)
{
  global $con;
  $query = "UPDATE `employees` SET `BU`= '$billunit',`pfno`= '$empid',`panno`= '$pan',`name`= '$fullname',`desig`= '$design', `mobile`= '$mobile',`gp`= '$gradepay',`level`= '$level' WHERE id='$update_id'";
  $result = mysql_query($query) or die(mysqli_error($con));
  if($result)
    return true;
  else
    return false;
}
function FetchEmployee($id)
{
  global $con;
  $data = array();
  $query = "select * from employees where id = '$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data['empid']=$value['pfno'];
  $data['empname']=$value['name'];
  $data['billunit']=$value['BU'];
  $data['mobile']=$value['mobile'];
  $data['email']=$value['email'];
  $data['designation']=$value['desig'];
  $data['gradepay']=$value['gp'];
  $data['department']=$value['dept'];
  $data['station']=$value['station'];
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

function AddUser($empid,$username,$psw,$role)
{
  global $con;
   $query = "insert into users(empid,username,password,role) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','".get_role($role)."')";
  //$query = "insert into users(empid,username,password,role) values('$empid','$username','".$psw."','".get_role($role)."')";
  $result = mysql_query($query) or die(mysql_error());
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
  $query_summary = mysql_query("insert into tbl_summary (title,description, othe_dept) values('$title','$description', '1')");
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

function get_role($id)
{
  global $con;
  $query = "SELECT level_name FROM userlevel where id = '$id'";
  $result = mysql_query($query);
  $fetch_record = mysql_fetch_array($result);
  return $fetch_record['level_name'];
}

function summarysend($forwardName,$original_id)
{
    global $con;
    $query_select = mysql_query("SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
    while($result_set = mysql_fetch_array($query_select))
    {
	  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."' and fowarded_to='65852736' ";
      $result = mysql_query($query) or die(mysql_error());
      $query_update = "update tbl_summary set forward_status='1', approved_status='1' where id='".$result_set['summary_id']."'";
      $result = mysql_query($query_update) or die(mysql_error());
      $innerquery = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','".$forwardName."',CURRENT_TIMESTAMP,'1','1')";
      $result = mysql_query($innerquery) or die(mysql_error());
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
    $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."' and fowarded_to='00500469993'";
    $result = mysql_query($query) or die(mysql_error());
    $query_update = "update tbl_summary set approved_status='1' where id='".$original_id."'";
    $result = mysql_query($query_update) or die(mysql_error());
    $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','$forwardName',CURRENT_TIMESTAMP,'1','1')";
    $result = mysql_query($query) or die(mysql_error());
  }
  if($result)
    return true;
  else
    return false;
}