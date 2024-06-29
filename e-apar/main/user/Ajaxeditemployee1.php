<?php
include('../dbconfig/dbcon.php');
$conn = dbcon();
$year = $_POST["cmbyear"];
$empid = $_POST["txtempid"];
$empname = $_POST["txtempname"];
$empcode = $_POST["txtempcode"];
$dept = $_POST["cmbdept"];
$designation = $_POST["cmbdesignation"];
$station = $_POST["cmbstation"];
$payscale = $_POST["txtpayscale"];
$interity = $_POST["txtinterity"];
$substantive = $_POST["txtsubstantive"];
$stsc = $_POST["txtstsc"];
$session = $_POST["txtsession"];

//mkdir("../resources/".$empcode."_".$year);
if (isset($_FILES['txtfileappr']['tmp_name'])) {
	$file = addslashes(file_get_contents($_FILES['txtfileappr']['tmp_name']));
	$file = addslashes($_FILES['txtfileappr']['name']);
	$file = getimagesize($_FILES['txtfileappr']['tmp_name']);

	move_uploaded_file($_FILES["txtfileappr"]["tmp_name"], "../resources/NAME_PFNO/" . $_FILES["txtfileappr"]["name"]);
	$file = "/" . $_FILES["txtfileappr"]["name"];
} else {
	$file = "";
}


if (mysqli_query($conn,"update tbl_employee set year='$year',dept='$dept',design='$designation',station='$station',
			payscale='$payscale',integrity='$interity',empname='$empname',substantive='$substantive',stsc='$stsc',modifiedby='$session',modifieddate=NOW() where empid='$empid'") && mysqli_query($conn,"insert into scanned_apr(year,empid,image,createddate) values('$year','$empcode','$file',NOW())")) {
	// echo "<script>
	// alert('Record Updated Successfully!!!!');
	// window.location='frmsample.php';
	// </script>";
} else {
	echo mysqli_error($conn);
}
