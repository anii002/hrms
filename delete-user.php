<?php

	require_once 'common/db.php';
	//dbcon('drmpsurh_sur_hrms');
	$id = $_REQUEST['id'];

	$sql = "UPDATE user_permission SET delete_status = 1  WHERE id = '$id'";
	$result = mysql_query($sql);

	if($result)
	{
		echo "<script>alert('User Permission Deleted Successfully')</script>";
		echo "<script>window.location.href = 'show-user.php'</script>";
	}