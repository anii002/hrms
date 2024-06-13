<?php

	require_once 'db/db.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// echo "<pre>";
		// print_r($_POST);exit();

		$pf_no = $_POST['pf_no'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$designation = $_POST['designation'];
		$department = $_POST['department'];
		$bill_unit = $_POST['bill_unit'];
		$station = $_POST['station'];
		$basic_pay = $_POST['basic_pay'];
		$pay_level = $_POST['pay_level'];
		$doa = date('d/m/Y',strtotime($_POST['doa']));
		$dob = date('d/m/Y',strtotime($_POST['dob']));
		$password = hashPassword($dob);

		$sql_fet = "SELECT * FROM register_user WHERE emp_no = '$pf_no'";
		$result_fet = mysql_query($sql_fet);
		$count = mysql_num_rows($result_fet);

		if($count == 0)
		{
			$sql = "INSERT INTO register_user (emp_no, name, designation, department, bill_unit, station, dob, doa, basic_pay, 7th_pay_level, mobile, password) VALUES ('$pf_no', '$name', '$designation', '$department', '$bill_unit', '$station', '$dob', '$doa', '$basic_pay', '$pay_level', '$mobile', '$password')";

			$result = mysql_query($sql);

			if($result)
			{
				echo "<script>alert('Employee Created Successfully')</script>";
				echo "<script>window.location.href = '../default.html'</script>";
			}	
		}
		else
		{
				echo "<script>alert('Employee Registered Already')</script>";
				echo "<script>window.location.href = 'register.php'</script>";
		}

		
	}

?>