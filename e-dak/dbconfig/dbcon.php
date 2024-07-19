<?php

date_default_timezone_set('Asia/Kolkata');

$db_edak_name = "drmpsurh_e_dak";
$db_common_name = "drmpsurh_sur_railway";

// Connect to the e-dak database
$db_edak = mysqli_connect('localhost', 'root', '', $db_edak_name);
if (!$db_edak) {
    trigger_error("Unable to connect to the e-dak database: " . mysqli_connect_error());
    exit();
}

// Connect to the common database
$db_common = mysqli_connect('localhost', 'root', '', $db_common_name);
if (!$db_common) {
    trigger_error("Unable to connect to the common database: " . mysqli_connect_error());
    exit();
}

define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

function hashPassword($pPassword, $pSalt1 = SALT1, $pSalt2 = SALT2)
{
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
