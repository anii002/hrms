<?php
include('../dbconfig/dbcon.php');
$conn = dbcon();


	$dept=$_POST["cmbdept"];
	$usertype=$_POST["txtusertype"];
	$date=$_POST["txtdate"];
	$sesion=$_POST["txtsesion"];
	
		if(mysqli_query($conn,"insert into tbl_usertype(usertype,deptid,date,createdby,createddate,modifieddate) values('$usertype','$dept','$date','$sesion',NOW(),NOW())"))
		{
			echo "<script>
			alert('User Type Added Successfully!!!!!!!!');
			window.location='frmadddepartment.php';
			</script>";
		}else
		{
			echo "<script>
			alert('User Type Not Added Please Check Again!!!!');
			window.location='frmadddepartment.php';
			</script>";
			mysqli_error($conn);
		}
	
?>