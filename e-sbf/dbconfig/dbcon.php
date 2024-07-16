<?php

function dbcon()
{
    $user  = "root";
    $pass  = "";
    $host  = "localhost";
    $db    = "drmpsurh_sbf";
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

function dbcon1()
{
    $user  = "root";
    $pass  = "";
    $host  = "localhost";
    $db    = "drmpsurh_sur_railway";
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

function dbcon2()
{
    $user  = "root";
    $pass  = "";
    $host  = "localhost";
    $db    = "drmpsurh_travel_allowance1";
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

function hashPassword($pPassword, $pSalt1 = SALT1, $pSalt2 = SALT2)
{
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}

date_default_timezone_set('Asia/Kolkata');

?>
