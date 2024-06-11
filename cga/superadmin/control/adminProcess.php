<?php
date_default_timezone_set("Asia/kolkata");
$date=date("d-m-Y h:i:sa" );
$date1=date("d-m-Y" );


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

  case 'removeUser':
      $data='';
      $username=$_POST['pf'];
      dbcon1();
      $fetch_role=mysql_query("SELECT role From login where id='".$_POST['id']."' AND  pf_number='".$_POST['pf']."'");
      $ress=mysql_fetch_array($fetch_role);
      $role=$ress['role'];
      
    
    dbcon2();
           $sql_in="SELECT pf_num,cga from user_permission where pf_num='$username'";
			$sql=mysql_query($sql_in);
			$row_usr=mysql_fetch_array($sql);
			$user_perm = explode(",", $row_usr["cga"]);
								//print_r($user_perm);
			if(($key = array_search($role, $user_perm)) !== false)
			{
			    unset($user_perm[$key]);
			    //print_r($user_perm);
			    $cgaa=implode(",",$user_perm);
			  $sql2=mysql_query("UPDATE user_permission set cga='".$cgaa."' where pf_num='".$_POST['pf']."'");  
			  dbcon1();
			  $sql="DELETE from login where id='".$_POST['id']."' AND  pf_number='".$_POST['pf']."'";
              $result=mysql_query($sql);
              
			}
     if($result && $sql2)
                {
                  $data=1;
                }
                else
                {
                  $data=0;
                }
    
  echo $data;
    break;

    case 'addRule':
     dbcon1();
      //$sql="INSERT INTO `rules_n_regulations`(`title`, `rules_path`, `created_at`) VALUES ('".$_POST['title']."','".file."')";
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

  case 'fetch_employee_details':
          
          $id=$_POST['id'];
          $data=[];
          $data=get_employee_details($id);
          echo json_encode($data);
    break;

    case 'add_user':
    
        $result=add_user($_POST['empid'],$_POST['username'],$_POST['psw'],$_POST['deptt1'],$_POST['role'],$_POST['unit_id']);
        if($result=='1')
        {
          echo "<script>alert('Added User Successfully');window.location='../add_user.php';</script>";
        }else{
         echo "<script>alert('User Adding Failed');window.location='../add_user.php';</script>";
        }

    break;

    case 'add_questios':
    dbcon1();
          $que_name=$_POST['que_name'];
          $year=$_POST['year'];
          //$upload_path=$_FILES['upload']['tmp_name'];
          $upload_name=$_FILES['upload']['name'];



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

      case 'fetchsyllabus':
      dbcon1();
          $data='';
          $query = "SELECT * from add_syllabus where id = '".$_POST['id']."'";
          $result = mysql_query($query);
          $value = mysql_fetch_array($result);
          
          $data['id']=$value['id'];
          $data['name_of_que_paper']=$value['name_of_que_paper'];
          $data['year']=$value['year'];
          $data['uploaded_date']=$value['uploaded_date'];
          $data['uploaded_file_path']=$value['uploaded_file_path'];
          
          echo  json_encode($data);
        break;

        case 'RemoveFile':
        dbcon1();
            $id = $_REQUEST['id'];
            $data=0;
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
            echo $data;
          break;
        case 'removeRuleFile':
        dbcon1();
          $id = $_REQUEST['id'];
            $data=0;
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
            echo $data;
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
