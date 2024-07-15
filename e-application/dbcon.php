<?php
// Uncomment the following line during production to suppress errors
// error_reporting(0);

date_default_timezone_set('Asia/Kolkata');

// Function to connect to the sur_railway database
function dbcon2()
{
    $user = "drmpsurh_test";
    $pass = "root@123";
    $host = "localhost";
    $db = "drmpsurh_sur_railway";
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Function to connect to the eapplication database
function dbcon3()
{
    $user1 = "drmpsurh_test";
    $pass1 = "root@123";
    $host1 = "localhost";
    $db1 = "drmpsurh_eapplication";
    $conn = new mysqli($host1, $user1, $pass1, $db1);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Define salt constants for password hashing
define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

// Function to hash password with salts
function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}

date_default_timezone_set('Asia/Kolkata');
?>
