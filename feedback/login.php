<?php
session_start();

	include('dbcon.php');


	if (isset($_POST['action']))
	{
	 	switch($_POST['action'])
	 	{
  			case 'user_login':
					
					 $username = $_POST['txtuser'];
					 $password = ($_POST['txtpass']);
					 $data='';
						
						dbcon2();
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

							dbcon();
							$query = mysql_query("select * from register_user WHERE emp_no='$username' AND password='".hashPassword($password,SALT1,SALT2)."'");
				
							$row=mysql_fetch_array($query);
							$count=mysql_num_rows($query);
							if($count == 1)
							{
								$_SESSION['user'] = $username;
								$_SESSION['user_role'] = "3";
								$data = "dashboard";
							}
							else
							{
								$data="denied";
							}
						}

					echo  $data;
			break;
		}
	}
?>
