<?php
// $con = @mysql_connect("localhost","root","");
// mysql_select_db("drmpsurh_travel_allowance1");


function dbcon()
{
	$user  ="drmpsurh_test";
	$pass  ="root@123";
	$host  = "localhost";
	$db    = "drmpsurh_sur_railway";
	@mysql_connect($host,$user,$pass);
	mysql_select_db($db); 
}
function dbcon2()
{
	$user  ="drmpsurh_test";
	$pass  ="root@123";
	$host  = "localhost";
	$db    = "drmpsurh_feedback";
	@mysql_connect($host,$user,$pass);
	mysql_select_db($db); 
}
define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');
// define('SALT1', '24859f@#$#@$');
// define('SALT2', '^&@#_-=+Afda$#%');
function hashPassword($pPassword, $pSalt1="2345#$%@3e", $pSalt2="taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
date_default_timezone_set('Asia/Kolkata');

?>
