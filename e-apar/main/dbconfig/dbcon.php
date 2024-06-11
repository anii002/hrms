<?php

 //core
function dbcon(){
	$user = "drmpsurh_test";
	$pass = "root@123";
	$host = "localhost";
	$db = "drmpsurh_eapar";
	mysql_connect($host,$user,$pass);
	mysql_select_db($db);
}

function dbcon1(){
	$user = "drmpsurh_test";
	$pass = "root@123";
	$host = "localhost";
	$db = "drmpsurh_sur_railway";
	mysql_connect($host,$user,$pass);
	mysql_select_db($db);
}

function host(){
	$h = "http://".$_SERVER['HTTP_HOST']."/smsdb/";
	return $h;
}

function hRoot(){
	$url = $_SERVER['DOCUMENT_ROOT']."/smsdb/";
	return $url;
}

//parse string
function gstr(){
    $qstr = $_SERVER['QUERY_STRING'];
    parse_str($qstr,$dstr);
    return $dstr;
}

define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');


function hashPassword($pPassword, $pSalt1="2345#$%@3e", $pSalt2="taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
?>
