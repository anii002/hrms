<?php
include("../dbconfig/dbcon.php");
$conn = dbcon();

$groupid = $_GET['id'];

$sql_query = mysqli_query($conn,"delete from group_master where group_id='$groupid'");
$sql_delete = mysqli_query($conn,"delete from group_details where group_id='$groupid'");

if ($sql_query && $sql_delete)
	echo "<script>alert('Group deleted successfully'); window.location='show_group.php';</script>";
else
	echo "<script>alert('Group deletion unsuccessfully'); window.location='show_group.php';</script>";
