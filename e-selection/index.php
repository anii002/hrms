<?php
	//Start session
	session_start();
	session_destroy();
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_ADMIN_NAME']);
	unset($_SESSION['SESS_MEMBER_NAME']);
	
	include('dbconfig/dbcon.php');
	dbcon(); 
?>
 <?php

// Désactiver le rapport d'erreurs
error_reporting(0);

// Rapporte les erreurs d'exécution de script
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Rapporter les E_NOTICE peut vous aider à améliorer vos scripts
// (variables non initialisées, variables mal orthographiées..)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Rapporte toutes les erreurs à part les E_NOTICE
// C'est la configuration par défaut de php.ini
error_reporting(E_ALL & ~E_NOTICE);

// Reporte toutes les erreurs PHP (Voir l'historique des modifications)
error_reporting(E_ALL);

// Reporte toutes les erreurs PHP
error_reporting(-1);

// Même chose que error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="eapar" language="en">
	<title>SELECTION CALENDER</title>
	
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="railway application,E-APAR,Appraisal Project, government projects " name="viewport" keyword="">
	
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<link rel="xml" href="sitemap.xml">
  
	<!-- notification  -->
	<link rel="stylesheet" href="plugins/jGrowl/jquery.jgrowl.css"  media="screen"/>
	<script src="plugins/jGrowl/jquery-1.9.1.min.js"></script>
	<script src="plugins/jGrowl/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="plugins/jGrowl/jquery.jgrowl.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/font-awesome.min.css">
	
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="plugins/dist/css/AdminLTE.min.css">
	
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/square/blue.css">

	<!--ink rel="icon" href="main/resources/admin/Image.png" type="image/x-icon"-->

<script>

</script>

</head>

<body class="login-layout" style="background-color:#A9DFBF;">



<div class="login-box">
  <div class="login-logo">
    <a href="index.php" style="color:#DC7633;"><h1><b>SELECTION CALENDER</b></h1></a>
  </div>
            
  <div class="login-box-body " style="background: #97bebf;">
    <h3 class="login-box-msg" style="padding:10px; border-radius:20px;">Sign-In to start your session</h3><br>

    <form  id="login_form" method="post" role="form" action="login.php">
	<div class="form-group ">
        <select class="form-control" name="zone" placeholder="select-zone" style="border:0px; border-radius:2px">
		<option>Select Zone</option>
		<option>Central Railway</option>
		</select>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  <div class="form-group ">
        <select class="form-control" name="division" placeholder="select-division" style="border:0px;  border-radius:2px">
		<option>select-division</option>
		<option>Mumbai</option><
		<option>Pune</option>
		<option>Bhusaval</option>
		<option>Nagpur</option>
		
		</select>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" style="border-radius:2px" placeholder="User Name" name="username" maxlength="20" id="username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" style="border-radius:2px" placeholder="Password" name="password" maxlength="20" id="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row form-group has-feedback">
        <div class="col-xs-12">
         
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
			<button type="submit" data-placement="top" title="Click Here to Sign In" id="signin" name="login" class="btn btn-primary btn-block  btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 
				<script type="text/javascript">
				$(document).ready(function(){
				$('#signin').tooltip('show');
				$('#signin').tooltip('hide');
				});
				</script>	
    <!--a href="register.php" class="text-center">Register a new membership</a-->

  </div>
  
     <label style="color:white;">Designed & Developed by <b style="color:#f39c12;"> SALGEM INFOIGY TECH PVT LTD</b></label>
			
</div>

</body>
</html>
