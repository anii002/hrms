<?php
date_default_timezone_set("Asia/kolkata");
include('../../dbconfig/dbcon.php');
include('adminFunction.php');

switch ($_REQUEST['action']) {
  case 'fetchEmployee1':
    $id = $_REQUEST['id'];
    echo fetchEmployee1($id);
    break;
  case 'changeimg':
    if (changeimg($_FILES["profile"]["name"], $_FILES["profile"]["tmp_name"])) {
      echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
    } else {
      echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
    }
    break;


  case 'role_transfer':
    $pfno = $_POST['emp_pfno1'];
    $transfer_emp_id = $_POST['transfer_emp_id'];
    $date = date("Y-m-d H:i:s");
    $sql_role_transfer_select = "UPDATE `forward_data` SET `fowarded_to`='" . $transfer_emp_id . "', `arrived_time`='" . $date . "' WHERE `fowarded_to`='" . $pfno . "' AND hold_status='1' ";

    $rst_role_transfer = mysqli_query($conn, $sql_role_transfer_select);
    if ($rst_role_transfer) {
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC role transfer of ' . $pfno . ' user to ' . $transfer_emp_id . ' user';
      user_activity($pfno, $file_name, 'Role Transfer Of user', $msg);
      echo "<script>alert(Role Transfer successfully');window.location='../add_user.php';</script>";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC unable to role transfer of ' . $pfno . ' user to ' . $transfer_emp_id . ' user';
      user_activity($pfno, $file_name, 'Role Transfer Of user', $msg);
      echo "<script>alert('Something went wrong');window.location='../update_emp.php';</script>";
    }
    break;

  case 'fetchEmployeeUpdated':
    $id = $_REQUEST['id'];
    echo fetchEmployeeUpdated($id);
    break;

  case 'updateEmpData':
    $pfno = $_POST['emp_pfno'];
    $designation = ($_POST['emp_desig']);
    $mobile = $_POST['emp_mobile'];
    $level = $_POST['emp_level'];
    $emp_station = $_POST['emp_station'];
    $emp_role = $_POST['emp_role'];
    $stst = implode(",", $_POST['emp_station']);
    // echo $pfno.'_'.$designation.'_'.$stst.'_'.$mobile.'_'.$level.'_'.$emp_role;

    // print_r($stst);
    if (updateEmpData($pfno, $designation, $stst, $mobile, $level, $emp_role))
      echo "<script>alert('User Data Updated successfully');window.location='../add_user.php';</script>";
    else
      echo "<script>alert('Something went wrong');window.location='../update_emp.php';</script>";
    break;




  case 'updateEmpData1':
    $id = $_POST['id'];
    $pfno = $_POST['txtpfno'];
    $billunit = $_POST['billunit'];
    $panno = $_POST['panno'];
    $empname = $_POST['name'];
    $designation = ($_POST['designation_id']);
    $station = ($_POST['station_id']);
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $catg = $_POST['catg'];
    $dept = ($_POST['dept_id']);
    $depot_id = ($_POST['depot_id1']);
    $bp = $_POST['bp'];
    $gp = $_POST['gp'];
    $bdate = $_POST['bdate'];
    $apdate = $_POST['apdate'];
    $level = $_POST['level'];

    $date1 = str_replace('/', '-', $bdate);
    $bdate = date("Y-m-d", strtotime($date1));

    $date2 = str_replace('/', '-', $apdate);
    $apdate = date("Y-m-d", strtotime($date2));

    // echo $id.'_'.$pfno.'_'.$billunit.'_'.$panno.'_'.$empname.'_'.$designation.'_'.$station.'_'.$mobile.'_'.$email.'_'.$catg.'_'.$dept.'_'.$depot_id.'_'.$bp.'_'.$gp.'_'.$bdate.'_'.$apdate.'_'.$level;
    if (updateEmpData1($id, $pfno, $billunit, $panno, $empname, $designation, $station, $mobile, $email, $catg, $dept, $depot_id, $bp, $gp, $bdate, $apdate, $level)) {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC approve the update details request of ' . $pfno . ' BO';
      user_activity($empid1, $file_name, 'Approve BO details', $msg);
      echo "<script>alert('User Data Updated successfully');window.location='../update_ci_details.php';</script>";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC unable to approve the update details request of ' . $pfno . ' BO';
      user_activity($empid1, $file_name, 'Approve BO details', $msg);
      echo "<script>alert('Something went wrong');window.location='../update_ci_details.php';</script>";
    }
    break;

  case 'activeUser':
    $active = '1';
    $pfno = $_REQUEST['id'];
    $role = $_REQUEST['role'];
    if (activeUser($pfno, $active, $role)) {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC active the ' . $pfno . ' user';
      db_connect("drmpsurh_travel_allowance1");
      user_activity($empid1, $file_name, 'Active User', $msg);
      echo "User Activated successfully";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC unable to active the ' . $pfno . ' user';
      db_connect("drmpsurh_travel_allowance1");
      user_activity($empid1, $file_name, 'Active User', $msg);
      echo "Something went wrong";
    }
    break;

  case 'deactiveUser':
    $active = '0';
    $pfno = $_REQUEST['id'];
    $role = $_REQUEST['role'];
    if (deactiveUser($pfno, $active, $role)) {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC deactive the ' . $pfno . ' user';
      db_connect("drmpsurh_travel_allowance1");
      user_activity($empid1, $file_name, 'Deactive User', $msg);
      echo "User Deactivated successfully";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC unable to deactive the ' . $pfno . ' user';
      db_connect("drmpsurh_travel_allowance1");
      user_activity($empid1, $file_name, 'Deactive User', $msg);
      echo "Something went wrong";
    }
    break;

  case 'activeDepot':
    $active = '1';
    $id = $_REQUEST['id'];
    if (activeDepot($id, $active))
      echo "Depot Activated successfully";
    else
      echo "Something went wrong";
    break;

  case 'fwESTCLERK':
    $date = date("Y-m-d h:i:s");
    $sumid = $_POST['sumid'];
    $u_query = mysqli_query($conn, "UPDATE master_summary SET forward_status='1',DA_approved_time='" . $date . "',is_gazetted='1' where summary_id='" . $sumid . "' ");
    echo mysqli_error($conn);

    if ($u_query) {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC Forward the ' . $sumid . ' summary to APO sir';
      user_activity($empid1, $file_name, 'Forward Summary', $msg);
      echo "<script>alert('successfully forwarded to APO sir..');window.location='../gen_summary_report.php';</script>";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC unable to Forward the ' . $sumid . ' summary to APO sir';
      user_activity($empid1, $file_name, 'Forward Summary', $msg);
      echo "<script>alert('Failed to Forward...');window.location='../summary_report.php';</script>";
    }

    break;

  case 'deactiveDepot':
    $active = '0';
    $id = $_REQUEST['id'];
    if (deactiveDepot($id, $active))
      echo "Depot Deactivated successfully";
    else
      echo "Something went wrong";
    break;

  case 'generatePassword':
    $id = $_REQUEST['id'];
    $otp = 0;
    if ($id) {
      $otp = rand(999, 10000);
      $query1 = "UPDATE `users` SET `password`='" . hashPassword($otp, SALT1, SALT2) . "' WHERE `username`='" . $id . "'";
      $res1 = mysqli_query($conn, $query1);
      echo mysqli_error($conn);
      if ($res1) {
        echo $otp;
      } else {
        echo "0";
      }
    } else {
      echo "0";
    }
    break;

  case 'updateUser':
    $fname = $_REQUEST['fname'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $design = $_REQUEST['design'];
    $dept = $_REQUEST['dept'];
    if (updateUser($fname, $email, $mobile, $design, $dept))
      echo "<script>alert('User details updated successfully');window.location='../profile.php';</script>";
    else
      echo "<script>alert('User details not updated');window.location='../profile.php';</script>";
    break;

  case 'admincancel':
    $empid = $_REQUEST['empid'];
    $ref = $_REQUEST['ref'];
    $original_id = $_REQUEST['original_id'];
    //echo $original_id;
    if (admincancel($empid, $ref, $original_id)) {
      echo "<script>alert('Travelling Allowance Claim returned');window.location='../Show_claimed_TA.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
    }
    break;

  case 'changePass':
    $pass = $_REQUEST['pass'];
    $confirm = $_REQUEST['confirm'];
    if ($pass == $confirm) {
      if (changePass($pass, $confirm))
        echo "<script>alert('User Password changed successfully');window.location='../profile.php';</script>";
      else
        echo "<script>alert('User Password not changed');window.location='../profile.php';</script>";
    } else {
      echo "<script>alert('Confirm password must match with password');window.location='../profile.php';</script>";
    }
    break;


  case 'check_date':

    $year = date('Y');
    $data = '';
    $month = $_POST['month'];

    $query1 = "SELECT reference_no,forward_status FROM `taentry_master` WHERE TAMonth='" . $month . "' AND TAYear='" . $year . "' AND empid='" . $_POST['u_pfno'] . "' ";
    $result = mysqli_query($conn, $query1);
    $rows = mysqli_num_rows($conn, $query1);
    $val = mysqli_fetch_array($result);
    if ($rows == 1) {
      $data = $val['reference_no'];
    } else {
      $data = "claimed";
    }
    echo $data;

    break;


  case 'otp_forward_ta':

    $forwardName = $_REQUEST['forwardName'];
    $empid = $_REQUEST['empid'];
    $ref_no = $_REQUEST['ref_no'];

    if ($forwardName) {
      $_SESSION['forwardName'] = $forwardName;
      $_SESSION['main_empid'] = $empid;
      $_SESSION['ref_no'] = $ref_no;
      $flag = 0;
      // echo  "select mobile from employees where id='".$empid."'";
      $query = mysqli_query($conn, "select mobile from employees where pfno='" . $empid . "'");
      $count = mysqli_num_rows($query);
      $result_set = mysqli_fetch_array($query);
      if ($count > 0) {
        $otp = rand(999, 10000);

        // Code to Send sms starts here

        //Your authentication key
        $authKey = "70302AbSftnyOwtvs53d8e401";

        //Multiple mobiles numbers separated by comma
        $mobileNumber = $result_set['mobile'];

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "FINSUR";

        //Your message to send, Add URL encoding here.
        $msg = "$otp is the OTP for your TA CALIM FORWARDING. NEVER SHARE YOUR OTP WITH ANYONE.";
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
        $url = "http://smsindia.techmartonline.com/sendhttp.php";

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
        if (curl_errno($ch)) {
          echo 'error:' . curl_error($ch);
        } else {

          $query_insert = mysqli_query($conn, "insert into tbl_otp(empid,otp,sent) values('" . $empid . "','$otp',CURRENT_TIMESTAMP)");
          //echo "<script>alert('OTP has been sent o$conn,n your registered mobile ".$result_set['mobile'].".');window.location='../profile.php';</script>";
          $flag = $result_set['mobile'];
        }
        curl_close($ch);
      }
    } else {
      $flag = "0";
    }
    echo $flag;

    break;


  case 'AddDesign':
    $design = $_REQUEST['design'];
    if (AddDesign($design))
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
    if (UpdateDesign($update_design, $update_id))
      echo "<script>alert('Designation Updated successfully');window.location='../Designation.php';</script>";
    else
      echo "<script>alert('Something went wrong');window.location='../Designation.php';</script>";
    break;
  case 'DeleteDesign':
    $delete_id = $_REQUEST['delete_id'];
    if (DeleteDesign($delete_id))
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
    if (isset($_POST['submit'])) {
      if (addEmployee($empid, $pan, $fullname, $billunit, $mobile, $gradepay, $design, $level)) {
        echo "<script>alert('Employee Added successfully');window.location='../employee_registration.php';</script>";
      } else {
        echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
      }
    } else {
      if (updateEmployee($empid, $pan, $fullname, $billunit, $mobile, $gradepay, $design, $level, $_POST['update_id'])) {
        echo "<script>alert('Employee data updated successfully...');window.location='../employee_registration.php';</script>";
      } else {
        echo "<script>alert('Failed to update employee data...');window.location='../employee_registration.php';</script>";
      }
    }
    break;
  case 'forward_returned_ta':
    $empid = $_REQUEST['empid'];
    $ref = $_REQUEST['ref'];
    $forwardName = $_REQUEST['forwardName'];
    //echo $original_id;
    if (forward_returned_ta($empid, $ref, $forwardName)) {
      echo "<script>alert('Travelling Allowance Claim reforwarded');window.location='../Show_claimed_TA.php';</script>";
    } else {
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
    $forwardName = $_REQUEST['forwardName'];
    $isupdated = '1';

    $date1 = str_replace('/', '-', $txtdob);
    $dob_date = date("Y-m-d", strtotime($date1));

    $date2 = str_replace('/', '-', $txtappointment);
    $app_date = date("Y-m-d", strtotime($date2));

    if (updateEmployee($empid, $billunit, $panno, $fullname, $design, $station, $mobile, $email, $category, $dept, $txtworkdepot, $txtbasicpay, $gradepay, $dob_date, $app_date, $level)) {
      // $empid=$_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      user_activity($empid, $file_name, 'Update Details', 'PC updating the bio details');
      echo "<script>alert('Employee Updated successfully');window.location='../update_emp.php';</script>";
    } else {
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      user_activity($empid, $file_name, 'Update Details', 'PC unable to update the bio details');
      echo "<script>alert('Something went wrong');window.location='../update_emp.php';</script>";
    }
    break;
  case 'FetchEmployee':
    $id = $_REQUEST['id'];
    echo FetchEmployee($id);
    break;
  case 'deleteEmployee':
    $delete_id = $_REQUEST['delete_id'];
    if (deleteEmployee($delete_id))
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
    $months = implode(",", $_REQUEST['month']);
    $ref = rand(10000, 999999);
    $reference = $empid . "/" . $year . "/" . $ref;

    $objective =  $_REQUEST["objective0"];
    $data = [];
    for ($i = 0; $i <= $cnt; $i++) {
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
    if (claimTA($data, $reference, $empid, $year, $months, $cnt, $set, $objective, $journey_type, $cardpass))
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
    for ($i = 0; $i <= $cnt; $i++) {
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
    if (addclaimTA($data, $reference, $empid, $year, $months, $cnt, $set, $objective, $journey_type, $cardpass))
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
    $ref = $_REQUEST['ref_no'];
    $forwardName = $_REQUEST['fdname'];
    $c_otp = $_REQUEST['c_otp'];


    $query_select = mysqli_query($conn, "select otp from tbl_otp where empid='" . $empid . "' order by id DESC limit 1");
    $result = mysqli_fetch_array($query_select);

    $query_select1 = mysqli_query($conn, "SELECT TAMonth,TAYear,SUM(taentrydetails.amount)as amount from taentry_master,taentrydetails WHERE taentry_master.reference_no=taentrydetails.reference_no AND taentry_master.empid=taentrydetails.empid AND taentry_master.empid='" . $empid . "' AND taentry_master.reference_no='" . $ref . "' ");
    $result1 = mysqli_fetch_array($query_select1);

    $month_array = array("01" => "Jan", "02" => "Feb", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "Aug", "09" => "Sept", "10" => "Oct", "11" => "Nov", "12" => "Dec");

    $s = $result1['TAMonth'];
    $y = $result1['TAYear'];
    $amt = $result1['amount'];

    if ($month_array[$s]) {
      $mon = $month_array[$s];
    }


    // echo $result['otp'];
    if ($result['otp'] == $c_otp) {
      $query1 = "UPDATE `taentry_master` SET `forward_status`='1' WHERE `empid`='" . $empid . "' AND `reference_no`='" . $ref . "' ";
      $result1 = mysqli_query($conn, $query1);

      if ($c_otp) {
        $date = date('Y-m-d H:i:s');
        $query = "INSERT into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('" . $empid . "','" . $ref . "','" . $forwardName . "','" . $date . "','1')";
        $result = mysqli_query($conn, $query);
        $query2 = mysqli_query($conn, "SELECT mobile FROM employees WHERE pfno='" . $empid . "'");
        $result_set = mysqli_fetch_array($query2);
        //Your authentication key
        $authKey = "70302AbSftnyOwtvs53d8e401";

        //Multiple mobiles numbers separated by comma
        $mobileNumber = $result_set['mobile'];

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "FINSUR";

        //Your message to send, Add URL encoding here.
        $msg = "Your TA claim for month of $mon - $y  and  amount $amt with $ref reference number has been submitted successfully.";
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
        $url = "http://smsindia.techmartonline.com/sendhttp.php";

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
        if (curl_errno($ch)) {
          echo 'error:' . curl_error($ch);
        }

        curl_close($ch);
        $flag = '1';
      } else {
        $flag = '0';
      }
    } else {
      $flag = '-1';
    }
    echo $flag;

    break;

  case 'forward_TA':
    $empid = $_REQUEST['empid'];
    $ref = $_REQUEST['ref'];
    $forwardName = $_REQUEST['forwardName'];

    if (forward_TA($empid, $ref, $forwardName)) {
      echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
    }
    break;

  case 'approveAndForward':
    $empid = $_REQUEST['empid'];
    $ref = $_REQUEST['ref'];
    $forwardName = $_REQUEST['forwardName'];
    $original_id = $_REQUEST['original_id'];
    //echo $original_id;
    if (approveAndForward($empid, $ref, $forwardName, $original_id)) {
      echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
    }
    break;

  case 'forward_bill':
    $empid = $_REQUEST['empid'];
    $ref = $_REQUEST['ref'];
    $forwardName = $_REQUEST['forwardName'];
    if (forward_bill($empid, $ref, $forwardName)) {
      echo "<script>alert('Claimed Contigency bill forwarded');window.location='../show_cont.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../show_cont.php';</script>";
    }
    break;

  case 'validate_date':
    echo validate_date($_REQUEST['date']);
    break;

  case 'validateReference':
    echo validateReference($_REQUEST['date'], $_REQUEST['month']);
    break;


  case 'deleteclaim':
    $reference = $_POST['ref_no'];
    $set_no = $_POST['set_no'];
    $emp_no = $_POST['empid'];

    $sql = mysqli_query($conn, "SELECT DISTINCT(set_number) FROM `taentrydetails` WHERE reference_no='" . $reference . "' ");
    $total_rows = mysqli_num_rows($sql);
    // echo $total_rows;

    if ($total_rows > 1) {
      // echo "<br>"."SELECT `percent`,`amount` FROM `taentrydetails` WHERE `reference_no`='".$reference."' AND `set_number`='".$set_no."' ";
      $sql1 = mysqli_query($conn, "SELECT `percent`,`amount` FROM `taentrydetails` WHERE `reference_no`='" . $reference . "' AND `set_number`='" . $set_no . "' ");
      $amt = 0;
      $Tp_cnt = 0;
      $Sp_cnt = 0;
      $Hp_cnt = 0;
      $Otp_cnt = 0;
      $Tp_amt = 0;
      $Sp_amt = 0;
      $Hp_amt = 0;
      $Otp_amt = 0;
      while ($result1 = mysqli_fetch_array($sql1)) {
        if ($result1['percent'] == "30%") {
          $Tp_cnt = $Tp_cnt + 1;
          $Tp_amt = $Tp_amt + $result1['amount'];
        } else if ($result1['percent'] == "70%") {
          $Sp_cnt = $Sp_cnt + 1;
          $Sp_amt = $Sp_amt + $result1['amount'];
        } else if ($result1['percent'] == "100%") {
          $Hp_cnt = $Hp_cnt + 1;
          $Hp_amt = $Hp_amt + $result1['amount'];
        } else {
          $Otp_cnt = $Otp_cnt + 1;
          $Otp_amt = $Otp_amt + $result1['amount'];
        }
      }
      // echo "<br><br>"."SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE `reference_no`='".$reference."' AND `empid`='".$_SESSION['empid']."' ";

      $sql2 = mysqli_query($conn, "SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE `reference_no`='" . $reference . "' AND empid = '" . $emp_no . "' ");
      $result2 = mysqli_fetch_array($sql2);

      $total_30p_cnt = $result2['30p_cnt'] - $Tp_cnt;
      $total_30p_amt = $result2['30p_amt'] - $Tp_amt;
      $total_70p_cnt = $result2['70p_cnt'] - $Sp_cnt;
      $total_70p_amt = $result2['70p_amt'] - $Sp_amt;
      $total_100p_cnt = $result2['100p_cnt'] - $Hp_cnt;
      $total_100p_amt = $result2['100p_amt'] - $Hp_amt;
      $total_otherp_cnt = $result2['otherp_cnt'] - $Otp_cnt;
      $total_otherp_amt = $result2['otherp_amt'] - $Otp_amt;

      $sql3 = mysqli_query($conn, "DELETE FROM taentrydetails WHERE reference_no = '" . $reference . "' AND set_number = '" . $set_no . "' ");

      if (mysqli_affected_rows($conn) >= 0) {
        $query4 = "UPDATE `tasummarydetails` SET `30p_cnt`='" . $total_30p_cnt . "',`30p_amt`='" . $total_30p_amt . "',`70p_cnt`='" . $total_70p_cnt . "',`70p_amt`='" . $total_70p_amt . "',`100p_cnt`='" . $total_100p_cnt . "',`100p_amt`='" . $total_100p_amt . "',`otherp_cnt`='" . $total_otherp_cnt . "',`otherp_amt`='" . $total_otherp_amt . "' WHERE `reference_no`='" . $reference . "'  ";

        $result4 = mysqli_query($conn, $query4);

        echo "<script>alert('Claim deleted successfully'); window.location='../Show_unclaimed_TA.php';</script>";
      } else {
        echo "<script>alert('Something went wrong');window.location='../Show_unclaimed_TA.php';</script>";
      }
    } else {
      // echo "HI".$emp_no."<br>";
      $query_delete = "DELETE from taentry_master where reference_no='" . $reference . "' AND empid='" . $emp_no . "' ";

      $result = mysqli_query($conn, $query_delete);
      if (mysqli_affected_rows($conn) >= 0) {
        $taentry_sql = "DELETE FROM taentrydetails WHERE reference_no = '" . $reference . "' AND empid = '" . $emp_no . "' ";
        $res = mysqli_query($conn, $taentry_sql);
        $tasummary_sql = "DELETE FROM tasummarydetails WHERE reference_no = '" . $reference . "' AND empid = '" . $emp_no . "'  ";
        $res1 = mysqli_query($conn, $tasummary_sql);
        echo "<script>alert('Claim deleted successfully'); window.location='../Show_unclaimed_TA.php';</script>";
      } else {
        echo "<script>alert('Something went wrong');window.location='../Show_unclaimed_TA.php';</script>";
      }
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
    if ($date2 > $date3) {
      echo 'Allow to enter';
    } else {
      echo "Not allowed to enter";
    }
    break;

  case 'getbackclaimedta':
    if (getbackclaimedta($_REQUEST['id'])) {
      echo "true";
    } else {
      echo "false";
    }

    break;

  case 'getbackclaimedcont':
    if (getbackclaimedcont($_REQUEST['id'])) {
      echo "true";
    } else {
      echo "false";
    }

    break;


  case 'forward_con':
    $flag = 0;
    echo $empid_session = $_REQUEST['empid_session'];
    echo $empid = $_REQUEST['empid'];
    echo $ref = $_REQUEST['ref_no'];
    echo $forwardName = $_REQUEST['fdname'];

    $date = date('Y-m-d H:i:s');

    $query = mysqli_query($conn, "update forward_data set depart_time='" . $date . "',hold_status='0' where reference_id='" . $ref . "' AND fowarded_to='" . $empid_session . "'");

    $query1 = "INSERT into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('" . $empid . "','" . $ref . "','" . $forwardName . "','" . $date . "','1')";
    $result = mysqli_query($conn, $query1);

    if ($query && $result) {
      $flag = 1;
    } else {
      $flag = 0;
    }


    echo $flag;

    break;
  case 'generatesummarycont':
    // $selected_list_emp = $_REQUEST['selected_list_emp'];
    // print_r($selected_list_emp);
    $selected_list = $_REQUEST['selected_list'];
    // print_r($selected_list);
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $yy = $_REQUEST['year'];
    $mm = $_REQUEST['month'];
    $summary_id = $_POST['summary_id'];
    //echo $original_id;
    $year = ($yy);
    $month = implode(",", $mm);
    $d = date("d-m-Y h:i:s");
    // echo "INSERT INTO `cont_summary`(`title`, `description`, `generated_date`, `forward_status`, `estcrk_status`, `month`, `year`, `summary_id`, `DA_approved_time`, `EST_approved_time`) VALUES ('".$title."','".$description."','".$d."','0','0','".$month."','".$year."','".$summary_id."')";
    $query_summary = mysqli_query($conn, "INSERT INTO `cont_summary`(`title`, `description`, `generated_date`, `forward_status`, `estcrk_status`, `month`, `year`, `summary_id`) VALUES ('" . $title . "','" . $description . "','" . $d . "','0','0','" . $month . "','" . $year . "','" . $summary_id . "')");

    echo mysqli_error($conn);
    if ($query_summary) {
      echo "<script>alert('Summary has been generated successfully');window.location='../summary_report_cont.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../generate_summary_cont.php';</script>";
    }

    $id = mysqli_insert_id($conn);
    $cnt = 0;
    foreach ($selected_list as $list) {
      // $query = "UPDATE forward_data set summary='1'where reference_id='$list'";
      //  $result = mysqli_query($query) or die(mysqli_error());
      $query_upd = mysqli_query($conn, "UPDATE `continjency_master` SET `summary_id`= '" . $summary_id . "',`generate` = '1' WHERE reference = '$list'");
    }
    if ($result)
      return true;
    else
      return false;

    break;

  case 'summarysendcont':
    $original_id = $_REQUEST['original_id'];
    $forwardName = $_REQUEST['forwardName'];
    $loginid = $_REQUEST['loginid'];
    //echo $original_id;
    $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='" . $result_set['reference'] . "' and fowarded_to='$loginid' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if ($query == TRUE) {
      echo "<script> alert('Summary has been forwarded!'); window.location = '../index.php'; </script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
    }
    if ($result)
      return true;
    else
      return false;
    break;

    //   case 'fwESTCLERK_cont':
    //     $date = date("Y-m-d h:i:s");

    //     $sumid = $_POST['sumid'];


    //     $u_query = mysqli_query("UPDATE cont_summary SET forward_status='1',DA_approved_time='" . $date . "' where summary_id='" . $sumid . "' ");
    //     echo mysqli_error();

    //     if ($u_query) {
    //       echo "<script>alert('successfully forwarded to accountant..');window.location='../summary_report_cont.php';</script>";
    //     } else {
    //       echo "<script>alert('Failed to Forward...');window.location='../summary_report_cont.php';</script>";
    //     }

    //     break;

  case 'fwESTCLERK_cont':
    $date = date("Y-m-d h:i:s");
    $sumid = $_POST['sumid'];
    $u_query = mysqli_query($conn, "UPDATE master_summary_cont SET forward_status='1',DA_approved_time='" . $date . "' where summary_id='" . $sumid . "' ");
    echo mysqli_error($conn);

    if ($u_query) {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC forward the ' . $sumid . ' contingency summary';
      user_activity($empid1, $file_name, 'Forward Cont Summary', $msg);
      echo "<script>alert('successfully forwarded to APO..');window.location='../summary_report_cont.php';</script>";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC unable to forward the ' . $sumid . ' contingency summary';
      user_activity($empid1, $file_name, 'Forward Cont Summary', $msg);
      echo "<script>alert('Failed to Forward...');window.location='../summary_report_cont.php';</script>";
    }

    break;


  case 'view_conti':
    $data = '';

    $query = "SELECT * FROM `master_cont` WHERE reference_no = '" . $_POST['ref_no'] . "' AND set_no='" . $_POST['set_no'] . "' ";

    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);

    $row_data = mysqli_num_rows($result);
    if ($row_data == 1) {
      $query1 = "SELECT * FROM `add_cont` WHERE reference_no = '" . $_POST['ref_no'] . "' AND set_no='" . $_POST['set_no'] . "' ";
      $result1 = mysqli_query($conn, $query1);
      $cnt = 1;
      $sum = 0;
      $obj = '';
      $data .= '<table class="table table-inverse " style="font-size: 15px" id="" border="1">
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
      while ($sql_res = mysqli_fetch_array($result1)) {
        $data .= "<tr>
              <td>" . $cnt . "</td>
              <td>" . $sql_res['cont_date'] . "</td>
              <td>" . $sql_res['from_place'] . "</td>
              <td>" . $sql_res['to_place'] . "</td>
              <td>" . $sql_res['rate'] . "</td>
              <td>" . $sql_res['kms'] . "</td>
              <td>" . $sql_res['amount'] . "</td>
              </tr>
              ";
        $obj = $sql_res['objective'];
        $cnt++;
        $sum = $sum + (int)$sql_res['amount'];
      }
      $data .= "<tr><td colspan='1' class='text-left' style='text-align:right'><b>Objective</b></td><td colspan='6'>$obj</td></tr><tr><td colspan='1' class='text-left' style='text-align:right'><b>Total</b></td><td colspan='6'>$sum</td></tr></tbody></table>";
    } else {
      $data .= "0";
    }

    echo $data;
    break;

  case 'view_contingency':
    $data = '';
    $sql = "select * from continjency_master inner join continjency on continjency_master.id=continjency.cid where reference='" . $_REQUEST['ref'] . "' and continjency.set_number='" . $_REQUEST['set'] . "'";
    $raw_data = mysqli_query($conn, $sql);
    echo mysqli_error($conn);
    if ($raw_data) {
      $cnt = 0;
      while ($sql_res = mysqli_fetch_assoc($raw_data)) {
        $data .= "
                <tr>
                  <td>" . $sql_res['cntdate'] . "</td>
                  <td>" . $sql_res['cntfrom'] . "</td>
                  <td>" . $sql_res['cntTo'] . "</td>
                  <td>" . $sql_res['kms'] . "</td>
                  <td>" . $sql_res['rate_per_km'] . "</td>
                  <td>" . $sql_res['total_amount'] . "</td>
                </tr>
              ";
        $cnt += (int)$sql_res['total_amount'];
      }
      $data .= "
                <tr>
                  <td colspan='5' style='text-align:right;'>Total Amount</td>
                  <td>" . $cnt . "</td>
                </tr>
              ";
    } else {
      $data .= 0;
    }
    echo $data;
    break;

  case 'AddUser':
    $empid = $_REQUEST['empid'];
    $username = $_REQUEST['username'];
    $psw = $_REQUEST['psw'];
    $role = $_REQUEST['role'];
    if (AddUser($empid, $username, $psw, $role))
      echo "<script>alert('User Added successfully');window.location='../user_register.php';</script>";
    else
      echo "<script>alert('Something went wrong');window.location='../user_register.php';</script>";
    break;

  case 'adminapprove':
    $empid = $_REQUEST['empid'];
    $ref = $_REQUEST['ref'];
    $original_id = $_REQUEST['original_id'];
    //echo $original_id;
    if (adminapprove($empid, $ref, $original_id)) {
      echo "<script>alert('Travelling Allowance Claim Approved');window.location='../index.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
    }
    break;



  case 'summarysend':
    $original_id = $_REQUEST['original_id'];
    $forwardName = $_REQUEST['forwardName'];
    $loginid = $_REQUEST['loginid'];
    //echo $original_id;
    if (summarysend($forwardName, $original_id, $loginid)) {
      echo "<script> alert('Summary has been forwarded!'); window.location = '../index.php'; </script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
    }
    break;

  case 'establishment_send':
    $original_id = $_REQUEST['original_id'];
    $forwardName = $_REQUEST['forwardName'];
    //echo $original_id;
    if (establishment_send($forwardName, $original_id)) {
      echo "<script>alert('Summary has been forwarded');window.location='../final_approved_list.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
    }
    break;

  case 'generatesummary':
    $selected_list_emp = $_REQUEST['selected_list_emp'];
    $selected_list = $_REQUEST['selected_list'];
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $yy = $_REQUEST['year'];
    $mm = $_REQUEST['month'];
    $summary_id = $_POST['summary_id'];
    $dept_id = $_POST['dept_id'];
    //echo $original_id;
    // generatesummary($selected_list_emp, $selected_list, $title, $description, $yy, $mm, $summary_id, $dept_id);
    if (generatesummary($selected_list_emp, $selected_list, $title, $description, $yy, $mm, $summary_id, $dept_id)) {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC generate the ' . $summary_id . ' summary of month ' . $mm;
      user_activity($empid1, $file_name, 'Generate Summary', $msg);
      echo "<script>alert('Summary has been generated successfully');window.location='../summary_report.php';</script>";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC unable to generate the ' . $summary_id . ' summary of month ' . $mm;
      user_activity($empid1, $file_name, 'Generate Summary', $msg);
      echo "<script>alert('Something went wrong');window.location='../generate_summary.php';</script>";
    }
    break;

  case 'AddDepotmaster':
    $deptid = $_REQUEST['deptid'];
    $stationcode = $_REQUEST['stationcode'];
    $depotname = $_REQUEST['depotname'];
    $status = 1;
    $sql = mysqli_query($conn, "INSERT INTO `depot_master`(`stationcode`, `depot`, `dept_id`, `status`) VALUES ('" . $stationcode . "','" . $depotname . "','" . $deptid . "'," . $status . ") ");
    if ($sql)
      echo "<script>alert('Depot Added successfully');window.location='../add_depot.php';</script>";
    else
      echo "<script>alert('Something went wrong');window.location='../add_depot.php';</script>";
    break;

  case 'add_branch_officer':
    $empid = $_REQUEST['empid'];
    $username = $_REQUEST['username'];
    // $psw = $_REQUEST['psw'];
    $dept = $_REQUEST['deptcode'];
    $empname = $_REQUEST['empname'];
    $role = $_REQUEST['role'];
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $design = $_REQUEST['design'];
    $paylevel = $_REQUEST['paylevel'];
    $station = implode(",", $_REQUEST['stationcode']);
    // $station=$_REQUEST['stationcode'];
    if (AddAdmin($empid, $username, $role, $dept, $station, $empname, $mobile, $email, $design, $paylevel)) {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'BO add the ' . $empid . ' user as ' . $role;
      user_activity($empid1, $file_name, 'Add User', $msg);
      echo "<script>alert('User Added successfully');window.location='../add_user.php';</script>";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'BO unable to add the ' . $empid . ' user as ' . $role;
      user_activity($empid1, $file_name, 'Add User', $msg);
      echo "<script>alert('Something went wrong');window.location='../add_user.php';</script>";
    }
    break;

  case 'rejectCont_SOA':
    $ciempid = $_POST['coempid'];
    $pmempid = $_POST['pmempid'];
    $ref_no = $_POST['ref_no'];
    $reason = $_POST['reason'];
    $role = $_POST['role'];

    $update_tamaster = "UPDATE continjency_master set is_rejected=1,rejected_by='" . $ciempid . "," . $role . "',reason='" . $reason . "' where empid='" . $pmempid . "' AND reference='" . $ref_no . "'";
    $result = mysqli_query($conn, $update_tamaster);
    if (mysqli_affected_rows() >= 0) {
      $drop = "DELETE from forward_data where empid='" . $pmempid . "' AND reference_id='" . $ref_no . "' ";
      $result1 = mysqli_query($conn, $drop);
      echo "<script>alert('Contigency rejected successfully...'); window.location='../generate_summary_cont.php';</script>";
    } else {
      echo "<script>alert('Something Wrong'); window.location='../unclaimed_cont_details.php';</script>";
    }
    break;

  case 'generatesummarycont1':

    $selected_list = $_REQUEST['selected_list'];
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $yy = $_REQUEST['year'];
    $mm = $_REQUEST['month'];
    $summary_id = $_POST['summary_id'];
    $year = ($yy);
    $month = implode(",", $mm);
    $d = date("d-m-Y h:i:s");

    $query_summary = mysqli_query($conn, "INSERT INTO `master_summary_cont`(`title`, `description`, `generated_date`, `forward_status`, `estcrk_status`, `month`, `year`, `summary_id`,dept_id) VALUES ('" . $title . "','" . $description . "','" . $d . "','0','0','" . $month . "','" . $year . "','" . $summary_id . "','" . $_REQUEST['dept_id'] . "')");

    echo mysqli_error($conn);

    $id = mysqli_insert_id($conn);
    $cnt = 0;
    $flag = 0;
    foreach ($selected_list as $list) {
      $query_upd = mysqli_query($conn, "UPDATE `continjency_master` SET `summary_id`= '" . $summary_id . "',`generate` = '1' WHERE reference = '$list'");
      if ($query_upd) {
        $flag = 1;
      }
    }

    if ($query_summary && $flag == 1) {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC generate the ' . $summary_id . ' contingency summary of month ' . $mm;
      user_activity($empid1, $file_name, 'Generate Cont Summary', $msg);
      echo "<script>alert('Summary has been generated successfully');window.location='../summary_report_cont.php';</script>";
    } else {
      $empid1 = $_SESSION['empid'];
      $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
      $msg = 'PC unable to generate the ' . $summary_id . ' contingency summary of month ' . $mm;
      user_activity($empid1, $file_name, 'Generate Cont Summary', $msg);
      echo "<script>alert('Something went wrong');window.location='../generate_summary_cont.php';</script>";
    }

    break;

  case 'default':
    echo "Invalid option";
    break;
}
