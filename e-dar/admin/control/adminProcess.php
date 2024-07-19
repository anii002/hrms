<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include_once('adminFunction.php');
switch ($_REQUEST['action']) {
  case 'add_masterForm':
    $data = '';

    $form_name = mysqli_real_escape_string($db_edar,$_POST['form_name']);
    $form_title = (mysqli_real_escape_string($db_edar,$_POST['form_title']));
    $penality_type = $_POST['penality_type'];
    $ins_date = date('Y-m-d h:i:s');
    $ins_frm = mysqli_query($db_edar,"INSERT into tbl_master_form (form_name,form_title,form_type,created_at,created_by,status) values('" . $form_name . "','" . $form_title . "','" . $penality_type . "','" . $ins_date . "','" . $_SESSION['id'] . "','1')");
    if ($ins_frm) {
      $data = '1';
    } else {
      $data = '0';
    }
    echo $data;
    break;

  case 'updateMasterForm':
    $update_frm = mysqli_query($db_edar,"UPDATE tbl_master_form set form_name='" . $_POST['u_form_name'] . "',form_title='" . $_POST['u_form_title'] . "',form_type='" . $_POST['u_penality_type'] . "' where id='" . $_POST['frm_id'] . "' ");
    if ($update_frm) {
      echo "<script>alert('Updated Successfully');window.location='../master_forms.php';</script>";
    } else {
      echo "<script>alert('Failed to update!!!');window.location='../master_forms.php';</script>";
    }
    break;


  case 'removeMasterForm':

    $sql = "DELETE from tbl_master_form where id='" . $_POST['id'] . "' ";
    $result = mysqli_query($db_edar,$sql);
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
    $ins_frm = mysqli_query($db_edar,"INSERT into tbl_penality_type (penality_name,created_at,created_by,status) values('" . $penality_type . "','" . $ins_date . "','" . $_SESSION['id'] . "','1')");
    if ($ins_frm) {
      $data = '1';
    } else {
      $data = '0';
    }
    echo $data;
    break;


  case 'updatePType':
    $update_ptype = mysqli_query($db_edar,"UPDATE tbl_penality_type set penality_name='" . $_POST['u_p_name'] . "' where id='" . $_POST['frm_id'] . "' ");
    if ($update_ptype) {
      echo "<script>alert('Updated Successfully');window.location='../master_penalty_type.php';</script>";
    } else {
      echo "<script>alert('Failed to update!!!');window.location='../master_penalty_type.php';</script>";
    }
    break;

  case 'removePType':
    $sql = "DELETE from tbl_penality_type where id='" . $_POST['id'] . "' ";
    $result = mysqli_query($db_edar,$sql);
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
    //$datee = date("Y-m-d h:i:s");
    $password = hashPassword($psw, SALT1, SALT2);

    if(add_user($empid,$role,$password)==true)
    {
      $data='1';
    }

   


    echo $data;
    break;

  case 'deactiveUser':
    $data = '';
    $id = $_POST['id'];
    $pf = $_POST['pf'];
    $role = $_POST['role'];

    $sql2 = mysqli_query($db_common,"UPDATE user_permission set dar='7' where pf_num='" . $pf . "'");
    $sql3 = mysqli_query($db_edar,"UPDATE tbl_user set role='',pre_role='" . $role . "',status='0' where emp_id='" . $pf . "' and id='" . $id . "'");
    if ($sql3 && $sql2) {
      $data = '1';
    }
    echo $data;
    break;

  case 'activeUser':
    $data = '';
    $id = $_POST['id'];
    $pf = $_POST['pf'];
   //echo  $role = $_POST['role'];

     $sql = mysqli_query($db_edar,"SELECT pre_role from tbl_user where emp_id='" . $pf . "' and id='" . $id . "'");
     $sql_fetch = mysqli_fetch_array($sql);

     $sql_user_permission = "SELECT pf_num,dar FROM `user_permission` where pf_num='".$pf."'";
     $rst_user_permission = mysqli_query($db_common,$sql_user_permission);
  
     $user_permission_roles = array();
     $role_final = array();
     $rw_user_permission = mysqli_fetch_array($rst_user_permission);
    
       $user_permission_roles = explode(',', $rw_user_permission['dar']);
      $role_final = explode(',', $sql_fetch['pre_role']);

        
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
    

     $update_user_permission = implode(',', $user_permission_roles);
     $role = implode(",", $role_final);
     $sql_update_permission = mysqli_query($db_common,"UPDATE `user_permission` SET `dar`='$update_user_permission' WHERE `pf_num`='".$pf."' ");



     $sql3 = mysqli_query($db_edar,"UPDATE tbl_user set role='" . $role . "',pre_role='',status='1' where emp_id='" . $pf . "' and id='" . $id . "'");
    if ($sql3 && $sql_update_permission) {
      $data = '1';
    }
    echo $data;
    break;

  case 'updateUser':
    $data = '';
    $pf_num = $_POST['pf'];
    $role = $_POST['role'];
    if(update_user($pf_num,$role)==true)
    {
      $data='1';
    }
   
    echo $data;
    break;

  default:
    echo " Invalid option";
    break;
}