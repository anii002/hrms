<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include_once('adminFunction.php');
switch ($_REQUEST['action']) {
  case 'add_masterForm':
    $data = '';

    $form_name = mysql_real_escape_string($_POST['form_name']);
    $form_title = (mysql_real_escape_string($_POST['form_title']));
    $penality_type = $_POST['penality_type'];
    $ins_date = date('Y-m-d h:i:s');
    $ins_frm = mysql_query("INSERT into tbl_master_form (form_name,form_title,form_type,created_at,created_by,status) values('" . $form_name . "','" . $form_title . "','" . $penality_type . "','" . $ins_date . "','" . $_SESSION['id'] . "','1')", $db_edar);
    if ($ins_frm) {
      $data = '1';
    } else {
      $data = '0';
    }
    echo $data;
    break;

  case 'updateMasterForm':
    $update_frm = mysql_query("UPDATE tbl_master_form set form_name='" . $_POST['u_form_name'] . "',form_title='" . $_POST['u_form_title'] . "',form_type='" . $_POST['u_penality_type'] . "' where id='" . $_POST['frm_id'] . "' ", $db_edar);
    if ($update_frm) {
      echo "<script>alert('Updated Successfully');window.location='../master_forms.php';</script>";
    } else {
      echo "<script>alert('Failed to update!!!');window.location='../master_forms.php';</script>";
    }
    break;


  case 'removeMasterForm':

    $sql = "DELETE from tbl_master_form where id='" . $_POST['id'] . "' ";
    $result = mysql_query($sql, $db_edar);
    if ($result) {
      $data = 1;
    } else {
      $data = 0;
    }
    echo $data;
    break;

  case 'add_PType':
    $data = '';

    $penality_type = $_POST['p_name'];
    $ins_date = date('Y-m-d h:i:s');
    $ins_frm = mysql_query("INSERT into tbl_penality_type (penality_name,created_at,created_by,status) values('" . $penality_type . "','" . $ins_date . "','" . $_SESSION['id'] . "','1')", $db_edar);
    if ($ins_frm) {
      $data = '1';
    } else {
      $data = '0';
    }
    echo $data;
    break;


  case 'updatePType':
    $update_ptype = mysql_query("UPDATE tbl_penality_type set penality_name='" . $_POST['u_p_name'] . "' where id='" . $_POST['frm_id'] . "' ", $db_edar);
    if ($update_ptype) {
      echo "<script>alert('Updated Successfully');window.location='../master_penalty_type.php';</script>";
    } else {
      echo "<script>alert('Failed to update!!!');window.location='../master_penalty_type.php';</script>";
    }
    break;

  case 'removePType':
    $sql = "DELETE from tbl_penality_type where id='" . $_POST['id'] . "' ";
    $result = mysql_query($sql, $db_edar);
    if ($result) {
      $data = 1;
    } else {
      $data = 0;
    }
    echo $data;
    break;
  case 'add_section':
    $ins_src = mysql_query("INSERT into tbl_section (sec_name,created_by) values('" . $_POST['sec_name'] . "','" . $_SESSION['role'] . "')", $db_edak);
    if ($ins_src) {
      echo "<script>alert('Inserted Successfully');window.location='../master_section.php';</script>";
    } else {
      echo "<script>alert('Failed');window.location='../master_section.php';</script>";
    }
    break;

  case 'update_section':
    $update_src = mysql_query("UPDATE tbl_section set sec_name='" . $_POST['sec_name'] . "' where sec_id='" . $_POST['fid'] . "' ", $db_edak);
    if ($update_src) {
      echo "<script>alert('Updated Successfully');window.location='../master_section.php';</script>";
    } else {
      echo "<script>alert('Failed');window.location='../master_section.php';</script>";
    }
    break;


  case 'removeSec':

    $sql = "DELETE from tbl_section where sec_id='" . $_POST['id'] . "' ";
    $result = mysql_query($sql, $db_edak);
    if ($result) {
      $data = 1;
    } else {
      $data = 0;
    }
    echo $data;
    break;

  case 'fetch_employee_details':

    $id = $_POST['id'];
    $data = [];
    $data = get_employee_details($id);
    echo json_encode($data);
    break;

  case 'add_user':
    $data = '';
    //$section = isset($_POST['section']) ? $_POST['section'] : "";
    $dob = $_POST['dob'];
    $empid = $_POST['empid'];
    $role = $_POST['role'];
    $psw1 = explode('/', $dob);
    $psw = $psw1[0] . $psw1[1] . $psw1[2];
    $datee = date("Y-m-d h:i:s");
    $password = hashPassword($psw, SALT1, SALT2);

    $emp_role = explode(",", $role);

    $sql_in = "SELECT pf_num,dar from user_permission where pf_num='$empid'";
    $sql = mysql_query($sql_in, $db_common);
    $row_usr = mysql_fetch_array($sql);

    if (mysql_num_rows($sql) == 0) {
      if (in_array("7", $emp_role)) {
        $ins = "INSERT into user_permission(`pf_num`,`dar`) values('$empid','" . $role . "')";
        $ins_res = mysql_query($ins, $db_common);

        $query = "INSERT INTO `tbl_user`(`emp_id`,`username`,`password`,`role`,`status`,`created_date`,`created_by`) VALUES ('$empid','$empid','$password','$role','1','" . $datee . "','" . $_SESSION['id'] . "')";
        $ins_query = mysql_query($query, $db_edar);
        if ($ins_query) {
          $data = '1';
        }
      } else {
        array_push($emp_role, '7');
        $emp_role = (count($emp_role) > 1) ? implode(",", $emp_role) : $emp_role;

        $ins = "INSERT into user_permission(`pf_num`,`dar`) values('$empid','$emp_role')";
        $ins_res = mysql_query($ins, $db_common);

        $query = "INSERT INTO `tbl_user`(`emp_id`,`username`,`password`,`role`,`status`,`created_date`,`created_by`) VALUES ('$empid','$empid','$password','$emp_role','1','" . $datee . "','" . $_SESSION['id'] . "')";
        $ins_query = mysql_query($query, $db_edar);
        if ($ins_query) {
          $data = '1';
        }
      }
    } else {
      $d = explode(",", $row_usr["dar"]);
      if (empty($row_usr["dar"])) {

        if (in_array("7", $emp_role)) {
          $ins = "UPDATE user_permission set dar='$role' where pf_num='$empid'";
          $ins_res = mysql_query($ins, $db_common);

          $query = "INSERT INTO `tbl_user`(`emp_id`,`username`,`password`,`role`,`status`,`created_date`,`created_by`) VALUES ('$empid','$empid','$password','$role','1','" . $datee . "','" . $_SESSION['id'] . "')";
          $ins_query = mysql_query($query, $db_edar);
          if ($ins_query) {
            $data = '1';
          }
        } else {
          array_push($emp_role, '7');
          $emp_role = (count($emp_role) > 1) ? implode(",", $emp_role) : $emp_role;
          $ins = "UPDATE user_permission set dar='$emp_role' where pf_num='$empid'";
          $ins_res = mysql_query($ins, $db_common);

          $query = "INSERT INTO `tbl_user`(`emp_id`,`username`,`password`,`role`,`status`,`created_date`,`created_by`) VALUES ('$empid','$empid','$password','$emp_role','1','" . $datee . "','" . $_SESSION['id'] . "')";
          $ins_query = mysql_query($query, $db_edar);
          if ($ins_query) {
            $data = '1';
          }
        }
      } elseif (in_array("7", $emp_role) || in_array($role, $d)) {
        $data = '2';
      }
    }


    echo $data;
    break;

  case 'deactiveUser':
    $data = '';
    $id = $_POST['id'];
    $pf = $_POST['pf'];
    $role = $_POST['role'];

    $sql2 = mysql_query("UPDATE user_permission set dar='' where pf_num='" . $pf . "'", $db_common);
    $sql3 = mysql_query("UPDATE tbl_user set role='',pre_role='" . $role . "',status='0' where emp_id='" . $pf . "' and id='" . $id . "'", $db_edar);
    if ($sql3 && $sql2) {
      $data = '1';
    }
    echo $data;
    break;

  case 'activeUser':
    $data = '';
    $id = $_POST['id'];
    $pf = $_POST['pf'];
    $role = $_POST['role'];

    $sql = mysql_query("SELECT pre_role from tbl_user where emp_id='" . $pf . "' and id='" . $id . "'", $db_edar);
    $sql_fetch = mysql_fetch_array($sql);

    $sql2 = mysql_query("UPDATE user_permission set dar='" . $sql_fetch['pre_role'] . "' where pf_num='" . $pf . "'", $db_common);
    $sql3 = mysql_query("UPDATE tbl_user set role='" . $sql_fetch['pre_role'] . "',pre_role='',status='1' where emp_id='" . $pf . "' and id='" . $id . "'", $db_edar);
    if ($sql3 && $sql2) {
      $data = '1';
    }
    echo $data;
    break;

  case 'updateUser':
    $data = '';
    $pf_num = $_POST['pf'];
    $role = $_POST['role'];
    //$usertype='';
    $sql_user_permission = "SELECT pf_num,dar FROM `user_permission` where pf_num='$pf_num'";
    $rst_user_permission = mysql_query($sql_user_permission, $db_common);
    if (mysql_num_rows($rst_user_permission) > 0) {
      $user_permission_roles = array();
      while ($rw_user_permission = mysql_fetch_array($rst_user_permission)) {
        extract($rw_user_permission);
        $user_permission_roles = explode(',', $dar);
        // print_r($user_permission_roles);
        $usertype_array = explode(',', $role);
        // print_r($usertype_array);
        foreach ($usertype_array as $value) {
          if (!in_array($value, $user_permission_roles)) {
            array_push($user_permission_roles, $value);
          }
        }
        $user_permission_final = array_values(array_intersect($usertype_array, $user_permission_roles));
        //array_push($user_permission_final, '7');
      }
      $update_user_permission = implode(',', $user_permission_final);
      $sql_update_permission = "UPDATE `user_permission` SET `dar`='$update_user_permission' WHERE `pf_num`='$pf_num' ";
      if (mysql_query($sql_update_permission, $db_common)) {
        $update_query = mysql_query("update tbl_user set role='$role' where id='" . $_POST['id'] . "'", $db_edar);
        if ($update_query) {
          $data = '1';
        } else {
          $data = '0';
        }
      }
    }

    echo $data;
    break;

  default:
    echo " Invalid option";
    break;
}