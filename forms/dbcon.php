<?php
function dbcon2()
{
    $user  = "root";
    $pass  = "";
    $host  = "localhost";
    $db    = "drmpsurh_sur_railway";

    $con = new mysqli($host, $user, $pass, $db);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    return $con;
}

function dbcon1()
{
    $user1  = "root";
    $pass1  = "";
    $host1 = "localhost";
    $db1 = "drmpsurh_new_eims";

    $con1 = new mysqli($host1, $user1, $pass1, $db1);

    if ($con1->connect_error) {
        die("Connection failed: " . $con1->connect_error);
    }

    return $con1;
}

define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

function hashPassword($pPassword, $pSalt1 = SALT1, $pSalt2 = SALT2)
{
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}

date_default_timezone_set('Asia/Kolkata');
?>
