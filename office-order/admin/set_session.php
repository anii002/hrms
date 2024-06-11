<?php
session_start();
error_reporting(0);
include_once('../dbconfig/dbcon.php');
dbcon();
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {  
			
			case 'set_pf_session':
				$pf_no=$_POST['bio_pf_no'];
				if($pf_no!="")
				{
					$_SESSION['same_pf_no']=$pf_no;
				}else{
					$_SESSION['same_pf_no']="";
				}
			echo $_SESSION['same_pf_no'];
			break;
			
			case 'set_new_pf':
				unset($_SESSION['same_pf_no']);
				echo "Now You can Enter New SR Entry";
				$_SESSION['same_pf_no']="";
                                $_SESSION['set_update_pf']="";
			break;
			
			case 'set_pf_update':
				$pf_no=$_POST['pf_no'];
				if($pf_no!="")
				{
					$_SESSION['set_update_pf']=$pf_no;
				}else{
					$_SESSION['set_update_pf']="";
				}
				echo "session_set";
			break;
			
			case 'set_two_session':
				$pf=$_POST['bio_pf_no'];
				if($pf!=""){
					$_SESSION['set_update_pf']=$pf;
					$_SESSION['same_pf_no']=$pf;
				}else{
					$_SESSION['set_update_pf']="";
					$_SESSION['same_pf_no']="";
				}
				
				echo "this pf number is already registerd you can update it";
				
			break;
		}
}
?>