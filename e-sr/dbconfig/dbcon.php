<?php
error_reporting(0);

// Function for the first database connection using MySQLi
function dbcon()
{
	$user = "root";
	$pass = "";
	$host = "localhost";
	$db = "drmpsurh_srnew";

	// Create connection
	$conn = new mysqli($host, $user, $pass, $db);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

// Conditional function declaration for dbcon1()

function dbcon1()
{
	$user1 = "root";
	$pass1 = "";
	$host1 = "localhost";
	$db1 = "drmpsurh_sr";

	// Create connection
	$conn = new mysqli($host1, $user1, $pass1, $db1);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

global $conn;
// Conditional function declaration for hashPassword()
if (!function_exists('hashPassword')) {
	// Function to hash passwords using SHA1 and MD5
	function hashPassword($password, $salt1 = "2345#$%@3e", $salt2 = "taesa%#@2%^#")
	{
		return sha1(md5($salt2 . $password . $salt1));
	}
}
