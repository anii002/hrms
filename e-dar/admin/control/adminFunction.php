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
  $sql = mysqli_query($db_common,"SELECT * from register_user where emp_no='$id'");
  $res = mysqli_fetch_array($sql);
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


function add_user($emp_id,$role,$password)
{
  global $db_edar, $db_common;
  $datee = date("Y-m-d h:i:s");
  $sql_user_permission = "SELECT pf_num,dar FROM `user_permission` where pf_num='$emp_id'";
  $rst_user_permission = mysqli_query($db_common,$sql_user_permission);
  if (mysqli_num_rows($rst_user_permission) > 0) {
    $user_permission_roles = array();
    while ($rw_user_permission = mysqli_fetch_array($rst_user_permission)) {
      extract($rw_user_permission);
      $user_permission_roles = ($dar!="")?explode(',', $dar):array();
      // echo "User Persmission ROles";
      // var_dump($user_permission_roles);
      $role_final = explode(',', $role);
      // echo "role1";
      // var_dump($role_final);
      if (is_array($role_final)) {
        // echo "working";
        foreach ($role_final as  $value) {
          if (!in_array($value, $user_permission_roles)) {
            array_push($user_permission_roles, $value);
          }
        }
      } else {
        if (!in_array($role, $user_permission_roles)) {
          array_push($user_permission_roles, $role);
        }
      }
    }
    // var_dump($user_permission_roles);
    array_push($user_permission_roles, '7');
    $update_user_permission = implode(',', $user_permission_roles);
    $role = implode(",", $role_final);
    $sql_update_permission = "UPDATE `user_permission` SET `dar`='$update_user_permission' WHERE `pf_num`='$emp_id' ";
    if (mysqli_query($db_common,$sql_update_permission)) {

      $sql_user="INSERT INTO `tbl_user`(`emp_id`,`username`,`password`,`role`,`status`,`created_date`,`created_by`) VALUES ('$emp_id','$emp_id','$password','$role','1','" . $datee . "','" . $_SESSION['id'] . "')";
      $insert_user = mysqli_query( $db_edar,$sql_user) or trigger_error("Query Failed: " . mysqli_error($db_edar));
      if ($insert_user) {
        return true;
      } else {
        return false;
      }
    }
  } else {
    $role_final = explode(",", $role);
    array_push($role_final, '7');
    $role_common = implode(",", $role_final);
    $sql_user_permission = "INSERT INTO `user_permission`(`pf_num`,`dar`) VALUES('$emp_id','$role_common')";
    $insert_permission = mysqli_query($db_common,$sql_user_permission );
    
    $sql_user=("INSERT INTO `tbl_user`(`emp_id`,`username`,`password`,`role`,`status`,`created_date`,`created_by`) VALUES ('$emp_id','$emp_id','$password','$role','1','" . $datee . "','" . $_SESSION['id'] . "')");
    $insert_user = mysqli_query( $db_edar,$sql_user) or trigger_error("Query Failed: " . mysqli_error($db_edar));
    if ($insert_user && $insert_permission) {
      return true;
    } else {
      return false;
    }
  }
}


function update_user($emp_id,$role)
{
  global $db_edar, $db_common;
  $datee = date("Y-m-d h:i:s");
  $sql_user_permission = "SELECT pf_num,dar FROM `user_permission` where pf_num='$emp_id'";
  $rst_user_permission = mysqli_query($db_common,$sql_user_permission);
  if (mysqli_num_rows($rst_user_permission) > 0) {
    $user_permission_roles = array();
    while ($rw_user_permission = mysqli_fetch_array($rst_user_permission)) {
      extract($rw_user_permission);
      // $user_permission_roles = explode(',', $dar);
      $user_permission_roles = ($dar!="")?explode(',', $dar):array();
      // echo "User Persmission ROles";
      // var_dump($user_permission_roles);
      $role_final = explode(',', $role);
      // echo "role1";
      // var_dump($role_final);
      if (is_array($role_final)) {
        // echo "working";
        foreach ($role_final as  $value) {
          if (!in_array($value, $user_permission_roles)) {
            array_push($user_permission_roles, $value);
          }
        }
      } else {
        if (!in_array($role, $user_permission_roles)) {
          array_push($user_permission_roles, $role);
        }
      }
    }
    // var_dump($user_permission_roles);
    //array_push($user_permission_roles, '7');
    $update_user_permission = implode(',', $user_permission_roles);
    $role = implode(",", $role_final);
    $sql_update_permission = "UPDATE `user_permission` SET `dar`='$update_user_permission' WHERE `pf_num`='$emp_id' ";
    if (mysqli_query($db_common,$sql_update_permission )) {

       $sql_user=("update tbl_user set role='$role' where emp_id='$emp_id'");
    $insert_user = mysqli_query($db_edar,$sql_user ) or trigger_error("Query Failed: " . mysqli_error($db_edar));
    if ($insert_user ) {
      return true;
    } else {
      return false;
    }
      
        
       
      }
    }
   else {
    $role_final = explode(",", $role);
    array_push($role_final, '7');
    $role_common = implode(",", $role_final);
    $sql_user_permission = "INSERT INTO `user_permission`(`pf_num`,`dar`) VALUES('$emp_id','$role_common')";
    $insert_permission = mysqli_query($db_common,$sql_user_permission );
   
    $sql_user=("update tbl_user set role='$role' where emp_id='$emp_id'");
    $insert_user = mysqli_query($db_edar,$sql_user) or trigger_error("Query Failed: " . mysqli_error($db_edar));
    if ($insert_user && $insert_permission) {
      return true;
    } else {
      return false;
    }
  }
}