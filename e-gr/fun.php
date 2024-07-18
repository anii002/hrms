<?php
function get_type($id)
{
	global $db_egr;
	if ($id != 0) {
		$fetch_type = mysqli_query($db_egr,"select type from emp_type where id='$id'" );
		$f_s = mysqli_fetch_array($fetch_type);
		return $states = $f_s['type'];
	} else {
		return "-";
	}
}
function get_office($id)
{
	global $db_egr;
	if ($id != 0) {
		$fetch_type = mysqli_query($db_egr,"select office_name from tbl_office where office_id='$id'");
		$f_s = mysqli_fetch_array($fetch_type);
		return $states = $f_s['office_name'];
	} else {
		return "-";
	}
}
function get_dept($id)
{
	global $db_common;
	if ($id != 0) {
		$fetch_type = mysqli_query( $db_common,"select DEPTDESC from department where DEPTNO='$id'");
		$f_s = mysqli_fetch_array($fetch_type);
		return $states = $f_s['DEPTDESC'];
	} else {
		return "-";
	}
}
function get_desig($id)
{
	// echo $id;
	global $db_common;
	if ($id != '') {
		$fetch_type = mysqli_query($db_common,"select DESIGLONGDESC from designations where DESIGCODE='$id'", $db_common);
		$f_s = mysqli_fetch_array($fetch_type);
		return $f_s['DESIGLONGDESC'];
	} else {
		return "-";
	}
}