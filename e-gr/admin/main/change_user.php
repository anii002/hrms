<?php
		require_once('Global_Data/header.php');
		error_reporting(0);
		include('config.php');
		include('functions.php');
		$sql = "SELECT * FROM tbl_user WHERE user_id = '".$_POST['user_id']."'";
		//$_SESSION['new_pass'] = $_REQUEST['user_password'];
  		$result = mysqli_query($db_egr,$sql);
  		while($data = mysqli_fetch_array($result)){
  			$contact_no = $data['user_mob'];	
  		}
  		$otp = rand(1000, 9000);
  		$message = "Your e-Grievance change password OTP is ".$otp.".Please Do not share with others.";	
		$refresh_otp_sql = "UPDATE `tbl_otp` SET `flag`='0' WHERE `flag` = '' OR `flag` = '1' AND `emp_id` = '".$_POST['user_id']."'";
		$refresh_result = mysqli_query($db_egr,$refresh_otp_sql);
		if(mysqli_affected_rows($db_egr)>=0 || mysqli_affected_rows($db_egr)<=0){
			$otp_insert_sql = "INSERT INTO `tbl_otp`(`emp_id`, `otp`, `flag`) VALUES ('".$_POST['user_id']."', '".$otp."', '1')";
			$insert_result = mysqli_query($db_egr,$otp_insert_sql);
			if(mysqli_affected_rows($db_egr) > 0){
				$username = "ITsrdpo";
				$password = "chandra1";
				$type="TEXT";
				$sender = "SURRLY";
				$mobile = $contact_no;
				$message = urlencode($message);
				$baseurl = "http://infoigy001.mediaalertbox.in/sendsms/sendsms.php";
				$url = $baseurl."?username=".$username."&password=".$password."&type=".$type."&sender=".$sender."&mobile=".$mobile."&message=".$message;
				$return = file($url);
				$string_version = implode(',', $return);
				if(strpos($string_version, "SUBMIT_SUCCESS") !== false){
					$data = 1;
				}
			}else{
			
				$data = 0;
			}
		}else{
			
			$data = 0;
		}
		echo $data;

?>