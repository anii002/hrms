<?php
// Start the session
session_start();
require('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>E-Grievance</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!--link href="responsive.css" rel="stylesheet" type="text/css" /-->
<!--script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--news alert files   -->
  
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
<link href="scripts/site.css" rel="stylesheet" type="text/css" />
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="scripts/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
  <!--news alert files end  -->
  
  
  
</head>
<body style="overflow-x:hidden;">
<!-- START PAGE SOURCE -->
<div class="main">
  <div class="header">
    <div class="header_resize" style="background:white">
      <div class="">
        <img src="images/logo2.jpg" class="img-responsive" style="">
      </div>
      <div class="clr"></div>
    </div>
  </div>
      <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">E-Grievance</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="feedback.php">Feedback</a></li>
             <?php
			if(isset($_SESSION['user']))
			{
				echo "<li><a href='add_grievance.php'><span>Add Grievance</span></a></li>";
				echo "<li><a href='griv_history.php'><span>History</span></a></li>";
				
				echo "
		  <li class='dropdown' style='float:right;'>
			<a href='#' class='dropdown-toggle'' data-toggle='dropdown'>".$_SESSION["empname"]."<b class='caret'></b></a>
			<ul class='dropdown-menu' style='min-width:80px;'>
			  <li><a href='profile.php'><span style='background:none;'><i class='fa fa-user' aria-hidden='true'></i>Profile</span></a></li>
			  <li><a href='logout.php'><span style='background:none;'><i class='fa fa-sign-out' aria-hidden='true'></i>Logout</span></a></li>
			</ul>
		</li>";
			
				
				
			}else{
				echo "<li><a href='registration.php'><span>Registration</span></a></li>";
				echo "<li><a href='griv_status.php'><span>Grievance Status</span></a></li>";
				echo "<li><a href='support.php'><span>Login</span></a></li>";
			}
		  ?>
            <li>
              
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse3">
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" />
              </div>
              <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </form>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    
  
  
  <!--div class="menu_nav text-center;" >
        <ul>
          <li class="active"><a href=""><span>Home</span></a></li>
         
          <li><a href=""><span>Feedback</span></a></li>
		    
        
		 
		 
		  
         
        </ul>
      </div-->
	  <div class="clr"></div>