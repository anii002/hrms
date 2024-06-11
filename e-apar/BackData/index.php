<?php
	//Start session
	session_start();
	
	include('main/dbconfig/dbcon.php');
	dbcon();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_MEMBER_NAME']);
	unset($_SESSION['SESS_ADMIN_NAME']);
	 
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>:: E - APAR ::</title>
	
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="main/plugins/bootstrap/css/bootstrap.min.css">
  
	<!-- notification  -->
	<link rel="stylesheet" href="main/plugins/jGrowl/jquery.jgrowl.css"  media="screen"/>
	<script src="main/plugins/jGrowl/jquery-1.9.1.min.js"></script>
	<script src="main/plugins/jGrowl/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="main/plugins/font-awesome.min.css">
	
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="main/plugins/dist/css/AdminLTE.min.css">
	
	<!-- iCheck -->
	<link rel="stylesheet" href="main/plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition login-page" style="background:url('meteowrshower22.jpg')">

		<?php
		if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
		}
		?>


<div class="login-box" >
  <div></div>
  <div class="login-logo">
    <a href="index.php" style="color:white;"><b style="color:white;">E</b> - APAR</a>
  </div>
  <!-- /.login-logo -->
<?php include('login_form.php'); ?>
</div>
<?php include('script-jgrowl.php'); ?>
</body>
</html>
