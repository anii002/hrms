<?php
//session_start();
include('../dbconfig/dbcon.php');
$conn = dbcon();
$design = $_POST['txtstation'];

if (mysqli_query($conn,"insert into tbl_station(station_name) values ('$design')")) {
	mysqli_query($conn,"insert into tbl_audit(message,action,updatePerson,date) values('Station Added Successfully with Station Name $design','adding','Super Admin',NOW())");
	echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmaddstation.php';
						</script>";
} else {
	echo mysqli_error($conn);
}
