<?php
include('../dbconfig/dbcon.php');
include('smscode.php');
$conn=dbcon();
session_start();
error_reporting(0);

$userfullname = $_POST["txtuserfullname"];
$username = $_POST["txtusername"];
$password = $_POST["txtpassword"];
$email = $_POST["txtemail"];
$dept = $_POST["cmbdept"];
$contact = $_POST["txtcontact"];
$group = $_POST["cmbgroup"];
$accesslevel = $_POST["cmbaccesslevel"];
$joindate = $_POST["txtjoindate"];
$designation = $_POST["cmbdesignation"];
$session = $_SESSION['SESS_MEMBER_NAME'];

//$send=array("mobile_no"=>"$contact","message"=>"Dear $userfullname, Message From: DRM OFFICE This is your username=$username and password=$password");
//send_sms1($send);

if (mysqli_query($conn,"insert into tbl_user (fullname,username,password,email,dept,designation,contact,createddate,createdby,status,modifydate,groupid,accesslevel,joiningdate)
			values ('$userfullname','$username','" . hashPassword($password, SALT1, SALT2) . "','$email','$dept','$designation','$contact',NOW(),'" . $_SESSION['SESS_MEMBER_NAME'] . "','0',NOW(),'$group','$accesslevel','$joindate')")) {
	mysqli_query($conn,"insert into tbl_audit(message,action,updatePerson,date) values('User Added with username $username','adding','$session',NOW())");
	echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmadduser.php';
						</script>";
} else {
	echo mysqli_error($conn);
}
