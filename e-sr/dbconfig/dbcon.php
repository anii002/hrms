<?php
session_start();
error_reporting(0);

// Function to connect to the first database
function dbcon()
{
	$user = "root";
	$pass = "";
	$host = "localhost";
	$db = "drmpsurh_srnew";

	$conn = new mysqli($host, $user, $pass, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

// Function to connect to the second database
function dbcon1()
{
	$user1 = "root";
	$pass1 = "";
	$host1 = "localhost";
	$db1 = "drmpsurh_sr";

	$conn1 = new mysqli($host1, $user1, $pass1, $db1);
	if ($conn1->connect_error) {
		die("Connection failed: " . $conn1->connect_error);
	}

	return $conn1;
}

// Define salts
define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');

// Hashing function
function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}