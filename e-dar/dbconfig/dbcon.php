<?php
date_default_timezone_set('Asia/Kolkata');
$db_edar_name = "drmpsurh_e_dar";
$db_common_name = "drmpsurh_sur_railway";
$db_edar = mysql_connect('localhost', 'drmpsurh_test', 'root@123', true) or trigger_error("Unable to connect to the database: " . mysql_error());
mysql_select_db($db_edar_name, $db_edar);
$db_common = mysql_connect('localhost', 'drmpsurh_test', 'root@123', true) or trigger_error("Unable to connect to the database: " . mysql_error());
mysql_select_db($db_common_name, $db_common);

define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');

function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}