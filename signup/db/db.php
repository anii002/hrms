<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "drmpsurh_sur_railway";

	$conn = mysqli_connect($servername, $username, $password);

	mysqli_select_db($conn,$database);

	define('SALT1', '2345#$%@3e');
	define('SALT2', 'taesa%#@2%^#');
// define('SALT1', '24859f@#$#@$');
// define('SALT2', '^&@#_-=+Afda$#%');
	function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
	{
	    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
	}


?>