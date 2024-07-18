<?php
require_once('config.php');
//error_reporting(0);

$data = '<option selected disabled hidden>--- SELECT DESIGNATION ---</option>';
$designation_sql = "SELECT * FROM `tbl_designation` WHERE `dept_id` = '".$_REQUEST['emp_dept']."'";
$office_sql = "SELECT * FROM `tbl_office` WHERE `deptname` = '".$_REQUEST['emp_dept']."'";

$fetch_des=mysqli_query($db_egr,$designation_sql);
while($des_fetch=mysqli_fetch_array($fetch_des))
{
    $data .= "<option value='".$des_fetch['id']."'>".$des_fetch['designation']."</option>";
}
$data .= "$<option selected disabled hidden>--- SELECT OFFICE ---</option>";

$fetch_office=mysqli_query($db_egr,$office_sql);
while($office_fetch=mysqli_fetch_array($fetch_office))
{
    $data .= "<option value='".$office_fetch['office_id']."'>".$office_fetch['office_name']."</option>";
}

echo $data;
?>
