<?php
include('dbconfig/dbcon.php');
session_start();
if(isset($_SESSION['username']))
{
$query_audit = "insert into audit_table(empid,action,message) values('".$_SESSION['empid']."','Logout','User logged out successfully')";
}
else
{
$query_audit = "insert into audit_table(empid,action,message) values('".$_SESSION['admin_username']."','Logout','User logged out successfully')";
}
$result_audit = mysql_query($query_audit);
session_destroy();
session_start();
$_SESSION['session']="Logout!!! Successfully Logged Out";
echo "<script>window.location='index.php'</script>";

?>
