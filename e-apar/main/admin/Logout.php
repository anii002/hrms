<?php
	include('../dbconfig/dbcon.php');
	dbcon(); 
	


	include('session.php');

	$time = strtotime("now");
	$date = date("Y-m-d",$time);										
	mysql_query("update tbl_userlogs set LOG_enddatetime = '$date' where LOG_adminid = '$session_id' ")or die(mysql_error());
	
	session_destroy();
	header('location:../../index.php');
	 
?>