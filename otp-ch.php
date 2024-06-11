<?php

	require_once 'common/db.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$otp = $_POST['otp'];
        $pf_no = $_SESSION['pf_num'];
		$sql = "SELECT emp_id, otp FROM tbl_otp WHERE emp_id = '$pf_no' ORDER BY id DESC LIMIT 1;";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		if($row['otp'] == $otp)
		{
			echo "<script>
			window.location.href = 'new-pass.php';
			</script>";
		}
		else
		{
			echo "<script>
			alert('Please Enter Correct OTP');
			window.location.href = 'otp-verify.php';
			</script>";

		}

		
	}

?>