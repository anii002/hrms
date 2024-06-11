<?php
session_start();
include('config.php');

/*if(isset($_REQUEST['login']))
	{
		$user=$_POST['username'];
		$pass=$_POST['password'];
		if(!empty($user) && !empty($pass)){
			$sql_fetch="select * from employee where emp_id='$user' and password='$pass'";
			$sql_result=mysql_query($sql_fetch) or die(mysql_error());
			$result=mysql_num_rows($sql_result);
			$fetch_result = mysql_fetch_array($sql_result);
			if($result>0)
			{
				$_SESSION["user"] =$user;
				$_SESSION["empname"] =$fetch_result['emp_name'];
				echo "<script>window.location='home.php'</script>";
			}else{
				//echo "error";
				$sql_admin=mysql_query("select * from tbl_user where username='$user' and password='$pass'") or die(mysql_error());
				$fetch_admin=mysql_fetch_array($sql_admin);
				 // echo "select * from tbl_user where username='$user' and password='$pass'";
					$got_id=$fetch_admin['user_id'];
					$got_role = $fetch_admin['role'];
				echo $got_role;
				if($got_role=="admin"){
					
					$_SESSION['SESSION_ID']=$fetch_admin['user_id'];
					$_SESSION['SESSION_NAME']=$fetch_admin['user_name'];
					$_SESSION['SESSION_ROLE']=$fetch_admin['role'];
					$_SESSION['SESSION_USERNAME']=$fetch_admin['user_name'];
					$_SESSION['userid']="Administrator";
					echo "<script>swal(
						  'Login Successful!',
						  'success'
						);</script>";
					echo "<script>window.location.href='admin/main/index.php';</script>";
					
				}
				if($got_role=="4"){
					
					$_SESSION['SESSION_ID']=$fetch_admin['user_id'];
					$_SESSION['SESSION_NAME']=$fetch_admin['user_name'];
					$_SESSION['SESSION_ROLE']=$fetch_admin['role'];
					$_SESSION['SESSION_USERNAME']=$fetch_admin['user_name'];
					$_SESSION['userid']="Administrator";
					echo "<script>swal(
						  'Login Successful!',
						  'success'
						);</script>";
					echo "<script>window.location.href='admin_user/main/index.php';</script>";
					
				}
				if($got_role=="2"){
					
					$_SESSION['SESSION_ID']=$fetch_admin['user_id'];
					$_SESSION['SESSION_NAME']=$fetch_admin['user_name'];
					$_SESSION['SESSION_ROLE']=$fetch_admin['role'];
					$_SESSION['SESSION_USERNAME']=$fetch_admin['user_name'];
					$_SESSION['userid']="Administrator";
					echo "<script>swal(
						  'Login Successful!',
						  'success'
						);</script>";
					echo "<script>window.location.href='admin_welfare/main/index.php';</script>";
					
				}
				if($got_role=="employee"){
					
					$_SESSION['SESSION_ID']=$fetch_admin['user_id'];
					$_SESSION['SESSION_NAME']=$fetch_admin['user_name'];
					$_SESSION['SESSION_ROLE']=$fetch_admin['role'];
					$_SESSION['SESSION_USERNAME']=$fetch_admin['user_name'];
					$_SESSION['userid']="Administrator";
					echo "<script>swal(
						  'Login Successful!',
						  'success'
						);</script>";
					// echo "<script>window.location.href='admin_welfare/main/index.php';</script>";
					
				}
				
				
			}
			
		}
	}*/

if (isset($_REQUEST['login'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	if (!empty($user) && !empty($pass)) {
		// $pass = hashPassword($pass);
		$emp_pass = hashPassword($pass);

		$sql_fetch = "select * from resgister_user where emp_no='$user' and password='$emp_pass'";
		$sql_result = mysql_query($sql_fetch, $db_common) or die(mysql_error());
		$result = mysql_num_rows($sql_result);
		$fetch_result = mysql_fetch_array($sql_result);
		if ($result > 0) {
			$_SESSION["user"] = $user;
			$_SESSION["empname"] = $fetch_result['name'];
			echo "<script>window.location='index.php'</script>";
		} else {
			//echo "error";
			$sql_admin = mysql_query("select * from tbl_user where username='$user' and password='$pass'", $db_egr);
			// echo mysql_error();
			if (mysql_num_rows($sql_admin) > 0) {
				$fetch_admin = mysql_fetch_array($sql_admin);

				$got_id = $fetch_admin['user_id'];
				$got_role = $fetch_admin['role'];

				if ($got_id == "1") {
					$_SESSION['SESSION_ID'] = $fetch_admin['user_id'];
					$_SESSION['SESSION_NAME'] = $fetch_admin['user_name'];
					$_SESSION['SESSION_ROLE'] = $fetch_admin['role'];
					$_SESSION['SESSION_USERNAME'] = $fetch_admin['user_name'];
					$_SESSION['userid'] = "Administrator";
					echo "<script>swal(
						  'Login Successful!',
						  'success'
						);</script>";
					echo "<script>window.location.href='admin/main/index.php';</script>";
				}
				if ($got_role == "3") {
					$_SESSION['SESSION_ID'] = $fetch_admin['user_id'];
					$_SESSION['SESSION_NAME'] = $fetch_admin['user_name'];
					$_SESSION['SESSION_ROLE'] = $fetch_admin['role'];
					$_SESSION['SESSION_USERNAME'] = $fetch_admin['user_name'];
					$_SESSION['userid'] = "Administrator";
					echo "<script>swal(
						  'Login Successful!',
						  'success'
						);</script>";
					echo "<script>window.location.href='admin/main/index.php';</script>";
				} else {
					$_SESSION['SESSION_ID'] = $fetch_admin['user_id'];
					$_SESSION['SESSION_NAME'] = $fetch_admin['user_name'];
					$_SESSION['SESSION_ROLE'] = $fetch_admin['role'];
					$_SESSION['SESSION_USERNAME'] = $fetch_admin['username'];
					$_SESSION['SESSION_SECTION'] = $fetch_admin['section'];
					$_SESSION['userid'] = "Administrator";
					if ($fetch_admin['role'] == '1') {
						echo "<script>window.location.href='admin_user/main/index.php';</script>";
					} else if ($fetch_admin['role'] == '2') {
						echo "<script>window.location.href='admin_welfare/main/index.php';</script>";
					} else if ($fetch_admin['role'] == '5') {
						echo "<script>window.location.href='admin/main/index.php';</script>";
					} else {
						echo "<script>alert('PLEASE ENTER CORRECT USERNAME AND PASSWORD!'); window.location.href='index.php'; </script>";
					}
				}
			} else {
				echo "<script>alert('PLEASE ENTER CORRECT USERNAME AND PASSWORD!'); window.location.href='index.php'; </script>";
				// 010719c0a4fba5e4b9c1d8d1c29a67d90b548c4f
			}
		}
	}
}