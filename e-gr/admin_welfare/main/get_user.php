<?php
include('config.php');
	$data='';
	$query = mysqli_query($db_egr,"SELECT * FROM tbl_user where section='".$_POST['sec_val']."'"); 
	while($sql_res=mysqli_fetch_assoc($query))
	{
			$data.="".$sql_res['user_id']."$"."".$sql_res['user_name']."";
		
	}
	echo $data;
	//echo $data1;

?>