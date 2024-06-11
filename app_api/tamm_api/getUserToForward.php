<?php

require_once 'DB_function.php';
$db=new DB_Function();
$response=array();

if(isset($_REQUEST['dept'])&&isset($_REQUEST['empID']))
{
	$dept=$_REQUEST['dept'];
	$empID=$_REQUEST['empID'];
// 	$desig1=str_replace('_',' ',$dept);
$selDept=mysql_query("Select DEPTNO from department WHERE DEPTDESC='$dept'");
	$resDept=mysql_fetch_array($selDept);
	$dept=$resDept['DEPTNO'];
	
// 		echo "error3Select DEPTNO from department WHERE DEPTDESC='$dept'".mysql_error();
	
	$selUserRole=mysql_query("Select role from users where username='$empID'");
	$resUserRole=mysql_fetch_array($selUserRole);



	
// 	echo "Num Rows".mysql_num_rows($selUserRole);
	if(mysql_num_rows($selUserRole)>0)
	{
	    
	    	$role=$resUserRole['role'];
		  //  echo "role".$role;
	
	if($role==12)
	{
	    
	   // echo "role=12";
	    
	
	$query=mysql_query("SELECT pfno,name FROM employees where pfno IN ( select username from users where status='1'AND role='13' AND dept='$dept' )");
	
// 	echo "SELECT pfno,name FROM employees where pfno IN ( select username from users where status='1'AND role='13' AND dept='$dept')";
// 	echo 'error'.mysql_error();
						while($value = mysql_fetch_array($query))
						{
							$temp=array();
							
							$temp['name']=$value['name'];
							$temp['pfNo']=$value['pfno'];
							
							array_push($response,$temp);
						  
						}
						echo json_encode($response);
	}
    
	    
	}else
	{
	
// 	$selDept=mysql_query("Select DEPTNO from department WHERE DEPTDESC='$dept'");
// 	$resDept=mysql_fetch_array($selDept);
// 	$dept=$resDept['DEPTNO'];
	$query=mysql_query("SELECT pfno,name FROM employees where pfno IN ( select username from users where status='1'AND role='12' AND dept='$dept')");
	
// 	echo "SELECT pfno,name FROM employees where pfno IN ( select username from users where status='1'AND role='12' AND dept='$dept')";
// 	echo 'error2'.mysql_error();
						while($value = mysql_fetch_array($query))
						{
							$temp=array();
							
							$temp['name']=$value['name'];
							$temp['pfNo']=$value['pfno'];
							
							array_push($response,$temp);
						  
						}
						echo json_encode($response);

	}
	

}


?>