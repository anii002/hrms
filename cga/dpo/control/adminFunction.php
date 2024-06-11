<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function changeimg($name,$tmp_name)
{
  dbcon1();
	$upload_dir = "../profile/".$_SESSION['pf_number'].".jpg";
	$dir = "profile/".$_SESSION['pf_number'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysql_query("UPDATE login set img='$dir' where pf_number='".$_SESSION['pf_number']."'");
        return true;
    } else {
        return false;
    }
}
function changePass($pass,$confirm)
{
 dbcon1();
  $query = "UPDATE login set password='".hashPassword($pass,SALT1,SALT2)."' where pf_number='".$_SESSION['pf_number']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}

