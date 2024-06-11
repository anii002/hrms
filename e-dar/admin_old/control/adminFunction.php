<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include_once("../../dbconfig/dbcon.php");
include_once("../../common_files/common_functions.php");
// include("function.php");
session_start();
//adminProcee requests
function get_employee_details($id)
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

  return $data;
}