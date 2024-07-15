<?php
function dbcon2()
{
    $user2 = "root";
    $pass2 = "";
    $host2 = "localhost";
    $db2 = "drmpsurh_sur_railway";

    $con = new mysqli($host2, $user2, $pass2, $db2);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    return $con;
}

define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}

// Alternatively, consider using password_hash() and password_verify() for better security
// function hashPassword($pPassword) {
//     return password_hash($pPassword, PASSWORD_DEFAULT);
// }

date_default_timezone_set('Asia/Kolkata');
