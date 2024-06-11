<?php
require_once('config.php');
//error_reporting(0);
$data = '<option selected disabled hidden>--- SELECT DESIGNATION ---</option>';
$designation_sql = "SELECT * FROM `designations` WHERE `DEPTNO` = '" . $_REQUEST['user_dept'] . "'";
$office_sql = "SELECT * FROM `tbl_office` WHERE `deptname` = '" . $_REQUEST['user_dept'] . "'";

$fetch_des = mysql_query($designation_sql, $db_common);
while ($des_fetch = mysql_fetch_array($fetch_des)) {
    $data .= "<option value='" . $des_fetch['DESIGCODE'] . "'>" . $des_fetch['DESIGLONGDESC'] . "(" . $des_fetch["DESIGSHORTDESC"] . ")</option>";
}
$data .= "$<option selected disabled hidden>--- SELECT OFFICE ---</option>";

$fetch_office = mysql_query($office_sql, $db_egr);
while ($office_fetch = mysql_fetch_array($fetch_office)) {
    $data .= "<option value='" . $office_fetch['office_id'] . "'>" . $office_fetch['office_name'] . "</option>";
}
echo $data;