<?php
//session_start();
include('../dbconfig/dbcon.php');
		dbcon();
		$design = $_POST['txtdesign'];
		$date = $_POST['txtdate'];
		$session = $_POST['txtsession'];
		
		if(mysql_query("insert into tbl_designation(designation,date,createdby,createddate) values ('$design','$date','$session',NOW())"))
		{
			mysql_query("insert into tbl_audit(message,action,updatePerson,date) values('$design Designation Added successfully','adding','Super Admin',NOW())");
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