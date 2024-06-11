<?php

require_once 'DB_function.php';
$db=new DB_Function();
$response=array();
if(isset($_REQUEST['empid'])&&isset($_REQUEST['status']))
{
$empid=$_REQUEST['empid'];
$status=$_REQUEST['status'];
	
								
									
										$query = mysql_query("select * from tbl_grievance where emp_id='".$empid."' AND status='".$status."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											$temp=array();
	
											$temp['refNo']=$query_result['gri_ref_no'];
											$temp['date']=$query_result['gri_upload_date'];
											$temp['grType']=$query_result['gri_type'];
											$temp['grDescription']=$query_result['gri_desc'];
														
																
											
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
