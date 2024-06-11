<?php
$con = @mysql_connect("localhost","drmpsurh_test","root@123");
mysql_select_db("drmpsurh_travel_allowance1");

define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');
// define('SALT1', '24859f@#$#@$');
// define('SALT2', '^&@#_-=+Afda$#%');
function hashPassword($pPassword, $pSalt1="2345#$%@3e", $pSalt2="taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
date_default_timezone_set('Asia/Kolkata');

function db_connect($db_name)
{
	$con = @mysql_connect("localhost","drmpsurh_test","root@123");
	mysql_select_db($db_name);
}

function user_activity($empid,$file_name,$action,$message)
{
	$date1=date("Y-m-d h:i:s");
	$ip_address=$_SERVER['REMOTE_ADDR'];
	$user_activity_query = mysql_query("insert into audit_table(empid,ip_address,file_name,action,message,created_at) values ('".$empid."' ,'".$ip_address."' ,'".mysql_real_escape_string($file_name)."','".$action."' ,'".mysql_real_escape_string($message)."','".$date1."'  )");
	echo mysql_error();
}

?>
