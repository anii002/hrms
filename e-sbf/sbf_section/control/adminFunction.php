<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
session_start();
include("../../dbconfig/dbcon.php");
include("function.php");
function get_emp($pf)
	{	
	    $conn=dbcon1();

		$sql = "SELECT name, designation, station FROM register_user WHERE emp_no = '$pf'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function get_designation($id)
	{
		$conn=dbcon1();
		$sql = "SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row['DESIGLONGDESC'];
	}


	function get_station($id)
	{
		$conn=dbcon1();
		$sql = "SELECT stationdesc FROM station WHERE stationcode = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row['stationdesc'];
	}

?>
