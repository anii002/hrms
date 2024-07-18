<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
$data = '<option selected disabled hidden>--- SELECT DESIGNATION ---</option>';
$designation_sql = "SELECT * FROM `designations` WHERE `DEPTNO` = '" . $_REQUEST['user_dept'] . "'";
$office_sql = "SELECT * FROM `tbl_office` WHERE `deptname` = '" . $_REQUEST['user_dept'] . "'";

$fetch_des = mysqli_query($db_common, $designation_sql);
while ($des_fetch = mysqli_fetch_array($fetch_des)) {
    $data .= "<option value='" . $des_fetch['DESIGCODE'] . "'>" . $des_fetch['DESIGLONGDESC'] . "(" . $des_fetch["DESIGSHORTDESC"] . ")</option>";
}
$data .= "$<option selected disabled hidden>--- SELECT OFFICE ---</option>";

$fetch_office = mysqli_query($db_egr, $office_sql);
while ($office_fetch = mysqli_fetch_array($fetch_office)) {
    $data .= "<option value='" . $office_fetch['office_id'] . "'>" . $office_fetch['office_name'] . "</option>";
}
echo $data;
