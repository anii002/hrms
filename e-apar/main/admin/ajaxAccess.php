<?php
include("../dbconfig/dbcon.php");
$conn = dbcon();


$array = array();
//----------For Super Admin----------------//
for ($i = 1; $i <= 10; $i++) {
	if (isset($_GET['check' . $i]))
		$array[$i - 1] = $_GET['check' . $i];
	else
		$array[$i - 1] = "off";
}
$sql = mysqli_query($conn,"update tbl_accesspermission set viewing='$array[0]' , adding='$array[1]',editing='" . $array[2] . "',deleting='" . $array[3] . "',
confirmedit='" . $array[4] . "',confirmdelete='" . $array[5] . "',grouping='" . $array[6] . "',
assigning_group='" . $array[7] . "',report_generation='" . $array[8] . "',report_printing='" . $array[9] . "' where accesslevel='" . $_GET['txtsuperadmin'] . "'");



//----------For Admin----------------//
for ($i = 11; $i <= 20; $i++) {
	if (isset($_GET['check' . $i]))
		$array[$i - 1] = $_GET['check' . $i];
	else
		$array[$i - 1] = "off";
}
$sql = mysqli_query($conn,"update tbl_accesspermission set viewing='$array[10]' , adding='$array[11]',editing='" . $array[12] . "',deleting='" . $array[13] . "',
confirmedit='" . $array[14] . "',confirmdelete='" . $array[15] . "',grouping='" . $array[16] . "',
assigning_group='" . $array[17] . "',report_generation='" . $array[18] . "',report_printing='" . $array[19] . "' where accesslevel='" . $_GET['txtadmin'] . "'");


//----------For Officer General----------------//
for ($i = 21; $i <= 30; $i++) {
	if (isset($_GET['check' . $i]))
		$array[$i - 1] = $_GET['check' . $i];
	else
		$array[$i - 1] = "off";
}
$sql = mysqli_query($conn,"update tbl_accesspermission set viewing='$array[20]' , adding='$array[21]',editing='" . $array[22] . "',deleting='" . $array[23] . "',
confirmedit='" . $array[24] . "',confirmdelete='" . $array[25] . "',grouping='" . $array[26] . "',
assigning_group='" . $array[27] . "',report_generation='" . $array[28] . "',report_printing='" . $array[29] . "' where accesslevel='" . $_GET['txtOfficerGeneral'] . "'");


//----------For Officer Departmental----------------//
for ($i = 31; $i <= 40; $i++) {
	if (isset($_GET['check' . $i]))
		$array[$i - 1] = $_GET['check' . $i];
	else
		$array[$i - 1] = "off";
}
$sql = mysqli_query($conn,"update tbl_accesspermission set viewing='$array[30]' , adding='$array[31]',editing='" . $array[32] . "',deleting='" . $array[33] . "',
confirmedit='" . $array[34] . "',confirmdelete='" . $array[35] . "',grouping='" . $array[36] . "',
assigning_group='" . $array[37] . "',report_generation='" . $array[38] . "',report_printing='" . $array[39] . "' where accesslevel='" . $_GET['txtOfficerDepartmental'] . "'");

//----------For Cadder Cheif Office Superitendent----------------//
for ($i = 41; $i <= 50; $i++) {
	if (isset($_GET['check' . $i]))
		$array[$i - 1] = $_GET['check' . $i];
	else
		$array[$i - 1] = "off";
}
$sql = mysqli_query($conn,"update tbl_accesspermission set viewing='$array[40]' , adding='$array[41]',editing='" . $array[42] . "',deleting='" . $array[43] . "',
confirmedit='" . $array[44] . "',confirmdelete='" . $array[45] . "',grouping='" . $array[46] . "',
assigning_group='" . $array[47] . "',report_generation='" . $array[48] . "',report_printing='" . $array[49] . "' where accesslevel='" . $_GET['txtCHOS'] . "'");



//----------For Techinical----------------//
for ($i = 51; $i <= 60; $i++) {
	if (isset($_GET['check' . $i]))
		$array[$i - 1] = $_GET['check' . $i];
	else
		$array[$i - 1] = "off";
}
$sql = mysqli_query($conn,"update tbl_accesspermission set viewing='$array[50]' , adding='$array[51]',editing='" . $array[52] . "',deleting='" . $array[53] . "',
confirmedit='" . $array[54] . "',confirmdelete='" . $array[55] . "',grouping='" . $array[56] . "',
assigning_group='" . $array[57] . "',report_generation='" . $array[58] . "',report_printing='" . $array[59] . "' where accesslevel='" . $_GET['txtTechinical'] . "'");
if ($sql) {
	echo "<script>alert('Record Updated Successfully ...');window.location='frmadminprofile.php';</script>";
	mysqli_query($conn,"insert into tbl_audit(message,action,updatePerson,date) values('Access permission modified by Super Admin','editing','Super Admin',NOW())");
} else {
	echo "<script>alert('Record not updated');</script>";
}
