<?php
session_start();
	include('dbconfig/dbcon.php');
	// include('dbconfig/commonjs.php');


	if (isset($_POST['action']))
	{
	 	switch($_POST['action'])
	 	{
  			case 'user_login':
					
					$username = $_POST['txtuser'];
					$password = $_POST['txtpass'];
					$data='';
					dbcon1();
					$query = "SELECT * FROM applicant_registration WHERE binary username='".$username."' AND psw='".hashPassword($password,SALT1,SALT2)."' AND status=1";

					$result = mysqli_query($conn, $query) or die(mysqli_error());
					//$value = mysqli_fetch_array($result);
					
					if(mysqli_affected_rows() > 0)
					{
						
							 while($row = mysqli_fetch_assoc($result))
							 {
								
									$_SESSION['appl_username']=$row['username'];
									$_SESSION['ex_emp_pfno']=$row['ex_emp_pfno'];
									$_SESSION['applicant_name']=$row['applicant_name'];
									$_SESSION['ex_empname']=$row['ex_empname'];
								
							 }
							 
							 $data="user";
						
					}
					else
					{
							//............................. Admin .............................//
						
						$sql =mysqli_query("SELECT * FROM login where username='$username' AND password='".hashPassword($password,SALT1,SALT2)."' AND status='1' ");
						
						 //echo "SELECT * FROM login where username='$username' AND password='".hashPassword($password,SALT1,SALT2)."' AND status='1'".mysqli_error();
						if(mysqli_affected_rows() > 0)
						{
							while($result_set = mysqli_fetch_array($sql))
							{
							
								$role = $result_set['role'];
								$_SESSION['username']=$result_set['username'];
								$_SESSION['password']=$result_set['password'];
								$_SESSION['role']=$result_set['role'];
								$_SESSION['pf_number']=$result_set['pf_number'];
								$_SESSION['unitid']=$result_set['unit_id'];
								$_SESSION['dept']=$result_set['dept'];
								$_SESSION['admin_id']=$result_set['id'];
							}
							
							if($role=='1')
							{
								$data='superadmin';
							}
							
							if($role=='2')
							{
								$data='drm';
							}
							
							if($role=='3')
							{
								$data='srdpo';
							}
							
							if($role=='4')
							{
								$data='dpo';
							}
							
							if($role=='5')			
							{
								$data='wi';
							}
							
							if($role=='6')
							{
								$data='cc';
							}
							
							if($role=='7')
							{
								$data='rcc';
							}
							if($role=='8')
							{
								$data='dec';
							}
							// if($role=='9')
							// {
							// 	$data='user';
							// }
							session_write_close();
							
							
						}

					}


				 echo $data;
			break;

		}
	}
?>