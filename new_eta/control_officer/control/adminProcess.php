<?php
date_default_timezone_set("Asia/kolkata");
include('adminFunction.php');
include('function.php');

switch ($_REQUEST['action']) {
  case 'changeimg':
    if (changeimg($_FILES["profile"]["name"], $_FILES["profile"]["tmp_name"])) {
      echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
    } else {
      echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
    }
    break;
    
     case 'getDEPT':
        $data      = '';
        $query_emp = mysql_query("SELECT department.DEPTNO as id  FROM `employees` ,department WHERE department.DEPTNO=employees.dept AND department.DEPTNO='" . $_REQUEST['id'] . "' ");
        $resu1     = mysql_fetch_array($query_emp);
        $dptid     = $resu1['id'];
        $sql_user  = mysql_query("SELECT * from users where dept='" . $dptid . "' AND role='11' ");
        $cnt       = mysql_num_rows($sql_user);
        while ($resu = mysql_fetch_assoc($sql_user)) {
            $query = "SELECT pfno,name,desig FROM employees where pfno='" . $resu['empid'] . "'";
            $result = mysql_query($query);
            while ($value = mysql_fetch_assoc($result)) {
                // $did.=$value['pfno'];
                $data .= "<option value='" . $value['pfno'] . "'>" . $value['name'] . "  (" . $value['desig'] . ")</option>";
            }
        }
        echo $data;
    break;
    
    case 'get_stations':
      $result=array();
      $data=array();
      $query2 = "SELECT stationdesc FROM `station`";
      $sql2 = mysql_query($query2);
      // echo mysql_error();
      while ($row2 = mysql_fetch_array($sql2)) 
      {
        $stationdesc=htmlspecialchars($row2['stationdesc']);
        array_push($data,$stationdesc);
      } 
      $result['stations']=$data;
      echo json_encode($result);
    break;


    case 'getTAData':

        $reference = $_POST['ref_no'];
        $set_no = $_POST['set_no'];
        $data=array();

        $j_type_data=array();
        $j_pur_data=array();

        $query2="SELECT TAMonth,TAYear,cardpass FROM `taentry_master` WHERE reference_no='".$reference."' ";
        $sql2=mysql_query($query2);
        $row2 = mysql_fetch_array($sql2);
        $data['ta_month']=$row2['TAMonth'];
        $data['ta_year']=$row2['TAYear'];
        // $data['cardpass']=$row2['cardpass'];

        $query1="SELECT * FROM `taentrydetails` WHERE reference_no='".$reference."' AND set_number='".$set_no."' ORDER by STR_TO_DATE(taDate,'%d/%m/%Y') ASC";
        $sql1=mysql_query($query1);
        $cnt=1;
        $ta_details='';
        $T_amount=0;
        $validation='this.value=this.value.replace(/[^\d]/,"")';
        $sr1=0;
        while ($row = mysql_fetch_array($sql1)) 
        {   
            $ta_details.='<tr class="odd gradeX"><td style="width: 10%"><div class="form-group "><label class="control-label">Date <br> दिनांक </label><div class="billunitzindex"><input type="text" class=" form-control datepicker datecheck" readonly val='.$sr1.' id="date'.$sr1.'" name="date'.$sr1.'" placeholder="dd/mm/yyyy" value='.$row['taDate'].'></div></div></td><td style="width: 10%"><div class="form-group"><label class="control-label">Journey Type <br> यात्रा का प्रकार</label><div class=""><select class="form-control select2 j_type" name="type'.$sr1.'" id="type'.$sr1.'" value='.$row['journey_type'].' val='.$sr1.'>';
            
            array_push($j_type_data, $row['journey_type']);

            $query2 = "SELECT * FROM `journey_type_master`";
            $sql2 = mysql_query($query2);
            while ($row2 = mysql_fetch_array($sql2)) 
              {
                $ta_details.='<option value='.$row2['id'].' >'.$row2['journey_type'].'</option>';
              }
              $ta_details.='</select></div></div></td><td style="width: 10%"><div class="form-group"><label class="control-label">Train No. <br> गाडी नं.</label><input type="text" class="form-control val train_no" name="trainno'.$sr1.'" id="trainno'.$sr1.'" placeholder="Train No." value="'.$row['train_no'].'" val='.$sr1.'></div></td><td style="width: 10%"><div class="form-group"><label class="control-label">Other <br> अन्य</label><div class=""><select class="form-control purpose" value='.$row['journey_purpose'].'  val='.$sr1.' name="other'.$sr1.'" id="other'.$sr1.'">';

              array_push($j_pur_data, $row['journey_purpose']);

            $query2 = "SELECT * FROM `journey_purpose_master`";
            $sql2 = mysql_query($query2);
            while ($row2 = mysql_fetch_array($sql2)) 
            {
              $ta_details.='<option value='. $row2['id'] . ' >'. $row2['journey_purpose'] . '  </option>';
            }
            $ta_details.='</select></div></div></td><td style="width: 8%"><div class="form-group"><label class="control-label">Depart Time <br> प्रस्थान समय</label><input type="text" name="dtime'.$sr1.'" val='.$sr1.' id="dtime'.$sr1.'" class="form-control changedtime timevalue dtime_validation"  value='.$row['departT'].' placeholder="hh:mm"></div></td><td style="width: 8%"><div class="form-group"><label class="control-label">Arri. Time <br> आगमन समय </label><input type="text" class="form-control ta_calculation changedtime time_val timevalue time_validation" name="atime'.$sr1.'" val='.$sr1.' id="atime'.$sr1.'" value='.$row['arrivalT'].' placeholder="hh:mm"></div></td><td style="width: 12%"><div class="form-group"><label class="control-label">Depart Station <br> प्रस्थान स्टेशन</label><input type="text" list="dstation'.$sr1.'" style="text-transform:uppercase" name="dstn'.$sr1.'" id="dstn'.$sr1.'" placeholder="select Station" val='.$sr1.' class="departClass form-control" value='.$row['departS'].'></div></td><td style="width: 12%"><div class="form-group"><label class="control-label">Arri. Station <br> आगमन स्टेशन</label><input type="text" list="astation'.$sr1.'" style="text-transform:uppercase" name="astn'.$sr1.'" id="astn'.$sr1.'" placeholder="select Station" val='.$sr1.' class="form-control arrivalstn" value='.$row['arrivalS'].'></div></td><td><div class="form-group"><label class="control-label">Distance <br> दुरी</label><input type="text" class="form-control" name="distance'.$sr1.'" id="distance'.$sr1.'"  onkeyup='.$validation.' val='.$sr1.' value='.$row['distance'].' ></div></td><td><div class="form-group"><label class="control-label">Percentage <br> प्रतिशत</label><input type="text" class="form-control changeper" name="per'.$sr1.'" id="per'.$sr1.'" placeholder="Percentage" readonly onkeyup='.$validation.' val='.$sr1.' value='.$row['percent'].'></div></td><td><div class="form-group"><label class="control-label">Amount <br> राशि</label><input type="text" class="form-control" name="amt'.$sr1.'" id="amt'.$sr1.'" placeholder="Amount" readonly onkeyup='.$validation.' val='.$sr1.' value='.$row['amount'].'></div></td></tr>';
            
            $sr1=$sr1+1;
            $data['objective']=$row['objective'];
            $data['cardpass']=$row['cardpass'];
        }
        $data['sr1']=$sr1;
        $data['ta_data']=$ta_details;
        $data['j_type']=$j_type_data;
        $data['j_pur']=$j_pur_data;
        // echo json_encode(urlencode($data));
        // echo json_encode($data,JSON_UNESCAPED_UNICODE);
        echo json_encode($data);
    break;
  
  case 'forward_con':
        $flag = 1;
        $empid_session = $_REQUEST['empid_session'];
        $empid = $_REQUEST['empid'];
        $ref = $_REQUEST['ref_no'];
        $forwardName = $_REQUEST['fdname'];
        //$q = mysql_query("UPDATE `continjency_master` SET `forward_status`='1' WHERE reference = '$ref'");

        $date=date('Y-m-d H:i:s');
        $query = mysql_query("update forward_data set depart_time='".$date."',hold_status='0' where reference_id='".$ref."' AND fowarded_to='".$empid_session."'");
        
        $query1 = "INSERT into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('".$empid."','".$ref."','".$forwardName."','".$date."','1')";
        $result = mysql_query($query1);

        if($query && $result)
        {
            $empid=$empid_session;
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='CO forwarded '.$empid.' Contingency to DA '. $forwardName.' success';
            user_activity($empid,$file_name,'Forward Contingency',$msg);
            
          $flag = 1;
        }
        else
        {
            $empid=$empid_session;
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='CO unable to forward '.$empid.' Contingency to DA '. $forwardName.' failed';
            user_activity($empid,$file_name,'Forward Contingency',$msg);
          $flag = 0;
        }
        echo $flag;

    break;

  case 'rejectTA_CO_PM':
    $ciempid = $_POST['coempid'];
    $pmempid = $_POST['pmempid'];
    $ref_no = $_POST['ref_no'];
    $reason = $_POST['reason'];
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
        $update_tamaster = "UPDATE taentry_master set is_rejected=1,rejected_by='" . $ciempid . "," . $_SESSION['role'] . "',reason='" . $reason . "' where empid='" . $pmempid . "' AND reference_no='" . $ref_no . "'";
        $result = mysql_query($update_tamaster);
        if (mysql_affected_rows() >= 0) {
          $drop = "DELETE from forward_data where empid='" . $pmempid . "' AND reference_id='" . $ref_no . "' ";
          $result1 = mysql_query($drop);
          
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='CO reject '.$pmempid.' employee TA';
            user_activity($empid,$file_name,'Reject TA',$msg);

          echo "<script>alert('Claim rejected successfully..'); window.location='../co_Show_claimed_TA.php';</script>";
        } else {
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='CO unable to reject '.$pmempid.' employee TA';
            user_activity($empid,$file_name,'Reject TA',$msg);
            
          echo "<script>alert('Something Wrong'); window.location='../co_Show_claimed_TA.php';</script>";
        }
    }
    break;


  case 'updateGrievance':
    $id = $_REQUEST['id'];
    $date = date('d/m/Y h:i:s');
    $data = "0";
    $sql = mysql_query("UPDATE `grievance` SET `status`='1',`updated_date`='" . $date . "' WHERE id='" . $id . "' ");
    if ($sql) {
        $empid=$_SESSION['empid'];
        $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        user_activity($empid,$file_name,'Close grievance','CO closed the employee grievance');

      $data = "1";
    } else {
        $empid=$_SESSION['empid'];
        $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        user_activity($empid,$file_name,'Close grievance','CO unable to close the employee grievance');
      $data = "0";
    }
    echo $data;
    break;


  case 'updateUser':
    $fname = $_REQUEST['fname'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $design = $_REQUEST['design'];
    if (updateUser($fname, $email, $mobile, $design))
      echo "<script>alert('User details updated successfully');window.location='../profile.php';</script>";
    else
      echo "<script>alert('User details not updated');window.location='../profile.php';</script>";
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

  case 'fetchStationDesc':
    $stcode = $_REQUEST['stationcode'];
    $sql = mysql_query("SELECT `stationdesc` FROM `station` WHERE stationcode='" . $stcode . "' ");
    $row = mysql_fetch_array($sql);
    echo $row['stationdesc'];
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
    $gradepay = $_REQUEST['gradepay'];
    $fullname = $_REQUEST['fullname'];
    $dept = $_REQUEST['dept'];
    $billunit = $_REQUEST['billunit'];
    $design = $_REQUEST['design'];
    $mobile = $_REQUEST['mobile'];
    $station = $_REQUEST['station'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    if (addEmployee($empid, $gradepay, $fullname, $dept, $billunit, $design, $mobile, $station, $email, $address))
      echo "<script>alert('Employee Added successfully');window.location='../user_registration.php';</script>";
    else
      echo "<script>alert('Something went wrong');window.location='../user_registration.php';</script>";
    break;

  case 'AddControlAdmin':
    $empid = $_REQUEST['empid'];
    $username = $_REQUEST['username'];
    $psw = $_REQUEST['psw'];
    $dept = $_REQUEST['deptid'];
    $role = $_REQUEST['role'];
    if (AddAdmin($empid, $username, $psw, $role, $dept))
      echo "<script>alert('User Added successfully');window.location='../add_user.php';</script>";
    else
      echo "<script>alert('Something went wrong');window.location='../add_user.php';</script>";
    break;

  case 'AddDepotmaster':
    $deptid = $_REQUEST['deptid'];
    $stationcode = $_REQUEST['stationcode'];
    $depotname = $_REQUEST['depotname'];
    $status = 1;
    $sql = mysql_query("INSERT INTO `depot_master`(`stationcode`, `depot`, `dept_id`, `status`) VALUES ('" . $stationcode .
      "','" . $depotname . "','" . $deptid . "'," . $status . ") ");
    if ($sql)
      echo "<script>alert('Depot Added successfully');window.location='../add_depot.php';</script>";
    else
      echo "<script>alert('Something went wrong');window.location='../add_depot.php';</script>";
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
    if (deleteEmployee($delete_id))
      echo "Employee Details Deleted successfully";
    else
      echo "Something went wrong";
    break;
    //--------------------------------------------------------------------------
  case 'own_forward_TA':
    $empid = $_REQUEST['empid'];
    $ref = $_REQUEST['ref_no'];
    $forwardName = $_REQUEST['fdname'];
    $c_otp = $_REQUEST['c_otp'];
    


    $query_select = mysql_query("select otp from tbl_otp where empid='" . $empid . "' order by id DESC limit 1");
    $result = mysql_fetch_array($query_select);

    $query_select1 = mysql_query("SELECT TAMonth,TAYear,SUM(taentrydetails.amount)as amount from taentry_master,taentrydetails WHERE taentry_master.reference_no=taentrydetails.reference_no AND taentry_master.empid=taentrydetails.empid AND taentry_master.empid='" . $empid . "' AND taentry_master.reference_no='" . $ref . "' ");
    $result1 = mysql_fetch_array($query_select1);

    $month_array = array("01" => "Jan", "02" => "Feb", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "Aug", "09" => "Sept", "10" => "Oct", "11" => "Nov", "12" => "Dec");

    $s = $result1['TAMonth'];
    $y = $result1['TAYear'];
    $amt = $result1['amount'];

    if ($month_array[$s]) {
      $mon = $month_array[$s];
    }


    $result['otp'];
    if ($result['otp'] == $c_otp) {
      $query1 = "UPDATE `taentry_master` SET `forward_status`='1' WHERE `empid`='" . $empid . "' AND `reference_no`='" . $ref . "' ";
      $result1 = mysql_query($query1);

      if ($c_otp) {
        $date = date('Y-m-d H:i:s');
        $query = "INSERT into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('" . $empid . "','" . $ref . "','" . $forwardName . "','" . $date . "','1')";
        $result = mysql_query($query);
        $query2 = mysql_query("SELECT mobile FROM employees WHERE pfno='" . $empid . "'");
        $result_set = mysql_fetch_array($query2);
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

  case 'getbackclaimedta':
    if (getbackclaimedta($_REQUEST['id'])) {
      echo "true";
    } else {
      echo "false";
    }

    break;

  case 'validate_date':
    echo validate_date($_REQUEST['date']);
    break;

  case 'deleteclaim':
        $reference = $_POST['ref_no'];
        $set_no = $_POST['set_no'];
    
        $sql=mysql_query("SELECT DISTINCT(set_number) FROM `taentrydetails` WHERE reference_no='".$reference."' ");
        $total_rows=mysql_num_rows($sql);
        // echo $total_rows;
    
        if($total_rows > 1)
        {
            // echo "<br>"."SELECT `percent`,`amount` FROM `taentrydetails` WHERE `reference_no`='".$reference."' AND `set_number`='".$set_no."' ";
            $sql1=mysql_query("SELECT `percent`,`amount` FROM `taentrydetails` WHERE `reference_no`='".$reference."' AND `set_number`='".$set_no."' ");
            $amt=0;$Tp_cnt=0;$Sp_cnt=0;$Hp_cnt=0;$Otp_cnt=0;$Tp_amt=0;$Sp_amt=0;$Hp_amt=0;$Otp_amt=0;
            while($result1=mysql_fetch_array($sql1))
            {
              if($result1['percent'] == "30%" )
              {
                $Tp_cnt=$Tp_cnt+1;
                $Tp_amt=$Tp_amt+$result1['amount'];
              }
              else if($result1['percent'] == "70%")
              {
                $Sp_cnt=$Sp_cnt+1;
                $Sp_amt=$Sp_amt+$result1['amount'];
              }
              else if($result1['percent'] == "100%")
              {
                $Hp_cnt=$Hp_cnt+1;
                $Hp_amt=$Hp_amt+$result1['amount'];
              }
              else
              {
                $Otp_cnt=$Otp_cnt+1;
                $Otp_amt=$Otp_amt+$result1['amount'];
              }
            }
    
            $sql2=mysql_query("SELECT empid,`30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE `reference_no`='".$reference."' ");
            $result2=mysql_fetch_array($sql2);
           
            $total_30p_cnt=$result2['30p_cnt']-$Tp_cnt;
            $total_30p_amt=$result2['30p_amt']-$Tp_amt;
            $total_70p_cnt=$result2['70p_cnt']-$Sp_cnt;
            $total_70p_amt=$result2['70p_amt']-$Sp_amt;
            $total_100p_cnt=$result2['100p_cnt']-$Hp_cnt;
            $total_100p_amt=$result2['100p_amt']-$Hp_amt;
            $total_otherp_cnt=$result2['otherp_cnt']-$Otp_cnt;
            $total_otherp_amt=$result2['otherp_amt']-$Otp_amt;
            $empid=$result2['empid'];
            $sql3=mysql_query("DELETE FROM taentrydetails WHERE reference_no = '".$reference."' AND set_number = '".$set_no."' ");
    
            if(mysql_affected_rows() >= 0)
            {
                $query4="UPDATE `tasummarydetails` SET `30p_cnt`='".$total_30p_cnt."',`30p_amt`='".$total_30p_amt."',`70p_cnt`='".$total_70p_cnt."',`70p_amt`='".$total_70p_amt."',`100p_cnt`='".$total_100p_cnt."',`100p_amt`='".$total_100p_amt."',`otherp_cnt`='".$total_otherp_cnt."',`otherp_amt`='".$total_otherp_amt."' WHERE `reference_no`='".$reference."'  ";
                $result4=mysql_query($query4);
                
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                user_activity($empid,$file_name,'Delete TA','CO delete the single TA');
               echo "<script>alert('Claim deleted successfully'); window.location='../Show_unclaimed_TA.php';</script>";
            }
            else
            {
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                user_activity($empid,$file_name,'Delete TA','CO unable to delete the single TA');
               echo "<script>alert('Something went wrong');window.location='../Show_unclaimed_TA.php';</script>";
            }
    
        }
        else
        {
             $tasummary_sql1 = mysql_query("SELECT empid FROM tasummarydetails WHERE reference_no = '".$reference."' ");
            $res2 = mysql_fetch_array($tasummary_sql1);
            $empid=$res2['empid'];
            
            $query_delete = "DELETE from taentry_master where reference_no='".$reference."' ";
            $result = mysql_query($query_delete);
            if(mysql_affected_rows() >= 0)
            {
              $taentry_sql = "DELETE FROM taentrydetails WHERE reference_no = '".$reference."' ";
              $res = mysql_query($taentry_sql);
              $tasummary_sql = "DELETE FROM tasummarydetails WHERE reference_no = '".$reference."' ";
              $res1 = mysql_query($tasummary_sql);
              
              
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                user_activity($empid,$file_name,'Delete TA','CO delete the overall TA');
               echo "<script>alert('Claim deleted successfully'); window.location='../Show_unclaimed_TA.php';</script>";
            }
            else
            {
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                user_activity($empid,$file_name,'Delete TA','CO unable to delete the overall TA');
              echo "<script>alert('Something went wrong');window.location='../Show_unclaimed_TA.php';</script>";
            }
    
        }
    break;
    
    case 'delcont':
        $reference = $_POST['ref_no'];
        $set_no1 = $_POST['set_no1'];
        
        $query = mysql_query("SELECT empid from master_cont where reference_no='".$reference."' ");
        $result1 = mysql_fetch_array($query);
        $empid=$result1['empid'];
        
        $query_delcont = "DELETE from master_cont where reference_no='".$reference."' AND set_no='".$set_no1."' ";
        $result = mysql_query($query_delcont);
        if(mysql_affected_rows() >= 0)
        {
            $query_mastcont = "DELETE FROM add_cont WHERE reference_no = '".$reference."' AND set_no='".$set_no1."' ";
            $res = mysql_query($query_mastcont);
            
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            user_activity($empid,$file_name,'Delete Contingency','CO Contigency deleted successfully');
            
            echo "<script>alert('Contigency deleted successfully'); window.location='../Show_unclaimed_TA.php';</script>";
        }
        else
        {
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            user_activity($empid,$file_name,'Delete Contingency','CO unable to delete Contigency');
            
          echo "<script>alert('Something went wrong');window.location='../Show_unclaimed_TA.php';</script>";
        }
    break;

  case 'view_contingency':
    $data = '';
    $sql = "select * from continjency_master inner join continjency on continjency_master.id=continjency.cid where reference='" . $_REQUEST['ref'] . "' and continjency.set_number='" . $_REQUEST['set'] . "'";
    $raw_data = mysql_query($sql);
    echo mysql_error();
    if ($raw_data) {
      $cnt = 0;
      while ($sql_res = mysql_fetch_assoc($raw_data)) {
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


  case 'adminapprove':
    $empid = $_REQUEST['empid'];
    $empid1 = $_REQUEST['empid1'];
    $ref = $_REQUEST['ref'];
    $original_id = $_REQUEST['original_id'];
    //echo $original_id;
    if (adminapprove($empid1, $empid, $ref, $original_id)) {
      echo "<script>alert('Travelling Allowance Claim Approved');window.location='../index.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../index.php';</script>";
    }
    break;


    // case 'approveAndForward':
    //   $empid = $_REQUEST['empid'];
    //   $ref = $_REQUEST['ref'];
    //   $forwardName = $_REQUEST['forwardName'];
    //   $original_id = $_REQUEST['original_id'];
    //   //echo $original_id;
    //   if(approveAndForward($empid,$ref,$forwardName,$original_id))
    //   {
    //     echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
    //   }
    //   else
    //   {
    //     echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
    //   }
    // break;
  case 'forwardToDA':
    $empid = $_REQUEST['empid'];
    $ref = $_REQUEST['ref'];
    $forwardName = $_REQUEST['forwardName'];
    $original_id = $_REQUEST['original_id'];
    //echo $original_id;
    if (approveAndForward($empid, $ref, $forwardName, $original_id)) {
        $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        $msg='CO forward '.$original_id.' CI TA to '.$forwardName.' DA';
        user_activity($empid,$file_name,'Forward TA',$msg);

      echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../co_Show_claimed_TA.php';</script>";
    } else {
        $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
        $msg='CO unable to forward '.$original_id.' CI TA to '.$forwardName.' DA';
        user_activity($empid,$file_name,'Forward TA',$msg);
        
      echo "<script>alert('Something went wrong');window.location='../co_Show_claimed_TA.php';</script>";
    }

    # code...
    break;

  case 'check_date':
    $year = date('Y');
    $data = '';
    $month = $_POST['month'];

    $query1 = "SELECT distinct(reference_no),forward_status FROM `taentry_master` WHERE TAMonth='" . $month . "' AND TAYear='" . $year . "' AND empid='" . $_POST['u_pfno'] . "' ";
    $result = mysql_query($query1);
    $rows = mysql_num_rows($result);
    // echo $rows;
    // exit;
    $val = mysql_fetch_array($result);
    if ($rows == 0) {
      $data = 0;
    } else {
      if ($val['forward_status'] == 1) {
        $data = "claimed";
      } else {
        $data = $val['reference_no'];
      }
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
      // echo  "select mobile from employees where pfno='".$empid."'";
      $query = mysql_query("select mobile from employees where  pfno='" . $empid . "'");
      $count = mysql_num_rows($query);
      $result_set = mysql_fetch_array($query);
      if ($count > 0) {
        $otp = rand(1000,9999);

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

          $query_insert = mysql_query("insert into tbl_otp(empid,otp,sent) values('" . $empid . "','$otp',CURRENT_TIMESTAMP)");
          //echo "<script>alert('OTP has been sent on your registered mobile ".$result_set['mobile'].".');window.location='../profile.php';</script>";
          $flag = $result_set['mobile'];
        }
        curl_close($ch);
      }
    } else {
      $flag = "0";
    }
    echo $flag;

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

    //--------------------------------------------------------------------------
  case 'claimTA':
    $cnt = $_REQUEST['hide_count'];
    $empid = $_REQUEST['empid'];
    $year = $_REQUEST['year'];
    $set = $_REQUEST['set'];
    $months = implode(",", $_REQUEST['month']);
    $ref = rand(10000, 999999);
    $reference = $empid . "/" . $year . "/" . $ref;
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
      $data['objective'][$i] =  $_REQUEST["objective0"];
    }
    if (claimTA($data, $reference, $empid, $year, $months, $cnt, $set))
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
      $data['objective'][$i] =  $_REQUEST["objective0"];
    }
    if (addclaimTA($data, $reference, $empid, $year, $months, $cnt, $set))
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
    if (approveAndForward($empid, $ref, $forwardName, $original_id)) {
      echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
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
    if ($button == "update") {
      if (updateEmployee($empid, $pannumber, $empname, $billunit, $mobile, $email, $design, $paylevel, $update_id))
        echo "<script>alert('Employee Updated successfully');window.location='../employee_registration.php';</script>";
      else
        echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
    } else {
      if (AddEmployee($empid, $pannumber, $empname, $billunit, $mobile, $email, $design, $paylevel))
        echo "<script>alert('Employee Added successfully');window.location='../employee_registration.php';</script>";
      else
        echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
    }
    break;
    
    
    case 'updateEmployee':
        // print_r($_REQUEST);
        $empid = $_REQUEST['txtpfno'];
        // exit();
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
         
         $txtdob = $_POST['txtdob'];
         $txtappointment = $_POST['txtappointment'];
         $level = $_REQUEST['level'];
         $forwardName = $_REQUEST['forwardName'];
         $isupdated = '1';

        $date1 = str_replace('/', '-', $txtdob );
        $dob_date = date("Y-m-d", strtotime($date1));
        
        $date2 = str_replace('/', '-', $txtappointment );
        $app_date = date("Y-m-d", strtotime($date2));
          //echo"<br>". $txtappointment=date('Y-m-d', strtotime($txtappointment));

         // ($empid.''.$billunit.''.$panno.''.$fullname.''.$design.''.$station.''.$mobile.''.$email.''.$category.''.$dept.''.$txtworkdepot.''.$txtbasicpay.''.$gradepay.''.$dob_date.''.$app_date.''.$level.''.$isupdated);
        if(updateEmployee1($empid,$billunit,$panno,$fullname,$design,$station,$mobile,$email,$category,$dept,$txtworkdepot,$txtbasicpay,$gradepay,$dob_date,$app_date,$level,$forwardName,$isupdated))
        {
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='CO send the request for update details to '.$forwardName.' BO ';
            user_activity($empid,$file_name,'Update deatils',$msg);
            echo "1";
        }
        else
        {
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='CO unable to send the request for update details to '.$forwardName.' BO ';
            user_activity($empid,$file_name,'Update deatils',$msg);
            echo "0";
        }
    break;
    
    
    
  case 'fetchEmployee':
    $id = $_REQUEST['id'];
    $result = fetchEmployee($id);
    echo $result;
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
  case 'activeUser':
    $active = '1';
    $pfno = $_REQUEST['id'];
    if (activeUser($pfno, $active))
      echo "User Activated successfully";
    else
      echo "Something went wrong";
    break;

  case 'activeDepot':
    $active = '1';
    $id = $_REQUEST['id'];
    if (activeDepot($id, $active))
      echo "Depot Activated successfully";
    else
      echo "Something went wrong";
    break;

  case 'deactiveDepot':
    $active = '0';
    $id = $_REQUEST['id'];
    if (deactiveDepot($id, $active))
      echo "Depot Deactivated successfully";
    else
      echo "Something went wrong";
    break;

  case 'deactiveUser':
    $active = '0';
    $pfno = $_REQUEST['id'];
    if (deactiveUser($pfno, $active))
      echo "User Deactivated successfully";
    else
      echo "Something went wrong";
    break;

  case 'view_contingency':
    $data = '';
    $sql = "select * from continjency_master inner join continjency on continjency_master.id=continjency.cid where reference='" . $_REQUEST['ref'] . "' and continjency.set_number='" . $_REQUEST['set'] . "'";
    $raw_data = mysql_query($sql);
    echo mysql_error();
    if ($raw_data) {
      $cnt = 0;
      while ($sql_res = mysql_fetch_assoc($raw_data)) {
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

  case "applybillunit":
    $billunit = implode(",", $_POST['billunit']);
    if (applybillunit($_REQUEST['empid'], $billunit)) {
      echo "<script>alert('Bill Unit applied to User');window.location='../apply_billunit.php';</script>";
    } else {
      echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
    }
    break;

  case "deletebillunitemp":
    $query = mysql_query("delete from sep_billunit where employee_id='" . $_REQUEST['deleteemp'] . "'");
    if ($query) {
      echo "<script>alert('User removed successfully');window.location='../apply_billunit.php';</script>";
    } else {
      echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
    }
    break;

  case "updatebillemp":
    $billunit = implode(",", $_REQUEST['updatebill']);
    $update_sql = "update sep_billunit set billunit='" . $billunit . "' where employee_id='" . $_REQUEST['updateemp'] . "'";
    $query = mysql_query($update_sql);
    echo mysql_error();
    if ($query) {
      echo "<script>alert('User bill unit applied successfully');window.location='../apply_billunit.php';</script>";
    } else {
      echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
    }
    break;
    
    case 'check_date1':
        
        $year=date('Y');
        $data= '';
        $month=$_POST['month'];
        
        $query1="SELECT distinct(reference),forward_status FROM `continjency_master` WHERE month='".$month."' AND year='".$year."' AND empid='".$_POST['u_pfno']."' ";
        $result=mysql_query($query1);
        $rows=mysql_num_rows($result);
        // echo $rows;
        // exit;
        $val=mysql_fetch_array($result);
        if($rows == 0)
        {
            $data=0;
            
        }
        else
        {
            if($val['forward_status'] == 1)
            {
                $data= "claimed";
            }
            else
            {
                $data=$val['reference'];
            }
        }
        echo $data;

    break;
    
    case 'forward_Cont':
            $empid = $_REQUEST['empid'];
            $ref = $_REQUEST['ref_no'];
            $forwardName = $_REQUEST['fdname'];
            // $c_otp = $_REQUEST['c_otp'];

            $flag='0';
            $query1 = "UPDATE `continjency_master` SET `forward_status`='1' WHERE `empid`='".$empid."' AND `reference`='".$ref."' ";
            $result1 = mysql_query($query1);

            $date=date('Y-m-d H:i:s');
            $query = "INSERT into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('".$empid."','".$ref."','".$forwardName."','".$date."','1')";
            $result = mysql_query($query);
                    
            if($result)
            {
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                $msg='CO Contingency has been forwarded to BO '. $forwardName.' success';
                
                user_activity($empid,$file_name,'Forward Contingency',$msg);
                
                $flag='1';
            }
            else
            {
                $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
                $msg='CO Contingency has not been forwarded to BO '. $forwardName.' failed';
                
                user_activity($empid,$file_name,'Forward Contingency',$msg);
                
                $flag='0';
            }
            echo $flag;

    break;

  default:
    echo "Invalid option";
    break;
}