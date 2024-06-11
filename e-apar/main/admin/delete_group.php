<?php
	include("../dbconfig/dbcon.php");
	dbcon();
	
	$groupid = $_GET['id'];
	
	$sql_query=mysql_query("delete from group_master where group_id='$groupid'");
	$sql_delete = mysql_query("delete from group_details where group_id='$groupid'");
	
	if($sql_query && $sql_delete)
		echo "<script>alert('Group deleted successfully'); window.location='show_group.php';</script>";
	else
		echo "<script>alert('Group deletion unsuccessfully'); window.location='show_group.php';</script>";
?>