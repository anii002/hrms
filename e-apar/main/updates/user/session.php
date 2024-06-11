<?php
//Start session
session_start();
	unset($_SESSION['staff']);
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['staff']) ||(trim ($_SESSION['staff']) == '')) {
	header("location:".host()."../../index.php");
    exit();
}
	//session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
$session_id=$_SESSION['staff'];

$user_query = mysql_query("select * from tbl_user where userid = '$session_id'")or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
$username = $user_row['username'];
$firstname = $user_row['firstname'];

?>