<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
include("function.php");
session_start();
//adminProcee requests

function fetch_employee_details($id)
{
  global $con;
  dbcon();
  $query = "select * from register_user where emp_no = '$id'";
  $result = mysql_query($query);
  // dbcon3();
  // $query_check = mysql_query("SELECT user_pfno FROM add_user WHERE user_pfno = '$id'");
  // $row = mysql_num_rows($query_check);
  if($result)
  {
      $value = mysql_fetch_array($result);
      $data['empid']=$value['emp_no'];
      $data['empname']=$value['name'];
      $data['dept']=getdepartment($value['department']);
      $data['deptno']=($value['department']);
      $data['desigcode']=designation($value['designation']);
      $data['designo']=($value['designation']);
      return json_encode($data); 
  }
}
?>
