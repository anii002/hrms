<?php
// $con = @mysql_connect("localhost","root","");
// mysql_select_db("esoluhp6_travel_allowance1");

function dbcon2()
{
	$user2  ="esoluhp6_test";
	$pass2  ="root@123";
	$host2 = "localhost";
	$db2 = "esoluhp6_sur_railway";
	@mysql_connect($host2,$user2,$pass2);
	mysql_select_db($db2); 
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