<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function changeimg($name,$tmp_name)
{
	$upload_dir = "../profile/".$_SESSION['empid'].".jpg";
	$dir = "profile/".$_SESSION['empid'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysql_query("update users set img='$dir' where empid='".$_SESSION['empid']."'");
        return true;
    } else {
        return false;
    }
}

function changePass($pass,$confirm)
{
  global $con;
  $query = "update users set password='".hashPassword($pass,SALT1,SALT2)."' where empid='".$_SESSION['empid']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
