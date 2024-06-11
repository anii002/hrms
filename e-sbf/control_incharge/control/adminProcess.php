<?php
date_default_timezone_set("Asia/kolkata");

include('adminFunction.php');
  switch($_REQUEST['action'])
  {
	  case 'forward_form':
            $empid = $_REQUEST['empid'];
            $emp_no = $_REQUEST['emp_no'];
            $ref = $_REQUEST['ref_no'];
            $forwardName = $_REQUEST['fdname'];
            // $c_otp = $_REQUEST['c_otp'];

            $flag='0';
            dbcon();
            
            $query1 = "UPDATE `tbl_form_forward` SET `fw_status`='1' WHERE `ref_id`='".$ref."' AND forwarded_to='".$empid."'";
            $result1 = mysql_query($query1);

            $date=date('Y-m-d H:i:s');
            dbcon();
            
           $query = "INSERT into tbl_form_forward(empid,ref_id,forwarded_to,fw_date) values('".$emp_no."','".$ref."','".$forwardName."','".$date."')";
            $result = mysql_query($query);
                    
            if($result && $result1)
            {
                $flag='1';
            }
            else
            {
                $flag='0';
            }
            echo $flag;

    break;

    case 'reject_form':
            $empid_session = $_POST['empid_session'];
            $emp_no = $_POST['txt_emp_pf'];
            $ref = $_POST['ref_no'];
            
            
            dbcon1();
            $sql = "SELECT mobile FROM resgister_user WHERE emp_no = ".$emp_no;
            //echo $sql; 
            $result = mysql_query($sql);
            $row = mysql_fetch_assoc($result);
            //echo "<pre>"; print_r($row); exit;
            $mobile = $row['mobile'];
            
            dbcon();
             $query1 = "UPDATE `tbl_form_details` SET `rejected`='1', `rejected_by`='".$empid_session."' WHERE `reference_id`='".$ref."' AND emp_no='".$emp_no."'";
            
            $result1 = mysql_query($query1);

                    
            if($result1)
            {
                $message = "Your Application for SBF Form has been Rejected.";
                sendSMS($mobile, $message);
                echo "<script>alert('Successfully Rejected');window.location='../for_form.php';</script>";
            }
            else
            {
                echo "<script>alert('Something Went Wrong');window.location='../for_form.php';</script>";
            }
    break;
  	
        
    default:
      echo "Invalid option";
    break;
  }
 ?>
