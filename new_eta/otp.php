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
    <link href="assets/img/logo1.png" rel="icon" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/other/plugins/iCheck/square/blue.css">
    <link href='https://fonts.googleapis.com/css?family=PT+Serif:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<style>
body {
  font-family: 'PT', serif !important;
  font-weight: 400; 
  font-size: 17px;
  height: 100%;
}

.grad{
    color: #5543ca;
    background: #5f2c82;
    background: -moz-linear-gradient(left,#5f2c82  0%,#49a09d 100%) !important;
    background: -webkit-linear-gradient(left,#5f2c82  0%,#49a09d 100%) !important;
    background: linear-gradient(to right,#5f2c82  0%,#49a09d  100%) !important;

    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}

.btn-purple-moon {
    background: #5543ca;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #5f2c82, #49a09d);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #5f2c82, #49a09d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
    /*border: 3px solid #eee;*/
}

.btn-orange-moon {
    background: #FF416C;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #FF416C, #FF4B2B);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #FF416C, #FF4B2B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
    /*border: 3px solid #eee;*/
}

.title {
    font-size: 1.6em;
    line-height: 1.4em;
    letter-spacing: 0;
    font-weight:bold;
    text-transform: none;
    display: inline-block;
}
.form-control{
  /*border-color: #2b3b55 !important;*/
  border-color: #3c8dbc !important;
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
.hide_get_btn button{
  margin: 0px auto;
  float: none !important;
}

.hide_get_btn button:focus, .hide_get_btn button.active{
  box-shadow: none !important;
  border: none !important;
  outline: none !important;
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
            <img src="assets/img/logo1.png" style="height:150px; width:150px;"></img><br/>
            <h1 class="card-header" style="color: #fff">CENTRAL RAILWAY</h1>
            <img src="assets/img/separator.png" style="height:10px; width:150px;"></img><br/>
            <h3 class="card-header" style="color: #fff; font-weight: 600">SOLAPUR DIVISION</h3>
            <br/>
            <h3 class="card-header" style="color: #fff; font-weight: 600">TAMM</h3>
            <h4 class="card-header" style="color: #fff; font-weight: 600">Travelling Allowance Management Module</h4>
            <h4 class="card-header" style="color: #fff; font-weight: 600">यात्रा भत्ता प्रभंधन मॉड्युल</h4>
          </div>
          <div class="col-md-6" style="padding: 50px; background: #fff; height: 100vh;">
            <center>
               <h4 class=" grad title">FIRST LOGIN VERIFICATION</h4>
              &nbsp;
              <img src="assets/img/first.png" style="height:30px;width:30px;border-bottom-width: 0px;margin-bottom: 8px;"></img>
          
              <br/><br/><br/>
              
            <div class="login-box-body" style="width: 65%; padding: 0px !important">
              <div class="hide_get">
              <form action="" method="post" autocomplete="off">
                    	
                    <div class="form-group has-feedback ">
                        <input type="password" class="form-control" maxlength="12" minlength="3" style="border-radius: 30px;" id="oldpwd" placeholder="पुराना पासवर्ड डालें / ENTER OLD PASSWORD" name="oldpwd" autofocus="true" required="required">
                        <span  style="color: #3c8dbc;" class="fa fa-unlock-alt form-control-feedback"></span><br>
                     </div>  

                      <div class="form-group has-feedback ">
                        <input type="password" class="form-control"  maxlength="12" minlength="3" style="border-radius: 30px;" id="newpwd" placeholder="पासवर्ड / ENTER PASSWORD" name="newpwd" autofocus="true" required="required">
                        <span  style="color: #3c8dbc;" class="fa fa-unlock-alt form-control-feedback"></span><br>
                      </div>

                      <div class="form-group has-feedback ">
                        <input type="password" class="form-control" maxlength="12" minlength="3" style="border-radius: 30px;" id="confnewpwd" placeholder="कन्फर्म पासवर्ड / ENTER CONFIRM PASSWORD" name="confnewpwd" autofocus="true" required="required">
                        <span  style="color: #3c8dbc;" class="fa fa-unlock-alt form-control-feedback"></span><br>
                      </div>
                    
                      <div class="row hide_get">
                        <!-- /.col -->
                        <div class="col-xs-12 hide_get_btn">
                            <button type="submit" name='otpbtn' class=" btn btn-md btn-primary btn-purple-moon" style="float: left; border-radius: 30px; ">ओ.टी.पी.  प्राप्त करें/Get OTP</button>
                        </div>
                      </div>
                  </form>
                  </div>
              <div class="hide_otp" style="display: none;">
              <form action="" method="post" autocomplete="off">
                    <div class="form-group has-feedback" >
                      <input type="password" class="form-control" style="border-radius: 30px;" id="getotp" placeholder="ओ.टी.पी. / ENTER OTP" name="getotp" autofocus="true" required="required">
                      <span style="color: #3c8dbc;"  class="fa fa-unlock-alt form-control-feedback"></span><br>
                    </div>
                  
                    <div class="row ">
                      <!-- /.col -->
                      <div class="col-xs-6">
                          <button type="submit" name='btnotp' class="btn btn-md btn-primary btn-purple-moon" style="float: left; border-radius: 30px;"> ओ.टी.पी./Validate OTP</button>
                      </div>
                       <div class="col-xs-6">
                          <a href="index.php" class="btn btn-md btn-primary btn-orange-moon" style=" float: right; border-radius: 30px;">वापस/Back </a>
                      </div>
                    </div>
                </form>
                </div>
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
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="assets/global/plugins/js_glow/jquery.jgrowl.js"></script>
<link rel="stylesheet" href="assets/global/plugins/js_glow/jquery.jgrowl.css" type="text/css"/>

<script>

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
      echo '<script>
            $.jGrowl("Loading... Please Wait...", { sticky: true });
            $.jGrowl(" Welcome to E-TA", { header: "First Login" });
            var delay = 1000;
            setTimeout(function(){ window.location = "index.php"  }, delay);
      </script>';
			// echo "<script>alert('Password has been changed successfully!!!');window.location='index.php';</script>";
		}
    else
    {
        echo '<script>$.jGrowl("OTP has been not matched", { header: "OTP Validation" }); </script>';
          echo '<script>$(".hide_get").hide(); $(".hide_otp").show();   </script>';
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
            $mob=$result_set['mobile'];
            echo '<script>$.jGrowl("OTP has been sent on your registered mobile ", { header: "First Login" }); </script>';
            echo '<script>$(".hide_get").hide(); $(".hide_otp").show();   </script>';

						// echo "<script>alert('OTP has been sent on your registered mobile ".$result_set['mobile'].".');$('.hide_otp').show();$('.hide_get').hide();</script>";
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
        echo '<script>$.jGrowl("Old password does not match", { header: "First Login" });</script>';

				// echo "<script>alert('Old password does not match');</script>";
			}
		}
		else
		{
      echo '<script>$.jGrowl("Password & confirm password does not match", { header: "First Login" });</script>';
			// echo "<script>alert('Password & confirm password does not match');</script>";
		}
	}
?>