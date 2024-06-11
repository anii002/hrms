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
			$query = mysql_query("select * from employees where id='".$_SESSION['id']."'");
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
					$msg = "Your OTP for TAMM Employee Change password is $otp";
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

    case 'default':
      echo "Invalid option";
    break;
  }
 ?>
