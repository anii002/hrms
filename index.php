<?php 
include_once("common/headerlogin.php"); 
// password_hash("Sachin@1234", PASSWORD_DEFAULT);
?>

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="login-logo">
            <img src="dist/img/login/logo.png" alt="E Pension Booklet Logo">
            <p><b>RailSathi</b></p>
            <p>Human Resource Management System</p>
        </div>
        <div class="login-box">
            <div class="login-box-body login-form bg-transparent text-center">
                <h3>LOGIN</h3>
                <div class="divider"></div>
                <div class="clearfix"></div>
                <p class="login-box-msg">Login Here Using Your PF number &amp; Password</p>
                <form method="POST" id="frmLogin" autocomplete="off">
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter PF Number" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter Password" required>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-md-4 submit-btn text-center">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <div class="checkbox icheck forgot-text">
                                <a href="forgot.php">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <div class="checkbox icheck forgot-text registerlink">
                                <p class="text-white">Don't have an account?<a href="Register.php"> Register now</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="copyrighttext">
            <p class="text-white">Design &amp; Developed by <a href="http://infoigy.com" target="_blank">Infoigy</a></p>
        </div>
    </div>
</div>

<?php include_once("./common/footerlogin.php"); ?>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Datepicker CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" rel="stylesheet" />

<!-- Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>

<!-- jGrowl JS -->
<script type="text/javascript" src="new_eta/assets/global/plugins/js_glow/jquery.jgrowl.js"></script>

<!-- jGrowl CSS -->
<link rel="stylesheet" type="text/css" href="new_eta/assets/global/plugins/js_glow/jquery.jgrowl.css" />

<script>
$(document).ready(function() {
    // Initialize Select2
    // $('#username').select2();

    // // Initialize Datepicker
    // $('#password').datepicker();

    $("#frmLogin").submit(function(e) {
        e.preventDefault();
        var postData = new FormData($(this)[0]);
        postData.append("Flag", "Login");

        try {
            $.ajax({
                url: "./operations/LoginOperations.php",
                type: "POST",
                data: postData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    // console.log(data);
                    // var Response = JSON.parse(data); // Pass the 'data' variable to JSON.parse()
                    // console.log(Response);
                    // console.log(data, textStatus);

                    if (data.res === "success" || data.res === "superadmin") {

                        $.jGrowl("Loading... Please Wait...", {
                            sticky: true
                        });
                        $.jGrowl(" Welcome to HRMS", {
                            header: 'Access Granted'
                        });
                        console.log(data.pf);
                        var delay = 1500;
                        setTimeout(function() {
                            if (data.res === "superadmin") {
                                window.location = 'super_admin_dashboard.php';
                            } else {
                                window.location = 'dashboard.php';
                            }
                        }, delay);
                    } else if (data.res === "not_found") {
                        $.jGrowl(
                            "Please check your username, password, or user not registered with HRMS Module", {
                                header: 'Login Failed'
                            });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error:", errorThrown);
                    // Handle AJAX errors here
                    $.jGrowl("An error occurred while processing your request", {
                        header: 'Error'
                    });
                }
            });
        } catch (error) {
            console.error("An unexpected error occurred:", error);
            // Handle unexpected errors here
            $.jGrowl("An unexpected error occurred", {
                header: 'Error'
            });
        }
    });
});
</script>