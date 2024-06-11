<?php
// $con = @mysql_connect("localhost","drmpsurh_test","root@123");
// mysql_select_db("drmpsurh_travel_allowance");
// define('SALT1', '24859f@#$#@$');
// define('SALT2', '^&@#_-=+Afda$#%');
// function hashPassword($pPassword, $pSalt1="2345#$%@3e", $pSalt2="taesa%#@2%^#")
// {
// 	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
// }
// date_default_timezone_set('Asia/Kolkata');

function dbcon1()
{
	$con = @mysql_connect("localhost","drmpsurh_test","root@123");
	mysql_select_db("drmpsurh_cga");

}

function dbcon2()
{
	$con = @mysql_connect("localhost","drmpsurh_test","root@123");
	mysql_select_db("drmpsurh_sur_railway");

}

define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');
function hashPassword($pPassword, $pSalt1="24859f@#$#@$", $pSalt2="^&@#_-=+Afda$#%")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
date_default_timezone_set('Asia/Kolkata');



?>
