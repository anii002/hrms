<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function get_employee_details($id)
{

dbcon1();
  $qu=mysql_query("SELECT ex_emp_pfno from drmpsurh_cga.applicant_registration where ex_emp_pfno='$id'");
  $res=mysql_num_rows($qu);
  if($res > 0)
  {
     return 1;
  }
  else
  {

    $data=[];
    $sql=mysql_query("select * from register_user where emp_no='$id'");
    $res=mysql_fetch_array($sql);
    $data['pf_number']=$res['emp_no'];
    $data['empname']=$res['name'];
    $data['designation']=designation($res['designation']);
    $data['department']=getdepartment($res['department']);
  }  

    return $data;
}

function changeimg($name,$tmp_name)
{
  dbcon1();
	$upload_dir = "../profile/".$_SESSION['pf_number'].".jpg";
	$dir = "profile/".$_SESSION['pf_number'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysql_query("UPDATE drmpsurh_cga.login set img='$dir' where pf_number='".$_SESSION['pf_number']."'");
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
  dbcon1();
  $query = "UPDATE drmpsurh_cga.login set password='".hashPassword($pass,SALT1,SALT2)."' where pf_number='".$_SESSION['pf_number']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}


function activeUser($pfno,$active){
dbcon1();
  $query = "UPDATE drmpsurh_cga.applicant_registration set status='$active' where ex_emp_pfno='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function deactiveUser($pfno,$active){
  dbcon1();
  $query = "UPDATE drmpsurh_cga.applicant_registration set status='$active' where ex_emp_pfno='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}



