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
						
						dbcon2();
						$query = mysql_query("select * from it_login WHERE username='$username' AND password='".hashPassword($password,SALT1,SALT2)."'");
			
						$row=mysql_fetch_array($query);
						$count=mysql_num_rows($query);
				
						// if(mysql_affected_rows() > 0)
						// {
							
						// 	if($count == 1)
						// 	{
						// 		$_SESSION['user'] = $username;
						// 		$data = "dashboard";
						// 	}
						// 	else
						// 	{
						// 			$data="denied";
						// 	}
						// }
						// else
						// {
							
						// 		$data="denied";
						// }
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
							$query2 = mysql_query("select * from resgister_user WHERE emp_no='$username' AND password='".hashPassword($password,SALT1,SALT2)."'");
							$row=mysql_fetch_array($query2);
							$count=mysql_num_rows($query2);
							
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
