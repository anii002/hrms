<?php

	include_once("common/db.php");
	include_once("operations/CommonFunctions.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		$password = $_POST['password'];
		$password = hashPassword($password);
        $pf_num = $_SESSION['pf_num'];
		$sql_otp = "SELECT emp_id, otp FROM tbl_otp WHERE emp_id = '$pf_num' ORDER BY id DESC LIMIT 1;";
		$result_otp = mysql_query($sql_otp);
		$row_otp = mysql_fetch_assoc($result_otp);
            // echo "<pre>";
            // print_r($row_otp);exit();
		$pf_num = $row_otp['emp_id'];
			
			$sql = "UPDATE resgister_user SET password = '$password' WHERE emp_no = '$pf_num'";
			$result = mysql_query($sql);

			if($result)
			{
			   // echo "in";exit();
				echo "<script>alert('Password Changed Successfully!');</script>"; 
				echo "<script>window.location.href = 'Login.php';</script>";	
			}
			else
			{
			    // echo "out";exit();
				echo "<script>alert('Failed to  Change Password! Please try Again');</script>"; 
				echo "<script>window.location.href = 'Login.php';</script>";
			}
			
			//exit();
		}
		

		

		
	

?>