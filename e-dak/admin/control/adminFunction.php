<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests
function get_employee_details($id)
{
    global $db_edak;
     $qu=mysql_query("SELECT emp_id from tbl_user where emp_id='$id'",$db_edak);
  $res=mysql_num_rows($qu);
  if($res > 0)
  {
     return 1;
  }
  else
  {
  global $db_common;
  $data = [];
  $sql = mysql_query("SELECT * from resgister_user where emp_no='$id'", $db_common);
  $res = mysql_fetch_array($sql);
  $data['pf_number'] = $res['emp_no'];
  $data['emp_name'] = $res['name'];
  $data['designation'] = designation($res['designation']);
  $data['designation1'] = ($res['designation']);
  $data['scale'] = $res['basic_pay'];
  $data['dept'] = getdepartment($res['department']);
  $data['dept1'] = ($res['department']);
  $data['mobile'] = $res['mobile'];
  $data['dob'] = $res['dob'];
  }
  return $data;
}
// }else{
function add_user($empid, $desig1, $dept1, $role, $section, $dob)
{
  global $db_common;
  global $db_edak;
  $psw1 = explode('/', $dob);
  $psw = $psw1[0] . $psw1[1] . $psw1[2];

  $date = date("d-m-Y h:i:sa");
  // echo $query = ("INSERT INTO `tbl_user`(`empid`,`section`, `user_dept`, `user_desg`, `username`,`password`,`role`,`status`) VALUES ('$empid','$section','$dept1','$desig1','$empid','" . hashPassword($psw, SALT1, SALT2) . "','$role','1')");
  $password = hashPassword($psw, SALT1, SALT2);

  $sql_in = "SELECT pf_num,e_dak from user_permission where pf_num='$empid'";
  $sql = mysql_query($sql_in, $db_common);
  //var_dump($sql);
  if (mysql_num_rows($sql) == 0) {
    $ins = ("INSERT into user_permission(`pf_num`,`e_dak`) values('$empid','$role')");
    $ins_res = mysql_query($ins, $db_common);
  } else {

    $row_usr = mysql_fetch_array($sql);
    if (empty($row_usr["e_dak"])) {

      $upd = ("UPDATE user_permission set e_dak='$role' where pf_num='$empid'");
      $ss = mysql_query($upd, $db_common);
     
    } else {
      $user_perm = explode(",", $row_usr["e_dak"]);
      //print_r($user_perm);
      if (in_array("$role", $user_perm)) {
        return '2';
      } elseif (!in_array(",", $user_perm)) {
        array_push($user_perm, $role);
        $user_perm = (count($user_perm) > 1) ? implode(",", $user_perm) : 1;
        //print_r($user_perm);
        $upd = ("UPDATE user_permission set e_dak='$user_perm' where pf_num='$empid'");
        $s = mysql_query($upd, $db_common);
        
      }
    }
  }
$qu = ("INSERT INTO `tbl_user`(`emp_id`,`section`, `user_dept`, `user_desg`, `username`,`password`,`role`,`status`) VALUES ('$empid','$section','$dept1','$desig1','$empid','$password','$role','1')");
$query=mysql_query($qu,$db_edak);

  if ($query) {
    return '1';
  } else {
    return '0';
  }
}
