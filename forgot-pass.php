<?php

	require_once 'common/db.php';
	require_once 'otp.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	   	$pf_no = $_POST['pf_no'];

		$sql = "SELECT mobile FROM register_user WHERE emp_no = '$pf_no'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
	    $mobile = $row['mobile'];
		$count = mysql_num_rows($result);
		if($count == 1)
		{
			otp($mobile, $pf_no);
		}
		else
		{
			echo "<script>
				alert('Your PF Number is not Registered');
				window.location.href = 'forgot.php';
				</script>";
		}

	}

?>