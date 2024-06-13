<?php
function dbcon2()
{
	$user  ="root";
	$pass  ="";
	$host  = "localhost";
	$db    = "drmpsurh_sur_railway";
	@mysqli_connect($host,$user,$pass);
	mysqli_select_db($db); 
}

function dbcon1()
{
	$user1  ="root";
	$pass1  ="";
	$host1 = "localhost";
	$db1 = "drmpsurh_new_eims";
	@mysqli_connect($host1,$user1,$pass1);
	mysqli_select_db($db1); 
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
