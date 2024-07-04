<?php
date_default_timezone_set("Asia/kolkata");
include("../../dbconfig/dbcon.php");
// include("function.php");

function AddAdmin($empid, $username, $psw, $role, $dept)
{
  global $conn;
  $query = "insert into users(empid,username,password,role,dept) values('$empid','$username','" . hashPassword($psw, SALT1, SALT2) . "','$role','$dept')";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}


function updateEmployee($empid, $billunit, $panno, $fullname, $desig, $station, $mobile, $email, $category, $dept, $txtworkdepot, $txtbasicpay, $gradepay, $txtdob, $txtappointment, $level, $forwardName, $isupdated)
{
  global $conn;
  $query = "INSERT INTO `employees_update`(`BU`, `pfno`, `panno`, `name`, `desig`, `station`, `mobile`, `email`, `catg`, `dept`, `depot_id`,`bp`, `gp`, `bdate`, `apdate`, `level`, `CI_PF`, `isupdated`) VALUES ('" . $billunit . "','" . $empid . "','" . $panno . "','" . $fullname . "','" . $desig . "','" . $station . "','" . $mobile . "','" . $email . "','" . $category . "','" . $dept . "','" . $txtworkdepot . "','" . $txtbasicpay . "','" . $gradepay . "','" . $txtdob . "','" . $txtappointment . "','" . $level . "','" . $forwardName . "','" . $isupdated . "')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}

function forward_bill($empid, $ref, $forwardName)
{
  global $conn;

  $query = "update master_cont set forward_status='1' where reference_no='$ref'";
  $result = mysqli_query($conn,$query);
  $query = "insert into bill_forward(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysqli_query($conn,$query);
  if ($result)
    return true;
  else
    return false;
}

function changeimg($name, $tmp_name)
{
  global $conn;
  $upload_dir = "../profile/" . $_SESSION['empid'] . ".jpg";
  $dir = "profile/" . $_SESSION['empid'] . ".jpg";
  if (move_uploaded_file($tmp_name, $upload_dir)) {
    $query = mysqli_query($conn,"update users set img='$dir' where empid='" . $_SESSION['empid'] . "'");
    return true;
  } else {
    return false;
  }
}

function updateUser($fname, $email, $mobile, $design)
{
  global $conn;
  $query = "update users set fname='$fname', designation='$design', mobile='$mobile', email='$email' where id='" . $_SESSION['admin_id'] . "'";
  $result = mysqli_query($conn,$query);
  if ($result)
    return true;
  else
    return false;
}

function getbackclaimedta($id)
{
  global $conn;
  $select = mysqli_query($conn,"select count(id) as total from forward_data where reference_id='$id'");
  $selectresult = mysqli_fetch_array($select);
  if ($selectresult['total'] > 0) {
    return false;
  } else {
    $delete = mysqli_query($conn,"delete from forward_data where reference_id='$id'");
    if ($delete) {
      $update = mysqli_query($conn,"update taentryform_master set forward_status='0' where reference='$id'");
      if ($update)
        return true;
      else
        return false;
    }
  }
}

//  function forward_TA($empid,$ref,$forwardName)
// {
//   global $con;
//   $month_array = array('January', 'February','March', 'April', 'May', 'June', 'July', 'August', 'October', 'November', 'December');
//   $reference_no = $empid."/".date("Y", strtotime(date('y-m-d')))."/".rand(000001, 999999);
//   $taentryform = array();
//   $result = mysqli_query("SELECT * FROM `taentryform_master` WHERE `reference` = '".$ref."'");
//   $row = mysqli_fetch_assoc($result);

//   $res = mysqli_query("SELECT * FROM `taentryforms` WHERE `reference_id` = '".$ref."'");
//   while($rw = mysqli_fetch_array($res)){
//     $taDate = date("F", strtotime($rw['taDate']));
//     $currDate = date("F", strtotime(date('y-m-d')));
//     if($taDate == $currDate){
//       array_push($taentryform, $rw['id']);
//       $objective = $rw['Objective'];
//     }
//   }
//   $month = explode(',', $row['TAMonth']);
//   $obj = $objective." ".$month_array[$month[0]]." month TA carried out.";
//   $count = count($taentryform);
//   if($count > 0){
//     $res = mysqli_query("INSERT INTO `taentryform_master` (`empid`, `reference`, `TAYear`, `TAMonth`, `objective`, `journey_type`, `cardpass`, `status`, `forward_status`, `created_at`, `rejected`) VALUES ('".$row['empid']."', '".$reference_no."', '".$row['TAYear']."', '".$row['TAMonth']."', '".$row['objective']."', '".$row['journey_type']."', '".$row['cardpass']."', ".$row['status'].", ".$row['forward_status'].", '".$row['created_at']."', ".$row['rejected'].")");
//     if(mysqli_affected_rows() > 0){
//       for($i = 0; $i < $count; $i++){
//         $r = mysqli_query("UPDATE `taentryforms` SET `reference_id` = '".$reference_no."', `Objective` = '".$obj."' WHERE `id` = '".$taentryform[$i]."'");
//       }
//     }
//   }

//   $query = "update taentryform_master set forward_status='1' where reference='$ref'";
//   $result = mysqli_query($query);

//   $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
//   $result = mysqli_query($query);

//   if($result){
//     $query = mysqli_query("SELECT mobile FROM employees WHERE pfno='".$empid."'");
//     $result_set = mysqli_fetch_array($query);
//     //Your authentication key
//     $authKey = "70302AbSftnyOwtvs53d8e401";

//     //Multiple mobiles numbers separated by comma
//     $mobileNumber = $result_set['mobile'];

//     //Sender ID,While using route4 sender id should be 6 characters long.
//     $senderId = "FINSUR";

//     //Your message to send, Add URL encoding here.
//     $msg = "Your TA claim with $ref reference number has been submitted successfully.";
//     $message = urlencode("$msg");

//     //Define route 
//     $route = 4;
//     //Prepare you post parameters
//     $postData = array(
//     'authkey' => $authKey,
//     'mobiles' => $mobileNumber,
//     'message' => $message,
//     'sender' => $senderId,
//     'route' => $route
//     );

//     //API URL
//     $url="http://smsindia.techmartonline.com/sendhttp.php";

//     //init the resource
//     $ch = curl_init();
//     curl_setopt_array($ch, array(
//     CURLOPT_URL => $url,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_POST => true,
//     CURLOPT_POSTFIELDS => $postData
//     //,CURLOPT_FOLLOWLOCATION => true
//     ));


//     //Ignore SSL certificate verification
//     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//     //get response
//     $output = curl_exec($ch);

//     //Print error if any
//     if(curl_errno($ch))
//     {
//     echo 'error:' . curl_error($ch);
//     }

//     curl_close($ch);
//     return true;
//   }
//   else{
//     return false;
//   }
// }

function forward_TA($empid, $ref, $forwardName)
{
  global $conn;
  echo "EId " . $empid . " REF " . $ref . " FDNM " . $forwardName;
  echo $query1 = "UPDATE `taentry_master` SET `forward_status`='1' WHERE `empid`='" . $empid . "' AND `reference_no`='" . $ref . "' ";
  $result1 = mysqli_query($conn,$query1);

  echo $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('" . $empid . "','" . $ref . "','" . $forwardName . "',CURRENT_TIMESTAMP,'1')";
  $result = mysqli_query($conn,$query);

  if ($result) {
    $query2 = mysqli_query($conn,"SELECT mobile FROM employees WHERE pfno='" . $empid . "'");
    $result_set = mysqli_fetch_array($query2);
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
      echo 'error:' . curl_error($ch);
    }

    curl_close($ch);
    return true;
  } else {
    return false;
  }
}

function validate_date($date)
{
  global $conn;
  $query = "select SUM(percent) AS SUM from taentryforms where empid='" . $_SESSION['empid'] . "' and taDate='$date' AND status != '0'";
  $result = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($result);
  $cnt = mysqli_num_rows($result);
  if ($cnt > 0 && $data['SUM'] != "") {
    return $data['SUM'];
  } else {
    return 0;
  }
}


function adminapprove($empid, $ref, $original_id)
{
  global $conn;
  echo $query = "update forward_data set admin_approved=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  echo $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$original_id',CURRENT_TIMESTAMP,'1')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}

//   function approveAndForward($empid,$ref,$forwardName,$original_id)
// {
//   global $con;
//   $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
//   $result = mysqli_query($query) or die(mysqli_error());
//   $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$original_id','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
//   $result = mysqli_query($query) or die(mysqli_erro());
//   if($result)
//     return true;
//   else
//     return false;
// }


//----------------------------------------------------------
function changePass($pass, $confirm)
{
  global $conn;
  $query = "update users set password='" . hashPassword($pass, SALT1, SALT2) . "' where empid='" . $_SESSION['empid'] . "'";
  $result = mysqli_query($conn, $query);
  if ($result)
    return true;
  else
    return false;
}
//Designation
function AddDesign($design)
{
  global $conn;
  $query = "insert into designation(designation) values('$design')";
  $result = mysqli_query($conn, $query);
  if ($result)
    return true;
  else
    return false;
}

function fetchDesign($id)
{
  global $conn;
  $query = "select * from designation where id = '$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return json_encode($value);
}
function UpdateDesign($design, $id)
{
  global $conn;
  $query = "update designation set designation='$design' where id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result)
    return true;
  else
    return false;
}

function DeleteDesign($id)
{
  global $conn;
  $query = "delete from designation where id='$id'";
  $result = mysqli_query($conn, $query);
  echo "<script>alert('$query');</script>";
  if ($result)
    return true;
  else
    return false;
}

/*function updateEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel,$update_id)
{
  global $con;
  $query = "UPDATE `employees` SET `pfno`='".$empid."', `name`='".$empname."', `BU`='".$billunit."', `mobile`='".$mobile."', `gp`='".$email."',  `desig`='".$design."', `panno`='".$pannumber."', `level`='".$paylevel."' WHERE `id`='".$update_id."'";
  //$query = "UPDATE `employees` SET `pfno`='$empid', `name`='$empname', `BU`='$billunit', `mobile`='$mobile', `gp`='$email', `desig`='$design',`panno`='$pannumber',`level`='$paylevel' WHERE id='$update_id'";
  $result = mysqli_query($query);
  echo mysqli_error();
  if($result)
    return true;
  else
    return false;
}*/

function FetchEmployee($id)
{
  global $conn;
  $query = "select * from employees where id = '$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  $data['empid'] = $value['pfno'];
  $data['empname'] = $value['name'];
  $data['billunit'] = $value['BU'];
  $data['mobile'] = $value['mobile'];
  $data['email'] = $value['gp'];
  $data['panno'] = $value['panno'];
  $data['designation'] = fetch_design_profile($value['desig']);
  $data['level'] = fetch_pay_level($value['level']);
  return json_encode($data);
}
function fetchEmployee1($id)
{
  global $conn;
  $query = "select * from employees where pfno = '$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  $data['billunit'] = $value['BU'];
  $data['empid'] = $value['pfno'];
  $data['panno'] = $value['panno'];
  $data['empname'] = $value['name'];
  $data['designation'] = $value['desig'];
  $data['station'] = $value['station'];
  $data['mobile'] = $value['mobile'];
  $data['email'] = $value['email'];
  $data['catg'] = $value['catg'];
  $data['dept'] = $value['dept'];
  $data['depot_id'] = $value['depot_id'];
  $data['bp'] = $value['bp'];
  $data['gp'] = $value['gp'];
  $data['bdate'] = $value['bdate'];
  $data['apdate'] = $value['apdate'];
  $data['level'] = $value['level'];
  return json_encode($data);
}

function fetchEmployeeUpdated($id)
{
  global $conn;
  $data = "";
  $query = "select * from employees_update where id = '$id' order by id DESC limit 1";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  $data['id'] = $value['id'];
  $data['pfno'] = $value['pfno'];
  $data['billunit'] = $value['BU'];
  $data['empid'] = $value['pfno'];
  $data['panno'] = $value['panno'];
  $data['empname'] = $value['name'];
  $data['designation_id'] = ($value['desig']);
  $data['designation'] = designation($value['desig']);
  $data['station_id'] = ($value['station']);
  $data['station'] = fetch_station($value['station']);
  $data['mobile'] = $value['mobile'];
  $data['email'] = $value['email'];
  $data['catg'] = $value['catg'];
  $data['dept_id'] = ($value['dept']);
  $data['dept'] = getdepartment($value['dept']);
  $data['depot_id1'] = ($value['depot_id']);
  $data['depot_id'] = getdepot($value['depot_id']);
  $data['bp'] = $value['bp'];
  $data['gp'] = $value['gp'];
  $data['bdate'] = $value['bdate'];
  $data['apdate'] = $value['apdate'];
  $data['level'] = $value['level'];
  return json_encode($data);
  //return $data;
}

function deleteEmployee($id)
{
  global $conn;
  $query = "delete from employees where id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result)
    return true;
  else
    return false;
}
function claimTA($data, $reference, $empid, $year, $months, $cnt, $set)
{
  global $conn;
  for ($i = 0; $i <= $cnt; $i++) {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','" . $data['date'][$i] . "','" . $data['train'][$i] . "','" . $data['departS'][$i] . "','" . $data['departT'][$i] . "','" . $data['arrivalS'][$i] . "','" . $data['arrivalT'][$i] . "','" . $data['distance'][$i] . "','" . $data['percent'][$i] . "','" . $data['amount'][$i] . "','" . $data['objective'][$i] . "','$set')";
    $_SESSION['table_ref'] = $reference;
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  }
  if ($result)
    return true;
  else
    return false;
}
function addclaimTA($data, $reference, $empid, $year, $months, $cnt, $set)
{
  global $conn;
  for ($i = 0; $i <= $cnt; $i++) {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','" . $data['date'][$i] . "','" . $data['train'][$i] . "','" . $data['departS'][$i] . "','" . $data['departT'][$i] . "','" . $data['arrivalS'][$i] . "','" . $data['arrivalT'][$i] . "','" . $data['distance'][$i] . "','" . $data['percent'][$i] . "','" . $data['amount'][$i] . "','" . $data['objective'][$i] . "','$set')";
    $_SESSION['table_ref'] = $reference;
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  }
  if ($result)
    return true;
  else
    return false;
}

function getTaAmount($level)
{
  global $conn;
  $query = "select amount from ta_amount where min<=$level AND max>=$level";
  $result  = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['amount'];
}

function approveAndForward($empid, $ref, $forwardName, $original_id)
{
  global $conn;
  $date = date('Y-m-d H:i:s');
  $query = "update forward_data set depart_time='" . $date . "',hold_status='0' where reference_id='" . $ref . "' AND fowarded_to='" . $empid . "' ";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('" . $original_id . "','" . $ref . "','" . $forwardName . "','" . $date . "','1')";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}

function AddEmployee($empid, $pannumber, $empname, $billunit, $mobile, $email, $design, $paylevel)
{
  global $conn;
  $query = "insert into employees(pfno,panno,name,BU,mobile,gp,desig,level,station,dept,psw) values('$empid','$pannumber','$empname','$billunit','$mobile','$email','$design','$paylevel','Solapur','ACCOUNTS','123')";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}

function AddUser($empid, $username, $psw, $role)
{
  global $conn;
  $query = "insert into users(empid,username,password,role) values('$empid','$username','" . hashPassword($psw, SALT1, SALT2) . "','$role')";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}

function updateEmpData($id, $pfno, $billunit, $panno, $empname, $designation, $station, $mobile, $email, $catg, $dept, $depot_id, $bp, $gp, $bdate, $apdate, $level)
{
  global $conn;
  $query = "UPDATE `employees` SET `BU`='" . $billunit . "',`panno`='" . $panno . "',`name`='" . $empname . "',`desig`='" . $designation . "',`station`='" . $station . "',`mobile`='" . $mobile . "',`email`='" . $email . "',`catg`='" . $catg . "',`dept`='" . $dept . "',`depot_id`='" . $depot_id . "',`bp`='" . $bp . "',`gp`='" . $gp . "',`bdate`='" . $bdate . "',`apdate`='" . $apdate . "',`level`='" . $level . "' WHERE pfno='" . $pfno . "' ";

  $query1 = "UPDATE employees_update SET isupdated='0' WHERE pfno='" . $pfno . "' ";
  // exit();
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));

  if ($result && $result1)
    return true;
  else
    return false;
}

function activeUser($pfno, $active)
{
  global $conn;
  $query = "update employees set status='" . $active . "' where pfno='" . $pfno . "'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    $empid = $_SESSION['empid'];
    $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    user_activity($empid, $file_name, 'Active the Employee', 'CI activate the ' . $pfno . ' employee');
    return true;
  } else {
    $empid = $_SESSION['empid'];
    $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    user_activity($empid, $file_name, 'Active the Employee', 'CI failed to activate the ' . $pfno . ' employee');
    return false;
  }
}

function activeDepot($id, $active)
{
  global $conn;
  $query = "UPDATE `depot_master` SET `status`='" . $active . "' WHERE id='$id'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}
function deactiveDepot($id, $active)
{
  global $conn;
  $query = "UPDATE `depot_master` SET `status`='" . $active . "' WHERE id='$id'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}
function deactiveUser($pfno, $active)
{
  global $conn;
  $query = "update employees set status='$active' where pfno='$pfno'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    $empid = $_SESSION['empid'];
    $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    user_activity($empid, $file_name, 'De-Active the Employee', 'CI deactivate the ' . $pfno . ' employee');
    return true;
  } else {
    $empid = $_SESSION['empid'];
    $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    user_activity($empid, $file_name, 'De-Active the Employee', 'CI failed to deactivate the ' . $pfno . ' employee');
    return false;
  }
}

function applybillunit($empid, $billunit)
{
  global $conn;
  $query = "insert into sep_billunit(employee_id,billunit) values('" . $empid . "','" . $billunit . "')";
  $result = mysqli_query($conn, $query);
  if ($result)
    return true;
  else
    return false;
}
