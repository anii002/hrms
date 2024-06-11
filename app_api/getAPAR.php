<?php

require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
$empid=$_REQUEST['empid'];
	
								
									$db->apar_connect();
										$query = mysql_query("select year,integrity,reportinggrade,reviewinggrade,acceptinggrade,overallremark from scanned_apr where empid='".$empid."'");
										while($query_result = mysql_fetch_array($query))
										{
											
											$temp=array();
	
											$temp['year']=$query_result['year'];
											$temp['integrity']=$query_result['integrity'];
											$temp['reportingGrade']=$query_result['reportinggrade'];
											$temp['acceptingGrade']=$query_result['acceptinggrade'];
											$temp['reviewingGrade']=$query_result['reviewinggrade'];
											$temp['remark']=$query_result['overallremark'];
														
																
											
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
