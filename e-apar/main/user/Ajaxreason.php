<?php
include('../dbconfig/dbcon.php');
$conn = dbcon();
session_start();


$year = $_POST["txtyear"];
$empcode = $_POST["txtempcode"];
$empid = $_POST["txtempid"];
$session = $_POST["txtsession"];
$reason = $_POST["txtreason"];

if (mysqli_query($conn, "insert into tbl_reason(empid,empcode,reasontype,financialyear,createdby,createddate) 
		values('$empid','$empcode','$reason','$year','$session',NOW())")) {
	mysqli_query($conn, "insert into tbl_audit(message,action,updatePerson,date) values('$empcode Reason Added Successfully','adding','$session',NOW())");
	echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmsample.php';
						</script>";
} else {
	echo mysqli_error($conn);
}
