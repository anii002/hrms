<?php
include('../dbconfig/dbcon.php');
		dbcon();
			
if(isset($_POST["btnSubmit"]))
{
	$oldpass=$_POST["txtoldpass"];
	$newpass=$_POST["txtnewpass"];
	$renewpass=$_POST["txtrenewpass"];
	
		if(mysql_query("update tbl_login set password='".hashPassword($renewpass, SALT1, SALT2)."'"))
		{
			mysql_query("insert into tbl_audit(message,action,updatePerson,date) values('Password changed by Super Admin','editing','Super Admin',NOW())");
			echo "<script>
			alert('Your PASSWORD Has Changed Successfully.......');
			window.location='frmadminprofile.php';
			</script>";
		}else
		{
			echo mysql_error();
		}
}
?>