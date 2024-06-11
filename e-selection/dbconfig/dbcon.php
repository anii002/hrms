<?php

 //core
function dbcon(){
	$user = "esoluhp6_test";
	$pass = "root@123";
	$host = "localhost";
	$db = "esoluhp6_selection";
	mysql_connect($host,$user,$pass);
	//echo "Something";
	mysql_select_db($db);
}


 
?>
