<?php

	include('../dbconfig/dbcon.php');

	function getdept($id)
	{
		global $conn;
		$sql=mysqli_query($conn,"SELECT `DEPTNO` FROM `department` WHERE DEPTDESC='".$id."' ");
		while($row = mysqli_fetch_array($sql)) 
		{
			return $row['DEPTNO'];
		}
	}
	function getdesig($id)
	{
		global $conn;
		$sql=mysqli_query($conn,"SELECT `DESIGCODE` FROM `designations` WHERE `DESIGLONGDESC`='".$id."' ");
		while($row = mysqli_fetch_array($sql)) 
		{
			return $row['DESIGCODE'];
		}
	}

	$sql1=mysqli_query($conn,"SELECT `dept`,`desig` FROM `employees`");
	while($row = mysqli_fetch_array($sql1)) 
	{
		global $conn;
		$deptno=getdept($row['dept']);
		$designo=getdesig($row['desig']);
		$sql=mysqli_query($conn,"UPDATE `employees` SET `dept`='".$deptno."',`desig`='".$designo."' ");
	}


?>