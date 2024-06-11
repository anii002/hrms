<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");


function fetchEmployee1($id)
{
  global $con;
  dbcon1();
  $query = "select * from resgister_user where emp_no = '$id'";
  $result = mysql_query($query);
  dbcon();
  $query_check = mysql_query("SELECT user_pfno FROM add_user WHERE user_pfno = '$id'");
  $row = mysql_num_rows($query_check);
  if($row > 0)
  {
    return 1;  
  }
  else
  {
      $value = mysql_fetch_array($result);
      $data['empid']=$value['emp_no'];
      $data['empname']=$value['name'];
      $data['billunit']=$value['bill_unit'];
      $data['phoneno']=$value['mobile'];
      $data['email2']=$value['emp_email'];
      $data['dept']=getdepartment($value['department']);
      $data['deptno']=($value['department']);
      $data['desigcode']=designation($value['designation']);
      $data['designo']=($value['designation']);
      $data['pc7_level']=$value['7th_pay_level'];
      $data['office']=$value['office'];
      $data['station']=$value['station'];
      $data['dob']=$value['dob'];
      return json_encode($data);
  }
}
function deleteuser($id)
{
  global $con;
  dbcon();
  $query = "delete from add_user where user_id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function fetchuser($id)
{
  global $con;
  dbcon();
  $query = "select * from add_user where user_id = '$id'";
  $result = mysql_query($query);
  if($result)
  {
      $value = mysql_fetch_array($result);
      $data['user_bu']=$value['user_bu'];
      $data['user_role']=$value['user_role'];

      return json_encode($data);  
  }
  else
  {
     return 1;
  }
}
function get_emp($pf)
	{		dbcon1();

		$sql = "SELECT name, designation, station FROM resgister_user WHERE emp_no = '$pf'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row;
	}

	function get_designation($id)
	{dbcon1();
		$sql = "SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE = '$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['DESIGLONGDESC'];
	}


	function get_station($id)
	{dbcon1();
		$sql = "SELECT stationdesc FROM station WHERE stationcode = '$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row['stationdesc'];
	}
?>
