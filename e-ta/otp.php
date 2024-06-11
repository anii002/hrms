<?php
session_start();
include('dbconfig/dbcon.php');
date_default_timezone_set('Etc/UTC');
?>
<!DOCTYPE html>
<html>
<head>
  <title>
    Travelling Allowances Management Module (TAMM)
  </title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="images/logo1.png" rel="icon" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link href='https://fonts.googleapis.com/css?family=PT+Serif:400' rel='stylesheet' type='text/css'>
</head>
<style>
body {
  font-family: 'PT', serif !important;
  font-weight: 400; 
  font-size: 17px;
  height: 100%;
}
.form-control{
  border-color: #2b3b55 !important;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   opacity: 0.7;
   color: white;
   text-align: left;
}
@media screen and (max-width: 600px) {
    .login-box-body {
        width: 100% !important;
    }
}
</style>
<body class="login-page">

  <div class="row" style="overflow-x: hidden !important;">
    <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="form-group">
        <div class="col-md-12" style="padding: 0px !important;">
          <div class="col-md-6 text-center" style="background: #2b3b55; padding: 50px; height: 100vh">
            <img src="logo.png" style="height:150px; width:150px;"></img><br/>
            <h1 class="card-header" style="color: #fff">CENTRAL RAILWAY</h1>
            <img src="separator.png" style="height:10px; width:150px;"></img><br/>
            <h3 class="card-header" style="color: #fff; font-weight: 600">SOLAPUR DIVISION</h3>
            <br/>
            <h3 class="card-header" style="color: #fff; font-weight: 600">TAMM</h3>
            <h4 class="card-header" style="color: #fff; font-weight: 600">Travelling Allowance Management Module</h4>
            <h4 class="card-header" style="color: #fff; font-weight: 600">यात्रा भत्ता प्रभंधन मॉड्युल</h4>
          </div>
          <div class="col-md-6" style="padding: 50px; background: #fff; height: 100vh;">
            <center>
              <input type="button" value="First login Verification" class="btn btn-lg btn-primary form-contrl" style="width: 35vh; cursor: default;background: #2b3b55;" />
            <!--   <a href="user_register.php" class="btn btn-lg btn-primary form-contrl" style="width: 20vh; cursor: default;background: #2b3b55;">SIGN IN</a> -->
              <br/><br/><br/>
              
            <div class="login-box-body" style="width: 65%; padding: 0px !important">

              <form action="" method="post" autocomplete="off">
                    	
                    <div class="form-group has-feedback hide_get">
                        <input type="password" class="form-control" pattern="[A-Za-z0-9]{6,12}"  maxlength="12" minlength="6" style="border-radius: 10px;" id="oldpwd" placeholder="पुराना पासवर्ड डालें / ENTER OLD PASSWORD" name="oldpwd" autofocus="true" required="required">
                        <span class="fa fa-lock form-control-feedback"></span><br>
                     </div>  

                      <div class="form-group has-feedback hide_get">
                        <input type="password" class="form-control" pattern="[A-Za-z0-9]{6,12}"  maxlength="12" minlength="6" style="border-radius: 10px;" id="newpwd" placeholder="पासवर्ड / ENTER PASSWORD" name="newpwd" autofocus="true" required="required">
                        <span class="fa fa-lock form-control-feedback"></span><br>
                      </div>

                      <div class="form-group has-feedback hide_get">
                        <input type="password" class="form-control" pattern="[A-Za-z0-9]{6,12}" maxlength="12" minlength="6" style="border-radius: 10px;" id="confnewpwd" placeholder="कन्फर्म पासवर्ड / ENTER CONFIRM PASSWORD" name="confnewpwd" autofocus="true" required="required">
                        <span class="fa fa-lock form-control-feedback"></span><br>
                      </div>
                    
                      <div class="row hide_get">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" name='otpbtn' class="btn btn-md btn-primary" style="background: #2b3b55; float: left;">ओ.टी.पी.  प्राप्त करें/Get OTP</button>
                        </div>
          
                        <!-- /.col -->
                      </div>
                  </form>
              <form action="" method="post" autocomplete="off">
                    <div class="form-group has-feedback hide_otp" >
                      <input type="text" class="form-control" style="border-radius: 10px;" id="getotp" placeholder="ओ.टी.पी. / ENTER OTP" name="getotp" autofocus="true" required="required">
                      <span class="fa fa-key form-control-feedback"></span><br>
                    </div>
                  
                    <div class="row hide_otp">
                      <!-- /.col -->
                      <div class="col-xs-6">
                          <button type="submit" name='btnotp' class="btn btn-md btn-primary" style="background: #2b3b55; float: left;"> ओ.टी.पी./Validate OTP</button>
                      </div>
                       <div class="col-xs-6">
                          <a href="index.php" class="btn btn-md btn-primary" style="background: #2b3b55; float: right">वापस/Back </a>
                      </div>
                    
                      <!-- /.col -->
                    </div>
                </form>

            </div>
          </center>
        
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row footer" style=" opacity: 1 !important; margin-left: 0px !important; overflow-x: hidden !important">
    <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="form-group col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="">
            <h4 style="color:#fff;font-size:13px; margin: 0 auto; padding-top: 20px" class="text-center">Design and Developed by <a href="http://www.infoigy.com" style="color:#fff" target="_BLANK"> &copy; SALGEM Infoigy Tech Pvt Ltd 2017-18</a></h4>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
<!-- 
</body>
</html> -->
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