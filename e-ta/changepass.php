<?php
session_start();
include('dbconfig/dbcon.php');
if(isset($_SESSION['otp_match']))
{
if($_SESSION['otp_match']=="success")
{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Change password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color:#3064cc">
<div class="login-box">
  <div class="login-logo" style="margin-top:-80px;">
    <a href="#"><h4 style="color:white;font-size:20px;">यात्रा भत्ता प्रभंधन मॉड्युल </h4>
	
	<h4 style="color:white;font-size:20px;">Traveling Allowance Management Module</h4>
	<h3 style="color:cyan;">Change password</h3></a>
  </div>
	
  <!-- /.login-logo -->
  <div class="login-box-body">
   <p style="color:green;">&nbsp;<b></b>
   </p>
    <form action="" method="post">

      <div class="form-group has-feedback hide_get">
        <input type="password" class="form-control" placeholder="New Password" name="newpwd" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span><br>
      </div>
	  <div class="form-group has-feedback hide_get">
        <input type="password" class="form-control" placeholder="Confirm New Password" name="confnewpwd" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span><br>
      </div>
      <div class="row hide_get">
        <div class="col-xs-12">
          <button type="submit" name='change' class="btn btn-primary btn-block btn-flat">Change password</button>
        </div>
        <!-- /.col -->
      </div><br>
	  </form>
	<br>

  </div>
  <!-- /.login-box-body -->
  <br>
  <i><h4 style="padding-left:50px;color:yellow">Desinged and developed by <a href="http://www.infoigy.com" style="color:white">Infoigy</a></h4></i>
</div>
<!-- /.login-box -->

<!-- jQuery 3.1.1 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  $(".hide_otp").hide();
</script>
</body>
</html>
<?php 
	if(isset($_REQUEST['change']))
	{
		if($_REQUEST['newpwd']==$_REQUEST['confnewpwd'])
		{
			$_SESSION['otp'] = "Login with new password";
			$updated = mysql_query("UPDATE  `employees` SET  `psw` =  '".hashPassword($_REQUEST['newpwd'],SALT1,SALT2)."', first_login='1' WHERE  `employees`.`pfno` ='".$_SESSION['empid']."'") or die(mysql_error());
			if(mysql_affected_rows()>0)
			echo "<script>alert('Password has been changed successfully!!!');window.location='index.php';</script>";
			else
      {
        $updated = mysql_query("UPDATE  `users` SET  `password` =  '".hashPassword($_REQUEST['newpwd'],SALT1,SALT2)."' WHERE  `username` ='".$_SESSION['empid']."'") or die(mysql_error());
        if(mysql_affected_rows()>0)
      echo "<script>alert('Password has been changed successfully!!!');window.location='index.php';</script>";
    else
      echo "<script>alert('Please try again!!!');window.location='index.php';</script>";
      }
			
			
		}
		else
		{
			echo "<script>alert('Password & confirm password does not match');</script>";
		}
	}
?>

<?php 
}
}
?>