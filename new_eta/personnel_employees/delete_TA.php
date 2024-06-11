<?php

	include("../dbconfig/dbcon.php");
	session_start();


	// $reference = $_GET['ref_no'];
	// $_SESSION['empid'];

	echo $query1="DELETE FROM `taentrydetails` WHERE `reference_no`='".$_GET['ref_no']."' AND `empid`='".$_SESSION['empid']."' ";

	echo $query2="DELETE FROM `taentryform_master` WHERE `reference`='".$_GET['ref_no']."' AND `empid`='".$_SESSION['empid']."' ";

	echo $query3="DELETE FROM `tasummarydetails` WHERE `reference_no`='".$_GET['ref_no']."' AND `empid`='".$_SESSION['empid']."' ";



	// $sql1=mysql_query($query1);


?>