<?php
//session_start();
include('../dbconfig/dbcon.php');
		dbcon();
		$design = $_POST['txtdesign'];
		$date = $_POST['txtdate'];
		$session = $_POST['txtsession'];
		
		if(mysql_query("insert into tbl_designation(designation,date,createdby,createddate) values ('$design','$date','$session',NOW())"))
		{
			echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='ADD_TABLES.php';
						</script>";
		}
		else
		{
		 	echo mysql_error();
		}
?>