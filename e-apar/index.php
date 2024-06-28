<?php
	//Start session
	session_start();
	if($_SESSION['UserName'] != 'Employee')
	{
	    echo "<script>
	        alert('Unauthorized access');
	        window.location = '../index.php';
	        </script>
	    ";
	}
	else
	{
	    echo "<script>
	        alert('Unauthorized access');
	        window.location = '../index.php';
	        </script>
	    ";
	}
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_ADMIN_NAME']);
	unset($_SESSION['SESS_MEMBER_NAME']);
	
	include('main/dbconfig/dbcon.php');
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
	<title> E - APAR </title>
	
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="railway application,E-APAR,Appraisal Project, government projects " name="viewport" keyword="">
	
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="main/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="xml" href="sitemap.xml">
  
	<!-- notification  -->
	<link rel="stylesheet" href="main/plugins/jGrowl/jquery.jgrowl.css"  media="screen"/>
	<script src="main/plugins/jGrowl/jquery-1.9.1.min.js"></script>
	<script src="main/plugins/jGrowl/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="main/plugins/jGrowl/jquery.jgrowl.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="main/plugins/font-awesome.min.css">
	
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="main/plugins/dist/css/AdminLTE.min.css">
	
	<!-- iCheck -->
	<link rel="stylesheet" href="main/plugins/iCheck/square/blue.css">

	<!--<link rel="icon" href="main/resources/admin/Image.png" type="image/x-icon">-->
	<link rel="shortcut icon" href="../../hrms/new_eta/assets/img/logo1.png">

<script>

</script>

</head>

<body class="login-layout" style="background:url('meteowrshower22.jpg') no-repeat fixed;">

		<?php
		if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
		}
		?>


<div class="login-box" style="margin-left:70px;">
  <div></div>
  <div class="login-logo">
    <a href="index.php" style="color:white;"><h1><b >e</b> - APAR </h1><h4></h4></a>
  </div>
  <!-- /.login-logo -->
<?php 
	include('login_form.php');
	//include('script-jgrowl.php');
 ?>
</div>

</body>
</html>
