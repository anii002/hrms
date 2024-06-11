<?php
//error_reporting(0);
require('config.php');
if (isset($_POST['action'])) {
	switch (strtolower($_POST['action'])) {

		case 'submit_change_password':
			$sql = "UPDATE `tbl_otp` SET `flag`='0' WHERE `flag` = '' OR `flag` = '1' AND `emp_id` = '" . $_REQUEST['fetch_user_id'] . "' AND otp = '" . $_POST['typed_otp'] . "' ";
			$result = mysql_query($sql, $db_egr);
			//echo mysql_affected_rows();
			//echo $sql;
			if ($result) {
				$change_pass = "UPDATE `tbl_user` SET `password`= '" . $_POST['request_password'] . "' WHERE `user_id` = '" . $_REQUEST['fetch_user_id'] . "'";
				$change_result = mysql_query($change_pass, $db_egr);
				if ($change_result) {
					echo "<script>alert('Password changed successfully.'); window.location = 'index.php';</script>";
				} else {
					echo "<script>alert('Change Password failed. Generate OTP and try again.'); window.location = 'change_password.php';</script>";
				}
			} else {
				echo "<script>alert('Change Password failed. Try again.'); window.location = 'change_password.php';</script>";
			}
			//echo $change_pass;*/

			break;
	}
}

if (isset($_GET['action'])) {
	switch (strtolower($_GET['action'])) {

		case 'return_griv':
			// print_r($_POST);
			// print_r($_SESSION);
			$name_array = "";
			$tmp_name_array = "";
			$cnt = 0;
			if ($_FILES['upload_doc']['error'][0] != 4) {
				$cnt = count($_FILES['upload_doc']['name']);
				for ($i = 0; $i < $cnt; $i++) {
					$name_array[$i] = $_FILES['upload_doc']['name'][$i];
					$tmp_name_array[$i] = $_FILES['upload_doc']['tmp_name'][$i];
				}
			}

			/*$name_array=$_FILES['upload_doc']['name'];
					$tmp_name_array=$_FILES['upload_doc']['tmp_name'];*/
			$mobile = $_POST["emp_mob"];
			$action = $_POST['action'];
			if (return_griv($_POST['griv_ref_no'], $_POST['emp_id'], $_POST['hidden_id'], $_POST['hidden_user'], $_POST['remark'], $action, $name_array, $tmp_name_array, $mobile)) {
				if (isBASection_Officer()) {
					if ($action == 3) {
						echo "<script>window.location.href='new_grievance.php';alert('Grievance Closed Successfully');</script>";
					} else {
						echo "<script>window.location.href='new_grievance.php';alert('Grievance Send Successfully');</script>";
					}
				} else {
					echo "<script>window.location.href='new_grievance.php';alert('Grievance Send Successfully');</script>"; //window.location.href='new_grievance.php';
				}
			} else {
				echo "<script>window.location.href='new_grievance.php';alert('Grievance Not Send');</script>";
			}
			break;

		case 'return_grivwel':
// 			print_r($_POST);
			// print_r($_SESSION);
			$mobile = $_POST["emp_mob"];
			$name_array = "";
			$tmp_name_array = "";
			$cnt = 0;
			if ($_FILES['upload_doc']['error'][0] != 4) {
				$cnt = count($_FILES['upload_doc']['name']);
				for ($i = 0; $i < $cnt; $i++) {
					$name_array[$i] = $_FILES['upload_doc']['name'][$i];
					$tmp_name_array[$i] = $_FILES['upload_doc']['tmp_name'][$i];
				}
			}
			$hidden_user_id = $_POST["hidden_user"];
// 			echo $hidden_user_id;
			$action = $_POST['action'];
			if (return_grivwel($_POST['griv_ref_no'], $_POST['emp_id'], $_POST['hidden_id'], $_POST['remark'], $action, $name_array, $tmp_name_array, $hidden_user_id, $mobile)) {
				if (isBASection_Officer()) {
					if ($action == 3) {
						echo "<script>window.location='new_grievance.php';alert('Grievance Closed Successfully');</script>";
					} else {
						echo "<script>window.location='new_grievance.php';alert('Grievance Send Successfully');</script>";
					}
				} else {
					echo "<script>window.location='new_grievance.php';alert('Grievance Send Successfully');</script>";
				}
				//window.location.href='new_grievance.php';
			} else {
				echo "<script>window.location.href='new_grievance.php';alert('Grievance Not Send');</script>";
			}
			break;

		case 'return_back_action':
			if (isset($_POST['griv_ref_no'], $_POST['emp_id'], $_POST['hidden_id'], $_POST['hidden_user'], $_POST['remark'], $_POST['action'], $_FILES['upload_doc']['name'], $_FILES['upload_doc']['tmp_name'])) {

				$name_array = $_FILES['upload_doc']['name'];
				$tmp_name_array = $_FILES['upload_doc']['tmp_name'];

				if (return_back_action($_POST['griv_ref_no'], $_POST['emp_id'], $_POST['hidden_id'], $_POST['hidden_user'], $_POST['remark'], $_POST['action'], $_POST['hidden_action'], $name_array, $tmp_name_array)) {
					echo "<script>window.location.href='returned_back.php';alert('Grievance Returned Successfully');</script>";
				} //window.location.href='returned_back.php';
				else {
					echo "<script>window.location.href='returned_back.php';alert('Grievance Not Returned');</script>";
				}
			}
			break;
	}
}