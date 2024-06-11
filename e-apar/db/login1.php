<?php
      
	  include('main/dbconfig/dbcon.php');
		dbcon(); 
		
		session_start();	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		/*................................................... Admin .....................................................*/
		$query = "SELECT * FROM tbl_login WHERE username='$username' AND password='$password'";
		$result = mysql_query($query)or die(mysql_error());
		$row = mysql_fetch_array($result);
		$num_row = mysql_num_rows($result);
			
		/*................................................... Staff ..............................................*/
		// $query_staff = mysql_query("SELECT * FROM tbl_user WHERE username='$username' AND password='$password'")or die(mysql_error());
		// $num_row_staff = mysql_num_rows($query_staff);
		// $row_staff = mysql_fetch_array($query_staff); 
		

		if( $num_row > 0 ) 
		{ 
			session_regenerate_id();
			$_SESSION['adminid']=$row['adminid'];
			$adminusername=$row['username'];
			//echo "$username";
			//$member = mysql_fetch_assoc($result);
			$member = mysql_fetch_array($result);
			$_SESSION['SESS_MEMBER_ID'] = $row['adminid'];
			$_SESSION['SESS_MEMBER_NAME'] = $row['username'];
			$_SESSION['SESS_ADMIN_NAME']=$adminusername;
			
			echo $_SESSION['SESS_ADMIN_NAME'];
			
			session_write_close();
			echo 'true_admin';
			
			mysql_query("insert into tbl_userlog (username,login_startdate,admin_id,status)values('$username',NOW(),".$row['adminid'].",1)")or die(mysql_error());
			echo '<script type="text/javascript">
			alert("You Have logged in!!!!!");
			window.location="main/admin/index.php";
			</script>';
		}
 		// else if ($num_row_staff > 0)
			// {
				// session_regenerate_id();
				// $_SESSION['staff']=$row_staff['userid'];
				// $member1 = mysql_fetch_assoc($result);
				// $_SESSION['SESS_MEMBER_ID'] = $row_staff['userid'];
				// $_SESSION['SESS_FIRST_TYPE'] = $row_staff['usertype'];
				// $_SESSION['SESS_MEMBER_NAME'] = $row_staff['fullname'];
				// $_SESSION['SESS_NAME']=$username;
				// session_write_close();
				//echo 'true_staff';
				// echo $_SESSION['SESS_MEMBER_ID'];
				// echo $_SESSION['SESS_FIRST_TYPE'];
				 // mysql_query("insert into tbl_userlog(username,login_startdate,staffid,status)values('$username',NOW(),".$row_staff['userid'].",1)")or die(mysql_error());
				
				// echo "<script>
			// alert('You Have logged in!!!!!');
			// window.location='clerk/index.php';
			// </script>";
				
			// }
			else
				{ 
						echo 'false';
				}	
		
		?>