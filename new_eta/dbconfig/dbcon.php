<?php
$conn = mysqli_connect("localhost", "root", "", "drmpsurh_travel_allowance1");

define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}

date_default_timezone_set('Asia/Kolkata');

function db_connect($db_name)
{
	global $conn;
	$conn = mysqli_connect("localhost", "root", "", $db_name);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
}

function user_activity($empid, $file_name, $action, $message)
{
	global $conn;
	$date1 = date("Y-m-d h:i:s");
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$file_name = mysqli_real_escape_string($conn, $file_name);
	$message = mysqli_real_escape_string($conn, $message);

	$query = "INSERT INTO audit_table (empid, ip_address, file_name, action, message, created_at) 
              VALUES ('$empid', '$ip_address', '$file_name', '$action', '$message', '$date1')";

	if (mysqli_query($conn, $query)) {
		echo "Record inserted successfully";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
}
