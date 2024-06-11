<?php
include('../dbconfig/dbcon.php');
		dbcon();
		session_start();
			
// if($Flag=="Save")
		// {
			$userfullname=$_POST["txtuserfullname"];
			$usertype=$_POST["cmbusertype"];
			$username=$_POST["txtusername"];
			$password=$_POST["txtpassword"];
			$email=$_POST["txtemail"];
			$dept=$_POST["cmbdept"];
			$contact=$_POST["txtcontact"];
			$group=$_POST["cmbgroup"];
			$accesslevel=$_POST["cmbaccesslevel"];
			$joindate=$_POST["txtjoindate"];
			$designation=$_POST["cmbdesignation"];
			
		if(mysql_query("insert into tbl_user (fullname,usertype,username,password,email,dept,designation,contact,createddate,createdby,status,modifydate,groupid,accesslevel,joiningdate)
			values ('$userfullname','$usertype','$username','$password','$email','$dept','$designation','$contact',NOW(),'".$_SESSION['SESS_MEMBER_NAME']."','1',NOW(),'$group','$accesslevel','$joindate')"))
					{
						echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmadduser.php';
						</script>";
					}
					else
					{
						echo mysql_error();
					}
		//}
?>