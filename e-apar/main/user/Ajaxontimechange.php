<?php

include('../dbconfig/dbcon.php');
dbcon();

	$username = $_POST["txtusername"];
	$oldpass = $_POST["txtoldpass"];
	$pass = $_POST["txtpass"];
	$newpass = $_POST["txtnewpass"];
	
	if($pass == $newpass)
		{
			$result = mysql_query("select * from tbl_user where username='$username' AND password='".hashPassword($oldpass, SALT1, SALT2)."'");
			$Rwresult=mysql_fetch_array($result);
			if($Rwresult['username']!="")
		{
			if(mysql_query("update tbl_user set password='".hashPassword($pass, SALT1, SALT2)."',status='1' where username='$username' "))
			
			{
				echo "<script>alert('Password Changed Successfully......!');window.location='index.php';</script>";
			}else
			{
				echo mysql_error();
			}
		}else
			{
				echo "<script>alert('Please Check Credentials Again......!');window.location='userregister.php';</script>";
			}
		}else
		{
			echo "<script>alert('Re-entered Password is missmatch. Please enter again......!');window.location='userregister.php';</script>";
		}

?>