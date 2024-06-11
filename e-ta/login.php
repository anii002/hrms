<?php
session_start();
	include('dbconfig/dbcon.php');
		
	$username = $_POST['txtuser'];
	$password = $_POST['txtpass'];
	$user_type = 0;			// 0 for Employee Login
	/*................................. Employees ...............................*/
	//$query = "SELECT * FROM employees WHERE pfno='$username'";
	$query = "SELECT * FROM employees WHERE binary pfno='$username' AND psw='".hashPassword($password,SALT1,SALT2)."'";
// 	echo "SELECT * FROM employees WHERE binary pfno='$username' AND psw='".hashPassword($password,SALT1,SALT2)."'";
	$result = mysql_query($query) or die(mysql_error());
	$value = mysql_fetch_array($result);
	if(mysql_affected_rows() > 0)
	{
		if($value['first_login']==0  && $value['status'] == 1)
		{
			// if()
			$query = "SELECT * FROM employees WHERE binary pfno='$username' AND 	psw='".hashPassword($password,SALT1,SALT2)."'";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$_SESSION['empid']=$row['pfno'];
				echo "<script>alert('Change password First'); window.location = 'otp.php'; </script>";
			}
		}
		else
		{
			//$query = "SELECT * FROM employees WHERE pfno='$username' AND psw='".$password."'";
			$result = mysql_query($query) or die(mysql_error());
			$status_check=-1;
			if(mysql_affected_rows() > 0)
			{
				while($row = mysql_fetch_array($result))
				{
					$_SESSION['username']=$row['name'];
					$_SESSION['name']=$row['name'];
					$_SESSION['id']=$row['id'];
					$_SESSION['empid']=$row['pfno'];
					$_SESSION['desig'] = $row['desig'];
					$_SESSION['billunit'] = $row['BU'];
					$BU = $row['BU'];
					$user_type = 0;
					$status_check=$row['status'];
				}
				$query_audit = "insert into audit_table(empid,action,message) values('".$username."','Login','Employee logged in successful')";
				$result_audit = mysql_query($query_audit);
				if($status_check == 1 )
				{
					echo "<script>window.location='public/personal_employee/index.php';</script>";
				}
				else{
						echo "<script>alert('Unauthorized access..');window.location='index.php';</script>";	
				}

				if($BU == '0107001' || $BU == '0107002' )
				{
					echo "<script>window.location='public/officers/index.php';</script>";
				}
				else 
				{
					echo "<script><script>alert('Unauthorized acces..');window.location='index.php';</script>";	
				}
				// if($BU == '0107001' || $BU == '0107002')
				// {
				// 	echo "<script>window.location='public/employees/index.php';</script>";
				// }
				// else{
				// 	echo "<script>window.location='public/officers/index.php';</script>";	
				// }
			}
		}
	}
	else
	{
		//............................. Admin .............................//
		$sql = "SELECT * FROM employees where pfno in (select empid from users WHERE username='$username' AND password='".hashPassword($password,SALT1,SALT2)."' AND status='1')";
		$res = mysql_query($sql);
		if(mysql_affected_rows() > 0)
		{
			$inner_query = mysql_query("select * from users WHERE username='$username'");
			$result_set = mysql_fetch_array($inner_query);
			while($row = mysql_fetch_array($res))
			{
				$role = $result_set['role'];
				if($result_set['role'] == '1'){
					$_SESSION['role'] = $result_set['role'];
					$_SESSION['admin_username']=$username;
					$_SESSION['username']=$username;
					$_SESSION['name']=$row['name'];
					$_SESSION['admin_name']=$row['name'];
					$_SESSION['admin_id']=$row['id'];
					$_SESSION['empid']=$row['pfno'];
				}
				else if($result_set['role'] == '0'){
					$_SESSION['role'] = $result_set['role'];
					$_SESSION['admin_username']=$username;
					$_SESSION['username']=$username;
					$_SESSION['name']=$row['name'];
					$_SESSION['admin_name']=$row['name'];
					$_SESSION['admin_id']=$row['id'];
					$_SESSION['empid']=$row['pfno'];
				}
				else if($result_set['role'] == '11'){
					$_SESSION['role'] = $result_set['role'];
					$_SESSION['dept']=$result_set['dept'];
					$_SESSION['admin_username']=$username;
					$_SESSION['username']=$username;
					$_SESSION['name']=$row['name'];
					$_SESSION['admin_name']=$row['name'];
					$_SESSION['admin_id']=$row['id'];
					$_SESSION['empid']=$row['pfno'];
				}
				else if($result_set['role'] == '12'){
					$_SESSION['role'] = $result_set['role'];
					$_SESSION['dept']=$result_set['dept'];
					$_SESSION['deptmt']=$row['dept'];
					$_SESSION['admin_username']=$username;
					$_SESSION['username']=$username;
					$_SESSION['name']=$row['name'];
					$_SESSION['admin_name']=$row['name'];
					$_SESSION['admin_id']=$row['id'];
					$_SESSION['id']=$row['id'];
					$_SESSION['empid']=$row['pfno'];
				}
				else if($result_set['role'] == '13'){
					$_SESSION['role'] = $result_set['role'];
					$_SESSION['dept']=$result_set['dept'];
					$_SESSION['admin_username']=$username;
					$_SESSION['username']=$username;
					$_SESSION['name']=$row['name'];
					$_SESSION['admin_name']=$row['name'];
					$_SESSION['admin_id']=$row['id'];
					$_SESSION['empid']=$row['pfno'];
				}
				else if($result_set['role'] == 'OS' || $result_set['role'] == 'BO' || $result_set['role'] == 'AP'){
					$_SESSION['role'] = $result_set['role'];
					$_SESSION['admin_username']=$username;
					$_SESSION['username']=$username;
					$_SESSION['name']=$row['name'];
					$_SESSION['admin_name']=$row['name'];
					$_SESSION['admin_id']=$row['id'];
					$_SESSION['id']=$row['id'];
					$_SESSION['empid']=$row['pfno'];
					$_SESSION['billunit'] = $row['BU'];
				}
				else
				{
					$_SESSION['role'] = $result_set['role'];
					$_SESSION['admin_username']=$username;
					$_SESSION['username']=$username;
					$_SESSION['name']=$row['name'];
					$_SESSION['admin_name']=$row['name'];
					$_SESSION['admin_id']=$row['id'];
					$_SESSION['empid']=$row['pfno'];
					if($result_set['role'] == 5)
					{
						$sql = "SELECT * FROM `sep_billunit` WHERE employee_id = '".$row['pfno']."'";
						$result_sql = mysql_query($sql);
						if($result_sql){
							$rows = mysql_fetch_assoc($result_sql);
							$_SESSION['billunit'] = $rows['billunit'];
						}
					}
				}
			}
			session_write_close();
			$query_audit = "insert into audit_table(empid,action,message) values('".$username."','Login','User logged in successful')";
			//echo "<script>alert('$role');</script>";
			$result_audit = mysql_query($query_audit);
			if($role == "0")
				echo "<script>window.location='public/superadmin/index.php';</script>";
			else if($role == "11")
				echo "<script>window.location='public/deptadmin/index.php';</script>";
			else if($role == "12")
				echo "<script>window.location='public/control_incharge/index.php';</script>";
			else if($role == "13")
				echo "<script>window.location='public/control_officer/index.php';</script>";
			else if($role == "1")
				echo "<script>window.location='public/admin/index.php';</script>";
			else if($role == "OS" || $role == 'BO' || $role == 'AP')
				echo "<script>window.location='public/officers/index.php';</script>";
			else
				echo "<script>window.location='public/users/index.php';</script>";
		}
		else{
			$query_audit = "insert into audit_table(empid,action,message) values ('".$username."' , 'Login', 'Login failed')";
			$result_audit = mysql_query($query_audit);
			$_SESSION['message']="Login Failed!!!<br>Please check username or password<br> or contact Administrator";
			echo "<script>window.location='index.php';</script>";
		}
	}
?>
