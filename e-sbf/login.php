<?php
session_start();

	include('dbconfig/dbcon.php');


	if (isset($_POST['action']))
	{
	 	switch($_POST['action'])
	 	{
  			case 'user_login':
					// $data="sdfgsdg";
					 $username = $_POST['txtuser'];
					// echo $username;exit();
					 $password = $_POST['txtpass'];
					 $data='';
						
						dbcon();
							$query2 = mysql_query("select * from add_user WHERE user_pfno='$username' AND user_psw='".hashPassword($password,SALT1,SALT2)."'");
							$row=mysql_fetch_array($query2);
							$role = $row['user_role'];
							$count=mysql_num_rows($query2);
				
						if(mysql_affected_rows() > 0)
						{
							
							if($role == "admin")
							{
								$_SESSION['username'] = $username;
								$_SESSION['user_role'] = $role;
								$data = "admin";
							}
							elseif ($role == '1') 
							{
								$_SESSION['username'] = $username;
								$_SESSION['user_role'] = $role;
								$data = "control_incharge";
							}
							elseif ($role == '2') 
							{
								$_SESSION['username'] = $username;
								$_SESSION['user_role'] = $role;
								$data = "sbf_section";
							}
							elseif ($role == '3') 
							{
								$_SESSION['username'] = $username;
								$_SESSION['user_role'] = $role;
								$data = "csbf_section";
							}
							else
							{
								$data="denied";
							}
							
						}
						else
							{
								dbcon1();
								$query3 = mysql_query("SELECT * FROM register_user WHERE emp_no='$username'");
								$row=mysql_fetch_array($query3);
								if(mysql_num_rows($query3) == 1)
								{
									$_SESSION['username'] = $username;
									$_SESSION['dept'] = $row['department'];
									$data="employee";
									// echo $data;
								}
								else
								{
									$data="denied";
									// echo $data;	
								}
							}
					echo  $data;
			break;
		}
	}
?>
