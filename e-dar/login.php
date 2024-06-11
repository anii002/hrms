<?php
session_start();
include_once('dbconfig/dbcon.php');
// include('dbconfig/commonjs.php');
if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'user_login':
			// $data="sdfgsdg";
			$username = $_POST['txtuser'];
			$password = $_POST['txtpass'];
			$data = '';
			$hash_pass = hashPassword($password, SALT1, SALT2);
			$sql = "SELECT * FROM `tbl_user` where username='$username' AND password='$hash_pass' AND status='1'";
			$res = mysql_query($sql, $db_edar);
			if (mysql_num_rows($res) > 0) {
				while ($row = mysql_fetch_array($res)) {
					$_SESSION['role'] = $row['role'];
					$_SESSION['username'] = $username;
					$_SESSION['emp_id'] = $row['emp_id'];
					$_SESSION["id"] = $row["id"];
					if ($_SESSION['role'] == 1) {
						$data = "admin";
					} elseif ($_SESSION['role'] == 2) {
						$data = "dar_clerk";
					} elseif ($_SESSION['role'] == 3) {
						$data = "DA";
					} elseif ($_SESSION['role'] == 4) {
						$data = "IO";
					} elseif ($_SESSION['role'] == 5) {
						$data = "PO";
					} elseif ($_SESSION['role'] == 6) {
						$data = "CO";
					} elseif ($_SESSION['role'] == 7) {
						$data = "EMP";
					}
				}
				//session_write_close();
			} else {
				$inner_query = mysql_query("SELECT * from tbl_user WHERE username='$username'", $db_edar);
				$result_set = mysql_fetch_array($inner_query);
				$status = $result_set['status'];
				if ($status == 0) {
					$data = "denied";
				} else {
					$_SESSION['message'] = "Login Failed!!!<br>Please check username or password<br> or contact Administrator";

					$msg = "Login Failed!!!<br>Please check username or password<br> or contact Administrator";
					$data = "false";
				}
			}

			echo $data;
			break;
	}
}