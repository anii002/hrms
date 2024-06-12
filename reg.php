	<?php

	include 'common/db.php';
	include 'operations/CommonFunctions.php';
	include 'otp.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$pf_no = $_POST['pf_no'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$designation = $_POST['designation'];
		$department = $_POST['department'];
		$bill_unit = $_POST['bill_unit'];
		$station = $_POST['station'];
		$basic_pay = $_POST['basic_pay'];
		$pay_level = $_POST['pay_level'];
		$doa = $_POST['doa'];
		$dob = $_POST['dob'];
		$dob1 = explode('/', $_POST['dob']);
		$password = $dob1[0] . $dob1[1] . $dob1[2];
		$password = hashPassword($password);
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$email = $_POST['email'];
		$aad = $_POST['aad'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$pincode = $_POST['pincode'];
		$office = $_POST['office'];
		$community = $_POST['community'];
		$handi = $_POST['handi'];
		$gender = $_POST['gender'];
		$emp_type = $_POST['emp_type'];

		$sql_fet = "SELECT emp_no FROM register_user WHERE emp_no = '$pf_no'";
		$result_fet = mysqli_query($conn, $sql_fet);

		if ($result_fet) {
			$count = mysqli_num_rows($result_fet);
		} else {
			// Query failed, handle the error
			echo "Error: " . mysqli_error($conn);
		}

		// exit();
		if ($count == 0) {
			$sql = "INSERT INTO register_user (emp_no, name, mobile, designation, department, bill_unit, station, basic_pay, 7th_pay_level, doa, dob, password, emp_address1, emp_address2, emp_email, emp_aadhar, emp_state, emp_city, emp_pincode, office, community, handicap_status, gender, empType, registered_on) VALUES ('$pf_no', '$name', '$mobile', '$designation', '$department', '$bill_unit', '$station', '$basic_pay', '$pay_level', '$doa', '$dob', '$password', '$add1', '$add2', '$email', '$aad', '$state', '$city', '$pincode', '$office', '$community', '$handi', '$gender', '$emp_type','WEB')";

			$result = mysqli_query($conn, $sql);
			// echo  mysql_error();
			//dbcon1('esoluhp6_travel_allowance1');
			// 			mysql_connect('localhost','esoluhp6_test','root@123');
			// 			mysql_select_db('esoluhp6_travel_allowance1');
			// 			exit();
			// $sql1 = "INSERT INTO employees (pfno, name, mobile, desig, dept, BU, station, bp, level, apdate, bdate, psw) VALUES ('$pf_no', '$name', '$mobile', '$designation', '$department', '$bill_unit', '$station', '$basic_pay', '$pay_level', '$doa', '$dob', '$password')";
			// $insertin_ta = mysql_query($sql1);
			//echo  mysql_error();
			//             echo "<pre>";
			//  		print_r($_FILES); exit;
			// $_SESSION['signature'] = $_FILES;
			// $_SESSION['reg_data'] = $sql;
			// $_SESSION['pf_no'] = $pf_no;
			// $_SESSION['mobile'] = $mobile;
			// print_r($sql);exit();

			// if(isset($_SESSION['reg_data']) && isset($_SESSION['pf_no']) && isset($_SESSION['mobile']))
			// {
			//     dbcon1('esoluhp6_sur_railway');
				// otp1($mobile,$pf_no);
				echo "<script>alert('Employee Registered Successfully')</script>";
				echo "<script>window.location.href = 'index.php'</script>";
			// }	
		} else {
			echo "<script>alert('Employee Registered Already')</script>";
			echo "<script>window.location.href = 'Register.php'</script>";
		}
	}