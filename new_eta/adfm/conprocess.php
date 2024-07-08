<?php
session_start();
date_default_timezone_set("Asia/kolkata");
include("../dbconfig/dbcon.php");

$res = 0;
$month = implode(",", $_POST['month']);
$sum = 0;
$total_rows = $_POST['sr1'] + 1;
// echo $total_rows;
$ref = rand(10000, 999999);
$year1 = date("Y");
$reference_no = $_SESSION['empid'] . "/" . $year1 . "/" . $ref;
for ($j = 0; $j < $total_rows; $j++) {
	$sum = $sum + (int)$_POST['amt' . $j];
	//	echo $_POST['total'.$j];
}
$time = date("Y/m/d") . " " . date("h:i:sa");

$insert_master_sql = "INSERT INTO `continjency_master`(`reference`, `month`, `year`, `empid`, `total_amount`, `set_number`, `generate`,`forward_status`,created_date) VALUES ('" . $reference_no . "','" . $month . "','" . $year1 . "','" . $_SESSION['empid'] . "','" . $sum . "','0','0','0','" . date("d/m/Y h:i:s") . "')";

$result = mysqli_query($conn,$insert_master_sql);

if ($result) {
	for ($i = 0; $i < $total_rows; $i++) {
		$insert_sql = "INSERT INTO `continjency`(`reference`, `cntdate`, `cntfrom`, `cntTo`, `kms`, `rate_per_km`, `total_amount`, `set_number`, `objective`) VALUES ('" . $reference_no . "','" . $_POST['date' . $i] . "','" . $_POST['dstn' . $i] . "','" . $_POST['astn' . $i] . "','" . $_POST['distance' . $i] . "', '" . $_POST['per' . $i] . "', '" . $_POST['amt' . $i] . "','0','" . $_POST['object'] . "')";
		$result = mysqli_query($conn,$insert_sql);
		if ($result) {
			$res = $res + 1;
		}
	}
}

if ($res == $total_rows) {
	$empid = $_SESSION['empid'];
	$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
	user_activity($empid, $file_name, 'Save Contingency', 'ADFM save the Contingency');
	echo "<script>alert('Contigency bills are added');window.location='show_saved_cont.php';</script>";
} else {
	$empid = $_SESSION['empid'];
	$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
	user_activity($empid, $file_name, 'Save Contingency', 'ADFM unable to save the Contingency');
	echo "<script>alert('Contingency bill not added...');window.location='add_cont_sep.php';</script>";
}
