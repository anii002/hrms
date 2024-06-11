<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');
  switch($_REQUEST['action'])
  {
	  case 'changeimg':
		if(changeimg($_FILES["profile"]["name"],$_FILES["profile"]["tmp_name"]))
		{
			echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
		}
		else
		{
			echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
		}
	break;
    case 'updateUser':
        $fname = $_REQUEST['fname'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $design = $_REQUEST['design'];
        if(updateUser($fname,$email,$mobile,$design))
          echo "<script>alert('User details updated successfully');window.location='../profile.php';</script>";
        else
          echo "<script>alert('User details not updated');window.location='../profile.php';</script>";
    break;
    case 'changePass':
        $pass = $_REQUEST['pass'];
        $confirm = $_REQUEST['confirm'];
        if($pass==$confirm)
        {
          if(changePass($pass,$confirm))
            echo "<script>alert('User Password changed successfully');window.location='../profile.php';</script>";
          else
            echo "<script>alert('User Password not changed');window.location='../profile.php';</script>";
        }
        else {
          echo "<script>alert('Confirm password must match with password');window.location='../profile.php';</script>";
        }
    break;
    
    default:
      echo "Invalid option";
    break;
	
	
	
	
  }
 ?>
