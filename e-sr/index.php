<?php
	//Start session
	
	session_start();
	 error_reporting(0);
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_ADMIN_NAME']);
	unset($_SESSION['SESS_MEMBER_NAME']);
	
	
	include('dbconfig/dbcon.php');
	dbcon(); 
	
	if($_SESSION['name']=='guest')
	{
		unset($_SESSION['name']);
	}
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
	<title>SR MODULE</title>
	
	
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

<body class="login-layout" style="background:url('1.jpg') no-repeat fixed;">

		<?php
		if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
		}
		?>


<div class="login-box" style="margin-right:70px;">
  <div></div>
  <div class="login-logo">
    <a href="index.php" style="color:white;"><h1>e-SR MODULE<br>ई-एस आर मॉड्यूल</h1></a>
  </div>
  <!-- /.login-logo >
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '50%' // optional
    });
  });
</script-->              
  <div class="login-box-body" style="background: #0000002b;border-radius:15px;">
    <h3 class="login-box-msg" style="padding:10px;border-radius:15px;">Sign-In</h3><br>

    <form  id="login_form" method="post" role="form" action="login.php">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter Username" name="username" maxlength="20" style="border-radius:10px;" id="username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" style="border-radius:10px;" placeholder="Password" name="password" maxlength="20" id="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row form-group has-feedback">
        <!--div class="col-xs-12">
          <div class=" icheck">
            <label>
              <input type="checkbox">Remember Me
            </label>
          </div>
        </div-->
        <!-- /.col -->
        <div class="col-xs-12">
			<button type="submit" data-placement="top" title="Click Here to Sign In" id="signin" name="login" class="btn btn-primary btn-block  btn-flat" style="border-radius:15px;">Log In</button>
        </div>
		
		<br>
		<br>
		<center><a href="view_sr.php" style='color:white' class='pull'>View e-SR</a> &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; <a href="forget_pass.php" style='color:white'><span>Forget Password</span></a></center>
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
  
     <label style="color:white;">Designed & Developed by <b style="color:#ff3434d6;"> SALGEM INFOIGY TECH PVT LTD</b></label>
			<!--script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){			
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true_admin')
						{
							$.jGrowl("Loading File Please Wait......", { sticky: true });
							$.jGrowl(" Welcome to E-APAR", { header: 'Access Granted' });
							var delay = 1000;
							setTimeout(function(){ window.location = 'main/admin/index.php'  }, delay);  
						}else if(html=='true_staff')
						{
							$.jGrowl("Loading File Please Wait......", { sticky: true });
							$.jGrowl(" Welcome to E-APAR", { header: 'Access Granted' });
							var delay = 1000;
							setTimeout(function(){ window.location = 'main/user/index.php'  }, delay);  
						}else
						{
							$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
						}
					});
					return false;
				});
			});
			</script-->
  
</div>

</body>
</html>
