<?php
	include('main/config.php');
	session_start();	
  
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	/*................................................... super .....................................................*/
	$qryAdmin = "SELECT * FROM tbl_user WHERE emp_id='$username' AND user_aadhar='$password'";
	$rstAdmin = mysql_query($qryAdmin)or die(mysql_error());
	$rwAdmin = mysql_fetch_array($rstAdmin);
	$rwCountAdmin = mysql_num_rows($rstAdmin);

	
	if( $rwCountAdmin > 0 ) 
	{ 
		$_SESSION['SESSION_ID']=$rwAdmin['user_id'];
		$_SESSION['SESSION_NAME']=$rwAdmin['user_name'];
		$_SESSION['SESSION_ROLE']=$rwAdmin['emp_id'];
		//$_SESSION['SESSION_USERNAME']=$rwAdmin['username'];
		$_SESSION['userid']="Administrator";
		echo "admin";
	} 
	
	else
	 {
		 echo "error";
	 }
			
		
?>