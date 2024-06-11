<?php

    include 'common/db.php';

// 	mysql_connect('localhost','root','');

// 	if(mysql_select_db('drmpsurh_sur_railway'))
// 	{
// 		//echo "Connected";
// 	}
// 	else
// 	{
// 		//echo "Not Connected";
// 	}


	// $sql_u = "SELECT username,role FROM users";
	// $result_u = mysql_query($sql_u);
	// $i = 2;
	// while($row_u = mysql_fetch_assoc($result_u))
	// {
	// 	if($row_u['username'] != 'superadmin')
	// 	{
	// 		$sql_up = "INSERT INTO user_permission (id,pf_num, tamm) VALUES ('$i','".$row_u['username']."', '".$row_u['role']."')";
	// 		$i++;
	// 	$result_up = mysql_query($sql_up);	
	// 	}
		
	//  }

	$sql_u = "SELECT username,pf_num, tamm FROM user_permission";
	$result_u = mysqli_query($conn,$sql_u);
	while($row_u = mysqli_fetch_assoc($result_u))
	{
		$tamm = $row_u['tamm'];
		if($row_u['username'] != 'superadmin')
		{
			$sql_up = "UPDATE user_permission SET tamm ='".$tamm.",4' WHERE pf_num = '".$row_u['pf_num']."' ";
			$result_up = mysqli_query($conn ,$sql_up);	
		}
	}

	if($result_up)
	{
		echo "Inserted";
	}
	else
	{
		echo "Not Inserted";
	}

?>