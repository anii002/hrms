<?php

//core
function dbcon()
{
	$user = "root";
	$pass = "";
	$host = "localhost";
	$db = "egr";
	@mysql_connect($host, $user, $pass);
	mysql_select_db($db);
}

define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');
function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}