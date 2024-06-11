<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('../dbcon.php');


include('adminFunction.php');
  switch($_REQUEST['action'])
  {
    case 'fetchEmployee1':
        $id = $_REQUEST['id'];
          echo fetchEmployee1($id);
    break;  
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
   
    
    case 'admincancel':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $original_id = $_REQUEST['original_id'];
      //echo $original_id;
      if(admincancel($empid,$ref,$original_id))
      {
        echo "<script>alert('Travelling Allowance Claim returned');window.location='../Show_claimed_TA.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
      }
    break;
    
    case 'changePass':
       $pass = $_REQUEST['pass'];
        $confirm = $_REQUEST['confirm'];
        if($pass==$confirm)
        {
          if(changePass($pass,$confirm))
            echo "<script>alert('User Password changed successfully'); window.location='../profile.php';</script>";
          else
            echo "<script>alert('User Password not changed'); window.location='../profile.php';</script>";
        }
        else {
          echo "<script>alert('Confirm password must match with password');window.location='../profile.php';</script>";
        }
    break;
   
    case 'addEmployee':
        $empid = $_REQUEST['empid'];
        $pan = $_REQUEST['pannumber'];
        $fullname = $_REQUEST['empname'];
        $billunit = $_REQUEST['billunit'];
        $mobile = $_REQUEST['mobile'];
        $gradepay = $_REQUEST['gradepay'];
        $design = $_REQUEST['design'];
        $level = $_REQUEST['paylevel'];
         //$dept = $_REQUEST['dept'];
         if(isset($_POST['submit'])){
          if(addEmployee($empid,$pan,$fullname,$billunit,$mobile,$gradepay,$design,$level)){
            echo "<script>alert('Employee Added successfully');window.location='../employee_registration.php';</script>";
          }
          else{
            echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
          }
        }else{
          if(updateEmployee($empid,$pan,$fullname,$billunit,$mobile,$gradepay,$design,$level, $_POST['update_id'])){
            echo "<script>alert('Employee data updated successfully...');window.location='../employee_registration.php';</script>";
          }
          else{
            echo "<script>alert('Failed to update employee data...');window.location='../employee_registration.php';</script>";
          }
        }
    break;
    
    case 'addForms':
     
      //$sql="INSERT INTO `rules_n_regulations`(`title`, `rules_path`, `created_at`) VALUES ('".$_POST['title']."','".file."')";
    dbcon1();
     $upload_name=$_FILES['upload']['name'];
     $digits = 5;
      $date2=rand(pow(10, $digits-1), pow(10, $digits)-1);
         $tmp_name=$_FILES['upload']["tmp_name"];
         $upload_dir = "../forms_doc/".$date2."_".$upload_name;
         $dir = $date2."_".$upload_name;
          if (move_uploaded_file($tmp_name, $upload_dir)) 
          {
          
          $sql=mysql_query("INSERT INTO `forms`(`title`, `file_path`, `created_by`) VALUES ('".$_POST['title']."','".$dir."','".$date."')");
          echo "<script>alert('Added Successfully');window.location='../add_forms.php';</script>";
          }
          else
          {
            echo "<script>alert('Failed To Add File');window.location='../add_forms.php';</script>";
          }

     break;
     
     case 'removeFile':
         dbcon1();
          $id = $_REQUEST['id'];
            $data=0;
            $qu=mysql_query("SELECT * from forms where id='".$id."'");
            $res=mysql_fetch_array($qu);

            $path="../forms_doc/".$res['file_path'];
            if(file_exists($path))
            {
                unlink($path);
              $sql="DELETE from forms where id='".$id."' ";
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
  
  
   
    case 'FetchEmployee':
        $id = $_REQUEST['id'];
          echo FetchEmployee($id);
    break;
    case 'deleteEmployee':
        $delete_id = $_REQUEST['delete_id'];
          if(deleteEmployee($delete_id))
            echo "<script>alert('Employee Details Deleted successfully');window.location='../user_registration.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../user_registration.php';</script>";
    break;
    case 'claimTA':
        $cnt = $_REQUEST['hide_count'];
        $empid = $_REQUEST['empid'];
        $year = $_REQUEST['year'];
        $journey_type = $_REQUEST['journey_type'];
        $cardpass = addslashes($_REQUEST['cardpass']);
        $set = $_REQUEST['set'];
        $months = implode(",",$_REQUEST['month']);
        $ref = rand(10000,999999);
        $reference = $empid."/".$year."/".$ref;

        $objective =  $_REQUEST["objective0"];
        $data = [];
        for($i=0;$i<=$cnt;$i++)
        {
          $data['date'][$i] =  $_REQUEST["date$i"];
          $data['train'][$i] =  $_REQUEST["train$i"];
          $data['departS'][$i] =  $_REQUEST["departS$i"];
          $data['departT'][$i] =  $_REQUEST["departT$i"];
          $data['arrivalS'][$i] =  $_REQUEST["arrivalS$i"];
          $data['arrivalT'][$i] =  $_REQUEST["arrivalT$i"];
          $data['distance'][$i] =  $_REQUEST["distance$i"];
          $data['percent'][$i] =  $_REQUEST["percent$i"];
          $data['amount'][$i] =  $_REQUEST["amount$i"];
        }
        if(claimTA($data,$reference,$empid,$year,$months,$cnt,$set,$objective,$journey_type,$cardpass))
          echo "<script>alert('User Claim added successfully');window.location='../Show_claimed_TA.php?ref=$reference';</script>";
        else
          echo "<script>alert('Something went wrong');window.location='../TA_Entry_Form.php';</script>";

    break;
    case 'addclaimTA':
        $cnt = $_REQUEST['hide_count'];
        $empid = $_REQUEST['empid'];
        $year = $_REQUEST['year'];
        $months = $_REQUEST['month'];
        $journey_type = $_REQUEST['journey_type'];
        $cardpass = addslashes($_REQUEST['cardpass']);
        $set = $_REQUEST['set'];
        $reference = $_REQUEST['reference'];
        $objective =  $_REQUEST["objective0"];
        $data = [];
        for($i=0;$i<=$cnt;$i++)
        {
          $data['date'][$i] =  $_REQUEST["date$i"];
          $data['train'][$i] =  $_REQUEST["train$i"];
          $data['departS'][$i] =  $_REQUEST["departS$i"];
          $data['departT'][$i] =  $_REQUEST["departT$i"];
          $data['arrivalS'][$i] =  $_REQUEST["arrivalS$i"];
          $data['arrivalT'][$i] =  $_REQUEST["arrivalT$i"];
          $data['distance'][$i] =  $_REQUEST["distance$i"];
          $data['percent'][$i] =  $_REQUEST["percent$i"];
          $data['amount'][$i] =  $_REQUEST["amount$i"];
        }
        if(addclaimTA($data,$reference,$empid,$year,$months,$cnt,$set,$objective,$journey_type,$cardpass))
          echo "<script>alert('User Claim added successfully');window.location='../Show_claimed_TA.php?ref=$reference';</script>";
        else
          echo "<script>alert('Something went wrong');window.location='../TA_Entry_Form.php';</script>";

    break;

    case 'getTaAmount':
        $level = $_REQUEST['level'];
          echo getTaAmount($level);
    break;

    case 'forward_TA':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $forwardName = $_REQUEST['forwardName'];

      if(forward_TA($empid,$ref,$forwardName))
      {
        echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
      }
    break;

    case 'approveAndForward':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $forwardName = $_REQUEST['forwardName'];
      $original_id = $_REQUEST['original_id'];
      //echo $original_id;
      if(approveAndForward($empid,$ref,$forwardName,$original_id))
      {
        echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
      }
    break;
  
  case 'forward_bill':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $forwardName = $_REQUEST['forwardName'];
      if(forward_bill($empid,$ref,$forwardName))
      {
        echo "<script>alert('Claimed Contigency bill forwarded');window.location='../show_cont.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../show_cont.php';</script>";
      }
    break;

    case 'validate_date':
      echo validate_date($_REQUEST['date']);
    break;
  
  case 'validateReference':
    echo validateReference($_REQUEST['date'],$_REQUEST['month']);
  break;
  
  case 'deleteclaim':
    $id = explode('-',$_REQUEST['claim']);
    $reference = $id[0];
    //echo "executing";
    $query_delete = "delete from taentryforms where reference_id='$reference' AND set_number='$id[1]'";
    
    $result = mysql_query($query_delete);
    if(mysql_affected_rows() >= 0)
    {
      $taentry_sql = "DELETE FROM taentryforms_master WHERE reference = '".$reference."' AND empid = '".$_SESSION['empid']."'";
      $res = mysql_query($taentry_sql);
      $forward_sql = "DELETE FROM forward_data WHERE reference_id = '".$reference."' AND empid = '".$_SESSION['empid']."'";
      $res1 = mysql_query($forward_sql);
      echo "<script>alert('Claim deleted successfully'); window.location='../Show_claimed_TA.php';</script>";
    }
    else
    {
      echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
    }
  break;
  
  case 'checkTimeBetween':
    
  break;
  
  case 'checktime':
    $endT = $_REQUEST['endT'];
    $beginT = $_REQUEST['beginT'];
    $sunrise = $endT;
    $sunset = $beginT;
    $date2 = DateTime::createFromFormat('H:i', $beginT);
    $date3 = DateTime::createFromFormat('H:i', $endT);
    if ($date2 > $date3)
    {
       echo 'Allow to enter';
    }
    else
    {
      echo "Not allowed to enter";
    }
  break;

    case 'getbackclaimedta':
        if(getbackclaimedta($_REQUEST['id']))
        {
          echo "true";
        }
        else
        {
          echo "false";
        }

    break;

  case 'getbackclaimedcont':
    if(getbackclaimedcont($_REQUEST['id']))
    {
      echo "true";
    }
    else
    {
      echo "false";
    }

  break;

    case 'view_contingency':
        $data='';
        $sql="select * from continjency_master inner join continjency on continjency_master.id=continjency.cid where reference='".$_REQUEST['ref']."' and continjency.set_number='".$_REQUEST['set']."'";
         $raw_data=mysql_query($sql);
         echo mysql_error();
         if($raw_data){
          $cnt = 0;
            while($sql_res=mysql_fetch_assoc($raw_data)){
              $data .= "
                <tr>
                  <td>".$sql_res['cntdate']."</td>
                  <td>".$sql_res['cntfrom']."</td>
                  <td>".$sql_res['cntTo']."</td>
                  <td>".$sql_res['kms']."</td>
                  <td>".$sql_res['rate_per_km']."</td>
                  <td>".$sql_res['total_amount']."</td>
                </tr>
              ";
              $cnt += (int)$sql_res['total_amount'];
          }
          $data .= "
                <tr>
                  <td colspan='5' style='text-align:right;'>Total Amount</td>
                  <td>".$cnt."</td>
                </tr>
              ";
        }
        else{
          $data .= 0;
        }
        echo $data;
        break;

       case 'AddUser':
        $empid = $_REQUEST['empid'];
        $username = $_REQUEST['username'];
        $psw = $_REQUEST['psw'];
        $role = $_REQUEST['role'];
          if(AddUser($empid,$username,$psw,$role))
            echo "<script>alert('User Added successfully');window.location='../user_register.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../user_register.php';</script>";
    break;

    case 'adminapprove':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $original_id = $_REQUEST['original_id'];
      //echo $original_id;
      if(adminapprove($empid,$ref,$original_id))
      {
        echo "<script>alert('Travelling Allowance Claim Approved');window.location='../index.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
      }
    break;

   

    case 'AddControlAdmin':
        $empid = $_REQUEST['empid'];
        $username = $_REQUEST['username'];
        $psw = $_REQUEST['psw'];
        $dept = $_REQUEST['deptid'];
        $role = $_REQUEST['role'];
        $station=$_REQUEST['stationcode'];
          if(AddAdmin($empid,$username,$psw,$role,$dept,$station))
            echo "<script>alert('User Added successfully');window.location='../add_user.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../add_user.php';</script>";
    break;
    
       case 'seniority':
          $dir = "doc/";
          $file_extension = array('jpg','png','gif','pdf');
          $file_size= array();

           $subject  = $_REQUEST['subject'];
           $year     = $_REQUEST['year'];

           $data = explode(".", $_FILES["attach"]["name"]);
           $file = rand().".".$data[1];
           //$PATH = $dir.$_FILES["attach"]["name"];
           $filepath = $dir.$file;


      if(move_uploaded_file($_FILES["attach"]["tmp_name"],$dir.$file))
      {
      
            dbcon1();
            $query = mysql_query("INSERT INTO `seniority_list`(`subject`, `url`, `year`) VALUES ('$subject','$filepath','$year')");
            if($query == TRUE)
            {
              echo "<script>alert('Seniority Submitted successfully');window.location='../seniority.php';</script>"; 
            }
            else
            {
              echo "<script>alert('Not Submitted successfully');window.location='../seniority.php';</script>"; 
            } 
          
    }
    else
    {
            echo  "<script>alert('Failed To Upload DOC...');window.location='../seniority.php';</script>";
    } 
           
       break;

            case 'seniority_sugg':
           $pfno        = $_REQUEST['pfno'];
           $suggestion  = $_REQUEST['suggestion'];
           $date=date('d/m/Y h:i:s');
      
            dbcon1();
            $query = mysql_query("INSERT INTO `suggestion`(`suggestion`, `pfno`, `status`, `created_date`) VALUES ('$suggestion','$pfno','0','$date')");
            if($query == TRUE)
            {
              echo "<script>alert('Seniority Suggestion Submitted successfully');window.location='../view_suggestion_emp.php';</script>"; 
            }
            else
            {
              echo "<script>alert('Not Submitted successfully');window.location='../view_suggestion_emp.php';</script>"; 
            }
           
       break;

   case 'enotification':
          $dir = "doc/";
          $file_extension = array('jpg','png','gif','pdf');
          $file_size= array();

           $ref_no               = $_REQUEST['ref_no'];
           $notification_date    = $_REQUEST['notification_date'];
           $subject              = $_REQUEST['subject'];

           $data = explode(".", $_FILES["attach"]["name"]);
           $file = rand().".".$data[1];
           //$PATH = $dir.$_FILES["attach"]["name"];
           $filepath = $dir.$file;


      if(move_uploaded_file($_FILES["attach"]["tmp_name"],$dir.$file))
      {
      
            dbcon1();
            $query = mysql_query("INSERT INTO `e-notification1`(`ref_no`, `notification_date`, `subject`, `url`) VALUES ('$ref_no','$notification_date','$subject','$filepath')");
            if($query == TRUE)
            {
              echo "<script>alert('e-notification Submitted successfully');window.location='../e-notification.php';</script>"; 
            }
            else
            {
              echo "<script>alert('Not Submitted successfully');window.location='../e-notification.php';</script>"; 
            } 
          
    }
    else
    {
            echo  "<script>alert('Failed To Upload DOC...');window.location='../e-notification.php';</script>";
    } 
           
       break;

       case 'circular':
        
          $dir = "doc/";
          $file_extension = array('jpg','png','gif','pdf');
          $file_size= array();

            $issued_date     = $_POST['issued_date'];
            $issued_section  = $_POST['issued_section'];
            $subject         = $_POST['subject'];
          //echo $_FILES["attach"]["name"];

           $data = explode(".", $_FILES["attach"]["name"]);
           $file = rand().".".$data[1];
           //$PATH = $dir.$_FILES["attach"]["name"];
          $filepath = $dir.$file;


      if(move_uploaded_file($_FILES["attach"]["tmp_name"],$dir.$file))
      {
      
            dbcon1();
             $query = mysql_query("INSERT INTO `circular`(`issued_date`, `issued_section`, `subject`, `file`) VALUES ('$issued_date','$issued_section','$subject','$filepath')");
            if($query)
            {
               echo "<script>alert('Circular Submitted successfully');window.location='../circular.php';</script>"; 
            }
            else
            {
               echo "<script>alert('Not Submitted successfully');window.location='../circular.php';</script>"; 
            } 
          
    }
    else
    {
            echo  "<script>alert('Failed To Upload DOC...');window.location='../circular.php';</script>";
    } 
           
       break;


    case 'default':

    case 'AddDeptAdmin':
        $empid = $_REQUEST['empid'];
        $username = $_REQUEST['username'];
        $psw = $_REQUEST['psw'];
        $dept = $_REQUEST['dept'];
          if(AddAdmin($empid,$username,$psw,$dept))
            echo "<script>alert('Sectional incharge Added successfully');window.location='../add_user.php';</script>";
          else
            echo "<script>alert('Failed to add department admin');window.location='../add_user.php';</script>";
    break;
    case 'activeUser':
      $active = '1';
      $pfno = $_REQUEST['id'];
      if(activeUser2($pfno,$active))
            echo "User Activated successfully";
          else
            echo "Something went wrong";
    break;
    case 'deactiveUser':
      $active = '0';
      $pfno = $_REQUEST['id'];
      if(deactiveUser2($pfno,$active))
            echo "User Deactivated successfully";
          else
            echo "Something went wrong";
    break;

    case 'deleteOffice':
        $delete_id = $_REQUEST['id'];
          if(deleteOffice($delete_id))
            echo "Office Order Deleted successfully";
          else
            echo "Something went wrong";
    break;

    case 'deletenotification':
        $delete_id = $_REQUEST['id'];
          if(deletenotification($delete_id))
            echo "e-notification Deleted successfully";
          else
            echo "Something went wrong";
    break;

    case 'deleteseniority':
        $delete_id = $_REQUEST['id'];
          if(deleteseniority($delete_id))
            echo "Seniority Deleted successfully";
          else
            echo "Something went wrong";
    break;

      echo "Invalid option";
    break;
    
    case 'generatePassword':
        $id = $_REQUEST['id'];
         $otp=0;
        if($id)
        {
            $otp = rand(999,10000);
            dbcon1();
            $query1="UPDATE `users1` SET `password`='".hashPassword($otp,SALT1,SALT2)."' WHERE `username`='".$id."'";
            $res1=mysql_query($query1);
            echo mysql_error();
            if($res1)
            {
              echo $otp;
            }         
            else
            {
              echo "0";
            } 
        }        
        else
        {
          echo "0";
        }
      break;
    case 'updatesuggestion':
        $id = $_REQUEST['id'];
        $suggestion = $_REQUEST['suggestion'];
        $date=date('d/m/Y h:i:s');
        $data="0";
        dbcon1();
        $sql=mysql_query("UPDATE `suggestion` SET `remark`='".$suggestion."',`status`='1',`updated_date`='".$date."' WHERE id='".$id."'");
        if($sql)
        {
            $data="1"; 
        }
        else {
             $data="0";
          }
        echo $data;
    break;
  }
 ?>
