<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function changeimg($name,$tmp_name)
{
    $con=dbcon1();
	$upload_dir = "../profile/".$_SESSION['empid'].".jpg";
	$dir = "profile/".$_SESSION['empid'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysqlii_query($con,"update users set img='$dir' where empid='".$_SESSION['empid']."'");
        return true;
    } else {
        return false;
    }
}


