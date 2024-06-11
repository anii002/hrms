<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('../../dbconfig/dbcon.php');

include('adminFunction.php');
switch ($_REQUEST['action']) {

  case 'changeimg':
    if (changeimg($_FILES["profile"]["name"], $_FILES["profile"]["tmp_name"])) {
      echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
    } else {
      echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
    }
    break;

  case 'reply_status':

    $data='';
      $remark = isset($_POST['remark']) ? $_POST['remark'] : "";
    $query_fdak = mysql_query("UPDATE tbl_dak_forward set remark='" . $remark . "',status='2' where id='" . $_POST['uid'] . "' and unique_dak_no='" . $_POST['dak_no'] . "'", $db_edak);

    $query_dak = mysql_query("UPDATE tbl_dak set replied='" . $_POST['status'] . "',status='2',closedby='" . $_SESSION['emp_id'] . "' where unique_dak_no='" . $_POST['dak_no'] . "'", $db_edak);

    if ($query_fdak && $query_dak) {
      $data='1';
      //echo "<script>alert('Submitted successfully');window.location='../pending_dak_list.php';</script>";
    } else {
      $data='0';
      //echo "<script>alert('Failed...');window.location='../pending_dak_list.php';</script>";
    }
    echo $data;
    break;

  case 'default':
    echo "Invalid option";
    break;
}
