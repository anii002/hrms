<?php

	require_once 'common/db.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	    
		$otp = $_POST['otp'];
		$pf_num = $_SESSION['pf_no'];
		$mobile = $_SESSION['mobile'];

		$sql = "SELECT emp_id, otp FROM tbl_otp WHERE emp_id = '$pf_num'  ORDER BY id DESC LIMIT 1";
		//echo $sql;
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		if($row['otp'] == $otp)
		{
			$result = mysql_query($_SESSION['reg_data']);
			if($result)
			{
			    $sql_reg = "SELECT * FROM resgister_user WHERE emp_no = '$pf_num'";
				$result_reg = mysql_query($sql_reg);
				$row_reg = mysql_fetch_assoc($result_reg);
				$dept=$row_reg['department'];
				if($dept=='01')
				{
				    $tamm_user="21";
				}else{
				    $tamm_user="4";
				}
				$sql_user = "INSERT INTO user_permission (pf_num, e_sar, tamm, e_grievance, e_notification, it_form, e_app, forms, e_apar, feedback, sbf) VALUES ('$pf_num', 2, '$tamm_user', 4, 2, 1, 3, 1, 6, 3, 4)";
				$result_user = mysql_query($sql_user);
				if($result_user)
				{
					mysql_connect('localhost','root','');
					mysql_select_db('drmpsurh_travel_allowance1');
					$sql_ta = "SELECT pfno, mobile FROM employees WHERE pfno = '$pf_num'";
					$result_ta = mysql_query($sql_ta);
					$count_ta = mysql_num_rows($result_ta);
					if($count_ta == 1)
					{
					    $sql_taup = "UPDATE employees SET mobile = '$mobile' WHERE pfno = '$pf_num'";
					    $result_taup = mysql_query($sql_taup);
					}
					if($count_ta == 0)
					{
						
						$bdate1 = explode('/', $row_reg['dob']);
						$apdate1 = explode('/', $row_reg['doa']);
						$bdate = $bdate1[2].'-'.$bdate1[1].'-'.$bdate1[0];
						$apdate = $apdate1[2].'-'.$apdate1[1].'-'.$apdate1[0];
						$sql_taup = "INSERT INTO employees (BU, pfno, name, desig, station, mobile, dept, bp, bdate, apdate, level, psw) VALUES ('".$row_reg['bill_unit']."', '".$row_reg['emp_no']."', '".$row_reg['name']."', '".$row_reg['designation']."', '".$row_reg['station']."', '".$row_reg['mobile']."' ,'".$row_reg['department']."', '".$row_reg['basic_pay']."', '$bdate', '$apdate', '".$row_reg['7th_pay_level']."', '".$row_reg['password']."')";
					$result_taup = mysql_query($sql_taup);
					}

					echo "<script>
					alert('Thank You! Your Registered Successfully');
					window.location.href = 'Login.php';
					</script>";	
				}
			}
		}
		else
		{
			echo "<script>
			alert('Please Enter Correct OTP');
			window.location.href = 'otp-verify1.php';
			</script>";

		}

		
	}

?>