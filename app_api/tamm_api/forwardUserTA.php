<?php


require_once 'DB_function.php';
$db1=new DB_Function();
$response=array("error"=>FALSE);

if(isset($_REQUEST['empid'])&&isset($_REQUEST['refno'])&&isset($_REQUEST['forward_to']))
{
	
	$empid=$_REQUEST['empid'];
	$refno=$_REQUEST['refno'];
	$forward_to=$_REQUEST['forward_to'];
	
	$query_select = "SELECT * FROM forward_data WHERE reference_id='".$refno."' AND depart_time is null AND fowarded_to='".$empid."'";
          $result_select = mysql_query($query_select);
          $value_empid = mysql_fetch_array($result_select);
		  
		  $originalEmp=$value_empid['empid'];
		  
	$query=mysql_query("SELECT pfno FROM employees WHERE name='".$forward_to."'");
	$result=mysql_fetch_array($query);
	$forward_emp=$result['pfno'];
  // global $con;
  
					
  $query1 = "update forward_data set depart_time=CURRENT_TIMESTAMP,hold_status='0' where reference_id='$refno' AND fowarded_to='$empid'";
  $result1 = mysql_query($query1) or die(mysql_error());
  $query2 = "insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status) values('$originalEmp','$refno','$forward_emp',CURRENT_TIMESTAMP,'1')";
  $result2 = mysql_query($query2) or die(mysql_error());
  
  if($result1 && $result2){
    $response["error"]=FALSE;
	$response["msg"]="TA Forwarded Successfully";
echo json_encode($response);
  }
  else{
    $response["error"]=True;
    $response["msg"]="TA forwarding unsuccessfull";
  echo json_encode($response);}
}
?>