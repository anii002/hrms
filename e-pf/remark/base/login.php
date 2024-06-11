<?php 
session_start();
	  include('config.php');
		// dbcon(); 
		 //dbcon1(); 
		?>
		<html>
		<head>
		
		</head>
		<body style="background-color:white;">
		<?php
			
		$username = $_POST['username'];
		$password = $_POST['password'];
			 // $password1 = 'epf@sur';
		 // $hash=hashPassword($password1, SALT1, SALT2);
		// echo "Hashpassword".$hash;
		
		/*................................................... Admin .....................................................*/
		$query = "SELECT * FROM tbl_login WHERE username='$username' AND password='".hashPassword($password, SALT1, SALT2)."'";
		
		$result = mysql_query($query)or die(mysql_error());
		// echo "SELECT * FROM tbl_login WHERE username='$username' AND password='".hashPassword($password, SALT1, SALT2)."'";mysql_error();
		$row = mysql_fetch_array($result);
		$num_row = mysql_num_rows($result);
		
		// echo "<br>".$num_row;
// echo $row['username'];		
// echo $row['adminid'];		
		if( $num_row > 0 ) 
		{ 
		    session_start();
			session_regenerate_id();
			$_SESSION['id']=$row['adminid'];
			$id=$_SESSION['id'];
			$adminusername=$row['username'];
			// $member = mysql_fetch_array($result);
			// $_SESSION['SESS_MEMBER_ID'] = $row['adminid'];
			// $_SESSION['SESS_ADMIN_FULLNAME'] = $row['adminname'];
			// $_SESSION['SESS_MEMBER_NAME'] = $row['username'];
			// $_SESSION['SESS_ADMIN_NAME']=$adminusername;
			// $_SESSION['set_update_pf']='';
			// $_SESSION['same_pf_no']='';
			
			
			session_write_close();

		echo '<script>
		alert("You have successfully logged in");window.location="afterlogin.php";
		</script>';
		}else{
		
		echo '<script>
		alert("Please check Username OR Password");window.location="index.php";
		</script>';
		}
		

		?>
		</body>
		</html>