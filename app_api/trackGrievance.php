<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid'])&&isset($_REQUEST['ref_no']))
{
$empid=$_REQUEST['empid'];
$ref_no=$_REQUEST['ref_no'];
	
								
									
									$db->gr_connect();
										$query = mysql_query("select * from tbl_grievance_forward where emp_id='".$empid."' AND griv_ref_no='".$ref_no."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											$temp=array();
	
											$temp['refNo']=$query_result['griv_ref_no'];
											$forwarded_to=$query_result['user_id_forwarded'];
											$select_user=mysql_query("SELECT user_name FROM tbl_user WHERE user_id='".$forwarded_to."'");
											$user_result=mysql_fetch_array($select_user);
											$temp['forwarded_to']=$user_result['user_name'];
											$temp['forwarded_time']=$query_result['forwarded_date'];
											$temp['remark']=$query_result['remark'];
											$status=$query_result['status'];
											
											$select_status=mysql_query("SELECT status FROM status WHERE id='".$status."'");
											$result_status=mysql_fetch_array($select_status);
											$temp['status']=$result_status['status'];
											
														
																
											
											array_push($response,$temp);
											
										}
echo json_encode($response);
										/*echo "
										<tr>
											<td>".$val['reference']."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td><a href='show_returned_seperate.php?id=".$val['reference']."' class='btn btn-primary'>दर्शाया जाए / Show</a>
										</tr>
										";*/
									
									
								
								//echo json_encode($response);
								 
}
			
   
 ?>
