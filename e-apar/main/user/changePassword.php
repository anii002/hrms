<?php
session_start();
?>
<html>
<body style="background-color:gray">
<div style="margin-top: 210;margin-left: 380;width: 266px;background-color: aqua;padding: 30px;">
<p style="color:red">Password should not be your pan number</p>
<h1>Set New Password</h1>
	<form action="" method="post">
	<input type="text" name="emplcode" value="<?php echo $_SESSION['EMP_PF_NO'];?>" style="width:90%" readonly /><br><br>
		<input type="password" name="password" placeholder="New Password" style="width:90%"/><br><br>
		<input type="submit" value="Submit" name="setPass" />
	</form>
</div>
</body>
</html>

<?php
include("../dbconfig/dbcon.php");
dbcon();
	if(isset($_REQUEST['setPass']))
	{
		$sql = mysql_query("update tbl_employee set password = '".$_REQUEST['password']."' where emplcode='".$_SESSION['EMP_PF_NO']."'");
		if($sql)
		{
			echo "<script>alert('user password changed successfully..');window.location='/e-apar/main/user/frmemployeedetails.php';</script>";
		}
		else
		{
			echo "<script>alert('Please contact to helpdesk!!!');window.location='index.php';</script>";
		}
	}
?>