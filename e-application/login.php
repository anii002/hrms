<?php
session_start();

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
						
						dbcon3();
							$query2 = mysql_query("select * from add_user WHERE user_pfno='$username' AND user_psw='".hashPassword($password,SALT1,SALT2)."'");
							$row=mysql_fetch_array($query2);
							$role = $row['user_role'];
							$count=mysql_num_rows($query2);
				
						if(mysql_affected_rows() > 0)
						{
							
							if($count == 1)
							{
								$_SESSION['user'] = $username;
								$_SESSION['user_role'] = $role;
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
							$query = mysql_query("select * from resgister_user WHERE emp_no='$username' AND password='".hashPassword($password,SALT1,SALT2)."'");
				
							$row=mysql_fetch_array($query);
							$count=mysql_num_rows($query);
							if($count == 1)
							{
								$_SESSION['user'] = $username;
								$data = "dashboard";
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
