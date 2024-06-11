<?php

//error_reporting(0);
 $con=mysql_connect('localhost', 'esoluhp6_test', 'root@123') or trigger_error("Unable to connect to the database: " . mysql_error());
 mysql_select_db('esoluhp6_e-pf',$con);
 
$dbHost = 'localhost';
$dbUsername = 'esoluhp6_test';
$dbPassword = 'root@123';
$dbName = 'esoluhp6_e-pf';	

define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');
function hashPassword($pPassword, $pSalt1="2345#$%@3e", $pSalt2="taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
?>