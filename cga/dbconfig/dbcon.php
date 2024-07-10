<?php
// Database connection settings
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE_CGA', 'drmpsurh_cga');
define('DB_DATABASE_SUR_RAILWAY', 'drmpsurh_sur_railway');

// Function to establish a connection to the CGA database
function dbcon1() {
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE_CGA);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    return $con;
}

// Function to establish a connection to the SUR Railway database
function dbcon2() {
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE_SUR_RAILWAY);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    return $con;
}

// Password hashing constants
define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');

// Function to hash passwords
function hashPassword($pPassword, $pSalt1=SALT1, $pSalt2=SALT2) {
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}

// Set the timezone
date_default_timezone_set('Asia/Kolkata');
?>
