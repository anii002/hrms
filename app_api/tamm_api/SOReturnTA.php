

<?php


require_once 'DB_function.php';
$db1=new DB_Function();
$response=array("error"=>FALSE);

if(isset($_REQUEST['empid'])&&isset($_REQUEST['refno']))
{
	
	$empid=$_REQUEST['empid'];
	$refno=$_REQUEST['refno'];
	
  // global $con;
 $query1 = mysql_query("select * from forward_data where reference_id = '$refno' AND depart_time is null AND fowarded_to='".$empid."'" );
	$fetch = mysql_fetch_array($query1);
	$org = $fetch['empid'];
					
  $query2 = "update forward_data set hold_status='0',admin_approve='0',depart_time=CURRENT_TIMESTAMP , admin_returned_status='1' where reference_id='$refno' AND fowarded_to='$empid'";
  $result2 = mysql_query($query2) or die(mysql_error());
  $insert = mysql_query("insert into forward_data(empid,reference_id,fowarded_to,arrived_time,hold_status,admin_returned,admin_returned_status) values('$org','$refno','$org',CURRENT_TIMESTAMP,'1',CURRENT_TIMESTAMP,'1')");
  if($insert&&$result2){
    $response["error"]=FALSE;
	$response["msg"]="TA return to employee Successfully";
echo json_encode($response);
  }
  else{
	  $response["error"]=True;
    $response["msg"]="TA return to employee unsuccessfull";
  echo json_encode($response);
  }
}	
?>