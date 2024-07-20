<?php 
session_start(); 
if (!isset($_SESSION['username'])) { 
    echo "<script>alert('Unauthorized  Access!!!');window.location='../../../index.php'</script>"; 
} 
include_once('../dbconfig/dbcon.php'); 
include_once('common_functions.php'); 
?>

<!DOCTYPE html> 
<html lang="en" class="no-js"> 
<!--<![endif]--> 
<!-- BEGIN HEAD -->  
<head> 
    <meta charset="utf-8" /> 
    <title>E-DAR</title> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta content="width=device-width, initial-scale=1" name="viewport" /> 
    <meta content="" name="description" /> 
    <meta content="" name="author" />  
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Khand:300,400,500,600,700&amp;subset=devanagari" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../../new_eta/assets/global/plugins/js_glow/jquery.jgrowl.css" type="text/css" /> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- <link href="../../../new_eta/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"> -->
    <link href="../../new_eta/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../../new_eta/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../new_eta/assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link rel="stylesheet" type="text/css" href="../../new_eta/assets/global/plugins/select2/select2.css" /> 
    <link href="../../new_eta/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="../../new_eta/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../new_eta/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="../../new_eta/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="../../new_eta/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES --> 
    <link href="../../new_eta/assets/global/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../new_eta/assets/global/plugins/jquery-datatable/style.css"> 
    <link rel="stylesheet" href="../../new_eta/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"> 
    <link rel="stylesheet" href="../../new_eta/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"> 
    <!-- summer note css file --> 
    <link href="../../new_eta/assets/summernote/dist/summernote.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../../new_eta/assets/css/preloader/preloader-style.css"> 
    <link rel="shortcut icon" href="../../new_eta/assets/img/logo1.png" /> 
</head>

<style type="text/css"> 
    .pre-loader { 
        background-color: #ffff; 
        /*background-image: url("img/abc.gif");*/ 
        position: fixed; 
        background-repeat: no-repeat; 
        background-position: center; 
        height: 100%; 
        width: 100%; 
        left: 0; 
        top: 0; 
        z-index: 10000000; 
    } 
    .billunitindex { 
        z-index: 9;
    } 
    .pre-otploader {
        background-color: #ffff; 
        background-image: url("../../new_eta/assets/img/loader-2.gif"); 
        position: fixed; 
        background-repeat: no-repeat; 
        background-position: center; 
        height: 100%; 
        width: 100%; 
        left: 0; 
        top: 0; 
        z-index: 10000000; 
    } 
    .btn-orange-moon { 
        background: #FF416C; 
        /* fallback for old browsers */ 
        background: -webkit-linear-gradient(to right, #FF416C, #FF4B2B); 
        /* Chrome 10-25, Safari 5.1-6 */ 
        background: linear-gradient(to right, #FF416C, #FF4B2B); 
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ 
        color: #fff; 
        /*border: 3px solid #eee;*/ 
    } 
    .modal-width { 
        width: 100% !important; 
        max-width: 700px; 
        left: 45% !important; 
    } 
    .loginas { 
        margin-top: 5px; 
        margin-right: 10px; 
    } 
    .loginas li { 
        list-style: none; 
    } 
    .loginas li a { 
        color: #fff; 
    } 
</style>
 
<body class="page-header-fixed page-quick-sidebar-over-content page-style-square page-sidebar-closed">
    <!-- BEGIN HEADER --> 
    <div class="page-header navbar navbar-fixed-top"> 
        <!-- BEGIN HEADER INNER --> 
        <div class="pre-loader preloader-single shadow-inner mg-t-30" id="loader"> 
            <div class="ts_preloading_box"> 
                <div id="ts-preloader-absolute30"> 
                    <!-- <div id="absolute30"> 
                        <span></span><span></span><span></span><span></span><span></span> 
                    </div>  -->
                </div> 
            </div> 
        </div> 
        <div class="pre-otploader" id="otp_loader" style="display:none;"> 
        </div> 
        <div class="page-header-inner"> 
            <!-- BEGIN LOGO --> 
            <div class="page-logo"> 
                <a href="index.php"> 
                    <h4>E-Dar</h4> 
                </a> 
                <div class="menu-toggler sidebar-toggler hide"> 
                    <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header --> 
                </div> 
            </div> 
            <!-- END LOGO --> 
            <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a> 
            <!-- END RESPONSIVE MENU TOGGLER --> 
            <!-- BEGIN TOP NAVIGATION MENU --> 
            <div class="top-menu"> 
                <ul class="nav navbar-nav pull-right"> 
                    <!-- BEGIN USER LOGIN DROPDOWN --> 
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte --> 
                    <li class="dropdown dropdown-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<?php
							if (empty($result['img'])) {
							?>
								<img alt="" class="img-circle" src="../../new_eta/assets/admin/layout/img/avatar3_small.jpg" />
							<?php
							} else {
							?>
								<img alt="" class="img-circle" src="../../hrms/images/profile/<?php echo $_SESSION['profile_image']; ?>" />
							<?php
							}
							?>
							<span class="username username-hide-on-mobile">
								<span class="empname" style="color: floralwhite;">
									<?php
									if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
										echo $_SESSION['user'];
									} else {
										$query = mysqli_query($db_common, "SELECT `name` FROM `register_user` WHERE `emp_no` = '" . $_SESSION['emp_id'] . "'");
										$row = mysqli_fetch_array($query);
										echo $row['name'];
									}
									?>
								</span>
							</span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="../../dashboard.php">
									<i class="fas fa-home"></i> Home
								</a>
							</li>
							<li>
								<a href="../../profile.php">
									<i class="fas fa-user"></i> Profile
								</a>
							</li>
							<li>
								<a href="../../Logout.php">
									<i class="fas fa-sign-out-alt"></i> Log Out
								</a>
							</li>
						</ul>
					</li>
                </ul> 
                <ul class="loginas pull-right"> 
                    <li><a class="btn btn-info" data-toggle="modal" onClick="modu('dar')" href="#" data-target="#myModal"><i class="fas fa-sign-in-alt"></i> Login As</a></li>
                </ul> 
                <div id="myModal" class="modal modal-width fade modal-scroll" data-replace="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-header btn-orange-moon"> 
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button> 
                        <h4 class="modal-title" style="text-align:center">Login As</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <form action="../../../../redi_module.php" method="POST" class="horizontal-form"> 
                            <div class=""> 
                                <div class="row"> 
                                    <div id="rad">  </div> 
                                </div> 
                                <div class=""> 
                                    <button type="submit" class="btn btn-success">Go!</button> 
                                </div> 
                            </div> 
                        </form> 
                    </div> 
                </div> 
            </div> 
            <!-- END TOP NAVIGATION MENU --> 
        </div> 
        <!-- END HEADER INNER --> 
    </div> 
    <!-- END HEADER -->

    <?php

    $current_role = $_SESSION['role'];

    // echo $current_role;

    if ($current_role == 1) {

        include_once("sidebar_admin.php");

    } else if ($current_role ==  2) {

        include_once("sidebar_clerk.php");

    } else if ($current_role == 3) {

        // Disipline authority

        include_once("sidebar_da.php");

    } else if ($current_role == 4) {

        // Inquiry Officer

        include_once("sidebar_io.php");

    } else if ($current_role == 5) {

        // Presenting Officer

        include_once("sidebar_po.php");

    } else if ($current_role == 6) {

        // competent officer

        include_once("sidebar_co.php");

    } else {

        // Employee

        include_once("sidebar_emp.php");

    }
 
    ?>