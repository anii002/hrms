<?php
session_start();
include("../dbconfig/dbcon.php");
$conn = dbcon();
$value_id = ($_REQUEST["nvalue1"] <> "") ? trim($_REQUEST["nvalue1"]) : "";
$v1_id = ($_REQUEST["v1"] <> "") ? trim($_REQUEST["v1"]) : "";
$id = ($_REQUEST["id"] <> "") ? trim($_REQUEST["id"]) : "";
$sess = $_SESSION['SESS_MEMBER_NAME'];
	
	echo $value_id;
 if(mysqli_query($conn,"update scanned_apr set overallremark='$value_id' , remarkupdatedby='$sess' where year='$id' AND empid='$v1_id' "))
	echo $value_id;
 else
	 echo mysqli_error($conn);
?>