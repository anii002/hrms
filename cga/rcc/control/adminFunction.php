<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function changeimg($name, $tmp_name)
{
  $con = dbcon1();
  $upload_dir = "../profile/" . $_SESSION['pf_number'] . ".jpg";
  $dir = "profile/" . $_SESSION['pf_number'] . ".jpg";
  if (move_uploaded_file($tmp_name, $upload_dir)) {
    $query = mysqli_query($con, "UPDATE login set img='$dir' where pf_number='" . $_SESSION['pf_number'] . "'");
    return true;
  } else {
    return false;
  }
}
function updateUser($fname, $email, $mobile, $design)
{
  global $con;
  $query = "update users set fname='$fname', designation='$design', mobile='$mobile', email='$email' where id='" . $_SESSION['admin_id'] . "'";
  $result = mysqli_query($con, $query);
  if ($result)
    return true;
  else
    return false;
}
function changePass($pass, $confirm)
{
  global $con;
  $query = "UPDATE login set password='" . hashPassword($pass, SALT1, SALT2) . "' where pf_number='" . $_SESSION['pf_number'] . "'";
  $result = mysqli_query($con, $query);
  if ($result)
    return true;
  else
    return false;
}

function activeUser($pfno, $active)
{
  $con = dbcon1();
  $query = "UPDATE drmpsurh_cga.applicant_registration set status='$active' where ex_emp_pfno='$pfno'";
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
  if ($result)
    return true;
  else
    return false;
}
function deactiveUser($pfno, $active)
{
  $con = dbcon1();
  $query = "UPDATE drmpsurh_cga.applicant_registration set status='$active' where ex_emp_pfno='$pfno'";
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
  if ($result)
    return true;
  else
    return false;
}
