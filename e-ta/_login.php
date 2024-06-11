<?php
	  include('dbconfig/dbcon.php');
		session_start();
		$username = $_POST['txtuser'];
		$password = $_POST['txtpass'];
		
		/*................................................... Employees .....................................................*/
		$query = "SELECT * FROM employees WHERE pfno='$username'";
		$result = mysql_query($query) or die(mysql_error());
		$value = mysql_fetch_array($result);
		if($value['first_login']==0)
		{
			$query = "SELECT * FROM employees WHERE pfno='$username' AND psw='".$password."'";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$_SESSION['empid']=$row['pfno'];
				echo "<script>alert('Change password first');window.location='otp.php';</script>";
			}
		}
		else
		{
			$query = "SELECT * FROM employees WHERE pfno='$username' AND psw='".hashPassword($password,SALT1,SALT2)."'";
		}
		$result = mysql_query($query) or die(mysql_error());
		$cnt = 0;
		while($row = mysql_fetch_array($result))
		{
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['id']=$row['id'];
				$_SESSION['empid']=$row['pfno'];
				$_SESSION['desig'] = $row['desig'];
				$cnt++;
		}
		
		if($cnt>0)
		{
			$query_audit = "insert into audit_table(empid,action,message) values('".$username."','Login','Employee logged in successful')";
		$result_audit = mysql_query($query_audit);
			echo "<script>window.location='public/employees/index.php';</script>";
		}
		else
		{
				/*................................................... Admin .....................................................*/
				$query = "SELECT * FROM employees where pfno in (select empid from users WHERE username='$username' AND password='".hashPassword($password,SALT1,SALT2)."' AND status='1')";
				echo "<script>alert('SELECT * FROM employees where pfno in (select empid from users WHERE username='$username' AND password='".hashPassword($password,SALT1,SALT2)."' AND status='1')');</script>";
				$result = mysql_query($query);
				$inner_query = mysql_query("select * from users WHERE username='$username'");
					$result_set = mysql_fetch_array($inner_query);
				$cnt = 0;
				//echo $query;
				while($row = mysql_fetch_array($result))
				{
					
					$_SESSION['role'] = $result_set['role'];
						$_SESSION['admin_username']=$username;
						$_SESSION['admin_name']=$row['name'];
						$_SESSION['admin_id']=$row['id'];
						$_SESSION['empid']=$row['pfno'];
						$cnt++;
				}
				
				if($cnt>0)
				{
					$query_audit = "insert into audit_table(empid,action,message) values('".$username."','Login','User logged in successful')";
				$result_audit = mysql_query($query_audit);
					//echo "<script>alert($username);</script>";
					if($username == "admin")
					
						echo "<script>window.location='public/admin/index.php';</script>";
					else
						echo "<script>window.location='public/users/index.php';</script>";
				}
				else
				{
					$query_audit = "insert into audit_table(empid,action,message) values('".$username."','Login','Login failed')";
					$result_audit = mysql_query($query_audit);
					$_SESSION['message']="Login Failed!!!<br>Please check username or password<br> or contact Administrator";
					echo "<script>window.location='index.php';</script>";
				}
			}
?>
