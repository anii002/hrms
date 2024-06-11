<?php
date_default_timezone_set("Asia/kolkata");
include("../../dbconfig/dbcon.php");
include("function.php");
session_start();

function changeimg($name,$tmp_name)
{
	$upload_dir = "../profile/".$_SESSION['empid'].".jpg";
	$dir = "profile/".$_SESSION['empid'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysql_query("update users set img='$dir' where empid='".$_SESSION['empid']."'");
        return true;
    } else {
        return false;
    }
}
function updateUser($fname,$email,$mobile,$design)
{
  global $con;
  $query = "update users set fname='$fname', designation='$design', mobile='$mobile', email='$email' where id='".$_SESSION['admin_id']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function changePass($pass,$confirm)
{
  global $con;
  $query = "update users set password='".hashPassword($pass,SALT1,SALT2)."' where empid='".$_SESSION['empid']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
//Designation
function AddDesign($design)
{
  global $con;
  $query = "insert into designation(designation) values('$design')";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function fetchDesign($id)
{
  global $con;
  $query = "select * from designation where id = '$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return json_encode($value);
}
function UpdateDesign($design,$id)
{
  global $con;
  $query = "update designation set designation='$design' where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function DeleteDesign($id)
{
  global $con;
  $query = "delete from designation where id='$id'";
  $result = mysql_query($query);
    echo "<script>alert('$query');</script>";
  if($result)
    return true;
  else
    return false;
}
/*function addEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address)
{
  global $con;
  $query = "INSERT INTO `employees`( `empid`, `empname`, `billunit`, `mobile`, `email`, `username`, `password`, `gradepay`, `department`, `designation`, `station`, `address`) VALUES ( '$empid', '$fullname', '$billunit', '$mobile', '$email','$empid' , '$empid', '$gradepay', '$dept', '$design', '$station', '$address')";
  $result = mysql_query($query) or die(mysqli_error($con));
  if($result)
    return true;
  else
    return false;
}*/
function updateEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel,$update_id)
{
  global $con;
  $query = "UPDATE `employees` SET `pfno`='$empid', `name`='$empname', `BU`='$billunit', `mobile`='$mobile', `gp`='$email', `desig`='$design',`panno`='$pannumber',`level`='$paylevel' WHERE id='$update_id'";
  $result = mysql_query($query) or die(mysqli_error($con));
  if($result)
    return true;
  else
    return false;
}
function FetchEmployee($id)
{
  global $con;
  $query = "select * from employees where id = '$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data['empid']=$value['pfno'];
  $data['empname']=$value['name'];
  $data['billunit']=$value['BU'];
  $data['mobile']=$value['mobile'];
  $data['email']=$value['gp'];
  // $data['panno']=$value['panno'];
  $data['designation']=fetch_design_profile($value['desig']);
  $data['level']=fetch_pay_level($value['level']);
  return json_encode($data);
}
function fetchEmployee1($id)
{
  global $con;
  $query = "select * from employees where pfno = '$id'";
  $result = mysql_query($query);
  $qu=mysql_query("select empid from users where empid='$id'");
  $res=mysql_num_rows($qu);
  if($res > 0)
  {
     return 1;
  }
  else
  {
      $value = mysql_fetch_array($result);
      $data['empid']=$value['pfno'];
      $data['empname']=$value['name'];
      $data['billunit']=$value['BU'];
      $data['mobile']=$value['mobile'];
      $data['email']=$value['email'];
      $data['panno']=$value['panno'];
      $data['designation']=$value['desig'];
      $data['level']=$value['level'];
      return json_encode($data);
  }
}
function deleteEmployee($id)
{
  global $con;
  $query = "delete from employees where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function claimTA($data,$reference,$empid,$year,$months,$cnt,$set)
{
  global $con;
  for($i=0;$i<=$cnt;$i++)
  {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','".$data['date'][$i]."','".$data['train'][$i]."','".$data['departS'][$i]."','".$data['departT'][$i]."','".$data['arrivalS'][$i]."','".$data['arrivalT'][$i]."','".$data['distance'][$i]."','".$data['percent'][$i]."','".$data['amount'][$i]."','".$data['objective'][$i]."','$set')";
    $_SESSION['table_ref']=$reference;
    $result = mysql_query($query) or die(mysql_error());
  }
  if($result)
    return true;
  else
    return false;
}
function addclaimTA($data,$reference,$empid,$year,$months,$cnt,$set)
{
  global $con;
  for($i=0;$i<=$cnt;$i++)
  {
    $query = "INSERT INTO `taentryforms`(`TAYear`,`TAMonth`,`empid`,`reference`, `taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `objective`,`set_number`) VALUES ('$year','$months','$empid','$reference','".$data['date'][$i]."','".$data['train'][$i]."','".$data['departS'][$i]."','".$data['departT'][$i]."','".$data['arrivalS'][$i]."','".$data['arrivalT'][$i]."','".$data['distance'][$i]."','".$data['percent'][$i]."','".$data['amount'][$i]."','".$data['objective'][$i]."','$set')";
    $_SESSION['table_ref']=$reference;
    $result = mysql_query($query) or die(mysql_error());
  }
  if($result)
    return true;
  else
    return false;
}

function getTaAmount($level)
{
  $query = "select amount from ta_amount where min<=$level AND max>=$level";
  $result  = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['amount'];
}



function get_summary($sum_id)
{
    $data='';
    $sql="SELECT * from tasummarydetails,employees where  tasummarydetails.empid=employees.pfno AND summary_id='".$sum_id."' AND is_summary_generated='1' order by employees.BU ASC ";
	$res=mysql_query($sql);
	//;
	$total_amt=0;
	$temp=0;
	while($val=mysql_fetch_array($res))
	{
	
   // echo "SELECT * from employees where pfno='".$val['empid']."' order by BU ASC";
	$sql1=mysql_query("SELECT * from employees where pfno='".$val['empid']."' order by BU ASC");
	$val1=mysql_fetch_array($sql1);
	echo mysql_error();

	 $level=$val1['level'];
	$sql2="SELECT * from ta_amount where min<='".$level."' AND max>='".$level."' ";
	$res2=mysql_query($sql2);
	$val2=mysql_fetch_array($res2);

	  $val['empid']."_".$amount=$val2['amount'];

	$month_array=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
	$month_array1=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
	$mon='';
	$mmon='';
// 		 $m=$val['month'];
	$mts=explode(",",$val['month']);
    //print_r($mts);
	$s=$mts[0];
	$y=substr( $val['year'],2);
	// print_r($month_array);
	if($month_array[$s])
	{
		 $mon=$month_array[$s];
	}	


	 $cdate=substr($val['created_at'],3,2);
	 $cyear=substr($val['created_at'],8,2);
	if($month_array1[$cdate])
	{
		 $mmon=$month_array1[$cdate];
	}	
    
    $query1="SELECT est_approve FROM `taentry_master` WHERE empid='".$val['empid']."' AND reference_no='".$val['reference_no']."' ";
    $result1=mysql_query($query1);
    $row1=mysql_fetch_array($result1);
    
    $status=$row1['est_approve'];
    
    
    
	$data.="
	<tr class='fontcss1'>";
	if($status == '1'){
        $data.= "<td style='color:#0b10f5;'>Vetted</td>";
    }
    else{
        $data.= "<td style='color:red;'>Non-Vetted</td>";
    }
	 $data.= "	
		<td>".getdepartment($val['dept'])."</td>
		<td>".$val['empid']."</td>
		<td>".$val1['name']."</td>
		<td>".$val1['BU']. "</td>
		<td>".getDesignation($val1['desig'])."</td>
		<td>".$val1['level']."</td>
		<td>".$val1['bp']."</td>
		<td>$amount</td>
		<td>$mon - $y</td>
		<td>$mmon - $cyear</td>";

		if($val['30p_cnt'] == '0' && $val['30p_amt']== '0')
		{
			$data.= "
			<td>-</td>
		<td>-</td>
			";	
			$t1=0;
		}
		else{
			$data.= "
			<td>".$val['30p_cnt']."</td>
		<td>".$val['30p_amt']."</td>
			";
			$t1=$val['30p_amt'];

		}
		if($val['70p_cnt'] == '0' && $val['70p_amt']== '0')
		{
			$data.= "
			<td>-</td>
		<td>-</td>
			";	
			$t2=0;
		}
		else{
			$data.= "
			<td>".$val['70p_cnt']."</td>
		<td>".$val['70p_amt']."</td>
			";
			$t2=$val['70p_amt'];
		}
		if($val['100p_cnt'] == '0' && $val['100p_amt']== '0')
		{
			$data.= "
			<td>-</td>
		<td>-</td>
			";
			$t3=0;	
		}
		else{
			$data.= "
			<td>".$val['100p_cnt']."</td>
		<td>".$val['100p_amt']."</td>
			";
			$t3=$val['100p_amt'];

		}
		
		$total_amt =(int)$t1 + (int)$t2 + (int)$t3;
		$temp=$temp+$total_amt;

		$data.= "
		<td>$total_amt</td>";
        $tcnt=0;
		$sqll=mysql_query("SELECT SUM(amount) as amount FROM `add_cont` WHERE empid='".$val['empid']."' AND reference_no='".$val['reference_no']."' ");
		$ress=mysql_fetch_array($sqll);
		$tcnt=$tcnt + $ress['amount'];
		$temp1=$temp1 + $tcnt;
		if($ress['amount'] == '0' || $ress['amount'] == null){
			
		$data.= "<td>-</td>";
		}
		else
		{
			$data.= "<td>".$ress['amount']."</td>";
		}
		$data.= "<td class='noprint btnhide'>
		<a target='_blank' href='show_seperate_approve_1.php?ref_no=".$val['reference_no']."&empid=".$val['empid']."' class='btn btn-primary btn-sm noprint'>Show</a>
		</td></tr>";
	    
	}

	$data.= "<tr>
		
		<td colspan='17' style='text-align: right;'><b>Total</b></td>
		<td><b>$temp</b></td>
		<td><b>$temp1<b></td>
		<td><b></b></td></tr>";
	echo $data;
}


function get_all_summary($dept_id,$mon,$year)
{
    // $year=date('Y');
    $data='';
    $BU_query="SELECT distinct(BU) from employees WHERE dept='".$dept_id."' ";
	$BU_result=mysql_query($BU_query);
	$total_BUs=mysql_num_rows($BU_result);
	//;
	$total_amt=0;
	$temp=0;
	$cnt=1;

	while($BU_rows = mysql_fetch_array($BU_result))
	{   
	    
    	$data.="<tr class='fontcss1' style='text-align: center;'>";
	    if($cnt == 1)
	    {
	        $data.= "<td rowspan=".$total_BUs.">".getdepartment($dept_id)."</td>";
	        $cnt++;
	    }
	    
	    $pfno_query=mysql_query("SELECT distinct(pfno) from employees WHERE BU='".$BU_rows['BU']."' AND dept='".$dept_id."'");
    	$pfno_rows=mysql_num_rows($pfno_query);
    	
    	
    	$for_emp_query=mysql_query("SELECT distinct(empid) from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.forward_status='1' AND taentry_master.est_approve='0' AND BU='".$BU_rows['BU']."' AND dept='".$dept_id."' AND TAMonth='".$mon."' AND TAYear='".$year."' ");
    	$for_emp_rows=mysql_num_rows($for_emp_query);
    	
    	$vett_emp_query=mysql_query("SELECT distinct(empid) from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.est_approve='1' AND taentry_master.forward_status='1' AND BU='".$BU_rows['BU']."' AND dept='".$dept_id."' AND TAMonth='".$mon."' AND TAYear='".$year."' ");
    	$vett_emp_rows=mysql_num_rows($vett_emp_query);
    	
    	$rej_emp_query=mysql_query("SELECT distinct(empid) from employees,taentry_master where employees.pfno=taentry_master.empid AND taentry_master.is_rejected='1' AND taentry_master.forward_status='1' AND BU='".$BU_rows['BU']."' AND dept='".$dept_id."' AND TAMonth='".$mon."' AND TAYear='".$year."' ");
    	$rej_emp_rows=mysql_num_rows($rej_emp_query);
    	
    	$bu=$BU_rows['BU'];
    	
    	$data.= "<td>".$BU_rows['BU']."</td><td>".$pfno_rows."</td><td><a href='Show_unclaimed_TA.php?bu=$bu&mon=$mon&year=$year' target='_blank' '>".$for_emp_rows."</a></td>";
		$data.="<td><a href='Show_claimed_TA.php?bu=$bu&mon=$mon&year=$year' target='_blank' '>".$vett_emp_rows."</a></td>
		        <td><a href='Show_rejected_TA.php?bu=$bu&mon=$mon&year=$year' target='_blank' >".$rej_emp_rows."</a></td>
		        </tr>";
    }
// 	$data.="<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
	echo $data;
}


function approveAndForward($empid,$ref,$forwardName,$original_id)
{
  global $con;
  $query = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$ref' AND fowarded_to='$empid'";
  $result = mysql_query($query) or die(mysql_error());
  $query = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$original_id','$ref','$forwardName',CURRENT_TIMESTAMP,'1')";
  $result = mysql_query($query) or die(mysql_erro());
  if($result)
    return true;
  else
    return false;
}

function AddEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel)
{
  global $con;
  $query = "insert into employees(pfno,panno,name,BU,mobile,gp,desig,level,station,dept,psw) values('$empid','$pannumber','$empname','$billunit','$mobile','$email','$design','$paylevel','Solapur','ACCOUNTS','123')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function AddUser($empid,$username,$psw,$role)
{
  global $con;
  $query = "insert into users(empid,username,password,role) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','$role')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function AddAdmin($empid,$username,$psw,$dept)
{
  global $con;
  $query = "insert into users(empid,username,password,role,dept) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','11','$dept')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function activeUser($pfno,$active){
  global $con;
  $query = "update users set status='$active' where empid='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function deactiveUser($pfno,$active){
  global $con;
  $query = "update users set status='$active' where empid='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function applybillunit($empid,$billunit)
{
  $query = "insert into sep_billunit(employee_id,billunit) values('".$empid."','".$billunit."')";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}


