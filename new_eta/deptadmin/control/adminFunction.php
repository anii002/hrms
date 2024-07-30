<?php
date_default_timezone_set("Asia/kolkata");
include("function.php");

function AddAdmin($empid,$username,$role,$dept,$station,$empname,$mobile,$email,$design,$paylevel)
{
    global $conn;
    $query = "insert into users(empid,username,role,dept,station) values('$empid','$username','$role','$dept','$station')";
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    
    db_connect("drmpsurh_sur_railway");
    $user_p_query="SELECT pf_num,tamm from user_permission WHERE pf_num='".$empid."' ";
    $user_p_result=mysqli_query($conn,$user_p_query);
    $user_p_cnt=mysqli_num_rows($user_p_result);
    
    if($user_p_cnt > 0)
    {
        $user_p_rows=mysqli_fetch_array($user_p_result);
        $tamm_rows=$user_p_rows['tamm'];
        $ext_roles=explode(',', $tamm_rows);

        if(!in_array($role, $ext_roles))
        {
          array_push($ext_roles,$role);
        }
        // $tamm_rows=",$role";
        $final_role=implode(',', $ext_roles);
        
        $sql_up = "UPDATE user_permission SET tamm ='".$final_role."' WHERE pf_num='".$empid."' ";
        $result_up = mysqli_query($conn,$sql_up);
    }
    else
    {
        $sql_up = "INSERT INTO user_permission (pf_num, tamm) VALUES ('".$empid."', '".$role."')";
        $result_up = mysqli_query($conn,$sql_up);
    }
    
    
    if($result && $result_up)
    {
        db_connect("drmpsurh_travel_allowance1");
        $query1="UPDATE `employees` SET `name`='".$empname."',`desig`='".$design."',`mobile`='".$mobile."',`email`='".$email."',`level`='".$paylevel."' WHERE `pfno`='".$empid."' ";
        $result1=mysqli_query($conn,$query1);
        if($result1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
        return false;
    
}


function updateEmpData($pfno,$designation,$stst,$mobile,$level,$emp_role)
{
    global $conn;
    $query = "UPDATE `employees` SET `desig`='".$designation."',`mobile`='".$mobile."',`level`='".$level."' WHERE pfno='".$pfno."' ";

    $query1="UPDATE users SET role='".$emp_role."',station='".$stst."' WHERE empid='".$pfno."'";

    $result = mysqli_query($conn,$query) or die(mysqli_error($conn)); 
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));

    if($result && $result1)
      return true;
    else
      return false;
}

function updateEmpData1($id,$pfno,$billunit,$panno,$empname,$designation,$station,$mobile,$email,$catg,$dept,$depot_id,$bp,$gp,$bdate,$apdate,$level)
{
    global $conn;
     $query = "UPDATE `employees` SET `BU`='".$billunit."',`panno`='".$panno."',`name`='".$empname."',`desig`='".$designation."',`station`='".$station."',`mobile`='".$mobile."',`email`='".$email."',`catg`='".$catg."',`dept`='".$dept."',`depot_id`='".$depot_id."',`bp`='".$bp."',`gp`='".$gp."',`bdate`='".$bdate."',`apdate`='".$apdate."',`level`='".$level."' WHERE pfno='".$pfno."' ";

    $query1="UPDATE employees_update SET isupdated='0' WHERE pfno='".$pfno."' AND id='".$id."' ";

    $result = mysqli_query($conn,$query) or die(mysqli_error($conn)); 
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));

    if($result && $result1)
      return true;
    else
      return false;
}



function changeimg($name,$tmp_name)
{
  global $conn;
	$upload_dir = "../profile/".$_SESSION['empid'].".jpg";
	$dir = "profile/".$_SESSION['empid'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysqli_query($conn,"update users set img='$dir' where empid='".$_SESSION['empid']."'");
        return true;
    } else {
        return false;
    }
}
function updateUser($fname,$email,$mobile,$design)
{
  global $conn;
  $query = "update users set fname='$fname', designation='$design', mobile='$mobile', email='$email' where id='".$_SESSION['admin_id']."'";
  $result = mysqli_query($conn,$query);
  if($result)
    return true;
  else
    return false;
}

function getbackclaimedta($id)
{
  global $conn;
    $select = mysqli_query($conn,"select count(id) as total from forward_data where reference_id='$id'");
    $selectresult = mysqli_fetch_array($select);
    if($selectresult['total'] > 0)
    {
      return false;
    }
    else
    {
        $delete = mysqli_query($conn,"delete from forward_data where reference_id='$id'");
        if($delete)
        {
          $update = mysqli_query($conn,"update taentryform_master set forward_status='0' where reference='$id'");
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
  global $conn;
  $month_array = array('January', 'February','March', 'April', 'May', 'June', 'July', 'August', 'October', 'November', 'December');
  $reference_no = $empid."/".date("Y", strtotime(date('y-m-d')))."/".rand(000001, 999999);
  $taentryform = array();
  $result = mysqli_query($conn,"SELECT * FROM `taentryform_master` WHERE `reference` = '".$ref."'");
  $row = mysqli_fetch_assoc($result);

  $res = mysqli_query($conn,"SELECT * FROM `taentryforms` WHERE `reference_id` = '".$ref."'");
  while($rw = mysqli_fetch_array($res)){
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
    $res = mysqli_query($conn,"INSERT INTO `taentryform_master` (`empid`, `reference`, `TAYear`, `TAMonth`, `objective`, `journey_type`, `cardpass`, `status`, `forward_status`, `created_at`, `rejected`) VALUES ('".$row['empid']."', '".$reference_no."', '".$row['TAYear']."', '".$row['TAMonth']."', '".$row['objective']."', '".$row['journey_type']."', '".$row['cardpass']."', ".$row['status'].", ".$row['forward_status'].", '".$row['created_at']."', ".$row['rejected'].")");
    if(mysqli_affected_rows($conn) > 0){
      for($i = 0; $i < $count; $i++){
        $r = mysqli_query($conn,"UPDATE `taentryforms` SET `reference_id` = '".$reference_no."', `Objective` = '".$obj."' WHERE `id` = '".$taentryform[$i]."'");
      }
    }
  }
  
  $query = "update taentryform_master set forward_status='1' where reference='$ref'";
  $result = mysqli_query($conn,$query);

  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysqli_query($conn,$query);

  if($result){
    $query = mysqli_query($conn,"SELECT * FROM employees WHERE pfno='".$empid."'");
    $result_set = mysqli_fetch_array($query);
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
  global $conn;
  $query = "select SUM(percent) AS SUM from taentryforms where empid='".$_SESSION['empid']."' and taDate='$date' AND status != '0'";
      $result = mysqli_query($conn,$query);
      $data = mysqli_fetch_array($result);
      $cnt = mysqli_num_rows($result);
      if($cnt>0 && $data['SUM']!="")
      {
        return $data['SUM'];
      }
      else
      {
        return 0;
      }
}


function adminapprove($empid,$ref,$original_id)
{
  global $conn;
  echo $query = "update forward_data set admin_approved=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  echo $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$empid','$ref','$original_id',CURRENT_TIMESTAMP,'1')";
   $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($result)
    return true;
  else
    return false;
}

//----------------------------------------------------------
function changePass($pass,$confirm)
{
  global $conn;
  $query = "update users set password='".hashPassword($pass,SALT1,SALT2)."' where empid='".$_SESSION['empid']."'";
  $result = mysqli_query($conn,$query);
  if($result) 
    return true;
  else
    return false;
}
//Designation
function AddDesign($design)
{
  global $conn;
  $query = "insert into designation(designation) values('$design')";
  $result = mysqli_query($conn,$query);
  if($result)
    return true;
  else
    return false;
}
function fetchDesign($id)
{
  global $conn;
  $query = "select * from designation where id = '$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return json_encode($value);
}
function UpdateDesign($design,$id)
{
  global $conn;
  $query = "update designation set designation='$design' where id='$id'";
  $result = mysqli_query($conn,$query);
  if($result)
    return true;
  else
    return false;
}

function DeleteDesign($id)
{
  global $conn;
  $query = "delete from designation where id='$id'";
  $result = mysqli_query($conn,$query);
    echo "<script>alert('$query');</script>";
  if($result)
    return true;
  else
    return false;
}
function updateEmployee($empid,$billunit,$panno,$fullname,$desig,$station,$mobile,$email,$category,$dept,$txtworkdepot,$txtbasicpay,$gradepay,$txtdob,$txtappointment,$level)
{
  global $conn;
//   $query = "UPDATE `employees` SET `name`='$empname', `BU`='$billunit', `mobile`='$mobile', `gp`='$email', `desig`='$design',`panno`='$pannumber',`level`='$paylevel' WHERE pfno='".$empid."' ";
  $query = "UPDATE `employees` SET `BU`='".$billunit."' ,`panno`='".$panno."',`name`='".$fullname."',`desig`='".$desig."',`station`='".$station."',`mobile`='".$mobile."',`email`='".$email."',`catg`='".$category."',`dept`='".$dept."',`depot_id`='".$txtworkdepot."',`bp`='".$txtbasicpay."',`gp`='".$gradepay."',`bdate`='".$txtdob."',`apdate`='".$txtappointment."',`level`='".$level."' WHERE pfno='".$empid."' ";
  $result = mysqli_query($conn,$query);
  if($result)
    return true;
  else
    return false;
}
function FetchEmployee($id)
{
  global $conn;
  $query = "select * from employees where id = '$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
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
  global $conn;
  $query = "select * from employees where pfno = '$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
//   $qu=mysqli_query("select empid from users where empid='$id' AND (role='12' OR role='13') ");
//   $res=mysqli_num_rows($qu);
//   if($res > 0)
//   {
//      return 1;
//   }
//   else
//   {
      
      $data['empid']=$value['pfno'];
      $data['empname']=$value['name'];
      $data['billunit']=$value['BU'];
      $data['mobile']=$value['mobile'];
      $data['email']=$value['email'];
      $data['panno']=$value['panno'];
      $data['designation']=$value['desig'];
      $data['level']=$value['level'];
      //$data['fl']=$value['first_login'];
      return json_encode($data);
 // }
}
function deleteEmployee($id)
{
  global $conn;
  $query = "delete from employees where id='$id'";
  $result = mysqli_query($conn,$query);
  if($result)
    return true;
  else
    return false;
}
function claimTA($data,$reference,$empid,$year,$months,$cnt,$set)
{
  global $conn;
  for($i=0;$i<=$cnt;$i++)
  {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','".$data['date'][$i]."','".$data['train'][$i]."','".$data['departS'][$i]."','".$data['departT'][$i]."','".$data['arrivalS'][$i]."','".$data['arrivalT'][$i]."','".$data['distance'][$i]."','".$data['percent'][$i]."','".$data['amount'][$i]."','".$data['objective'][$i]."','$set')";
    $_SESSION['table_ref']=$reference;
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  }
  if($result)
    return true;
  else
    return false;
}
function addclaimTA($data,$reference,$empid,$year,$months,$cnt,$set)
{
  global $conn;
  for($i=0;$i<=$cnt;$i++)
  {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','".$data['date'][$i]."','".$data['train'][$i]."','".$data['departS'][$i]."','".$data['departT'][$i]."','".$data['arrivalS'][$i]."','".$data['arrivalT'][$i]."','".$data['distance'][$i]."','".$data['percent'][$i]."','".$data['amount'][$i]."','".$data['objective'][$i]."','$set')";
    $_SESSION['table_ref']=$reference;
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  }
  if($result)
    return true;
  else
    return false;
}

function getTaAmount($level)
{
  global $conn;
  $query = "select amount from ta_amount where min<=$level AND max>=$level";
  $result  = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['amount'];
}

function approveAndForward($empid,$ref,$forwardName,$original_id)
{
  global $conn;
  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$original_id','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($result)
    return true;
  else
    return false;
}

function AddEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel)
{
  global $conn;
  $query = "insert into employees(pfno,panno,name,BU,mobile,gp,desig,level,station,dept,psw) values('$empid','$pannumber','$empname','$billunit','$mobile','$email','$design','$paylevel','Solapur','ACCOUNTS','123')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($result)
    return true;
  else
    return false;
}

function AddUser($empid,$username,$psw,$role)
{
  global $conn;
  $query = "insert into users(empid,username,password,role) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','$role')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($result)
    return true;
  else
    return false;
}

function activeUser($pfno,$active,$role){
  global $conn;
  $query = "update users set status='$active' where empid='$pfno' AND role='".$role."' ";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn,));
  
  db_connect("drmpsurh_sur_railway");

  $user_p_query = "SELECT pf_num,tamm from user_permission WHERE pf_num='" . $pfno . "' ";
  $user_p_result = mysqli_query($conn,$user_p_query);
  $user_p_cnt = mysqli_num_rows($user_p_result);

  if ($user_p_cnt > 0) 
  {
    $user_p_rows=mysqli_fetch_array($user_p_result);
    $tamm_rows=$user_p_rows['tamm'];
    $ext_roles=explode(',', $tamm_rows);

    if(!in_array($role, $ext_roles))
    {
      array_push($ext_roles,$role);
    }
    // $tamm_rows=",$role";
    $final_role=implode(',', $ext_roles);
    
    $sql_up = "UPDATE user_permission SET tamm ='".$final_role."' WHERE pf_num='".$pfno."' ";
    $result_up = mysqli_query($conn,$sql_up);
  } 
  
  if($result)
    return true;
  else
    return false;
}


function fetchEmployeeUpdated($id)
{
  global $conn;
  $query = "select users.empid as empid,employees.name as name,employees.dept as dept,employees.desig as desig,employees.mobile as mobile,users.role as role,users.station as station,employees.level as level from users,employees where users.empid=employees.pfno AND users.empid= '".$id."'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  $data['pfno']=$value['empid'];
  $data['name']=$value['name'];
  // $data['name']=get_employee($value['empid']);
  $data['role']=$value['role'];
  $data['level']=$value['level'];
  $data['station_id']=($value['station']);
  $data['mobile']=($value['mobile']);
  $data['station']=fetch_station1($value['station']);
  $data['desig_id']=($value['desig']);
  $data['dept']=($value['dept']);
  $data['desig']=designation($value['desig']);
  
    $data['option']='';
    $query_emp = "select DISTINCT(empid) from users where dept='".$data['dept']."' AND status='1' AND role NOT IN(0) AND empid NOT IN('$id') ";
    $result_emp = mysqli_query($conn,$query_emp);
    echo mysqli_error($conn);
    while($value_emp = mysqli_fetch_array($result_emp))
	{
	  $data['option'].="<option value='".$value_emp['empid']."'>".get_employee($value_emp['empid'])."</option>";
	}
  return json_encode($data);
}


function activeDepot($id,$active){
  global $conn;
  $query = "UPDATE `depot_master` SET `status`='".$active."' WHERE id='$id'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($result)
    return true;
  else
    return false;
}
function deactiveDepot($id,$active){
  global $conn;
  $query = "UPDATE `depot_master` SET `status`='".$active."' WHERE id='$id'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($result)
    return true;
  else
    return false;
}
function deactiveUser($pfno,$active,$role){
  global $conn;
 $query = "update users set status='$active' where empid='$pfno' AND role='".$role."' ";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  db_connect("");

  $user_p_query = "SELECT pf_num,tamm from user_permission WHERE pf_num='" . $pfno . "' ";
  $user_p_result = mysqli_query($conn,$user_p_query);
  $user_p_cnt = mysqli_num_rows($user_p_result);

  if ($user_p_cnt > 0) 
  {
    
    $user_p_rows=mysqli_fetch_array($user_p_result);
    $tamm_rows=$user_p_rows['tamm'];
    $ext_roles=explode(',', $tamm_rows);

    if(in_array($role, $ext_roles))
    {
      $ext_roles1 =array_diff($ext_roles, [$role]);
    }
    // $tamm_rows=",$role";
    $final_role=implode(',', $ext_roles1);
    
    $sql_up = "UPDATE user_permission SET tamm ='".$final_role."' WHERE pf_num='".$pfno."' ";
    $result_up = mysqli_query($conn,$sql_up);
    echo mysqli_error($conn);
  } 
  
  if($result)
    return true;
  else
    return false;
}

function applybillunit($empid,$billunit)
{
  global $conn;
  $query = "insert into sep_billunit(employee_id,billunit) values('".$empid."','".$billunit."')";
  $result = mysqli_query($conn,$query);
  if($result)
    return true;
  else
    return false;
}

 
function summarysend($forwardName,$original_id,$loginid)
{
    global $conn;
    $query_select = mysqli_query($conn,"SELECT * FROM tbl_summary_details where summary_id = '".$original_id."'");
    while($result_set = mysqli_fetch_array($query_select))
    {
  echo   $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='".$result_set['reference']."' and fowarded_to='$loginid' ";
      $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
      $query_update = "update tbl_summary set forward_status='1', approved_status='1' where id='".$result_set['summary_id']."'";
      $result = mysqli_query($conn,$query_update) or die(mysqli_error($conn));
      $innerquery = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,summary) values('".$result_set['empid']."','".$result_set['reference']."','".$forwardName."',CURRENT_TIMESTAMP,'1','1')";
      $result = mysqli_query($conn,$innerquery) or die(mysqli_error($conn));
    }
    if($result)
      return true;
    else
      return false;
}
function generatesummary($selected_list_emp,$selected_list,$title,$description,$yy,$mm,$summary_id,$dept_id)
{
    global $conn;
  // $query_summary = mysqli_query("INSERT into tbl_summary (title,description, othe_dept) values('$title','$description', '1')");
    $TAYear=($yy);
    $TAMonth=implode(",", $mm);
    $d=date("d-m-Y h:i:s");
    $title1=mysqli_real_escape_string($conn,$title);
    $description1=mysqli_real_escape_string($conn,$description);
    // echo ("INSERT into master_summary (title,description,generated_date,forward_status,estcrk_status,month,year,summary_id,dept_id) values('".$title1."','".$description1."','".$d."','0','0','".$TAMonth."','".$TAYear."','".$summary_id."','".$dept_id."')");
    $query_summary = mysqli_query($conn,"INSERT into master_summary (title,description,generated_date,forward_status,estcrk_status,month,year,summary_id,dept_id) values('".$title1."','".$description1."','".$d."','0','0','".$TAMonth."','".$TAYear."','".$summary_id."','".$dept_id."')");
    echo mysqli_error($conn);
    $id = mysqli_insert_id($conn,);
    $cnt = 0;
    foreach($selected_list as $list)
    {
      global $conn;
        $query = "UPDATE forward_data set summary='1'where reference_id='$list'";
        $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    
        $q_update="UPDATE `tasummarydetails` SET is_summary_generated='1',summary_id='".$summary_id."' WHERE reference_no='".$list."' ";
        $u_result=mysqli_query($conn,$q_update);
        
        $cnt++;
    }
    if($result)
        return true;
    else
        return false;
}