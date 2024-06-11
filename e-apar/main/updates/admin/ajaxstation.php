<?php
//session_start();
include('../dbconfig/dbcon.php');
		dbcon();
		$design = $_POST['txtstation'];
		
		if(mysql_query("insert into tbl_station(station_name) values ('$design')"))
		{
			echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmaddstation.php';
						</script>";
		}
		else
		{
		 	echo mysql_error();
		}
?>