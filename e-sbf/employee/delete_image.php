<?php

require_once '../dbconfig/dbcon.php';

session_start();

$pf_no = $_SESSION['username'];

$id = $_GET['id'];

//echo $id;exit();

dbcon();
$sql = "SELECT files FROM tbl_doc WHERE id = '$id'";

$result = mysql_query($sql);

$row = mysql_fetch_assoc($result);

$image = $row['files'];

unlink('../uploads/$pf_no/'.$image);
dbcon();
$sql_del = "DELETE FROM tbl_doc WHERE id = '$id'";

$result_del = mysql_query($sql_del);

if($result_del)
{
	echo "<script>window.location.href='sub_forms.php';alert('Doc has been removed');</script>";
} 
else
{
	echo "<script>window.location.href='sub_forms.php';alert('Not removed');</script>";
}




?>