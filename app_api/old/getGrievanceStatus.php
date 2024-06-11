<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid'])&&isset($_REQUEST['status']))
{
$empid=$_REQUEST['empid'];
$status=$_REQUEST['status'];
	
								
									
									$db->gr_connect();
										$query = mysql_query("select * from tbl_grievance where emp_id='".$empid."' AND status='".$status."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											$temp=array();
	
											$temp['refNo']=$query_result['gri_ref_no'];
											$temp['date']=$query_result['gri_upload_date'];
											$grType=$query_result['gri_type'];
											
											
											$selectGRType=mysql_query("SELECT cat_name FROM category WHERE cat_id=$grType");
											$GRResult=mysql_fetch_array($selectGRType);
											$temp['grType']=$GRResult['cat_name'];
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
