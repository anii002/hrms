<?php
session_start();
if (!isset($_SESSION['user'])) {
	echo "<script>alert('Unauthorized  Access!!!');window.location='index.php'</script>";
}

include('../dbconfig/dbcon.php');


?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>EIMS</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/> -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Khand:300,400,500,600,700&amp;subset=devanagari" rel="stylesheet">
	<!-- <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/> -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
	<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<link href="../assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<link rel="stylesheet" type="text/css" href="../assets/global/plugins/select2/select2.css" />
	<!-- Datatable css-->
	<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />

	<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />
	<!-- BEGIN PAGE STYLES -->
	<link href="../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
	<link href="../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
	<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->

	<link rel="stylesheet" href="../assets/other/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="../assets/other/plugins/datepicker/datepicker3.css">

	<link rel="stylesheet" href="../assets/css/preloader/preloader-style.css">
	<link rel="shortcut icon" href="../assets/img/logo1.png" />
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
</style>

<body class="page-header-fixed page-quick-sidebar-over-content page-style-square">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="pre-loader preloader-single shadow-inner mg-t-30">
			<div class="ts_preloading_box">
				<div id="ts-preloader-absolute30">
					<div id="absolute30">
						<span></span><span></span><span></span><span></span><span></span>
					</div>
				</div>
			</div>
		</div>
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.php">

					<h4>EIMS</h4>
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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<?php
							$con = dbcon();
							$query = mysqli_query($con, "select img from employees where pfno='" . $_SESSION['user'] . "'");
							$result = mysqli_fetch_array($query);
							if ($result['img'] == "") {
							?>
								<img alt="" class="img-circle" src="../assets/admin/layout/img/avatar3_small.jpg" />
							<?php
							} else {
								echo "<img src='" . $result['img'] . "' class='user-image' ";
							}
							?>
							<span class="username username-hide-on-mobile">
								<span class="empname" style="color: floralwhite;">
									<?php echo $_SESSION['user']; ?>
								</span>
							</span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<?php
							if ($GLOBALS['flag'] == "5.2") {
							?>
								<li class="active">
								<?php } else { ?>
								<li>
								<?php }	?>
								<a href="profile.php">
									<i class="far fa-user"></i> My Profile </a>
								</li>
								<!-- <li class="divider">
						</li> -->
								<li>
									<a href="logout.php?val=1">
										<i class="fas fa-sign-out-alt"></i> Log Out </a>
								</li>
						</ul>
					</li>

				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END HEADER INNER -->
	</div>

	<!-- END HEADER -->