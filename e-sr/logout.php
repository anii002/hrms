<?php   
session_start(); //to ensure you are using same session
include('dbconfig/dbcon.php');
$action_on=$_SESSION['set_update_pf'];

session_destroy(); //destroy the session

include('admin/create_log.php');
$action="Logged Out";

create_log($action,$action_on);

header("location:index.php"); //to redirect back to "index.php" after logging out
exit();
?>