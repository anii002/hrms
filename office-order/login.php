<?php 
session_start();
	  include('dbconfig/dbcon.php');
		dbcon(); 
		 //dbcon1(); 
		?>
		<html>
		<head>
		<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="plugins/js_glow/jquery.jgrowl.js"></script>
		<link rel="stylesheet" href="plugins/js_glow/jquery.jgrowl.css" type="text/css"/>
		</head>
		<body style="background-color:white;">
		<?php
			
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		/*................................online office order........................................*/
	
		/*................................online office order end........................................*/
		
		
		/*................................................... Admin .....................................................*/
		$query = "SELECT * FROM tbl_login WHERE username='$username' AND password='".hashPassword($password, SALT1, SALT2)."'";
		$result = mysql_query($query)or die(mysql_error());
		$row = mysql_fetch_array($result);
		$num_row = mysql_num_rows($result);
			
		if( $num_row > 0 ) 
		{ 
			//session_regenerate_id();
			$_SESSION['id']=$row['adminid'];
			$id=$_SESSION['id'];
			$adminusername=$row['username'];
			$member = mysql_fetch_array($result);
			$_SESSION['SESS_MEMBER_ID'] = $row['adminid'];
			$_SESSION['SESS_ADMIN_FULLNAME'] = $row['adminname'];
			$_SESSION['SESS_MEMBER_NAME'] = $row['username'];
			$_SESSION['SESS_ADMIN_NAME']=$adminusername;
			$_SESSION['set_update_pf']='';
			$_SESSION['same_pf_no']='';
			
			
			session_write_close();

		echo '<script>
		$.jGrowl("You have successfully logged in",{life : 200 , close : function(e,m){window.location="admin/online_office_order.php";}});
		</script>';
		}else{
		
		echo '<script>
		$.jGrowl("Please check Username OR Password",{life : 400 , close : function(e,m){window.location="index.php";}});
		</script>';
		}
		

		?>
		</body>
		</html>