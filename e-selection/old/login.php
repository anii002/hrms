<?php 
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
		<body style="background-color:gray;">
		<?php
		session_start();	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		/*................................................... Admin .....................................................*/
		$query = "SELECT * FROM login_table WHERE username='$username' AND password='$password'";
		$result = mysql_query($query)or die(mysql_error());
		$row = mysql_fetch_array($result);
		$num_row = mysql_num_rows($result);
		
		if($num_row>0) 
		{ 
			session_regenerate_id();
			$_SESSION['id']=$row['id'];
			$id=$_SESSION['id'];
			$adminusername=$row['username'];
			$member = mysql_fetch_array($result);
			$_SESSION['SESS_MEMBER_ID'] = $row['id'];
			$_SESSION['SESS_ADMIN_FULLNAME'] = $row['username'];
			$_SESSION['SESS_MEMBER_NAME'] = $row['username'];
			$_SESSION['SESS_ADMIN_NAME']=$adminusername;
			
			
			session_write_close();

			
		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
			<script type='text/javascript' src='plugins/jQuery/jquery.min.js'></script>							
					<script>
					$(document).ready(function(){ 
						swal({
							html: true,
							title: 'Login Successfull!',
							text: 'Welcome',				
							showConfirmButton:false
						})
					var delay = 500;
				setTimeout(function(){ 
					window.location = 'admin/index.php'  
					},
				delay);})</script>";		
		}
		
		else{
		/*................................................User Login.....................................................*/
	
 $query="select * from users where username='$username' AND password='$password'";
 $result=mysql_query($query)or die(mysql_error);
 $row=mysql_fetch_array($result);
 $num_row=mysql_num_rows($result);
  if($num_row>0)
  {
	  session_regenerate_id();
	  $_SESSION['id']=$row['id'];
	  $id=$_SESSION['id'];
	  $member = mysql_fetch_array($result);
			$_SESSION['SESS_MEMBER_ID'] = $row['id'];
			$_SESSION['SESS_USER_FULLNAME'] = $row['emp_name'];
			$_SESSION['pfno'] = $row['pf_no'];
			$_SESSION['SESS_USER_NAME']=$username;
			
			
			session_write_close();

		echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
			<script type='text/javascript' src='plugins/jQuery/jquery.min.js'></script>							
					<script>
					$(document).ready(function(){
						swal({
							html: true,
							title: 'Login Successfull!',
							text: 'Welcome',				
							 showConfirmButton:false,
							 })
					var delay = 500;
				setTimeout(function(){ 
					window.location = 'user/index.php'  
					},
				delay);})</script>";	
		}else{
			echo '<script>window.location="index.php";alert("Please Enter Correct USername And Password");</script>';
		}
			
		}	
			
		?>
		</body>
		</html>