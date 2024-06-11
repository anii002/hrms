<?php

	require_once 'db/db.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$pf_no = $_POST['pf_no'];
		//echo json_encode($pf_no);exit();

		$sql1 = "SELECT * FROM resgister_user WHERE emp_no = '$pf_no'";
		$result1 = mysql_query($sql1);
		$count1 = mysql_num_rows($result1);

		if($count1 == 0)
		{
			$sql = "SELECT * FROM prmaemp WHERE empno = '$pf_no'";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			$count = mysql_num_rows($result);
			if($count == 1)
			{
				echo (json_encode($row));	
			}else{
				echo json_encode("New_User");
			}	
		}
		else
		{
			echo json_encode("Employee Already Registered");
		}
		
	}

?>