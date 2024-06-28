<?php
include('../dbconfig/dbcon.php');
$conn = dbcon();

$country_id = ($_REQUEST["v1"] <> "") ? trim($_REQUEST["v1"]) : "";
$id = ($_REQUEST["grade"] <> "") ? trim($_REQUEST["grade"]) : "";
$var1 = ($_REQUEST["nvalue1"] <> "") ? trim($_REQUEST["nvalue1"]) : "";
if ($country_id <> "") {
	$sqlDept = mysqli_query($conn,"select * from scanned_apr where empid='$id' AND year='$country_id'");
	$rwDept = mysqli_fetch_array($sqlDept);

	$dept = $rwDept["totalgrade"];

	$totalvar = $dept + $var1;
	echo $dept;
}
