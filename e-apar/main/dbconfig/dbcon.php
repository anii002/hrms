<?php
// core
function dbcon(){
    $user = "root";
    $pass = "";
    $host = "localhost";
    $db = "drmpsurh_eapar";
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function dbcon1(){
    $user = "root";
    $pass = "";
    $host = "localhost";
    $db = "drmpsurh_sur_railway";
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function host(){
    $h = "http://" . $_SERVER['HTTP_HOST'] . "/smsdb/";
    return $h;
}

function hRoot(){
    $url = $_SERVER['DOCUMENT_ROOT'] . "/smsdb/";
    return $url;
}

// parse string
function gstr(){
    $qstr = $_SERVER['QUERY_STRING'];
    parse_str($qstr, $dstr);
    return $dstr;
}

define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');

function hashPassword($pPassword, $pSalt1="2345#$%@3e", $pSalt2="taesa%#@2%^#"){
    return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
?>
