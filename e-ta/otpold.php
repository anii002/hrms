<?php
session_start();
include('dbconfig/dbcon.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
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
	<h3 style="color:cyan;">First login Verification</h3></a>
  </div>
	
  <!-- /.login-logo -->
  <div class="login-box-body">
   <p style="color:green;">&nbsp;<b></b>
   </p>
    <form action="" method="post">

      <div class="form-group has-feedback hide_get">
        <input type="text" class="form-control" placeholder="Old password" name="oldpwd" autofocus="" required="required">
        <span class="fa fa-user form-control-feedback"></span><br>
      </div>
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
          <button type="submit" name='otpbtn' class="btn btn-primary btn-block btn-flat">Get OTP</button>
        </div>
        <!-- /.col -->
      </div><br>
	  </form>
	  <form action="" method="post">
	  <div class="form-group has-feedback hide_otp">
        <input type="password" class="form-control" placeholder="Enter OTP" name="getotp" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span><br>
      </div>
	  <div class="row hide_otp">
        <div class="col-xs-12">
          <button type="submit" name='btnotp' class="btn btn-danger btn-block btn-flat">Validate OTP</button>
        </div>
        <!-- /.col -->
      </div>
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
	if(isset($_REQUEST['btnotp']))
	{
		$query_select = mysql_query("select * from tbl_otp where empid='".$_SESSION['empid']."' order by id DESC limit 1");
		$result = mysql_fetch_array($query_select);
		if($result['otp']==$_REQUEST['getotp'])
		{
			$_SESSION['otp'] = "Login with new password";
			$updated = mysql_query("update employees set first_login='1', psw='".hashPassword($_SESSION['newpwd'],SALT1,SALT2)."' where pfno='".$_SESSION['empid']."'");
			echo "<script>alert('Password has been changed successfully!!!');window.location='index.php';</script>";
		}
	}
	if(isset($_REQUEST['otpbtn']))
	{
		if($_REQUEST['newpwd']==$_REQUEST['confnewpwd'])
		{
			$query = mysql_query("SELECT * FROM employees WHERE pfno='".$_SESSION['empid']."' AND psw='".hashPassword($_REQUEST['oldpwd'],SALT1,SALT2)."'");
			$result_set = mysql_fetch_array($query);
			$count = mysql_num_rows($query);
			if($count>0)
			{
				$otp = rand(99,10000);
				$_SESSION['newpwd'] = $_REQUEST['newpwd'];
				
				// Code to Send sms starts here
				  				  
				  //Your authentication key
					$authKey = "70302AbSftnyOwtvs53d8e401";
					
					//Multiple mobiles numbers separated by comma
					$mobileNumber = $result_set['mobile'];
					
					//Sender ID,While using route4 sender id should be 6 characters long.
					$senderId = "FINSUR";
					
					//Your message to send, Add URL encoding here.
					$msg = "Your OTP for TAMM is $otp";
					$message = urlencode("$msg");
					
					//Define route 
					$route = 4;
					//Prepare you post parameters
					$postData = array(
					'authkey' => $authKey,
					'mobiles' => $mobileNumber,
					'message' => $message,
					'sender' => $senderId,
					'route' => $route
					);
					
					//API URL
					$url="http://smsindia.techmartonline.com/sendhttp.php";
					
					//init the resource
					$ch = curl_init();
					curl_setopt_array($ch, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $postData
					//,CURLOPT_FOLLOWLOCATION => true
					));
					
					
					//Ignore SSL certificate verification
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					
					
					//get response
					$output = curl_exec($ch);
					
					//Print error if any
					if(curl_errno($ch))
					{
					echo 'error:' . curl_error($ch);
					}
					else{
						echo "<script>alert('OTP has been sent on your registered mobile ".$result_set['mobile'].".');$('.hide_otp').show();$('.hide_get').hide();</script>";
					}
					
					curl_close($ch);
				
				
						/*$username = "ITmsrlm";
							$password = "amit123";
							$type="UNICODE";
							$sender = "testin";
							$mobile = $result_set['mobile'];
							$message = "Your OTP for TAMM login verification is $otp";
							$message = urlencode($message);
							$baseurl = "http://infoigy001.mediaalertbox.in/sendsms/sendsms.php";
				$url = $baseurl."?username=".$username."&password=".$password."&type=".$type."&sender=".$sender."&mobile=".$mobile."&message=".$message;
							$return = file($url);
							if($return[0] == "SUBMIT_SUCCESS"){
								echo "<script>alert('OTP has been sent on your registered mobile ".$result_set['mobile'].".');$('.hide_otp').show();$('.hide_get').hide();</script>";
							}else{
								echo "<script>alert('Failed to send OTP on your registered mobile.');$('.hide_otp').show();$('.hide_get').hide();</script>";
							}*/
				//print_r($return);
				
				$query_insert = mysql_query("insert into tbl_otp(empid,otp,sent) values('".$_SESSION['empid']."','$otp',CURRENT_TIMESTAMP)");
			}
			else
			{
				echo "<script>alert('Old password does not match');</script>";
			}
		}
		else
		{
			echo "<script>alert('Password & confirm password does not match');</script>";
		}
	}
?>