<?php
session_start();
include("../dbconfig/dbcon.php");
$conn = dbcon();
$value_id = ($_REQUEST["nvalue1"] <> "") ? trim($_REQUEST["nvalue1"]) : "";
$v1_id = ($_REQUEST["v1"] <> "") ? trim($_REQUEST["v1"]) : "";
$id = ($_REQUEST["id"] <> "") ? trim($_REQUEST["id"]) : "";

$sess = $_SESSION['SESS_MEMBER_NAME'];


echo $value_id;
if (mysqli_query($conn,"insert into tbl_graderemark (groupid,empid,graderemark,createdby,createddate,status)
		 values('$v1_id','$id','$value_id','$sess',NOW(),1)")) {
	echo $value_id;
} else {
	echo mysqli_error($conn);
}
