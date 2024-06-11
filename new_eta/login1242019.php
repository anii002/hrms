<?php
session_start();
	include('dbconfig/dbcon.php');
	// include('dbconfig/commonjs.php');
	if (isset($_POST['action']))
	{
	 	switch($_POST['action'])
	 	{
  			case 'user_login':
					// $data="sdfgsdg";
					$username = $_POST['txtuser'];
					$password = $_POST['txtpass'];
					$data='';

					$user_type = 0;			// 0 for Employee Login
					$status='';
				 $query = "SELECT pfno,name,id,desig,BU,dept,first_login,status FROM employees WHERE binary pfno='".$username."' AND psw='".hashPassword($password,SALT1,SALT2)."'";

					$result = mysql_query($query) or die(mysql_error());
					$value = mysql_fetch_array($result);
					// echo mysql_affected_rows().$value['first_login'].$value['status'];
					if(mysql_affected_rows() > 0)
					{
						if($value['first_login']=="0" && $value['status'] == "1")
						{
							// while($row = mysql_fetch_assoc($result))
							// {
								$_SESSION['empid']=$value['pfno'];
								$data="firstlogin";
							// }
						}
						else
						{
							$result = mysql_query($query) or die(mysql_error());
							$status_check=-1;
							if(mysql_affected_rows() > 0)
							{
								while($row = mysql_fetch_array($result))
								{
									$_SESSION['username']=$row['name'];
									$_SESSION['name']=$row['name'];
									$_SESSION['dept']=$row['dept'];
									$_SESSION['id']=$row['id'];
									$_SESSION['admin_username']=$username;
									$_SESSION['admin_id']=$row['id'];
									$_SESSION['admin_name']=$row['name'];
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
									$data="p_employee";
								}
								else
								{
									$data="denied";
								}
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
								$status=$row['status'];
						
						
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
							session_write_close();
							$query_audit = "insert into audit_table(empid,action,message) values('".$username."','Login','User logged in successful')";
							$result_audit = mysql_query($query_audit);
							if($role == "0")
							{
								$data="superadmin";								
							}
							else if($role == "11")
							{
								$data="deptadmin";								
							}
							else if($role == "12")
							{
								$data="control_incharge";								
							}
							else if($role == "13")
							{
								$data="control_officer";								
							}
							else if($role == "5")
							{
								$data="estclerk";								
							}
							else if($role == "50")
							{
								$data="seniority";								
							}
							else if($role == "51")
							{
								$data="notification";								
							}
							else if($role == "52")
							{
								$data="officeorder";								
							}
							
						}
						else
						{
							$inner_query = mysql_query("select * from users WHERE username='$username'");
							$result_set = mysql_fetch_array($inner_query);
							$status=$result_set['status'];
							if($status == 0){
								$data="denied";
							}
							else {
								$query_audit = "insert into audit_table(empid,action,message) values ('".$username."' , 'Login', 'Login failed')";
								$result_audit = mysql_query($query_audit);
								$_SESSION['message']="Login Failed!!!<br>Please check username or password<br> or contact Administrator";
								
								$msg ="Login Failed!!!<br>Please check username or password<br> or contact Administrator";
								$data="false";
							}
							
						}
					}

					echo $data;
			break;

		}
	}
?>
