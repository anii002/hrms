<?php 
session_start();
if(!isset($_SESSION['admin_id']))
{
	echo "<script>alert('Unauthorized  Access!!!');window.location='../../../index.php'</script>";
}


include('../dbconfig/dbcon.php');
include('control/function.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>CGA</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Khand:300,400,500,600,700&amp;subset=devanagari" rel="stylesheet">  
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
<!-- Datatable css-->
<!-- <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" /> -->
<link href="../assets/other/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/other/plugins/jquery-datatable/style.css">

<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- icons -->
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<!-- Bootstrap -->
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css">
<link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"> -->

<!-- profile css -->
<link href="../assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- select2 -->
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/select2/select2.css"/>
<!-- BEGIN PAGE STYLES -->
<link href="../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- components -->
<link href="../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>


    <link rel="stylesheet" href="../assets/other/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="../assets/other/preloader-style.css">

<link rel="shortcut icon" href="../assets/img/logo1.png"/>

<style type="text/css">
	.modal-width {
    width: 100% !important;
    max-width: 700px;
    left: 45% !important;
}

.pre-loader {
    /*background-color: #ffff;*/
    /*background-image: url("../assets/img/395.gif");*/
    position: fixed;
    background-repeat:no-repeat;
  background-position:center;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    z-index: 10000000;
}

.loginas{
  margin-top: 5px;
  margin-right: 10px;
}
.loginas li{list-style: none;}
.loginas li a{color: #fff;}

.btn-orange-moon{
  background: linear-gradient(to right, #FF416C, #FF4B2B);
    color: #fff;
}
</style>
</head>



<body class="page-header-fixed page-quick-sidebar-over-content page-style-square"> 
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.php">
			<!-- <img src="../assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/> -->
			<!-- <img src="../assets/img/logo1.png" class="img-circle" style="width: 55px;padding-top: 5px;padding-left: 5px;"> -->

			<h4 style='width:300px'>Compassionate Ground Appointment</h4>
			</a>
			<div class="menu-toggler sidebar-toggler hide">

				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<?php
							dbcon1(); 
							$query = mysql_query("SELECT img from login where username='".$_SESSION['username']."'");
							$result = mysql_fetch_array($query);
							if(!isset($_SESSION['profile_image']))
							{
						?>
			              <img alt="" class="img-circle" src="../assets/admin/layout/img/avatar3_small.jpg"/>
						  <?php 
							}
							else
							{ ?>
							<img alt="" class="img-circle" src="../../../images/profile/<?php echo $_SESSION['profile_image']; ?>" />
						<?php } ?>
					<!-- <img alt="" class="img-circle" src="../assets/admin/layout/img/avatar3_small.jpg"/> -->
					<span class="username username-hide-on-mobile"><?php echo getName($_SESSION['username']);?>
					 </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						
						<!-- <li class="divider">
						</li> -->
						<li>
							<a href="../../../index.php">
							<i class="fas fa-home"></i>Home</a>
						</li>
						<li>
							<a href="../../../profile.php">
							<i class="fas fa-user"></i>Profile</a>
						</li>
						<li>
							<a href="../../../Logout.php">
							<i class="fas fa-sign-out-alt"></i> Log Out </a>
						</li>
					</ul>

							<!--<ul class="loginas pull-right">
        	<li><a class="btn btn-warning" data-toggle="modal" onClick="modu('cga')" href="#myModal1">Login As</a></li>
				        </ul>-->

				</li>
			
			</ul>
			
			<ul class="loginas pull-right">
        	<li><a class="btn btn-info" data-toggle="modal" onClick="modu('cga')" href="#" data-target="#myModal"><i class="fas fa-sign-in-alt"></i> Login As</a></li>
       				 </ul>

		<div class="row">
       
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header btn-orange-moon">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                        <h4 class="modal-title" style="text-align:center">Login As</h4>
                    </div>
                    <div class="modal-body">
            
        
        <form action="../../../../redi_module.php" method="POST" class="horizontal-form">
           
            <div class="">
                <div class="row">
                    <div id="rad">				           
		  </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Go!</button>
                </div>
            </div>
            
               
        </form>
        </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--<div class="pre-loader preloader-single shadow-inner mg-t-30">-->
    <!--    <div class="ts_preloading_box">-->
    <!--        <div id="ts-preloader-absolute30">-->
    <!--             <div id="absolute30">-->
    <!--                <span></span><span></span><span></span><span></span><span></span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>

<!-- END HEADER -->