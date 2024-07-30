<?php

require_once 'common/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$pf_no = $_POST['pf_no'];

	$sql1 = "SELECT * FROM register_user WHERE emp_no = '$pf_no'";
	$result1 = mysqli_query($conn,$sql1);
	$count1 = mysqli_num_rows($result1);

	if ($count1 == 0) {
		$sql = "SELECT * FROM prmaemp WHERE empno = '$pf_no'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		//$row['birthdate'] = date('d/m/Y', strtotime($row['birthdate']));
		$count = mysqli_num_rows($result);

		if ($count == 1) {
			print_r(json_encode($row));
		} else {
			echo json_encode("New_User");
		}
	} else {
		echo json_encode("Employee Already Registered");
	}
}
