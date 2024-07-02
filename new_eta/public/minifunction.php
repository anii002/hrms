<?php
date_default_timezone_set("Asia/kolkata");
include("../dbconfig/dbcon.php");
if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'user_register':

      $txtpfno = $_POST['txtpfno'];
      $txtuser = $_POST['txtuser'];
      $txtdepartment = $_POST['txtdepartment'];
      $txtdesignation = $_POST['txtdesignation'];
      $txtworkstation = $_POST['txtworkstation'];
      $txtmobile = $_POST['txtmobile'];
      $txtbasicpay = $_POST['txtbasicpay'];
      $txtworkdepot = $_POST['txtworkdepot'];
      $txtlevel = $_POST['txtlevel'];
      $txtdob = $_POST['txtdob'];
      $dob_date = date('Y-m-d', strtotime($txtdob));
      $txtappointment = $_POST['txtappointment'];
      // 			$app_date=date('Y-m-d', strtotime($txtappointment));
      // $txtappointment=$_POST['txtappointment'];
      $psw = explode('/', $txtdob);
      //print_r($psw);
      $pass = $psw[0] . $psw[1] . $psw[2];
      // 			echo "INSERT INTO `employees`(`BU`, `pfno`, `panno`, `name`, `desig`, `station`, `mobile`, `email`, `catg`, `dept`,`depot_id`, `grade`, `bp`, `gp`, `bdate`, `apdate`, `level`, `adpass`, `psw`, `status`, `unit`, `first_login`, `img`, `added_by`) VALUES ('','".$txtpfno."','','".$txtuser."','".$txtdesignation."','".$txtworkstation."','".$txtmobile."','','','".$txtdepartment."','".$txtworkdepot."','','".$txtbasicpay."','','".$txtdob."','".$txtappointment."','".$txtlevel."','','".hashPassword($pass,SALT1,SALT2)."','0','','0','','')";
      $sql = mysqli_query($conn,"INSERT INTO `employees`(`BU`, `pfno`, `panno`, `name`, `desig`, `station`, `mobile`, `email`, `catg`, `dept`,`depot_id`, `grade`, `bp`, `gp`, `bdate`, `apdate`, `level`, `adpass`, `psw`, `status`, `unit`, `first_login`, `img`, `added_by`) VALUES ('','" . $txtpfno . "','','" . $txtuser . "','" . $txtdesignation . "','" . $txtworkstation . "','" . $txtmobile . "','','','" . $txtdepartment . "','" . $txtworkdepot . "','','" . $txtbasicpay . "','','" . $txtdob . "','" . $txtappointment . "','" . $txtlevel . "','','" . hashPassword($pass, SALT1, SALT2) . "','0','','0','','')");

      if ($sql) {
        echo "<script> alert('Register Successfully'); window.location='../index.php'; </script>";
      } else {
        echo "<script> alert('Failed to register');  window.location='../user_register.php'; </script>";
      }
      break;
  }
}



if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'getDepot':
      $id = $_POST['id'];
      $data = '';
      $query = mysqli_query($conn,"SELECT `id`,`depot` FROM `depot_master` WHERE depot_master.dept_id='$id' AND depot_master.status='1'");
      $data = "<select class='form-control select2' id='txtworkdepot' name='txtworkdepot' autofocus='true' required>";
      $data .= "<option value='0' selected>डिपो का चयन करें / Select Working Depot</option>";

      while ($res = mysqli_fetch_array($query)) {
        $data .= "<option value='" . $res['id'] . "'>" . $res['depot'] . "</option>";
      }
      echo $data;
      break;

    case 'getDepot_data':
      $id = $_POST['id'];
      $data = '';
      //   echo "SELECT `id`,`depot` FROM `depot_master` WHERE depot_master.dept_id='$id' AND depot_master.status='1'";
      $query = mysqli_query($conn,"SELECT `id`,`depot` FROM `depot_master` WHERE depot_master.dept_id='$id' AND depot_master.status='1'");
      $data = "<select class='form-control select2' id='txtworkdepot' name='txtworkdepot' autofocus='true' required>";
      $data .= "<option value='0' selected>डिपो का चयन करें / Select Working Depot</option>";

      while ($res = mysqli_fetch_array($query)) {
        $data .= "<option value='" . $res['id'] . "'>" . $res['depot'] . "</option>";
      }
      echo $data;
      break;
  }
}
