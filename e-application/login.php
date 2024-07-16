<?php
session_start();

include('dbcon.php');


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'user_login':
			// $data="sdfgsdg";
			$username = $_POST['txtuser'];
			$password = ($_POST['txtpass']);
			$data = '';

			$conn=dbcon3();
			$query2 = mysqli_query($conn,"select * from add_user WHERE user_pfno='$username' AND user_psw='" . hashPassword($password, SALT1, SALT2) . "'");
			$row = mysqli_fetch_array($query2);
			$role = $row['user_role'];
			$count = mysqli_num_rows($query2);

			if (mysqli_affected_rows($conn) > 0) {

				if ($count == 1) {
					$_SESSION['user'] = $username;
					$_SESSION['user_role'] = $role;
					$data = "dashboard";
				} else {
					$data = "denied";
				}
			} else {

				$conn=dbcon2();
				$query = mysqli_query($conn,"select * from register_user WHERE emp_no='$username' AND password='" . hashPassword($password, SALT1, SALT2) . "'");

				$row = mysqli_fetch_array($query);
				$count = mysqli_num_rows($query);
				if ($count == 1) {
					$_SESSION['user'] = $username;
					$data = "dashboard";
				} else {
					// echo "select * from employees WHERE pfno='$username' AND psw='".hashPassword($password,SALT1,SALT2)."'";
					$data = "denied";
				}
			}

			echo  $data;
			break;
	}
}
