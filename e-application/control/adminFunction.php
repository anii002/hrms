<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
include("function.php");
session_start();
//adminProcee requests

function fetchEmployee1($id)
{
  global $con;
  dbcon2();
  $query = "select * from register_user where emp_no = '$id'";
  $result = mysql_query($query);
  dbcon3();
  $query_check = mysql_query("SELECT user_pfno FROM add_user WHERE user_pfno = '$id'");
  $row = mysql_num_rows($query_check);
  if($row > 0)
  {
    return 1;  
  }
  else
  {
      $value = mysql_fetch_array($result);
      $data['empid']=$value['emp_no'];
      $data['empname']=$value['name'];
      $data['billunit']=$value['bill_unit'];
      $data['phoneno']=$value['mobile'];
      $data['email2']=$value['emp_email'];
      $data['dept']=getdepartment($value['department']);
      $data['deptno']=($value['department']);
      $data['desigcode']=designation($value['designation']);
      $data['designo']=($value['designation']);
      $data['pc7_level']=$value['7th_pay_level'];
      $data['office']=$value['office'];
      $data['station']=$value['station'];
      $data['dob']=$value['dob'];
      return json_encode($data);
  }
}

function fetch_employee_details($id)
{
  global $con;
  dbcon2();
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
      $data['billunit']=$value['bill_unit'];
      $data['phoneno']=$value['mobile'];
      $data['email2']=$value['emp_email'];
      $data['dept']=getdepartment($value['department']);
      $data['deptno']=($value['department']);
      $data['desigcode']=designation($value['designation']);
      $data['designo']=($value['designation']);
      $data['pc7_level']=$value['7th_pay_level'];
      $data['office']=$value['office'];
      $data['station']=$value['station'];
      $data['dob']=$value['dob'];
      return json_encode($data); 
  }
}

function fetchEmployee2($id)
{
  global $con;
  dbcon2();
  $query = "select * from register_user where emp_no = '$id'";
  $result = mysql_query($query);
  
  if($result)
  {
      $value = mysql_fetch_array($result);
      $data['empname']=$value['name'];
      $data['desigcode']=designation($value['designation']);
      $data['station']=$value['station'];
      return json_encode($data);
      
  }
  else
  {
    return 1;  
  }
}
function fetchuser($id)
{
  global $con;
  dbcon3();
  $query = "select * from add_user where user_id = '$id'";
  $result = mysql_query($query);
  if($result)
  {
      $value = mysql_fetch_array($result);
      $data['user_bu']=$value['user_bu'];
      $data['user_role']=$value['user_role'];

      return json_encode($data);  
  }
  else
  {
     return 1;
  }
}
function fetchuseremp($id)
{
  global $con;

  dbcon2();
  $query_bu = mysql_query("SELECT `bill_unit` FROM `register_user` WHERE emp_no = '".$id."'");
  $row_bu = mysql_fetch_array($query_bu);
   // echo $row_bu['bill_unit']."<br>";
  dbcon3();
  $query_bu_users = mysql_query("SELECT `user_pfno`, `user_bu` FROM `add_user` WHERE user_role = '1'");
  // $row_bu_users = mysql_fetch_array($query_bu_users);
  while($row_bu_users = mysql_fetch_array($query_bu_users))
  {
    // print_r($row_bu_users);
    $b=array();
    $b=explode(",",$row_bu_users['user_bu']);
     //print_r($b);
    if(in_array($row_bu['bill_unit'], $b))
    {
       //echo $row_bu_users['user_pfno'];
      dbcon2();
      $q_name = mysql_query("SELECT `emp_no`,`name` FROM `register_user` WHERE emp_no = '".$row_bu_users['user_pfno']."'");
      $value = mysql_fetch_array($q_name);
      $data['emp_no']=$value['emp_no'];
      $data['name']=$value['name'];
      
      // $data = "<option value='".$row_bu_users['user_pfno']."'>".$value['name']."</option>";
      // echo $data;
       return json_encode($data);  
    }
    else
    {
      return 1;
    }

  }                                                     
}
function update_purpose($id,$purpose)
{
  global $con;
  dbcon3();
  $query = "UPDATE `purpose` SET `purpose`='$purpose' WHERE purpose_id = '$id'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function deletepurpose($id)
{
  global $con;
  dbcon3();
  $query = "delete from purpose where purpose_id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function deleteapplication($id)
{
  global $con;
  dbcon3();
  $query = "delete from add_application where application_id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function deleteuser($id)
{
  global $con;
  dbcon3();
  $query = "delete from add_user where user_id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}

function getSection($id)
{
  global $con;
  dbcon3();
  $query_sec = mysql_query("SELECT sec_name FROM tbl_section WHERE sec_id = '$id'");
  $row_sec = mysql_fetch_array($query_sec);
   if($query_sec)
   {
      return $row_sec['sec_name'];
   }
   else{
    return "";
   }
}
?>
