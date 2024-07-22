<?php

require_once 'common/db.php';
//dbcon('esoluhp6_sur_hrms');
$id = $_REQUEST['id'];
$conn = dbcon();
$sql = "UPDATE register_user SET delete_status = 1  WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
//echo  mysqli_error();
if ($result) {
	echo "<script>alert('Employee Deleted Successfully')</script>";
	echo "<script>window.location.href = 'display-emp.php'</script>";
}
