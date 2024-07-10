<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function get_employee_details($id)
{

  $con = dbcon1();
  $qu = mysqli_query($con, "SELECT ex_emp_pfno from drmpsurh_cga.applicant_registration where ex_emp_pfno='$id'");
  $res = mysqli_num_rows($qu);
  if ($res > 0) {
    return 1;
  } else {
    $con = dbcon2();
    $data = [];
    $sql = mysqli_query($con, "SELECT * from drmpsurh_sur_railway.register_user where emp_no='$id'");
    $res = mysqli_fetch_array($sql);
    $data['pf_number'] = $res['emp_no'];
    $data['emp_name'] = $res['name'];
    $data['designation'] = designation($res['designation']);
    $data['department'] = getdepartment($res['department']);
  }

  return $data;
}

function changeimg($name, $tmp_name)
{
  $con = dbcon1();
  $upload_dir = "../profile/" . $_SESSION['pf_number'] . ".jpg";
  $dir = "profile/" . $_SESSION['pf_number'] . ".jpg";
  if (move_uploaded_file($tmp_name, $upload_dir)) {
    $query = mysqli_query($con, "UPDATE drmpsurh_cga.login set img='$dir' where pf_number='" . $_SESSION['pf_number'] . "'");
    return true;
  } else {
    return false;
  }
}

function changePass($pass, $confirm)
{
  $con = dbcon1();
  $query = "UPDATE drmpsurh_cga.login set password='" . hashPassword($pass, SALT1, SALT2) . "' where pf_number='" . $_SESSION['pf_number'] . "'";
  $result = mysqli_query($con, $query);
  if ($result)
    return true;
  else
    return false;
}

/*function addEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address)
{
  global $con;
  $query = "INSERT INTO `employees`( `empid`, `empname`, `billunit`, `mobile`, `email`, `username`, `password`, `gradepay`, `department`, `designation`, `station`, `address`) VALUES ( '$empid', '$fullname', '$billunit', '$mobile', '$email','$empid' , '$empid', '$gradepay', '$dept', '$design', '$station', '$address')";
  $result = mysqli_query($query) or die(mysqlii_error($con));
  if($result)
    return true;
  else
    return false;
}*/



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
