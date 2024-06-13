<?php
	require_once 'common/db.php';
	require_once 'operations/CommonFunctions.php';
	//dbcon('drmpsurh_sur_railway');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		/*echo "<pre>";
		print_r($_POST);exit();*/
		// if(isset($_SESSION['UserName']))
		// {
		// 	if($_SESSION['UserName'] == 'superadmin')
		// 	{
		// 		$cre_superadmin = 1;
		// 	}
		// }

		$pf_no = $_POST['pf_no'];
		$name = $_POST['name'];
		$department = $_POST['department'];
		$designation = $_POST['designation'];
		$bill_unit = $_POST['bill_unit'];
		$pay_level = $_POST['pay_level'];
		$mobile = $_POST['mobile'];
		$dob1 = explode('/',$_POST['dob']);
  		$password = $dob1[0].$dob1[1].$dob1[2];
		$password = hashPassword($password);
		$dob = $_POST['dob'];
		$station = $_POST['station'];
		$doa = $_POST['doa'];
		$basic_pay = $_POST['basic_pay'];
		$emp_type = $_POST['emp_type'];
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$email = $_POST['email'];
		$aad = $_POST['aad'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$pincode = $_POST['pincode'];
		$office = $_POST['office'];
		// $off_state = $_POST['off_state'];
		// $off_city = $_POST['off_city'];
		// $off_add1 = $_POST['off_add1'];
		// $off_add2 = $_POST['off_add2'];
		// $off_pin = $_POST['off_pin'];
		$community = $_POST['community'];
		$handi = $_POST['handi'];
		$gender = $_POST['gender'];

		$sql_fet = "SELECT * FROM register_user WHERE emp_no = '$pf_no'";
		$result_fet = mysql_query($sql_fet);
		$count = mysql_num_rows($result_fet);
		// print_r($count);exit();
		if($count == 0)
		{
			
			$sql = "INSERT INTO user_permission (pf_num, e_sar, tamm, e_grievance, e_notification, it_form, e_app, forms, e_apar) VALUES ('$pf_num', 2, 4, 4, 2, 1, 3, 1, 6)";
			// echo "<pre>";
			//print_r($sql);exit();
			$result = mysql_query($sql);
			//echo mysql_error();exit();
			if($result)
			{
			    $sql_reg = "SELECT * FROM register_user WHERE emp_no = '$pf_no'";
				$result_reg = mysql_query($sql_reg);
				$row_reg = mysql_fetch_assoc($result_reg);

				$sql_user = "INSERT INTO user_permission (pf_num, e_sar, tamm, e_grievance, e_notification, it_form) VALUES ('$pf_no', 2, 4, 4, 2, 1)";
				$result_user = mysql_query($sql_user);
				if($result_user)
				{
					mysql_connect('localhost','drmpsurh_test','root@123');
					mysql_select_db('drmpsurh_travel_allowance1');
					$sql_ta = "SELECT pfno, mobile FROM employees WHERE pfno = '$pf_no'";
					$result_ta = mysql_query($sql_ta);
					$count_ta = mysql_num_rows($result_ta);
					if($count_ta == 1)
					{
						$sql_taup = "UPDATE employees SET mobile = '$mobile' WHERE pfno = '$pf_no'";
						$result_taup = mysql_query($sql_taup);
					}
					if($count_ta == 0)
					{
						
						$bdate1 = explode('/', $row_reg['dob']);
						if(!empty($row_reg['doa']))
						{
							$apdate1 = explode('/', $row_reg['doa']);	
						}
						else
						{
							$apdate1 = NULL;
						}
						

						$bdate = $bdate1[2].'-'.$bdate1[1].'-'.$bdate1[0];
						$apdate = $apdate1[2].'-'.$apdate1[1].'-'.$apdate1[0];
						$sql_taup = "INSERT INTO employees (BU, pfno, name, desig, station, mobile, dept, bp, bdate, apdate, level, psw) VALUES ('".$row_reg['bill_unit']."', '".$row_reg['emp_no']."', '".$row_reg['name']."', '".$row_reg['designation']."', '".$row_reg['station']."', '".$row_reg['mobile']."' ,'".$row_reg['department']."', '".$row_reg['basic_pay']."', '$bdate', '$apdate', '".$row_reg['7th_pay_level']."', '".$row_reg['password']."')";
					$result_taup = mysql_query($sql_taup);
					}
					//exit();
					echo "<script>alert('Employee Registered Successfully')</script>";
					echo "<script>window.location.href = 'display-emp.php'</script>";	
				}
			}	
		}
		else
		{
				echo "<script>alert('Employee Registered Already')</script>";
				echo "<script>window.location.href = 'employee.php'</script>";
		}

		
	}

?>