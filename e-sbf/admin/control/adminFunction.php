<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");


function fetchEmployee1($id)
{
  // global $con;
  $conn=dbcon1();
  $query = "select * from register_user where emp_no = '$id'";
  $result = mysqli_query($conn,$query);
  $conn=dbcon();
  $query_check = mysqli_query($conn,"SELECT user_pfno FROM add_user WHERE user_pfno = '$id'");
  $row = mysqli_num_rows($query_check);
  if($row > 0)
  {
    return 1;  
  }
  else
  {
      $value = mysqli_fetch_array($result);
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
  // global $con;
  $conn=dbcon();
  $query = "delete from add_user where user_id='$id'";
  $result = mysqli_query($conn,$query);
  if($result)
    return true;
  else
    return false;
}
function fetchuser($id)
{
  // global $con;
  $conn= dbcon();
  $query = "select * from add_user where user_id = '$id'";
  $result = mysqli_query($conn,$query);
  if($result)
  {
      $value = mysqli_fetch_array($result);
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
	{		
    $conn=dbcon1();

		$sql = "SELECT name, designation, station FROM register_user WHERE emp_no = '$pf'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function get_designation($id)
	{
    $conn=dbcon1();
		$sql = "SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row['DESIGLONGDESC'];
	}


	function get_station($id)
	{
    $conn=dbcon1();
		$sql = "SELECT stationdesc FROM station WHERE stationcode = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row['stationdesc'];
	}
?>
