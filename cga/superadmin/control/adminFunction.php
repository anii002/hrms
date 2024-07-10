<?php
date_default_timezone_set("Asia/kolkata");
$date=date("d-m-Y h:i:sa" ); 

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests

function get_employee_details($id)
{
//   dbcon1();
//   $qu=mysql_query("SELECT pf_number from login where pf_number='$id'");
//   $res=mysql_num_rows($qu);
//   if($res > 0)
//   {
//      return 1;
//   }
//   else
  {
    $data=[];
    dbcon2();
    $sql=mysql_query("SELECT * from register_user where emp_no='$id'");
    $res=mysql_fetch_array($sql);
    $data['pf_number']=$res['emp_no'];
    $data['emp_name']=$res['name'];
    $data['designation']=designation($res['designation']);
    $data['scale']=$res['basic_pay'];
    $data['dept']=getdepartment($res['department']);
    $data['dept1']=($res['department']);
    $data['mobile']=$res['mobile'];
    $data['dob']=$res['dob'];
  }
    return $data;
}

function add_user($empid,$username,$psw,$deptt1,$role,$unit_id){
  //dbcon1();
  $psw1=explode('/',$psw);
  
   $psw=$psw1[0].$psw1[1].$psw1[2];

  $date=date("d-m-Y h:i:sa" ); 
    
    dbcon2();
    
                       $sql_in="SELECT pf_num,cga from user_permission where pf_num='$username'";
						$sql=mysql_query($sql_in);
						//var_dump($sql);
						if(mysql_num_rows($sql)==0)
						{
							$ins=mysql_query("INSERT into user_permission(`pf_num`,`cga`) values('$username','$role')");
							if($ins)
							{
							    dbcon1();
						$query=mysql_query("INSERT INTO `login`(`username`, `password`, `pf_number`, `role`,`dept`,`unit_id`,`created_at`) VALUES ('$username','".hashPassword($psw,SALT1,SALT2)."','$empid','$role','$deptt1','$unit_id','$date')");
							}
						}
						else
						{
						    
							$row_usr=mysql_fetch_array($sql);
							if(empty($row_usr["cga"]))
							{
								
								 $upd=("UPDATE user_permission set cga='$role' where pf_num='$username'");	
								$ss=mysql_query($upd);
								if($ss){
								    dbcon1();
						$query=mysql_query("INSERT INTO `login`(`username`, `password`, `pf_number`, `role`,`dept`,`unit_id`,`created_at`) VALUES ('$username','".hashPassword($psw,SALT1,SALT2)."','$empid','$role','$deptt1','$unit_id','$date')");
								}
							}
							else
							{
								$user_perm = explode(",", $row_usr["cga"]);
								//print_r($user_perm);
								if(in_array("$role", $user_perm))
								{
        									echo "<script>
        						alert('Already preseted in db!!!!');
        						window.location='../add_user.php';
        						</script>";
									
								}
								elseif(!in_array(",", $user_perm))
								{
									array_push($user_perm,$role);
									$user_perm=(count($user_perm)>1)?implode(",", $user_perm):1;
								//print_r($user_perm);
								 $upd=("UPDATE user_permission set cga='".$user_perm."' where pf_num='".$username."'");	
								$s=mysql_query($upd);
								if($s)
								{
								    dbcon1();
						$query=mysql_query("INSERT INTO `login`(`username`, `password`, `pf_number`, `role`,`dept`,`unit_id`,`created_at`) VALUES ('$username','".hashPassword($psw,SALT1,SALT2)."','$empid','$role','$deptt1','$unit_id','$date')");
								}
								}
								
								
							}
							
						}
    
    
    if($query)
    {
      return '1';
    }else{
      return '0';
    }
}



function changeimg($name,$tmp_name)
{
  dbcon1();
	$upload_dir = "../profile/".$_SESSION['username'].".jpg";
	$dir = "profile/".$_SESSION['username'].".jpg";
	if (move_uploaded_file($tmp_name, $upload_dir)) {
		$query = mysql_query("UPDATE login set img='".$dir."' where username='".$_SESSION['username']."'");
        return true;
    } else {
        return false;
    }
}

function changePass($pass,$confirm)
{
  dbcon1();
  global $con;
  $query = "UPDATE login set password='".hashPassword($pass,SALT1,SALT2)."' where pf_number='".$_SESSION['pf_number']."'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}

function AddAdmin($empid,$username,$psw,$dept)
{
  dbcon1();
  $query = "insert into login(pf_number,username,password,role) values('$empid','$username','".hashPassword($psw,SALT1,SALT2)."','$dept')";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}

function activeUser($pfno,$active){
  //global $con;
  dbcon1();
  $query = "UPDATE login set status='$active' where pf_number='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
function deactiveUser($pfno,$active){
  //global $con;
  dbcon1();
  $query = "UPDATE login set status='$active' where pf_number='$pfno'";
  $result = mysql_query($query) or die(mysql_error());
  if($result)
    return true;
  else
    return false;
}
