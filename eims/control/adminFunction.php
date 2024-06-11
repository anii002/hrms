<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
include("function.php");
session_start();
//adminProcee requests

function AddAdmin($empid,$username,$psw,$role,$dept,$station)
{
  global $con;
  dbcon1();
  $query = "insert into users1(empid,username,password,role,dept, station) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','$role','$dept','$station')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function activeUser1($pfno,$active){
  global $con;
  dbcon1();
  $query = "update users1 set status='$active' where empid='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function deactiveUser1($pfno,$active){
  global $con;
  dbcon1();
  $query = "update users1 set status='$active' where empid='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function changeimg($name,$tmp_name)
{
  dbcon2();
	$upload_dir = "../profile/".$_SESSION['empid'].".jpg";
	$dir = "profile/".$_SESSION['empid'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysql_query("update employees set img='$dir' where pfno='".$_SESSION['empid']."'");
        return true;
    } else {
        return false;
    }
}
function updateUser($fname,$email,$mobile,$design)
{
  global $con;
  dbcon1();
  $query = "update users1 set fname='$fname', designation='$design', mobile='$mobile', email='$email' where id='".$_SESSION['admin_id']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}



//--------------------------------------------------------

 


//----------------------------------------------------------
function changePass($pass,$confirm)
{
  dbcon2();
  global $con;
  $query = "update prmaemp set psw='".hashPassword($pass,SALT1,SALT2)."' where empno='".$_SESSION['user']."'";
  $result = mysql_query($query);
  if($result) 
    return true;
  else
    return false;
}

function FetchEmployee($id)
{
  global $con;
  dbcon();
  $query = "select * from employees where id = '$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data['empid']=$value['pfno'];
  $data['empname']=$value['name'];
  $data['billunit']=$value['BU'];
  $data['mobile']=$value['mobile'];
  $data['email']=$value['gp'];
  $data['panno']=$value['panno'];
  $data['designation']=fetch_design_profile($value['desig']);
  $data['level']=fetch_pay_level($value['level']);
  return json_encode($data);
}

function fetchEmployee1($id)
{
  global $con;
  dbcon2();
  $query = "select * from prmaemp where empno = '$id'";
  $result = mysql_query($query);
  dbcon1();
  $qu=mysql_query("select empid from users1 where empid='$id'");
  $res=mysql_num_rows($qu);
  if($res > 0)
  {
     return 1;
  }
  else
  {
      $value = mysql_fetch_array($result);
      $data['empid']=$value['empno'];
      $data['empname']=$value['empname'];
      $data['billunit']=$value['billunit'];
      $data['phoneno']=$value['phoneno'];
      $data['email2']=$value['email2'];
      $data['pan']=$value['pan'];
      $data['desigcode']=$value['desigcode'];
      $data['pc7_level']=$value['pc7_level'];
      $data['dept']=getdepartment($value['deptcode']);
      return json_encode($data);
  }
}


function AddUser($empid,$username,$psw,$role)
{
  global $con;
  dbcon1();
  $query = "insert into users1(empid,username,password,role) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','$role')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function activeUser($pfno,$active){
  global $con;
  dbcon1();
  $query = "update employees set status='$active' where pfno='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}


function deactiveUser($pfno,$active){
  global $con;
  dbcon1();
  $query = "update employees set status='$active' where pfno='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}



function deleteOffice($id)
{
  global $con;
  dbcon1();
  $query = "delete from office_order where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function deletenotification($id)
{
  global $con;
  dbcon1();
  $query = "delete from `e-notification1` where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function deleteseniority($id)
{
  global $con;
  dbcon1();
  $query = "delete from seniority_list where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function deletecircular($id)
{
  global $con;
  dbcon1();
  $query = "delete from circular where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
function activeUser2($pfno,$active){
  global $con;
  dbcon1();
  $query = "update users1 set status='$active' where username='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}


function deactiveUser2($pfno,$active){
  global $con;
  dbcon1();
  $query = "update users1 set status='$active' where username='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function deletechecklist($id)
{
  global $con;
  dbcon1();
  $query = "delete from checklist where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}


function deletetransfer($id)
{
  global $con;
  dbcon1();
  $query = "delete from transfer_registration where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}


function deletePhoto_Gallary($id)
{
  global $con;
  dbcon1();
  $query = "delete from photo_gallary where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}
