<?php
date_default_timezone_set('Asia/Kolkata');
$db_egr_name = "esoluhp6_e_gr";
$db_common_name = "esoluhp6_sur_railway";
$db_egr = mysql_connect('localhost', 'esoluhp6_test', 'root@123', true) or trigger_error("Unable to connect to the database: " . mysql_error());
mysql_select_db($db_egr_name, $db_egr);
$db_common = mysql_connect('localhost', 'esoluhp6_test', 'root@123', true) or trigger_error("Unable to connect to the database: " . mysql_error());
mysql_select_db($db_common_name, $db_common);
define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');
function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
require_once('functions.php');