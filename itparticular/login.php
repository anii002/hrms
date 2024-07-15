<?php
session_start();

include_once('dbcon.php');


if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'user_login':
			// $data="sdfgsdg";
			$username = $_POST['txtuser'];
			$password = ($_POST['txtpass']);
			$data = '';

			$con = dbcon2();
			$query = mysqli_query($con, "select * from it_login WHERE username='$username' AND password='" . hashPassword($password, SALT1, SALT2) . "'");

			$row = mysqli_fetch_array($query);
			$count = mysqli_num_rows($query);

			// if(mysqli_affected_rows() > 0)
			// {

			// 	if($count == 1)
			// 	{
			// 		$_SESSION['user'] = $username;
			// 		$data = "dashboard";
			// 	}
			// 	else
			// 	{
			// 			$data="denied";
			// 	}
			// }
			// else
			// {

			// 		$data="denied";
			// }
			if (mysqli_affected_rows($con) > 0) {

				if ($count == 1) {
					$_SESSION['user'] = $username;
					$data = "dashboard";
				} else {
					$data = "denied";
				}
			} else {
				$con = dbcon2();
				$query2 = mysqli_query($con, "select * from register_user WHERE emp_no='$username' AND password='" . hashPassword($password, SALT1, SALT2) . "'");
				$row = mysqli_fetch_array($query2);
				$count = mysqli_num_rows($query2);

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
