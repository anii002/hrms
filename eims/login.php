<?php
session_start();
// if(isset($_SESSION['user']))
// {
// 	header("Location:e-notification.php");
// }
	include('dbcon.php');


	if (isset($_POST['action']))
	{
	 	switch($_POST['action'])
	 	{
  			case 'user_login':
					// $data="sdfgsdg";
					 $username = $_POST['txtuser'];
					 $password = ($_POST['txtpass']);
					 $data='';
						
						dbcon1();
						$query = mysql_query("select * from users1 WHERE username='$username' AND password='".hashPassword($password,SALT1,SALT2)."' AND status='1'");
			
						$row=mysql_fetch_array($query);
						$count=mysql_num_rows($query);
				
						if(mysql_affected_rows() > 0)
						{
							
							if($count == 1)
							{
								$_SESSION['user'] = $username;
								$data = "dashboard";
							}
							else
							{
									$data="denied";
							}
						}
						else
						{
							dbcon2();
							$query2 = mysql_query("select * from prmaemp WHERE empno='$username' AND psw='".hashPassword($password,SALT1,SALT2)."'");
							$row=mysql_fetch_array($query2);
							$count=mysql_num_rows($query2);
							
							if($count == 1)
							{
								$_SESSION['user'] = $username;
								$data = "emp_dashboard";
							}
							else
							{
								// echo "select * from employees WHERE pfno='$username' AND psw='".hashPassword($password,SALT1,SALT2)."'";
									$data="denied";
							}
						}

					echo  $data;
			break;
		}
	}
?>
