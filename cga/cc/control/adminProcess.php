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
  case 'submit_ss':
    $con=dbcon1();
    $data='';
       $sql=mysqli_query($con,"INSERT INTO `screening_sheet`( `ex_emp_pfno`,`eligible_group`, `curDate`, `date_of_screening`, `ab_code_no`, `marks_obtained`, `remark`) VALUES('".$_POST['p_emp_pfno']."','".$_POST['group']."','".$_POST['curDate']."','".$_POST['appl_dob']."','".$_POST['ab_code']."','".$_POST['total_marks']."','".$_POST['remark']."')");
       $q=mysqli_query($con,"UPDATE applicant_registration set ss_status=1 where ex_emp_pfno='".$_POST['p_emp_pfno']."'");
       $qq=mysqli_query($con,"UPDATE forward_application set cc_status=1 where ex_emp_pfno='".$_POST['p_emp_pfno']."' and id='".$_POST['pid']."'");
       if($sql && $q && $qq)
       {
        $data=1;
       }
       else
       {
        $data=0;
       }
       echo $data;
    break;
    case 'submit_ss_grp_d':
      $con=dbcon1();
    $data='';
       $sql=mysqli_query($con,"INSERT INTO `screening_sheet`( `ex_emp_pfno`,`eligible_group`, `curDate`, `date_of_screening`, `ab_code_no`, `marks_obtained`, `remark`) VALUES('".$_POST['p_emp_pfno']."','".$_POST['group']."','".$_POST['curDate']."','','','','".$_POST['remark']."')");
       $q=mysqli_query($con,"UPDATE applicant_registration set ss_status=1 where ex_emp_pfno='".$_POST['p_emp_pfno']."'");
       $qq=mysqli_query($con,"UPDATE forward_application set cc_status=1 where ex_emp_pfno='".$_POST['p_emp_pfno']."' and id='".$_POST['pid']."'");
       if($sql && $q && $qq)
       {
          $data=1;
       }
       else
       {
        $data=0;
       }
       echo $data;
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
