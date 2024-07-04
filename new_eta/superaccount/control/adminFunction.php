<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function changeimg($name, $tmp_name)
{
  global $conn;
  $upload_dir = "../profile/" . $_SESSION['empid'] . ".jpg";
  $dir = "profile/" . $_SESSION['empid'] . ".jpg";
  if (move_uploaded_file($tmp_name, $upload_dir)) {
    $query = mysqli_query($conn, "update users set img='$dir' where empid='" . $_SESSION['empid'] . "'");
    return true;
  } else {
    return false;
  }
}


function get_summary($sum_id)
{
    global $conn;
    $data = '';
    $total_amt = 0;
    $temp = 0;
    $temp1 = 0;

    $sql = "SELECT tasummarydetails.*, employees.* 
            FROM tasummarydetails 
            JOIN employees ON tasummarydetails.empid = employees.pfno 
            WHERE summary_id = ? AND is_summary_generated = '1' 
            ORDER BY employees.BU ASC";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $sum_id);
        $stmt->execute();
        $res = $stmt->get_result();

        $month_array = [
            "01" => "Jan", "02" => "Feb", "03" => "March", "04" => "April",
            "05" => "May", "06" => "June", "07" => "July", "08" => "Aug",
            "09" => "Sept", "10" => "Oct", "11" => "Nov", "12" => "Dec"
        ];

        while ($val = $res->fetch_assoc()) {
            $level = $val['level'];
            $amount = get_amount($level, $conn);

            $mon = $month_array[substr($val['month'], 0, 2)];
            $mmon = $month_array[substr($val['created_at'], 3, 2)];
            $y = substr($val['year'], 2);
            $cyear = substr($val['created_at'], 8, 2);

            $status = get_est_approve_status($val['empid'], $val['reference_no'], $conn);

            $data .= "<tr class='fontcss1'>";
            $data .= ($status == '1') ? "<td style='color:#0b10f5;'>Vetted</td>" : "<td style='color:red;'>Non-Vetted</td>";
            $data .= "<td>" . getdepartment($val['dept']) . "</td>
                      <td>" . $val['empid'] . "</td>
                      <td>" . $val['name'] . "</td>
                      <td>" . $val['BU'] . "</td>
                      <td>" . getDesignation($val['desig']) . "</td>
                      <td>" . $val['level'] . "</td>
                      <td>" . $val['bp'] . "</td>
                      <td>$amount</td>
                      <td>$mon - $y</td>
                      <td>$mmon - $cyear</td>";

            $data .= add_amount_details($val['30p_cnt'], $val['30p_amt']);
            $data .= add_amount_details($val['70p_cnt'], $val['70p_amt']);
            $data .= add_amount_details($val['100p_cnt'], $val['100p_amt']);

            $total_amt = (int)$val['30p_amt'] + (int)$val['70p_amt'] + (int)$val['100p_amt'];
            $temp += $total_amt;

            $data .= "<td>$total_amt</td>";

            $additional_amount = get_additional_amount($val['empid'], $val['reference_no'], $conn);
            $temp1 += $additional_amount;
            $data .= ($additional_amount == 0) ? "<td>-</td>" : "<td>" . $additional_amount . "</td>";

            $data .= "<td class='noprint btnhide no-print'>
                        <a target='_blank' href='show_seperate_approve_1.php?ref_no=" . $val['reference_no'] . "&empid=" . $val['empid'] . "' class='btn btn-primary btn-sm noprint'>Show</a>
                      </td></tr>";
        }

        $data .= "<tr>
                    <td colspan='17' style='text-align: right;'><b>Total</b></td>
                    <td><b>$temp</b></td>
                    <td><b>$temp1<b></td>
                    <td><b></b></td></tr>";
        
        echo $data;
    } else {
        echo "Error: " . $conn->error;
    }
}

function get_amount($level, $conn)
{
    $sql = "SELECT amount FROM ta_amount WHERE min <= ? AND max >= ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $level, $level);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            return $row['amount'];
        }
    }
    return 0;
}

function get_est_approve_status($empid, $ref_no, $conn)
{
    $sql = "SELECT est_approve FROM taentry_master WHERE empid = ? AND reference_no = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $empid, $ref_no);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            return $row['est_approve'];
        }
    }
    return 0;
}

function get_additional_amount($empid, $ref_no, $conn)
{
    $sql = "SELECT SUM(amount) as amount FROM add_cont WHERE empid = ? AND reference_no = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $empid, $ref_no);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            return $row['amount'];
        }
    }
    return 0;
}

function add_amount_details($count, $amount)
{
    if ($count == '0' && $amount == '0') {
        return "<td>-</td><td>-</td>";
    } else {
        return "<td>$count</td><td>$amount</td>";
    }
}



function get_all_summary($dept_id, $mon, $year)
{
  global $conn;
  // $year=date('Y');
  $data = '';
  $BU_query = "SELECT distinct(BU) from employees WHERE dept='" . $dept_id . "' ";
  $BU_result = mysqli_query($conn, $BU_query);
  $total_BUs = mysqli_num_rows($BU_result);
  //;
  $total_amt = 0;
  $temp = 0;
  $cnt = 1;

  while ($BU_rows = mysqli_fetch_array($BU_result)) {

    $data .= "<tr class='fontcss1' style='text-align: center;'>";
    if ($cnt == 1) {
      $data .= "<td rowspan=" . $total_BUs . ">" . getdepartment($dept_id) . "</td>";
      $cnt++;
    }

    $pfno_query = mysqli_query($conn, "SELECT distinct(pfno) from employees WHERE BU='" . $BU_rows['BU'] . "' AND dept='" . $dept_id . "'");
    $pfno_rows = mysqli_num_rows($pfno_query);


    $claimed_emp_query = mysqli_query($conn, "SELECT count(empid) as claimed_emps from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.forward_status='1' AND BU='" . $BU_rows['BU'] . "' AND dept='" . $dept_id . "' AND TAMonth='" . $mon . "' AND TAYear='" . $year . "' ");
    $claimed_emp_rows = mysqli_fetch_array($claimed_emp_query);

    $for_pa_emp_cnt = 0;
    $vett_pa_emp_cnt = 0;
    $rej_pa_emp_cnt = 0;

    $query12 = mysqli_query($conn, "SELECT tasummarydetails.reference_no,tasummarydetails.empid FROM `master_summary`,tasummarydetails,taentry_master,employees WHERE employees.pfno=taentry_master.empid AND taentry_master.reference_no= tasummarydetails.reference_no AND master_summary.summary_id=tasummarydetails.summary_id AND master_summary.forward_status='1' AND master_summary.pa_status='0' AND taentry_master.forward_status='1' AND taentry_master.TAMonth='" . $mon . "' AND taentry_master.TAYear='" . $year . "' AND employees.dept='" . $dept_id . "' AND employees.BU='" . $BU_rows['BU'] . "' GROUP BY tasummarydetails.reference_no ORDER BY tasummarydetails.id ASC");

    while ($row1 = mysqli_fetch_array($query12)) {
      $for_pa_emp_cnt++;
    }

    $query2 = mysqli_query($conn, "SELECT DISTINCT(master_summary.summary_id), tasummarydetails.empid as ts_empid FROM tasummarydetails,master_summary WHERE tasummarydetails.summary_id=master_summary.summary_id AND master_summary.forward_status='1' AND master_summary.pa_status='1' ORDER BY master_summary.summary_id ASC");

    while ($row2 = mysqli_fetch_array($query2)) {
      $vett_pa_emp_query = mysqli_query($conn, "SELECT empid from employees,taentry_master where employees.pfno=taentry_master.empid AND employees.pfno='" . $row2['ts_empid'] . "' AND taentry_master.forward_status='1' AND BU='" . $BU_rows['BU'] . "' AND dept='" . $dept_id . "' AND TAMonth='" . $mon . "' AND TAYear='" . $year . "' ");
      $vett_pa_emp_query1 = ("SELECT empid from employees,taentry_master where employees.pfno=taentry_master.empid AND employees.pfno='" . $row2['ts_empid'] . "' AND taentry_master.forward_status='1' AND BU='" . $BU_rows['BU'] . "' AND dept='" . $dept_id . "' AND TAMonth='" . $mon . "' AND TAYear='" . $year . "' ");
      if (mysqli_num_rows($vett_pa_emp_query) == 1) {
        $vett_pa_emp_cnt++;
      }
    }

    $vett_emp_query = mysqli_query($conn, "SELECT count(empid) as vetted_tas from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.est_approve='1' AND taentry_master.forward_status='1' AND BU='" . $BU_rows['BU'] . "' AND dept='" . $dept_id . "' AND TAMonth='" . $mon . "' AND TAYear='" . $year . "' ");
    $vett_emp_rows = mysqli_fetch_array($vett_emp_query);



    $rej_emp_query = mysqli_query($conn, "SELECT count(empid) as rejected_tas from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.is_rejected='1' AND taentry_master.forward_status='1' AND BU='" . $BU_rows['BU'] . "' AND dept='" . $dept_id . "' AND TAMonth='" . $mon . "' AND TAYear='" . $year . "' ");
    $rej_emp_rows = mysqli_fetch_array($rej_emp_query);

    $bu = $BU_rows['BU'];

    $data .= "<td>" . $BU_rows['BU'] . "</td>
    	        <td><a href='Show_unclaimed_TA.php?bu=$bu&mon=$mon&year=$year&dept=$dept_id' target='_blank' '>" . $claimed_emp_rows['claimed_emps'] . "</a></td>
	            <td><a href='Show_claimed_TA.php?bu=$bu&mon=$mon&year=$year&dept=$dept_id' target='_blank' '>" . $for_pa_emp_cnt . "</a></td>";
    $data .= "<td><a href='Show_vetted_PA.php?bu=$bu&mon=$mon&year=$year&dept=$dept_id' target='_blank' '>" . $vett_pa_emp_cnt . "</a></td>
		        <td><a href='Show_vetted_ACC.php?bu=$bu&mon=$mon&year=$year&dept=$dept_id' target='_blank' >" . $vett_emp_rows['vetted_tas'] . "</td>
		        <td><a href='Show_rejected_TA.php?bu=$bu&mon=$mon&year=$year&dept=$dept_id' target='_blank' >" . $rej_emp_rows['rejected_tas'] . "</a></td>
		        </tr>";
  }
  echo $data;
}

// function get_all_summary($dept_id,$mon,$year)
// {
//     // $year=date('Y');
//     $data='';
//     $BU_query="SELECT distinct(BU) from employees WHERE dept='".$dept_id."' ";
// 	$BU_result=mysqli_query($BU_query);
// 	$total_BUs=mysqli_num_rows($BU_result);
// 	//;
// 	$total_amt=0;
// 	$temp=0;
// 	$cnt=1;

// 	while($BU_rows = mysqli_fetch_array($BU_result))
// 	{   

//     	$data.="<tr class='fontcss1' style='text-align: center;'>";
// 	    if($cnt == 1)
// 	    {
// 	        $data.= "<td rowspan=".$total_BUs.">".getdepartment($dept_id)."</td>";
// 	        $cnt++;
// 	    }

// 	    $pfno_query=mysqli_query("SELECT distinct(pfno) from employees WHERE BU='".$BU_rows['BU']."' AND dept='".$dept_id."'");
//     	$pfno_rows=mysqli_num_rows($pfno_query);


//     	$for_emp_query=mysqli_query("SELECT distinct(empid) from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.forward_status='1' AND taentry_master.est_approve='0' AND BU='".$BU_rows['BU']."' AND dept='".$dept_id."' AND TAMonth='".$mon."' AND TAYear='".$year."' ");
//     	$for_emp_rows=mysqli_num_rows($for_emp_query);

//     	$vett_emp_query=mysqli_query("SELECT distinct(empid) from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.est_approve='1' AND taentry_master.forward_status='1' AND BU='".$BU_rows['BU']."' AND dept='".$dept_id."' AND TAMonth='".$mon."' AND TAYear='".$year."' ");
//     	$vett_emp_rows=mysqli_num_rows($vett_emp_query);

//     	$rej_emp_query=mysqli_query("SELECT distinct(empid) from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.is_rejected='1' AND taentry_master.forward_status='1' AND BU='".$BU_rows['BU']."' AND dept='".$dept_id."' AND TAMonth='".$mon."' AND TAYear='".$year."' ");
//     	$rej_emp_rows=mysqli_num_rows($rej_emp_query);

//     	$bu=$BU_rows['BU'];

//     	$data.= "<td>".$BU_rows['BU']."</td><td>".$pfno_rows."</td><td><a  href='Show_unclaimed_TA.php?bu=$bu&mon=$mon&year=$year' target='_blank' '>".$for_emp_rows."</a></td>";
// 		$data.="<td><a href='Show_claimed_TA.php?bu=$bu&mon=$mon&year=$year' target='_blank' '>".$vett_emp_rows."</a></td>
// 		        <td><a href='Show_rejected_TA.php?bu=$bu&mon=$mon&year=$year' target='_blank' >".$rej_emp_rows."</a></td>
// 		        </tr>";
//     }
// // 	$data.="<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
// 	echo $data;
// }

function updateUser($fname, $email, $mobile, $design)
{
  global $conn;
  $query = "update users set fname='$fname', designation='$design', mobile='$mobile', email='$email' where id='" . $_SESSION['admin_id'] . "'";
  $result = mysqli_query($conn,$query);
  if ($result)
    return true;
  else
    return false;
}
function changePass($pass, $confirm)
{
  global $conn;
  $query = "update users set password='" . hashPassword($pass, SALT1, SALT2) . "' where empid='" . $_SESSION['empid'] . "'";
  $result = mysqli_query($conn,$query);
  if ($result)
    return true;
  else
    return false;
}
//Designation
function AddDesign($design)
{
  global $conn;
  $query = "insert into designation(designation) values('$design')";
  $result = mysqli_query($conn,$query);
  if ($result)
    return true;
  else
    return false;
}


function fetchEmployeeUpdated($id)
{
  global $conn;
  $query = "select users.empid as empid,employees.name as name,employees.dept as dept,employees.desig as desig,employees.mobile as mobile,users.role as role,employees.station as station,employees.level as level,users.billunit as billunit from users,employees where users.empid=employees.pfno AND users.empid= '" . $id . "'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  $data['pfno'] = $value['empid'];
  $data['name'] = $value['name'];
  $data['dept'] = $value['dept'];
  $data['station'] = fetch_station($value['station']);
  $data['billunit'] = fetch_billunit($value['billunit']);

  $data['option'] = '';
  $query_emp = "select DISTINCT(empid) from users where dept='" . $data['dept'] . "' AND status='1' AND role NOT IN(0) AND empid NOT IN('$id') ";
  $result_emp = mysqli_query($conn,$query_emp);
  echo mysqli_error($conn);
  while ($value_emp = mysqli_fetch_array($result_emp)) {
    $data['option'] .= "<option value='" . $value_emp['empid'] . "'>" . get_employee($value_emp['empid']) . "</option>";
  }

  return json_encode($data);
}

function fetchDesign($id)
{
  global $conn;
  $query = "select * from designation where id = '$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return json_encode($value);
}
function UpdateDesign($design, $id)
{
  global $conn;
  $query = "update designation set designation='$design' where id='$id'";
  $result = mysqli_query($conn,$query);
  if ($result)
    return true;
  else
    return false;
}
function DeleteDesign($id)
{
  global $conn;
  $query = "delete from designation where id='$id'";
  $result = mysqli_query($conn,$query);
  echo "<script>alert('$query');</script>";
  if ($result)
    return true;
  else
    return false;
}
/*function addEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address)
{
  global $con;
  $query = "INSERT INTO `employees`( `empid`, `empname`, `billunit`, `mobile`, `email`, `username`, `password`, `gradepay`, `department`, `designation`, `station`, `address`) VALUES ( '$empid', '$fullname', '$billunit', '$mobile', '$email','$empid' , '$empid', '$gradepay', '$dept', '$design', '$station', '$address')";
  $result = mysqli_query($query) or die(mysqlii_error($con));
  if($result)
    return true;
  else
    return false;
}*/
function updateEmployee($empid, $pannumber, $empname, $billunit, $mobile, $email, $design, $paylevel, $update_id)
{
  global $conn;
  $query = "UPDATE `employees` SET `pfno`='$empid', `name`='$empname', `BU`='$billunit', `mobile`='$mobile', `gp`='$email', `desig`='$design',`panno`='$pannumber',`level`='$paylevel' WHERE id='$update_id'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}
function FetchEmployee($id)
{
  global $conn;
  $query = "select * from employees where id = '$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  $data['empid'] = $value['pfno'];
  $data['empname'] = $value['name'];
  $data['billunit'] = $value['BU'];
  $data['mobile'] = $value['mobile'];
  $data['email'] = $value['gp'];
  // $data['panno']=$value['panno'];
  $data['designation'] = fetch_design_profile($value['desig']);
  $data['level'] = fetch_pay_level($value['level']);
  return json_encode($data);
}
function fetchEmployee1($id)
{
  global $conn;
  $query = "select * from employees where pfno = '$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);

  $qu = mysqli_query($conn,"select empid from users where empid='$id'");
  $res = mysqli_num_rows($qu);
  if ($res > 0) {
    return 1;
  }
  //   else if($value['first_login']==0)
  //   {
  //       return 2;
  //   }
  else {

    $data['empid'] = $value['pfno'];
    $data['empname'] = $value['name'];
    $data['billunit'] = $value['BU'];
    $data['mobile'] = $value['mobile'];
    $data['email'] = $value['email'];
    $data['panno'] = $value['panno'];
    $data['designation'] = $value['desig'];
    $data['level'] = $value['level'];
    $data['fl'] = $value['first_login'];
    return json_encode($data);
  }
}
function deleteEmployee($id)
{
  global $conn;
  $query = "delete from employees where id='$id'";
  $result = mysqli_query($conn,$query);
  if ($result)
    return true;
  else
    return false;
}
function claimTA($data, $reference, $empid, $year, $months, $cnt, $set)
{
  global $conn;
  for ($i = 0; $i <= $cnt; $i++) {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','" . $data['date'][$i] . "','" . $data['train'][$i] . "','" . $data['departS'][$i] . "','" . $data['departT'][$i] . "','" . $data['arrivalS'][$i] . "','" . $data['arrivalT'][$i] . "','" . $data['distance'][$i] . "','" . $data['percent'][$i] . "','" . $data['amount'][$i] . "','" . $data['objective'][$i] . "','$set')";
    $_SESSION['table_ref'] = $reference;
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  }
  if ($result)
    return true;
  else
    return false;
}
function addclaimTA($data, $reference, $empid, $year, $months, $cnt, $set)
{
  global $conn;
  for ($i = 0; $i <= $cnt; $i++) {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','" . $data['date'][$i] . "','" . $data['train'][$i] . "','" . $data['departS'][$i] . "','" . $data['departT'][$i] . "','" . $data['arrivalS'][$i] . "','" . $data['arrivalT'][$i] . "','" . $data['distance'][$i] . "','" . $data['percent'][$i] . "','" . $data['amount'][$i] . "','" . $data['objective'][$i] . "','$set')";
    $_SESSION['table_ref'] = $reference;
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  }
  if ($result)
    return true;
  else
    return false;
}

function getTaAmount($level)
{
  global $conn;
  $query = "select amount from ta_amount where min<=$level AND max>=$level";
  $result  = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['amount'];
}

function approveAndForward($empid, $ref, $forwardName, $original_id)
{
  global $conn;
  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$original_id','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}

function AddEmployee($empid, $pannumber, $empname, $billunit, $mobile, $email, $design, $paylevel)
{
  global $conn;
  $query = "insert into employees(pfno,panno,name,BU,mobile,gp,desig,level,station,dept,psw) values('$empid','$pannumber','$empname','$billunit','$mobile','$email','$design','$paylevel','Solapur','ACCOUNTS','123')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}

function AddUser($empid, $username, $psw, $role)
{
  global $conn;
  $query = "insert into users(empid,username,password,role) values('$empid','$username','" . hashPassword($psw, SALT1, SALT2) . "','$role')";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}
function AddAdmin($empid, $username, $psw, $dept)
{
    global $conn;

    // Define the role
    $role = '05';

    // Prepare the query for inserting a new user
    $query = $conn->prepare("INSERT INTO users (empid, username, password, role, dept) VALUES (?, ?, ?, ?, ?)");
    $hashedPassword = hashPassword($psw, SALT1, SALT2);
    $query->bind_param("sssss", $empid, $username, $hashedPassword, $role, $dept);
    $result = $query->execute();

    // Connect to user_permission database
    db_connect("esoluhp6_sur_railway");

    // Check if the user already has permissions
    $user_p_query = $conn->prepare("SELECT pf_num, tamm FROM user_permission WHERE pf_num = ?");
    $user_p_query->bind_param("s", $empid);
    $user_p_query->execute();
    $user_p_result = $user_p_query->get_result();
    $user_p_cnt = $user_p_result->num_rows;

    if ($user_p_cnt > 0) {
        $user_p_rows = $user_p_result->fetch_assoc();
        $tamm_rows = $user_p_rows['tamm'] . ",$role";
        $sql_up = $conn->prepare("UPDATE user_permission SET tamm = ? WHERE pf_num = ?");
        $sql_up->bind_param("ss", $tamm_rows, $empid);
    } else {
        $sql_up = $conn->prepare("INSERT INTO user_permission (pf_num, tamm) VALUES (?, ?)");
        $sql_up->bind_param("ss", $empid, $role);
    }
    $result_up = $sql_up->execute();

    if ($result && $result_up) {
        // Connect to employees database
        db_connect("esoluhp6_travel_allowance1");

        // Update the employee details
        $query1 = $conn->prepare("UPDATE employees SET name = ?, desig = ?, mobile = ?, email = ?, level = ? WHERE pfno = ?");
        $query1->bind_param("ssssss", $empname, $design, $mobile, $email, $paylevel, $empid);
        $result1 = $query1->execute();

        return $result1;
    } else {
        return false;
    }
}


function AddAcctAdmin($empid, $username, $psw, $bu)
{
    global $conn;

    // Define the role
    $role = '5';

    // Prepare the query for inserting a new user
    $query = $conn->prepare("INSERT INTO users (empid, username, password, role, dept, billunit) VALUES (?, ?, ?, ?, ?, ?)");
    $hashedPassword = hashPassword($psw, SALT1, SALT2);
    $dept = '1'; // Hardcoded as per the original logic
    $query->bind_param("ssssss", $empid, $username, $hashedPassword, $role, $dept, $bu);
    $result = $query->execute();

    // Connect to user_permission database
    db_connect("esoluhp6_sur_railway");

    // Check if the user already has permissions
    $user_p_query = $conn->prepare("SELECT pf_num, tamm FROM user_permission WHERE pf_num = ?");
    $user_p_query->bind_param("s", $empid);
    $user_p_query->execute();
    $user_p_result = $user_p_query->get_result();
    $user_p_cnt = $user_p_result->num_rows;

    if ($user_p_cnt > 0) {
        $user_p_rows = $user_p_result->fetch_assoc();
        $tamm_rows = $user_p_rows['tamm'];
        $ext_roles = explode(',', $tamm_rows);

        if (!in_array($role, $ext_roles)) {
            array_push($ext_roles, $role);
        }
        $final_role = implode(',', $ext_roles);

        $sql_up = $conn->prepare("UPDATE user_permission SET tamm = ? WHERE pf_num = ?");
        $sql_up->bind_param("ss", $final_role, $empid);
    } else {
        $sql_up = $conn->prepare("INSERT INTO user_permission (pf_num, tamm) VALUES (?, ?)");
        $sql_up->bind_param("ss", $empid, $role);
    }
    $result_up = $sql_up->execute();

    return $result && $result_up;
}


function updateAccData($empid, $bu)
{
  global $conn;
  $query = "UPDATE `users` SET `billunit`='" . $bu . "' WHERE username='" . $empid . "' ";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn,));
  if ($result)
    return true;
  else
    return false;
}

function activeUser($pfno, $active)
{
  global $conn;
  $query = "update users set status='$active' where empid='$pfno'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}
function deactiveUser($pfno, $active)
{
  global $conn;
  $query = "update users set status='$active' where empid='$pfno'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if ($result)
    return true;
  else
    return false;
}

function applybillunit($empid, $billunit)
{
  global $conn;
  $query = "insert into sep_billunit(employee_id,billunit) values('" . $empid . "','" . $billunit . "')";
  $result = mysqli_query($conn,$query);
  if ($result)
    return true;
  else
    return false;
}
