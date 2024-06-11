<?php
session_start();
// if(isset($_SESSION['user']))
// {
// 	header("Location:e-notification.php");
// }
	include('../dbconfig/dbcon.php');
	if (isset($_POST['action']))
	{
	 	switch($_POST['action'])
	 	{
  			case 'user_login':
					// $data="sdfgsdg";
					 $username = $_POST['txtuser'];
					 $password = md5($_POST['txtpass']);
					$data='';

					$query = mysql_query("select * from user WHERE username='$username' AND password='$password'");
					 // mysql_error();
					$row=mysql_fetch_array($query);
					$count=mysql_num_rows($query);
					
					if($count == 1)
					{
							$_SESSION['user'] = $username;
							$data = "notification";
						
					}
					else
					{
						$data="";
					}

					echo  $data;
			break;
			

		}
	}
?>
