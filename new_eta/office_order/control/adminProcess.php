<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('../../dbconfig/dbcon.php');

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
   
    case 'updateUser':
        $fname = $_REQUEST['fname'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $design = $_REQUEST['design'];
        $dept = $_REQUEST['dept'];
        if(updateUser($fname,$email,$mobile,$design,$dept))
          echo "<script>alert('User details updated successfully');window.location='../profile.php';</script>";
        else
          echo "<script>alert('User details not updated');window.location='../profile.php';</script>";
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
    case 'AddDesign':
        $design = $_REQUEST['design'];
          if(AddDesign($design))
            echo "<script>alert('Designation Added successfully');window.location='../Designation.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../Designation.php';</script>";
    break;

    case 'addGrievance':
        $pfno = $_REQUEST['txtpfno'];
        $title = $_REQUEST['title'];
        $description = $_REQUEST['description'];
        $dept_id = $_REQUEST['deptid'];
        $filename=$_FILES['attach']['name'];
        $tmp_name_array=$_FILES['attach']['tmp_name'];

        $date=date('d/m/Y h:i:s');
        $folder_name="upload_scanned_doc/";
        
        if(is_dir("upload_scanned_doc/".$pfno))
        {
            
        }
        else{
            mkdir("upload_scanned_doc/".$pfno);
        }
        $folder_name="upload_scanned_doc/".$pfno."/";
        $temp = explode(".", $filename);
        $newfilename = rand(1000,99999) . '.' . end($temp);

        if(move_uploaded_file($tmp_name_array,$folder_name.$newfilename))
        {
          $sql_img=mysql_query("INSERT INTO `grievance`(`pfno`, `dept_id`, `title`, `description`, `image_path`,`status`, `created_date`) VALUES ('".$pfno."','".$dept_id."','".$title."' ,'".$description."','".$newfilename."','0','".$date."')")or die(mysql_error());

            // echo"<br>". "INSERT INTO `grievance`(`pfno`, `dept_id`, `title`, `description`, `image_path`,`status`, `created_date`) VALUES ('".$pfno."','".$dept_id."','".$title."' ,'".$description."','".$newfilename."','0','".$date."')";

            if($sql_img)
            {
                echo "<script>alert('Grievance Added successfully');window.location='../add_grievance.php';</script>"; 
            }
            else
            {
                echo "<script>alert('Something went wrong');window.location='../add_grievance.php';</script>";
            }
        }
          // if(addGrievance($pfno,$title,$description,$dept_id,$))
          //   echo "<script>alert('Designation Added successfully');window.location='../Designation.php';</script>";
          // else
          //   echo "<script>alert('Something went wrong');window.location='../Designation.php';</script>";
    break;

    case 'fetchDesign':
        $id = $_REQUEST['id'];
          echo fetchDesign($id);
    break;
    case 'UpdateDesign':
        $update_design = $_REQUEST['update_design'];
        $update_id = $_REQUEST['update_id'];
          if(UpdateDesign($update_design,$update_id))
            echo "<script>alert('Designation Updated successfully');window.location='../Designation.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../Designation.php';</script>";
    break;
    case 'DeleteDesign':
        $delete_id = $_REQUEST['delete_id'];
          if(DeleteDesign($delete_id))
            echo "<script>alert('Designation Deleted successfully');window.location='../Designation.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../Designation.php';</script>";
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
  case 'forward_returned_ta':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $forwardName = $_REQUEST['forwardName'];
      //echo $original_id;
      if(forward_returned_ta($empid,$ref,$forwardName))
      {
        echo "<script>alert('Travelling Allowance Claim reforwarded');window.location='../Show_claimed_TA.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
      }
    break;
  
    case 'updateEmployee':
        $empid = $_REQUEST['txtpfno'];
         $billunit = $_REQUEST['billunit'];
         $panno = $_REQUEST['panno'];
         $fullname = $_REQUEST['txtuser'];
         $design = $_REQUEST['designcode'];
         $station = $_REQUEST['stationcode'];
         $mobile = $_REQUEST['txtmobile'];
         $email = $_REQUEST['email'];
         $category = $_REQUEST['category'];
         $dept = $_REQUEST['deptcode'];
         $txtworkdepot = $_REQUEST['txtworkdepot'];
         $txtbasicpay = $_REQUEST['txtbasicpay'];
         $gradepay = $_REQUEST['txtgradepay'];
         $txtdob = $_REQUEST['txtdob'];
         $txtappointment = $_REQUEST['txtappointment'];
         $level = $_REQUEST['level'];
         $isupdated = '1';

          $dob_date=date('Y-m-d', strtotime($txtdob));
          $txtappointment=$_POST['txtappointment'];
          $app_date=date('Y-m-d', strtotime($txtappointment));

         // ($empid.''.$billunit.''.$panno.''.$fullname.''.$design.''.$station.''.$mobile.''.$email.''.$category.''.$dept.''.$txtworkdepot.''.$txtbasicpay.''.$gradepay.''.$dob_date.''.$app_date.''.$level.''.$isupdated);
          if(updateEmployee($empid,$billunit,$panno,$fullname,$design,$station,$mobile,$email,$category,$dept,$txtworkdepot,$txtbasicpay,$gradepay,$dob_date,$app_date,$level,$isupdated))
            echo "<script>alert('Update request sent to your incharge');window.location='../index.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../user_registration.php';</script>";
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

    case 'generatesummary':
      $selected_list_emp = $_REQUEST['selected_list_emp'];
    $selected_list = $_REQUEST['selected_list'];
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
      //echo $original_id;
      if(generatesummary($selected_list_emp,$selected_list,$title,$description))
      {
        echo "<script>alert('Summary has been generated successfully');window.location='../ApprovedList.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../ApprovedList.php';</script>";
      }
    break;

    case 'summarysend':
      $original_id = $_REQUEST['original_id'];
      $forwardName = $_REQUEST['forwardName'];
      $loginid = $_REQUEST['loginid'];
      //echo $original_id;
      if(summarysend($forwardName,$original_id,$loginid))
      {
        echo "<script> alert('Summary has been forwarded!'); window.location = '../index.php'; </script>";
      }
      else
      {
       echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
      }
    break;

    case 'establishment_send':
      $original_id = $_REQUEST['original_id'];
      $forwardName = $_REQUEST['forwardName'];
      //echo $original_id;
      if(establishment_send($forwardName,$original_id))
      {
        echo "<script>alert('Summary has been forwarded');window.location='../final_approved_list.php';</script>";
      }
      else
      {
       echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
      }
    break;
    case 'generatesummary':
      $selected_list_emp = $_REQUEST['selected_list_emp'];
    $selected_list = $_REQUEST['selected_list'];
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
      //echo $original_id;
      if(generatesummary($selected_list_emp,$selected_list,$title,$description))
      {
        echo "<script>alert('Summary has been generated successfully');window.location='../index.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
      }
    break;

    case 'AddDepotmaster':
        $deptid = $_REQUEST['deptid'];
        $stationcode = $_REQUEST['stationcode'];
        $depotname = $_REQUEST['depotname'];
        $status = 1;
        $sql=mysql_query("INSERT INTO `depot_master`(`stationcode`, `depot`, `dept_id`, `status`) VALUES ('".$stationcode."','".$depotname."','".$deptid."',".$status.") ");
          if($sql)
            echo "<script>alert('Depot Added successfully');window.location='../add_depot.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../add_depot.php';</script>";
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
    case 'default':
      echo "Invalid option";
    break;
  }
 ?>
