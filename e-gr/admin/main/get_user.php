<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
$data = '';
$val = $_POST['section_value'];
$arrahy = explode(',', $val);
foreach ($arrahy  as $value) {
	// or role='3'
	$sql = "SELECT * FROM `tbl_user` where status='active'";
	$query = mysqli_query($db_egr,$sql);
	while ($sql_res = mysqli_fetch_array($query)) {
		$roles = explode(',', $sql_res["role"]);
		$section = explode(',', $sql_res["section"]);
		if (in_array('1', $roles) && in_array($value, $section)) {
			$data .= "<option value='" . $sql_res['user_id'] . "'>" . $sql_res['user_name'] . "(" . get_sec_name($value) . ")</option>";
		}
	}
}

function get_sec_name($name)
{
	global $db_egr;
	$query = mysqli_query($db_egr,"select sec_name from tbl_section where sec_id='$name'");
	$fetched = mysqli_fetch_array($query);
	return $fetched['sec_name'];
}
echo $data;
//echo $data1;