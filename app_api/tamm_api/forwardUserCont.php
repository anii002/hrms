<?php


require_once 'DB_function.php';
$db1=new DB_Function();
$response=array("error"=>FALSE);

if(isset($_REQUEST['empid'])&&isset($_REQUEST['refno'])&&isset($_REQUEST['forward_to']))
{
	
	$empid=$_REQUEST['empid'];
	$refno=$_REQUEST['refno'];
	$forward_to=$_REQUEST['forward_to'];
	
	// $query_select = "SELECT * FROM forward_data WHERE reference_id='".$refno."' AND depart_time is null AND fowarded_to='".$empid."'";
          // $result_select = mysql_query($query_select);
          // $value_empid = mysql_fetch_array($result_select);
		  
		  // $originalEmp=$value_empid['empid'];
		  
	$query=mysql_query("SELECT pfno FROM employees WHERE name='".$forward_to."'");
	$result=mysql_fetch_array($query);
	$forward_emp=$result['pfno'];
  // global $con;
  
					
  $query1 = mysql_query("select * from bill_forward where reference_id = '$refno'");
	$fetch = mysql_fetch_array($query1);
	$org = $fetch['empid'];
	//echo "update bill_forward set depart_time=CURRENT_TIMESTAMP, hold_status='0' where reference_id = '$ref' AND fowarded_to = '$empid' ORDER BY id DESC";
	$update = mysql_query("update bill_forward set depart_time=CURRENT_TIMESTAMP, hold_status='0' where reference_id = '$refno' AND fowarded_to = '$empid' ORDER BY id DESC");
  echo mysql_error();
	if($update){
	 $query = "insert into bill_forward(empid, reference_id, fowarded_to, arrived_time, hold_status) values('$org','$refno','$forward_emp', CURRENT_TIMESTAMP, '1')";
   $result1 = mysql_query($query);
	}
  
  if($result1){
    $response["error"]=FALSE;
	$response["msg"]="Contingency Forwarded Successfully";
echo json_encode($response);
  }
  else{
    $response["error"]=True;
    $response["msg"]="Contingency forwarding unsuccessfull";
  echo json_encode($response);}
}
?>