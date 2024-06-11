<?php
date_default_timezone_set("Asia/kolkata");
echo date_default_timezone_get();

include('adminFunction.php');
  switch($_REQUEST['action'])
  {
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
    case 'changePass':
        $pass = $_REQUEST['pass'];
        $confirm = $_REQUEST['confirm'];
        if($pass==$confirm)
        {
			$_SESSION['pass']=$pass;
			$query = mysql_query("select * from employees where pfno='".$_SESSION['empid']."'");
			$count = mysql_num_rows($query);
			$result_set = mysql_fetch_array($query);
			if($count>0)
			{
				$otp = rand(999,10000);
				
				// Code to Send sms starts here
				  				  
				  //Your authentication key
					$authKey = "70302AbSftnyOwtvs53d8e401";
					
					//Multiple mobiles numbers separated by comma
					$mobileNumber = $result_set['mobile'];
					
					//Sender ID,While using route4 sender id should be 6 characters long.
					$senderId = "FINSUR";
					
					//Your message to send, Add URL encoding here.
					$msg = "Your OTP for TAMM Change password is $otp";
					$message = urlencode("$msg");
					
					//Define route 
					$route = 4;
					//Prepare you post parameters
					$postData = array(
					'authkey' => $authKey,
					'mobiles' => $mobileNumber,
					'message' => $message,
					'sender' => $senderId,
					'route' => $route
					);
					
					//API URL
					$url="http://smsindia.techmartonline.com/sendhttp.php";
					
					//init the resource
					$ch = curl_init();
					curl_setopt_array($ch, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $postData
					//,CURLOPT_FOLLOWLOCATION => true
					));
					
					
					//Ignore SSL certificate verification
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					
					
					//get response
					$output = curl_exec($ch);
					
					//Print error if any
					if(curl_errno($ch))
					{
					echo 'error:' . curl_error($ch);
					}
					else{
						
					$query_insert = mysql_query("insert into tbl_otp(empid,otp,sent) values('".$_SESSION['empid']."','$otp',CURRENT_TIMESTAMP)");
						echo "<script>alert('OTP has been sent on your registered mobile ".$result_set['mobile'].".');window.location='../changepassword.php';</script>";
					}
					curl_close($ch);
				
			}
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
        $gradepay = $_REQUEST['gradepay'];
        $fullname = $_REQUEST['fullname'];
        $dept = $_REQUEST['dept'];
        $billunit = $_REQUEST['billunit'];
        $design = $_REQUEST['design'];
        $mobile = $_REQUEST['mobile'];
        $station = $_REQUEST['station'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
          if(addEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address))
            echo "<script>alert('Employee Added successfully');window.location='../user_registration.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../user_registration.php';</script>";
    break;
    case 'updateEmployee':
        $empid = $_REQUEST['uempid'];
        $gradepay = $_REQUEST['ugradepay'];
        $fullname = $_REQUEST['ufullname'];
        $dept = $_REQUEST['udept'];
        $billunit = $_REQUEST['ubillunit'];
        $design = $_REQUEST['udesign'];
        $mobile = $_REQUEST['umobile'];
        $station = $_REQUEST['ustation'];
        $email = $_REQUEST['uemail'];
        $address = $_REQUEST['uaddress'];
        $update_id = $_REQUEST['update_id'];
          if(updateEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address,$update_id))
            echo "<script>alert('Employee Updated successfully');window.location='../user_registration.php';</script>";
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
        $set = $_REQUEST['set'];
        $months = implode(",",$_REQUEST['month']);
        $ref = rand(10000,999999);
        $reference = $empid."/".$year."/".$ref;
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
          $data['objective'][$i] =  $_REQUEST["objective0"];
        }
        if(claimTA($data,$reference,$empid,$year,$months,$cnt,$set))
          echo "<script>alert('User Claim added successfully');window.location='../Show_claimed_TA.php?ref=$reference';</script>";
        else
          echo "<script>alert('Something went wrong');window.location='../TA_Entry_Form.php';</script>";

    break;
    case 'addclaimTA':
        $cnt = $_REQUEST['hide_count'];
        $empid = $_REQUEST['empid'];
        $year = $_REQUEST['year'];
        $months = $_REQUEST['month'];
        $set = $_REQUEST['set'];
        $reference = $_REQUEST['reference'];
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
          $data['objective'][$i] =  $_REQUEST["objective0"];
        }
        if(addclaimTA($data,$reference,$empid,$year,$months,$cnt,$set))
          echo "<script>alert('User Claim added successfully');window.location='../Show_claimed_TA.php?ref=$reference';</script>";
        else
          echo "<script>alert('Something went wrong');window.location='../TA_Entry_Form.php';</script>";

    break;

    case 'getTaAmount':
        $level = $_REQUEST['level'];
          echo getTaAmount($level);
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
	
	
	
	case 'adminapprove':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $original_id = $_REQUEST['original_id'];
      //echo $original_id;
      if(adminapprove($empid,$ref,$original_id))
      {
        echo "<script>alert('Travelling Allowance Claim Approved');window.location='../Show_claimed_TA.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
      }
    break;
	
	case 'admincancel':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $original_id = $_REQUEST['original_id'];
      //echo $original_id;
      if(admincancel($empid,$ref,$original_id))
      {
        echo "<script>alert('Travelling Allowance Claim returned');window.location='../Show_returned_TA.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../Show_returned_TA.php';</script>";
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
      //echo $original_id;
      if(summarysend($forwardName,$original_id))
      {
        echo "<script>alert('Summary has been forwarded to ADFM');window.location='../Show_claimed_TA.php';</script>";
      }
      else
      {
       echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
      }
    break;
	
	case 'establishment_send':
      $original_id = $_REQUEST['original_id'];
      $forwardName = $_REQUEST['forwardName'];
      //echo $original_id;
      if(establishment_send($forwardName,$original_id))
      {
        echo "<script>alert('Summary has been forwarded');window.location='../Show_claimed_TA.php';</script>";
      }
      else
      {
       echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
      }
    break;
	
	case 'finalapprove':
      $original_id = $_REQUEST['original_id'];
      //echo $original_id;
      if(finalapprove($original_id))
      {
        echo "<script>alert('Summary has been Approved');window.location='../level_summary_report.php';</script>";
      }
      else
      {
       echo "<script>alert('Something went wrong');window.location='../level_summary_report.php';</script>";
      }
    break;
	
    case 'default':
      echo "Invalid option";
    break;
  }
 ?>
