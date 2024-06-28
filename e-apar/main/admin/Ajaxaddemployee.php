<?php
include('../dbconfig/dbcon.php');
$conn= dbcon();
error_reporting(0);

$year = $_POST["cmbyear"];
$empname = $_POST["txtempname"];
$empcode = $_POST["txtempcode"];
$dept = $_POST["cmbdept"];
$designation = $_POST["cmbdesignation"];
$station = $_POST["cmbstation"];
$payscale = $_POST["txtpayscale"];
$interity = $_POST["txtinterity"];
$substantive = $_POST["txtsubstantive"];
$cpcpaylevel = $_POST["txtcpcpaylevel"];
$session = $_POST["txtsession"];
$stsc = $_POST["txtstsc"];
$contact = $_POST["txtcontact"];
$password = $_POST["txtpassword"];



if (mysqli_query($conn,"insert into tbl_employee (year,emplcode,dept,design,station,payscale,integrity,empname,substantive,sevencpcpaylevel,stsc,contact,username,password,createdby,createddate)
						values ('$year','$empcode','$dept','$designation','$station','$payscale','$interity','$empname','$substantive','$cpcpaylevel','$stsc','$contact','$empcode','India@11','$session',NOW())")) {
	mysqli_query($conn,"insert into tbl_audit(message,action,updatePerson,date) values('Employee with id $empcode added successfully','adding','$session',NOW())");
	echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='add_employee.php';
						</script>";
} else {
	echo mysqli_error($conn);
}
