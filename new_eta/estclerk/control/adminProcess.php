<?php
date_default_timezone_set("Asia/kolkata");
include('adminFunction.php');
include('function.php');

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
    
     case 'already':
                //$data=0;
                $id=$_POST['id'];
                $sql=mysql_query("Select empid from users where empid='".$id."'");
                //echo "Select empid from users where empid='".$id."'";
                echo mysql_num_rows($sql);
               
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
            echo "<script>alert('Failed to add employee');window.location='../user_registration.php';</script>";
    break;
    case 'FetchEmployee':
        $id = $_REQUEST['id'];
          echo FetchEmployee($id);
    break;
    case 'fetchEmployee1':
        $id = $_REQUEST['id'];
          echo fetchEmployee1($id);
    break;
    case 'deleteEmployee':
        $delete_id = $_REQUEST['id'];
          if(deleteEmployee($delete_id))
            echo "Employee Details Deleted successfully";
          else
            echo "Failed to delete employee";
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

    case 'approve':
  
        $data=$_POST['emp_pfno_data'];
        $ref_nos=(explode(" ",$data[0]));
        $date=date('Y-m-d h:i:s');
        // print_r($ref_nos);
        $cnt=count($ref_nos);
        for($i = 0; $i < $cnt; $i++)
        {
            $query1 = "UPDATE taentry_master set est_approve='1' where reference_no='".$ref_nos[$i]."'";
            $result1=mysql_query($query1);
        }
        
        $query = "UPDATE master_summary set estcrk_status='1',EST_approved_time='".$date."' where summary_id='".$_POST['sumid']."'";
        $result = mysql_query($query) or die(mysql_error());
         
        if($result)
        {
            $empid=$empid_session;
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Accountant Approved '. $_POST['sumid'].' TA summary';
            user_activity($empid,$file_name,'Approve TA Summary',$msg);
            echo "<script>alert('Travelling Allowance Claim Approved');window.location='../approve_list.php';</script>";
        }
        else
        {
             $empid=$empid_session;
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Accountant unable to  Approve '. $_POST['sumid'].' TA summary';
            user_activity($empid,$file_name,'Approve TA Summary',$msg);
            echo "<script>alert('Something went wrong');window.location='../approve_summary.php';</script>";
        }
     
      break;
      
      
      
    case 'rejectTA_ESTCLERK':
        $ciempid=$_POST['coempid'];
        $pmempid=$_POST['pmempid'];
        $ref_no=$_POST['ref_no'];
        $reason=$_POST['reason'];
        $role=$_SESSION['role'];
        $off_name=get_employee($ciempid);
        $off_role=getrole($role);
        
        $query_select1 = mysql_query("SELECT TAMonth,TAYear,SUM(taentrydetails.amount)as amount from taentry_master,taentrydetails WHERE taentry_master.reference_no=taentrydetails.reference_no AND taentry_master.empid=taentrydetails.empid AND taentry_master.empid='".$pmempid."' AND taentry_master.reference_no='".$ref_no."' ");
        $result1 = mysql_fetch_array($query_select1);
    
        $month_array=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
    
        $s=$result1['TAMonth'];
        $y=$result1['TAYear'];
        $amt=$result1['amount'];
        
        if($month_array[$s])
        {
           $mon=$month_array[$s];
        }
            
        $query2 = mysql_query("SELECT mobile FROM employees WHERE pfno='".$pmempid."'");
        $result_set = mysql_fetch_array($query2);
        //Your authentication key
        $authKey = "70302AbSftnyOwtvs53d8e401";
        
        //Multiple mobiles numbers separated by comma
        $mobileNumber = $result_set['mobile'];
        
        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "FINSUR";
        
        //Your message to send, Add URL encoding here.
        $msg = "Your TA for the month of $mon - $y with $ref_no reference number has been rejected by $off_name($off_role).";
        // $msg = "Your TA claim with $ref reference number has been submitted successfully.";
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
        else
        {
            $update_tamaster="UPDATE taentry_master set is_rejected=1,rejected_by='".$ciempid.",".$role."',reason='".$reason."' where empid='".$pmempid."' AND reference_no='".$ref_no."'";
            $result=mysql_query($update_tamaster);
            if(mysql_affected_rows() >= 0)
            {
              $drop="DELETE from forward_data where empid='".$pmempid."' AND reference_id='".$ref_no."' ";
                $result1=mysql_query($drop);
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                $msg='Accountant reject '.$pmempid.' employee TA';
                user_activity($ciempid,$file_name,'Reject TA',$msg);
              echo "<script>alert('Claim rejected successfully...'); window.location='../summary_report_details.php';</script>";
            }
            else
            {
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                $msg='Accountant unable to reject '.$pmempid.' employee TA';
                user_activity($ciempid,$file_name,'Reject TA',$msg);
              echo "<script>alert('Something Wrong'); window.location='../summary_report_details.php';</script>";
            }
        }

    break;

    case 'AddEmployee':
        $empid = $_REQUEST['empid'];
        $pannumber = $_REQUEST['pannumber'];
        $empname = $_REQUEST['empname'];
        $billunit = $_REQUEST['billunit'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];
        $design = $_REQUEST['design'];
        $paylevel = $_REQUEST['paylevel'];
        $button = $_REQUEST['button'];
        $update_id = $_REQUEST['update_id'];
        if($button=="update")
        {
          if(updateEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel,$update_id))
            echo "<script>alert('Employee Updated successfully');window.location='../employee_registration.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
        }
        else
        {
          if(AddEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel))
            echo "<script>alert('Employee Added successfully');window.location='../employee_registration.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
        }
    break;
    case 'fetchEmployee':
      $id = $_REQUEST['id'];
      $result = fetchEmployee($id);
      echo $result; 
    break;
    case 'AddDeptAdmin':
        $empid = $_REQUEST['empid'];
        $username = $_REQUEST['username'];
        $psw = $_REQUEST['psw'];
        $dept = $_REQUEST['dept'];
        if(AddAdmin($empid,$username,$psw,$dept))
            echo "<script>alert('Department Admin Added successfully');window.location='../add_user.php';</script>";
          else
            echo "<script>alert('Failed to add department admin');window.location='../add_user.php';</script>";
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
    
    
    case 'view_conti':
        $data='';

        $query = "SELECT * FROM `master_cont` WHERE reference_no = '".$_POST['ref_no']."' AND set_no='".$_POST['set_no']."' ";

        $result=mysql_query($query);
        echo mysql_error();

        $row_data=mysql_num_rows($result);        
        if($row_data == 1)
        {
            $query1 = "SELECT * FROM `add_cont` WHERE reference_no = '".$_POST['ref_no']."' AND set_no='".$_POST['set_no']."' ";
            $result1=mysql_query($query1);
            $cnt= 1;$sum = 0;$obj='';
            $data.='<table class="table table-inverse " style="font-size: 15px" id="" border="1">
                    <thead>
                      <tr>
                        <th >Sr. No.</th>
                        <th >Date</th>
                        <th >From</th>
                        <th >To</th>
                        <th >KM Rate</th>
                        <th >KM</th>
                        <th >Amount</th>            
                      </tr> 
                    </thead><tbody>';
            while($sql_res=mysql_fetch_array($result1)){
              $data .= "<tr>
              <td>".$cnt."</td>
              <td>".$sql_res['cont_date']."</td>
              <td>".$sql_res['from_place']."</td>
              <td>".$sql_res['to_place']."</td>
              <td>".$sql_res['rate']."</td>
              <td>".$sql_res['kms']."</td>
              <td>".$sql_res['amount']."</td>
              </tr>
              ";
              $obj=$sql_res['objective'];
              $cnt++;
              $sum = $sum + (int)$sql_res['amount'];
            }
            $data .= "<tr><td colspan='1' class='text-left' style='text-align:right'><b>Objective</b></td><td colspan='6'>$obj</td></tr><tr><td colspan='1' class='text-left' style='text-align:right'><b>Total</b></td><td colspan='6'>$sum</td></tr></tbody></table>";
        }
        else
        {
          $data.="0";
        }
      
        echo $data;
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
		
		case "applybillunit":
        $billunit = implode(",", $_POST['billunit']);
        if(applybillunit($_REQUEST['empid'],$billunit))
        {
             echo "<script>alert('Bill Unit applied to User');window.location='../apply_billunit.php';</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
        }
    break;

    case "deletebillunitemp":
        $query = mysql_query("delete from sep_billunit where employee_id='".$_REQUEST['deleteemp']."'");
        if($query)
        {
             echo "<script>alert('User removed successfully');window.location='../apply_billunit.php';</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
        }
    break;

    case "updatebillemp":
        $billunit = implode(",", $_REQUEST['updatebill']);
        $update_sql = "update sep_billunit set billunit='".$billunit."' where employee_id='".$_REQUEST['updateemp']."'";
        $query = mysql_query($update_sql);
        echo mysql_error();
        if($query)
        {
             echo "<script>alert('User bill unit applied successfully');window.location='../apply_billunit.php';</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
        }
    break;
    
    case 'get_summary1':
        
        $data='';
        $query1="SELECT summary_id FROM master_summary WHERE MONTH(EST_approved_time) ='".$_POST['mon']."' ";
        $result1=mysql_query($query1);
        echo mysql_error();
        $cnt_m=0;
        
        $emp_cnt=1;
        $count=mysql_num_rows($result1);
        while($row_m=mysql_fetch_array($result1))
        {  
             $cnt_m++;
            $data.= get_summary($row_m['summary_id']);
        }
        
        if($cnt_m == 0)
        {
             $empid=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Accountant getting TA summary Report BUT data not found';
            user_activity($empid,$file_name,'TA Summary Report',$msg);
            echo "<tr> <td colspan='17'>No Data Found.</td></tr>";
        }
        else
        {
            $empid=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Accountant getting TA summary Report';
            user_activity($empid,$file_name,'TA Summary Report',$msg);
            echo $data;
        }

    break;
    
    case 'get_all_summary':
        
        $dept_no=$_POST['dept_no'];
        $mon=date('m',strtotime($_POST['mon']));
        $year=date('Y',strtotime($_POST['mon']));
        // exit();
        $data='';
        
        // $query1="SELECT DISTINCT(DEPTNO) FROM `department` WHERE DEPTNO NOT IN(01) ORDER BY DEPTNO ASC";
        // $result1=mysql_query($query1);
        // echo mysql_error();
        $count=mysql_num_rows($result1);
        
        $data.="<tr class='fontcss1' style='text-align: center;'>";
       
        $data.= get_all_summary($dept_no,$mon,$year);
        
        if($data == '')
        {
             $empid=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Accountant getting All TA summary Report BUT data not found';
            user_activity($empid,$file_name,'TA All Summary Report',$msg);
            echo "<tr> <td colspan='5'>No Data Found.</td></tr>";
           
        }
        else
        {
            $empid=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Accountant getting All TA summary Report BUT data not found';
            user_activity($empid,$file_name,'TA All Summary Report',$msg);
            echo $data;
        }

    break;
    
    case 'cont_approve':
  
        $sumid=$_POST['sumid'];
        $date=date('Y-m-d h:i:s');
    
        $query = "UPDATE master_summary_cont set estcrk_status='1',EST_approved_time='".$date."' where summary_id='".$_POST['sumid']."'";
        $result = mysql_query($query) or die(mysql_error());
         
        if($result)
        {
            $empid=$empid_session;
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Accountant Approved '. $sumid.' Contingency summary';
            user_activity($empid,$file_name,'Approve Contingency Summary',$msg);
            echo "<script>alert('Travelling Allowance Claim Approved');window.location='../approve_list_cont.php';</script>";
        }
        else
        {
            $empid=$empid_session;
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Accountant unable to Approve '. $sumid.' Contingency summary';
            user_activity($empid,$file_name,'Approve Contingency Summary',$msg);
            echo "<script>alert('Something went wrong');window.location='../approve_summary_cont.php';</script>";
        }
     
      break;
      
      case 'rejectCont_CO_PM':
    $ciempid = $_POST['coempid'];
    $ref_no = $_POST['ref_no'];
    $reason = $_POST['reason'];

    $update_tamaster = "UPDATE continjency_master set is_rejected=1,rejected_by='" . $ciempid . "," . $_POST['role'] . "',reason='" . $reason . "' where reference='" . $ref_no . "'";
    $result = mysql_query($update_tamaster);

    if (mysql_affected_rows() >= 0) 
    {
      $drop = "DELETE from forward_data where reference_id='" . $ref_no . "' ";
      $result1 = mysql_query($drop);
          $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        $msg='Accountant reject employee Contingency ref_no '.$ref_no;
        user_activity($ciempid,$file_name,'Reject Contingency',$msg);
      echo "<script>alert('Contingency rejected successfully..'); window.location='../summary_report_details_cont.php';</script>";
    } else {
        $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        $msg='Accountant unable to reject employee Contingency ref_no '.$ref_no;
        user_activity($ciempid,$file_name,'Reject Contingency',$msg);
      echo "<script>alert('Something Wrong'); window.location='../summary_report_details_cont.php';</script>";
    }
    break;

    default:
      echo "Invalid option";
    break;
  }
 ?>
