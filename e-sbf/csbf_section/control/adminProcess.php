<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');
  switch($_REQUEST['action'])
  {
	  case 'approve_form':
        $ref_id     = $_REQUEST['ref_no'];
        $username   = $_REQUEST['empid_session'];
        $conn=dbcon();
        $query = "UPDATE tbl_form_forward set fw_status='1' where ref_id='".$ref_id."' AND forwarded_to = '".$username."'";
        $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
     
      if($result)
      {
          echo "<script>alert('Form Approved Successfully');window.location='../for_form.php';</script>";
      }
      else
      {
          echo "<script>alert('Something went wrong');window.location='../sub_forms.php';</script>";
      }
    break;

    case 'reject_form':
            $empid_session = $_POST['empid_session'];
            $emp_no = $_POST['txt_emp_pf'];
            $ref = $_POST['ref_no'];

            $conn=dbcon();
            
             $query1 = "UPDATE `tbl_form_details` SET `rejected`='1', `rejected_by`='".$empid_session."' WHERE `reference_id`='".$ref."' AND emp_no='".$emp_no."'";
            
            $result1 = mysqli_query($conn,$query1);

                    
            if($result1)
            {
                echo "Successfully Rejected";
            }
            else
            {
                echo "Something Went Wrong";
            }
    break;

    default:
      echo "Invalid option";
    break;
  }
 ?>
