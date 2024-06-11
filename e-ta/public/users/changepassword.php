
<?php
session_start();
include('../../dbconfig/dbcon.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Employee Change password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color:#3064cc">
<div class="login-box">
  <div class="login-logo" style="margin-top:-80px;">
    <a href="#"><h4 style="color:white;font-size:20px;">यात्रा भत्ता प्रभंधन मॉड्युल </h4>
	
	<h4 style="color:white;font-size:20px;">Traveling Allowance Management Module</h4>
	<h3 style="color:cyan;">Employee Change password</h3></a>
  </div>
	
  <!-- /.login-logo -->
  <div class="login-box-body">
   <p style="color:green;">&nbsp;<b></b>
   </p>
   <?php
	  if(isset($_SESSION['empid']))
	  {
		  ?>
	  <form action="" method="post">
	  <div class="form-group has-feedback ">
        <input type="password" class="form-control" placeholder="Enter OTP" name="getotp" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span><br>
      </div>
	  <div class="row ">
        <div class="col-xs-12">
          <button type="submit" name='btnotp' class="btn btn-danger btn-block btn-flat">Validate OTP</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
	<?php 
	  }
	  ?>
	<br>

  </div>
  <!-- /.login-box-body -->
  <br>
  <i><h4 style="padding-left:50px;color:yellow">Desinged and developed by <a href="http://www.infoigy.com" style="color:white">Infoigy</a></h4></i>
</div>
<!-- /.login-box -->

<!-- jQuery 3.1.1 -->
<script src="../../plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
<?php 
	if(isset($_REQUEST['btnotp']))
	{
		$query_select = mysql_query("select * from tbl_otp where empid='".$_SESSION['empid']."' order by id DESC limit 1");
		$result = mysql_fetch_array($query_select);
		if($result['otp']==$_REQUEST['getotp'])
		{
			$_SESSION['otp_match']="success";
			$query_select = mysql_query("delete from tbl_otp where empid='".$_SESSION['empid']."' and otp='".$result['otp']."'");
			$updated = mysql_query("update users set password='".hashPassword($_SESSION['pass'],SALT1,SALT2)."' where empid='".$_SESSION['empid']."'");
			echo "<script>alert('OTP has been matched successfully!!! Please login with new password');window.location='../../index.php';</script>";
		}
		else{
			$_SESSION['otp_match']="failed";
			echo "<script>alert('OTP has not been matched!!!');window.location='profile.php';</script>";
		}
	}
?>