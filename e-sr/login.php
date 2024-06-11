<?php
session_start();
error_reporting(0);
include('admin/create_log.php');
include('dbconfig/dbcon.php');

// Establish connection to the first database
$conn = dbcon();

// Check if the connection is established
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

/*................................................... Admin .....................................................*/
$query = "SELECT * FROM tbl_login WHERE username='$username' AND password='" . hashPassword($password, SALT1, SALT2) . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$num_row = mysqli_num_rows($result);

if ($num_row > 0) {
	$_SESSION['id'] = $row['adminid'];
	$id = $_SESSION['id'];
	$adminusername = $row['username'];
	$_SESSION['SESS_MEMBER_ID'] = $row['adminid'];
	$_SESSION['SESS_ADMIN_FULLNAME'] = $row['adminname'];
	$_SESSION['SESSION_ROLE'] = $row['role'];
	$_SESSION['SESS_MEMBER_NAME'] = $row['username'];
	$_SESSION['SESS_ADMIN_NAME'] = $adminusername;
	$_SESSION['set_update_pf'] = '';
	$_SESSION['same_pf_no'] = '';

	$action = "Logged In Successfully";
	$action_on = $_SESSION['set_update_pf'];
	create_log($action, $action_on);

	session_write_close();

	echo '<script>
    $.jGrowl("You have successfully logged in", {life: 200, close: function(e, m) { window.location="admin/index.php"; }});
    </script>';
} else {
	// Establish connection to the second database
	$conn1 = dbcon1();

	// Check if the connection is established
	if (!$conn1) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT * FROM user_login WHERE username='$username' AND password='" . hashPassword($password, SALT1, SALT2) . "' AND act_deact='0'";
	$result = mysqli_query($conn1, $query) or die(mysqli_error($conn1));
	$row = mysqli_fetch_array($result);
	$num_row = mysqli_num_rows($result);

	if ($num_row > 0) {
		$_SESSION['id'] = $row['adminid'];
		$id = $_SESSION['id'];
		$adminusername = $row['username'];
		$_SESSION['SESS_MEMBER_ID'] = $row['adminid'];
		$_SESSION['SESS_ADMIN_FULLNAME'] = $row['adminname'];
		$_SESSION['SESSION_ROLE'] = $row['role'];
		$_SESSION['SESS_MEMBER_NAME'] = $row['username'];
		$_SESSION['SESS_ADMIN_NAME'] = $adminusername;
		$_SESSION['set_update_pf'] = '';
		$_SESSION['same_pf_no'] = '';

		$action = "Logged In Successfully";
		$action_on = $_SESSION['set_update_pf'];
		create_log($action, $action_on);

		session_write_close();

		echo '<script>
        $.jGrowl("You have successfully logged in", {life: 200, close: function(e, m) { window.location="admin/index.php"; }});
        </script>';
	} else {
		echo '<script>
        $.jGrowl("Please check Username OR Password", {life: 400, close: function(e, m) { window.location="index.php"; }});
        </script>';
	}
}
?>
<html>

<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="plugins/js_glow/jquery.jgrowl.js"></script>
    <link rel="stylesheet" href="plugins/js_glow/jquery.jgrowl.css" type="text/css" />
</head>

<body style="background-color:white;">
</body>

</html>