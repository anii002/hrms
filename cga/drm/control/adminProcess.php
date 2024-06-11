<?php
date_default_timezone_set("Asia/kolkata");
$date=date("d-m-Y h:i:sa" );
$date1=date("h-i-s" );
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

    case 'approve_drm':
    dbcon1();
          $date=date('d-m-Y h:i:s');
          $ex_emp_pfno=$_POST['ex_emp_pfno'];
          $appl_username=$_POST['username'];
          //$fw_to_pf=$_POST['fw_to_pfno'];
          $fw_tbl_id=$_POST['fw_tbl_id'];

          $update="UPDATE `forward_application` SET hold_status='0', drm_approve='0' , depart_time='".$date."' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."' ";
          $re_update=mysql_query($update);

          $sql=mysql_query("SELECT pf_number,unit_id from login where role='3'");
          $sql_login=mysql_fetch_array($sql);

           $query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$sql_login['unit_id']."','".$sql_login['pf_number']."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','','1','','','1')";
          $result=mysql_query($query);


          if($re_update)
          {
              echo "<script>alert('Aproved Successfully');window.location='../rcc_pending_app.php';</script>";
            //echo "ssss";
          }
          else
          {
            echo "<script>alert('Failed');window.location='../rcc_pending_app.php';</script>";
            //echo "ffff";
          }
      break;
  
    case 'FetchEmployee':
        $id = $_REQUEST['id'];
          echo FetchEmployee($id);
    break;
    case 'fetchEmployee1':
        $id = $_REQUEST['id'];
          echo fetchEmployee1($id);
    break;
    case 'add_questios':
    dbcon1();
          $que_name=$_POST['que_name'];
          $year=$_POST['year'];
          //$upload_path=$_FILES['upload']['tmp_name'];
          $upload_name=$_FILES['upload']['name'];

          $datt=explode('-',$date1);
          $date1=$datt[0].$datt[1].$datt[2];



         $tmp_name=$_FILES['upload']["tmp_name"];
         $upload_dir = "../../syllabus/".$date1."_".$upload_name;
          $dir = $date1."_".$upload_name;
          if (move_uploaded_file($tmp_name, $upload_dir)) 
          {
          
          $sql=mysql_query("INSERT INTO `add_syllabus`(`name_of_que_paper`, `year`, `uploaded_date`, `uploaded_by`, `uploaded_file_path`) VALUES('".$que_name."','".$year."','".$date."','".$_SESSION['admin_id']."','".$dir."')");
          echo "<script>alert('Added Successfully');window.location='../add_question_syllabus.php';</script>";
          }
          else
          {
            echo "<script>alert('Failed To Add File');window.location='../add_question_syllabus.php';</script>";
          }

      break;
      case 'RemoveFile':
      dbcon1();
            $id = $_REQUEST['id'];
            $data=0;
            $qu=mysql_query("SELECT * from add_syllabus where id='".$id."'");
            $res=mysql_fetch_array($qu);

            $path="../../syllabus/".$res['uploaded_file_path'];
            if(file_exists($path))
            {
              unlink($path);
              $sql="DELETE from add_syllabus where id='".$id."' ";
              $result=mysql_query($sql);
              if($result)
              {
                $data=1;
              }
              else
              {
                $data=0;
              }
            }
            
            
            echo $data;
          break;

    case 'addRule':
     
      //$sql="INSERT INTO `rules_n_regulations`(`title`, `rules_path`, `created_at`) VALUES ('".$_POST['title']."','".file."')";
    dbcon1();
     $upload_name=$_FILES['upload']['name'];
     $digits = 5;
      $date2=rand(pow(10, $digits-1), pow(10, $digits)-1);
         $tmp_name=$_FILES['upload']["tmp_name"];
         $upload_dir = "../../rules&regulation/".$date2."_".$upload_name;
         $dir = $date2."_".$upload_name;
          if (move_uploaded_file($tmp_name, $upload_dir)) 
          {
          
         echo $sql=mysql_query("INSERT INTO `rules_n_regulations`(`title`, `rules_path`, `created_at`) VALUES ('".$_POST['title']."','".$dir."','".$date."')");
          echo "<script>alert('Added Successfully');window.location='../add_rulenregulation.php';</script>";
          }
          else
          {
            echo "<script>alert('Failed To Add File');window.location='../add_rulenregulation.php';</script>";
          }

     break;

          case 'removeRuleFile':
          dbcon1();
          $id = $_REQUEST['id'];
            $data=0;
            $qu=mysql_query("SELECT * from rules_n_regulations where id='".$id."'");
            $res=mysql_fetch_array($qu);

            $path="../../rules&regulation/".$res['rules_path'];
            if(file_exists($path))
            {
                unlink($path);
              $sql="DELETE from rules_n_regulations where id='".$id."' ";
              $result=mysql_query($sql);
              if($result)
              {
                $data=1;
              }
              else
              {
                $data=0;
              }
            }
            echo $data;
          break;
  
   // case 'reject':
   // dbcon1();
   //                $date=date('d-m-Y h:i:s');
   //                $ex_emp_pfno=$_POST['ex_emp_pfno'];
   //                $fw_tbl_id=$_POST['fw_tbl_id'];
   //                //$fw_to_pfno=$_POST['fw_to_pfno'];
   //                $rcc=$_SESSION['pf_number'].",".$_SESSION['role'];

   //                $update=mysql_query("UPDATE `forward_application` SET depart_time='".$date."',return_status='1',remark='".$_POST['remark']."',rejected_by='".$rcc."' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."' ");
   //                // $re_update=mysql_query($update);

   //                if($update)
   //                {
   //                echo "<script>alert('Rejected  Successfully');window.location='../rcc_returned_list.php';</script>";
   //                //echo "ssss";
   //                }
   //                else
   //                {
   //                echo "<script>alert('Failed ');window.location='../rcc_returned_list.php';</script>";
   //                //echo "ffff";
   //                }
   //            break;
          case 'reject':
                  dbcon1();
                  $date=date('d-m-Y h:i:s');
          $ex_emp_pfno=$_POST['ex_emp_pfno'];
          $appl_username=$_POST['username'];
          $fw_to_pf=$_POST['fw_to_pfno'];
          $fw_tbl_id=$_POST['fw_tbl_id'];
          $rcc=$_SESSION['pf_number'].",".$_SESSION['role'];


          $update="UPDATE `forward_application` SET hold_status='0' , depart_time='".$date."' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."' ";
          $re_update=mysql_query($update);


          $sql=mysql_query("SELECT unit_id from login where pf_number='".$fw_to_pf."'");
          $value=mysql_fetch_array($sql);

          $fw_to_unitid=$value['unit_id'];


          $query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`,`cc_status`,`remark`,`rejected_by`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$fw_to_unitid."','".$fw_to_pf."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','','1','1','','','','".$_POST['remark']."','".$rcc."')";
          $result=mysql_query($query);


                  if($update)
                  {
                  echo "<script>alert('Rejected  Successfully');window.location='../rcc_returned_list.php';</script>";
                  //echo "ssss";
                  }
                  else
                  {
                  echo "<script>alert('Failed ');window.location='../rcc_returned_list.php';</script>";
                  //echo "ffff";
                  }
            break;
  
    case 'activeUser':
      $active = '1';
      $pfno = $_REQUEST['id'];
      if(activeUser($pfno,$active))
            echo "User Activated successfully";
          else
            echo "Something went wrong";
    break;
    case 'deactiveUser':
      $active = '0';
      $pfno = $_REQUEST['id'];
      if(deactiveUser($pfno,$active))
            echo "User Deactivated successfully";
          else
            echo "Something went wrong";
    break;

  

    default:
      echo "Invalid option";
    break;
	
	
	
	
  }
 ?>
