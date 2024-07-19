<?php
date_default_timezone_set('Asia/Kolkata');
$db_edar_name = "drmpsurh_e_dar";
$db_common_name = "drmpsurh_sur_railway";

function dbcon($db_name) {
    $connection = new mysqli('localhost', 'root', '', $db_name);
    if ($connection->connect_error) {
        trigger_error("Unable to connect to the database: " . $connection->connect_error, E_USER_ERROR);
    }
    return $connection;
}

$db_edar = dbcon($db_edar_name);
$db_common = dbcon($db_common_name);

define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

function hashPassword($pPassword, $pSalt1 = SALT1, $pSalt2 = SALT2)
{
    return hash('sha256', $pSalt2 . $pPassword . $pSalt1);
}
?>
