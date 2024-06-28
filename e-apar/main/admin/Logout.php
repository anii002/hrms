<?php
include('../dbconfig/dbcon.php');
$conn = dbcon();
include('session.php');

$time = strtotime("now");
$date = date("Y-m-d", $time);
mysqli_query($conn, "update tbl_userlogs set LOG_enddatetime = '$date' where LOG_adminid = '$session_id' ") or die(mysqli_error($conn));

session_destroy();
header('location:../../index.php');
