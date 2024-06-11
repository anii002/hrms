<?php
include('config.php');
$data = '';
$val = $_POST['section_value'];
$arrahy = explode(',', $val);
foreach ($arrahy  as $value) {
	// or role='3'
	$sql = "SELECT * FROM `tbl_user` where status='active'";
	$query = mysql_query($sql, $db_egr);
	while ($sql_res = mysql_fetch_array($query)) {
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
	$query = mysql_query("select sec_name from tbl_section where sec_id='$name'", $db_egr);
	$fetched = mysql_fetch_array($query);
	return $fetched['sec_name'];
}
echo $data;
//echo $data1;