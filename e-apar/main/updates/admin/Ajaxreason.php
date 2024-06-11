<?php
include('../dbconfig/dbcon.php');
		dbcon();
		session_start();
			

			$year=$_POST["txtyear"];
			$empid=$_POST["txtempid"];
			$empcode=$_POST["txtempcode"];
			$session=$_POST["txtsession"];
			$reason=$_POST["txtreason"];
			
		if(mysql_query("insert into tbl_reason(empid,empcode,reasontype,financialyear,createdby,createddate) 
		values('$empid','$empcode','$reason','$year','$session',NOW())"))
		{
						echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmaddemployee.php';
						</script>";
		}
		else
		{
			echo mysql_error();
		}
?>