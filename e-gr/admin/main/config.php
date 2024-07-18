<?php
// error_reporting(0); // Uncomment during production
date_default_timezone_set('Asia/Kolkata');

// Database connection details
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_egr_name = "drmpsurh_e_gr";
$db_common_name = "drmpsurh_sur_railway";

// Connecting to the e_gr database using mysqli
$db_egr = mysqli_connect($db_host, $db_user, $db_pass, $db_egr_name);
if (!$db_egr) {
    die("Unable to connect to the e_gr database: " . mysqli_connect_error());
}

// Connecting to the sur_railway database using mysqli
$db_common = mysqli_connect($db_host, $db_user, $db_pass, $db_common_name);
if (!$db_common) {
    die("Unable to connect to the sur_railway database: " . mysqli_connect_error());
}

// Define salt constants for password hashing if not already defined
if (!defined('SALT1')) {
    define('SALT1', '24859f@#$#@$');
}

if (!defined('SALT2')) {
    define('SALT2', '^&@#_-=+Afda$#%');
}

// Check if the hashPassword function already exists before declaring it
if (!function_exists('hashPassword')) {
    function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
    {
        return sha1(md5($pSalt2 . $pPassword . $pSalt1));
    }
}

// Require_once for functions.php if needed
// require_once('functions.php');
