<?php
include('lib/dbcon.php');
$conn = dbcon();
session_start();


if (isset($_GET['reg_id']) != '') {
	$regid = $_GET['reg_id'];
	$sqlquery = mysqli_query($conn, "DELETE FROM tbl_registration WHERE reg_id='$regid'");
	if ($sqlquery) {
		echo "<script>
		alert('Your Record Deleted Successfully!!!!!');
		windows.location='registration.php';
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}
