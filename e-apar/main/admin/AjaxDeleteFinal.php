<?php

include("../dbconfig/dbcon.php");
dbcon();
$groupid = $_GET["grp"];

$sql_query = mysql_query("delete from tbl_finalgroupgrade where groupid=$groupid");
	echo "<script>window.location='frmgroupreport.php?gid=$groupid';</script>";
	echo mysql_error(); 
?>