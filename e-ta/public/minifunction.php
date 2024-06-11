<?php
date_default_timezone_set("Asia/kolkata");
include("../dbconfig/dbcon.php");
if (isset($_GET['action']))
{
 switch($_GET['action'])
  {
  			case 'user_register':

  					$txtpfno=$_POST['txtpfno'];
                    $txtuser=$_POST['txtuser'];
  					$txtdepartment=$_POST['txtdepartment'];
  					$txtdesignation=$_POST['txtdesignation'];
  					$txtworkstation=$_POST['txtworkstation'];
  					$txtmobile=$_POST['txtmobile'];
  					$txtbasicpay=$_POST['txtbasicpay'];
  				    $txtworkdepot=$_POST['txtworkdepot'];
  					$txtlevel=$_POST['txtlevel'];
  				    $txtdob=$_POST['txtdob'];
                    $dob_date=date('Y-m-d', strtotime($txtdob));
                    $txtappointment=$_POST['txtappointment'];
  					$app_date=date('Y-m-d', strtotime($txtappointment));
  					// $txtappointment=$_POST['txtappointment'];
  					 $psw=explode('-',$dob_date);
  					 //print_r($psw);
  					$pass=$psw[2].$psw[1].$psw[0];
  					$sql=mysql_query("INSERT INTO `employees`(`BU`, `pfno`, `panno`, `name`, `desig`, `station`, `mobile`, `email`, `catg`, `dept`,`depot_id`, `grade`, `bp`, `gp`, `bdate`, `apdate`, `level`, `adpass`, `psw`, `status`, `unit`, `first_login`, `img`, `added_by`) VALUES ('','".$txtpfno."','','".$txtuser."','".$txtdesignation."','".$txtworkstation."','".$txtmobile."','','','".$txtdepartment."','".$txtworkdepot."','','".$txtbasicpay."','','".$dob_date."','".$app_date."','".$txtlevel."','','".hashPassword($pass,SALT1,SALT2)."','0','','0','','')");
  		 			//echo "INSERT INTO `employees`(`BU`, `pfno`, `panno`, `name`, `desig`, `station`, `mobile`, `email`, `catg`, `dept`,`depot_id`, `grade`, `bp`, `gp`, `bdate`, `apdate`, `level`, `adpass`, `psw`, `status`, `unit`, `first_login`, `img`, `added_by`) VALUES ('','".$txtpfno."','','".$txtuser."','".$txtdesignation."','".$txtworkstation."','".$txtmobile."','','','".$txtdepartment."','".$txtworkdepot."','','".$txtbasicpay."','','".$dob_date."','".$app_date."','".$txtlevel."','','".hashPassword($pass,SALT1,SALT2)."','0','','0','','')";
                       
  					if($sql)
  					{
  						echo "<script> alert('Register Successfully'); window.location='../index.php'; </script>";

  					}
  					else
  					{
  						echo "<script> alert('Failed to register');  window.location='../user_register.php'; </script>";
  						//echo "<script> alert('Failed to register');</script>";
  					}
  				break;

  }
}



if (isset($_POST['action']))
{
 switch($_POST['action'])
  {
    case 'getDepot':
          $id=$_POST['id'];
          $data='';
          $query1 = mysql_query("SELECT `dept_id`,deptname FROM `department` WHERE deptname='$id' ");
          $deptt_id=mysql_fetch_array($query1);
          $query = mysql_query("SELECT `id`,`stationcode`,`depot`, `dept_id` FROM `depot_master` WHERE dept_id='".$deptt_id['dept_id']."' and status='1'");
          //echo "SELECT `id`,stationcode,`depot`, `dept_id` FROM `depot_master` WHERE dept_id='$id' and status='1'";
         $data="<option value=' ' selected disabled>डिपो का चयन करें / Select Working Depot</option>";  
      
        while($res = mysql_fetch_array($query))
          { 
            $data.="<option value='".$res['id']."'>".$res['depot']."</option>";
          }
          echo $data;
    break;
  }
}



?>

