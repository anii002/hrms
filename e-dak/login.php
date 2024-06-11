<?php
session_start();
include('dbconfig/dbcon.php');
// include('dbconfig/commonjs.php');
if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'user_login':
			// $data="sdfgsdg";
			$username = $_POST['txtuser'];
			$password = $_POST['txtpass'];
			$data = '';

			$sql = "SELECT * FROM tbl_user where username='$username' AND password='" . hashPassword($password, SALT1, SALT2) . "' AND status='1'";
			$res = mysql_query($sql, $db_edak);
			if (mysql_num_rows($res) > 0) {

				while ($row = mysql_fetch_array($res)) {

					$_SESSION['role'] = $row['role'];
					// $_SESSION['dept']=$result_set['dept'];
					// $_SESSION['deptmt']=$row['dept'];
					$_SESSION['admin_username'] = $username;
					$_SESSION['emp_id'] = $row['emp_id'];
					$_SESSION['section'] = $row['section'];
					$_SESSION['dept'] = $row['user_dept'];
					$_SESSION['desig'] = $row['user_desg'];
					// $_SESSION['id']=$row['id'];
					// $_SESSION['empid']=$row['pfno'];
					// $status=$row['status'];


					if ($_SESSION['role'] == 0) {
						$data = "admin";
					} elseif ($_SESSION['role'] == 1) {
						$data = "dak_clerk";
					} elseif ($_SESSION['role'] == 2) {
						$data = "section_user";
					}
				}
				//session_write_close();
			} else {
				$inner_query = mysql_query("SELECT * from tbl_user WHERE username='$username'", $db_edak);
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
