<?php

require_once '../dbconfig/dbcon.php';

session_start();

$pf_no = $_SESSION['username'];

$id = $_GET['id'];

//echo $id;exit();

$conn=dbcon();
$sql = "SELECT files FROM tbl_doc WHERE id = '$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

$image = $row['files'];

unlink('../uploads/$pf_no/'.$image);
$conn=dbcon();
$sql_del = "DELETE FROM tbl_doc WHERE id = '$id'";

$result_del = mysqli_query($conn,$sql_del);

if($result_del)
{
	echo "<script>window.location.href='sub_forms.php';alert('Doc has been removed');</script>";
} 
else
{
	echo "<script>window.location.href='sub_forms.php';alert('Not removed');</script>";
}




?>