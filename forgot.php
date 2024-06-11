<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->
    <!-- Custome css -->
    <link rel="stylesheet" href="dist/css/custome.css">
    <link rel="stylesheet" href="dist/css/responsive.css">
    <link rel="icon" type="image/png" href="dist/img/logo1.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


</head>

<body class="hold-transition login-page">
    <div class="forgot-sec">
        <div class="row">
            <!--<div class="login-logo col-md-4 col-lg-4 col-sm-4 hidden-xs text-center">
          <img src="dist/img/login/logo.png" alt="E Pension Booklet Logo">
          <h3>CENTRAL RAILWAY</h3>
          <div class="divider"></div>
          <h4>SOLAPUR DIVISION</h4>
          <p>HRMS</p>
          <p>Human Resource Management System</p>
        </div>-->
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="login-logo text-center">
                    <img src="dist/img/login/logo.png" alt="E Pension Booklet Logo">
                    <p><b>RailSathi</b></p>
                    <p>Human Resource Management System</p>
                </div>
                <div class="login-box">
                    <div class="login-box-body login-form bg-transparent text-center">
                        <h3>FORGOT PASSWORD</h3>
                        <div class="divider"></div>
                        <div class="clearfix"></div>
                        <p class="login-box-msg">We just need your registered User Name to send your password reset OTP
                        </p>
                        <form method="POST" action="forgot-pass.php" autocomplete="off">
                            <div class="form-group">
                                <input type="username" class="form-control" name="pf_no" id="pf_no"
                                    placeholder="PF Number" autofocus>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-md-6 submit-btn text-center">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset
                                        Password</button>
                                </div>
                                <div class="col-xs-6 col-md-6 submit-btn text-right">
                                    <div class="checkbox icheck forgot-text">
                                        <a href="index.php">Login</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <!-- <script src="../../plugins/iCheck/icheck.min.js"></script> -->

</body>

</html>