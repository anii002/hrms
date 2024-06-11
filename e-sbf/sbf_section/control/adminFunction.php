<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
session_start();
include("../../dbconfig/dbcon.php");
include("function.php");
function get_emp($pf)
	{	
	    dbcon1();

		$sql = "SELECT name, designation, station FROM resgister_user WHERE emp_no = '$pf'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row;
	}

	function get_designation($id)
	{dbcon1();
		$sql = "SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE = '$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['DESIGLONGDESC'];
	}


	function get_station($id)
	{dbcon1();
		$sql = "SELECT stationdesc FROM station WHERE stationcode = '$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['stationdesc'];
	}

?>
