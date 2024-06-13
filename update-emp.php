<?php

	require_once 'common/db.php';
	if($_SERVER['REQUEST_METHOD'])
	{
		$id = $_POST['id'];
		$pf_no = $_POST['pf_no'];
		$name = $_POST['name'];
		$department = $_POST['department'];
		$designation = $_POST['designation'];
		$bill_unit = $_POST['bill_unit'];
		$pay_level = $_POST['pay_level'];
		$mobile = $_POST['mobile'];
// 		$dob = date('d/m/Y',strtotime($_POST['dob']));
		$dob = $_POST['dob'];
		$station = $_POST['station'];
// 		$doa = date('d/m/Y',strtotime($_POST['doa']));
		$doa = $_POST['doa'];
		$basic_pay = $_POST['basic_pay'];
		$emp_type = $_POST['emp_type'];
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$email = $_POST['email'];
		$aadhar = $_POST['aadhar'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$pin = $_POST['pin'];
		$office = $_POST['office'];
		$off_state = $_POST['off_state'];
		$off_city = $_POST['off_city'];
		$off_add1 = $_POST['off_add1'];
		$off_add2 = $_POST['off_add2'];
		$off_pin = $_POST['off_pin'];
		$community = $_POST['community'];
		$handi = $_POST['handi'];
		$gender = $_POST['gender'];

		 $sql = "UPDATE register_user SET emp_no = '$pf_no', name = '$name', department = '$department', designation = '$designation', bill_unit = '$bill_unit', 7th_pay_level = '$pay_level', mobile = '$mobile', dob = '$dob', station = '$station', doa = '$doa', basic_pay = '$basic_pay', empType = '$emp_type', emp_address1 = '$add1', emp_address2 = '$add2', emp_email = '$email', emp_aadhar = '$aadhar', emp_state = '$state', emp_city = '$city', emp_pincode = '$pin', office = '$office', office_emp_state = '$off_state', office_emp_city = '$off_city', office_emp_address1 = '$off_add1', office_emp_address2 = '$off_add2', office_emp_pincode = '$off_pin', handicap_status = '$handi', gender = '$gender', community = '$community'   WHERE id = '$id'";

		$result = mysql_query($sql);
		echo mysql_error();
		if($result)
		{
			echo "<script>alert('Employee Updated Successfully')</script>";
			echo "<script>window.location.href = 'display-emp.php'</script>";
		}
	}

?>