<?php
      
	  include('main/dbconfig/dbcon.php');
		dbcon(); 
		?>
		<html>
		<head>
		<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="jquery.jgrowl.js"></script>
		<link rel="stylesheet" href="jquery.jgrowl.css" type="text/css"/>
		</head>
		<body style="background-color:gray;">
		<?php
		session_start();	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		/*................................................... Admin .....................................................*/
		$query = "SELECT * FROM tbl_login WHERE username='$username' AND password='".hashPassword($password, SALT1, SALT2)."'";
		$result = mysql_query($query)or die(mysql_error());
		$row = mysql_fetch_array($result);
		$num_row = mysql_num_rows($result);
			
		/*................................................... User ..............................................*/
		$query_staff = mysql_query("SELECT * FROM tbl_user WHERE username='$username' AND password='".hashPassword($password, SALT1, SALT2)."'")or die(mysql_error());
		$num_row_staff = mysql_num_rows($query_staff);
		$row_staff = mysql_fetch_array($query_staff); 
		
		
		/*................................................... Employee ..............................................*/
		$query_employee = mysql_query("SELECT * FROM tbl_employee WHERE (emplcode='$username' AND pan='$password') or (emplcode='$username' AND password='$password')")or die(mysql_error());
		$num_row_employee = mysql_num_rows($query_employee);
		$row_employee = mysql_fetch_array($query_employee); 
		

		
		if( $num_row > 0 ) 
		{ 
			session_regenerate_id();
			$_SESSION['id']=$row['adminid'];
			$adminusername=$row['username'];
			//echo "$username";
			//$member = mysql_fetch_assoc($result);
			$member = mysql_fetch_array($result);
			$_SESSION['SESS_MEMBER_ID'] = $row['adminid'];
			$_SESSION['SESS_ADMIN_FULLNAME'] = $row['adminname'];
			$_SESSION['SESS_MEMBER_NAME'] = $row['username'];
			$_SESSION['SESS_ADMIN_NAME']=$adminusername;
			
			
			session_write_close();
			
			mysql_query("insert into tbl_userlog (username,login_startdate,admin_id,status)values('$username',NOW(),".$row['adminid'].",1)")or die(mysql_error());
			echo '<script>
			$.jGrowl("You have successfully logged in",{life : 200 , close : function(e,m){window.location="main/admin/index.php";}});
			</script>';
		}else if ($num_row_staff > 0)
			{
				session_regenerate_id();
				$_SESSION['staff']=$row_staff['userid'];
				$member1 = mysql_fetch_assoc($result);
				$_SESSION['SESS_USER_ID'] = $row_staff['userid'];
				$_SESSION['SESS_USER_NAME'] = $row_staff['fullname'];
				$_SESSION['SESS_MEMBER_NAME']=$username;
				$_SESSION['Department']=$row_staff['dept'];
				$_SESSION['Access_level']=$row_staff['accesslevel'];

				$sql_query=mysql_query("select * from tbl_user where username='$username'");
				while($rwUser=mysql_fetch_array($sql_query))
				{
					$status=$rwUser["status"];
				}
				if($status=='0')
				{
					echo "<script>window.location='main/user/userregister.php';</script>";
				}else
			{
				session_write_close();
			  mysql_query("insert into tbl_userlog(username,login_startdate,staffid,status)values('$username',NOW(),".$row_staff['userid'].",1)")or die(mysql_error());
				
				echo "<script>
				alert('You Have logged in!!!!!');
				window.location='main/user/index.php';
				</script>";
			}
			}else if ($num_row_employee > 0)
			{
				if($row_employee['pan']==$password)
				{
					$_SESSION['EMP_PF_NO']=$row_employee['emplcode'];
					$_SESSION['employee']=$row_employee['empid'];
					$_SESSION['SESS_EMPLOYEE_ID'] = $row_employee['empid'];
				$_SESSION['SESS_EMPLOYEE_NAME'] = $row_employee['empname'];
				$_SESSION['SESS_MEMBER_NAME']=$username;
				$_SESSION['EMP_PF_NO']=$row_employee['emplcode'];
				$_SESSION['SESS_YEAR']=$row_employee['year'];
				$_SESSION['Access_level']="none";
					echo "<script>alert('User need to change password...');window.location='main/user/changePassword.php';</script>";
				}
				session_regenerate_id();
				$_SESSION['employee']=$row_employee['empid'];
				$member1 = mysql_fetch_assoc($result);
				$_SESSION['SESS_EMPLOYEE_ID'] = $row_employee['empid'];
				$_SESSION['SESS_EMPLOYEE_NAME'] = $row_employee['empname'];
				$_SESSION['SESS_MEMBER_NAME']=$username;
				$_SESSION['EMP_PF_NO']=$row_employee['emplcode'];
				$_SESSION['SESS_YEAR']=$row_employee['year'];
				$_SESSION['Access_level']="none";
				
				$emppfno = $row_employee['emplcode'];
				//echo $emppfno;
				
				session_write_close();
			  mysql_query("insert into tbl_userlog(username,login_startdate,employeeid,status)values('$username',NOW(),".$row_employee['empid'].",1)")or die(mysql_error());
				
				echo "<script>
				alert('You Have logged in!!!!!');
				window.location='main/user/frmemployeedetails.php';
				</script>";
			}
			else
				{ 
						echo "<script>
						alert('Please check your username and password!!!!!');
						window.location='index.php';
						</script>";
				}	
		

		?>
		</body>
		</html>