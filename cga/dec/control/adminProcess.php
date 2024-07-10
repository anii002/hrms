<?php
date_default_timezone_set("Asia/kolkata");
$date = date("d-m-Y h:i:sa");
$date1 = date("d-m-Y");

include('adminFunction.php');
switch ($_REQUEST['action']) {

  case 'forward_application':
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $appl_username = $_POST['username'];
    $fw_to = $_POST['fw_to_pfno'];
    $con = dbcon1();
    $sql = mysqli_query($con, "SELECT unit_id from drmpsurh_cga.login where pf_number='" . $fw_to . "'");
    $value = mysqli_fetch_array($sql);

    $fw_to_unitid = $value['unit_id'];

    $query = "INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `dak_status`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`,`cc_status`,`remark`,`rejected_by`) VALUES('" . $ex_emp_pfno . "','" . $appl_username . "','" . $fw_to_unitid . "','" . $fw_to . "','" . $_SESSION['unitid'] . "','" . $_SESSION['pf_number'] . "','" . $date . "','','1','','','','','','','')";
    $result = mysqli_query($con, $query);

    $qu = "UPDATE `applicant_registration` SET fw_status='1' where ex_emp_pfno='" . $ex_emp_pfno . "' AND username='" . $appl_username . "'";
    $result1 = mysqli_query($con, $qu);

    if ($result && $result1) {
      echo "<script>alert('Forwarded  Successfully');window.location='../wi_forwarded_list.php';</script>";
      //echo "ssss";
    } else {
      echo "<script>alert('Failed to Forward ');window.location='../wi_forwarded_list.php';</script>";
      //echo "ffff";
    }



    break;

  case 'applicant_add':


    $ex_emp_pf = $_POST['empid'];
    $ex_empname = $_POST['empname'];
    $ex_department = $_POST['department'];
    $ex_design = $_POST['design'];
    $appl_name = $_POST['appl_name'];
    $aapl_dob = $_POST['aapl_dob'];
    $appl_mobile = $_POST['appl_mobile'];
    $category = $_POST['category'];
    $appl_gender = $_POST['appl_gender'];

    $con = dbcon2();
    $sqql = mysqli_query($con, "SELECT dob from register_user where emp_no='" . $ex_emp_pf . "'");
    $r_sqql = mysqli_fetch_array($sqql);
    $daata = explode("/", $r_sqql['dob']);
    $password = $daata[0] . $daata[1] . $daata[2];

    $con = dbcon1();
    $sql1 = ("INSERT INTO `applicant_registration`(`ex_emp_pfno`, `ex_empname`, `ex_empdept`, `ex_empdesig`, `applicant_name`, `applicant_dob`, `applicant_mobno`, `applicant_emailid`, `applicant_panno`, `applicant_aadharno`, `username`, `psw`, `applicant_gender`, `applicant_qualifiaction`, `mariatial_status`,`permanent_address`,`identification_mark1`,`identification_mark2`, `category`, `caste`, `eligible_category`, `status`, `fw_status`, `created_at`,`relation_with`,`added_by`,`remark`,`status_add_data`,`ss_status`) VALUES('" . $ex_emp_pf . "','" . $ex_empname . "','" . $ex_department . "','" . $ex_design . "','" . $appl_name . "','" . $aapl_dob . "','" . $appl_mobile . "','','','','" . $_POST['username'] . "','" . hashPassword($password, SALT1, SALT2) . "','" . $appl_gender . "','','','','','','" . $category . "','','','0','0','" . $date . "','','" . $_SESSION['unitid'] . "','','','')");
    $result3 = mysqli_query($con, $sql1);

    $con = dbcon2();
    $ins_user_p = mysqli_query($con, "SELECT pf_num from user_permission where pf_num='" . $ex_emp_pf . "'");
    $check = mysqli_num_rows($ins_user_p);
    if ($check == 0) {
      $inset = ("INSERT INTO `user_permission`(`pf_num`,`cga`) VALUES('" . $ex_emp_pf . "','0')");
      $s = mysqli_query($con, $inset);
    } else {
      $update = mysqli_query($con, "UPDATE user_permission set cga='0' where pf_num='" . $ex_emp_pf . "' ");
    }

    if ($result3) {
      echo "<script>alert('Applicant Registerd Successfully');window.location='../registration.php';</script>";
      //echo "ssss";
    } else {
      echo "<script>alert('Failed to register ');window.location='../registration.php';</script>";
      //echo "ffff";
    }

    break;
  case 'update_applicant':
    $con = dbcon1();
    $sql = mysqli_query($con, "UPDATE `applicant_registration` SET `applicant_name`='" . $_POST['appl_name'] . "',`applicant_dob`='" . $_POST['aapl_dob'] . "',`applicant_mobno`='" . $_POST['appl_mobile'] . "',`applicant_gender`='" . $_POST['appl_gender'] . "',`category`='" . $_POST['category'] . "' where ex_emp_pfno='" . $_POST['p_emp_pfno'] . "' and username='" . $_POST['p_username'] . "'");


    if ($sql) {

      echo "<script>alert('Applicantion Updated Successfully');window.location='../registration.php';</script>";
    } else {
      echo "<script>alert('Failed...');window.location='../registration.php';</script>";
    }



    break;


  case 'fetch_employee_details':

    $id = $_POST['id'];
    $data = [];
    $data = get_employee_details($id);
    echo json_encode($data);
    break;

  case 'changeimg':
    if (changeimg($_FILES["profile"]["name"], $_FILES["profile"]["tmp_name"])) {
      echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
    } else {
      echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
    }
    break;
  case 'updateUser':
    $fname = $_REQUEST['fname'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $design = $_REQUEST['design'];
    if (updateUser($fname, $email, $mobile, $design))
      echo "<script>alert('User details updated successfully');window.location='../profile.php';</script>";
    else
      echo "<script>alert('User details not updated');window.location='../profile.php';</script>";
    break;
  case 'changePass':
    $pass = $_REQUEST['pass'];
    $confirm = $_REQUEST['confirm'];
    if ($pass == $confirm) {
      if (changePass($pass, $confirm))
        echo "<script>alert('User Password changed successfully');window.location='../profile.php';</script>";
      else
        echo "<script>alert('User Password not changed');window.location='../profile.php';</script>";
    } else {
      echo "<script>alert('Confirm password must match with password');window.location='../profile.php';</script>";
    }
    break;


  case 'removeApplicant':
    $con = dbcon1();
    $sql = "DELETE from drmpsurh_cga.applicant_registration where id='" . $_POST['id'] . "' and ex_emp_pfno='" . $_POST['pf'] . "' ";
    $result = mysqli_query($con, $sql);
    if ($result) {
      $data = 1;
    } else {
      $data = 0;
    }
    echo $data;
    break;


  case 'activeApplicant':
    $active = '1';
    $pfno = $_REQUEST['id'];
    if (activeUser($pfno, $active))
      echo "Applicant Activated successfully";
    else
      echo "Something went wrong";
    break;
  case 'deactiveApplicant':
    $active = '0';
    $pfno = $_REQUEST['id'];
    if (deactiveUser($pfno, $active))
      echo "Applicant Deactivated successfully";
    else
      echo "Something went wrong";
    break;

  default:
    echo "Invalid option";
    break;
}
