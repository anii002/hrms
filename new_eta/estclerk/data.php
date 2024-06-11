<?php

	include('../dbconfig/dbcon.php');

	function getdept($id)
	{
		$sql=mysql_query("SELECT `DEPTNO` FROM `department` WHERE DEPTDESC='".$id."' ");
		while($row = mysql_fetch_array($sql)) 
		{
			return $row['DEPTNO'];
		}
	}
	function getdesig($id)
	{
		$sql=mysql_query("SELECT `DESIGCODE` FROM `designations` WHERE `DESIGLONGDESC`='".$id."' ");
		while($row = mysql_fetch_array($sql)) 
		{
			return $row['DESIGCODE'];
		}
	}

	$sql1=mysql_query("SELECT `dept`,`desig` FROM `employees`");
	while($row = mysql_fetch_array($sql1)) 
	{
		$deptno=getdept($row['dept']);
		$designo=getdesig($row['desig']);
		$sql=mysql_query("UPDATE `employees` SET `dept`='".$deptno."',`desig`='".$designo."' ");
	}


?>