<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" style="background:#b5e4d5;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> E-Grievance </title>
    <script src="main/vendors/jquery/dist/jquery.min.js"></script>
    <script src="main/css/build/css/sweetalert.min.js"> </script>

    <!-- Bootstrap -->
    <link href="main/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="main/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="main/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="main/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="main/css/build/css/custom.min.css" rel="stylesheet">
    <link href="main/css/build/css/sweetalert.css" rel="stylesheet">
    <style>
    .login {
        background-color: skyblue;
    }

    form {

        background-color: #fff;
        border-radius: 20px;
    }
    </style>
</head>

<body class="login">

    <div>
        <div class="login_wrapper">
            <div class="animate form login_form" style="color:black;">

                <section class="login_content">
                    <form method="post" id="login_form" class="form-horizontal"
                        style="border:1px solid; border-color:#6666FF; position:absolute; width:95%;margin-top:15%;">

                        <h2 style="font-family:Cambria; font-size:26px;"><b>E-Grievance </b><br> </h2>
                        <div>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username"
                                required=""
                                style="font-family:Cambria; border-radius: 10px; font-size:16px; margin-top: 20px; width: 80%; margin-left: 10%;margin-top:25px;" />
                        </div>
                        <div>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" required=""
                                style="font-family:Cambria; border-radius: 10px; font-size:16px; width: 80%; margin-left: 10%; margin-top:25px;" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block" href="main/index.php"
                                style="font-family:Cambria; font-size:16px; border-radius: 10px; margin-left: 88px; margin-top: 35px; width: 50%;">
                                Log in</button>

                            <!--a class="reset_pass" href="forgot_password.php" style="font-family:Cambria; font-size:14px;">Forget your password?</a-->
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <p style="font-family:Cambria; font-size:16px;">©2017 All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                    <script>
                    jQuery(document).ready(function() {
                        jQuery("#login_form").submit(function(e) {
                            e.preventDefault();
                            var formData = jQuery(this).serialize();
                            $.ajax({
                                type: "POST",
                                url: "login.php",
                                data: formData,
                                success: function(html) {
                                    if (html == 'admin') {
                                        swal({
                                            html: true,
                                            title: "<span style='font-family:Cambria;'>Login Successfull!</span>",
                                            text: "<span style='font-family:Cambria; font-size:22px;'>Welcome</span>",
                                            imageUrl: "main/css/assets/img/Thumbs_up.png",
                                            showConfirmButton: false
                                        })
                                        var delay = 2000;
                                        setTimeout(function() {
                                                window.location = 'main/'
                                            },
                                            delay);

                                    } else {
                                        swal({
                                            html: true,
                                            title: "<span style='font-family:Cambria;'>Something went wrong!</span>",
                                            text: "<span style='font-family:Cambria; font-size:20px;'>Username or Password is incorrect</span>",
                                            imageUrl: "main/css/assets/img/Thumbs_down.png",
                                            confirmButtonColor: "red",
                                            confirmButtonFont: "cambria",
                                            confirmButtonText: "Retry Again...",
                                            showConfirmButton: true
                                        })
                                    }
                                }
                            });
                            return false;
                        });
                    });
                    </script>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="main/">Submit</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i></h1>
                                <p>©2017 All Rights Reserved. </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>