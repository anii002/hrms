<?php
// Uncomment the following line during production to suppress errors
// error_reporting(0);

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

// Define salt constants for password hashing
define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');

// Function to hash password with salts
function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}

// Optionally require('functions.php'); if needed
// require('functions.php');
?>
