<?php
session_start();
if (!isset($_SESSION['user'])) {
  echo "<script>
    alert('unauthorized Access');
    window.location.href = '../index.php';
    </script>";
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>
    STAFF BENEFIT FUND (SBF)
  </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="../../new_eta/assets/img/logo1.png" rel="icon" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../new_eta/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../new_eta/assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/style.css">

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

  .grad {
    color: #5543ca;
    background: #5f2c82;
    background: -moz-linear-gradient(left, #5f2c82 0%, #49a09d 100%) !important;
    background: -webkit-linear-gradient(left, #5f2c82 0%, #49a09d 100%) !important;
    background: linear-gradient(to right, #5f2c82 0%, #49a09d 100%) !important;

    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
  }

  .btn-purple-moon {
    background: #5543ca;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #5f2c82, #49a09d);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #5f2c82, #49a09d);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
    /*border: 3px solid #eee;*/
  }

  .title {
    font-size: 2.125em;
    line-height: 1.4em;
    letter-spacing: 0;
    font-weight: bold;
    text-transform: none;
    display: inline-block;
  }

  .form-control {
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

  .hide_get_btn button:focus,
  .hide_get_btn button.active {
    box-shadow: none !important;
    border: none !important;
    outline: none !important;
  }

  @media screen and (max-width: 600px) {
    .login-box-body {
      width: 100% !important;
    }
  }

  a#login-as-guest:focus {
    color: red;
  }

  a#login-as-guest:hover {
    color: red;
  }
</style>

<body class="login-page">

  <div class="row" style="overflow-x: hidden !important;">
    <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="form-group">
        <div class="col-md-12" style="padding: 0px !important;">
          <div class="col-md-6 text-center" style="background: #2b3b55; padding: 50px; height: 100vh">
            <img src="assets/img/logo1.png" style="height:150px; width:150px;"></img><br />
            <h1 class="card-header" style="color: #fff">CENTRAL RAILWAY</h1>
            <img src="assets/img/separator.png" style="height:10px; width:150px;"></img><br />
            <h3 class="card-header" style="color: #fff; font-weight: 600">SOLAPUR DIVISION</h3>
            <br />
            <h3 class="card-header" style="color: #fff; font-weight: 600">TAMM</h3>
            <h4 class="card-header" style="color: #fff; font-weight: 600">Travelling Allowance Management Module</h4>
            <h4 class="card-header" style="color: #fff; font-weight: 600">यात्रा भत्ता प्रभंधन मॉड्युल</h4>
          </div>
          <div class="col-md-6" style="padding: 50px; background: #fff; height: 100vh;">
            <center>
              <h4 class=" grad title">SIGN IN</h4>
              &nbsp;
              <img src="assets/img/log.png" style="height:30px;width:30px;border-bottom-width: 0px;margin-bottom: 16px;"></img>

              <br /><br />

              <div class="login-box-body" style="width: 65%; padding: 0px !important">
                <form id="login_form" method="post" autocomplete="off">

                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" style="border-radius: 30px; " id="txtuser" placeholder="प्रयोगकर्ता का नाम / Username" name="txtuser" autofocus="true" required="required">
                    <span style="color: #3c8dbc;" class="fa fa-user-circle form-control-feedback"></span><br>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" style="border-radius: 30px;" placeholder="पासवर्ड / Password " name="txtpass" id="txtpass" required="required">
                    <span style="color: #3c8dbc;" class="fa fa-unlock-alt form-control-feedback"></span>
                  </div>

                  <div class="form-group has-feedback">

                    <p class="text-right"><a id='login-as-guest' href="forgot_password.php">Forgot Password</a></p>
                  </div>
                  <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-6 hide_get_btn">
                      <button type="submit" id="sub_button" class="btn btn-md btn-primary btn-purple-moon" style=" float: left; border-radius: 30px;"> लॉग इन / Login</button>
                    </div>
                    <div class="col-xs-6">
                      <a href="user_register.php" class="btn btn-md btn-primary btn-purple-moon" style="float: right; border-radius: 30px;"> रजिस्टर / Register</a>
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


  <script src="../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
  <script type="text/javascript" src="../../new_eta/assets/global/plugins/js_glow/jquery.jgrowl.js"></script>
  <link rel="stylesheet" href="../../new_eta/assets/global/plugins/js_glow/jquery.jgrowl.css" type="text/css" />


  <script type="text/javascript">
    // $(document).on("")
    $(document).ready(function() {
      $("#login_form").submit(function(e) {
        e.preventDefault();
        var user = $("#txtuser").val();
        var pass = $("#txtpass").val();
        // alert(user+pass);

        var formData = jQuery(this).serialize();
        $.ajax({
          type: "POST",
          url: "login.php",
          data: "action=user_login&txtuser=" + user + "&txtpass=" + pass,
          // data: formData,
          success: function(html) {
            // alert(html);
            // debugger; 
            console.log(html);
            if (html == 'admin') {
              $.jGrowl("Loading... Please Wait...", {
                sticky: true
              });
              $.jGrowl(user + " Welcome to E-TA", {
                header: 'Access Granted'
              });
              var delay = 1000;
              setTimeout(function() {
                window.location = 'admin/index.php'
              }, delay);
            } else if (html == 'employee') {
              $.jGrowl("Loading... Please Wait...", {
                sticky: true
              });
              $.jGrowl(user + " Welcome to E-TA", {
                header: 'Access Granted'
              });
              var delay = 1000;
              setTimeout(function() {
                window.location = 'employee/index.php'
              }, delay);
            } else if (html == 'control_incharge') {
              $.jGrowl("Loading... Please Wait...", {
                sticky: true
              });
              $.jGrowl(user + " Welcome to E-TA", {
                header: 'Access Granted'
              });
              var delay = 1000;
              setTimeout(function() {
                window.location = 'control_incharge/index.php'
              }, delay);
            } else if (html == 'sbf_section') {
              $.jGrowl("Loading... Please Wait...", {
                sticky: true
              });
              $.jGrowl(user + " Welcome to E-TA", {
                header: 'Access Granted'
              });
              var delay = 1000;
              setTimeout(function() {
                window.location = 'sbf_section/index.php'
              }, delay);
            } else if (html == 'csbf_section') {
              $.jGrowl("Loading... Please Wait...", {
                sticky: true
              });
              $.jGrowl(user + " Welcome to E-TA", {
                header: 'Access Granted'
              });
              var delay = 1000;
              setTimeout(function() {
                window.location = 'csbf_section/index.php'
              }, delay);
            } else {
              $.jGrowl("Please check your username or password", {
                header: 'Login Failed'
              });
            }
          }
        });
        return false;
      });
    });
  </script>

</body>

</html>