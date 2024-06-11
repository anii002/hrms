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
    <link rel="stylesheet" href="assets/other/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/other/dist/css/AdminLTE.min.css">
    
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
    font-size:1.7em;
    line-height: 1.4em;
    letter-spacing: 0;
    font-weight:bold;
    text-transform: none;
    display: inline-block;
}
.form-control{
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
              <h4 class="grad title">FORGOT PASSWORD</h4>              
            <img src="assets/img/forget.png" style="height:30px;width:30px;border-bottom-width: 0px;margin-bottom: 16px;"></img><br/><br/>
            <div class="login-box-body" style="width: 65%; padding: 0px !important">

               <?php 
                if(!isset($_REQUEST['q']) && !isset($_REQUEST['z']))
                {
                ?>
              <form action="" method="post" autocomplete="off">
                    <div class="form-group has-feedback hide_get">
                      <input type="text" class="form-control" style="border-radius: 30px; "  id="empid" placeholder="पीएफ नंबर / PF NUMBER" name="empid" autofocus="true" required="required">
                      <span style="color: #3c8dbc;" class="fa fa-user-circle form-control-feedback"></span><br>
                    </div>
                  
                    <div class="row hide_get">
                      <!-- /.col -->
                      <div class="col-xs-6 hide_get_btn">
                          <button type="submit" name='otpbtn' class="btn btn-md btn-primary btn-purple-moon" style="border-radius: 30px; float: left;"> ओ.टी.पी./Get-OTP</button>
                      </div>
                       <div class="col-xs-6">
                          <a href="index.php" class="btn btn-md btn-primary" style="background-color: #d73925d1; border-radius: 30px; float: right">रद्द करना/Cancel </a>
                      </div>
                    
                      <!-- /.col -->
                    </div>
                </form>
                <?php 
                }
                if(isset($_REQUEST['q']) && !isset($_REQUEST['z']))
                {
                ?>
              <form action="" method="post" autocomplete="off">
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 30px;" id="getotp" placeholder="ओ.टी.पी. / ENTER OTP" name="getotp" autofocus="true" required="required">
                      <span style="color: #3c8dbc;" class="fa fa-key form-control-feedback"></span><br>
                    </div>
                  
                    <div class="row">
                      <!-- /.col -->
                      <div class="col-xs-6 hide_get_btn">
                          <button type="submit" name='btnotp' class="btn btn-md btn-primary btn-purple-moon" style="border-radius: 30px; float: left;"> ओ.टी.पी./Validate OTP</button>
                      </div>
                       <div class="col-xs-6">
                          <a href="forgot_password.php" class="btn btn-md btn-primary" style="border-radius: 30px; background-color: #d73925d1; float: right">वापस/Back </a>
                      </div>
                    
                      <!-- /.col -->
                    </div>
                </form>

                <?php 
                  }

                  if(isset($_REQUEST['z']) )
                {
                ?>
                <form action="" method="post" autocomplete="off">
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" pattern="[A-Za-z0-9]{6,12}"  maxlength="12" minlength="6" style="border-radius: 30px;" id="newpwd" placeholder="पासवर्ड / ENTER PASSWORD" name="newpwd" autofocus="true" required="required">
                        <span style="color: #3c8dbc;"  class="fa fa-unlock-alt  form-control-feedback"></span><br>
                      </div>

                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" pattern="[A-Za-z0-9]{6,12}" maxlength="12" minlength="6" style="border-radius: 30px;" id="confnewpwd" placeholder="कन्फर्म पासवर्ड / ENTER CONFIRM PASSWORD" name="confnewpwd" autofocus="true" required="required">
                        <span style="color: #3c8dbc;"  class="fa fa-unlock-alt  form-control-feedback"></span><br>
                      </div>
                    
                      <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-12 hide_get_btn">
                            <button type="submit" name='change' class="btn btn-md btn-primary btn-purple-moon" style="border-radius: 30px; float: left;">पासवर्ड बदलें/Change Password</button>
                        </div>
          
                        <!-- /.col -->
                      </div>
                  </form>

                <?php 
                  }
                  ?>

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

<script src="assets/other/plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/other/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/other/plugins/iCheck/icheck.min.js"></script>
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
//date_default_timezone_set("Asia/Kolkata");
if(isset($_REQUEST['change']))
  {

    if(isset($_SESSION['otp_match']))
    {
        if($_SESSION['otp_match']=="success")
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
      }
  }

  if(isset($_REQUEST['btnotp']))
  {
    $query_select = mysql_query("select * from tbl_otp where empid='".$_SESSION['empid']."' order by id DESC limit 1");
    $result = mysql_fetch_array($query_select);
    if($result['otp']==$_REQUEST['getotp'])
    {
      $_SESSION['otp_match']="success";
      $query_select = mysql_query("delete from tbl_otp where empid='".$_SESSION['empid']."' and otp='".$result['otp']."'");
      echo "<script>alert('OTP has been matched successfully!!!');window.location='forgot_password.php?z=otp';</script>";
    }
    else{
      $_SESSION['otp_match']="failed";
      echo "<script>alert('OTP has not been matched!!!');window.location='forgot_password.php?q=otp';</script>";
    }
  }
  if(isset($_REQUEST['otpbtn']))
  {
    $query = mysql_query("select * from employees where pfno='".$_REQUEST['empid']."'");
    $count = mysql_num_rows($query);
    $result_set = mysql_fetch_array($query);
    if($count>0)
    {
      $otp = rand(999,10000);
        
        // Code to Send sms starts here
                    
          //Your authentication key
          $authKey = "70302AbSftnyOwtvs53d8e401";
          
          //Multiple mobiles numbers separated by comma
          $mobileNumber = $result_set['mobile'];
          
          //Sender ID,While using route4 sender id should be 6 characters long.
          $senderId = "FINSUR";
          
          //Your message to send, Add URL encoding here.
          $msg = "Your OTP for TAMM forgot password is $otp";
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
            echo "<script>alert('OTP has been sent on your registered mobile ".$result_set['mobile'].".');window.location='forgot_password.php?q=otp';</script>";
          }
          $_SESSION['empid']=$_REQUEST['empid'];
          curl_close($ch);
        
        $query_insert = mysql_query("insert into tbl_otp(empid,otp,sent) values('".$_SESSION['empid']."','$otp',CURRENT_TIMESTAMP)");
    }
    else
    {
      $query = mysql_query("select * from employees where pfno=''");
      $query = mysql_query("SELECT * FROM employees where pfno in (select empid from users WHERE username='".$_REQUEST['empid']."' )");
      $count = mysql_num_rows($query);
      $result_set = mysql_fetch_array($query);
      if($count>0)
      {
      $otp = rand(999,10000);
        
        // Code to Send sms starts here
                    
          //Your authentication key
          $authKey = "70302AbSftnyOwtvs53d8e401";
          
          //Multiple mobiles numbers separated by comma
          $mobileNumber = $result_set['mobile'];
          
          //Sender ID,While using route4 sender id should be 6 characters long.
          $senderId = "FINSUR";
          
          //Your message to send, Add URL encoding here.
          $msg = "Your OTP for User account forget password is $otp";
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
            echo "<script>alert('OTP has been sent on your registered mobile ".$result_set['mobile'].".');window.location='forgot_password.php?q=otp';</script>";
          }
          $_SESSION['empid']=$_REQUEST['empid'];
          curl_close($ch);
        
          $query_insert = mysql_query("insert into tbl_otp(empid,otp,sent) values('".$_SESSION['empid']."','$otp',CURRENT_TIMESTAMP)");
      }
      else 
      {
        echo "<script>alert('Please check entered username');window.location='forgot_password.php';</script>";
      }
    }
  }
?>